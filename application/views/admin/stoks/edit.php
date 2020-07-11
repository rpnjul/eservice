<script type="text/javascript">
    $(document).ready(function() {
        $('#menu_list3').show();
    });
</script>
<?php echo initialize_tinymce() ?>
<div id="article">
    <h2 class="page_title">Edit Page</h2>
    <div class="inner_1"><div class="inner_2"><div class="inner_3"><div class="inner_4 clearfix">


                    <div class="row addedit_content">


                        <?php echo form_open_multipart('admin/stoks/edit') ?>
                        <?php echo form_hidden('id', $stok['id']); ?>

                        <fieldset>
                            <div class="row form clearfix">
                                <div class="label"><span class="required_mark">*</span><label for="post_ttl">Code</label></div>

                                <div class="input full">
                                    <div class="input select">
                                        <?php echo form_input(array('name' => 'code', 'value' => set_value('code', isset($stok['code']) ? $stok['code'] : ''), 'class' => 'field size1')) ?>
                                        <div class="error-message"><?php echo form_error('code'); ?></div>
                                    </div>
                                </div>
                            </div>		

                            <div class="row form clearfix">
                                <div class="label"><span class="required_mark">*</span><label for="post_ttl">Name</label></div>

                                <div class="input full">
                                    <div class="input select">
                                        <?php echo form_input(array('name' => 'name', 'value' => set_value('name', isset($stok['name']) ? $stok['name'] : ''), 'class' => 'field size1')); ?>
                                        <div class="error-message"><?php echo form_error('name'); ?></div>
                                    </div>
                                </div>
                            </div>	
                            <div class="row form clearfix">
                                <div class="label"><span class="required_mark">*</span><label for="post_ttl">Price</label></div>

                                <div class="input full">
                                    <div class="input select">
                                        <?php echo form_input(array('name' => 'price', 'value' => set_value('price', isset($stok['price']) ? $stok['price'] : ''), 'class' => 'field size1')); ?>
                                        <div class="error-message"><?php echo form_error('price'); ?></div>
                                    </div>
                                </div>
                            </div>	
                            <div class="row form clearfix">
                                <div class="label"><label for="post_ttl">Discount Percent</label></div>

                                <div class="input full">
                                    <div class="input select">
                                        <?php echo form_input(array('name' => 'discount_percent', 'value' => set_value('discount_percent', isset($stok['discount_percent']) ? $stok['discount_percent'] : ''), 'class' => 'field size1')); ?>
                                        <div class="error-message"><?php echo form_error('discount_percent'); ?></div>
                                    </div>
                                </div>
                            </div>		

                            <div class="row form clearfix">
                                <div class="label"><span class="required_mark">*</span><label for="post_ttl">Stock</label></div>

                                <div class="input full">
                                    <div class="input select">
                                        <?php echo form_input(array('name' => 'stock', 'value' => set_value('stock', isset($stok['stock']) ? $stok['stock'] : ''), 'class' => 'field size1')); ?>
                                        <div class="error-message"><?php echo form_error('stock'); ?></div>
                                    </div>
                                </div>
                            </div>		

                            <div class="row form clearfix">
                                <div class="label"><label for="post_ttl">Description</label></div>

                                <div class="input full">
                                    <div class="input select">
                                        <?php echo form_textarea(array('name' => 'description', 'value' => set_value('description', isset($stok['description']) ? $stok['description'] : ''), 'class' => 'field size1')); ?>
                                        <div class="error-message"><?php echo form_error('description'); ?></div>
                                    </div>
                                </div>
                            </div>
                            <div class="row form clearfix">
                                <div class="label"><span class="required_mark">*</span><label for="post_ttl">Category</label></div>

                                <div class="input full">
                                    <div class="input select">
                                        <?php echo form_dropdown('category_id', $categories, $stok['category_id']); ?>
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