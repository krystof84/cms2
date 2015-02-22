<?php

$config = array(
    'admin_users_create' => array(
        array(
            'field' => 'name',
            'label' => 'imię',
            'rules' => 'trim|required'
        ),
        array(
            'field' => 'email',
            'label' => 'email',
            'rules' => 'trim|required|valid_email|is_unique[users.email]'
        ),
        array(
            'field' => 'password',
            'label' => 'hasło',
            'rules' => 'trim|required|matches[passconf]'
        ),
        array(
            'field' => 'passconf',
            'label' => 'potwierdź hasło',
            'rules' => 'trim'
        )
    ),

    'admin_users_edit' => array(
        array(
            'field' => 'name',
            'label' => 'imię',
            'rules' => 'trim|required'
        ),
        array(
            'field' => 'email',
            'label' => 'email',
            'rules' => 'trim|required|valid_email|callback_unique_email_edit',
        ),
        array(
            'field' => 'password',
            'label' => 'Nowe hasło',
            'rules' => 'trim|matches[passconf]'
        ),
        array(
            'field' => 'passconf',
            'label' => 'potwierdź nowe hasło',
            'rules' => 'trim'
        )
    )
);