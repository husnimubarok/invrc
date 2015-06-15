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
  <p class="lead">Add and edit inventory</p>
  <div class="span8"> 
<?php echo form_open('inventories/edit','role="form" class="form"') ; ?>
      
      <input type="hidden" name="invid" value="<?php echo $invid; ?>" />
      <div class="form-group">
      <label for="category">Category</label>
      <select id="category" name="category" class="form-control">
          
          <?php foreach($categories as $category): ?>
          <?php if($category->id == $list->catid): ?>
          <option value="<?php echo $category->id; ?>" selected="selected"><?php echo $category->name; ?></option>
          <?php else: ?>
          <option value="<?php echo $category->id; ?>" ><?php echo $category->name; ?></option>
          <?php endif; ?>
          <?php          endforeach; ?>
      </select>
      
    </div>  
      
    <div class="form-group">
      <?php echo form_error('code'); ?>
      <label for="code">Code Inventory</label>
      <input name="code" id="code" value="<?php echo $list->code; ?>"  class="form-control"/>
    </div>
    <div class="form-group">
      <?php echo form_error('name'); ?>
      <label for="name">name</label>
      <input name="name" id="name" value="<?php echo $list->name; ?>" class="form-control"/>
    </div>  
    <div class="form-group">
      <?php echo form_error('sn'); ?>
      <label for="sn">SN</label>
      <input name="sn" id="sn" value="<?php echo $list->sn; ?>"  class="form-control"/>
    </div>   
    
     <div class="form-group">
      <label for="type">Type</label>
      <?php if($list->type==0): ?>
      <input type="radio" name="type" value="0" checked="" /> Consumable
      <input type="radio" name="type" value="1" /> Unconsumable
      <?php else: ?>
      <input type="radio" name="type" value="0" /> Consumable
      <input type="radio" name="type" value="1" checked=""/> Unconsumable
      
      <?php      endif; ?>
     </div>      
      
      <input type="hidden" name='status' value='1'/>
      
      <div class='form-group'>
          <label for='purchase_date'>Purchase Date</label>
          <input name='purchase_date' data-provide="datepicker" id='purchase_date' class='datepicker form-control' value="<?php echo date('m/d/Y', strtotime($list->purchase_date)); ?>"/>
      </div>
      
      <div class='form-group'>
          <label for='purchase_price'>Purchase Price</label>
          <input name='purchase_price' id='purchase_price' class='form-control' value="<?php echo $list->purchase_price; ?>"/>
      </div>

      <input type="hidden" name="userlogin" value="<?php echo $userlogin; ?>"/>
    <div class="form-group">
      <button type="submit" class="btn btn-success"><?php echo $this->lang->line('common_form_elements_go');?></button>  or <? echo anchor('users',$this->lang->line('common_form_elements_cancel'));?>
    </div>
<?php echo form_close() ; ?>
</div>