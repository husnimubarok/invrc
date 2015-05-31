<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Signing_model extends CI_Model {
  function __construct() {
     parent::__construct();
  } 

  public function lItems() {
      $this->db->where('status',1);
      $query = $this->db->get('inventory');
      return $query->result();
  }
  public function lUsers() {
      $this->db->where(array('is_active'=>1, 'id !='=>$this->session->userdata('usr_id')));
      $query = $this->db->get('users');
      return $query->result();
  }
  public function lCodeInv(){
      $query = $this->db->query("select code from inventory where id={$_POST['items']}");
      $data= $query->result();
      return $data[0]->code;
  }
  public function mView($id) {
      $sql = "SELECT 
                b.code,
                b.name,
                b.sn,
                a.`assignment_date`,
                u.`firstname`,
                u.`lastname` 
              FROM
                assignment a 
                LEFT JOIN inventory b 
                  ON a.`inventory_id` = b.`id` 
                LEFT JOIN users u 
                  ON a.user_id = u.`id`  where a.id={$id}"; 
      $query = $this->db->query($sql);
      return $query->result();
  }
  public function mIndex() {
      $sql = "SELECT 
                b.code,
                b.name, b.sn,
                a.`assignment_date`,
                u.`firstname`,
                u.`lastname` 
              FROM
                assignment a 
                LEFT JOIN inventory b 
                  ON a.`inventory_id` = b.`id` 
                LEFT JOIN users u 
                  ON a.user_id = u.`id` ";
      $query = $this->db->query($sql);
      return $query->result();
  }
  public function mAdd($data=array()) {
      if($this->db->insert('assignment', $data)){
          return $this->db->insert_id();
      }
      return false;
  }
}

