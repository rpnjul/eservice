<div class="span12">
<ul class="breadcrumb">
<li><a href="<?php echo base_url()?>users/login"><- Back To Login Page</a></li>
</ul>
    <div class="page-header">
        <h1>Buat Akun Baru</h1>
    </div>
    <?php echo form_open('users/register') ?>
    <fieldset>
        <div class="form_subtitle">Semua Wajib diisi</div></br>

        <?php if ($this->session->flashdata('message')): ?>
            <?php echo $this->session->flashdata('message'); ?>
        <?php endif ?>
        <div class="control-group">
            <label for="focusedInput" class="control-label">Nama Lengkap:</label>
            <div class="controls">
                <input type="text" class="input-xlarge focused span6" name="full_name" value="<?php echo set_value('full_name'); ?>"/>
            </div>
        </div>  

        <div class="control-group">
            <label for="focusedInput" class="control-label">Alamat Email:</label>
            <div class="controls">
                <input type="text" class="input-xlarge focused span6" name="email" value="<?php echo set_value('email'); ?>" />
            </div>
        </div>
        <div class="control-group">
            <label for="focusedInput" class="control-label">Kata Sandi:</label>
            <div class="controls">
                <input type="password" class="input-xlarge focused span6" name="password" />
            </div>
        </div>
        <div class="control-group">
            <label for="focusedInput" class="control-label">Masukan Ulang Kata Sandi:</label>
            <div class="controls">
                <input type="password" class="input-xlarge focused span6" name="confirm_password" />
            </div>
        </div>
        <div class="control-group">
            <label for="focusedInput" class="control-label">Nomor Telefon:</label>
            <div class="controls">
                <input type="text" class="input-xlarge focused span6" name="phone" value="<?php echo set_value('phone'); ?>" />
            </div>
        </div>
        <div class="control-group">
            <label for="focusedInput" class="control-label">Kode Pos:</label>
            <div class="controls">
                <input type="text" class="input-xlarge focused span6" name="zip" value="<?php echo set_value('zip'); ?>" />
            </div>
        </div>
        <div class="control-group">
            <label for="focusedInput" class="control-label">Alamat Lengkap:</label>
            <div class="controls">
                <textarea class="span6" name="address"><?php echo set_value('address'); ?></textarea>
            </div>
        </div>
        <div class="span5">
            <button class="btn btn-primary pull-right"  type="submit">Register</button>
        </div>      
    </fieldset>
    <?php echo form_close(); ?>
</div>