<?php 
$CI =& get_instance();
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>DISCOVERYBase</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>adminlte/bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>adminlte/bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>adminlte/bower_components/Ionicons/css/ionicons.min.css">

  <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />

  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>adminlte/dist/css/AdminLTE.css?v=0.1">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>adminlte/dist/css/skins/_all-skins.css?v=0.6">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

	<!-- jQuery 3 -->
	<!-- jQuery 3 -->
	<link rel="stylesheet" href="<?php echo base_url(); ?>adminlte/bower_components/jquery-ui/themes/smoothness/jquery-ui.css">
	<script src="<?php echo base_url(); ?>adminlte/bower_components/jquery/dist/jquery.min.js"></script>
	<script src="<?php echo base_url(); ?>adminlte/bower_components/jquery-ui/jquery-ui.min.js"></script>

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">


  <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>

  <link rel="stylesheet" href="<?php echo base_url(); ?>plugins/jQueryTableSorter/themes/blue/style.css?v0.1" type="text/css" media="print, projection, screen" />
  <script type="text/javascript" src="<?php echo base_url(); ?>plugins/jQueryTableSorter/jquery.tablesorter.js"></script> 

	<script type="text/javascript" src="<?php echo base_url(); ?>dist/js/global.js"></script> 	

  <!-- Handson Table -->
  <script data-jsfiddle="common" src="<?php echo base_url();?>dist/third_party/handson/handsontable.full.js?v=2"></script>
  <link data-jsfiddle="common" rel="stylesheet" media="screen" href="<?php echo base_url();?>dist/third_party/handson/handsontable.full.css?v=2">  

<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/w/dt/dt-1.10.18/sc-2.0.0/datatables.min.css"/>
 
<script type="text/javascript" src="https://cdn.datatables.net/w/dt/dt-1.10.18/sc-2.0.0/datatables.min.js"></script>
<link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">
<script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>


<link href="<?php echo base_url();?>dist/third_party/spectrum/spectrum.css" rel="stylesheet">
<script type="text/javascript" src="<?php echo base_url();?>dist/third_party/spectrum/spectrum.js"></script>



  <style>
  
  </style>

	<script>
	function get_ajax_string(sample_id)
	{
	  var ajax_string  = "container=" + sample_id;
	  ajax_string += "&current_amount=" + document.getElementById("sample_" + sample_id + "_current_amount").value;
	  ajax_string += "&current_amount_unit=" + document.getElementById("sample_" + sample_id + "_current_amount_unit").value;

		var e = document.getElementById("sample_" + sample_id + "_location");
		var location = e.options[e.selectedIndex].value;

	  ajax_string += "&location=" + location;
	  ajax_string += "&container_comments=" + btoa(document.getElementById("sample_" + sample_id + "_comment").value);

	  document.getElementById("update_div_" + sample_id).innerHTML = "<br /><img src='<?php echo base_url();?>dist/img/ripple.gif'><br />Saving, please wait...";

	  return ajax_string;
	}

  var hot_instances = new Array();

  function update_from_hot()
  {
    var arrayLength = hot_instances.length;
    for (var i = 0; i < arrayLength; i++) 
    {
        var ihot = window[hot_instances[i]];
        if(ihot)
        {
          document.getElementById('data_'+hot_instances[i]).value=JSON.stringify(ihot.getData());
        }
    }
  }

