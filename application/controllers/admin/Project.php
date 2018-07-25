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

    function add() {
        
        $data['page'] = "admin/project/add";
        $data['user'] = 'active';
        $data['pagetitle'] = 'Project';
        $data['var_meta_title'] = 'Project';
        $data['breadcrumb'] = array(
            'dashboard' => 'Home',
            'Project' => 'Project Add',
        );
        $data['css'] = array();

        $data['js'] = array(
            'ajaxfileupload.js',
            'jquery.form.min.js',
            'admin/project.js',
        );
        $data['init'] = array(
            'Project.clientAdd()',
        );

        $data['country'] = $this->this_model->countryList();
        if ($this->input->post()) {
            $res = $this->this_model->addProjectDetail($this->input->post(),$_FILES);
            echo json_encode($res);  
            exit();
        }
        $this->load->view(ADMIN_LAYOUT, $data);
    }

    function edit($id) {
        $companyId = $this->utility->decode($id);
        if (!ctype_digit($companyId)) {
            redirect(admin_url() . 'project');
        }

        $data['page'] = "admin/project/edit";
        $data['user'] = 'active';
        $data['pagetitle'] = 'Project';
        $data['var_meta_title'] = 'Project';
        $data['breadcrumb'] = array(
            'dashboard' => 'Home',
            'Project' => 'Project Edit',
        );
        $data['css'] = array();

        $data['js'] = array(
            'ajaxfileupload.js',
            'jquery.form.min.js',
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

    function projectDelete() {
        if ($this->input->post()) {
            $result = $this->this_model->deleteUser($this->input->post());
            echo json_encode($result);
            exit();
        }
    }

}
?>