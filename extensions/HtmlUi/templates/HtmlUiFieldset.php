<fieldset class="htmlUiFieldset" rel="<?php echo self::escape( $id ) ?>">
	<?php foreach( $elements as $element ): ?>
	<?php echo $element->render(); ?>
	<?php endforeach; ?>
</fieldset>
