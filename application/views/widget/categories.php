<?php $categories = $this->general->getCategories() ?>

<div class="span3">
    <ul class="breadcrumb">
        <li>Categories</li>
    </ul>
    <div class="span3 product_list">
        <ul class="nav">
            <?php if ($categories): ?>
                <?php foreach ($categories as $category): ?>
                    <li><?php echo anchor('products/category/' . $category['permalink'], $category['name']); ?></li>
                <?php endforeach; ?>
            <?php endif; ?>

        </ul>
    </div>

</div>