<?php
/**
 * @version		$Id: default.bak.php 882 2013-01-07 11:53:44Z dhorsfall $
 * @package		Joomla.Site
 * @subpackage	mod_menu
 * @copyright	Copyright (C) 2005 - 2011 Open Source Matters, Inc. All rights reserved.
 * @license		GNU General Public License version 2 or later; see LICENSE.txt
 */

// No direct access.
defined('_JEXEC') or die;

// Note. It is important to remove spaces between elements.
$dropdown = '';
if ( preg_match( '/dropdown/', $params->get( 'moduleclass_sfx' ) ) ) {
	$dropdown = " dropdown";
}
?>
<ul class="navbar-nav<?php if ($class_sfx) { echo $class_sfx; } ;?>"<?php
	$tag = '';
	if ($params->get('tag_id')!=NULL) {
		$tag = $params->get('tag_id').'';
		echo ' id="'.$tag.'"';
	}
?>>
<?php
foreach ($list as $i => &$item) :

	$class = 'nav-item'; //'level-' . $item->level . ' item-'.$item->id;

	if ($item->id == $active_id) {
		$item->anchor_css = $item->anchor_css . ' active';
	}

	if ($item->deeper) {
		$class .= ' dropdown';
	}

	// if ($item->type == 'alias' && in_array($item->params->get('aliasoptions'),$path)||in_array($item->id, $path)) {
	// 	$class .= ' active';
	// }

	// if ($item->parent) {
	// 	$class .= ' parent';
	// }

	if (!empty($class)) {
		$class = ' class="'.trim($class) .'"';
	}
	if ( ( $item->type == 'separator' ) && ( $item->title == 'divider' ) ) {
		echo '<li class="divider-vertical"></li>';
	}
	echo '<li'.$class.'>';

	// Render the menu item.
	switch ($item->type) :
		case 'separator':
		case 'url':
		case 'component':
			require JModuleHelper::getLayoutPath('mod_menu', 'default_'.$item->type);
			break;
		default:
			require JModuleHelper::getLayoutPath('mod_menu', 'default_url');
			break;
	endswitch;

	// The next item is deeper.
	if ($item->deeper) {
		echo '<ul class="dropdown-menu">';
	}

	// The next item is shallower.
	elseif ($item->shallower) {
		echo '</li>';
		echo str_repeat('</ul></li>', $item->level_diff);
	}
	// The next item is on the same level.
	else {
		echo '</li>';
	}
endforeach;
?>
</ul>
