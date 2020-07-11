<div class="span12">
    <?php echo set_breadcrumb('<span class="divider">/</span>') ?>
    <div class="page-header">
        <h1>Reset Password</h1>
    </div>
    <?php echo form_open('users/reset_password') ?>
    <fieldset>

        <div class="control-group">
            <label for="focusedInput" class="control-label">Password:</label>
            <div class="controls">
                <input type="text" class="input-xlarge focused span6" name="email" value="<?php echo set_value('email', isset($user['email']) ? $user['email'] : ''); ?>" disabled="true" />
            </div>
        </div>
        <div class="control-group">
            <label for="focusedInput" class="control-label">Password:</label>
            <div class="controls">
                <input type="password" class="input-xlarge focused span6" name="password" />
            </div>
        </div>
        <div class="control-group">
            <label for="focusedInput" class="control-label">Confirm Password:</label>
            <div class="controls">
                <input type="password" class="input-xlarge focused span6" name="confirm_password" />
            </div>
        </div>

        <div class="form_row">
            <label class="contact">&nbsp;</label>
            <input type="Submit" class="btn btn-primary" value="Reset Passwod"/>
        </div>      
    </fieldset>
    <?php echo form_close(); ?>
</div>