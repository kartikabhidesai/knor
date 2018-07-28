<?php

class Project extends Admin_Controller {

    function __construct() {
        parent::__construct();
        $this->load->helper('file');
        $this->load->model('Project_model', 'this_model');
    }

    function index() {
        $data['page'] = "admin/project/index";
        $data['user'] = 'active';
        $data['pagetitle'] = 'Project';
        $data['var_meta_title'] = 'Project';
        $data['breadcrumb'] = array(
            'dashboard' => 'Home',
            'Project' => 'Project List',
        );
        $data['css'] = array(
            'plugins/dataTables/datatables.min.css'
        );

        $data['js'] = array(
            'plugins/dataTables/datatables.min.js',
            'admin/project.js',
        );
        $data['init'] = array(
            'Project.clientList()',
        );
        $data['getComany'] = $this->this_model->getDetail();
//         print_r($data['getComany']);exit;
        $this->load->view(ADMIN_LAYOUT, $data);
    }

    function view($id) {
        $companyId = $this->utility->decode($id);
        if (!ctype_digit($companyId)) {
            redirect(user_url() . 'project');
        }

        $data['page'] = "admin/project/view";
        $data['user'] = 'active';
        $data['pagetitle'] = 'view';
        $data['var_meta_title'] = 'view';
        $data['breadcrumb'] = array(
            'dashboard' => 'Home',
            'Project' => 'Project view',
        );
        $data['css'] = array(
            'plugins/blueimp/css/blueimp-gallery.min.css',
            'animate.css',
        );

        $data['js'] = array(
            'ajaxfileupload.js',
            'jquery.form.min.js',
            'inspinia.js',
            'plugins/blueimp/jquery.blueimp-gallery.min.js',
            'plugins/pace/pace.min.js',
            'admin/project.js',
        );
        $data['init'] = array(
            'Project.clientEdit()',
        );

        $data['country'] = $this->this_model->countryList();
        $data['projectDetail'] = $this->this_model->companyDetail($companyId);

        if ($this->input->post()) {
            // print_r($this->input->post());exit;
            $res = $this->this_model->editCompany($this->input->post(), $companyId, $_FILES);
            echo json_encode($res);
            exit();
        }
        $this->load->view(ADMIN_LAYOUT, $data);
    }
}

?>