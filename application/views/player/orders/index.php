<script type="text/javascript">
    $(document).ready(function() {
        $('#menu_list8').show();
    });
</script>
<h2 class="page_title">Orders</h2>
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
<div class="table_row">
    <div class="row clearfix">

        <div class="search">
            <form id="ArticleIndexForm" method="get" action="<?php echo site_url('player/orders/index'); ?>" accept-charset="utf-8">
                <div class="input text"><input name="q" type="text" value="<?php echo $this->input->get('q'); ?>" id="ArticleQ" /></div>            
                <button class="green_bt">Search</button>
            </form>        
        </div>



    </div>
    <table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>
            <th>Code</th>
            <th>Date</th>
            <th>Total</th>
            <th>Due Date</th>
            <th>Method</th>
            <th>Status</th>
            <th width="110" class="ac">Action</th>
        </tr>
        <?php if ($orders): ?>

            <?php foreach ($orders as $order): ?>
                <tr>
                    <td><?php echo $order['code']; ?></td>
                    <td><?php echo $this->general->humanDate2($order['order_date']); ?></td>
                    <td><?php echo number_format($order['total']); ?></td>
                    <td><?php echo $this->general->humanDate2($order['payment_deadline']); ?></td>
                    <td><?php echo $paymentMethods[$order['payment_method']]; ?></td>
                    <td><?php echo $status[$order['status']]; ?></td>
                    <td>
                        <a href="<?php echo base_url() ?>index.php/player/orders/detail/<?php echo $order['id']; ?>" class="ico edit">Detail </a>
                    </td>
                </tr>

            <?php endforeach; ?>
        <?php else: ?>
            <tr>
                    <td colspan="7" align="center"><strong>Tidak ada Order yang tersedia</strong></td>
            </tr>
        <?php endif; ?>
    </table>

    <div class="paging">
        <?php echo $pagination ?>    
    </div>
</div>                    

<!--end #article-->