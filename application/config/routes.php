<?php
defined('BASEPATH') OR exit('No direct script access allowed');


$route['default_controller'] = 'welcome';

$route['admin'] = 'admin';
$route['admin/delete/(:any)/(:any)'] = 'admin/delete_pesanan/$1/$2';
$route['admin/update/(:any)/(:any)'] = 'admin/update_pesanan/$1/$2';
$route['admin/view/(:any)'] = 'admin/view/$1';
$route['admin/clear/(:any)'] = 'admin/delete_per_pesanan/$1';
$route['admin/booking'] = 'admin/booking';
$route['admin/booking/update/(:any)/(:any)'] = 'admin/update_booking/$1/$2';
$route['admin/booking/batal/(:any)/(:any)'] = 'admin/delete_booking/$1/$2';
$route['admin/booking/delete/(:any)'] = 'admin/delete_per_booking/$1';
$route['admin/item'] = 'admin/item';
$route['admin/item/create'] = 'admin/create_item';
$route['admin/item/update/(:any)'] = 'admin/update_item/$1';
$route['admin/item/delete/(:any)'] = 'admin/delete_item/$1';
$route['admin/laporan'] = 'admin/laporan';
$route['admin/cetak/(:any)'] = 'admin/cetak/$1';
$route['admin/users'] = 'admin/users';
$route['admin/users/edit_user'] = 'admin/edit_user';


$route['dropzone/upload'] = 'image';
$route['admin/item/image/delete/(:any)'] = 'image/delete/$1';

$route['login'] = 'auth/login';
$route['register'] = 'auth/register';
$route['logout'] = 'welcome/logout';

$route['email'] = 'welcome/email';
$route['pesanan'] = 'pesanan';
$route['pesanan/cart'] = 'pesanan/cart';
$route['pesanan/cart_clear'] = 'pesanan/cart_clear';
$route['pesanan/cart_added'] = 'pesanan/cart_added';
$route['pesanan/cart_remove/(:any)'] = 'pesanan/cart_remove/$1';
$route['pesanan/detail/(:any)'] = 'pesanan/detail/$1';
$route['pesanan/cetak/(:any)'] = 'pesanan/cetak/$1';
$route['proses_pesanan'] = 'pesanan/proses_pesanan';
$route['pesanan/delete/(:any)'] = 'pesanan/delete/$1';

$route['menu/page'] = 'item';
$route['menu/page/(:any)'] = 'item';

$route['load/notif'] = 'notif';
$route['notif/delete'] = 'notif/delete';
$route['menu/page/load/notif'] = 'notif';
$route['menu/load/notif'] = 'notif';
$route['admin/load/notif'] = 'notif';

$route['booking'] = 'booking';
$route['booking/proses_booking'] = 'booking/proses_booking';
$route['booking/batal/(:any)'] = 'booking/batal_booking/$1';
$route['booking/room/(:any)'] = 'booking/payment/$1';
$route['bookingan'] = 'booking/bookingan';
$route['booking/tempat'] = 'booking/booking_tempat';


$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
