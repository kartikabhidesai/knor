<?php

class Front extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->helper('cookie');
    }

    function index() {
        $data['page'] = "front/home/home";
        $data['var_meta_title'] = 'Knor';
        $data['var_meta_description'] = 'Knor';
        $data['var_meta_keyword'] = 'Knor';
        $data['js'] = array(
        );
        $data['js_plugin'] = array(
        );
        $data['css'] = array(
        );
        $data['css_plugin'] = array(
        );
        $data['init'] = array(
        );
        $this->load->view(FRONT_LAYOUT , $data);    
    }
 
}

?>