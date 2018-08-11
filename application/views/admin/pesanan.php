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
		<h2>Pesanan Masuk</h2>
		<table class="table table-bordered">
			<tr>
				<th>no tagihan</th>
				<th>Tanggal</th>
				<th>Username</th>
				<th>a/n</th>
				<th>Total</th>
				<th>Alamat</th>
				<th>aksi</th>
			</tr>
			<?php foreach ($pesanan as $data) { ?>
			<tr>
				<td><?php echo $data['no_tagihan']; ?></td>
				<td><?php echo $data['date']; ?></td>
				<td><?php echo $data['username']; ?></td>
				<td><?php echo $data['pengirim']; ?></td>
				<td><?php echo $data['total']; ?></td>
				<td><?php echo $data['alamat']; ?></td>
				<td>
					<a href="<?php echo base_url().'admin/update/'.$data['id'].'/'.$data['username']?>">confirm</a> |
					<a href="<?php echo base_url().'admin/view/'.$data['id']?>">detail</a> | 
					<a href="<?php echo base_url().'admin/delete/'.$data['id'].'/'.$data['username']?>">batalkan</a>
				</td>
			</tr>
			<?php } ?>
		</table>
	</div>
	</div>
	<hr>
	<div class="row my-4">
	<div class="col-md-10 offset-md-2">
		<h2>Pesanan Sedang di Proses</h2>
		<table class="table table-bordered">
			<tr>
				<th>no tagihan</th>
				<th>Tanggal</th>
				<th>Username</th>
				<th>a/n</th>
				<th>Total</th>
				<th>Alamat</th>
				<th>aksi</th>
			</tr>
			<?php foreach ($proses as $data) { ?>
			<tr>
				<td><?php echo $data['no_tagihan']; ?></td>
				<td><?php echo $data['date']; ?></td>
				<td><?php echo $data['username']; ?></td>
				<td><?php echo $data['pengirim']; ?></td>
				<td><?php echo $data['total']; ?></td>
				<td><?php echo $data['alamat']; ?></td>
				<td><a href="<?php echo base_url().'admin/clear/'.$data['id']?>">selesai</a></td>
			</tr>
			<?php } ?>
		</table>
	</div>
</div>
</div>
</section>