<script type="text/javascript">
    $(document).ready(function() {
        $('#menu_list10').show();
    });
</script>
<div id="article">
    <h2 class="page_title">Edit Setting</h2>
    <div class="inner_1"><div class="inner_2"><div class="inner_3"><div class="inner_4 clearfix">


                    <div class="row addedit_content">

                        <?php echo form_open('admin/settings/edit') ?>
                        <?php echo form_hidden('id', $setting['id']); ?>
                        <fieldset>
                            <!-- Form -->
                            <div class="row form clearfix">
                                <div class="label"><label for="post_ttl">Key</label></div>
                                <div class="input full">
                                    <div class="input text required">
                                        <?php echo form_input(array('name' => 'key', 'value' => set_value('key', isset($setting['key']) ? $setting['key'] : ''), 'class' => 'field size1', 'disabled' => true)); ?>
                                        <div class="error-message"><?php echo form_error('key'); ?></div>
                                    </div>
                                </div>
                            </div>        	

                            <div class="row form clearfix">
                                <div class="label"><label for="post_ttl">Value</label></div>
                                <div class="input full">
                                    <div class="input text required">
                                        <?php echo form_input(array('name' => 'value', 'value' => set_value('value', isset($setting['value']) ? $setting['value'] : ''), 'class' => 'field size1')); ?>
                                        <div class="error-message"><?php echo form_error('value'); ?></div>
                                    </div>
                                </div>
                            </div>        	

                            <div class="row form clearfix">
                                <div class="label"><label for="post_ttl">Description</label></div>
                                <div class="input full">
                                    <div class="input text required">
                                        <?php echo form_textarea(array('name' => 'description', 'class' => 'field size1', 'value' => set_value('description', isset($setting['description']) ? $setting['description'] : '') ? $setting['description'] : '')); ?>
                                        <div class="error-message"><?php echo form_error('description'); ?></div>
                                    </div>
                                </div>
                            </div>        	



                            <div class="row form clearfix">
                                <div class="label">&nbsp;</div>
                                <div class="input">
                                    <button class="green_bt">Save</button>

                                </div>
                            </div>
                        </fieldset>
                        <?php echo form_close(); ?>
                    </div>
                    <div id="result"></div>
                </div></div></div>
    </div>
</div>

<!--end #article-->