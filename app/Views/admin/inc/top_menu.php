<div class="navbar navbar-fixed-top">
  <div class="navbar-inner">
    <div class="container"> 
	<a class="brand" href="<?=base_url('admin/dashboard')?>">Autocraft Korea lnc</a>

      <!--/.nav-collapse --> 
    </div>
    <!-- /container --> 
  </div>
  <!-- /navbar-inner --> 
</div>
<!-- /navbar -->






<?php 
  $uri = service('uri');
  $page = $uri->getSegment(2); 
  $subpage = $uri->getSegment(3); 
 ?>


<div class="subnavbar">
  <div class="subnavbar-inner">
    <div class="container">
      <ul class="mainnav">

        <li <?php if($page=="dashboard"){echo 'class="active"';} ?> ><a href="<?=base_url('admin/dashboard')?>"><i class="icon-dashboard"></i><span>Dashboard</span> </a> </li>
	
		    <li <?php if($page=="stock"){echo 'class="active"';} ?>><a href="<?=base_url('admin/stock')?>"><i class="icon-truck"></i><span>Stock</span> </a> </li>

        <li class="dropdown <?php if($page=="vehicle"){ echo "active";}?> "><a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown"> <i class="icon-reorder"></i><span>Vehicle Data</span> <b class="caret"></b></a>
          <ul class="dropdown-menu">
            <li><a href="<?=base_url('admin/vehicle/make')?>">Vehicle Makes</a></li>
            <li><a href="<?=base_url('admin/vehicle/model')?>">Vehicle Models</a></li>
            <!-- <li><a href="<?=base_url('admin/vehicle/import_from_avis')?>">Import from AVIS</a></li> -->
          </ul>
        </li>
        <li <?php if($page=="messages"){echo 'class="active"';} ?>><a href="<?=base_url('admin/messages')?>"><i class="icon-question"></i><span>Messages</span> </a> </li>
        <li <?php if($page=="inquiries"){echo 'class="active"';} ?>><a href="<?=base_url('admin/inquiries')?>"><i class="icon-question"></i><span>Inquiries</span> </a> </li>


	     <li <?php if($page=="testimonial"){echo 'class="active"';} ?>><a href="<?=base_url('admin/testimonial')?>"><i class="icon-user"></i><span>Testimonial</span> </a> </li>


<li <?php if($page=="subscribers"){echo 'class="active"';} ?>><a href="<?=base_url('admin/subscribers')?>"><i class="icon-check"></i><span>Subscribers</span> </a> </li>

<li class="dropdown"><a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown"> <i class="icon-picture"></i><span>App Data</span> <b class="caret"></b></a>
          <ul class="dropdown-menu">
            <li <?php if($page=="content"){echo 'class="active"';} ?>><a href="<?=base_url('admin/content')?>">Page Content</a></li>
          </ul>
    </li> 

        <li <?php if($page=="profile"){echo 'class="active"';} ?>><a href="<?=base_url('admin/profile')?>"><i class="icon-user"></i><span>Profile</span> </a> </li>

        <li><a href="<?=base_url('logout')?>/"><i class="icon-signout"></i><span>Logout</span> </a> </li>


        <li></li>



	  </ul>
    </div>
    <!-- /container --> 
  </div>
  <!-- /subnavbar-inner --> 
</div>
