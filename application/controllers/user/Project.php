<?php

class Project extends User_Controller {

    function __construct() {
        parent::__construct();
        $this->load->helper('file');
        $this->load->model('Project_model', 'this_model');
    }

    function index() {
        $data['page'] = "user/project/index";
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
        $id = $this->session->userdata['user_login']['id'];
        $data['getComany'] = $this->this_model->getDetail($id);
//         print_r($data['getComany']);exit;
        $this->load->view(USER_LAYOUT, $data);
    }

    function add() {

        $data['page'] = "user/project/add";
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
            $res = $this->this_model->addProjectDetail($this->input->post(), $_FILES);
            echo json_encode($res);
            exit();
        }
        $this->load->view(USER_LAYOUT, $data);
    }

    function edit($id) {
        $companyId = $this->utility->decode($id);
        if (!ctype_digit($companyId)) {
            redirect(user_url() . 'project');
        }

        $data['page'] = "user/project/edit";
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
        $this->load->view(USER_LAYOUT, $data);
    }

    function projectDelete() {
        if ($this->input->post()) {
            $result = $this->this_model->projectDelete($this->input->post());
            echo json_encode($result);
            exit();
        }
    }

    function view($id) {
        $companyId = $this->utility->decode($id);
        if (!ctype_digit($companyId)) {
            redirect(user_url() . 'project');
        }

        $data['page'] = "user/project/view";
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
        $this->load->view(USER_LAYOUT, $data);
    }

    public function updateImage() {
        if ($this->input->post()) {
//            print_r($this->input->post());
//            exit;
            $res = $this->this_model->editImage($this->input->post(), $_FILES);
            echo json_encode($res);
            exit();
        }
    }

    function deleteImage() {
        if ($this->input->post()) {
            $result = $this->this_model->deleteProjectImage($this->input->post());
            echo json_encode($result);
            exit();
        }
    }

}

?>