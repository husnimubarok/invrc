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
<h2><?php echo $page_heading ; ?></h2>
<table class="table table-bordered">
    <thead>
        <tr>
          <th>code</th>
          <th>Name</th>
          <th>SN</th>
          <th>Assigned Date</th>
          <th>Assigned To</th>
	  <td>Actions</td>                    
        </tr>
    </thead>	
    <tbody>
    	<?php if (count($lists) > 0) : ?>
			<?php foreach ($lists as $row) : ?>
		        <tr>
		          <td><?php echo $row->code; ?></td>
		          <td><?php echo $row->name ; ?></td>
		          <td><?php echo $row->sn ; ?></td>
		          <td><?php echo $row->assignment_date ; ?></td>
                          <td><?php echo "{$row->firstname} {$row->lastname}" ; ?></td>
		          <td><?php echo anchor('assignment/edit/'.
		            $row->id,$this->lang->line('common_form_elements_action_edit')) . 
		            ' &nbsp;' . "<a href='assignment/delete/{$row->id}' onClick='javacript: return confirm('are you sure to delete this data');'>Delete</a>" ; ?>
		      	  </td>
		        </tr>	        
		    <?php endforeach ; ?>
		<?php else : ?>
	        <tr>
	          <td colspan="5" class="info">No inventory here!</td>
	        </tr>			
		<?php endif; ?>
	</tbody>
</table>