<?php

if( ! defined('BASEPATH')) exit('No direct script access allowed');

class Users extends CI_Controller {

    public function __construct()
    {
        parent:: __construct();
    }

    public function index()
    {

    }

    public function create()
    {
        if ( !empty($_POST) )
        {
            $data = array(
                'name' => $this->input->post('name', true),
                'email' => $this->input->post('email', true),
                'password' => $this->input->post('password', true)
            );

            $this->load->model('Admin_model');

            $this->Admin_model->create( 'users', $data );
        }

        $this->load->view( 'admin/users/create' );
    }

}