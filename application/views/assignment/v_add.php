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
        $('#items').change(function() {
           if($('#items').val() !=="0") {
               $.pos
               $.post('codeinv', {items: $('#items').val()}, function(res){
                   $('#code').val(res);
               });
           } 
        });
        $('.datepicker').datepicker();
    });
    
</script>
<?php echo validation_errors() ; ?>
<div class="page-header">
  <h1><?php echo $page_heading ; ?></h1>
</div> 
  <p class="lead"><?php echo $this->lang->line('usr_form_instruction_edit');?></p>
  <div class="span8"> 
<?php echo form_open('assignment/add','role="form" class="form"') ; ?>
      
      <div class="form-group">
          <label for="assigningdate">Assigning Date</label>
          <input id="assigningdate" name="assigningdate" class="form-control datepicker" data-provide="datepicker" value="<?php echo date('m/d/Y'); ?>" />
      </div>
          
      <div class="form-group">
          <label for="items">Items</label>
          <select name="items" id="items" class="form-control">
              <option value="">--Please select--</option>
              <?php foreach($items as $item): ?>
              <option value="<?php echo $item->id; ?>"> <?php echo $item->name; ?> </option>
              <?php              endforeach; ?>
          </select>
      </div>  
      <div class="form-group">
          <?php echo form_error('code'); ?>
          <label for="code">Code Inventory</label>
          <input name="code" id="code" class="form-control" readonly="" />
      </div>
      <div class="form-group">
          <label for="user">Assigning To</label>
          <select name="user_id" id="user_id" class="form-control">
              <option value="">--Please select--</option>
              <?php              foreach ($users as $user): ?>
              <option value="<?php echo $user->id; ?>"><?php echo "{$user->firstname}  {$user->lastname}"; ?></option>
              <?php endforeach; ?>
          </select>
      </div>
      
    <div class="form-group">
      <button type="submit" class="btn btn-success"><?php echo $this->lang->line('common_form_elements_go');?></button>  or <? echo anchor('users',$this->lang->line('common_form_elements_cancel'));?>
    </div>
<?php echo form_close() ; ?>
</div>