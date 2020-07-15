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

        $totalRusak = 0; 
        // Total Rusak
        foreach($barangRusak as $brg){
            $totalRusak += $brg->jumlah_brg;
        }

        // getCountBarangBAIK
        $getBarangBaik = retrieveData('laboratorium/barang/countkondisi?kondisi=BAIK');
        $barangBaik= $getBarangBaik->data;
        $totalBaik = 0;
        // Total Baik
        foreach($barangBaik as $brg){
            $totalBaik += $brg->jumlah_brg;
        }

        // getCountBarangHABIS
        $getBarangHabis = retrieveData('laboratorium/barang/countkondisi?kondisi=HABIS');
        $barangHabis = $getBarangHabis->data;
        $totalHabis = 0;
        foreach($barangHabis as $brg){
            $totalHabis += $brg->jumlah_brg;
        }

        // getCountBarangHABIS
        $getNamaBarang = retrieveData('laboratorium/barang/namabarang');
        $namaBarang = $getNamaBarang->data;
        $jumlah = 0;
        foreach($namaBarang as $brg){
            $jumlah += $brg->jumlah_brg;
        }
        

        // Jenis Barang
        $getJenisBarang = retrieveData('laboratorium/jenisbarang');
        $jenisbarang = $getJenisBarang->data;

        $data = [
            'rusak' => $totalRusak,
            'baik' => $totalBaik,
            'habis' => $totalHabis,
            'jumlah' => $jumlah,
            'jenis_barang' => $jenisbarang
        ];
                
        $this->template->load('template', 'reports/index', $data);
    }


    public function filter_barang()
    {
        $post = $this->input->post();

        $post["thn_pengadaan"] = ($post["thn_pengadaan"] == null) ? null : $post["thn_pengadaan"];
        $post["asal_pengadaan"] = ($post["asal_pengadaan"] == null) ? null : $post["asal_pengadaan"];
        $post["jenis_brg"] = ($post["jenis_brg"] == null) ? null : $post["jenis_brg"];

        $filter = postData('laboratorium/barang/filter', $post);
        

        if($filter->responseCode == "00"){
            $data['filters'] = $filter->data;
            $data["posts"] = $post;
            // var_dump($data["posts"]); exit;
            $this->template->load('template', 'reports/filter-barang', $data);
        }else{
            $this->session->set_flashdata('failed', 'Barang tidak ditemukan');
            redirect('reports');
        }

    }

    public function showKondisi($kondisi = '')
    {
        if($kondisi == null){
            $getBarang = retrieveData('laboratorium/barang/namabarang');
            $data["kondisi"] = "Keseluruhan";            
        }else{
            $getBarang = retrieveData('laboratorium/barang/countkondisi?kondisi='.$kondisi);
            $data["kondisi"] = $kondisi;            
        }

        $data['barang_list'] = $getBarang->data;
        
        $this->template->load('template', 'reports/show-kondisi', $data);        
    }
}
