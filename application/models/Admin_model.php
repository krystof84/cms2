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

    public function get_single( $table, $where )
    {
        $this->db->where( $where );
        $q = $this->db->get( $table );
        return $q->row();
    }

    public function update($table, $where, $data)
    {
        $this->db->where( $where );
        $this->db->update( $table, $data);
    }
}