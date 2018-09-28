<section class="content">
          <div class="row">
            <div class="col-xs-12">
              <div class="box box-danger">
              	<div class="box-header with-border">
                  <h3 class="box-title"><?php echo $pageTitle ;?></h3>
                   <div class="box-body">

	<div class="page-content-wrapper m-t">
    
<div class="sbox animated fadeIn">
	<div class="sbox-content">	
 	
	<?php echo $this->session->flashdata('message'); ?>
		<div class="block-content" style="margin:10px">


			<div class="tab-content m-t">
			  <div class="tab-pane active use-padding" id="info">
			 <form class="form-horizontal row" action="<?php echo site_url('sximo/config/postSave');?>" method="post">

				<div class="col-sm-6">
				<fieldset > <legend><?php echo $this->lang->line('core.fr_generalinfo'); ?> </legend>

				  <div class="form-group">
					<label for="ipt" class=" control-label col-md-4"><?php echo $this->lang->line('core.fr_appname'); ?> </label>
					<div class="col-md-8">
					<input name="cnf_appname" type="text" id="cnf_appname" class="form-control input-sm" required  value="<?php echo  CNF_APPNAME ;?>" />
					 </div>
				  </div>

				  <div class="form-group">
					<label for="ipt" class=" control-label col-md-4"><?php echo $this->lang->line('core.fr_appdesc'); ?> </label>
					<div class="col-md-8">
					<input name="cnf_appdesc" type="text" id="cnf_appdesc" class="form-control input-sm" value="<?php echo CNF_APPDESC ;?>" />
					 </div>
				  </div>

				  <div class="form-group">
					<label for="ipt" class=" control-label col-md-4"><?php echo $this->lang->line('core.fr_comname'); ?> </label>
					<div class="col-md-8">
					<input name="cnf_comname" type="text" id="cnf_comname" class="form-control input-sm" value="<?php echo  CNF_COMNAME ;?>" />
					 </div>
				  </div>

				  <div class="form-group">
					<label for="ipt" class=" control-label col-md-4"><?php echo $this->lang->line('core.fr_emailsys'); ?> </label>
					<div class="col-md-8">
					<input name="cnf_email" type="text" id="cnf_email" class="form-control input-sm" value="<?php echo  CNF_EMAIL ;?>" />
					 </div>
				  </div>


			   <div class="form-group">
				<label for="ipt" class=" control-label col-md-4"><?php echo $this->lang->line('core.fr_frontendtemplate'); ?> </label>
				<div class="col-md-8">
						<select class="form-control" name="cnf_theme">
						<?php foreach($themes as $theme) {?>
							<option value="<?php echo $theme['folder'];?>" <?php if($theme['folder'] == CNF_THEME) echo 'selected="selected"';?>><?php echo $theme['name'];?></option>
						<?php } ?>
						</select>
				 </div>
			  </div>

 		  <div class="form-group">
			<label for="ipt" class=" control-label col-sm-4"><?php echo $this->lang->line('core.fr_multilang'); ?> </label>
			<div class="col-sm-8">
					<label class="checkbox">
					<input type="checkbox" name="cnf_multilang" value="true"  <?php if(CNF_MULTILANG =='true') echo 'checked';?>/>
					<?php echo $this->lang->line('core.enable'); ?>
					</label>
			</div>
		</div>


			</fieldset>

		<!--fieldset > <legend><?php echo $this->lang->line('core.fr_frontendmetakey'); ?> </legend>
		  <div class="form-group">
			<label for="ipt" class=" control-label col-md-4"><?php echo $this->lang->line('core.fr_metakey'); ?> </label>
			<div class="col-md-8">
				<textarea class="form-control input-sm" name="cnf_metakey"><?php echo  CNF_METAKEY ;?></textarea>
			 </div>
		  </div>

		   <div class="form-group">
			<label  class=" control-label col-md-4"><?php echo $this->lang->line('core.fr_metadesc'); ?> </label>
			<div class="col-md-8">
				<textarea class="form-control input-sm"  name="cnf_metadesc"><?php echo CNF_METADESC ;?></textarea>
			 </div>
		  </div>
		  </fieldset-->
	</div>

	<div class="col-sm-6">


			<!--fieldset > <legend>Setting Aplikasi </legend>

		 <div class="form-group">
				<label for="ipt" class=" control-label col-md-4">Nama Klinik / Praktek</label>
				<div class="col-md-8">
						<input name="cnf_nmklinik" type="text" id="cnf_nmklinik" class="form-control input-sm" value="<?php echo  CNF_NMKLINIK ;?>" />
				 </div>
			  </div>
		<div class="form-group">
				<label for="ipt" class=" control-label col-md-4">Alamat Klinik / Praktek</label>
				<div class="col-md-8">
						<input name="cnf_alamat" type="text" id="cnf_alamat" class="form-control input-sm" value="<?php echo  CNF_ALAMAT ;?>" />
				 </div>
			  </div>
		<div class="form-group">
				<label for="ipt" class=" control-label col-md-4">No Tlp Klinik / Praktek</label>
				<div class="col-md-8">
						<input name="cnf_tlp" type="text" id="cnf_tlp" class="form-control input-sm" value="<?php echo  CNF_TLP ;?>" />
				 </div>
			  </div>
			  <div class="form-group">
				<label for="ipt" class=" control-label col-md-4">PPN Beli (%)</label>
				<div class="col-md-8">
						<input name="cnf_ppn_beli" type="text" id="cnf_ppn_beli" class="form-control input-sm" value="<?php echo  CNF_PPN_BELI ;?>" />
				 </div>
			  </div>
			  <div class="form-group">
				<label for="ipt" class=" control-label col-md-4">PPN Jual (%)</label>
				<div class="col-md-8">
						<input name="cnf_ppn_jual" type="text" id="cnf_ppn_jual" class="form-control input-sm" value="<?php echo  CNF_PPN_JUAL ;?>" />
				 </div>
			  </div>
			  <div class="form-group">
				<label for="ipt" class=" control-label col-md-4">Insentif Absensi</label>
				<div class="col-md-8">
						<input name="cnf_absensi" type="text" id="cnf_absensi" class="form-control input-sm" value="<?php echo  CNF_ABSENSI ;?>" />
				 </div>
			  </div>
		  </fieldset-->


				

	</div>
	<center>
	<div class="form-group">
				<label for="ipt" class=" control-label col-md-4"> </label>
				<div class="col-md-8">
					<button class="btn btn-primary" type="submit"><?php echo $this->lang->line('core.sb_savechanges'); ?> </button>
				 </div>
			  </div>
			</center>
</form>
</div>
</div>
	</div>
</div>	

</div>
</div>
</div>
</div>
</div>
</div>
</div>
        </section>





