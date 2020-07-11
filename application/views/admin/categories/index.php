<script type="text/javascript">
    $(document).ready(function() {
        $('#menu_list4').show();
    });
</script>
<h2 class="page_title">Categories</h2>
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
            <form id="ArticleIndexForm" method="get" action="<?php echo site_url('admin/categories/index'); ?>" accept-charset="utf-8">
                <div class="input text"><input name="q" type="text" value="<?php echo $this->input->get('q'); ?>" id="ArticleQ" /></div>            
               <button class="green_bt">Search</button>
            </form>        
        </div>

        <div class="option">
            <a href="<?php echo site_url('admin/categories/add'); ?>" class="add">New Category</a>
        </div>


    </div>
    <table cellpadding="0" cellspacing="0">
        <tr>
            <th>Name</th>
            <th>Description</th>
            <th class="actions">Actions</th>
        </tr>
        <?php if ($categories): ?>
            <?php foreach ($categories as $category): ?>
                <tr class="altrow">
                    <td><?php echo $category['name']; ?></td>
                    <td><?php echo $category['description']; ?></td>
                    <td class="actions">
                        <a href="<?php echo site_url('admin/categories/edit/' . $category['id']) ?>">Edit</a> |
                        <a href="<?php echo site_url('admin/categories/delete/' . $category['id']) ?>" onclick="return confirm('Are you sure want to delete this?');">Delete</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        <?php endif; ?>
    </table>

    <div class="paging">
        <?php //echo $pagination ?>    
    </div>
</div>                    

<!--end #article-->
