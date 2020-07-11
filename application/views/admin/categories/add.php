<script type="text/javascript">
    $(document).ready(function() {
        $('#menu_list4').show();
    });
</script>
<div id="article">
    <h2 class="page_title">New Category</h2>
    <div class="inner_1"><div class="inner_2"><div class="inner_3"><div class="inner_4 clearfix">


                    <div class="row addedit_content">
                        <?php echo form_open_multipart('admin/categories/add'); ?>     

                        <fieldset>
                            <div class="row form clearfix">
                                <div class="label"><span class="required_mark">*</span><label for="post_ttl">Name</label></div>
                                <div class="input full">
                                    <div class="input text required">
                                        <?php echo form_input(array('name' => 'name', 'value' => set_value('name'))); ?>
                                        <div class="error-message"><?php echo form_error('name'); ?></div>
                                    </div>
                                </div>
                            </div>
                            <div class="row form clearfix">
                                <div class="label"><label for="post_ttl">Description</label></div>
                                <div class="input full">
                                    <div class="input textarea required">
                                        <?php echo form_textarea(array('name' => 'description', 'value' => set_value('description'))); ?>
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
                            <?php echo form_close(); ?>
                        </fieldset>
                    </div>
                    <div id="result"></div>
                </div></div></div>
    </div>
</div>

<!--end #article-->
