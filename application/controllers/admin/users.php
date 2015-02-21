<?php

if( ! defined('BASEPATH')) exit('No direct script access allowed');

class Users extends CI_Controller {

    public function __construct()
    {
        parent:: __construct();
        $this->load->model('Admin_model');
    }

    public function index()
    {
        $data['users'] = $this->Admin_model->get('users');
        $data['info'] = 'Przykładowy tekst';
        $this->load->view('admin/users/index', $data);
    }

    public function create()
    {
        if ( !empty($_POST) )
        {

            if( $this->form_validation->run( 'admin_users_create' ) == true )
            {
                $data = array(
                    'name' => $this->input->post('name', true),
                    'email' => $this->input->post('email', true),
                    'password' => password_hash( $this->input->post('password', true), PASSWORD_BCRYPT )
                );


                $this->Admin_model->create( 'users', $data );

                $this->session->set_flashdata( 'alert', 'Użytkownik dodany poprawnie.' );
                refresh();
            }
            else
            {
                $this->session->set_flashdata( 'alert', validation_errors() );
                refresh();
            }
        }

        $this->load->view( 'admin/users/create' );
    }

}