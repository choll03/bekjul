
<section class="contact" style="padding-top: 60%;">
      <div class="container text-center">
        <div class="form-holder" style="width: 40%;">
          <header>
            <h2>Daftar Member</h2>
            <h3>Jadi member kami dan dapatkan diskon menarik!</h3>
          </header>
          <?php echo form_open('auth/prosses_register'); ?>
            <div class="row">
              <label for="user-name" class="col-md-12 unique">Username
                <input id="user-name" type="text" name="username" required="">
              </label>
              <label for="user-pass" class="col-md-12 unique">Password
                <input id="user-pass" type="password" name="password" required="">
              </label>
              <label for="user-email" class="col-md-12 unique">Email
                <input id="user-email" type="email" name="email" required="">
              </label>
              <label for="user-phone" class="col-md-12 unique">No-Telpon
                <input id="user-phone" type="number" name="phone" required="">
              </label>
              <div class="col-md-12">
              	<?php if(isset($pesan)){
					echo '<div class="alert alert-danger" role="alert">'.$pesan.'</div>';
				} ?><br>
                <button id="submit" type="submit" class="btn btn-unique">Daftar Member</button>
              </div>
              <div class="col-md-12 my-4">
              	<h5><a href="<?php echo base_url('login'); ?>">Sudah jadi member? Login disini!</a></h5>
              </div>
            </div>
            <?php echo form_close(); ?>
        </div>
      </div>
    </section>