
<h2 class="page_title">Users</h2>
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
            <a href="<?php echo site_url('admin/users/add'); ?>" class="add">New User</a>
        </div>

        


    </div>
    <table cellpadding="0" cellspacing="0">
        <tr>

            <th>Name</th>
            <th>Email</th>
            <th>Address</th>
            <th>Phone</th>
            <th>Level</th>
            <th>Registered</th>
            <th>Status</th>
            <th class="actions">Action</th>
        </tr>
        <?php $i = 0; ?>
        <?php if ($users): ?>
            <?php foreach ($users as $user): ?>
                <?php
                $class = '';
                if ($i % 2 == 1) {
                    $class = 'class="altrow"';
                }
                ?>
                <tr <?php echo $class; ?>>

                    <td><?php echo $user['full_name']; ?></td>
                    <td><?php echo $user['email']; ?></td>
                    <td><?php echo $user['address']; ?></td>
                    <td><?php echo $user['phone'] ?></td>
                    <td><?php echo $level[$user['level']]; ?></td>
                    <td><?php echo $user['created'] ?></td>
                    <td><?php echo $status[$user['status']] ?></td>
                    <td class="actions">
                        <?php if ($user['full_name'] != "ADMINISTRATOR" AND $user['level'] != 0 ): ?>
                        <a href="<?php echo site_url('admin/users/edit/' . $user['id']) ?>">Edit</a> |
						<a href="<?php echo site_url('admin/users/delete/' . $user['id']) ?>" onclick="return confirm('Are you sure want to delete this?');">Delete</a>
						<?php endif; ?>
                    </td>
                </tr>
                <?php $i++; ?>
            <?php endforeach; ?>
        <?php endif; ?>
    </table>

    <div class="paging">
        <?php //   echo $pagination ?>    
    </div>
</div>                    

<!--end #article-->
