<?php

if( ! defined('BASEPATH')) exit('No direct script access allowed');

class Account extends CI_Controller {

    public function __construct()
    {
        parent:: __construct();
        $this->load->model('Site_model');
    }

    public function index()
    {

    }

    public function registration()
    {
        if ( !empty($_POST) )
        {

            if( $this->form_validation->run( 'admin_users_create' ) == true )
            {
                $data = array(
                    'name' => $this->input->post('name', true),
                    'email' => $this->input->post('email', true),
                    'password' => password_hash( $this->input->post('password', true), PASSWORD_BCRYPT ),
                    'created_time' => time()
                );


                $this->Site_model->create( 'users', $data );

                $this->session->set_flashdata( 'alert', 'Użytkownik zarejestrowany.' );
                refresh();
            }
            else
            {
                $this->session->set_flashdata( 'alert', validation_errors() );
                refresh();
            }
        }

        $this->load->view( 'site/account/registration' );
    }


}