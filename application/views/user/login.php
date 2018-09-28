<div class="sbox">
	<div class="sbox-title">
			
				<h3 ><?php  echo CNF_APPNAME .'<small> '. CNF_APPDESC .' </small>';?></h3>
				
	</div>
	<div class="sbox-content" style="padding:10px">
	<div class="text-center">
		<img src="<?php echo base_url().'logo.png';?>" width="90" height="90" />
	</div>	
	<?php echo $this->session->flashdata('message');?>
	<?php echo form_open('user/postlogin'); ?>
	
	<div class="form-group has-feedback">
		<label> Username	</label>
		<input type="text" name="username" value="" class="form-control" placeholder="Username">
		<i class="fa fa-envelope form-control-feedback"></i>
	</div>
	
	<div class="form-group has-feedback">
		<label> Password	</label>
		<input type="password" name="password" value="" class="form-control"  placeholder="Password">
		<i class="icon-lock form-control-feedback"></i>
	</div>	

	
	
	<hr />
	<div class="form-group  has-feedback text-center" style=" margin-bottom:20px;" >
		 	 
			<button type="submit" class="btn btn-primary btn-sm btn-block" > Sign In</button>
		       

		
	 	<div class="clr"></div>
		
	</div>	
				
	</div>		  
	  
	
 <?php echo form_close();?>  
 	

  <div class="clr"></div>
  </div>
</div>

<script type="text/javascript">
$(document).ready(function(){
	$('#or').click(function(){
		$('#fr').toggle();
	});

	$("#unitid").jCombo("<?php echo site_url('groups/comboselect?filter=b_ms_unit:id:nama') ?>",
		{  selected_value : '',initial_text:'- Pilih Gudang -' });
});
</script>