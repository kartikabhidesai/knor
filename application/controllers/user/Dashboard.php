<?php

class Dashboard extends User_Controller {

    function __construct() {
        parent::__construct();
       
    }

    function index() {
//        $data['page'] = "client/account/dashboard";
        $data['page'] = "user/account/index";
        $data['dashboard'] = 'active';
        $data['pagetitle'] = 'Dashboard';
        $data['var_meta_title'] = 'Dashboard';
        $data['breadcrumb'] = array(
            'dashboard' => 'Home',
            'dashboard1' => 'Dashboard',
        );
        $data['css'] = array(
            'plugins/dataTables/datatables.min.css'
        );

        $data['js'] = array(
            'plugins/dataTables/datatables.min.js',
            'client/ticket.js',
        );
        $data['init'] = array(
            // 'Tickets.clientList()',
        );
  
        $this->load->view(USER_LAYOUT, $data);
    }

}

?>