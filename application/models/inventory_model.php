<?php

/* GPL
 * GPL To change this license header, choose License Headers in Project Properties.
 * GPL To change this template file, choose Tools | Templates
 * GPL and open the template in the editor.
 */
/*
 * name        : Salman Farisi<salmandriva@gmail.com>
 * skype       : salmandriva
 * YM          : s4lm4ndrake
 * G+          : plus.google.com/salmandriva
 * blog/web    : http://ketikan10jari.wordpress.com
 * facebook    : facebook.com/salmandriva
 */
?>
<?php
class Inventory_model extends CI_Model
{
    function __construct() {
        parent::__construct();
    }
    
    function listCategory() {
        $query = $this->db->get('category');
        return $query->result();       
    }
    
    function listStatus() {
        $query = $this->db->get('status');
        return $query->result();
    }
    function mAdd($data=array()) {
        
        if($this->db->insert('inventory', $data)) {
            return $this->db->insert_id();
        }
        return false;
    }
    function mEdit($id, $data=array()){
        $this->db->where("id", $id);
        $this->db->update("inventory", $data);
        if($this->db->affected_rows() > 0) {
            return true;
        }
        return false;
    }
    function mIndex() {
        $sql = "SELECT a.id,
                        a.`code`,
                        a.`name`,
                        b.name category,
                        a.`sn`,
                        c.`name` `status`,
                        a.`type`,
                        a.`purchase_date`,
                        a.`purchase_price`,
                        u.`firstname`,
                        u.`lastname` 
                      FROM
                        inventory a 
                        LEFT JOIN category b 
                          ON a.`category_id` = b.`id` 
                        LEFT JOIN `status` c 
                          ON a.`status` = c.`id` 
                        LEFT JOIN `users` u 
                          ON a.`user_id` = u.`id` where a.is_deleted='n' ";
        $query = $this->db->query($sql);
        return $query->result();
    }
    
    function mView($id) {
        $sql = "SELECT 
                        a.`code`,
                        a.`name`,
                        b.id catid,
                        b.name category,
                        a.`sn`,
                        c.id statid,
                        c.`name` `status`,
                        a.`type`,
                        a.`purchase_date`,
                        a.`purchase_price`,
                        u.`firstname`,
                        u.`lastname` 
                      FROM
                        inventory a 
                        LEFT JOIN category b 
                          ON a.`category_id` = b.`id` 
                        LEFT JOIN `status` c 
                          ON a.`status` = c.`id` 
                        LEFT JOIN `users` u 
                          ON a.`user_id` = u.`id`  where a.id={$id} ";
        $query = $this->db->query($sql);
        return $query->result();
    }
    function mDelete($id) {
        $this->db->where('id',$id);
        $this->db->update('inventory', array('is_deleted'=>'y'));
        if($this->db->affected_rows() > 0) {
            return true;
        }
        return false;
    }
}
?>