var Cookie =
{
   set: function(name, value, days)
   {
      var domain, domainParts, date, expires, host;

      if (days)
      {
         date = new Date();
         date.setTime(date.getTime()+(days*24*60*60*1000));
         expires = "; expires="+date.toGMTString();
      }
      else
      {
         expires = "";
      }

      host = location.host;
      if (host.split('.').length === 1)
      {
         // no "." in a domain - it's localhost or something similar
         document.cookie = name+"="+value+expires+"; path=/";
      }
      else
      {
         // Remember the cookie on all subdomains.
          //
         // Start with trying to set cookie to the top domain.
         // (example: if user is on foo.com, try to set
         //  cookie to domain ".com")
         //
         // If the cookie will not be set, it means ".com"
         // is a top level domain and we need to
         // set the cookie to ".foo.com"
         domainParts = host.split('.');
         domainParts.shift();
         domain = '.'+domainParts.join('.');

         document.cookie = name+"="+value+expires+"; path=/; domain="+domain;

         // check if cookie was successfuly set to the given domain
         // (otherwise it was a Top-Level Domain)
         if (Cookie.get(name) == null || Cookie.get(name) != value)
         {
            // append "." to current domain
            domain = '.'+host;
            document.cookie = name+"="+value+expires+"; path=/; domain="+domain;
         }
      }
   },

   get: function(name)
   {
      var nameEQ = name + "=";
      var ca = document.cookie.split(';');
      for (var i=0; i < ca.length; i++)
      {
         var c = ca[i];
         while (c.charAt(0)==' ')
         {
            c = c.substring(1,c.length);
         }

         if (c.indexOf(nameEQ) == 0) return c.substring(nameEQ.length,c.length);
      }
      return null;
   },

   erase: function(name)
   {
      Cookie.set(name, '', -1);
   }
};	
	</script>

</head>
<body class="sidebar-mini sidebar-collapse wysihtml5-supported skin-black" style="overflow-x: hidden; overflow-y: hidden;">
<!-- Site wrapper -->
<div class="wrapper">

  <header class="main-header">
    <!-- Logo -->
    <a href="<?php echo base_url(); ?>" class="logo hidden-xs">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><img src="https://juul.discoverybase.net/JUUL-hex-white.png" style='width: 40px;'></span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><img src='https://juul.discoverybase.net/Juul_Labs_Logo_white.png' style='width: 90px;'></span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </a>

      <!--
      <div class="hidden-xs" style='float: left; background-color: transparent; background-image: none; padding: 15px 15px;'>
      <a href="http://molcentrics.com"><i class="fa fa-home"></i></a>
      /
      <a href="http://molcentrics.com">Data Import</a>
      /
      <a href="#" onclick="getVisible();">NS5B Luciferase</a>      
      </div>
   	-->

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <!-- User Account: style can be found in dropdown.less -->
              <!-- User Account: style can be found in dropdown.less -->
              <li class="dropdown user user-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <span ><?php if(isset($name)){echo $name;} else{echo "Welcome";}?></span>
                </a>
                <ul class="dropdown-menu" style="border: 4px solid #808080;">             	
                  <li style='border-bottom: 1px solid #808080;'><a href='<?php echo base_url(); ?>index.php/profile/settings'><i class="fa fa-user"></i> Profile</a></li>
                  <li style='border-bottom: 1px solid #808080;'><a href='<?php echo base_url(); ?>index.php/sessions/sign_out'><i class="fa fa-sign-out"></i> Sign Out</a></li>                 
                  <li><a href="#"><i class="fa fa-info"></i>version <?php echo (isset($version) ? $version : ""); ?></a></li>
                </ul>
              </li>          
          <!-- Control Sidebar Toggle Button -->
          <!--
          <li>
            <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
          </li>
          -->
        </ul>
      </div>
    </nav>
  </header>

  <!-- =============================================== -->

  <!-- Left side column. contains the sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar" style='padding-top: 5px;'>
      <!-- search form -->
      <form action="<?php echo base_url(); ?>index.php/data_access/search" method="post" class="sidebar-form" >
        <div class="input-group">
          <input type="text" name="search_terms" class="form-control" placeholder="Search...">
          <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
        </div>
      </form>
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">

			<li class="<?php echo $CI->menu_persist->get_state('home'); ?>" style="border-top: 1px solid #000; border-bottom: 1px solid #000;">
			  <a href="<?php echo base_url(); ?>" onclick="Cookie.set('menu_persist', 'home');">
			    <i class="fa fa-home"></i> <span>HOME</span>
			  </a>
			</li>  

       
		 
         <li class="treeview <?php echo $CI->menu_persist->get_state('formulations'); ?>" style="border-bottom: 1px solid #000;">
           <a href="#" onclick="Cookie.set('menu_persist', 'formulations');" onclick="Cookie.set('menu_persist', 'formulations');">
             <i class="fa fa-flask"></i> <span>FORMULATIONS</span>
             <i class="fa fa-angle-left pull-right"></i>
           </a>
           <ul class="treeview-menu">
             <li>
             	<a href="<?php echo base_url(); ?>index.php/custom/formulations/view_all" onclick="Cookie.set('menu_persist', 'formulations');"><i class="fa fa-angle-right"></i> View All</a> 
             </li>
             <li>
					<a href="<?php echo base_url(); ?>index.php/custom/propel_report_view/all" onclick="Cookie.set('menu_persist', 'formulations');"><i class="fa fa-angle-right"></i> View All Reports</a> 
             </li>
           </ul>
         </li>

