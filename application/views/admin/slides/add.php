<script type="text/javascript">
    $(document).ready(function() {
        $('#menu_list5').show();
    });
</script>
<?php //echo initialize_tinymce() ?>
<div id="article">
    <h2 class="page_title">Create Slide</h2>
    <?php if ($this->session->flashdata('success')): ?>
        <div class="success_msg">
            <span><?php echo $this->session->flashdata('success'); ?></span>
        </div>
    <?php endif; ?>
    <?php if ($this->session->flashdata('error')): ?>
        <div class="error_msg">
            <span><?php echo $this->session->flashdata('error'); ?></span>
        </div>
    <?php endif; ?>
    <div class="inner_1"><div class="inner_2"><div class="inner_3"><div class="inner_4 clearfix">


                    <div class="row addedit_content">
                        <?php echo form_open_multipart('admin/slides/add'); ?>     

                        <fieldset>
                            <div class="row form clearfix">
                                <div class="label"><span class="required_mark">*</span><label for="post_ttl">Title</label></div>
                                <div class="input full">
                                    <div class="input text required">
                                        <?php echo form_input(array('name' => 'title', 'value' => set_value('title'))); ?>
                                        <div class="error-message"><?php echo form_error('title'); ?></div>
                                    </div>
                                </div>
                            </div>
                            <div class="row form clearfix">
                                <div class="label"><span class="required_mark">*</span><label for="post_ttl">Description</label></div>
                                <div class="input full">
                                    <div class="input text required">
                                        <?php echo form_textarea(array('name' => 'description', 'value' => set_value('description'))); ?>
                                        <div class="error-message"><?php echo form_error('description'); ?></div>
                                    </div>
                                </div>
                            </div>

                            <div class="row form clearfix">
                                <div class="label"><span class="required_mark">*</span><label for="post_ttl">Image</label></div>
                                <div class="input full"><input type="file" name="image" id="ArticleImage" /></div>
                            </div>
                            <div class="row form clearfix">
                                <div class="label"><span class="required_mark">*</span><label for="post_ttl">Status</label></div>

                                <div class="input full">
                                    <div class="input select">
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