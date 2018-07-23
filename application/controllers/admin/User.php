<?php

class User extends Admin_Controller {

    function __construct() {
        parent::__construct();
        
        $this->load->model('User_model', 'this_model');
    }

    function index() {
        $data['page'] = "admin/user/index";
        $data['user'] = 'active';
        $data['pagetitle'] = 'User';
        $data['var_meta_title'] = 'User';
        $data['breadcrumb'] = array(
            'dashboard' => 'Home',
            'User' => 'User List',
        );
        $data['css'] = array(
            'plugins/dataTables/datatables.min.css'
        );

        $data['js'] = array(
            'plugins/dataTables/datatables.min.js',
            'admin/client.js',
        );
        $data['init'] = array(
            'Client.clientList()',
        );
        $data['getComany'] = $this->this_model->getDetail();
        $this->load->view(ADMIN_LAYOUT, $data);
    }

    function add() {
        
        $data['page'] = "admin/user/add";
        $data['user'] = 'active';
        $data['pagetitle'] = 'User';
        $data['var_meta_title'] = 'User';
        $data['breadcrumb'] = array(
            'dashboard' => 'Home',
            'User' => 'User Add',
        );
        $data['css'] = array();

        $data['js'] = array(
            'admin/client.js',
        );
        $data['init'] = array(
            'Client.clientAdd()',
        );

        $data['country'] = $this->this_model->countryList();
        if ($this->input->post()) {
            $res = $this->this_model->addUserDetail($this->input->post());
            echo json_encode($res);
            exit();
        }
        $this->load->view(ADMIN_LAYOUT, $data);
    }

    function edit($id) {
        $companyId = $this->utility->decode($id);
        if (!ctype_digit($companyId)) {
            redirect(admin_url() . 'user');
        }

        $data['page'] = "admin/user/edit";
        $data['user'] = 'active';
        $data['pagetitle'] = 'User';
        $data['var_meta_title'] = 'User';
        $data['breadcrumb'] = array(
            'dashboard' => 'Home',
            'User' => 'User Edit',
        );
        $data['css'] = array();

        $data['js'] = array(
            'admin/client.js',
        );
        $data['init'] = array(
            'Client.clientEdit()',
        );

        $data['country'] = $this->this_model->countryList();
        $data['companyDeatail'] = $this->this_model->companyDetail($companyId);
        // print_r($data['companyDeatail']);exit;
        if ($this->input->post()) {
            // print_r($this->input->post());exit;
            $res = $this->this_model->editCompany($this->input->post(), $companyId);
            echo json_encode($res);
            exit();
        }
        $this->load->view(ADMIN_LAYOUT, $data);
    }

    function detail($id) {
        $companyId = $this->utility->decode($id);
        if (!ctype_digit($companyId)) {
            return(admin_url() . 'client');
        }
        $data['page'] = "admin/client/detail";
        $data['client'] = 'active';
        $data['pagetitle'] = 'Client Detail';
        $data['var_meta_title'] = 'Client Detail';
        $data['breadcrumb'] = array(
            'dashboard' => 'Home',
            'client' => 'Client Detail',
        );
        $data['css'] = array('plugins/dataTables/datatables.min.css');

        $data['js'] = array(
            'plugins/dataTables/datatables.min.js',
            'admin/client.js',
        );
        $data['init'] = array(
            'Client.clientDetail()',
        );
        $data['companyId'] = $companyId;
        $data['companyDeatail'] = $this->this_model->companyDetail($companyId);
        $data['companyUserDetail'] = $this->this_model->companyUserDetail($companyId);
        $this->load->view(ADMIN_LAYOUT, $data);
    }

    function addUpdatePerson() {

        if ($this->input->post()) {
            if ($this->input->post('person_id')) {
                $res = $this->this_model->editCompanyUsers($this->input->post());
            } else {
                $res = $this->this_model->addCompanyUsers($this->input->post(), $this->input->post('company_id'));
            }

            if ($res) {
                if (is_array($res)) {
                    echo json_encode($res);
                    exit();
                } else {
                    $json_response['status'] = 'success';
                    $json_response['message'] = 'Person add successfully';
                    $json_response['redirect'] = admin_url() . 'user/detail/' . $this->utility->encode($this->input->post('company_id'));
                    echo json_encode($json_response);
                    exit();
                }
            } else {
                $json_response['status'] = 'error';
                $json_response['message'] = 'Something went wrong';
                echo json_encode($json_response);
                exit();
            }
        }
    }

    function getPersonInfo() {
        if ($this->input->post()) {
            $result = $this->db->get_where(TABLE_USER, array('id' => $this->input->post('personId'), 'company_id' => $this->input->post('companyId')))->result_array();
            echo json_encode($result);
            exit();
        }
    }

    

    function clientDelete() {
        if ($this->input->post()) {
            // print_r($this->input->post());exit;
            $result = $this->this_model->deleteUser($this->input->post());
            echo json_encode($result);
            exit();
        }
    }

}
?>