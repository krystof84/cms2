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

    public function edit($id)
    {
        $where = array( 'id' => $id );
        $data['user'] = $this->Admin_model->get_single( 'users' , $where );
        $password = $data['user']->password;

        if ( !empty( $_POST ) )
        {

            if ( $this->form_validation->run( 'admin_users_edit' ) == true )
            {

                $data = array(
                    'name' => $this->input->post( 'name' , true ),
                    'email' => $this->input->post( 'email' , true ),
                    'password' => password_hash( $this->input->post( 'password' , true ) , PASSWORD_BCRYPT ),
                );

                if ( $this->input->post( 'password' , true ) == '' )
                {
                    $data['password'] = $password;
                }

                $where = array('id' => $id);
                $this->Admin_model->update( 'users', $where, $data);

                $this->session->set_flashdata( 'alert' , 'Zmiany zapisane.' );
                refresh();

            }
            else
            {
                $this->session->set_flashdata( 'alert' , validation_errors() );
                refresh();
            }

        }


        $this->load->view( 'admin/users/edit', $data );
    }


    public function unique_email_edit($email)
    {
        $id = $this->uri->segment(4);
        $where = array( 'email' => $email);
        $user = $this->Admin_model->get_single('users', $where);

        if( !empty( $user ) && $user->id != $id)
        {
            $this->form_validation->set_message('unique_email_edit', 'Inny użytkownik ma taki email');
            return false;
        }
        else
        {
            return true;
        }
    }

}