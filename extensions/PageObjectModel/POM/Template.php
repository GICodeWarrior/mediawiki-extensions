<?php
#
# Template class repersents templates
#
require_once('Util.php');
require_once('TemplateParameter.php');

class POMTemplate extends POMElement
{
	protected $title_triple;

	protected $parameters = array();

	public function POMTemplate($text)
	{
		$this->children = null; // forcefully ignore children

		# Remove curly braces at the beginning and at the end
		$text = substr($text, 2, strlen($text) - 4);

		# Split by pipe
		$parts = split('\|', $text);

		$this->title_triple = new POMUtilTrimTriple(array_shift($parts));
		
		foreach ($parts as $part)
		{
			$this->parameters[] = POMTemplateParameter::parse($part);
		}
	}

	public function getTitle()
	{
		return $this->title_triple->trimmed;
	}

	public function getParameter($name)
	{
		$trimmed_name = trim($name);
		if (strlen($trimmed_name) == 0)
		{
			throw new WrongParameterNameException('Can\'t get parameter with no name');
		}

		$number = 1;
		for ($i = 0; $i < count($this->parameters); $i++)
		{
			$parameter = $this->parameters[$i];

			# checking this in runtime to make sure we cover all post-parsing updates to the list
			if (is_a($parameter, 'POMTemplateNamedParameter'))
			{
				if ($parameter->getName() == $trimmed_name)
				{
					return $parameter->getValue();
				}
			}
			else if (is_a($parameter, 'POMTemplateNumberedParameter'))
			{
				if ($number == $trimmed_name)
				{
					return $parameter->getValue();
				}
				$number++;
			}
		}
		
		return null; # none matched
	}

	public function setParameter($name, $value,
		$ignore_name_spacing = true,
		$ignore_value_spacing = true,
		$override_name_spacing = false, # when original value exists
		$override_value_spacing = false	# when original value exists
		)
	{
		$trimmed_name = trim($name);
		if (strlen($trimmed_name) == 0)
		{
			throw new WrongParameterNameException("Can't set parameter with no name");
		}

		if ($ignore_name_spacing)
		{
			$name = $trimmed_name;
		}

		if ($ignore_value_spacing)
		{
			$value = trim($value);
		}

		# first go through named parameters and see if name matches
		for ($i = 0; $i < count($this->parameters); $i++)
		{
			if (is_a($this->parameters[$i], 'POMTemplateNamedParameter') &&
				$this->parameters[$i]->getName() == $trimmed_name)
			{
				$this->parameters[$i]->update($name, $value, $override_name_spacing, $override_value_spacing);
				return;
			}
		}

		# then go through numbered parameters and see if parameter with this number exists
		$number = 1;
		for ($i = 0; $i < count($this->parameters); $i++)
		{
			if (is_a($this->parameters[$i], 'POMTemplateNumberedParameter'))
			{
				if ($number == $trimmed_name)
				{
					$this->parameters[$i]->update($value, $override_value_spacing);
					return;
				}
				$number++;
			}
		}

		# now, if passed name is numeric, create numbered parameter, otherwise create named parameter
		# add parameter to parameters array
		if (is_numeric($trimmed_name) && ((int)$trimmed_name) == $trimmed_name)
		{
			$this->parameters[] = new POMTemplateNumberedParameter($value);
		}
		else
		{
			$this->parameters[] = new POMTemplateNamedParameter($name, $value);
		}
	}

	public function asString()
	{
		$text = '{{'.$this->title_triple->toString();

		for ($i = 0; $i < count($this->parameters); $i++)
		{
			$text .= '|';
			#echo "\n[$i]: ".var_export($this->parameters)."\n\n-----------------------------------\n";
			$text .= $this->parameters[$i]->toString();
		}

		$text .= '}}';

		return $text;
	}
}

class WrongParameterNameException extends Exception
{
    // Redefine the exception so message isn't optional
    public function __construct($message, $code = 0) {
        // some code
    
        // make sure everything is assigned properly
        parent::__construct($message, $code);
    }

    // custom string representation of object
    public function __toString() {
        return __CLASS__ . ": [{$this->code}]: {$this->message}\n";
    }
}
