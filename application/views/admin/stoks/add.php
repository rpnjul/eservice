<script type="text/javascript">
    $(document).ready(function() {
        $('#menu_list3').show();
    });
</script>
<?php echo initialize_tinymce() ?>
<div id="article">
    <h2 class="page_title">Create Stok</h2>
    <div class="inner_1"><div class="inner_2"><div class="inner_3"><div class="inner_4 clearfix">


                    <div class="row addedit_content">

                        <?php echo form_open_multipart('admin/stoks/add') ?>

                        <fieldset>
                            <div class="row form clearfix">
                                <div class="label"><span class="required_mark">*</span><label for="post_ttl">Code</label></div>

                                <div class="input full">
                                    <div class="input select">
                                        <?php echo form_input(array('name' => 'code', 'value' => set_value('code'), 'class' => 'field size1')); ?>
                                        <div class="error-message"><?php echo form_error('code'); ?></div>
                                    </div>
                                </div>
                            </div>		

                            <div class="row form clearfix">
                                <div class="label"><span class="required_mark">*</span><label for="post_ttl">Name</label></div>

                                <div class="input full">
                                    <div class="input select">
                                        <?php echo form_input(array('name' => 'name', 'value' => set_value('name'), 'class' => 'field size1')); ?>
                                        <div class="error-message"><?php echo form_error('name'); ?></div>
                                    </div>
                                </div>
                            </div>	
                            <div class="row form clearfix">
                                <div class="label"><span class="required_mark">*</span><label for="post_ttl">Price</label></div>

                                <div class="input full">
                                    <div class="input select">
                                        <?php echo form_input(array('name' => 'price', 'value' => set_value('price'), 'class' => 'field size1')); ?>
                                        <div class="error-message"><?php echo form_error('price'); ?></div>
                                    </div>
                                </div>
                            </div>	
                            <div class="row form clearfix">
                                <div class="label"><label for="post_ttl">Discount Percent</label></div>

                                <div class="input full">
                                    <div class="input select">
                                        <?php echo form_input(array('name' => 'discount_percent', 'value' => set_value('discount_percent'), 'class' => 'field size1')); ?>
                                        <div class="error-message"><?php echo form_error('discount_percent'); ?></div>
                                    </div>
                                </div>
                            </div>		

                            <div class="row form clearfix">
                                <div class="label"><span class="required_mark">*</span><label for="post_ttl">Stock</label></div>

                                <div class="input full">
                                    <div class="input select">

                                        <?php echo form_input(array('name' => 'stock', 'value' => set_value('stock'), 'class' => 'field size1')); ?>
                                        <div class="error-message"><?php echo form_error('stock'); ?></div>
                                    </div>
                                </div>
                            </div>		

                            <div class="row form clearfix">
                                <div class="label"><label for="post_ttl">Description</label></div>

                                <div class="input full">
                                    <div class="input select">
                                        <?php echo form_textarea(array('name' => 'description', 'value' => set_value('description'), 'cols' => 50, 'class' => 'field size1')); ?>
                                        <div class="error-message"><?php echo form_error('description'); ?></div>
                                    </div>
                                </div>
                            </div>	
                            <div class="row form clearfix">
                                <div class="label"><span class="required_mark">*</span><label for="post_ttl">Category</label></div>

                                <div class="input full">
                                    <div class="input select">
                                        <?php echo form_dropdown('category_id', $categories); ?>
                                        <div class="error-message"><?php echo form_error('category_id'); ?></div>
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