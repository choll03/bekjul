<div class="page-holder">
      <!-- navbar-->
      <header class="header">
        <nav class="navbar navbar-expand-lg fixed-top">
          <div class="container"><a href="#" class="navbar-brand"></a>
            <button type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation" class="navbar-toggler navbar-toggler-right">Menu<i class="fa fa-align-justify"></i></button>
            <div id="navbarSupportedContent" class="collapse navbar-collapse">
              <ul class="navbar-nav ml-auto">
                <li class="nav-item"><a href="<?php echo base_url();?>" class="nav-link link-scroll">Beranda</a></li>
                <li class="nav-item"><a href="<?php echo base_url('menu/page');?>" class="nav-link link-scroll">Menu</a></li>
                <li class="nav-item"><a href="<?php echo base_url('booking');?>" class="nav-link link-scroll">Pesan Tempat</a></li>
                <?php if($this->session->has_userdata('username')){ ?>
                <li class="nav-item">
    			       <a href="<?php echo base_url('pesanan/cart');?>" class="nav-link link-scroll" id="cart" ><span class="badge badge-danger pesanan" style="border-radius:10px;font-size: 10px;position:relative;top:-5px;left:5px;"><?php if($this->cart->total_items() > 0){echo $this->cart->total_items();} ?></span><span class="fa fa-shopping-cart" style="font-size:18px;"></span>List Pesanan</a>
    			       
    			      </li>
                <li class="dropdown nav-item">
    			       <a href="#" class="nav-link dropdown-toggle" id="dropdown-toggle" data-toggle="dropdown"><span class="badge badge-danger count" style="border-radius:10px;font-size: 10px;position: absolute;left: -0.5px;"></span><span class="fa fa-envelope" style="font-size:18px;"></span>Notifikasi</a>
    			       <ul class="dropdown-menu" id="notif"></ul>
    			      </li>
                <li class="dropdown nav-item">
                 <a href="#" class="nav-link dropdown-toggle" id="dropdown-toggle" data-toggle="dropdown"><span class="fa fa-user" style="font-size:18px;"></span><?php echo $this->session->userdata('username'); ?></a>
                 <div class="dropdown-menu">
                  <?php if($this->session->userdata('level')== 'admin'){ ?>
                    <a href="<?php echo base_url('admin'); ?>" class="dropdown-item">Pesanan</a>
                    <a href="<?php echo base_url('admin/booking'); ?>" class="dropdown-item">Bookingan</a>
                    <a href="<?php echo base_url('admin/item'); ?>" class="dropdown-item">Item</a>
                  <?php }else{ ?>
                    <a href="<?php echo base_url('pesanan'); ?>" class="dropdown-item">Pesananku</a>
                    <a href="<?php echo base_url('bookingan'); ?>" class="dropdown-item">Bookinganku</a>
                  <?php } ?>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="<?php echo base_url('logout'); ?>">Logout</a>
                 </div>
                </li>
                <?php }else{ ?>
                  <li class="nav-item"><a href="<?php echo base_url('login');?>" class="nav-link link-scroll">Login</a></li>
                <?php } ?>
              </ul><!-- <a id="open-reservation" href="#" class="btn navbar-btn btn-unique d-none d-lg-inline-block">Make a Reservation          </a> -->
            </div>
          </div>
        </nav>
      </header>
      <!-- End Navbar-->
    </div>