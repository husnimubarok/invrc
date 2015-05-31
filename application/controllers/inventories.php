<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/* 
 * name        : Salman Farisi<salmandriva@gmail.com>
 * skype       : salmandriva
 * YM          : s4lm4ndrake
 * G+          : plus.google.com/salmandriva
 * blog/web    : http://ketikan10jari.wordpress.com
 * facebook    : facebook.com/salmandriva
 */

class Inventories extends MY_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->helper('file');
        if ( ($this->session->userdata('logged_in') == FALSE) || 
            ($this->session->userdata('usr_access_level') != 1) ) {
             redirect('signin');
        }  
        $this->load->model('inventory_model', 'mcat');
    }
    
    function index() 
    {
        $data['lists']=$this->mcat->mIndex();
        
        $data['page_heading']='List Inventory'; 
        
        $this->load->view('common/header', $data);
        $this->load->view('nav/top_nav', $data);        
        $this->load->view('inventories/v_index', $data);
        $this->load->view('common/footer', $data);
    }
    
    function add() {
         $data['page_heading'] = 'Add Item Inventory';
        $this->form_validation->set_rules('code', $this->lang->line('code'), 'required|min_length[1]|max_length[20]');
        $this->form_validation->set_rules('name', $this->lang->line('name'), 'required|min_length[1]|max_length[20]');
        $this->form_validation->set_rules('category', 'Category', 'required');
        
        if ($this->form_validation->run() == FALSE) { // First load, or problem with form
            $data['code'] = array('name' => 'code', 'class' => 'form-control', 'id' => 'code', 'value' => set_value('code', ''), 'maxlength'   => '100', 'size' => '35');
            $data['name'] = array('name' => 'name', 'class' => 'form-control', 'id' => 'name', 'value' => set_value('name', ''), 'maxlength'   => '100', 'size' => '35');
            $data['sn'] = array('name' => 'sn', 'class' => 'form-control', 'id' => 'sn', 'value' => set_value('sn', ''), 'maxlength'   => '100', 'size' => '35');
            $data['usr_uname'] = array('name' => 'usr_uname', 'class' => 'form-control', 'id' => 'usr_uname', 'value' => set_value('usr_uname', ''), 'maxlength'   => '100', 'size' => '35');
            $data['usr_email'] = array('name' => 'usr_email', 'class' => 'form-control', 'id' => 'usr_email', 'value' => set_value('usr_email', ''), 'maxlength'   => '100', 'size' => '35');
            $data['usr_confirm_email'] = array('name' => 'usr_confirm_email', 'class' => 'form-control', 'id' => 'usr_confirm_email', 'value' => set_value('usr_confirm_email', ''), 'maxlength'   => '100', 'size' => '35');
            //$data['usr_add1'] = array('name' => 'usr_add1', 'class' => 'form-control', 'id' => 'usr_add1', 'value' => set_value('usr_add1', ''), 'maxlength'   => '100', 'size' => '35');
            //$data['usr_add2'] = array('name' => 'usr_add2', 'class' => 'form-control', 'id' => 'usr_add2', 'value' => set_value('usr_add2', ''), 'maxlength'   => '100', 'size' => '35');
            //$data['usr_add3'] = array('name' => 'usr_add3', 'class' => 'form-control', 'id' => 'usr_add3', 'value' => set_value('usr_add3', ''), 'maxlength'   => '100', 'size' => '35');
            //$data['usr_town_city'] = array('name' => 'usr_town_city', 'class' => 'form-control', 'id' => 'usr_town_city', 'value' => set_value('usr_town_city', ''), 'maxlength'   => '100', 'size' => '35');
            //$data['usr_zip_pcode'] = array('name' => 'usr_zip_pcode', 'class' => 'form-control', 'id' => 'usr_zip_pcode', 'value' => set_value('usr_zip_pcode', ''), 'maxlength'   => '100', 'size' => '35');
            $category = $this->mcat->listCategory();
            $status = $this->mcat->listStatus();
            
            $data['categories'] = $category;
            $data['statuses'] = $status;
            $data['userlogin']=$this->session->userdata('usr_id');            
            $this->load->view('common/header', $data);
            $this->load->view('nav/top_nav', $data);
            $this->load->view('inventories/v_add',$data);
            $this->load->view('common/footer', $data);
        }
        else {
                $data = array(
                    'code'=>$this->input->post('code'),
                    'category_id'=>$this->input->post('category'),
                    'name'=>$this->input->post('name'),
                    'sn'=>$this->input->post('sn'),
                    'type'=>$this->input->post('type'),
                    'status'=>$this->input->post('status'),
                    'purchase_date'=>date('Y-m-d', strtotime($this->input->post('purchase_date'))),
                    'purchase_price'=>$this->input->post('purchase_price'),
                    'user_id'=>$this->input->post('userlogin')
                );
                //print_r($data);
               $id=$this->mcat->mAdd($data);
               if(!id){}
               else {
                   redirect(base_url()."index.php/inventories/view/{$id}");
               }
        }
           
    }
    function view($id=0) {
        if($id==0) {
            redirect(base_url() . "index.php/inventories/index");
        }
        
        $view = $this->mcat->mView($id);
        $data['list'] = $view[0];
            $this->load->view('common/header', $data);
            $this->load->view('nav/top_nav', $data);
            $this->load->view('inventories/v_view',$data);
            $this->load->view('common/footer', $data);
    }
    
}
?>