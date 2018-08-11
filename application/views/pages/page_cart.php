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
      <h2>List Pesanan</h2>
    </header>
    <div class="row">
	<table class="table table-bordered">
		<tr>
			<th>No</th>
			<th>Nama Item</th>
			<th>Harga Satuan</th>
			<th>Quantity</th>
			<th>Subtotal</th>
			<th>aksi</th>
		</tr>
		<?php $i=0; foreach($cart as $item){ ?>
			<tr>
				<td><?php $i++; echo $i; ?></td>
				<td><?php echo $item['name'] ?></td>
				<td>Rp. <?php echo number_format($item['price']) ?></td>
				<td><?php echo $item['qty'] ?></td>
				<td>Rp. <?php echo number_format($item['subtotal']) ?></td>
				<td><a href="<?php echo base_url('pesanan/cart_remove/'.$item['rowid'])?>" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i>Hapus</a></td>
			</tr>
		<?php } ?>
		<tr>
			<td colspan="4">Total</td>
			<td>Rp. <?php echo number_format($this->cart->total()); ?></td>
			<td></td>
		</tr>
	</table>
	<div class="col-md-12 my-4">
			<a href="<?php echo base_url('pesanan/cart_clear') ?>" class="btn btn-danger">Hapus Semua</a>
			<?php echo anchor(base_url('menu/page'), 'Kembali Memesan', ['class'=>'btn btn-primary']); ?>
			<button class="btn btn-success" data-toggle="modal" data-target="#bayarModal">Lanjut Pembayaran</button>
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
				      <?php echo form_open('proses_pesanan'); ?>
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
				      			<td>Nomor Tagihan</td>
				      			<td style="font-family: 'Arial';">: <strong><?php echo $no_tagihan; ?></strong></td>
				      		</tr>
				      		<tr>
				      			<td>Total</td>
				      			<td>: Rp. <?php echo $this->cart->total(); ?></td>
				      		</tr>
				      	</table>
				      	<code><strong>Perhatian :</strong> masukan <strong>nomor tagihan</strong> ke formulir berita pada saat tranfer</code>
				      	<div class="form-group my-4">
				        	<label>Nama Pengirim</label>
				        	<input type="hidden" name="no_tagihan" value="<?php echo $no_tagihan; ?>">
				        	<input type="text" name="pengirim" class="form-control" required>
				        </div>
				        <div class="form-group">
				        	<label>Masukan Alamat Pengiriman</label>
				        	<textarea class="form-control" rows="3" name="alamat" required></textarea>
				        </div>
				      </div>
				      <div class="modal-footer">
				      	<?php if($this->cart->total() > 0){ ?>
				        	<input type="submit" class="btn btn-primary" value="Kirim">
				        <?php }else{ ?>
				        	<input type="submit" class="btn btn-primary" value="Kirim" disabled>
				        <?php } ?>
				      </div>
				    </div>
			<?php echo form_close(); ?>
	</div>
	 </div>
    </div>
  </div>
</section>