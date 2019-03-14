<?php
/**
 * @package     Joomla.Site
 * @subpackage  mod_articles_category
 *
 * @copyright   Copyright (C) 2005 - 2017 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;
?>

<div id="list-home" class="list-group">
	<?php foreach ($list as $i => $item) : ?>
		<a class="smooth-scroll indicator list-group-item list-group-item-action" href="#<?php echo $item->alias; ?>">
		  	<p><?php echo '0' . ($i + 1); ?></p>
		</a>
	<?php endforeach ?>
</div>

<?php foreach ($list as $i => $item) : ?>
	<?php 
		$images = json_decode($item->images);
		$urls = json_decode($item->urls);
		$break_title = str_replace('// ', '<br />', $item->title);
		$text_alias = str_replace('/', '', $urls->urla);
		$text_alias = str_replace('-', ' ', $text_alias);
		$text_alias = ucfirst($text_alias);
	?>

	<div id="<?php echo $item->alias; ?>" class="<?php echo ($images->image_fulltext_alt) ? 'background-overlay' : ''; ?> background" style="background-image:url('<?= JURI::base(true) . '/' . $images->image_fulltext; ?>')">


		<div class="container-fluid">
			<div class="row">
				<div class="<?php echo ($i === 0) ? 'col-lg-4' : 'col-lg-6'; ?>">
					<div class="side-content-block">
						<?php if ($i === 2 || $i === 4) : ?>

							<div class="top-content">
								<div class="row">
									<div class="col-lg-6 p-0 order-lg-1 order-2">
										<div class="intro-image" style="background-image:url('<?= JURI::base(true) . '/' . $images->image_intro; ?>')"></div>
									</div>

									<div class="col-lg-6 pb-2 order-lg-2 order-1">
										<h1 class="big-header"><?php echo $break_title; ?></h1>
										<div class="body-text pr-1">
											<p><?php echo $item->introtext; ?></p>
											<?php if($urls->urla) : ?>
												<a href="<?php echo $urls->urla; ?>"><span class="a-arrow"></span> <?php echo $text_alias; ?></a>
											<?php endif; ?>
										</div>
									</div>
								</div>
							</div>

							<div class="bottom-content">
								<div class="row">
									<div class="col-lg-6 pl-5 left">
										<h1 class="outline"><?php echo '0' . ($i + 1); ?></h1>
										<p><?php echo $item->fulltext; ?></p>
									</div>

									<div class="col-lg-6 p-0 ">
										<?php 
											$id=$item->id;
											$db = JFactory::getDbo();
											$query = 'select * from #__fields_values where item_id = "'.$id.'"';
											$db->setQuery($query);
											$fields = $db->loadObjectList();
										?>

										<?php foreach ($fields as $field) :

											if ($field->field_id == 2) : ?>
												<div class="intro-image" style="background-image: url('<?php echo $field->value; ?>')"></div>
											<?php endif; ?>

										<?php endforeach; ?>	
									</div>
								</div>
							</div>

						<?php else :  ?>

							<h1 class="big-header"><?php echo $break_title; ?></h1>
							<div class="body-text pl-5 pr-1">
								<p><?php echo $item->introtext; ?></p>
								<?php if($urls->urla) : ?>
									<a href="<?php echo $urls->urla; ?>"><span class="a-arrow"></span> <?php echo $text_alias; ?></a>
								<?php endif; ?>
							</div>

						<?php endif; ?>
					</div>
				</div>

				<div class="<?php echo ($i === 0) ? 'col-lg-8' : 'col-lg-6 px-0'; ?>">
					<div class="main-content-block <?php echo $item->alias ?>">
						<?php if( $i === 2 || $i === 4 ) : ?>

							<?php 
								$id=$item->id;
								$db = JFactory::getDbo();
								$query = 'select * from #__fields_values where item_id = "'.$id.'"';
								$db->setQuery($query);
								$fields = $db->loadObjectList();
							?>

							<?php foreach ($fields as $field) :

								if ($field->field_id == 1) : ?>
									<div class="bg-block" style="background-image: url('<?php echo $field->value; ?>')"></div>
								<?php endif; ?>

							<?php endforeach; ?>	

						<?php else : ?>

							<?php echo JHtml::_('content.prepare', '{loadposition ' . $item->alias . '-content}'); ?>

						<?php endif; ?>		
					</div>
				</div>
			</div>
		</div>

	</div>
<?php endforeach ?>
<?php /*
	<?php if ($grouped) : ?>
		<?php foreach ($list as $group_name => $group) : ?>
		<li>
			<div class="mod-articles-category-group"><?php echo JText::_($group_name); ?></div>
			<ul>
				<?php foreach ($group as $item) : ?>
				<?php $image = json_decode($item->images); ?>
					<li>
						hi
						<?php if ($params->get('link_titles') == 1) : ?>
							<a class="mod-articles-category-title <?php echo $item->active; ?>" href="<?php echo $item->link; ?>">
								<?php echo $item->title; ?>
							</a>
						<?php else : ?>
							<?php echo $item->title; ?>
						<?php endif; ?>

						<?php if ($item->displayHits) : ?>
							<span class="mod-articles-category-hits">
								(<?php echo $item->displayHits; ?>)
							</span>
						<?php endif; ?>

						<?php if ($params->get('show_author')) : ?>
							<span class="mod-articles-category-writtenby">
								<?php echo $item->displayAuthorName; ?>
							</span>
						<?php endif; ?>

						<?php if ($item->displayCategoryTitle) : ?>
							<span class="mod-articles-category-category">
								(<?php echo $item->displayCategoryTitle; ?>)
							</span>
						<?php endif; ?>

						<?php if ($item->displayDate) : ?>
							<span class="mod-articles-category-date"><?php echo $item->displayDate; ?></span>
						<?php endif; ?>

						<?php if ($params->get('show_tags', 0) && $item->tags->itemTags) : ?>
							<div class="mod-articles-category-tags">
								<?php echo JLayoutHelper::render('joomla.content.tags', $item->tags->itemTags); ?>
							</div>
						<?php endif; ?>

						<?php if ($params->get('show_introtext')) : ?>
							<p class="mod-articles-category-introtext">
								<?php echo $item->displayIntrotext; ?>
							</p>
						<?php endif; ?>

						<?php if ($params->get('show_readmore')) : ?>
							<p class="mod-articles-category-readmore">
								<a class="mod-articles-category-title <?php echo $item->active; ?>" href="<?php echo $item->link; ?>">
									<?php if ($item->params->get('access-view') == false) : ?>
										<?php echo JText::_('MOD_ARTICLES_CATEGORY_REGISTER_TO_READ_MORE'); ?>
									<?php elseif ($readmore = $item->alternative_readmore) : ?>
										<?php echo $readmore; ?>
										<?php echo JHtml::_('string.truncate', $item->title, $params->get('readmore_limit')); ?>
											<?php if ($params->get('show_readmore_title', 0) != 0) : ?>
												<?php echo JHtml::_('string.truncate', $item->title, $params->get('readmore_limit')); ?>
											<?php endif; ?>
									<?php elseif ($params->get('show_readmore_title', 0) == 0) : ?>
										<?php echo JText::sprintf('MOD_ARTICLES_CATEGORY_READ_MORE_TITLE'); ?>
									<?php else : ?>
										<?php echo JText::_('MOD_ARTICLES_CATEGORY_READ_MORE'); ?>
										<?php echo JHtml::_('string.truncate', $item->title, $params->get('readmore_limit')); ?>
									<?php endif; ?>
								</a>
							</p>
						<?php endif; ?>
					</li>
				<?php endforeach; ?>
			</ul>
		</li>
		<?php endforeach; ?>
	<?php else : ?>
		<?php foreach ($list as $item) : ?>
			<li>
				<?php if ($params->get('link_titles') == 1) : ?>
					<a class="mod-articles-category-title <?php echo $item->active; ?>" href="<?php echo $item->link; ?>"><?php echo $item->title; ?></a>
				<?php else : ?>
					<?php echo $item->title; ?>
				<?php endif; ?>

				<?php if ($item->displayHits) : ?>
					<span class="mod-articles-category-hits">
						(<?php echo $item->displayHits; ?>)
					</span>
				<?php endif; ?>

				<?php if ($params->get('show_author')) : ?>
					<span class="mod-articles-category-writtenby">
						<?php echo $item->displayAuthorName; ?>
					</span>
				<?php endif; ?>

				<?php if ($item->displayCategoryTitle) : ?>
					<span class="mod-articles-category-category">
						(<?php echo $item->displayCategoryTitle; ?>)
					</span>
				<?php endif; ?>

				<?php if ($item->displayDate) : ?>
					<span class="mod-articles-category-date">
						<?php echo $item->displayDate; ?>
					</span>
				<?php endif; ?>

				<?php if ($params->get('show_tags', 0) && $item->tags->itemTags) : ?>
					<div class="mod-articles-category-tags">
						<?php echo JLayoutHelper::render('joomla.content.tags', $item->tags->itemTags); ?>
					</div>
				<?php endif; ?>

				<?php if ($params->get('show_introtext')) : ?>
					<p class="mod-articles-category-introtext">
						<?php echo $item->displayIntrotext; ?>
					</p>
				<?php endif; ?>

				<?php if ($params->get('show_readmore')) : ?>
					<p class="mod-articles-category-readmore">
						<a class="mod-articles-category-title <?php echo $item->active; ?>" href="<?php echo $item->link; ?>">
							<?php if ($item->params->get('access-view') == false) : ?>
								<?php echo JText::_('MOD_ARTICLES_CATEGORY_REGISTER_TO_READ_MORE'); ?>
							<?php elseif ($readmore = $item->alternative_readmore) : ?>
								<?php echo $readmore; ?>
								<?php echo JHtml::_('string.truncate', $item->title, $params->get('readmore_limit')); ?>
							<?php elseif ($params->get('show_readmore_title', 0) == 0) : ?>
								<?php echo JText::sprintf('MOD_ARTICLES_CATEGORY_READ_MORE_TITLE'); ?>
							<?php else : ?>
								<?php echo JText::_('MOD_ARTICLES_CATEGORY_READ_MORE'); ?>
								<?php echo JHtml::_('string.truncate', $item->title, $params->get('readmore_limit')); ?>
							<?php endif; ?>
						</a>
					</p>
				<?php endif; ?>
			</li>
		<?php endforeach; ?>
	<?php endif;  */ ?> 
