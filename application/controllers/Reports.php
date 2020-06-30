<?php defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * 
 */
class Reports extends CI_Controller
{
    function __construct()
    {
        parent::__construct();                
        $this->load->library('form_validation');
        check_not_login();        
    }

    public function index()
    {
        // getCountBarangRusak
        $getBarangRusak = retrieveData('laboratorium/barang/countkondisi?kondisi=RUSAK');
        $barangRusak = $getBarangRusak->data;

        // getCountBarangBAIK
        $getBarangBaik = retrieveData('laboratorium/barang/countkondisi?kondisi=BAIK');
        $barangBaik= $getBarangBaik->data;

        // getCountBarangHABIS
        $getBarangHabis = retrieveData('laboratorium/barang/countkondisi?kondisi=HABIS');
        $barangHabis = $getBarangHabis->data;

        // getCountBarangHABIS
        $getNamaBarang = retrieveData('laboratorium/barang/namabarang');
        $namaBarang = $getNamaBarang->data;

        // getDetail
        $getDetails = retrieveData('laboratorium/peminjamandetail/getjumlahpinjaman');
        $details = $getDetails->data;

        $data = [
            'barang' => $namaBarang, 
            'rusak' => $barangRusak,
            'baik' => $barangBaik, 
            'habis' => $barangHabis, 
            'details' => $details
        ];
        
        $this->template->load('template', 'reports/index', $data);
    }
}
