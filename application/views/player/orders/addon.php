<script type="text/javascript">
    $(document).ready(function() {
        $('#menu_list2').show();
    });
</script>
<?php echo initialize_tinymce() ?>
<div id="article">
    <h2 class="page_title">Edit Page</h2>
    <div class="inner_1"><div class="inner_2"><div class="inner_3"><div class="inner_4 clearfix">


                    <div class="row addedit_content">


                        <?php echo form_open_multipart('player/orders/addon') ?>
                        

                        <fieldset>
                           	 <div class="row form clearfix">
                                <div class="label"><span class="required_mark">*</span><label for="post_ttl">Customer Name</label></div>

                                <div class="input full">
                                    <div class="input select">
                                        <?php echo form_input(array('name' => 'order_id', 'value' => set_value('order_id', isset($order['id']) ? $order['id'] : ''), 'class' => 'field size1')); ?>
                                        <div class="error-message"><?php echo form_error('order_id'); ?></div>
                                    </div>
                                </div>
                            </div>	
                            <div class="row form clearfix">
                                <div class="label"><span class="required_mark">*</span><label for="post_ttl">Customer Name</label></div>

                                <div class="input full">
                                    <div class="input select">
                                        <?php echo form_input(array('name' => 'username', 'value' => set_value('username', isset($user['full_name']) ? $user['full_name'] : ''), 'class' => 'field size1')); ?>
                                        <div class="error-message"><?php echo form_error('username'); ?></div>
                                    </div>
                                </div>
                            </div>	
							<div class="row form clearfix">
                                <div class="label"><span class="required_mark">*</span><label for="post_ttl">Stok Tersedia</label></div>
                                <div class="input full">
                                    <div class="input select">
                                        <select clas"form-control" name="stok" id="stok">
										<option value=""> Pilih Stok </option>
										<?php foreach($stok as $stoker):?>
											<option value="<?php echo $stoker->id; ?>"> <?php echo $stoker->name; ?> | Rp.<?php echo $this->cart->format_number($stoker->net_price);?> </option> 
										<?php endforeach; ?>
										
										</select>
                                    </div>
                                </div>
                            </div>
							 <div class="row form clearfix">
                                <div class="label"><span class="required_mark"></span><label for="post_ttl">Nama Stok</label></div>

                                <div class="input full">
                                    <div class="input select">
                                        <?php echo form_input(array('name' => 'name', 'value' => set_value('name'), 'class' => 'field size1')); ?>
                                        <div class="error-message"><?php echo form_error('name'); ?></div>
                                    </div>
                                </div>
                            </div>	
							<div class="row form clearfix">
                                <div class="label"><span class="required_mark"></span><label for="post_ttl">Harga Stok</label></div>

                                <div class="input full">
                                    <div class="input select">
                                        <?php echo form_input(array('name' => 'stok_price', 'value' => set_value('stok_price'), 'class' => 'field size1')); ?>
                                        <div class="error-message"><?php echo form_error('stok_price'); ?></div>
                                    </div>
                                </div>
                            </div>	
							<div class="row form clearfix">
                                <div class="label"><span class="required_mark"></span><label for="post_ttl">Jumlah</label></div>

                                <div class="input full">
                                    <div class="input select">
                                        <?php echo form_input(array('name' => 'qty', 'value' => set_value('qty'), 'class' => 'field size1')); ?>
                                        <div class="error-message"><?php echo form_error('qty'); ?></div>
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