

    <!-- Page header -->
    <section class="content-header">
          <h1>
            Module
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li>List All Module</li>
          </ol>
        </section>
	

	<section class="content">
          <div class="row">
            <div class="col-xs-12">
              <div class="box box-danger">
              	<div class="box-header with-border">
                  <h3 class="box-title"><?php echo $pageTitle ;?></h3>
 <div class="box-body">
 	<div class="page-content-wrapper">
	<div class="ribon-sximo">
		<div class="row m-l-none m-r-none m-t  white-bg shortcut " >
			<div class="col-sm-6 col-md-3 b-r  p-sm ">
				<span class="pull-left m-r-sm text-info"><i class="fa fa-plus-circle"></i></span> 
				<a href="<?php echo site_url('sximo/module/create');?>" class="clear">
					<span class="h3 block m-t-xs"><strong><?php echo $this->lang->line('core.fr_createmodule'); ?> </strong>
					</span> <small class="text-muted text-uc"><?php echo $this->lang->line('core.fr_newmodule'); ?> </small>
				</a>
			</div>

		</div> 		

		
	
	<ul class="nav nav-tabs" style="margin-bottom:10px;">
	  <li <?php if($type =='addon') echo 'class="active"'?>><a href="<?php echo site_url('sximo/module');?>"><?php echo $this->lang->line('core.fr_mymodule'); ?>  </a></li>
	  <li <?php if($type =='core') echo 'class="active"';?>><a href="<?php echo site_url('sximo/module?t=core');?>"><?php echo $this->lang->line('core.tab_core'); ?> </a></li>
	</ul>
		
	<?php echo $this->session->flashdata('message');?>	
	
	
	<div class="table-responsive ibox-content" style="min-height:400px;">
	<?php if(count($rowData) >=1) :?> 
		<table class="table table-striped ">
			<thead>
			<tr>
				<th><?php echo $this->lang->line('core.btn_action'); ?> </th>					
				<th><input type="checkbox" class="checkall" /></th>
				<th><?php echo $this->lang->line('core.t_module'); ?> </th>
				<th>Controller</th>
				<th>Database</th>
				<th>PRI</th>
				<th>Created</th>
		
			</tr>
			</thead>
        <tbody>
		<?php foreach ($rowData as $row) : ?>
			<tr>		
				<td>
				<div class="btn-group">
						<?php if($type !='core') : ?>
						<a href="<?php echo site_url($row->module_name);?>"><i class="fa fa-cog"></i><?php echo $this->lang->line('core.fr_viewmodule'); ?> </a>&nbsp;&nbsp;
						<?php endif;?>
						<a href="<?php echo site_url('sximo/module/config/'.$row->module_name);?>"><i class="fa fa-edit"></i><?php echo $this->lang->line('core.fr_editmodule'); ?> </a>&nbsp;&nbsp;
						<?php if($type !='core') : ?>
						<a href="javascript://ajax" onclick="SximoConfirmDelete('<?php echo site_url('sximo/module/destroy/'.$row->module_id);?>')"><i class="fa fa-trash-o"></i><?php echo $this->lang->line('core.fr_removemodule'); ?> </a>&nbsp;&nbsp;
						<a href="<?php echo site_url('sximo/module/rebuild/'.$row->module_id);?>"><i class="fa fa-reload"></i><?php echo $this->lang->line('core.fr_rebuildmodule'); ?> </a>
						<?php endif;?>
				</div>					
				</td>
				<td>
				 <?php if($type !='core'):?>
				<input type="checkbox" class="ids" name="id[]" value="<?php echo $row->module_id ;?>" /> <?php endif;?></td>
				<td><?php echo $row->module_title ;?> </td>
				<td><?php echo $row->module_name ;?> </td>
				<td><?php echo $row->module_db ;?> </td>
				<td><?php echo $row->module_db_key ;?> </td>
				<td><?php echo $row->module_created ;?> </td>
			</tr>
		<?php endforeach;?>	
	</tbody>		
	</table>
	
	<?php else:?>
		
		<p class="text-center" style="padding:50px 0;"><?php echo $this->lang->line('core.norecord'); ?> ! 
		<br /><br />
		<a href="<?php echo site_url('sximo/module/create');?>" class="btn btn-default "><i class="icon-plus-circle2"></i><?php echo $this->lang->line('core.fr_newmodule'); ?> </a>
		 </p>	
	<?php endif;?>
	</div>	
	
	</div>	

</div>	  
	   </div>
          </div>
          </div>	  
	   </div>
          </div>
        </section>
  <script language='javascript' >
  jQuery(document).ready(function($){
    $('.post_url').click(function(e){
      e.preventDefault();
      if( ( $('.ids',$('#SximoTable')).is(':checked') )==false ){
        alert( $(this).attr('data-title') + " not selected");
        return false;
      }
      $('#SximoTable').attr({'action' : $(this).attr('href') }).submit();
    })
  })
  </script>	  
