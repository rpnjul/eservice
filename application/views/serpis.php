<div class="span12">
    <?php echo set_breadcrumb('<span class="divider">/</span>') ?>
    <div class="page-header">
        <h1>Service</h1>
    </div>
         <?php if ($this->session->userdata('level') == '1'): ?>
         <?php echo form_open('service/create') ?>
    <fieldset>
        <div class="form_subtitle">Mohon isi field dengan benar</div>  

        <?php if ($this->session->flashdata('message')): ?>
            <?php echo $this->session->flashdata('message'); ?>
        <?php endif ?>

         <div class="control-group">
            <label for="focusedInput" class="control-label">Nama Lengkap:</label>
            <div class="controls">
                <input type="text" class="input-xlarge focused span6" name="nama" value="<?php echo set_value('nama'); ?>"/>
            </div>
        </div>  
         <div class="control-group">
            <label for="focusedInput" class="control-label">Alamat: </label>
            <div class="controls">
                <input type="text" class="input-xlarge focused span6" name="alamat" value="<?php echo set_value('alamat'); ?>"/>
            </div>
        </div>  
         <div class="control-group">
            <label for="focusedInput" class="control-label">Nomor Telepon:</label>
            <div class="controls">
                <input type="text" class="input-xlarge focused span6" name="no_telp" value="<?php echo set_value('no_telp'); ?>"/>
            </div>
        </div>  
        <div class="control-group">
            <label for="focusedInput" class="control-label">Nama Barang:</label>
            <div class="controls">
                <input type="text" class="input-xlarge focused span6" name="nambar" value="<?php echo set_value('nambar'); ?>"/>
            </div>
        </div>  
        <div class="control-group">
            <label for="focusedInput" class="control-label">Tipe Barang:</label>
            <div class="controls">
                 <select name="tipe_barang" class="form-control xlarge focused span6">
                 <option value="AC">AC</option>
                 <option value="Mesin_cuci">Mesin Cuci</option>
                 <option value="Kulkas">Kulkas</option>
                 </select>
                 <?php echo form_error('tipe_barang'); ?>
            </div>
        </div>  
        <div class="control-group">
            <label for="focusedInput" class="control-label">Keluhan Kerusakan:</label>
            <div class="controls">
                <input type="text" class="input-xlarge focused span6" name="nambar" value="<?php echo set_value('comment'); ?>"/>
            </div>
        </div> 
        <div class="span2">
            <button class="btn btn-primary pull-right"  type="submit">Pesan</button>
        </div>      
    </fieldset>
    <?php echo form_close(); ?>
</div>
            <?php else: ?>
                            <h3>Mohon Maaf Admin Sedang Offline</h3><br>
                                Anda Tidak dapat memesan Jasa Service sekarang, silahkan kembali lagi nanti<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
<?php endif; ?> 
 