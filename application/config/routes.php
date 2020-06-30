<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	https://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|	$route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/
$route['default_controller'] = 'reports';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
$route['/'] = 'Dashboard/index';
$route['supplier'] = 'Supplier/index';
$route['supplier/add'] = 'Supplier/add';
$route['staff'] = 'Staff/index';
$route['tambahdata'] = 'Tambahdata/index';
$route['barang'] = 'Barang/index';
$route['peminjaman'] = 'Peminjaman/index';

// Client Side
$route['client'] = 'client/Client/index';
$route['client/stripe-card/(:any)'] = 'client/Client/stripeCard/$1';
$route['client/panduan'] = 'client/Client/panduan';
$route['client/pilihan/(:any)'] = 'client/Client/pilihPeminjam/$1';
$route['client/daftar'] = 'client/Client/daftar';

// Client Side : Mahasiswa
$route['client/card_data/(:any)'] = 'client/Client/card_data/$1';
$route['client/form-mahasiswa/(:any)'] = 'client/Client/form_peminjaman/$1';
$route['client/cancel/(:any)'] = 'client/Client/cancelPeminjamanMahasiswa/$1';
$route['client/detail/(:any)'] = 'client/Client/detail_barang_pinjam/$1';
$route['client/pinjam-barang/(:any)'] = 'client/Client/createPeminjamanMahasiswa/$1';
$route['client/kembalikan-data/(:any)'] = 'client/Client/kembalikan_data/$1';
$route['client/kembalikan-barang/(:any)'] = 'client/Client/updatePengembalian/$1';
$route['client/delete-detail'] = 'client/Client/deleteDetail';
$route['client/tambah-barang'] = 'client/Client/tambahBarang';

// Client Side : Staff
$route['client/nip-input/(:any)'] = 'client/Client/nipInput/$1';
$route['client/form-staff/(:any)'] = 'client/Client/form_staff/$1';
$route['client/return-data/(:any)'] = 'client/Client/return_data/$1';