<section>
<div class="container">
    <div class="row" id="gallery">
      <?php foreach ($image as $key => $img) { ?>
        <div class="col-md-4 my-4">
            <div class="hovereffect" >
              <img class="img-responsive" src="<?php echo base_url($img['path']); ?>" alt="" style="border-radius: 10px;">
              <div class="overlay">
                  <h2>Gambar <?php echo $key+1; ?></h2>
                 <a class="info" href="<?php echo base_url('/admin/item/image/delete/'.$img['id']); ?>">HAPUS</a>
              </div>
          </div>
        </div>
     <?php } ?>
    </div>
      <div class="row"  style="margin-top: 100px;">
        <div class="col-md-10 offset-md-1" style="background-color: #f2f2f2;border-radius: 10px;">
        <h3 class="">Tambah Menu</h3>
        <form action="<?php echo base_url().'dropzone/upload' ?>"
          class="dropzone my-4"
          id="addImages">
          <input type="hidden" name="item_id" value="<?php echo $item['id'] ?>">
          </form>
            <?php echo form_open('admin/proses_update_item/'.$item['id']); ?>
              <div class="form-group">
                <input type="text" name="nama" value="<?php echo $item['nama'] ?>">
              </div>
              <div class="form-group">
              <label >Kategori :</label>
                <select class="form-control" name="kategori">
                  <?php if($item['kategori'] == 'makanan'){ ?>
                    <option value="makanan" selected>Makanan</option>
                    <option value="minuman">Minuman</option>
                  <?php }else{ ?>
                    <option value="makanan">Makanan</option>
                    <option value="minuman" selected>Minuman</option>
                  <?php } ?>
                </select>
              </div>
              <div class="form-group">
                <input type="number" name="harga" value="<?php echo $item['harga'] ?>">
              </div>
              <div class="form-group">
                <input type="submit" value="Edit">
              </div>
            <?php echo form_close(); ?>
        </div>
      </div>
      <!-- /.row -->
      </div>
</section>
  <script type="text/javascript">
    
      Dropzone.options.addImages = {
        maxFilesize: 2, // MB
        acceptedFiles: 'image/*',
        success: function(file, res){
          if(file.status == 'success'){
            handleDropzoneFileUpload.handleSuccess(res);
          }else{
            handleDropzoneFileUpload.handleError(res);
          }
        }
          
      };

      var handleDropzoneFileUpload = {
        handleError: function(res){
          console.log(res);
        },
        handleSuccess: function(response){
          var res = JSON.parse(response);
          var url = window.location.origin;
          var pathname = "/admin/item/image/delete/"+res.id;
          var foto = "<?php echo base_url('./upload-foto/'); ?>"
          $('#gallery').append('<div class="col-md-4 my-4"><div class="hovereffect"><img class="img-responsive" src="'+foto+res.file_name+'"><div class="overlay"><h2>Gambar Baru</h2><a class="info" href="'+url+pathname+'">Hapus</a></div></div></div>');
        }
      };
      
</script>