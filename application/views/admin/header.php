<title> EService</title>

<div id="header" class="clearfix">
    <h1><a href="<?php echo base_url(); ?>"><span>EService</span></a></h1>
    <div class="info">
        <h3>Administrator Panel</h3>
    </div>
    <div class="menu">
            <ul>
			<?php if ($this->session->userdata('id') == 1): ?>
				<?php if ($this->Product->cekServices() == 0): ?>
				<li><a href="<?php echo site_url('admin/products/open') ?>"  onclick="return confirm('Apa anda yakin ingin membuka orderan?')">Buka Order</a></li>
				<li><a href="<?php echo site_url('/');?>" target="_blank">View Site</a></li>
                <li><a href="<?php echo site_url('admin/users/profile');?>">Profile (<?php echo $this->session->userdata('full_name')?>)</a></li>
                <li><a href="<?php echo site_url('users/logout') ?>">Logout</a></li>
				<?php else: ?>
				<li><a href="<?php echo site_url('admin/products/close') ?>"  onclick="return confirm('Apa anda yakin ingin menutup orderan?')">Tutup Order</a></li>
				<li><a href="<?php echo site_url('/');?>" target="_blank">View Site</a></li>
                <li><a href="<?php echo site_url('admin/users/profile');?>">Profile (<?php echo $this->session->userdata('full_name')?>)</a></li>
                <li><a href="<?php echo site_url('users/logout') ?>">Logout</a></li>
				<?php endif; ?>
				<?php else: ?>
				<li><a href="<?php echo site_url('/');?>" target="_blank">View Site</a></li>
                <li><a href="<?php echo site_url('admin/users/profile');?>">Profile (<?php echo $this->session->userdata('full_name')?>)</a></li>
                <li><a href="<?php echo site_url('users/logout') ?>">Logout</a></li>
            <?php endif; ?>
			</ul>
        </div> 
</div>         <!--end #header-->

<div id="breadcrumbs" class="clearfix">
    <?php echo set_breadcrumb() ?>
</div>        <!--end #breadcrumbs-->
