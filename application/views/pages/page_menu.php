<style type="text/css">
	.pagination{
		position: absolute;
		left: 45%;
		margin-top: 50px;
	}
</style>
<section id="offers" class="offers">

      <div class="container text-center" >
			<div class="row" id="alert"></div>
        <header>
          <h2>Menu Cafe</h2>
          <h3>makanan dan minuman sehat dan segar</h3>
        </header>
        <div class="row">
        <?php foreach($menus as $menu){?>
          <div class="col-md-4 mb-5 mb-lg-0">
            <div class="item" style="padding: 30px 10px;">
              <div class="profile">
              	<?php if($menu['path'] != NULL){ ?>
              		<img src="<?php echo base_url($menu['path'])?>" alt="Dish Name" class="img-responsive" style="width: 340px;height: 140px"></div>
              	<?php }else{ ?>
              		<img src="<?php echo base_url('asset/img/dish-d.png')?>" alt="Dish Name" class="img-responsive"></div>
              	<?php } ?>
              <div class="text">
                <h4><?php echo $menu['nama']; ?></h4>
                <?php if($menu['diskon'] > 0){ ?>
	                <p class="after text-primary text-large">Rp. <?php echo $menu['harga']-($menu['harga']*$menu['diskon']/100); ?> </p>
	                <div class="discount"><span><?php echo $menu['diskon']; ?>% <br> off</span></div>
	                <p class="before text-muted text-large">Rp. <?php echo $menu['harga']; ?> </p>
            	<?php }else{ ?>
            		<p class="after text-primary text-large">Rp. <?php echo $menu['harga']; ?> </p>
            		<br>
            	<?php } ?>
              </div>
              <div class="item-footer" style="position:relative;">
								<input type="number" class="form-control" id="q<?php echo $menu['id']; ?>">
              	<button class="btn btn-primary my-4 btn-block added_cart" data-id="<?php echo $menu['id']; ?>" data-nama="<?php echo $menu['nama']; ?>" data-harga="<?php echo $menu['harga']; ?>">Pesan</button>
              </div>
            </div>
          </div>
      <?php } ?>
        </div>
        <nav aria-label="Page navigation example">
		  	<?php echo $this->pagination->create_links(); ?>
		</nav>
        
      </div>
    </section>
		<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
				  <div class="modal-dialog modal-dialog-centered" role="document">
				    <div class="modal-content">
				      <div class="modal-header">
				        <h5 class="modal-title" id="exampleModalCenterTitle" style="text-transform: uppercase;">tes</h5>
				        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
				          <span aria-hidden="true">&times;</span>
				        </button>
				      </div>
				      <div class="modal-body" style="text-align: left;">
				        <div class="form-group">
				        	<label for="qty" class="col-md-12 unique">Quantity
                    <input id="qty" name="qty" type="number" min="1" required="">
                  </label>
				        </div>
				      </div>
				      <div class="modal-footer">
								<button class="btn btn-primary cart_added"><i class="fa fa-shopping-cart"></i> Masukan Keranjang</button>
				      </div>
				    </div>
				  </div>
				</div>
<script>
	$(document).ready(function() {
		$('.added_cart').on('click', function() {
			var item_id = $(this).data('id');
			var item_nama = $(this).data('nama');
			var item_harga = $(this).data('harga');
			var qty = $('#q'+item_id).val();

			if(qty != "" && qty >0){
				$.ajax({
					url: "<?php echo base_url(); ?>pesanan/cart_added",
					method: "POST",
					data : {item_id: item_id, item_nama: item_nama, item_harga: item_harga, qty: qty},
					success : function(data) {
						$('.pesanan').html(data);
						$('#alert').append('<div style="position:fixed;left:60%;top:80px;z-index:9999"><div class="alert alert-success alert-dismissible fade show" role="alert"><strong>Berhasil Menyimpan!</strong> silahkan Check pada List Pemesanan untuk melanjutkan.<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div></div>');
					}
				});
			}else {
				alert("Harap isi jumlah pembelian");
				$('#q'+item_id).focus();
			}
		});
	});
</script>
    