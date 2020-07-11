<div class="span12">
     <ul class="breadcrumb">
		<li><a href="<?php echo base_url()?>">Home</a></li> / 
		<li>Profile</li>
	</ul>
    <div class="page-header">
        <h1>Profile</h1>
    </div>
    <form class="form-horizontal" method="post" action="<?php echo site_url('users/profile'); ?>">
        <fieldset>

            <div class="control-group">
                <label for="focusedInput" class="control-label">Full name:</label>
                <div class="controls">
                    <input type="text" class="input-xlarge focused span6" name="full_name" value="<?php echo set_value('full_name', isset($user['full_name']) ? $user['full_name'] : ''); ?>"/>
                </div>
            </div>  

            <div class="control-group">
                <label for="focusedInput" class="control-label">Email:</label>
                <div class="controls">
                    <input type="text" class="input-xlarge focused span6" name="email" value="<?php echo set_value('email', isset($user['email']) ? $user['email'] : ''); ?>" />
                </div>
            </div>
            <div class="control-group">
                <label for="focusedInput" class="control-label">Password:</label>
                <div class="controls">
                    <input type="password" class="input-xlarge focused span6" name="password" value="" />
                </div>
            </div>
            <div class="control-group">
                <label for="focusedInput" class="control-label">Confirm Password:</label>
                <div class="controls">
                    <input type="password" class="input-xlarge focused span6" name="confirm_password" value="" />
                </div>
            </div>
            <div class="control-group">
                <label for="focusedInput" class="control-label">Phone:</label>
                <div class="controls">
                    <input type="text" class="input-xlarge focused span6" name="phone" value="<?php echo set_value('phone', isset($user['phone']) ? $user['phone'] : ''); ?>" />
                </div>
            </div>
            <div class="control-group">
                <label for="focusedInput" class="control-label">Zip:</label>
                <div class="controls">
                    <input type="text" class="input-xlarge focused span6" name="zip" value="<?php echo set_value('zip', isset($user['zip']) ? $user['zip'] : ''); ?>" />
                </div>
            </div>
            <div class="control-group">
                <label for="focusedInput" class="control-label">Address:</label>
                <div class="controls">
                    <textarea class="input-xlarge focused span6" name="address"><?php echo set_value('address', isset($user['address']) ? $user['address'] : ''); ?></textarea>
                </div>
            </div>
             <div class="span8">
                <button class="btn btn-primary pull-right"  type="submit">Save</button>
            </div>  
        </fieldset>
        <?php echo form_close(); ?>
</div>