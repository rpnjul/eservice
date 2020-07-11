
<div id="article">
    <h2 class="page_title">Create User</h2>
    <div class="inner_1"><div class="inner_2"><div class="inner_3"><div class="inner_4 clearfix">


                    <div class="row addedit_content">
                        <?php echo form_open_multipart('admin/users/add'); ?>     

                        <fieldset>
                            <div class="row form clearfix">
                                <div class="label"><span class="required_mark">*</span><label for="post_ttl">Full Name</label></div>
                                <div class="input full">
                                    <div class="input text required">
                                        <?php echo form_input(array('name' => 'full_name', 'value' => set_value('full_name'))); ?>
                                        <div class="error-message"><?php echo form_error('full_name'); ?></div>
                                    </div>
                                </div>
                            </div>
                            <div class="row form clearfix">
                                <div class="label"><span class="required_mark">*</span><label for="post_ttl">Email</label></div>
                                <div class="input full">
                                    <div class="input text required">
                                        <?php echo form_input(array('name' => 'email', 'value' => set_value('email'))); ?>
                                        <div class="error-message"><?php echo form_error('email'); ?></div>
                                    </div>
                                </div>
                            </div>

                            <div class="row form clearfix">
                                <div class="label"><span class="required_mark">*</span><label for="post_ttl">Password</label></div>
                                <div class="input full">
                                    <div class="input text required">
                                        <?php echo form_password(array('name' => 'password')); ?>
                                        <div class="error-message"><?php echo form_error('password'); ?></div>
                                    </div>
                                </div>
                            </div>
                            <div class="row form clearfix">
                                <div class="label"><span class="required_mark">*</span><label for="post_ttl">Password Confirm</label></div>
                                <div class="input full">
                                    <div class="input text required">
                                        <?php echo form_password(array('name' => 'confirm_password')); ?>
                                        <div class="error-message"><?php echo form_error('confirm_password'); ?></div>
                                    </div>
                                </div>
                            </div>
                            <div class="row form clearfix">
                                <div class="label"><label for="post_ttl">Phone</label></div>
                                <div class="input full">
                                    <div class="input text required">
                                        <?php echo form_input(array('name' => 'phone', 'value' => set_value('phone'))); ?>
                                        <div class="error-message"><?php echo form_error('phone'); ?></div>
                                    </div>
                                </div>
                            </div>

                            <div class="row form clearfix">
                                <div class="label"><label for="post_ttl">Address</label></div>
                                <div class="input full">
                                    <div class="input text required">
                                        <?php echo form_input(array('name' => 'address', 'value' => set_value('address'))); ?>
                                        <div class="error-message"><?php echo form_error('address'); ?></div>
                                    </div>
                                </div>
                            </div>
                            <div class="row form clearfix">
                                <div class="label"><label for="post_ttl">Level</label></div>
                                <div class="input full">
                                    <div class="input text required">
                                        <?php echo form_dropdown('level', $level); ?>
                                        <div class="error-message"><?php echo form_error('level'); ?></div>
                                    </div>
                                </div>
                            </div>
                            <div class="row form clearfix">
                                <div class="label"><label for="post_ttl">Status</label></div>
                                <div class="input full">
                                    <div class="input text required">
                                        <?php echo form_dropdown('status', $status); ?>
                                        <div class="error-message"><?php echo form_error('status'); ?></div>
                                    </div>
                                </div>
                            </div>


                            <div class="row form clearfix">
                                <div class="label">&nbsp;</div>
                                <div class="input">
                                    <input type="submit" value="Save"/>

                                </div>
                            </div>
                            <?php echo form_close(); ?>
                        </fieldset>
                    </div>
                    <div id="result"></div>
                </div></div></div>
    </div>
</div>

<!--end #article-->