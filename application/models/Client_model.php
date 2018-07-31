<?php

class Client_model extends My_model {

    public function __construct() {
        parent::__construct();
    }

    function countryList() {
        $data['select'] = ['id', 'sortname', 'name', 'phonecode'];
        $data['table'] = TABLE_COUNTRIES;
        $result = $this->selectRecords($data);
        return $result;
    }

    function addClient($postData) {
     $checkAlready = $this->checkAlready($postData['person_email']);

        if ($checkAlready) {

            $data['insert']['first_name'] = $postData['person_fname'];
            $data['insert']['last_name'] = $postData['person_lname'];
            $data['insert']['email'] = $postData['person_email'];
            $data['insert']['password'] = md5($postData['company_password']);
            $data['insert']['type'] = 'U';
            $data['insert']['is_verify'] = '1';
            $data['insert']['veryfication_token'] = md5($postData['person_email'] . time());
            $data['insert']['status'] = '1';
            $data['insert']['phone_no'] = $postData['company_user_phone'];
            $data['insert']['address'] = $postData['address'];
            $data['insert']['dt_created'] = DATE_TIME;
            $data['table'] = TABLE_USER;
            $result = $this->insertRecord($data);

            unset($data);
            if ($result) {
                $json_response['status'] = 'success';
                $json_response['message'] = 'client add successfully';
                $json_response['redirect'] = admin_url() . 'client/';
                return $json_response;
            }
        } else {
            $json_response['status'] = 'error';
            $json_response['message'] = 'This client already register';
            return $json_response;
        }
    }



    function checkAlready($email) {
        $this->db->where('type','U');
        $this->db->where('email', $email);
        $result = $this->db->get(TABLE_USER)->result_array();
        if (empty($result)) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    function getClientDetail() {
        // $data['select'] = ['c.name as comapnyName', 'c.email as companyEmail', 'c.phone as companyPhone', 'c.id as clientId', 'ct.name as countryName'];
        // $data['join'] = [
        //     TABLE_COUNTRIES . ' as ct' => [
        //         'c.country_id = ct.id',
        //         'LEFT',
        //     ],
        // ];
        // $data['table'] = TABLE_COMPANY . '  c';
        // $result = $this->selectFromJoin($data);
        $data['select'] = ['id', 'first_name', 'last_name', 'email','phone_no','address'];
        $data['where'] = ['type' => 'U'];
        $data['table'] = TABLE_USER;
        $result = $this->selectRecords($data);    
        return $result;
    }

    function getClientData($clientId) {
        $data['select'] = ['id', 'first_name', 'last_name', 'email','phone_no','address'];
        $data['where'] = ['id' => $clientId];
        $data['table'] = TABLE_USER;
        $result = $this->selectRecords($data);    

        return $result;
    }

    function companyDetail($clientId) {
        $data['select'] = [
            'c.name as companyName', 'c.email as companyEmail',
            'c.phone as companyPhone', 'c.address as companyAddress', 'c.city', 'c.id as clientId',
            'c.country_id', 'ct.name as countyName'];
        $data['table'] = TABLE_COMPANY . ' c';
        $data['join'] = [
            TABLE_COUNTRIES . ' as ct' => [
                'c.country_id = ct.id',
                'LEFT',
            ],
        ];
        $data['where'] = ['c.id' => $clientId];
        $result = $this->selectFromJoin($data);
        return $result;
    }

    function editClient($postData, $clientId) {
        $data['update']['first_name'] = $postData['person_fname'];
        $data['update']['last_name'] = $postData['person_lname'];
        $data['update']['phone_no'] = $postData['user_phone'];
        $data['update']['address'] = $postData['address'];
        $data['where'] = ['id' => $clientId];
        $data['table'] = TABLE_USER;
        $result = $this->updateRecords($data);
        unset($data);
        if ($result) {
                $json_response['status'] = 'success';
                $json_response['message'] = 'Client edit successfully';
                $json_response['redirect'] = admin_url() . 'client';
        } else {
                $json_response['status'] = 'error';
                $json_response['message'] = 'Something went wrong';
        }
        return $json_response;
    }

    function companyUserDetail($clientId) {
        $data['select'] = ['u.id', 'u.first_name', 'u.last_name', 'u.email', 'u.phone_no'];
        $data['where'] = ['u.company_id' => $clientId];
        $data['table'] = TABLE_USER . ' u';
        $result = $this->selectRecords($data);

        return $result;
    }

    function deleteClient($data) {
        $this->db->where('id', $data['id']);
        $result = $this->db->delete(TABLE_USER);
        if ($result) {
            $json_response['status'] = 'success';
            $json_response['message'] = 'Client delete successfully';
            $json_response['jscode'] = 'setTimeout(function(){location.reload();},1000)';
        } else {
            $json_response['status'] = 'error';
            $json_response['message'] = 'Something went wrong';
        }
        return $json_response;
    }

    function getReporterDetail($id = NULL) {
        $data['select'] = ['last_name', 'id', 'first_name', 'email'];
        $data['where'] = ['type' => 'C'];
        // $data['where'] = ['is_verify' => '1'];
        $data['table'] = TABLE_USER;
        $result = $this->selectRecords($data);

        return $result;
    }

 
    public function varifyEmail($postData) {
        $this->db->where('id', $postData['clientId']);
        $clientArray = $this->db->get(TABLE_USER)->row_array();
        $dataToeken = md5($clientArray['email'] . time());
        $data ['username'] = $clientArray['first_name'] . ' ' . $clientArray['last_name'];
        $data ['link'] = base_url_index() . 'account/verifyEmail/' . $dataToeken;
        $data ['message'] = $this->load->view('email_template/registration_mail', $data, TRUE);
        $data ['from_title'] = 'Verify user email address';
        $data ['subject'] = 'Verify user email address';
        $data ["to"] = $clientArray['email'];
        $mailSend = $this->utility->sendMailSMTP($data);
        if ($mailSend) {

            $dataUpdate['update']['veryfication_token'] = $dataToeken;
            $dataUpdate['update']['is_verify'] = '0';
            $dataUpdate['where'] = ['id' => $clientArray['id']];
            $dataUpdate['table'] = TABLE_USER;
            $this->updateRecords($dataUpdate);
            unset($data);
        }
        return $mailSend;
    }

}

?>