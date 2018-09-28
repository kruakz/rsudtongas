 <header class="main-header">
        <!-- Logo -->
        <a href="#" class="logo">
          <!-- mini logo for sidebar mini 50x50 pixels -->
          <span class="logo-mini"><b>G</b>O</span>
          <!-- logo for regular state and mobile devices -->
          <span class="logo-lg"><b>GO</b> BARI</span>
        </a>
        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top" role="navigation">
          <!-- Sidebar toggle button-->
          <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </a>
          <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">

            	<?php if($this->session->userdata('gid') ==1) : ?>

		<li class="dropdown messages-menu">
			<a class="dropdown-toggle" href="javascript:void(0)"  data-toggle="dropdown">
				<i class="fa  fa-desktop"></i> <span> <?php echo $this->lang->line('core.m_controlpanel'); ?> </span><i class="caret"></i>
			</a>
			<ul class="dropdown-menu">
				<li><a href="<?php echo site_url('sximo/config') ;?>"><i class="fa  fa-wrench"></i> <?php echo $this->lang->line('core.m_setting'); ?> </a></li>
				<li><a href="<?php echo site_url('users') ;?>" ><i class="fa fa-user"></i> Users Setting </a></li>
				<!--li><a href="<?php echo site_url('sximo/config/blast') ;?>"><i class="fa fa-envelope"></i> <?php echo $this->lang->line('core.m_blastemail'); ?> </a></li>
				<li><a href="<?php echo site_url('logs') ;?>"><i class="fa fa-clock-o"></i> <?php echo $this->lang->line('core.m_logs'); ?> </a></li>
				<li class="divider"></li>
				<li><a href="<?php echo site_url('sximo/pages') ;?>"><i class="fa  fa-copy"></i> <?php echo $this->lang->line('core.m_pagecms'); ?> </a></li-->
				<li class="divider"></li>	
				<li><a href="<?php echo site_url('sximo/menu/index?pos=sidebar') ;?>" ><i class="fa fa-sitemap"></i> <?php echo $this->lang->line('core.m_menu'); ?> </a></li>		
				
				<!--li><a href="<?php echo site_url('groups') ;?>" ><i class="fa fa-group"></i> Groups User </a></li-->		
				<li><a href="<?php echo site_url('sximo/module') ;?>" ><i class="fa fa-cogs"></i> <?php echo $this->lang->line('core.m_codebuilder'); ?> </a></li>	
			</ul>
		</li>	
	
		<?php endif;?>

		<li class="user dropdown">
			<a class="dropdown-toggle" href="javascript:void(0)"  data-toggle="dropdown">
				<i class="fa fa-user"></i> <span> <?php echo $this->lang->line('core.m_myaccount'); ?> </span><i class="caret"></i>
			</a>
			<ul class="dropdown-menu">
				<li><a href="<?php echo site_url('dashboard') ;?>"><i class="icon-stats-up"></i><?php echo $this->lang->line('core.m_dashboard'); ?> </a></li>
				<li><a href="<?php echo site_url('user/profile');?>"><i class="icon-user"></i> <?php echo $this->lang->line('core.m_myprofile'); ?> </a></li>
				<li><a href="<?php echo site_url('user/logout') ;?>"><i class="icon-exit"></i><?php echo $this->lang->line('core.m_logout'); ?> </a></li>
			</ul>
		</li>
              <!-- Messages: style can be found in dropdown.less-->
              
          </div>
        </nav>
      </header>


