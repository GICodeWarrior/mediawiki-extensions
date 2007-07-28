<?php
/* vim: set expandtab tabstop=4 shiftwidth=4: */
// +----------------------------------------------------------------------------+
// | File_Ogg PEAR Package for Accessing Ogg Bitstreams                         |
// | Copyright (c) 2005 David Grant <david@grant.org.uk>                        |
// +----------------------------------------------------------------------------+
// | This library is free software; you can redistribute it and/or              |
// | modify it under the terms of the GNU Lesser General Public                 |
// | License as published by the Free Software Foundation; either               |
// | version 2.1 of the License, or (at your option) any later version.         |
// |                                                                            |
// | This library is distributed in the hope that it will be useful,            |
// | but WITHOUT ANY WARRANTY; without even the implied warranty of             |
// | MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the GNU          |
// | Lesser General Public License for more details.                            |
// |                                                                            |
// | You should have received a copy of the GNU Lesser General Public           |
// | License along with this library; if not, write to the Free Software        |
// | Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA |
// +----------------------------------------------------------------------------+

/**
 * @author      David Grant <david@grant.org.uk>
 * @category    File
 * @copyright   David Grant <david@grant.org.uk>
 * @license     http://www.gnu.org/copyleft/lesser.html GNU LGPL
 * @link        http://pear.php.net/package/File_Ogg
 * @package     File_Ogg
 * @version     CVS: $Id: Ogg.php,v 1.14 2005/11/19 09:06:30 djg Exp $
 */

require_once('PEAR.php');
require_once('File/Ogg/Bitstream.php');
require_once("File/Ogg/Flac.php");
require_once("File/Ogg/Speex.php");
require_once("File/Ogg/Theora.php");
require_once("File/Ogg/Vorbis.php");

/**
 * @access  public
 */
define("OGG_STREAM_VORBIS",     1);
/**
 * @access  public
 */
define("OGG_STREAM_THEORA",     2);
/**
 * @access  public
 */
define("OGG_STREAM_SPEEX",      3);
/**
 * @access  public
 */
define("OGG_STREAM_FLAC",       4);

/**
 * Capture pattern to determine if a file is an Ogg physical stream.
 * 
 * @access  private
 */
define("OGG_CAPTURE_PATTERN", "OggS");
/**
 * Maximum size of an Ogg stream page plus four.  This value is specified to allow
 * efficient parsing of the physical stream.  The extra four is a paranoid measure
 * to make sure a capture pattern is not split into two parts accidentally.
 * 
 * @access  private
 */
define("OGG_MAXIMUM_PAGE_SIZE", 65311);
/**
 * Capture pattern for an Ogg Vorbis logical stream.
 * 
 * @access  private
 */
define("OGG_STREAM_CAPTURE_VORBIS", "vorbis");
/**
 * Capture pattern for an Ogg Speex logical stream.
 * @access  private
 */
define("OGG_STREAM_CAPTURE_SPEEX",  "Speex   ");
/**
 * Capture pattern for an Ogg FLAC logical stream.
 * 
 * @access  private
 */
define("OGG_STREAM_CAPTURE_FLAC",   "fLaC");
/**
 * Capture pattern for an Ogg Theora logical stream.
 * 
 * @access  private
 */
define("OGG_STREAM_CAPTURE_THEORA", "theora");
/**
 * Error thrown if the file location passed is nonexistant or unreadable.
 * 
 * @access  private
 */
define("OGG_ERROR_INVALID_FILE", 1);
/**
 * Error thrown if the user attempts to extract an unsupported logical stream.
 * 
 * @access  private
 */
define("OGG_ERROR_UNSUPPORTED",  2);
/**
 * Error thrown if the user attempts to extract an logical stream with no
 * corresponding serial number.
 * 
 * @access  private
 */
define("OGG_ERROR_BAD_SERIAL",   3);

/**
 * Class for parsing a ogg bitstream.
 *
 * This class provides a means to access several types of logical bitstreams (e.g. Vorbis)
 * within a Ogg physical bitstream.
 *
 * @link    http://www.xiph.org/ogg/doc/
 * @package File_Ogg
 */
class File_Ogg
{
    /**
     * File pointer to Ogg container.
     *
     * This is the file pointer used for extracting data from the Ogg stream.  It is
     * the result of a standard fopen call.
     *
     * @var     pointer
     * @access  private
     */
    var $_filePointer;

    /**
     * The container for all logical streams.
     *
     * List of all of the unique streams in the Ogg physical stream.  The key
     * used is the unique serial number assigned to the logical stream by the
     * encoding application.
     *
     * @var     array
     * @access  private
     */
    var $_streamList = array();
    var $_streams = array();

