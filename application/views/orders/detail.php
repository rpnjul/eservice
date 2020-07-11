<div class="span12">
    <?php echo set_breadcrumb('<span class="divider">/</span>') ?>
    <div class="page-header">
        <h1>Order Detail</h1>
    </div>
    <table class="table table-bordered table-striped">
        <tr >
            <td >Kode Pembayaran</td><td><?php echo $order['code']; ?></td>
        </tr>
        <tr>
            <td>Tanggal Transaksi</td><td><?php echo $this->general->humanDate2($order['order_date']); ?></td>
        </tr>
        <tr>
            <td>Total Yang Harus Dibayar</td><td><strong><?php echo number_format($order['total']); ?></strong></td>
        </tr>
        <tr>
            <td>Batas Pembayaran</td><td><?php echo $this->general->humanDate2($order['payment_deadline']); ?></td>
        </tr>
        <tr>
            <td>Metode Transaksi</td><td><?php echo $paymentMethods[$order['payment_method']]; ?></td>
        </tr>
        <tr>
            <td>Status</td><td><?php echo $status[$order['status']]; ?></td>
        </tr>
    </table>
    <h3>Detail Services</h3>
    <table class="table table-bordered table-striped">
        <thead>
            <tr>

                <th>Title</th>
                <th>Qty</th>
                <th>Price</th>
                <th>Total</th>

            </tr>
        </thead>

        <?php $i = 1; ?>

        <?php foreach ($orderDetails as $orderDetail): ?>



            <tr>

                <td><?php echo $orderDetail['name']; ?></td>
                <td><?php echo $orderDetail['qty'] ?></td>
                <td><?php echo number_format($orderDetail['net_price']); ?></td>
                <td style="text-align:right"><?php echo number_format($orderDetail['net_price'] * $orderDetail['qty']); ?></td>

            </tr>

            <?php $i++; ?>

        <?php endforeach; ?>

        <tr>
            <td colspan="3" style="text-align:right">TOTAL :</td>
            <td style="text-align:right"><strong><?php echo number_format($order['total']); ?></strong></td>                
        </tr>                  

    </table></br>
	<?php IF ($banyak >= 1): ?>
	<h3>Detail Item tambahan</h3>
    <table class="table table-bordered table-striped">
        <thead>
            <tr>

                <th>Title</th>
                <th>Qty</th>
                <th>Total</th>

            </tr>
        </thead>

        <?php $i = 1; ?>
        <?php foreach ($addonDetails as $addonDetail): ?>



            <tr>

                <td><?php echo $addonDetail['stok_name']; ?></td>
                <td><?php echo $addonDetail['qty'] ?></td>
                <td style="text-align:right"><?php echo number_format($addonDetail['stok_price']); ?></td>
                
				</tr>

            <?php $i++; ?>

        <?php endforeach; ?>

        <tr>
            <td colspan="2" style="text-align:left">TOTAL :</td>
            <td style="text-align:right"><strong><?php echo number_format($total); ?></strong></td>                
        </tr>                  

    </table>
	<?php endif; ?>
    <a href="<?php echo base_url() ?>index.php/orders/history" class="btn btn-primary">&lt; Back</a>



</div>	


