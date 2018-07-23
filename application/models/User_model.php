<?php

class User_model extends My_model {

    public function __construct() {
        parent::__construct();
    }

    function countryList() {
        $data['select'] = ['id', 'sortname', 'name', 'phonecode'];
        $data['table'] = TABLE_COUNTRIES;
        $result = $this->selectRecords($data);
        return $result;
    }

    function addUserDetail($postData) {
        // echo 'dfsdf';
        // print_r($postData);exit;
        $data['insert']['name'] = $postData['names'];
        $data['insert']['email'] = $postData['email'];
        $data['insert']['address1'] = $postData['address1'];
        $data['insert']['address2'] = $postData['addess2'];
        $data['insert']['country_name'] = $postData['country_name'];
        $data['insert']['state'] = $postData['state'];
        $data['insert']['city'] = $postData['city'];
        $data['insert']['zipcode'] = $postData['zipcode'];
        $data['insert']['dt_created'] = DATE_TIME;
        $data['insert']['dt_updated'] = DATE_TIME;
        $data['table'] = 'user_detail';
        $result = $this->insertRecord($data);

        unset($data);
            if ($result) {
                $json_response['status'] = 'success';
                $json_response['message'] = 'વપરાશકર્તા વિગતો સફળતાપૂર્વક ઉમેરાઈ';
                $json_response['redirect'] = admin_url() . 'user';
            } else {
                $json_response['status'] = 'error';
                $json_response['message'] = 'કંઈક ખોટું થયું';
            }
        
        return $json_response;
    }

    function getDetail() {
        $data['select'] = ['c.name as userName', 
        'c.email', 
        'c.address1', 
        'c.address2', 
        'c.zipcode', 
        'c.id as companyId', 'ct.name as countryName'];
        $data['join'] = [
            TABLE_COUNTRIES . ' as ct' => [
                'c.country_name = ct.id',
                'LEFT',
            ],
        ];
        $data['table'] =  'user_detail c';
        $result = $this->selectFromJoin($data);
        return $result;
    }

    function companyDetail($companyId) {
        $data['select'] = ['c.name as userName', 
        'c.id', 
        'c.email', 
        'c.address1', 
        'c.address2', 
        'c.country_name', 
        'c.state', 
        'c.city', 
        'c.zipcode', 
        'c.id as companyId', 'ct.name as countryName'];
        $data['table'] =  'user_detail c';
        $data['join'] = [
            TABLE_COUNTRIES . ' as ct' => [
                'c.country_name = ct.id',
                'LEFT',
            ],
        ];
        $data['where'] = ['c.id' => $companyId];
        $result = $this->selectFromJoin($data);
        return $result;
    }

    function editCompany($postData, $companyId) {
        $data['update']['name'] = $postData['names'];
        $data['update']['email'] = $postData['email'];
        $data['update']['address1'] = $postData['address1'];
        $data['update']['address2'] = $postData['addess2'];
        $data['update']['country_name'] = $postData['country_name'];
        $data['update']['state'] = $postData['state'];
        $data['update']['city'] = $postData['city'];
        $data['update']['zipcode'] = $postData['zipcode'];
        $data['update']['dt_updated'] = DATE_TIME;
        $data['where'] = ['id' => $companyId];
        $data['table'] = 'user_detail';
        $result = $this->updateRecords($data);
        unset($data);
        if ($result) {
                $json_response['status'] = 'success';
                $json_response['message'] = 'User  edit successfully';
                $json_response['redirect'] = admin_url() . 'user';
            } else {
                $json_response['status'] = 'error';
                $json_response['message'] = 'કંઈક ખોટું થયું';
            }
        return $json_response;
    }
    
    function deleteUser($data){
        $this->db->where('id',$data['id']);
        $result = $this->db->delete('user_detail');
        
        if($result){
            $json_response['status'] = 'success';
            $json_response['message'] = 'User delete successfully';
            $json_response['jscode'] = 'setTimeout(function(){location.reload();},1000)';
            
        }else{
            $json_response['status'] = 'error';
            $json_response['message'] = 'Something went wrong';
        }
        return $json_response;
    }


}

?>