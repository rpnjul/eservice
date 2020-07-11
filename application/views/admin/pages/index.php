<script type="text/javascript">
    $(document).ready(function() {
        $('#menu_list1').show();
    });
</script>
<h2 class="page_title">Pages</h2>
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
            <form id="ArticleIndexForm" method="get" action="<?php echo site_url('admin/pages/index'); ?>" accept-charset="utf-8">
                <div class="input text"><input name="q" type="text" value="<?php echo $this->input->get('q'); ?>" id="ArticleQ" /></div>            
                <input type="submit" value="Search"/>
            </form>        
        </div>

        <div class="option">
            <a href="<?php echo site_url('admin/pages/add'); ?>" class="add">New Page</a>
        </div>


    </div>
    <table cellpadding="0" cellspacing="0">
        <tr>

            <th>Title</th>
            <th>Status</th>
            <th>Date</th>
            <th class="actions">Action</th>
        </tr>
        <?php $i = 0; ?>
        <?php if ($pages): ?>

            <?php foreach ($pages as $page): ?>
                <?php
                $class = '';
                if ($i % 2 == 1) {
                    $class = 'class="altrow"';
                }
                ?>
                <tr <?php echo $class; ?>>
                    <td><?php echo $page['title']; ?></td>
                    <td><?php echo $status[$page['status']] ?></td>
                    <td><?php echo $this->general->humanDate($page['created']); ?></td>
                    <td class="actions">

                      
                        <a href="<?php echo site_url('admin/pages/edit/' . $page['id']) ?>">Edit</a> |
                        <a href="<?php echo site_url('admin/pages/delete/' . $page['id']) ?>" onclick="return confirm('Are you sure want to delete this?');">Delete</a>
                    </td>
                </tr>
                <?php $i++; ?>
            <?php endforeach; ?>
        <?php endif; ?>
    </table>

    <div class="paging">
        <?php echo $pagination ?>    
    </div>
</div>                    

<!--end #article-->
