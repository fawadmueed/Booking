<?php

class home extends CI_Controller  {

    public function index()
    {
        //$data['main'] = 'Login';
        $this->load->helper('url');

        
        if($this->session->userdata('username')=='')
        {
            $this->load->view('login');
        }
        else
        {
            $this->load->view('dashboard');
        }
    }

    public function welcome(){
        // echo " Welcome Function - home controller";
        $this->load->view('my_welcome');
    }
    public function register(){
        // echo " Welcome Function - home controller";
        $this->load->view('Register');
    }
}

?>