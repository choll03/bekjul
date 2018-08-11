
<section id="contact" class="contact" style="padding-top: 45%;">
      <div class="container text-center">
        <div class="form-holder" style="width: 40%;">
          <header>
            <h2>Login Member</h2>
            <h3>Jadi member kami dan dapatkan diskon menarik!</h3>
            <?php if(isset($msg)){ ?>
              <div class="alert alert-danger" role="alert">
                Anda harus menjadi member untuk melakukan hal tersebut
              </div>
            <?php } ?>
          </header>
          <?php echo form_open('auth/prosses_login'); ?>
            <div class="row">
              <label for="user-name" class="col-md-12 unique">Username
                <input id="user-name" type="text" name="username" required="">
              </label>
              <label for="user-pass" class="col-md-12 unique">Password
                <input id="user-pass" type="password" name="password" required="">
              </label>
              <div class="col-md-12">
              	<?php if(isset($pesan)){
					echo '<div class="alert alert-danger" role="alert">'.$pesan.'</div>';
				} ?><br>
                <button id="submit" type="submit" class="btn btn-unique">Login</button>
              </div>
              <div class="col-md-12 my-4">
              	<h5><a href="<?php echo base_url('register'); ?>">Belum jadi member kami? Daftar disini!</a></h5>
              </div>
            </div>
            <?php echo form_close(); ?>
        </div>
      </div>
    </section>