<?php
if($CI->user_permissions->has_permission("formulation_weights", true))
{
         echo '<li class="treeview ' . $CI->menu_persist->get_state('ingredients') .'" style="border-bottom: 1px solid #000;">
           <a href="#" onclick="Cookie.set(\'menu_persist\', \'ingredients\');" onclick="Cookie.set(\'menu_persist\', \'ingredients\');">
             <i class="fa fa-eyedropper"></i> <span>INGREDIENTS</span>
             <i class="fa fa-angle-left pull-right"></i>
           </a>
           <ul class="treeview-menu">
             <li><a href="'.base_url().'index.php/custom/ingredients/view_all" onclick="Cookie.set(\'menu_persist\', \'ingredients\');"><i class="fa fa-angle-right"></i> View All</a></li> 

         	

             	<li><a href="'.base_url().'index.php/custom/formulations/view_all/true" onclick="Cookie.set(\'menu_persist\', \'ingredients\');"><i class="fa fa-angle-right"></i> View All Formulations</a></li>
             	<li><a href="'.base_url().'index.php/data_import/registration/by_type/Formulations" onclick="Cookie.set(\'menu_persist\', \'ingredients\');"><i class="fa fa-angle-right"></i> Add New</a></li> 
					<li><a href="'.base_url().'index.php/custom/formulations/id_reassignment" onclick="Cookie.set(\'menu_persist\', \'ingredients\');"><i class="fa fa-angle-right"></i> ID Reassignment</a></li>


           </ul>
         </li>';
}
?>

         <li class="treeview <?php echo $CI->menu_persist->get_state('studies'); ?>" style="border-bottom: 1px solid #000;">
           <a href="#" onclick="Cookie.set('menu_persist', 'studies');">
             <i class="fa fa-bar-chart-o"></i> <span>STUDIES</span>
             <i class="fa fa-angle-left pull-right"></i>
           </a>
           <ul class="treeview-menu">     
             <li>
             	<a href="<?php echo base_url(); ?>index.php/custom/studies/view_all" onclick="Cookie.set('menu_persist', 'studies');"><i class="fa fa-angle-right"></i> View All</a>             
             </li>

<?php 
if($CI->user_permissions->has_permission("preclinical_access", true))
{
	echo
            '<li><a href="'.base_url().'index.php/data_import/registration/by_type/Studies" onclick="Cookie.set(\'menu_persist\', \'studies\');"><i class="fa fa-angle-right"></i> Add New</a> </li>
            <li><a href="'.base_url().'index.php/data_access/hphc_reports" onclick="Cookie.set(\'menu_persist\', \'studies\');"><i class="fa fa-angle-right"></i> Generate Analysis</a></li>';
}
?>


			</ul>
			</li>
<!--
         <li class="treeview <?php echo $CI->menu_persist->get_state('Tools'); ?>" style="border-bottom: 1px solid #D1D1D1;">
           <a href="#" onclick="Cookie.set('menu_persist', 'Tools');" onclick="Cookie.set('menu_persist', 'Tools');">
             <i class="fa fa-angle-double-right"></i> <span>TOOLS</span>
             <i class="fa fa-angle-left pull-right"></i>
           </a>
           <ul class="treeview-menu">
             <li>
             	<a href="<?php echo base_url(); ?>index.php/custom/data_reformat" onclick="Cookie.set('menu_persist', 'Tools');"><i class="fa fa-angle-right"></i> Labstat Data Re-Formatter</a>             	       	
             </li>
           </ul>
         </li>	
-->		
			
