<div class="span12">
    <ul class="breadcrumb">
		<li><a href="<?php echo base_url();?>">Home</a></li> / 
		<li>Login</li>
	</ul>


    <div class="row">
        <div class="span9">
            <h1>Account login</h1>
        </div>
    </div>

    <hr />

    <div class="row">

        <div class="span5 well">
            <h2>BELUM PUNYA AKUN?</h2>
            <p>SILAHKAN BUAT AKUN JIKA ANDA BELUM MEMPUNYAI AKUN di eWARUNG
</p><br />
            <a href="<?php echo site_url('users/register'); ?>" class="btn btn-primary pull-right">Buat Akun Baru</a>
        </div>	 		

        <div class="span5 well pull-right">
            <h2>Masuk</h2>
            <p>Sudah punya akun? silahkan login</p>

            <?php echo form_open('users/login'); ?>
            <fieldset>
                <div class="control-group">
                    <label for="focusedInput" class="control-label">Email</label>
                    <div class="controls">
                        <input type="text" name="email" value="<?php echo set_value('email') ?>" placeholder="Enter your email" id="username" class="input-xlarge focused">
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label">Password</label>
                    <div class="controls">
                        <input type="password" name="password" placeholder="Enter your password" id="password" class="input-xlarge">
                    </div>
                </div>

                <button class="btn btn-primary pull-right" type="submit">Login</button>
                <?php echo anchor('users/register', 'Register') ?> | 
                <?php echo anchor('users/forgot_password', ' Forgot Password ?'); ?>
            </fieldset>
            <?php echo form_close(); ?>

        </div>

    </div>
</div>