<?php
/**
 * @version		$Id: default_separator.bak.php 882 2013-01-07 11:53:44Z dhorsfall $
 * @package		Joomla.Site
 * @subpackage	mod_menu
 * @copyright	Copyright (C) 2005 - 2011 Open Source Matters, Inc. All rights reserved.
 * @license		GNU General Public License version 2 or later; see LICENSE.txt
 */

// No direct access.
defined('_JEXEC') or die;

$dropdown = '';

// Note. It is important to remove spaces between elements.
$title = $item->anchor_title ? 'title="'.$item->anchor_title.'" ' : '';
if ($item->menu_image) {
		$item->params->get('menu_text', 1 ) ?
		$linktype = '<img src="'.$item->menu_image.'" alt="'.$item->title.'" /><span class="image-title">'.$item->title.'</span> ' :
		$linktype = '<img src="'.$item->menu_image.'" alt="'.$item->title.'" />';
}
else { $linktype = $item->title;
}


if ( preg_match( '/dropdown/', $params->get( 'moduleclass_sfx' ) ) ) {
  echo '<a class="nav-link dropdown-toggle separator" data-toggle="dropdown" href="#">' . $title . $linktype . '<b class="caret"></b></a>';
} elseif ( $item->title == 'divider' ) {
  echo 'test';
} else {
  echo '<a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#">' . $title . $linktype . '<b class="caret"></b></a>';
}
?>