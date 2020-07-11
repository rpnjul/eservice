<div class="span12">
    <?php echo set_breadcrumb('<span class="divider">/</span>') ?>
    <div class="page-header">
        <h1>Forgot Password</h1>
    </div>
    <?php echo form_open('users/forgot_password'); ?>
    <fieldset>

        <div class="control-group">
            <label for="focusedInput" class="control-label">Email:</label>
            <div class="controls">
                <input type="text" class="input-xlarge focused span6" name="email" value="<?php echo set_value('email'); ?>" />
            </div>
        </div>

        <div class="form_row">
            <label class="contact">&nbsp;</label>
            <input type="Submit" class="btn btn-primary" value="Send"/>
        </div>      
    </fieldset>
    <?php echo form_close(); ?>
</div>