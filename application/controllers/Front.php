<?php

class Front extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->helper('cookie');
    }

    function index() {
        $data['page'] = "front/home/home";
        $data['var_meta_title'] = 'Knor';
        $data['var_meta_description'] = 'Knor';
        $data['var_meta_keyword'] = 'Knor';
        $data['pages'] = 'home';
        $data['js'] = array(
        );
        $data['js_plugin'] = array(
        );
        $data['css'] = array(
        );
        $data['css_plugin'] = array(
        );
        $data['init'] = array(
        );
        $this->load->view(FRONT_LAYOUT , $data);    
    }
    function our_work() {
        $data['page'] = "front/home/our-work";
        $data['dashboard'] = 'active';
        $data['pagetitle'] = 'our work';
        $data['var_meta_title'] = 'our work';
        $data['pages'] = 'ourwork';
        $data['breadcrumb'] = array(
            'Home' => 'Home',
            'our work' => 'our work',
        );
        $data['css'] = array(
        );
        $data['css_plugin'] = array(
        );
        $data['js_plugin'] = array(
        );
        $data['init'] = array(
//            'Dashboard.init()',
        );
        if ($this->input->post()) {
            print_r($this->input->post());
            exit;
        }
        $this->load->view(FRONT_LAYOUT, $data);
    }
    
    public function sendMail()
    {
    //     echo 'ffddf';
    //    print_r($this->input->post());
    //         exit;
            $to = "info@knorgraphics.com";
            $subject = "Contact-us mail";
            $message = "";
            $message .= "User Name : " . $this->input->post('name') . "\r\n";
            $message .= "Phone : " . $this->input->post('phone') . "\r\n";
            $message .= "Email : " . $this->input->post('email') . "\r\n";
            $message .= "Message : " . $this->input->post('message') . "\r\n";

            $headers = "MIME-Version: 1.0" . "\r\n";
            $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

            $headers .= "From: ". $this->input->post('email') . "\r\n";
            $headers .= "Cc: shaileshvanaliya91@gmail" . "\r\n";

            mail($to,$subject,$message,$headers);
    }
 
}

?>