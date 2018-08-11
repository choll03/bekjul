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
<section>
  <div class="container text-center">
    <header>
      <h2>List Bookingan</h2>
      <h3>Tabel yang pernah anda booking</h3>
    </header>
    <div class="row">
    	<table class="table table-bordered">
    		<tr>
        <th>Kode Tagihan</th>
        <th>Type</th>
        <th>Banyak orang</th>
        <th>u/ Tanggal</th>
        <th>Jam</th>
        <th>Status</th>
        <th>Aksi</th>
      </tr>
      <?php foreach ($bookingan as $data) { ?>
      <tr>
        <td><?php echo $data['no_tagihan_booking']; ?></td>
        <td><?php echo $data['jenis']; ?></td>
        <td><?php echo $data['orang']; ?> orang</td>
        <td><?php echo $data['tanggal']; ?></td>
        <td><?php echo $data['jam']; ?></td>
        <td><?php echo $data['status_booking']; ?></td>
        <td>
          <?php if($data['status_booking'] == "belum bayar"){ ?>

          <a href="<?php echo base_url('booking/batal/'.$data['id']); ?>" class="btn btn-danger btn-sm">Batal</a>
          <button class="btn btn-primary btn-sm bayar" data-toggle="modal" data-id="<?php echo $data['id'] ?>" data-target="#bookingModal" data-tagihan="<?php echo $data['no_tagihan_booking']; ?>" data-orang="<?php echo $data['orang']; ?>" data-jenis="<?php echo $data['jenis']; ?>">Konfirmasi</button>
          <?php }else{ ?>
            <button class="btn btn-success btn-sm bayar2" data-toggle="modal" data-target="#bookingModal2" data-tagihan="<?php echo $data['no_tagihan_booking']; ?>" data-orang="<?php echo $data['orang']; ?>" data-jenis="<?php echo $data['jenis']; ?>" data-tanggal="<?php echo $data['tanggal']; ?>" data-jam="<?php echo $data['jam']; ?>" data-status="<?php echo $data['status_booking']; ?>">Lihat</button>
          <?php } ?>
          </td>
      </tr>

      <?php } ?>

    	</table>
     </div>
    </div>
  </div>
</section>
<div class="modal fade" id="bookingModal" tabindex="-1" role="dialog" aria-hidden="true" style="z-index: 9999;">
          <div class="modal-dialog modal-lg modal-dialog-centered" role="document" >
            <div class="modal-content" >
              <div class="modal-header">
              <h3>Konfirmasi Pembayaran</h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body" style="text-align: left;">
                <?php echo form_open('booking/proses_booking'); ?>
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
                    <td>Kode Tagihan</td>
                    <td style="font-family: 'Arial';">: <strong id="tagihan"></strong></td>
                  </tr>
                  <tr>
                    <td>Type</td>
                    <td id="jenis"></td>
                  </tr>
                  <tr>
                    <td>DP</td>
                    <td id="orang">: Rp. </td>
                  </tr>
                </table>
                <code><strong>Perhatian :</strong> masukan <strong>Kode Transaksi</strong> ke formulir berita pada saat tranfer</code>
              </div>
              <div class="modal-footer">
                  <input type="hidden" name="id_booking" id="id_booking">
                  <input type="hidden" name="dp" id="dp">
                  <input type="submit" class="btn btn-primary" value="Konfirmasi" id="kirim">
              </div>
            </div>
            <?php echo form_close(); ?>
          </div>
           </div>
<div class="modal fade" id="bookingModal2" tabindex="-1" role="dialog" aria-hidden="true" style="z-index: 9999;">
          <div class="modal-dialog modal-lg modal-dialog-centered" role="document" >
            <div class="modal-content" >
              <div class="modal-header">
              <h3>Detail</h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body" style="text-align: left;">
                <table class="table polos">
                  <tr>
                    <td>Kode Tagihan</td>
                    <td style="font-family: 'Arial';">: <strong id="tagihan2"></strong></td>
                  </tr>
                  <tr>
                    <td>Type</td>
                    <td id="jenis2"></td>
                  </tr>
                  <tr>
                    <td>Banyak Orang</td>
                    <td id="untuk"></td>
                  </tr>
                  <tr>
                    <td>Tanggal</td>
                    <td id="tanggal"></td>
                  </tr>
                  <tr>
                    <td>Jam</td>
                    <td id="jam"></td>
                  </tr>
                  <tr>
                    <td>DP</td>
                    <td id="orang2">: Rp. </td>
                  </tr>
                  <tr>
                    <td>Status</td>
                    <td id="status"></td>
                  </tr>
                </table>
              </div>
              <div class="modal-footer">
                  <button class="btn btn-primary" data-dismiss="modal">Close</button>
              </div>
            </div>
          </div>
           </div>
<script type="text/javascript">
  $(document).ready(function(){
    $('.bayar').on('click',function(e) {
      e.preventDefault();
      var tagihan = $(this).data('tagihan');
      var orang = $(this).data('orang');
      var jenis = $(this).data('jenis');
      var dp = (orang/2)*10000;

      $('#id_booking').val($(this).data('id'));
      $('#tagihan').html(tagihan);
      $('#jenis').html(": "+jenis);
      $('#orang').html(": Rp. "+dp.toLocaleString());
      $('#dp').val(dp);
    });

    $('.bayar2').on('click',function(e) {
      e.preventDefault();
      var tagihan = $(this).data('tagihan');
      var orang = $(this).data('orang');
      var jenis = $(this).data('jenis');
      var tanggal = $(this).data('tanggal');
      var jam = $(this).data('jam');
      var dp = (orang/2)*10000;
      var status = $(this).data('status');

      $('#tagihan2').html(tagihan);
      $('#jenis2').html(" : "+jenis);
      $('#untuk').html(" : "+orang);
      $('#tanggal').html(" : "+tanggal);
      $('#jam').html(" : "+jam);
      $('#status').html(" : "+status);
      $('#orang2').html(" : Rp. "+dp.toLocaleString());
    });
  });
</script>
