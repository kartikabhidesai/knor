<?php

class Project_model extends My_model {

    public function __construct() {
        parent::__construct();
    }

    function countryList() {
        $data['select'] = ['id', 'sortname', 'name', 'phonecode'];
        $data['table'] = TABLE_COUNTRIES;
        $result = $this->selectRecords($data);
        return $result;
    }

    function addProjectDetail($postData, $file) {
//        print_r($postData);
//        print_r($file);
//        exit;
        $this->load->library('upload', $config);
        $message = '';
        $data['insert']['project_name'] = $postData['names'];
        $data['insert']['project_desc'] = $postData['address'];
        $data['insert']['user_id'] = $this->session->userdata['user_login']['id'];
        $data['insert']['dt_created'] = DATE_TIME;
        $data['insert']['dt_updated'] = DATE_TIME;
        $data['table'] = TABLE_PROJECT;
        $projectId = $this->insertRecord($data);

        if (!empty($_FILES['project_image']['name'])) {
            $filesCount = count($_FILES['project_image']['name']);
            for ($i = 0; $i < $filesCount; $i++) {
                $ext = end((explode(".", $_FILES['project_image']['name'][$i])));
                $_FILES['file']['name'] = time() . $i . "." . $ext;
                $_FILES['file']['type'] = $_FILES['project_image']['type'][$i];
                $_FILES['file']['tmp_name'] = $_FILES['project_image']['tmp_name'][$i];
                $_FILES['file']['error'] = $_FILES['project_image']['error'][$i];
                $_FILES['file']['size'] = $_FILES['project_image']['size'][$i];

                $uploadPath = 'uploads/project/';
                $config['upload_path'] = $uploadPath;
                $config['allowed_types'] = '*';

                $this->load->library('upload', $config);
                $this->upload->initialize($config);
                if ($this->upload->do_upload('file')) {
                    
                    $fileData = $this->upload->data();

                    $dataImage['insert']['project_image'] = $fileData['file_name'];
                    $dataImage['insert']['project_id'] = $projectId;
                    $dataImage['insert']['dt_created'] = DATE_TIME;
                    $dataImage['insert']['dt_updated'] = DATE_TIME;
                    $dataImage['table'] = TABLE_PROJECT_IMAGES;
                    $result = $this->insertRecord($dataImage);
                }else{
                     $message = $this->upload->display_errors();
                }
            }
        }
        unset($data);
        if ($result) {
            $json_response['status'] = 'success';
            $json_response['message'] = 'Project added successfully.';
//            $json_response['redirect'] = user_url() . 'project';
            $json_response['jscode'] = 'setTimeout(function(){location.reload();},1000)';
        } else {
            $json_response['status'] = 'error';
            $json_response['message'] = $message;
        }
        return $json_response;
    }

    function getDetailV2() {
        $data['select'] = ['c.project_name',
            'c.id as projectID',
            'c.project_desc',
        ];
        $data['join'] = [
            TABLE_PROJECT_IMAGES . ' as pi' => [
                'c.id = pi.project_id',
                'LEFT',
            ],
        ];
        $data['groupBy'] = 'c.id';
        $data['table'] = TABLE_PROJECT . ' c';
        $result = $this->selectFromJoin($data);
        return $result;
    }

    function getDetail($userId = null) {
        $data['select'] = ['c.project_name',
            'c.id as projectID',
            'c.project_desc',
        ];
        $data['join'] = [
            TABLE_PROJECT_IMAGES . ' as pi' => [
                'c.id = pi.project_id',
                'LEFT',
            ],
        ];
        $data['groupBy'] = 'c.id';
        $data['where'] = ['c.user_id' => $userId];
        $data['table'] = TABLE_PROJECT . ' c';
        $result = $this->selectFromJoin($data);
        return $result;
    }

    function companyDetail($projectId) {
        $data['select'] = ['c.project_name',
            'c.id as projectID',
            'pi.id as projectImageID',
            'pi.project_image as project_image',
            'c.project_desc',
        ];
        $data['join'] = [
            TABLE_PROJECT_IMAGES . ' as pi' => [
                'c.id = pi.project_id',
                'LEFT',
            ],
        ];
        $data['where'] = ['c.id' => $projectId];
        $data['table'] = TABLE_PROJECT . ' c';
        $result = $this->selectFromJoin($data);
        return $result;
    }

