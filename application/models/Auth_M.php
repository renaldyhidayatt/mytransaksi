<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth_M extends CI_Model{
    public function __construct()
    {
        parent::__construct();
    }

    public function login($email, $password){
        $query = $this->db->get_where('tbl_user', array('email' => $email));

        if($query->num_rows() > 0){
            $data_user = $query->row();

            if($data_user->role_id == 1){
                if(password_verify($password, $data_user->password)){
                    $data = [
                        'user_id' => $data_user->id,
                        'email' => $data_user->email,  
                        'firstname' => $data_user->firstname,
                        'lastname' => $data_user->lastname,
                        'loggedin' => TRUE,
                        'is_admin' => TRUE,
                    ];
                    $this->session->set_userdata($data);
    
                    return True;
                }
            }elseif($data_user->role_id == 2){
                if(password_verify($password, $data_user->password)){
                    $data = [
                        'user_id' => $data_user->id,
                        'email' => $data_user->email,  
                        'firstname' => $data_user->firstname,
                        'lastname' => $data_user->lastname,
                        'loggedin' => TRUE,
                        'is_user' => TRUE,
                    ];
                    $this->session->set_userdata($data);
    
                    return True;
                }
            }else{
                return false;
            }
        }
    }

    public function register($firstname, $lastname, $email, $password){
        $data = array(
            'firstname' => $firstname,
            'lastname' => $lastname,
            'email' => $email,
            'role_id' => 1,            
            'password' => password_hash($password, PASSWORD_BCRYPT),
        );


        $this->db->insert('tbl_user', $data);
    }

    public function isLoggedIn(){
        return (bool) $this->session->userdata('loggedin');
    }

    public function isAdmin(){
        return (bool) $this->session->userdata('is_admin');
    }

    public function logout(){
        $this->session->sess_destroy(); // delete semua session
    }

}