    /**
     * Returns an interface to an Ogg physical stream.
     *
     * This method takes the path to a local file and examines it for a physical
     * ogg bitsream.  After instantiation, the user should query the object for
     * the logical bitstreams held within the ogg container.
     *
     * @access  public
     * @param   string  $fileLocation   The path of the file to be examined.
     */
    function File_Ogg($fileLocation)
    {
        clearstatcache();
        if (! file_exists($fileLocation)) {
            PEAR::raiseError("Couldn't Open File.  Check File Path.", OGG_ERROR_INVALID_FILE);
            return;
        }

        // Open this file as a binary, and split the file into streams.
        $this->_filePointer = fopen($fileLocation, "rb");
        if (is_resource($this->_filePointer))
            $this->_splitStreams();
        else
            PEAR::raiseError("Couldn't Open File.  Check File Permissions.", OGG_ERROR_INVALID_FILE);
    }
    
    /**
     * @access  private
     */
    function _decodePageHeader($pageData, $pageOffset, $pageFinish)
    {
        // Extract the various bits and pieces found in each packet header.
        if (substr($pageData, 0, 4) != OGG_CAPTURE_PATTERN)
            return (false);

        $stream_version = unpack("c1data", substr($pageData, 4, 1));
        if ($stream_version['data'] != 0x00)
            return (falses);

        $header_flag     = unpack("cdata", substr($pageData, 5, 1));
        $abs_granual_pos = unpack("Vdata", substr($pageData, 6, 8));
        // Serial number for the current datastream.
        $stream_serial   = unpack("Vdata", substr($pageData, 14, 4));
        $page_sequence   = unpack("Vdata", substr($pageData, 18, 4));
        $checksum        = unpack("Vdata", substr($pageData, 22, 4));
        $page_segments   = unpack("cdata", substr($pageData, 26, 1));
        $segments_total  = 0;
        for ($i = 0; $i < $page_segments['data']; ++$i) {
            $segments = unpack("Cdata", substr($pageData, 26 + ($i + 1), 1));
            $segments_total += $segments['data'];
        }
        $this->_streamList[$stream_serial['data']]['stream_page'][$page_sequence['data']]['stream_version']     = $stream_version['data'];
        $this->_streamList[$stream_serial['data']]['stream_page'][$page_sequence['data']]['header_flag']        = $header_flag['data'];
        $this->_streamList[$stream_serial['data']]['stream_page'][$page_sequence['data']]['abs_granual_pos']    = $abs_granual_pos['data'];
        $this->_streamList[$stream_serial['data']]['stream_page'][$page_sequence['data']]['checksum']           = sprintf("%u", $checksum['data']);
        $this->_streamList[$stream_serial['data']]['stream_page'][$page_sequence['data']]['segments']           = $segments_total;
        $this->_streamList[$stream_serial['data']]['stream_page'][$page_sequence['data']]['head_offset']        = $pageOffset;
        $this->_streamList[$stream_serial['data']]['stream_page'][$page_sequence['data']]['body_offset']        = $pageOffset + 26 + $page_segments['data'] + 1;
        $this->_streamList[$stream_serial['data']]['stream_page'][$page_sequence['data']]['body_finish']        = $pageFinish;
        $this->_streamList[$stream_serial['data']]['stream_page'][$page_sequence['data']]['data_length']        = $pageFinish - $pageOffset;
        
        return (true);
    }
    
    /**
     *  @access         private
     */
    function _splitStreams()
    {
        // Loop through the physical stream until there are no more pages to read.
        while (true) {
            $this_page_offset = ftell($this->_filePointer);
            $next_page_offset = $this_page_offset;

            // Read in 65311 bytes from the physical stream.  Ogg documentation
            // states that a page has a maximum size of 65307 bytes.  An extra
            // 4 bytes are added to ensure that the capture pattern of the next
            // pages comes through.
            if (! ($stream_data = fread($this->_filePointer, OGG_MAXIMUM_PAGE_SIZE)))
                break;

            // Split the data into various pages.
            $stream_pages = explode(OGG_CAPTURE_PATTERN, $stream_data);
            // If the maximum data has been read, it is likely that this is an
            // intermediate page.  Since the split adds an empty element at the
            // start of the array, we must account for that by substracting one
            // iteration from the loop.  This argument also follows if the data
            // includes an incomplete page at the end, in which case we substract
            // two iterations from the loop.
            $number_pages = (strlen($stream_data) == OGG_MAXIMUM_PAGE_SIZE) ? count($stream_pages) - 2 : count($stream_pages) - 1;
            if (! count($stream_pages))
                break;

            for ($i = 1; $i <= $number_pages; ++$i) {
                $stream_pages[$i] = OGG_CAPTURE_PATTERN . $stream_pages[$i];
                // Set the current page offset to the next page offset of the
                // previous loop iteration.
                $this_page_offset = $next_page_offset;
                // Set the next page offset to the current page offset plus the
                // length of the current page.
                $next_page_offset += strlen($stream_pages[$i]);
                $this->_decodePageHeader($stream_pages[$i], $this_page_offset, $next_page_offset - 1);
            }
            fseek($this->_filePointer, $next_page_offset, SEEK_SET);
        }
        // Loop through the streams, and find out what type of stream is available.
        foreach ($this->_streamList as $stream_serial => $pages) {
            fseek($this->_filePointer, $pages['stream_page'][0]['body_offset'], SEEK_SET);
            $pattern = fread($this->_filePointer, 8);
            if (preg_match("/" . OGG_STREAM_CAPTURE_VORBIS . "/", $pattern)) {
                $this->_streamList[$stream_serial]['stream_type'] = OGG_STREAM_VORBIS;
                $this->_streams[$stream_serial] =& new File_Ogg_Vorbis($stream_serial, $this->_streamList[$stream_serial]['stream_page'], $this->_filePointer);
            } elseif (preg_match("/" . OGG_STREAM_CAPTURE_SPEEX . "/", $pattern)) {
                $this->_streamList[$stream_serial]['stream_type'] = OGG_STREAM_SPEEX;
                $this->_streams[$stream_serial] =& new File_Ogg_Speex($stream_serial, $this->_streamList[$stream_serial]['stream_page'], $this->_filePointer);
            } elseif (preg_match("/" . OGG_STREAM_CAPTURE_FLAC . "/", $pattern)) {
                $this->_streamList[$stream_serial]['stream_type'] = OGG_STREAM_FLAC;
                $this->_streams[$stream_serial] =& new File_Ogg_Flac($stream_serial, $this->_streamList[$stream_serial]['stream_page'], $this->_filePointer);
            } elseif (preg_match("/" . OGG_STREAM_CAPTURE_THEORA . "/", $pattern)) {
                $this->_streamList[$stream_serial]['stream_type'] = OGG_STREAM_THEORA;
                $this->_streams[$stream_serial] =& new File_Ogg_Theora($stream_serial, $this->_streamList[$stream_serial]['stream_page'], $this->_filePointer);
            } else
                $this->_streamList[$stream_serial]['stream_type'] = "unknown";
        }
        unset($this->_streamList);
    }
    
