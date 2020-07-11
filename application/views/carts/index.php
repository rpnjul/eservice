<div class="span12">
    <ul class="breadcrumb">
		<li><a href="<?php echo base_url();?>">Home</a></li> / 
		<li>Cart</li>
	</ul>
    <div class="page-header">
        <h1> Keranjang (Cart)</h1>
    </div>
    <?php if ($this->cart->contents()): ?>
        <?php echo form_open('carts/update'); ?>
        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>Name</th>
                   <th>Quantity</th>
                    <th>Price</th>
                    <th>Total</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php $i = 1; ?>

                <?php foreach ($this->cart->contents() as $items): ?>

                    <?php echo form_hidden($i . '[rowid]', $items['rowid']); ?>
                    <tr>

						 <td><?php echo $items['name']; ?></td>
                         <td><?php echo form_input(array('name' => $i . '[qty]', 'value' => $items['qty'], 'class' => 'input-mini')); ?></td>
                        <td><?php echo number_format($items['price']); ?></td>
                        <td><?php echo number_format($items['subtotal']); ?></td>
                        <td><a href="<?php echo site_url('carts/delete/' . $items['rowid']); ?>" onclick="return confirm('Are you sure want to delete this?')">Hapus</a></td>
                    
					</tr>			
                    <?php $i++; ?>

                <?php endforeach; ?>
                <tr>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
					<td>&nbsp;</td>
                    <td><strong><?php echo number_format($this->cart->total()); ?></strong></td>
                </tr>		  
            </tbody>
        </table>
        <div class="row">
            <div class="span7">
                <button class="btn btn-primary" type="submit">Update</button>
            </div>		  
            <div class="span2">
                <a href="<?php echo site_url('products'); ?>" class="btn btn-primary">Back to Services</a>
            </div>		  
            <div class="span7">
                <a href="<?php echo site_url('orders/checkout'); ?>" class="btn btn-primary pull-right">Lanjut Proses</a>
            </div>
        </div>
        <?php echo form_close(); ?>
    <?php else: ?>
        <div class="row">
            <div class="span12">
                Keranjang Anda Kosong
            </div>
        </div>
        <div class="row">
            <div class="span5">
                &nbsp;
            </div>		  
            <div class="span2">
                <a href="<?php echo site_url('products'); ?>" class="btn btn-primary">&lt; Kembali Memesan</a>
            </div>		  
            <div class="span5">
                &nbsp;
            </div>
        </div>
    <?php endif; ?>




</div>