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
          <th>Category</th>
          <th>Status</th>
          <th>Purchase</th>
          <th>Price</th>
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
		          <td><?php echo $row->category ; ?></td>
                          <td><?php echo ($row->type==0) ? "consumable" : "unconsumable";?></td>
                          <th><?php echo date('d-m-Y', strtotime($row->purchase_date)); ?></th>
                          <th><?php echo $row->purchase_price; ?></th>
		          <td><?php echo anchor('inventories/edit/'.
		            $row->id,$this->lang->line('common_form_elements_action_edit'))?>
		            &nbsp <a href="<?php echo  base_url(); ?>index.php/inventories/delete/<?php echo $row->id; ?>" onClick="javacript: return confirm('are you sure to delete this data');" >Delete</a>
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
