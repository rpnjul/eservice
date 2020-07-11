<!-- Start Sidebar -->
<?php $this->load->view('widget/categories'); ?>
<!-- End Sidebar -->
<!-- Start Slider -->
<?php $this->load->view('widget/slider'); ?>
<!-- End Slider -->
<div class="span9 popular_products">
    <?php $products = $this->general->getNewProducts(100); ?>

   <?php if ($products > 0): ?>

        <h4>Services</h4><br>
        <ul class="thumbnails">
            <?php foreach ($products as $product): ?>
                <li class="span2">
                    <div class="thumbnail">

                        <?php
                        $media = $this->general->getSingleMedia('product', $product['id']);
                        ?>
                        <?php if (!empty($media['path'])): ?>
                            <a href="<?php echo base_url() ?>index.php/products/detail/<?php echo $product['permalink'] ?>"><img src="<?php echo base_url(); ?>timthumb.php?src=<?php echo base_url() . $media['path'] ?>&h=275&w=220" alt="" title="" border="0"/></a>
                        <?php else: ?>
                            <a href="<?php echo base_url() ?>index.php/products/detail/<?php echo $product['permalink'] ?>"><img alt="" src="http://placehold.it/220x275"></a>
                        <?php endif; ?>
                        <div class="caption">
                            <a href="<?php echo base_url() ?>index.php/products/detail/<?php echo $product['permalink'] ?>"> <h5><?php echo $product['name']; ?></h5></a>  Price:Rp. <?php echo number_format($product['net_price']); ?> <br><br>
                        </div>
                    </div>
                </li>
            <?php endforeach; ?>

        </ul>
	<?php else: ?>
	</br></br></br>
	<h1 align="center"> MAAF TOKO SEDANG TUTUP </h1>
	<h4 align="center"> Toko Buka Pada Pukul 08:00 WIB s/d 15:00 WIB</h4>
    <?php endif; ?>
</div>
