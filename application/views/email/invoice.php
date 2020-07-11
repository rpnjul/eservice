Hallo <strong><?php echo $this->session->userdata('email'); ?></strong>,<br/>
Below is your order data at Tokokita.com :<br/>
<table>
    <tr >
        <td >Code</td><td><?php echo $order['code']; ?></td>
    </tr>
    <tr>
        <td>Date</td><td><?php echo $order['order_date']; ?></td>
    </tr>
    <tr>
        <td>Total</td><td><?php echo $order['total']; ?></td>
    </tr>
    <tr>
        <td>Due Date</td><td><?php echo $order['payment_deadline']; ?></td>
    </tr>
    <tr>
        <td>Method</td><td><?php echo $paymentMethods[$order['payment_method']]; ?></td>
    </tr>
    <tr>
        <td>Status</td><td><?php echo $status[$order['status']]; ?></td>
    </tr>
</table>
<h3>Detail Items</h3>
<table class="cart_table">
    <tr class="cart_title">

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
            <td style="text-align:right"><?php echo $this->cart->format_number($orderDetail['net_price']); ?></td>
            <td style="text-align:right"><?php echo $this->cart->format_number($orderDetail['net_price'] * $orderDetail['qty']); ?></td>

        </tr>

        <?php $i++; ?>

    <?php endforeach; ?>

    <tr>
        <td colspan="3" class="cart_total"><span class="red">TOTAL:</span></td>
        <td style="text-align:right"><?php echo $this->cart->format_number($order['total']); ?></td>                
    </tr>                  

</table>
<br/>
Please transfer to our bank account, and confirm it soon. Thanks for shopping.

<br/>
<br/>
Regard,
<br/><br/><br/>

<?php echo $this->general->getSetting('Site.Name');?>
