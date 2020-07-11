<div class="span12">
    <ul class="breadcrumb">
		<li>Home</li> / 
		<li><a href="<?php echo base_url()?>carts">Carts</a></li> / 
		<li>Checkout</li>
	</ul>
    <div class="page-header">
        <h1>Checkout</h1>
    </div>
    <?php if ($this->cart->contents()): ?>

        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Quantity</th>
                    <th>Price</th>
                    <th>Total</th>

                </tr>
            </thead>
            <tbody>
                <?php $i = 1; ?>

                <?php foreach ($this->cart->contents() as $items): ?>


                    <tr>

                        <td><?php echo $items['name']; ?></td>
                        <td><?php echo $items['qty'] ?></td>
                        <td><?php echo number_format($items['price']); ?></td>
                        <td><?php echo number_format($items['subtotal']); ?></td> 

                    </tr>			
                    <?php $i++; ?>

                <?php endforeach; ?>
                <tr>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td><strong><?php echo number_format($this->cart->total()); ?></strong></td>
                </tr>		  
            </tbody>
        </table>
        <div class="row">
            <div class="span5">
                <a href="<?php echo site_url('carts'); ?>" class="btn btn-primary">&lt; Back</a>
            </div>		  
            <div class="span2">
                &nbsp;
            </div>		  
            <div class="span5">
                <a href="<?php echo site_url('orders/proceed'); ?>" class="btn btn-primary pull-right">Process Now</a>
            </div>
        </div>

    <?php else: ?>
        <div class="row">
            <div class="span12">
                Your shopping cart is empty !
            </div>
        </div>
        <div class="row">
            <div class="span5">
                &nbsp;
            </div>		  
            <div class="span2">
                <a href="<?php echo site_url('products'); ?>" class="btn btn-primary">&lt; Back to Shop</a>
            </div>		  
            <div class="span5">
                &nbsp;
            </div>
        </div>
    <?php endif; ?>




</div>