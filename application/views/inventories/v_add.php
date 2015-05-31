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
<script>
    $('document').ready(function(){
        $('.datepicker').datepicker();
    });
    
    $('.datepicker').datepicker();
    
</script>
<?php echo validation_errors() ; ?>
<div class="page-header">
  <h1><?php echo $page_heading ; ?></h1>
</div> 
  <p class="lead"><?php echo $this->lang->line('usr_form_instruction_edit');?></p>
  <div class="span8"> 
<?php echo form_open('inventories/add','role="form" class="form"') ; ?>
      
      <div class="form-group">
      <label for="category">Category</label>
      <select id="category" name="category">
          <option value="0">--Please Select--</option>
          <?php foreach($categories as $category): ?>
          <option value="<?php echo $category->id; ?>"><?php echo $category->name; ?></option>
          <?php          endforeach; ?>
      </select>
    </div>  
      
    <div class="form-group">
      <?php echo form_error('code'); ?>
      <label for="code">Code Inventory</label>
      <?php echo form_input($code); ?>
    </div>
    <div class="form-group">
      <?php echo form_error('name'); ?>
      <label for="name">Name</label>
      <?php echo form_input($name); ?>
    </div>  
    <div class="form-group">
      <?php echo form_error('sn'); ?>
      <label for="sn">SN</label>
      <?php echo form_input($sn); ?>
    </div>   
    
     <div class="form-group">
      <label for="type">Type</label>
      <input type="radio" name="type" value="0"  /> Consumable
      <input type="radio" name="type" value="1" /> Unconsumable
     </div>      
      
      <input type="hidden" name='status' value='1'/>
      
      <div class='form-group'>
          <label for='purchase_date'>Purchase Date</label>
          <input name='purchase_date' data-provide="datepicker" id='purchase_date' class='datepicker'/>
      </div>
      
      <div class='form-group'>
          <label for='purchase_price'>Purchase Price</label>
          <input name='purchase_price' id='purchase_price' class='datapicker'/>
      </div>

      <input type="hidden" name="userlogin" value="<?php echo $userlogin; ?>"/>
    <div class="form-group">
      <button type="submit" class="btn btn-success"><?php echo $this->lang->line('common_form_elements_go');?></button>  or <? echo anchor('users',$this->lang->line('common_form_elements_cancel'));?>
    </div>
<?php echo form_close() ; ?>
  </div>
</div>




        