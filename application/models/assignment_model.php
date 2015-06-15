<?php

/* GPL
 * GPL To change this license header, choose License Headers in Project Properties.
 * GPL To change this template file, choose Tools | Templates
 * GPL and open the template in the editor.
 * name        : Salman Farisi<salmandriva@gmail.com>
 * skype       : salmandriva
 * YM          : s4lm4ndrake
 * G+          : plus.google.com/salmandriva
 * blog/web    : http://ketikan10jari.wordpress.com
 * facebook    : facebook.com/salmandriva
 */
?>
<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Assignment_model extends CI_Model {
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
                a.id,
                a.inventory_id,
                a.user_id,
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
                a.id,
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
  function mEdit($id, $data=array()){
        $this->db->where("id", $id);
        $this->db->update("assignment", $data);
        if($this->db->affected_rows() > 0) {
            return true;
        }
        return false;
    }
  public function mAdd($data=array()) {
      if($this->db->insert('assignment', $data)){
          return $this->db->insert_id();
      }
      return false;
  }
}