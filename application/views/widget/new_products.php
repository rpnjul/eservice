<div class="title"><span class="title_icon"><img src="<?php echo base_url() ?>public/front/images/bullet5.gif" alt="" title="" /></span>New Books</div> 

<?php $products = $this->general->getNewProducts() ?>

<ul class="list">
    <?php if ($products): ?>
    <?php foreach ($products as $product): ?>
            <li><?php echo anchor('products/detail/' . $product['permalink'], $product['name']); ?></li>
        <?php endforeach; ?>
    <?php endif; ?>

</ul>
