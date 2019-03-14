<?php // no direct access
defined( '_JEXEC' ) or die( 'Restricted access' );

$section_id     = 'id="'.$id.'"';
$section_class  = 'class="carousel slide section-slide'.$carousel_fade.'"';
$section_data   = ($interval > 0) ? 'data-ride="carousel" data-interval="'.$interval.'"' : '';
?>
<section <?php echo $section_id.' '.$section_class.' '.$section_data;?>>

    <?php if($navigation_bot): ?>
        <ol class="carousel-indicators">
            <?php foreach($images as $i => $image): ?>
                <li data-target="<?php echo '#'.$id;?>" data-slide-to="<?php echo $i; ?>" <?php echo ($i ? '': 'class="active"'); ?>></li>
            <?php endforeach; ?>
        </ol>
    <?php endif; ?>
    <div class="carousel-inner">
        <?php foreach($images as $i => $image): ?>
            <div class="carousel-item item <?php echo ($i ? '': 'active') ?>" style="background-image: url('<?php echo JURI::base(true).$image['background']; ?>');">
                <?php if(!empty($image['body'])): ?>
                    <div class="caption">
                        <?php echo $image['body']; ?>
                    </div>
                <?php endif; ?>
                <?php if(!empty($image['title']) || !empty($image['text'])): ?>
                    <div class="carousel-caption">
                        <?php echo (empty($image['title']) ? '': '<h3>'.$image['title'].'</h3>') ?>
                        <?php echo (empty($image['text']) ? '': '<p>'.$image['text'].'</p>') ?>
                    </div>
                <?php endif; ?>
            </div>
        <?php endforeach; ?>
    </div>
    <?php if($navigation_side): ?>
        <a class="left carousel-control" href="<?php echo '#'.$id;?>" data-slide="prev"><span class="fa fa-chevron-left"></span></a>
        <a class="right carousel-control" href="<?php echo '#'.$id;?>" data-slide="next"><span class="fa fa-chevron-right"></span></a>
    <?php endif; ?>
</section>
