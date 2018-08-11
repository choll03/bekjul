<style type="text/css">
  .polos {
    text-align: left;
  }
  .polos td {
    border: none;
  }
  .sp60 {
    width: 40%;
  }
</style>
<section id="booking" class="booking">

  <div class="container text-center">
    <header id="alert">
      <h2>Booking Tempat</h2>
      <?php if($msg == 1){ ?>
        <div class="alert alert-success" role="alert">
          Bookingan anda sudah terkirim, tunggu beberapa saat untuk mendapatkan konfirmasi dari kami
        </div>
      <?php } ?>
    </header>
    <div class="row">
      <div class="form-holder col-lg-10 mx-auto text-center">
        <div class="ribbon"><i class="fa fa-star"></i></div>
        <h2 class="h2">Formulir Pemesanan Meja</h2>
        <h3>Pesan Meja Anda sekarang juga</h3>
        <!-- <form id="booking-form" method="get" action="#"> -->
          <?php echo form_open('booking/tempat'); ?>
          <div class="row">
            <div class="col-lg-10 mx-auto">
              <div class="row">
                <label for="orang" class="col-md-12 unique">Jumlah Orang?
                  <input id="orang" name="orang" type="number" min="1" value="<?php echo $param*2; ?>" required>
                  <?php if($param == 1){ ?>
                    <input type="hidden" name="type" value="small">
                  <?php }else if($param == 2){ ?>
                    <input type="hidden" name="type" value="medium">
                  <?php } else { ?>
                    <input type="hidden" name="type" value="vip">
                  <?php } ?>
                </label>
                <label for="tanggal" class="col-md-6 unique">Tanggal
                  <input id="tanggal" name="tanggal" type="text" data-language="en" required="" class="datepicker-here" >
                </label>
                <label for="jam" class="col-md-6 unique">Jam
                  <input id="jam" name="jam" type="text" required="" class="timepicker">
                </label>
                <label for="khusus" class="col-md-12 unique">Pesanan Khusus
                  <textarea id="khusus" name="khusus"></textarea>
                </label>
                <div class="col-md-12">
                  <input type="submit" name="kirim" class="btn-unique" value="Booking Sekarang">
                </div>
              </div>
            </div>
          
          </div>
          <?php echo form_close() ?>
        <!-- </form> -->
      </div>
    </div>
  </div>
</section>
  <div class="modal fade" id="bayarModal" tabindex="-1" role="dialog" aria-hidden="true" style="z-index: 9999;">
          <div class="modal-dialog modal-lg modal-dialog-centered" role="document" >
            <div class="modal-content" >
              <div class="modal-header">
              <h3>Konfirmasi Pembayaran</h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body" style="text-align: left;">
                
                <div class="col-md-12">Silahkan Transfer via Bank <img src="<?php echo base_url('asset/img/bca.jpg'); ?>" width="50" ></div>
                <table class="table polos">
                  <tr>
                    <td>No.Rek</td>
                    <td>: 5720924970</td>
                  </tr>
                  <tr>
                    <td>a/n</td>
                    <td>: Muhhamad Ridwan</td>
                  </tr>
                  <tr>
                    <td>Kode Transaksi</td>
                    <td style="font-family: 'Arial';">: <strong>tes</strong></td>
                  </tr>
                  <tr>
                    <td>Total</td>
                    <td>: Rp. </td>
                  </tr>
                </table>
                <code><strong>Perhatian :</strong> masukan <strong>Kode Transaksi</strong> ke formulir berita pada saat tranfer</code>
                <div class="form-group my-4">
                  <label>Nama Pengirim</label>
                  <input type="text" name="pengirim" class="form-control" required>
                </div>
              </div>
              <div class="modal-footer">
                  <input type="submit" class="btn btn-primary" value="Kirim" id="kirim">
              </div>
            </div>
          </div>
           </div>
<!-- <script type="text/javascript">
  $(document).ready(function(){
        
    $('#form_booking').submit(function(e) {
      // e.preventDefault();
      var formData = new FormData($(this)[0]);

      $.ajax({
        url: "<?php base_url() ?>booking/tempat",
        method: "POST",
        data: formData,
        contentType: false,
        processData: false,
        success: function(data) {
          $('#alert').append('<div class="alert alert-success" role="alert">Bookingan anda sudah terkirim, tunggu beberapa saat untuk mendapatkan konfirmasi dari kami </div>');
        }
      });
    });
  });
</script> -->
