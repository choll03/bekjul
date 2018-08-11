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
    <header class="polos">
      <h2>Detail Pesanan</h2>
    </header>
    <div class="row">
    <table class="table polos">
		<tr>
			<td>No.Tagihan</td>
			<td class="sp60">: <?php echo $invoice->no_tagihan; ?></td>
			<td>Pengirim</td>
			<td class="sp60">: <?php echo $invoice->pengirim; ?></td>
		</tr>
		<tr>
			<td>Tanggal</td>
			<td class="sp60">: <?php echo substr($invoice->date,0,10); ?></td>
			<td>Alamat</td>
			<td class="sp60">: <?php echo $invoice->alamat; ?></td>
		</tr>
		<tr>
			<td>Jam</td>
			<td class="sp60">: <?php echo substr($invoice->date,10,6); ?></td>
		</tr>
	</table>
	<table class="table table-bordered">
		<tr>
			<th>No</th>
			<th>Item</th>
			<th>Quantity</th>
			<th>Harga</th>
			<th>Subtotal</th>
		</tr>
		<?php $i=0;$total=0;foreach($detail as $data){ $i++;$total+=$data['total'];?>
			<tr>
				<td><?php echo $i; ?></td>
				<td><?php echo $data['nama']; ?></td>
				<td><?php echo $data['qty']; ?></td>
				<td>Rp. <?php echo number_format($data['harga']); ?></td>
				<td>Rp. <?php echo number_format($data['total']); ?></td>
			</tr>
		<?php } ?>
		<tr>
			<td colspan="4">Total</td>
			<td>Rp. <?php echo number_format($total); ?></td>
		</tr>
	</table>
	<div class="col-md-12">
		<a class="btn btn-success float-right" href="<?php echo base_url().'pesanan/cetak/'.$invoice->id; ?>">Cetak</a>
		
	</div>
	 </div>
    </div>
</section>