<?php if (isset($login_fail)) : ?>
  <div class="alert alert-danger"><?php echo $this->lang->line('admin_login_error') ; ?></div>
<?php endif ; ?>
  <?php echo validation_errors(); ?>
  <?php echo form_open('password/new_password', 'class="form-signin" role="form"') ; ?>
    <h2 class="form-signin-heading"><?php echo $this->lang->line('forgot_pwd_header') ; ?></h2>
    <p class="lead"><?php echo $this->lang->line('forgot_pwd_instruction') ;?></p>
    <table border="0">
        <tr>
            <td><?php $this->lang->line('signin_new_pwd_email') ; ?></td>
        </tr>
        <tr>    
            <td><?php echo form_input($usr_email); ?></td>
        </tr>
        <tr>    
            <td><?php echo form_input($usr_password1); ?></td>
        </tr>
        <tr>    
            <td><?php echo form_input($usr_password2); ?></td>
        </tr>
        <?php echo form_hidden('code', $code) ; ?>
    </table>
    <button class="btn btn-lg btn-primary btn-block" type="submit"><?php echo $this->lang->line('common_form_elements_go') ; ?></button>
    <br />
  <?php echo form_close() ; ?>
</div>