
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
		<h2>Booking</h2>
		<table class="table table-bordered">
			<tr>
				<th>No Tagihan</th>
				<th>Nama</th>
				<th>Banyak</th>
				<th>Tanggal</th>
				<th>Jam</th>
				<th>aksi</th>
			</tr>
			<?php foreach ($booking as $data) { ?>
			<tr>
				<td><?php echo $data['no_tagihan_booking']; ?></td>
				<td><?php echo $data['nama_pemboking']; ?></td>
				<td><?php echo $data['orang']; ?> orang</td>
				<td><?php echo $data['tanggal']; ?></td>
				<td><?php echo $data['jam']; ?></td>
				<td>
					<a href="<?php echo base_url().'admin/booking/update/'.$data['id'].'/'.$data['nama_pemboking']?>">confirm</a> | 
					<a href="<?php echo base_url().'admin/booking/batal/'.$data['id'].'/'.$data['nama_pemboking']?>">batalkan</a>
				</td>
			</tr>
			<?php } ?>
		</table>
		<hr>
		<h2>Sudah Booking</h2>
		<table class="table table-bordered">
			<tr>
				<th>No Tagihan</th>
				<th>Nama</th>
				<th>Banyak</th>
				<th>Tanggal</th>
				<th>Jam</th>
				<th>aksi</th>
			</tr>
			<?php foreach ($confirm_booking as $data) { ?>
			<tr>
				<td><?php echo $data['no_tagihan_booking']; ?></td>
				<td><?php echo $data['nama_pemboking']; ?></td>
				<td><?php echo $data['orang']; ?> orang</td>
				<td><?php echo $data['tanggal']; ?></td>
				<td><?php echo $data['jam']; ?></td>
				<td><a href="<?php echo base_url().'admin/booking/delete/'.$data['id']?>">Selesai</a></td>
			</tr>
			<?php } ?>
		</table>
	</div>
</div>
</div>
</section>