<?php 
if($CI->user_permissions->has_permission("system_admin", true))
{


 


		if(!$this->session->userdata('sys_loggedin'))
		{
			echo '<li class="'. $CI->menu_persist->get_state('admin') . '" style="border-bottom: 1px solid #000;">
					  <a href="'.base_url().'index.php/admin/authenticate">
					    <i class="fa fa-key"></i> <span>ADMIN</span>
					    <i class="fa fa-angle-left pull-right"></i>
					  </a>
					</li>';
		}
		else
		{
				echo '<li class="treeview '. $CI->menu_persist->get_state('admin') . '" style="border-bottom: 1px solid #000;">
						  <a href="#">
						    <i class="fa fa-key"></i> <span>ADMIN</span>
						    <i class="fa fa-angle-left pull-right"></i>
						  </a>
						  <ul class="treeview-menu">
						  
						  <li><a href="'.base_url().'index.php/custom/study_request_workflow" onclick="Cookie.set(\'menu_persist\', \'admin\');"><i class="fa fa-angle-right"></i> Study Request Form</a></li>

						    <li><a href="'.base_url().'index.php/admin/manage_users" onclick="Cookie.set(\'menu_persist\', \'admin\');"><i class="fa fa-angle-right"></i> Users and Groups</a></li>
						    <li><a href="'.base_url().'index.php/admin/manage_lists" onclick="Cookie.set(\'menu_persist\', \'admin\');"><i class="fa fa-angle-right"></i> System Lists</a></li>
						    <li><a href="'.base_url().'index.php/admin/manage_entities" onclick="Cookie.set(\'menu_persist\', \'admin\');"><i class="fa fa-angle-right"></i> Entity Data Models</a></li>


			             <li class="treeview '. $CI->menu_persist->get_state('admin_studies') . '">  
					         <a href="#">
					         <i class="fa fa-angle-double-right"></i> <span>Study Imports</span>
					         <i class="fa fa-angle-left pull-right"></i>
					        </a>  
				           <ul class="treeview-menu">







				            
				             	<li><a href="'.base_url().'index.php/custom/report_import_with_qc" onclick="Cookie.set(\'menu_persist\', \'admin\');" onclick="Cookie.set(\'menu_persist\', \'admin_studies_imports\');"><i class="fa fa-angle-right"></i> Labstat Excel</a></li>
				             	<li><a href="'.base_url().'index.php/custom/labstat_import" onclick="Cookie.set(\'menu_persist\', \'admin\');" onclick="Cookie.set(\'menu_persist\', \'admin_studies_imports\');"><i class="fa fa-angle-right"></i> Labstat XML</a></li>
				             	<li><a href="'.base_url().'index.php/custom/enthalpy_import" onclick="Cookie.set(\'menu_persist\', \'admin\');" onclick="Cookie.set(\'menu_persist\', \'admin_studies_imports\');"><i class="fa fa-angle-right"></i> Enthalpy EDD</a></li>
				             	<li><a href="'.base_url().'index.php/custom/report_import_broughton" onclick="Cookie.set(\'menu_persist\', \'admin\');" onclick="Cookie.set(\'menu_persist\', \'admin_studies_imports\');"><i class="fa fa-angle-right"></i> Broughton Excel</a></li>

                            	
				             	<li><a href="'.base_url().'index.php/custom/report_import_with_qc/hphc_job_queue" onclick="Cookie.set(\'menu_persist\', \'admin\');" onclick="Cookie.set(\'menu_persist\', \'admin_studies_imports\');"><i class="fa fa-angle-right"></i> Queue</a>            	
				             </li>
				           </ul>
							</li>		

			             <li class="treeview '. $CI->menu_persist->get_state('admin') . '>">          	
					           <a href="#"">
					             <i class="fa fa-angle-double-right"></i> <span>Analyte Selector</span>
					             <i class="fa fa-angle-left pull-right"></i>
					           </a>  
				           <ul class="treeview-menu">
				             <li><a href="'.base_url().'index.php/data_access/hphc_reports/report_format/hphc_aerosol" onclick="Cookie.set(\'menu_persist\', \'admin\');"><i class="fa fa-angle-right"></i> HPHC Aerosol</a></li>
				             <li><a href="'.base_url().'index.php/data_access/hphc_reports/report_format/hphc_eliquid" onclick="Cookie.set(\'menu_persist\', \'admin\');"><i class="fa fa-angle-right"></i> HPHC E-Liquid</a></li>
				           </ul>
				          </li>


						  </ul>
						</li>';
		}
}

