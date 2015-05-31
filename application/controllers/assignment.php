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
<?php if(!defined('BASEPATH')) exit('No direct access allowed'); ?>
<?php
class Assignment extends MY_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model('assignment_model','msign');
    }
    
    public function index() {
         $data['page_heading']='List Inventory'; 
        $this->load->view('common/header', $data);
        $this->load->view('nav/top_nav', $data);        
        $this->load->view('assignment/v_index', $data);
        $this->load->view('common/footer', $data);
    }
    
    public function add() {
        $data['page_heading'] = 'Assigtment items for ';
                
        $this->form_validation->set_rules('code','Code','required|min_length[1]|max_length[20]');
        if($this->form_validation->run()==FALSE) {
            
            $data['items'] = $this->msign->lItems();
            $data['users'] = $this->msign->lUsers();
            
            $this->load->view('common/header', $data);
            $this->load->view('nav/top_nav', $data);        
            $this->load->view('assignment/v_add', $data);
            $this->load->view('common/footer', $data);
        }
        else {
            $data=array(
                'inventory_id'=>$this->input->post('items'),
                'user_id'=>$this->input->post('user_id'),
                'assignment_date'=>date('Y-m-d', strtotime($this->input->post('assigningdate'))),
            );
            //print_r($data);        
            $id=$this->msign->mAdd($data);
            if(!id){}
            else {
                redirect(base_url()."index.php/assignment/view/{$id}");
            }
        }
    }
    public function codeinv() {        
        echo  $this->msign->lCodeInv();
    }
    
    public function view($id=0) {
        if($id==0) {
            redirect(base_url() . 'index.php/inventory/index');
        }
        $view = $this->msign->mView($id);
        $data['list'] = $view[0];
        $this->load->view('common/header', $data);
        $this->load->view('nav/top_nav', $data);
        $this->load->view('assignment/v_view',$data);
        $this->load->view('common/footer', $data);
    }
}
?>