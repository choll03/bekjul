
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
		<h2>Users</h2>
		<table class="table table-bordered">
			<tr>
				<th>Username</th>
				<th>Email</th>
				<th>Phone</th>
				<th>Level</th>
				<th>aksi</th>
			</tr>
			<?php foreach ($users as $data) { ?>
			<tr>
                <td><?php echo $data->username ?></td>
                <td><?php echo $data->email ?></td>
                <td><?php echo $data->phone ?></td>
                <td><?php echo $data->level ?></td>
                <td><button class="btn btn-primary" data-toggle="modal" data-target="#userModal<?php echo $data->id ?>"><i class="fa fa-pencil"></i>Edit</button></td>
            <div class="modal fade" id="userModal<?php echo $data->id ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
				  <div class="modal-dialog modal-dialog-centered" role="document" >
				    <div class="modal-content" >
				      <div class="modal-header">
				        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
				          <span aria-hidden="true">&times;</span>
				        </button>
				      </div>
				      <div class="modal-body" style="text-align: left;">
                      <?php echo form_open('admin/users/edit_user') ?>
				        <div class="form-group">
                            <input type="hidden" name="user_id" value="<?php echo $data->id ?>">
				        	<label for="username" class="col-md-12 unique">Username
                            <input id="username" name="username" type="text" required="" value="<?php echo $data->username ?>">
                            </label>
                            <label for="email" class="col-md-12 unique">Email
                            <input id="email" name="email" type="text" required="" value="<?php echo $data->email ?>">
                            </label>
                            <label for="phone" class="col-md-12 unique">Phone
                            <input id="phone" name="phone" type="number" required="" value="<?php echo $data->phone ?>">
                            </label>
                            <label for="level" class="col-md-12 unique">Level
                            <select name="level" id="level" class="form-control">
                                <?php if ($data->level == 'admin'){ ?>
                                    <option value="<?php echo $data->level ?>" selected><?php echo $data->level ?></option>
                                    <option value="member">member</option>
                                <?php }else{ ?>
                                    <option value="admin">admin</option>
                                    <option value="<?php echo $data->level ?>" selected><?php echo $data->level ?></option>
                                <?php } ?>
                            </select>
                            </label>
				        </div>
				      </div>
				      <div class="modal-footer">
				        <input type="submit" class="btn btn-primary" value="Edit">
				      </div>
				    </div>
                    <?php echo form_close() ?>
				  </div>
				</div>
            </tr>
			<?php } ?>
		</table>
	</div>
</div>
</div>

</section>