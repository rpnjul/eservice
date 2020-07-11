<script type="text/javascript">
    $(document).ready(function() {
        $('#menu_list10').show();
    });
</script>
<h2 class="page_title">Job History</h2>
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
            <form id="ArticleIndexForm" method="get" action="<?php echo site_url('admin/orders/index'); ?>" accept-charset="utf-8">
                <div class="input text"><input name="q" type="text" value="<?php echo $this->input->get('q'); ?>" id="ArticleQ" /></div>            
                <button class="green_bt">Search</button>
            </form>        
        </div>



    </div>
    <table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>
            <th>Order ID</th>
            <th>Order Date</th>
            <th>Total</th>
            <th>Due Date</th>
            <th>Method</th>
            <th>Status</th>
            <th>Action</th>
        </tr>
        <?php if ($orders): ?>

            <?php foreach ($orders as $h): ?>
                <tr>
                    <td><?php echo $h['code']; ?></td>
                    <td><?php echo $h['order_date'] ?></td>
                    <td><?php echo $h['total']; ?></td>
                    <td><?php echo $h['payment_deadline'] ?></td>
                    <td><?php 
                                if ($h['payment_method'] == 1){
                                    echo 'Bank Transfer';
                                } ?>
                    </td>
                    <td><?php 
                                if ($h['status'] == 1){
                                    echo 'Selesai Dilakukan';
                                } else if ($h['status'] == 2){
                                    echo 'Belum Dilakukan';
                                }
								else{
									echo 'Sedang Dilakukan';
								}
                                
                                 ?>
                    </td>
                    <td>
                        <a href="<?php echo base_url()?>index.php/player/orders/detail/<?php echo $h['id']; ?>">Detail</a>
                    </td>
                </tr>

            <?php endforeach; ?>
        <?php else: ?>
            <tr>
                    <td colspan="7"><strong>Belum Ada Riwayat Pekerjaan</strong></td>
            </tr>
        <?php endif; ?>
    </table>

    <div class="paging">
        <?php echo $pagination ?>    
    </div>
</div>                    

<!--end #article-->