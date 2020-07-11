<?php $slides = $this->general->getSlides(); ?>
<?php if (!empty($slides)): ?>
    <div class="span9">

        <div id="myCarousel" class="carousel slide">
            <div class="carousel-inner">

                <?php $slides = $this->general->getSlides(); ?>
                <?php $i = 1; ?>
                <?php foreach ($slides as $slide): ?>
                    <?php
                    if ($i == 1) {
                        $active = 'active';
                    } else {
                        $active = '';
                    }
                    ?>
                    <div class="item <?php echo $active; ?>">

                        <img alt="" src="<?php echo base_url(); ?>timthumb.php?src=<?php echo $slide['path'] ?>&w=1200&h=215" />
                        <div class="carousel-caption">
                            <h4><?php echo $slide['title'] ?></h4>
                            <p><?php echo $slide['description'] ?></p>
                        </div>
                    </div>
                    <?php $i++; ?>
                <?php endforeach; ?>
            </div>

            <a class = "left carousel-control" href = "#myCarousel" data-slide = "prev">‹</a>
            <a class = "right carousel-control" href = "#myCarousel" data-slide = "next">›</a>
        </div>
    </div>
<?php endif; ?>