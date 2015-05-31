<h2><?php echo $page_heading ; ?></h2>
<table class="table table-bordered">
    <thead>
        <tr>
          <th>#</th>
          <th>First Name</th>
          <th>Last Name</th>
          <th>Email</th>
	      <td>Actions</td>                    
        </tr>
    </thead>	
    <tbody>
    	<?php if ($query->num_rows() > 0) : ?>
			<?php foreach ($query->result() as $row) : ?>
		        <tr>
		          <td><?php echo $row->id ; ?></td>
		          <td><?php echo $row->firstname ; ?></td>
		          <td><?php echo $row->lastname ; ?></td>
		          <td><?php echo $row->email ; ?></td>
		          <td><?php echo anchor('users/edit_user/'.
		            $row->id,$this->lang->line('common_form_elements_action_edit')) . 
		            ' ' . anchor('users/delete_user/'.
		            $row->id,$this->lang->line('common_form_elements_action_delete')) ; ?>
		      	  </td>
		        </tr>	        
		    <?php endforeach ; ?>
		<?php else : ?>
	        <tr>
	          <td colspan="5" class="info">No users here!</td>
	        </tr>			
		<?php endif; ?>
	</tbody>
</table>
