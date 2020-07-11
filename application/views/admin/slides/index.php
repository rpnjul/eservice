<script type="text/javascript">
    $(document).ready(function() {
        $('#menu_list5').show();
    });
</script>
<h2 class="page_title">Slides</h2>
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

      
        <div class="option">
            <a href="<?php echo site_url('admin/slides/add'); ?>" class="add">New Slide</a>
        </div>


    </div>
    <table cellpadding="0" cellspacing="0">
        <tr>
            <th></th>
            <th>Image</th>
            <th>Title</th>
            <th>Position</th>
            <th>Status</th>
            <th class="actions">Action</th>
        </tr>
        <?php $i = 0; ?>
        <?php if ($slides): ?>
            <?php foreach ($slides as $slide): ?>
                <?php
                $class = '';
                if ($i % 2 == 1) {
                    $class = 'class="altrow"';
                }
                ?>
                <tr <?php echo $class; ?>>
                    <td><?php echo $slide['id']; ?></td>
                    <?php $image = $this->general->getSingleMedia('slide', $slide['id']); ?>

                    <td><img src="<?php echo base_url(); ?>timthumb.php?src=<?php echo base_url(); ?><?php echo $image['path'] ?>&h=80&w=80&zc=1" alt=""></td>
                    <td><?php echo $slide['title']; ?></td>
                    <td>
                        <?php if ($this->general->isExistPrevSlide($slide['position']) == TRUE): ?>
                            <?php echo anchor('admin/slides/up/' . $slide['position'], 'Up') ?> 
                        <?php else: ?>
                            &nbsp;&nbsp;&nbsp;&nbsp;
                        <?php endif; ?>
                        | 
                        <?php if ($this->general->isExistNextSlide($slide['position']) == TRUE): ?>
                            <?php echo anchor('admin/slides/down/' . $slide['position'], 'Down') ?>
                        <?php else: ?>
                            &nbsp;&nbsp;&nbsp;&nbsp;
                        <?php endif; ?>
                    </td>
                    <td><?php echo $status[$slide['status']] ?></td>
                    <td class="actions">
                        <a href="<?php echo site_url('admin/slides/edit/' . $slide['id']) ?>">Edit</a> |
                        <a href="<?php echo site_url('admin/slides/delete/' . $slide['id']) ?>" onclick="return confirm('Are you sure want to delete this?');">Delete</a>
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
