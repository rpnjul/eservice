<div class="row">
    <div class="span12">
        <div class="navbar">
            <div class="navbar-inner">
                <div class="container" style="width: auto;">
                    <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </a>
                    <div class="nav-collapse">
                        <ul class="nav">
                            <li><a href="<?php echo base_url(); ?>">Home</a></li>
            <?php if ($this->session->userdata('id')): ?>
                            <li><a href="<?php echo base_url() ?>index.php/carts"> Cart (<?php echo $this->cart->total_items(); ?>)</a></li>
                            <li><a href="<?php echo base_url() ?>index.php/users/profile">Profile</a></li>
							<li><a href="<?php echo base_url() ?>index.php/orders/history">Order History</a></li>
                             <?php $pages = $this->general->getPages() ?>
								<?php foreach ($pages as $page): ?>
							<li><a href="<?php echo base_url() ?>index.php/pages/read/<?php echo $page['permalink']?>"><?php echo $page['title']?></a></li>
								<?php endforeach;?>
                            <li><a href="<?php echo base_url() ?>index.php/users/logout">Log Out (<?php echo $this->session->userdata('full_name')?>) </a></li>
            
			<?php else: ?>
							<li><a href="<?php echo base_url() ?>index.php/carts"> Cart (<?php echo $this->cart->total_items(); ?>)</a></li>
                            <?php $pages = $this->general->getPages() ?>
								<?php foreach ($pages as $page): ?>
							<li><a href="<?php echo base_url() ?>index.php/pages/read/<?php echo $page['permalink']?>"><?php echo $page['title']?></a></li>
								<?php endforeach;?>
                            <li><a href="<?php echo base_url() ?>index.php/users/login">Login / Register</a></li>
			<?php endif; ?> 
			
                        </ul>
                        <ul class="nav  pull-right">
                            <li class="divider-vertical"></li>
                            <form class="navbar-search" method="get" action="<?php echo site_url('products'); ?>">
                                <input class="search-query  span2" placeholder="Cari Produk ..." name="q" type="text"/>
                                <button class="btn btn-primary btn-small" type="submit">Go</button>
                            </form>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>