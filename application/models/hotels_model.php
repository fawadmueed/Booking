<?php

class Hotels_model extends CI_Model{

    public function get_hotels(){

        $query=$this->db->get('hotels');
        return $query->result();

    }

    public function bookhotel($data){
        $this->db->insert('booked',$data);
        

    }

    public function get_booked_hotels()
    {
        
        $query=$this->db->query('SELECT users.username,users.email,users.phone,booked.bookflag,hotels.id as hid,hotels.h_name,hotels.h_desc,hotels.h_image
        FROM users,hotels,booked 
        WHERE booked.username = users.username AND
              booked.hotel_id = hotels.id');

            return $query->result();
    }

    public function approve_hotel($data)
    {
        print_r($data);
        // $this->db->insert('booked',$data);

        // $this->db->where('username', $data['username']);
        // // $this->db->where('hotel_id', $data['hotel_id']);
        // $this->db->update('bookflag', $data['bookflag']); 

        $this->db->set('bookflag', $data['bookflag']);  //Set the column name and which value to set..
        $this->db->where('username', $data['username']);
        $this->db->where('hotel_id', $data['hotel_id']); //set column_name and value in which row need to update
        $this->db->update('booked'); //Set your table name
    }

        // print_r($query_final);


    }





?>