    /**
     * Returns the overead percentage used by the Ogg headers.
     * 
     * This function returns the percentage of the total stream size
     * used for Ogg headers.
     *
     * @return float
     */
    function getOverhead() {
        $header_size    = 0;
        $stream_size    = 0;
        foreach ($this->_streams as $serial => $stream) {
            foreach ($stream->_streamList as $offset => $stream_data) {
                $header_size += $stream_data['body_offset'] - $stream_data['head_offset'];
                $stream_size  = $stream_data['body_finish'];
            }
        }
        return sprintf("%0.2f", ($header_size / $stream_size) * 100);
    }
    
    /**
     * Returns the appropriate logical bitstream that corresponds to the provided serial.
     *
     * This function returns a logical bitstream contained within the Ogg physical
     * stream, corresponding to the serial used as the offset for that bitstream.
     * The returned stream may be Vorbis, Speex, FLAC or Theora, although the only
     * usable bitstream is Vorbis.
     *
     * @return File_Ogg_Bitstream
     */
    function &getStream($streamSerial)
    {
        if (! array_key_exists($streamSerial, $this->_streams))
                PEAR::raiseError("The stream number is invalid.", OGG_ERROR_BAD_SERIAL);

        return $this->_streams[$streamSerial];
    }
    
    /**
     * This function returns true if a logical bitstream of the requested type can be found.
     *
     * This function checks the contents of this ogg physical bitstream for of logical
     * bitstream corresponding to the supplied type.  If one is found, the function returns
     * true, otherwise it return false.
     *
     * @param   int     $streamType
     * @return  boolean
     */
    function hasStream($streamType)
    {
        foreach ($this->_stream as $stream) {
            if ($stream['stream_type'] == $streamType)
                return (true);
        }
        return (false);
    }
    
    /**
     * Returns an array of logical streams inside this physical bitstream.
     *
     * This function returns an array of logical streams found within this physical
     * bitstream.  If a filter is provided, only logical streams of the requested type
     * are returned, as an array of serial numbers.  If no filter is provided, this
     * function returns a two-dimensional array, with the stream type as the primary key,
     * and a value consisting of an array of stream serial numbers.
     *
     * @param  int      $filter
     * @return array
     */
    function listStreams($filter = null)
    {
        $streams = array();
        // Loops through the streams and assign them to an appropriate index,
        // ready for filtering the second part of this function.
        foreach ($this->_streams as $serial => $stream) {
            $stream_type = 0;
            switch (get_class($stream)) {
                case "file_ogg_flac":
                    $stream_type = OGG_STREAM_FLAC;
                    break;
                case "file_ogg_speex":
                    $stream_type = OGG_STREAM_SPEEX;
                    break;
                case "file_ogg_theora":
                    $stream_type = OGG_STREAM_THEORA;
                    break;
                case "file_ogg_vorbis":
                    $stream_type = OGG_STREAM_VORBIS;
                    break;
            }
            if (! isset($streams[$stream_type]))
                // Initialise the result list for this stream type.
                $streams[$stream_type] = array();
                        
            $streams[$stream_type][] = $serial;
        }

        // Perform filtering.
        if (is_null($filter))
            return ($streams);
        elseif (isset($streams[$filter]))
            return ($streams[$filter]);
        else
            return array();
    }
    
    function saveChanges()
    {
        $fp     = tmpfile();
        $diff   = 0;
        foreach ($this->_streams as $stream)
            $stream->_saveChanges($fp, $diff);
    }
}
?>