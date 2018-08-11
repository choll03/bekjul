
<section>
<div class="container">
<div class="row">
	<div class="col-md-2">
		<ul>
			<li><a href="<?php echo base_url().'admin/' ?>">Pesanan</a></li>
			<li><a href="<?php echo base_url().'admin/booking' ?>">Booking</a></li>
			<li><a href="<?php echo base_url().'admin/item' ?>">Item</a></li>
			<li><a href="<?php echo base_url().'admin/laporan' ?>">Laporan</a></li>
			<li><a href="<?php echo base_url().'admin/users' ?>">Users</a></li>
		</ul>
	</div>
	
	<div class="col-md-10">
	<?php echo form_open('admin/print_laporan'); ?>
		<div class="form-inline">
			<div class="form-group col-auto">
			<label class="my-1 mr-2">Tahun - Bulan</label>
			<select id="inputState" class="form-control" name="bulanan">
				<?php foreach($bulanan as $b){?>
					<option value="<?php echo $b['tanggal'] ?>"><?php echo $b['tanggal'] ?></option>
				<?php }?>
			</select>
			</div>
			<div class="col-auto"><input class="btn btn-primary" type="submit" value="tampilkan"/></div>
		</div>
		<?php echo form_close(); ?>
		<div class="my-4">
		<table class="table table-bordered">
			<tr>
				<th>tanggal</th>
				<th>item</th>
				<th>Pemesan</th>
				<th>harga</th>
				<th>quantity</th>
				<th>subtotal</th>
			</tr>
			<?php if(isset($laporan)){ ?>
				<?php $total=0; ?>
				<?php foreach($laporan as $l){ $total+=$l['total'];?>
					<tr>
						<td><?php echo $l['date'] ?></td>
						<td><?php echo $l['nama'] ?></td>
						<td><?php echo $l['username'] ?></td>
						<td>Rp. <?php echo number_format($l['harga']); ?></td>
						<td><?php echo $l['qty'] ?></td>
						<td>Rp. <?php echo number_format($l['total']); ?></td>
					</tr>
				<?php } ?>
				<tr>
					<td colspan="5" style="text-align:center;">Jumlah</td>
					<td><strong>Rp. <?php echo number_format($total); ?></strong></td>
				</tr>
			<?php } ?>
		
		</table>
			<div class="col-md-12">
				<a href="<?php echo base_url().'admin/cetak/'.$cetak ?>" class="btn btn-success float-right">Cetak</a>
			</div>
		</div>
	</div>
</div>
</div>
</section>