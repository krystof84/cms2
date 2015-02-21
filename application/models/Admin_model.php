<?php

if( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin_model extends CI_Model {

    public $variable;

    public function __construct()
    {
        parent:: __construct();
    }

    public function create($table, $data)
    {
        $this->db->insert($table, $data);
    }

    public function get( $table )
    {
        $q = $this->db->get( $table );
        return $q->result();
    }
}