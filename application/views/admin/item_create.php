<section>

<div class="container">

      <div class="row"  style="margin-top: 100px;">
        <div class="col-md-10 offset-md-1" style="background-color: #f2f2f2;border-radius: 10px;">
        <h3 class="">Tambah Menu</h3>
            <?php echo form_open('admin/proses_create_item'); ?>
              <div class="form-group">
                <input type="text" name="nama">
              </div>
              <div class="form-group">
              <label >Kategori :</label>
                <select class="form-control" name="kategori">
                	<option value="makanan">Makanan</option>
                	<option value="minuman">Minuman</option>
                </select>
              </div>
              <div class="form-group">
                <input type="number" name="harga">
              </div>
              <div class="form-group">
                <input type="submit">
              </div>
            <?php echo form_close(); ?>
        </div>
      </div>
      <!-- /.row -->
      </div>
</section>