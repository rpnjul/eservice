  <script type="text/javascript">
    $(document).ready(function() {
        $('#menu_list3').show();
    });
</script>
<h2 class="page_title">Stoks</h2>
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
<div id="result"></div>
<div class="table_row">
    <div class="row clearfix">

        <div class="search">
            <form id="ArticleIndexForm" method="get" action="<?php echo site_url('admin/stoks/index'); ?>" accept-charset="utf-8">
                <div class="input text"><input name="q" type="text" value="<?php echo $this->input->get('q'); ?>" id="ArticleQ" /></div>            
               <button class="green_bt">Search</button>
            </form>        
        </div>

        <div class="option">
            <a href="<?php echo site_url('admin/stoks/add'); ?>" class="add">New Stok</a>
        </div>


    </div>
    <table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>
            <th>Name</th>
            <th>Code</th>
            <th>Price</th>
            <th>Discount Percent</th>
            <th>Net Price</th>
            <th>Category</th>
            <th>Stock</th>
            <th width="110" class="ac">Action</th>
        </tr>
        <?php if ($stoks): ?>

            <?php foreach ($stoks as $stok): ?>
                <tr>

                    <?php
                    $media = $this->general->getSingleMedia('stok', $stok['id']);
                    ?>
                    <td><?php echo $stok['name'] ?></td>
                    <td><?php echo $stok['code'] ?></td>
                    <td><?php echo number_format($stok['price']) ?></td>
                    <td><?php echo $stok['discount_percent'] ?> %</td>
                    <td><?php echo number_format($stok['net_price']) ?></td>
                    <td><?php echo $stok['categoryName'] ?></td>
                    <td><?php echo $stok['stock'] ?></td>
                    <td>

                        <a href="<?php echo base_url() ?>index.php/admin/stoks/edit/<?php echo $stok['id']; ?>" class="ico edit">Edit</a> &nbsp;
                        <a href="<?php echo base_url() ?>index.php/admin/stoks/delete/<?php echo $stok['id']; ?>" class="ico del" onclick="return confirm('Are you sure want to delete this?')">Delete</a>
                    </td>
                </tr>

            <?php endforeach; ?>
        <?php else: ?>
            <tr>
                <td colspan="8"><strong>Tidak ada Stok yang tersedia</strong></td>
            </tr>
        <?php endif; ?>
    </table>

   <div class="paging">
        <?php echo $pagination ?>    
    </div>
</div>                    

<!--end #article-->
