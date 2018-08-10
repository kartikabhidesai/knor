<?php

class Dashboard extends Admin_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('Project_model', 'this_model');

    }

    function index() {
        $data['page'] = "admin/account/dashboard";
        $data['dashboard'] = 'active';
        $data['pagetitle'] = 'Dashboard';
        $data['var_meta_title'] = 'Dashboard';
        $data['breadcrumb'] = array(
            'dashboard'=>'Home',
            'dashboard1'=>'Dashboard',
        );
        
        $data['getProject'] = $this->this_model->getDetailV2();
        
        $data['css'] = array(
        );
        $data['css_plugin'] = array(

        );
        $data['js_plugin'] = array(

        );
        $data['init'] = array(
//            'Dashboard.init()',
        );

        $this->load->view(ADMIN_LAYOUT, $data);
    }
    

}

?>