<script type="text/javascript">
    $(document).ready(function() {
        $('#menu_list1').show();
    });
</script>
<?php echo initialize_tinymce() ?>
<div id="article">
    <h2 class="page_title">Edit Page</h2>
    <div class="inner_1"><div class="inner_2"><div class="inner_3"><div class="inner_4 clearfix">


                    <div class="row addedit_content">

                        <?php echo form_open('admin/pages/edit') ?>
                        <?php echo form_hidden('id', $page['id']) ?>
                     
                        <fieldset>
                            <div class="row form clearfix">
                                <div class="label"><span class="required_mark">*</span><label for="post_ttl">Title</label></div>
                                <div class="input full">
                                    <div class="input text required">
                                        <?php echo form_input(array('name' => 'title', 'value' => set_value('title', isset($page['title']) ? $page['title'] : ''), 'class' => 'field size1')); ?>
                                        <div class="error-message"><?php echo form_error('title'); ?></div>
                                    </div>
                                </div>
                            </div>

                            <div class="row form clearfix">
                                <div class="label"><span class="required_mark">*</span><label for="post_ttl">Body</label></div>
                                <div class="input full">
                                    <div class="input textarea required">
                                        <?php echo form_textarea(array('name' => 'body', 'value' => set_value('body', isset($page['body']) ? $page['body'] : '') ? $page['body'] : '', 'class' => 'field size1')); ?>
                                        <div class="error-message"><?php echo form_error('body'); ?></div>
                                    </div>
                                </div>
                            </div>
                            <div class="row form clearfix">
                                <div class="label"><span class="required_mark">*</span><label for="post_ttl">Status</label></div>

                                <div class="input full">
                                    <div class="input select">
                                        <?php echo form_dropdown('status', $status, $page['status']); ?>
                                        <div class="error-message"><?php echo form_error('status'); ?></div>
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