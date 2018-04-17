<?php


class User_model extends CI_Model {

  
    public function get_users(){

        //configuration to connect to DB or assign in config/database 
        //!Dont forget to include database in autoload libraries
        // $config['hostname'] = "localhost";
        // $config['username'] = "root";
        // $config['password'] = "";
        // $config['database'] = "booking";

        // $connection = $this->load->database($config);

        $query = $this->db->get('users');
        return $query->result();

    }

    public function register()
    {
       $this->db->insert();
    }

    public function can_login($username,$password)
    {
        $this->db->where('username',$username);
        $this->db->where('password',$password);
        $query=$this->db->get('users');
        
        if($query->num_rows()>0)
        {
            //true

            return true;

        }
        {
            //false
            return false;

        }

    }

    public function create_user($data){
        //insert('table',$data)
        $this->db->insert('users',$data);
    }

}


?>