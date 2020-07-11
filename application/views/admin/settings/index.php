<script type="text/javascript">
    $(document).ready(function() {
        $('#menu_list10').show();
    });
</script>
<h2 class="page_title">General Setting</h2>
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

    <table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>
            <th>Name</th>
            <th>Value</th>
            <th>Description</th>
            <th width="110" class="ac">Action</th>
        </tr>
        <?php if ($settings): ?>
            <?php foreach ($settings as $setting): ?>
                <tr class="altrow">
                    <td><?php echo $setting['key']; ?></td>
                    <td><?php echo $setting['value']; ?></td>
                    <td><?php echo $setting['description']; ?></td>
                    <td class="actions">
                        <a href="<?php echo site_url('admin/settings/edit/' . $setting['id']) ?>" class="ico edit">Edit</a>

                    </td>
                </tr>
            <?php endforeach; ?>
        <?php else: ?>
            <tr>
                <td colspan="5"><strong>Tidak ada data</strong></td>
            </tr>
        <?php endif; ?>
    </table>


</div>