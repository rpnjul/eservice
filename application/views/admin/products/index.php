  <script type="text/javascript">
    $(document).ready(function() {
        $('#menu_list2').show();
    });
</script>
<h2 class="page_title">Services</h2>
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
            <form id="ArticleIndexForm" method="get" action="<?php echo site_url('admin/products/index'); ?>" accept-charset="utf-8">
                <div class="input text"><input name="q" type="text" value="<?php echo $this->input->get('q'); ?>" id="ArticleQ" /></div>            
               <button class="green_bt">Search</button>
            </form>        
        </div>

        <div class="option">
            <a href="<?php echo site_url('admin/products/add'); ?>" class="add">New Services</a>
        </div>


    </div>
    <table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>
            <th>Image</th>
            <th>Name</th>
            <th>Code</th>
            <th>Price</th>
            <th>Discount Percent</th>
            <th>Net Price</th>
            <th>Category</th>
            <th>Status</th>
            <th width="110" class="ac">Action</th>
        </tr>
        <?php if ($products): ?>

            <?php foreach ($products as $product): ?>
                <tr>

                    <?php
                    $media = $this->general->getSingleMedia('product', $product['id']);
                    ?>
                    <td>
                        <?php if (!empty($media['path'])): ?>
                            <img src="<?php echo base_url(); ?>timthumb.php?src=<?php echo base_url() . $media['path'] ?>&h=100&w=85"/>
                        <?php else: ?>
                            <img alt="" src="http://placehold.it/85x100">
                        <?php endif; ?>
                    </td>
                    <td><?php echo $product['name'] ?></td>
                    <td><?php echo $product['code'] ?></td>
                    <td><?php echo number_format($product['price']) ?></td>
                    <td><?php echo $product['discount_percent'] ?> %</td>
                    <td><?php echo number_format($product['net_price']) ?></td>
                    <td><?php echo $product['categoryName'] ?></td>
                    <td><?php echo $status[$product['status']] ?></td>
                    <td>

                        <a href="<?php echo base_url() ?>index.php/admin/products/edit/<?php echo $product['id']; ?>" class="ico edit">Edit</a> &nbsp;
                        <a href="<?php echo base_url() ?>index.php/admin/products/delete/<?php echo $product['id']; ?>" class="ico del" onclick="return confirm('Are you sure want to delete this?')">Delete</a>
                    </td>
                </tr>

            <?php endforeach; ?>
        <?php else: ?>
            <tr>
                <td colspan="8"><strong>There is no data</strong></td>
            </tr>
        <?php endif; ?>
    </table>

   <div class="paging">
        <?php echo $pagination ?>    
    </div>
</div>                    

<!--end #article-->
