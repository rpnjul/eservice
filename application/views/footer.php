<footer>
    <hr>
    <div class="row well no_margin_center">
        <div class="span3">
            <h4>Information</h4>
            <ul>
			<?php $pages = $this->general->getPages() ?>
			<?php foreach ($pages as $page): ?>
                <li><a href="<?php echo base_url() ?>index.php/pages/read/<?php echo $page['permalink']?>"><?php echo $page['title']?></a></li>
			<?php endforeach;?>
            </ul>
        </div>
        <div class="span3">
            <h4>Customer Service</h4>
            <ul>
                <li><a href="<?php echo base_url() ?>index.php/pages/read/contact">Contact us</a></li>

            </ul>
        </div>
		<div class="span3">
            <h4>Follow us</h4>
            <ul>
                <li><a href="#">Twitter</a></li>
				<li><a href="#">Facebook</a></li>
            </ul>
        </div>
        <div class="span2">
            <h4>My Account</h4>
            <ul>
                <?php if ($this->session->userdata('id')): ?>
                    <li><a href="<?php echo base_url() ?>index.php/orders/history">Order History</a></li>
                    <li> <a href="<?php echo base_url() ?>index.php/users/profile">Profile</a> </li> 
                    <li><a href="<?php echo base_url() ?>index.php/users/logout">Logout</a> </li>
                <?php else: ?>

                    <li><a href="<?php echo base_url() ?>index.php/users/register">Register</a> </li>
                    <li><a href="<?php echo base_url() ?>index.php/users/login">Login</a> </li>

                <?php endif; ?>
            </ul>
        </div>

    </div>
    <p class="pull-right">
        Developed by : Panjul

    </p>
</footer>
