<?php 
    
    function check_already_login(){
        $ci =& get_instance();
        $admin_session = $ci->session->userdata('admin_logged');
        if($admin_session){
            redirect('barang');
        }
    }


    function check_not_login(){
        $ci =& get_instance();
        $admin_session = $ci->session->userdata('admin_logged');
        if(!$admin_session){
            redirect('auth');
        }
    }

    function check_kalab(){
        $ci =& get_instance();
        $admin_kalab = $ci->session->userdata('admin_logged')->jabatan == "PLP" || $ci->session->userdata('admin_logged')->jabatan == "ADMIN";
        if(!$admin_kalab){
            redirect('/');
        } 
    }

    // GET Data from API
    function retrieveData($url){
        $ci =& get_instance();
        $retrieve = $ci->customguzzle->getPlain($url,'application/json');
        $result = json_decode($retrieve["data"]);

        return $result;
    }
    

    function postData($url, $insertData){
        $ci =& get_instance();
        $postData = $ci->customguzzle->postBlank($url,'application/x-www-form-urlencoded', $insertData);
        $result = json_decode($postData["data"]);

        return $result;
    }

    function updateData($url, $updateData){
        $ci =& get_instance();
        $postData = $ci->customguzzle->putBlank($url,'application/x-www-form-urlencoded', $updateData);
        $result = json_decode($postData["data"]);

        return $result;
    }

    function deleteData($url, $deleteData){
        $ci =& get_instance();
        $postData = $ci->customguzzle->delBlank($url,'application/x-www-form-urlencoded', $deleteData);
        $result = json_decode($postData["data"]);

        return $result;
    }
?>