    function editCompany($postData, $projectId, $file) {
        $data['update']['project_name'] = $postData['names'];
        $data['update']['project_desc'] = $postData['description'];
        $data['update']['dt_updated'] = DATE_TIME;
        $data['where'] = ['id' => $projectId];
        $data['table'] = TABLE_PROJECT;
        $result = $this->updateRecords($data);
        if (!empty($_FILES['project_image']['name'])) {
            //   $this->db->where('project_id',  $projectId);
            //   $result = $this->db->delete(TABLE_PROJECT_IMAGES);
            $filesCount = count($_FILES['project_image']['name']);
            for ($i = 0; $i < $filesCount; $i++) {
                $ext = end((explode(".", $_FILES['project_image']['name'][$i])));
                $_FILES['file']['name'] = time() . $i . "." . $ext;
                $_FILES['file']['type'] = $_FILES['project_image']['type'][$i];
                $_FILES['file']['tmp_name'] = $_FILES['project_image']['tmp_name'][$i];
                $_FILES['file']['error'] = $_FILES['project_image']['error'][$i];
                $_FILES['file']['size'] = $_FILES['project_image']['size'][$i];

                $uploadPath = 'uploads/project/';
                $config['upload_path'] = $uploadPath;
                $config['allowed_types'] = '*';

                $this->load->library('upload', $config);
                $this->upload->initialize($config);

                if ($this->upload->do_upload('file')) {
                    $fileData = $this->upload->data();
                    $dataImage['insert']['project_image'] = $fileData['file_name'];
                    $dataImage['insert']['project_id'] = $projectId;
                    $dataImage['insert']['dt_created'] = DATE_TIME;
                    $dataImage['insert']['dt_updated'] = DATE_TIME;
                    $dataImage['table'] = TABLE_PROJECT_IMAGES;
                    $result = $this->insertRecord($dataImage);
                }
            }
        }

        unset($data);
        if ($result) {
            $json_response['status'] = 'success';
//            $json_response['message'] = 'Project edit successfully';
//            $json_response['redirect'] = user_url() . 'project';
            $json_response['jscode'] = 'setTimeout(function(){location.reload();},1000)';
        } else {
            $json_response['status'] = 'error';
            $json_response['message'] = 'Somethig will be wrong.';
        }
        return $json_response;
    }

    function editImage($postData, $file) {

        if (!empty($_FILES['project_image']['name'])) {
            $filesCount = count($_FILES['project_image']['name']);
//            print_r($_FILES);exit;
            for ($i = 0; $i < $filesCount; $i++) {
                $ext = end((explode(".", $_FILES['project_image']['name'][$i])));
                $_FILES['file']['name'] = time() . $i . "." . $ext;
                $_FILES['file']['type'] = $_FILES['project_image']['type'][$i];
                $_FILES['file']['tmp_name'] = $_FILES['project_image']['tmp_name'][$i];
                $_FILES['file']['error'] = $_FILES['project_image']['error'][$i];
                $_FILES['file']['size'] = $_FILES['project_image']['size'][$i];

                $uploadPath = 'uploads/project/';
                $config['upload_path'] = $uploadPath;
                $config['allowed_types'] = '*';

                $this->load->library('upload', $config);
                $this->upload->initialize($config);
                if ($this->upload->do_upload('file')) {
                    $fileData = $this->upload->data();
                    $dataImage['update']['project_image'] = $fileData['file_name'];
                    $dataImage['where'] = ['id' => $postData['imageId']];
                    $dataImage['table'] = TABLE_PROJECT_IMAGES;
                    $result = $this->updateRecords($dataImage);
                }
            }
        }
        if ($result) {
            $json_response['status'] = 'success';
            $json_response['message'] = 'Image edit successfully';
            $json_response['jscode'] = 'setTimeout(function(){location.reload();},1000)';
        } else {
            $json_response['status'] = 'error';
            $json_response['message'] = 'Somethig will be wrong.';
        }
        return $json_response;
    }

    function projectDelete($data) {
        $this->db->where('id', $data['id']);
        $result = $this->db->delete(TABLE_PROJECT);
        $this->db->where('project_id', $data['id']);
        $result = $this->db->delete(TABLE_PROJECT_IMAGES);

        if ($result) {
            $json_response['status'] = 'success';
            $json_response['message'] = 'Project delete successfully';
            $json_response['jscode'] = 'setTimeout(function(){location.reload();},1000)';
        } else {
            $json_response['status'] = 'error';
            $json_response['message'] = 'Something went wrong';
        }
        return $json_response;
    }

    function deleteProjectImage($data) {
        $this->db->where('id', $data['id']);
        $result = $this->db->delete(TABLE_PROJECT_IMAGES);
        if ($result) {
            $json_response['status'] = 'success';
            $json_response['message'] = 'Project delete successfully';
            $json_response['jscode'] = 'setTimeout(function(){location.reload();},1000)';
        } else {
            $json_response['status'] = 'error';
            $json_response['message'] = 'Something went wrong';
        }
        return $json_response;
    }

}

?>