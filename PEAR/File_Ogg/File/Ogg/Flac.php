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

require_once('File/Ogg/Bitstream.php');

/**
 * @author      David Grant <david@grant.org.uk>
 * @category    File
 * @copyright   David Grant <david@grant.org.uk>
 * @license     http://www.gnu.org/copyleft/lesser.html GNU LGPL
 * @link        http://pear.php.net/package/File_Ogg
 * @link        http://flac.sourceforge.net/documentation.html
 * @package     File_Ogg
 * @version     CVS: $Id: Flac.php,v 1.9 2005/11/16 20:43:27 djg Exp $
 */
class File_Ogg_Flac extends File_Ogg_Bitstream
{
    /**
     * @access  private
     */
	function File_Ogg_Flac()
    {
    }
}
?>