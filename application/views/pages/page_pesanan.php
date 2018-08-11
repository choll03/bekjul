
<section>
  <div class="container text-center">
    <header>
      <h2>PesananKu</h2>
      <?php if($msg == 1){ ?>
        <div class="alert alert-success" role="alert">
          Pesanan anda sudah terkirim, tunggu beberapa saat untuk mendapatkan konfirmasi dari kami
          <p class="text-center"><a href="<?php echo base_url('menu/page') ?>">kembali ke menu</a></p>
        </div>
      <?php } ?>
    </header>
    <div class="row">
	<table class="table table-bordered">
		<tr>
			<th>No Tagihan</th>
			<th>Pengirim</th>
			<th>Tanggal</th>
			<th>Total</th>
			<th>Alamat</th>
			<th>Status</th>
			<th>aksi</th>
		</tr>
		<?php if($pesanan != false){ foreach ($pesanan as $p) { ?>
		<tr>
			<td style="font-family: 'Arial';"><?php echo $p['no_tagihan']; ?></td>
			<td><?php echo $p['pengirim']; ?></td>
			<td><?php echo $p['date']; ?></td>
			<td>Rp. <?php echo number_format($p['total']); ?></td>
			<td><?php echo $p['alamat']; ?></td>
			<td><?php echo $p['status']; ?></td>
			<td>
					<a class="btn btn-sm btn-success" href="<?php echo base_url().'pesanan/detail/'.$p['id']; ?>">detail</a>
				
				<?php }if($p['status']== 'dibayar'){ ?>
					<a class="btn btn-sm btn-success" href="<?php echo base_url().'pesanan/cetak/'.$p['kode_pesanan']; ?>">detail</a>
					<a class="btn btn-sm btn-danger" href="<?php echo base_url().'pesanan/delete/'.$p['id']; ?>" onclick="return confirm('anda yakin ingin membatalkan?');" >batal</a>
				<?php } } ?>
			</td>
		</tr>
	</table>
	 </div>
    </div>
  </div>
</section>