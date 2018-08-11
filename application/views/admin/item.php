<section>
<div class="container">
<div class="row my-4">
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
		<h2>Menu</h2>
		<table class="table table-bordered">
			<tr>
				<th>No</th>
				<th>Nama Makanan</th>
				<th>kategori</th>
				<th>harga</th>
				<th>Diskon</th>
				<th>aksi</th>
			</tr>
			<?php $i=1; foreach ($item as $data) { ?>
			<tr>
				<td style="width: 5%"><?php echo $i;$i++; ?></td>
				<td><?php echo $data['nama']; ?></td>
				<td><?php echo $data['kategori']; ?></td>
				<td><?php echo $data['harga']; ?></td>
				<td style="width: 5%"><?php echo $data['diskon']; ?></td>
				<td>
					<a href="<?php echo base_url().'admin/item/update/'.$data['id'] ?>">edit</a> | 
					<a href="<?php echo base_url().'admin/item/delete/'.$data['id'] ?>" onclick="return confirm('anda yakin ingin menghapus item ini?');">delete</a>
				
				</td>
			</tr>
			<?php } ?>
		</table>
		<a class="btn btn-success float-right" href="<?php echo base_url().'admin/item/create' ?>">Tambah</a>
	</div>
</div>
</div>
</section>