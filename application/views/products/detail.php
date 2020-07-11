<!-- Start Sidebar -->
<?php $this->load->view('widget/categories'); ?>
<!-- End Sidebar -->

<div class="span9 popular_products">

<ul class="breadcrumb">
<li><a href="<?php echo base_url();?>">Home</a></li> / 
<li><a href="<?php echo base_url();?>products">Services</li></a> / 
<li><?php echo $product['name'] ?></li>
</ul>



    <div class="row">
        <div class="span9">
            <h1><?php echo $product['name'] ?></h1>
        </div>
    </div>
    <hr>

    <div class="row">
        <div class="span3">
            <?php
            $media = $this->general->getSingleMedia('product', $product['id']);
            ?>
            <?php if (!empty($media['path'])): ?>
                <img src="<?php echo base_url(); ?>timthumb.php?src=<?php echo base_url() . $media['path'] ?>&h=275&w=220"/>
            <?php else: ?>
                <img alt="" src="http://placehold.it/220x275">
            <?php endif; ?>


        </div>	 

        <div class="span6">

            <div class="span6">
                <address>

                    <strong>Title:</strong> <span><?php echo $product['name'] ?></span><br />
                    <strong>Kode Services:</strong> <span><?php echo $product['code'] ?> </span><br />
                    <?php if ($product['stock'] <= 0): ?>
                        <strong>Ketersediaan:</strong> <span>Tidak Bisa di Pesan</span><br />
                    <?php else: ?>
                        <strong>Ketersediaan:</strong> <span>Bisa Dipesan</span><br />
                    <?php endif; ?>
                </address>
            </div>	
			
            <div class="span6">
                <h2>
                    <small>Price : <?php echo number_format($product['price']) ?> <?php if ($product['discount_percent'] > 0): ?> Discount : <?php echo $product['discount_percent'] ?> % <?php endif ?></small><br/>
                    <strong>Net Price: Rp.<?php echo number_format($product['net_price']) ?> </strong> <br />
                </h2>
            </div>	

            <div class="span6">

                <div class="span3 no_margin_left">
				 <?php if ($product['stock'] <= 0): ?>
					<b>Maaf Tidak Bisa DiPesan</b>
				<?php else:?>
                    <a href="<?php echo site_url('products/add_cart/' . $product['permalink']); ?>" class="btn btn-primary">Masukan Keranjang</a>
                <?php endif;?>
				</div>	

            </div>	




        </div>	


    </div>
    <hr>
    <div class="row">
        <div class="span9">
            <div class="tabbable">
                <ul class="nav nav-tabs">
                    <li class="active"><a href="#1" data-toggle="tab">Description</a></li>

                    <li><a href="#2" data-toggle="tab">Related Services</a></li>
                </ul>
                <div class="tab-content">
                    <div class="tab-pane active" id="1">
                        <?php echo $product['description'] ?>
                    </div>

                    <div class="tab-pane" id="2">
                        <ul class="thumbnails related_products">
                            <?php $relatedBooks = $this->general->getProductsByCategoryId($product['category_id']) ?>

                            <?php if ($relatedBooks): ?>
                                <?php foreach ($relatedBooks as $product): ?>
                                    <li class="span2">
                                        <div class="thumbnail">
                                            <a href="<?php echo base_url() ?>index.php/products/detail/<?php echo $product['permalink']; ?>">
                                                <?php
                                                $media = $this->general->getSingleMedia('product', $product['id']);
                                                ?>
                                                <?php if (!empty($media['path'])): ?>
                                                    <img src="<?php echo base_url(); ?>timthumb.php?src=<?php echo base_url() . $media['path'] ?>&h=275&w=220"/>
                                                <?php else: ?>
                                                    <img alt="" src="http://placehold.it/220x275">
                                                <?php endif; ?>
                                            </a>
                                            <div class="caption">
                                                <a href="<?php echo base_url() ?>index.php/products/detail/<?php echo $product['permalink']; ?>"> <h5><?php echo $product['name']; ?></h5></a> Rp.<?php echo number_format($product['net_price']) ?><br /><br />
                                            </div>
                                        </div>
                                    </li>

                                <?php endforeach; ?>
                            <?php endif; ?>


                        </ul>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>