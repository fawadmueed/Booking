<?php

// For now this is a Controller for ' USERS ' & also for ' HOTELS '
//Need to seperate them in future

class Users extends CI_Controller { 

    public function register(){

        $username=$this->input->post('username'); 
        $password=$this->input->post('password');
        $email=$this->input->post('email');
        $phone=$this->input->post('phone');

        //loading model or load in config
        $this->load->model('user_model');
        
        $this->user_model->create_user([
            'username' => $username,
            'password' => $password,
            'email' => $email,
            'phone' => $phone,
            'bookflag' => '1'
        ]);

        $this->load->view('Login');

    }

    public function login_validation(){

        $this->load->library('form_validation');

        $this->form_validation->set_rules('username','Username','required');
        $this->form_validation->set_rules('password','Password','required');

        if($this->form_validation->run())
        {
            //true   
            $username=$this->input->post('username'); 
            $password=$this->input->post('password');

            //loading model or load in config
            $this->load->model('user_model');

            if($this->user_model->can_login($username,$password))
            {
                //true
                $session_data = array(
                    'username' => $username 
                    );
                    
                $this->session->set_userdata($session_data);
                
                 if($this->session->userdata('username')=='')
                 {
                    $this->load->view('login');
                 }
                 else
                 {
                    // return true;
                 }
                 
                 //static credential for admin for now
                if($username == 'admin' && $password == 'admin')
                { 
                    $this->load_admin();
                }
                else
                {
                    $this->load_dashboard();
                }
                
            }
            else
            {
                $this->session->set_flashdata('error','Invalid Username & Password');
                
                $this->load->view('Login');
            }

        }
        else
        {
            //false
            $this->load->view('Login');
        }

        
    }

        public function load_dashboard()
        {
            if($this->session->userdata('username')=='')
            {
                $this->load->view('login');
            }
            else
            {
             $this->load->view('dashboard');
            }
        }
        
        public function load_dashboard_hotels()
        {
            $this->load->model('hotels_model');
            
            print_r(json_encode($this->hotels_model->get_hotels()));
            
        }

        public function book_hotel()
        {
            $username=$this->input->post('username');
            $hotel_id=$this->input->post('hotel_id');
            
            $this->load->model('hotels_model');
            $this->hotels_model->bookhotel([
                'username' => $username,
                'hotel_id' => $hotel_id,
                'bookflag' => '1'
            ]);
            
        }

        public function load_admin()
        {
            if($this->session->userdata('username')=='')
            {
                $this->load->view('login');
            }
            else
            {
            
            $this->load->model('hotels_model');
            $data['booked_hotels']=$this->hotels_model->get_booked_hotels();
            $this->load->view('admin',$data);
            }
            // $this->load->view('admin.php');
        }
        

        public function load_booked_hotel()
        {
            $this->load->model('hotels_model');
            print_r(json_encode($this->hotels_model->get_booked_hotels()));
        }


        // public function load_admin_hotels()
        // {
        //     $this->load->model('hotels_model');
        //     print_r(json_encode($this->hotels_model->get_booked_hotels()));   
        // }

        public function approve_hotel()
        {
            $this->load->model('hotels_model');
            $username=$this->input->post('username');
            $hotel_id=$this->input->post('hotel_id');
            
            $this->hotels_model->approve_hotel([
                'username' => $username,
                'hotel_id' => $hotel_id,
                'bookflag' => '2'
            ]);
        }

        public function logout()
        {
            session_destroy();
            $this->load->view('login');
        }
    

    

}

?>