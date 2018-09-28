<section class="content-header">
          <h1>
            <?php echo $pageTitle ;?>
          </h1>
          <ol class="breadcrumb">

          	<li><i class="fa fa-dashboard"></i> <a href="<?php echo site_url('dashboard') ?>">Dashboard</a></li>
			<li><a href="<?php echo site_url('users') ?>"><?php echo $pageTitle ?></a></li>
			<li class="active"> Detail </li>
          </ol>
        </section>

 <section class="content">
          <div class="row">
            <div class="col-xs-12">
              <div class="box box-danger">
              	<div class="box-header with-border">	
				<div class="table-responsive">
					<table class="table table-striped table-bordered" >
						<tbody>	
					
					<tr>
						<td width='30%' class='label-view text-right'>Avatar</td>
						<td><?php echo SiteHelpers::showUploadedFile($row['avatar'],'/uploads/users/') ;?> </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>Group</td>
						<td><?php echo SiteHelpers::gridDisplayView($row['group_id'],'group_id','1:tb_groups:group_id:name') ;?> </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>Username</td>
						<td><?php echo $row['username'] ;?> </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>First Name</td>
						<td><?php echo $row['first_name'] ;?> </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>Last Name</td>
						<td><?php echo $row['last_name'] ;?> </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>Email</td>
						<td><?php echo $row['email'] ;?> </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>Created At</td>
						<td><?php echo $row['created_at'] ;?> </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>Last Login</td>
						<td><?php echo $row['last_login'] ;?> </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>Updated At</td>
						<td><?php echo $row['updated_at'] ;?> </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>Active</td>
						<td><?php echo $row['active'] ;?> </td>
						
					</tr>
				
						</tbody>	
					</table>    
				</div>
				<a href="<?php echo site_url('users');?>" class="btn btn-sm btn-warning"> << Back </a>
			</div>
		</div>		
	

	</div>
</div>
</section>
	  