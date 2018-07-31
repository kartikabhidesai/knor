<?php

class Client extends Admin_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('Client_model', 'this_model');
    }

    function index() {
        $data['page'] = "admin/client/index";
        $data['client'] = 'active';
        $data['pagetitle'] = 'Client';
        $data['var_meta_title'] = 'Client';
        $data['breadcrumb'] = array(
            'dashboard' => 'Home',
            'client' => 'Client List',
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
        $data['getClientDetail'] = $this->this_model->getClientDetail();
        $this->load->view(ADMIN_LAYOUT, $data);
    }

    function add() {
        $data['page'] = "admin/client/add";
        $data['client'] = 'active';
        $data['pagetitle'] = 'Client';
        $data['var_meta_title'] = 'Client';
        $data['breadcrumb'] = array(
            'dashboard' => 'Home',
            'client' => 'Client Add',
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
            $res = $this->this_model->addClient($this->input->post());
            echo json_encode($res);
            exit();
        }
        $this->load->view(ADMIN_LAYOUT, $data);
    }

    function edit($id) {
        $clientId = $this->utility->decode($id);

        if (!ctype_digit($clientId)) {
            redirect(admin_url() . 'client');
        }

        $data['page'] = "admin/client/edit";
        $data['client'] = 'active';
        $data['pagetitle'] = 'Client';
        $data['var_meta_title'] = 'Client';
        $data['breadcrumb'] = array(
            'dashboard' => 'Home',
            'client' => 'Client Edit',
        );
        $data['css'] = array();

        $data['js'] = array(
            'admin/client.js',
        );
        $data['init'] = array(
            'Client.clientEdit()',
        );

        $data['clientData'] = $this->this_model->getClientData($clientId);
        if ($this->input->post()) {
            $res = $this->this_model->editClient($this->input->post(), $clientId);
            echo json_encode($res);
            exit();
        }
        $this->load->view(ADMIN_LAYOUT, $data);
    }

    function detail($id) {
        $clientId = $this->utility->decode($id);
        if (!ctype_digit($clientId)) {
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
        $data['clientId'] = $clientId;
        $data['companyDeatail'] = $this->this_model->companyDetail($clientId);
        $data['companyUserDetail'] = $this->this_model->companyUserDetail($clientId);
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
                    $json_response['redirect'] = admin_url() . 'client/detail/' . $this->utility->encode($this->input->post('company_id'));
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
            $result = $this->db->get_where(TABLE_USER, array('id' => $this->input->post('personId'), 'company_id' => $this->input->post('clientId')))->result_array();
            echo json_encode($result);
            exit();
        }
    }

    function deleteClient() {
        if ($this->input->post()) {
            $result = $this->this_model->deleteClient($this->input->post());
            echo json_encode($result);
            exit();
        }
    }



    function sendEmail() {
        $this->load->library('email');

        $config['protocol'] = "smtp";
        $config['smtp_host'] = SMTP_HOST;
        $config['smtp_port'] = SMTP_PORT;
        $config['smtp_user'] = SMTP_USER;
        $config['smtp_pass'] = SMTP_PASS;

        $config['smtp_timeout'] = 20;
        $config['priority'] = 1;
        $config['charset'] = 'utf-8';
        $config['wordwrap'] = TRUE;
        $config['crlf'] = "\r\n";
        $config['newline'] = "\r\n";
        $config['mailtype'] = "html";
        $config['starttls'] = true;



        $this->email->initialize($config);
        //$this->email->clear(TRUE);
        $this->email->to('kartikdesai123@gmail.com');
        $this->email->from($config ['smtp_user'], PROJECT_NAME);

        $this->email->subject('Test Email');
        $this->email->message('Hello this is test mgs');

        $response = $this->email->send();
        echo $this->email->print_debugger();
        exit;
    }

    function resetPassword() {

        if ($this->input->post()) {
//            print_r($this->input->post());exit;
            $res = $this->this_model->resetPassword($this->input->post());
            if ($res) {
                $json_response['status'] = 'success';
                $json_response['message'] = 'Password Reset successfully';
//                $json_response['redirect'] = admin_url() . 'client/detail/' . $this->utility->encode($this->input->post('company_id'));
                echo json_encode($json_response);
                exit();
            } else {
                $json_response['status'] = 'error';
                $json_response['message'] = 'Something went wrong';
                echo json_encode($json_response);
                exit();
            }
        }
    }
    function varifyEmail() {
        if ($this->input->post()) {
            $res = $this->this_model->varifyEmail($this->input->post());
            if ($res) {
                $json_response['status'] = 'success';
                $json_response['message'] = 'Password Reset successfully';
                echo json_encode($json_response);
                exit();
            } else {
                $json_response['status'] = 'error';
                $json_response['message'] = 'Something went wrong';
                echo json_encode($json_response);
                exit();
            }
        }
    }
}
?>