?>


      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>

  <!-- =============================================== -->

  <!-- Content Wrapper. Contains page content -->
  <div id='cwid' class="content-wrapper" style='overflow-x: hidden; overflow-y: hidden; background-color: white;'>
<?php if(APP_INSTANCE == "test") echo "<div style='color: white; background-color: #FF8080;'><center>TEST</center></div>"; ?>
<?php if(APP_INSTANCE == "mdev") echo "<div style='color: white; background-color: #800080;'><center>MOLCENTRICS DEVELOPMENT</center></div>"; ?>
<?php if(APP_INSTANCE == "mtest") echo "<div style='color: black; background-color: #92FF05;'><center>MOLCENTRICS TEST</center></div>"; ?>
    <section class="content" style='padding: 8px 0px 0px 0px; overflow-x: hidden; overflow-y: hidden;'>
      <div id='mcid' style='overflow: <?php echo $content_overflow; ?>; height: 1px; width: 1px;'>
        <!-- =========== BEGIN PUT ALL CONTENT HERE =========== -->
        <?php echo $container; ?>
        <!-- =========== END PUT ALL CONTENT HERE =========== -->
        </div>
      </div>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!--
  <footer class="main-footer">
    <div class="pull-right hidden-xs">
      <b>Version</b> 2.4.0
    </div>
    <strong>Copyright &copy; 2014-2016 <a href="https://adminlte.io">Almsaeed Studio</a>.</strong> All rights
    reserved.
  </footer>
  -->


  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
  </aside>
  <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->


<!-- Bootstrap 3.3.7 -->
<script src="<?php echo base_url(); ?>adminlte/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- SlimScroll -->
<script src="<?php echo base_url(); ?>adminlte/bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="<?php echo base_url(); ?>adminlte/bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url(); ?>adminlte/dist/js/adminlte.min.js"></script>

<script>
function getVisible() 
{    
    var $el = $('#cwid'),
        scrollTop = $(this).scrollTop(),
        scrollBot = scrollTop + $(this).height(),
        elTop = $el.offset().top,
        elBottom = elTop + $el.outerHeight(),
        visibleTop = elTop < scrollTop ? scrollTop : elTop,
        visibleBottom = elBottom > scrollBot ? scrollBot : elBottom;
    $('#mcid').height(visibleBottom - visibleTop - 8);
    $('#mcid').width($el.width());
}
setInterval(getVisible, 125)
</script>

<script>
  $(document).ready(function() {

    
      <?php if(isset($CI->sortable_tables)){echo $CI->sortable_tables;} ?>
      <?php if(isset($CI->calendar_widget)){echo $CI->calendar_widget;} ?>
      <?php if(isset($CI->document_ready)){echo $CI->document_ready;} ?>
    

        $(document).on('show.bs.modal', '.modal', function (event) {
            var zIndex = 1040 + (10 * $('.modal:visible').length);
            $(this).css('z-index', zIndex);
            setTimeout(function() {
                $('.modal-backdrop').not('.modal-stack').css('z-index', zIndex - 1).addClass('modal-stack');
            }, 0);
        });

  });
</script>


		<div id="myModal_ta_iframe" class="modal fade" data-keyboard="false" data-backdrop="static" role="dialog">
		  <div class="modal-dialog" style="width: 95%; height: 800px;">

		    <!-- Modal content-->
		    <div class="modal-content">
		    	<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<h4 class="modal-title">New Test Article</h4>
				</div>
		      <div class="modal-body">
		        <iframe id="ta_iframe" src="<?php echo base_url(); ?>index.php?modal=true" style="width: 95%; height: 800px;" frameBorder="0" style="overflow:hidden" scrolling="yes"></iframe>
		      </div>
		    </div>
		  </div>
		</div>

		<div id="myModal_generic" class="modal fade" data-keyboard="false" data-backdrop="static" role="dialog">
		  <div class="modal-dialog" style="width: 95%; height: 800px;">

		    <!-- Modal content-->
		    <div class="modal-content">
		    	<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
				</div>
		      <div class="modal-body">
		        <iframe id="generic_iframe" src="" style="width: 95%; height: 800px;" frameBorder="0" style="overflow:hidden" scrolling="yes"></iframe>
		      </div>
		    </div>
		  </div>
		</div>		

</body>
</html>

