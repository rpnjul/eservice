<script type="text/javascript">
    $(document).ready(function() {
        $('#menu_list8').show();
    });
</script>

<div id="article">
    <h2 class="page_title">Order Detail</h2>
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


                    <!-- Table -->

                    <table width="100%">
                        <tr >
                            <td >Code</td><td><?php echo $order['code']; ?></td>
                        </tr>
                        <tr>
                            <td>Date</td><td><?php echo $this->general->humanDate2($order['order_date']); ?></td>
                        </tr>
                        <tr>
                            <td>Total</td><td>Rp.<?php echo number_format($order['total']); ?></td>
                        </tr>
                        <tr>
                            <td>Due Date</td><td><?php echo $this->general->humanDate2($order['payment_deadline']); ?></td>
                        </tr>
                        <tr>
                            <td>Method</td><td><?php echo $paymentMethods[$order['payment_method']]; ?></td>
                        </tr>
                        <tr>
                            <td>Status</td><td><?php echo $status[$order['status']]; ?></td>
                        </tr>
                        <tr>
                            <td>Full Name</td><td><?php echo $user['full_name']; ?></td>
                        </tr>
                        <tr>
                            <td>Phone Number</td><td><?php echo $user['phone']; ?></td>
                        </tr>
                        <tr>
                            <td>Email</td><td><?php echo $user['email']; ?></td>
                        </tr>
                        <tr>
                            <td>Address</td><td><?php echo $user['address']; ?></td>
                        </tr>
                    </table>
                    <br/>
                    <h2 class="page_title"><u>Detail Items</u></h2>
                    <div class="table">
                        <table width="100%">
                            <tr >

                                <td>Title</td>
                                <td>Qty</td>
                                <td>Price</td>
                                <td>Total</td>

                            </tr>

                            <?php $i = 1; ?>

                            <?php foreach ($orderDetails as $orderDetail): ?>



                                <tr>

                                    <td><?php echo $orderDetail['name']; ?></td>
                                    <td><?php echo $orderDetail['qty'] ?></td>
                                    <td style="text-align:right">Rp.<?php echo $this->cart->format_number($orderDetail['net_price']); ?></td>
                                    <td style="text-align:right">Rp.<?php echo $this->cart->format_number($orderDetail['net_price'] * $orderDetail['qty']); ?></td>

                                </tr>

                                <?php $i++; ?>

                            <?php endforeach; ?>

                            <tr>
                                <td colspan="3" class="cart_total"><span class="red">TOTAL:</span></td>
                                <td style="text-align:right">Rp.<?php echo $this->cart->format_number($order['total']); ?></td>                
                            </tr>                  

                        </table>
                    </div>
                    <br/>
                    <h2 class="page_title"><u>Confirmation Data</u></h2>
                    <?php if ($order['status'] == 2 || $order['status'] == 2): ?>

                        <div class="row addedit_content">
                            <?php echo form_open('player/orders/approve') ?>
                            <?php echo form_hidden('id', $confirmation['id']); ?>
                            <?php if (validation_errors()): ?>
                                <div class="error_field">
                                    <?php echo validation_errors(); ?>
                                </div>
                            <?php endif ?>
                            <!-- Form -->

                            <fieldset>
                                <h2> Kerjakan Tugas? </h2>
                                <div class="row form clearfix">
                                    <div class="label">&nbsp;</div>
                                    <div class="input">
                                        <?php echo anchor('player/orders', 'Back'); ?> | <button class="green_bt">Approce this Order !</button>

                                    </div>
                                </div>

                        </div>
                        <!-- End Form -->



                        
                        <?php echo form_close(); ?>
                    <?php else: ?>
                        <p style="color: red"></p>
                    <?php endif; ?>
                </div>
                
                    <?php if ($order['status'] == 3 || $order['status'] == 3): ?>

                        <div class="row addedit_content">
                            <?php echo form_open('player/orders/success') ?>
                            <?php echo form_hidden('id', $confirmation['id']); ?>
                            <?php if (validation_errors()): ?>
                                <div class="error_field">
                                    <?php echo validation_errors(); ?>
                                </div>
                            <?php endif ?>
                            <!-- Form -->

                            
                                <h2> Tugas Telah Selesai? </h2>
                                <div class="row form clearfix">
                                    <div class="label">&nbsp;</div>
                                    <div class="input">
                                        <?php echo anchor('player/orders', 'Kembali	'); ?> | <button class="green_bt">Ya</button>

                                    </div>
                                </div>

                        </div>
                        <!-- End Form -->



                        </fieldset>
                        <?php echo form_close(); ?>
                    <?php else: ?>
                        <p style="color: red"></p>
                    <?php endif; ?>
                </div>
                <div id="result"></div>
            </div></div></div>
</div>

<!--end #article-->