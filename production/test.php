<!DOCTYPE html>
<?php 

$servername = "localhost";
$username = "root";
$password = "";
$database = "clinicplus";
$flag = "";

$conn = new mysqli($servername, $username, $password, $database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$patientid = "";
$test_type = "";
$date = "";

if(isset($_POST["patientid"])) {
    $patientid=$_POST["patientid"];  
    $test_type=$_POST["test_type"];  
    $date=$_POST["date"];  
}

$sql="SELECT test_id FROM test ORDER BY test_id DESC LIMIT 1";
if($res=$conn->query($sql)) {
    $resarr=$res->fetch_assoc();
    $id=$resarr["test_id"]+1;
}
else {
    $id=1;
}

$sql="insert into test values($patientid,'$test_type','$date',$id)";
$conn->query($sql);

?>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <title>Clinic+</title>

    <!-- Bootstrap -->
    <link href="../vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="../vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="../vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- iCheck -->
    <link href="../vendors/iCheck/skins/flat/green.css" rel="stylesheet">
    <!-- bootstrap-wysiwyg -->
    <link href="../vendors/google-code-prettify/bin/prettify.min.css" rel="stylesheet">
    <!-- Select2 -->
    <link href="../vendors/select2/dist/css/select2.min.css" rel="stylesheet">
    <!-- Switchery -->
    <link href="../vendors/switchery/dist/switchery.min.css" rel="stylesheet">
    <!-- starrr -->
    <link href="../vendors/starrr/dist/starrr.css" rel="stylesheet">
    <!-- bootstrap-daterangepicker -->
    <link href="../vendors/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="../build/css/custom.min.css" rel="stylesheet">
  </head>

  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
        <div class="col-md-3 left_col">
          <div class="left_col scroll-view">
            <div class="navbar nav_title" style="border: 0;">
              <a href="index.html" class="site_title"><i class="fa fa-paw"></i> <span>Clinic+</span></a>
            </div>

            <div class="clearfix"></div>

            <!-- menu profile quick info -->
            <div class="profile clearfix">
              <div class="profile_pic">
                <img src="images/img.jpg" alt="..." class="img-circle profile_img">
              </div>
              <div class="profile_info">
                <span>Welcome,</span>
                <h2>John Doe</h2>
              </div>
            </div>
            <!-- /menu profile quick info -->

            <br />

            <!-- sidebar menu -->
            <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
              <div class="menu_section">
                <h3>General</h3>
                <ul class="nav side-menu">
                  <li><a><i class="fa fa-home"></i> Home <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="index.html">Dashboard</a></li>
                      <li><a href="index2.html">Dashboard2</a></li>
                      <li><a href="index3.html">Dashboard3</a></li>
                    </ul>
                  </li>
                  <li><a><i class="fa fa-edit"></i> Forms <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="form.html">General Form</a></li>
                      <li><a href="form_advanced.html">Advanced Components</a></li>
                      <li><a href="form_validation.html">Form Validation</a></li>
                      <li><a href="form_wizards.html">Form Wizard</a></li>
                      <li><a href="form_upload.html">Form Upload</a></li>
                      <li><a href="form_buttons.html">Form Buttons</a></li>
                    </ul>
                  </li>
                  <li><a><i class="fa fa-desktop"></i> UI Elements <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="general_elements.html">General Elements</a></li>
                      <li><a href="media_gallery.html">Media Gallery</a></li>
                      <li><a href="typography.html">Typography</a></li>
                      <li><a href="icons.html">Icons</a></li>
                      <li><a href="glyphicons.html">Glyphicons</a></li>
                      <li><a href="widgets.html">Widgets</a></li>
                      <li><a href="invoice.html">Invoice</a></li>
                      <li><a href="inbox.html">Inbox</a></li>
                      <li><a href="calendar.html">Calendar</a></li>
                    </ul>
                  </li>
                  <li><a><i class="fa fa-table"></i> Tables <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="tables.html">Tables</a></li>
                      <li><a href="tables_dynamic.html">Table Dynamic</a></li>
                    </ul>
                  </li>
                  <li><a><i class="fa fa-bar-chart-o"></i> Data Presentation <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="chartjs.html">Chart JS</a></li>
                      <li><a href="chartjs2.html">Chart JS2</a></li>
                      <li><a href="morisjs.html">Moris JS</a></li>
                      <li><a href="echarts.html">ECharts</a></li>
                      <li><a href="other_charts.html">Other Charts</a></li>
                    </ul>
                  </li>
                  <li><a><i class="fa fa-clone"></i>Layouts <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="fixed_sidebar.html">Fixed Sidebar</a></li>
                      <li><a href="fixed_footer.html">Fixed Footer</a></li>
                    </ul>
                  </li>
                </ul>
              </div>
              <div class="menu_section">
                <h3>Live On</h3>
                <ul class="nav side-menu">
                  <li><a><i class="fa fa-bug"></i> Additional Pages <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="e_commerce.html">E-commerce</a></li>
                      <li><a href="projects.html">Projects</a></li>
                      <li><a href="project_detail.html">Project Detail</a></li>
                      <li><a href="contacts.html">Contacts</a></li>
                      <li><a href="profile.html">Profile</a></li>
                    </ul>
                  </li>
                  <li><a><i class="fa fa-windows"></i> Extras <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="page_403.html">403 Error</a></li>
                      <li><a href="page_404.html">404 Error</a></li>
                      <li><a href="page_500.html">500 Error</a></li>
                      <li><a href="plain_page.html">Plain Page</a></li>
                      <li><a href="login.html">Login Page</a></li>
                      <li><a href="pricing_tables.html">Pricing Tables</a></li>
                    </ul>
                  </li>
                  <li><a><i class="fa fa-sitemap"></i> Multilevel Menu <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                        <li><a href="#level1_1">Level One</a>
                        <li><a>Level One<span class="fa fa-chevron-down"></span></a>
                          <ul class="nav child_menu">
                            <li class="sub_menu"><a href="level2.html">Level Two</a>
                            </li>
                            <li><a href="#level2_1">Level Two</a>
                            </li>
                            <li><a href="#level2_2">Level Two</a>
                            </li>
                          </ul>
                        </li>
                        <li><a href="#level1_2">Level One</a>
                        </li>
                    </ul>
                  </li>                  
                  <li><a href="javascript:void(0)"><i class="fa fa-laptop"></i> Landing Page <span class="label label-success pull-right">Coming Soon</span></a></li>
                </ul>
              </div>

            </div>
            <!-- /sidebar menu -->

            <!-- /menu footer buttons -->
            <div class="sidebar-footer hidden-small">
              <a data-toggle="tooltip" data-placement="top" title="Settings">
                <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="FullScreen">
                <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="Lock">
                <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="Logout" href="login.html">
                <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
              </a>
            </div>
            <!-- /menu footer buttons -->
          </div>
        </div>

        <!-- top navigation -->
        <div class="top_nav">
          <div class="nav_menu">
            <nav>
              <div class="nav toggle">
                <a id="menu_toggle"><i class="fa fa-bars"></i></a>
              </div>

              <ul class="nav navbar-nav navbar-right">
                <li class="">
                  <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                    <img src="images/img.jpg" alt="">John Doe
                    <span class=" fa fa-angle-down"></span>
                  </a>
                  <ul class="dropdown-menu dropdown-usermenu pull-right">
                    <li><a href="javascript:;"> Profile</a></li>
                    <li>
                      <a href="javascript:;">
                        <span class="badge bg-red pull-right">50%</span>
                        <span>Settings</span>
                      </a>
                    </li>
                    <li><a href="javascript:;">Help</a></li>
                    <li><a href="login.html"><i class="fa fa-sign-out pull-right"></i> Log Out</a></li>
                  </ul>
                </li>

                <li role="presentation" class="dropdown">
                  <a href="javascript:;" class="dropdown-toggle info-number" data-toggle="dropdown" aria-expanded="false">
                    <i class="fa fa-envelope-o"></i>
                    <span class="badge bg-green">6</span>
                  </a>
                  <ul id="menu1" class="dropdown-menu list-unstyled msg_list" role="menu">
                    <li>
                      <a>
                        <span class="image"><img src="images/img.jpg" alt="Profile Image" /></span>
                        <span>
                          <span>John Smith</span>
                          <span class="time">3 mins ago</span>
                        </span>
                        <span class="message">
                          Film festivals used to be do-or-die moments for movie makers. They were where...
                        </span>
                      </a>
                    </li>
                    <li>
                      <a>
                        <span class="image"><img src="images/img.jpg" alt="Profile Image" /></span>
                        <span>
                          <span>John Smith</span>
                          <span class="time">3 mins ago</span>
                        </span>
                        <span class="message">
                          Film festivals used to be do-or-die moments for movie makers. They were where...
                        </span>
                      </a>
                    </li>
                    <li>
                      <a>
                        <span class="image"><img src="images/img.jpg" alt="Profile Image" /></span>
                        <span>
                          <span>John Smith</span>
                          <span class="time">3 mins ago</span>
                        </span>
                        <span class="message">
                          Film festivals used to be do-or-die moments for movie makers. They were where...
                        </span>
                      </a>
                    </li>
                    <li>
                      <a>
                        <span class="image"><img src="images/img.jpg" alt="Profile Image" /></span>
                        <span>
                          <span>John Smith</span>
                          <span class="time">3 mins ago</span>
                        </span>
                        <span class="message">
                          Film festivals used to be do-or-die moments for movie makers. They were where...
                        </span>
                      </a>
                    </li>
                    <li>
                      <div class="text-center">
                        <a>
                          <strong>See All Alerts</strong>
                          <i class="fa fa-angle-right"></i>
                        </a>
                      </div>
                    </li>
                  </ul>
                </li>
              </ul>
            </nav>
          </div>
        </div>
        <!-- /top navigation -->

        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Add test details</h3>
              </div>

              <div class="title_right">
                <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                  <div class="input-group">
                    <input type="text" class="form-control" placeholder="Search for...">
                    <span class="input-group-btn">
                      <button class="btn btn-default" type="button">Go!</button>
                    </span>
                  </div>
                </div>
              </div>
            </div>
            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Test Form</h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                      <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                        <ul class="dropdown-menu" role="menu">
                          <li><a href="#">Settings 1</a>
                          </li>
                          <li><a href="#">Settings 2</a>
                          </li>
                        </ul>
                      </li>
                      <li><a class="close-link"><i class="fa fa-close"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <br />
                    <form class="form-horizontal form-label-left input_mask" action="test.php" method="POST">
                      <div class="row">
                        <div class="col-md-4 form-group has-feedback">
                          <input type="text" name="patientid" class="form-control" id="inputSuccess5" placeholder="Patient ID">
                          <span class="fa fa-phone form-control-feedback right" aria-hidden="true"></span>
                        </div>

                        <div class="form-group col-md-4">
                          <label class="control-label col-md-3" for="last-name">Test type
                          </label>
                          <div class="col-md-9">
                            <select id="heard" name="test_type" class="form-control" required>
                              <option value="">Choose..</option>
                              <option value="B">Breast Cancer</option>
                              <option value="D">Diabetes</option>
                              <option value="F">Fertility</option>
                              <option value="C">Cervical Cancer</option>
                              <option value="A">Acculate Inflamation</option>
                              <option value="T">Thoraric Surgery</option>
                              <option value="H">Heart Disease</option>
                            </select>
                          </div>
                        </div>  
                        
                        <div class="form-group col-md-4">
                          <label class="control-label col-md-3" for="last-name">Date
                          </label>
                          <div class="col-md-8">
                            
                            <div class="form-group">
                              <div class='input-group date' id='myDatepicker2'>
                                  <input type='text' name="date" class="form-control" />
                                  <span class="input-group-addon">
                                     <span class="glyphicon glyphicon-calendar"></span>
                                  </span>
                              </div>
                            </div>
                          </div>
                        </div> 
                      </div>

                      
                      <div class="form-group">
                        <div class="col-md-9 col-sm-9 col-xs-12 col-md-offset-5">                          
                          <button type="submit" class="btn btn-success">Submit</button>
                        </div>
                      </div>

                    </form>
                  </div>
                </div>
              </div>
            </div>

            <!-- Breast Cancer -->
            <div class="row">
              <div class="col-md-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Breast Cancer Form</h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                      <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                        <ul class="dropdown-menu" role="menu">
                          <li><a href="#">Settings 1</a>
                          </li>
                          <li><a href="#">Settings 2</a>
                          </li>
                        </ul>
                      </li>
                      <li><a class="close-link"><i class="fa fa-close"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>

                  <div class="x_content">
                    <br />
                    <form class="form-horizontal form-label-left input_mask">
                      <div class="row">
                        <div class="form-group col-md-4">
                          <label class="control-label col-md-4 col-sm-4 col-xs-4">Radius mean</label>
                          <div class="col-md-8 col-sm-8 col-xs-8">
                            <input type="text" class="form-control" placeholder="Default Input">
                          </div>
                        </div>
                        <div class="form-group col-md-4">
                          <label class="control-label col-md-4 col-sm-4 col-xs-4">Texture mean</label>
                          <div class="col-md-8 col-sm-8 col-xs-8">
                            <input type="text" class="form-control" placeholder="Default Input">
                          </div>
                        </div>
                        <div class="form-group col-md-4">
                          <label class="control-label col-md-4 col-sm-4 col-xs-4">Perimeter mean</label>
                          <div class="col-md-8 col-sm-8 col-xs-8">
                            <input type="text" class="form-control" placeholder="Default Input">
                          </div>
                        </div>
                      </div>

                      <div class="row">
                        <div class="form-group col-md-4">
                          <label class="control-label col-md-4 col-sm-4 col-xs-4">Area mean</label>
                          <div class="col-md-8 col-sm-8 col-xs-8">
                            <input type="text" class="form-control" placeholder="Default Input">
                          </div>
                        </div>
                        <div class="form-group col-md-4">
                          <label class="control-label col-md-4 col-sm-4 col-xs-4">Smoothness mean</label>
                          <div class="col-md-8 col-sm-8 col-xs-8">
                            <input type="text" class="form-control" placeholder="Default Input">
                          </div>
                        </div>
                        <div class="form-group col-md-4">
                          <label class="control-label col-md-4 col-sm-4 col-xs-4">Compactness mean</label>
                          <div class="col-md-8 col-sm-8 col-xs-8">
                            <input type="text" class="form-control" placeholder="Default Input">
                          </div>
                        </div>
                      </div>

                      <div class="row">
                        <div class="form-group col-md-4">
                          <label class="control-label col-md-4 col-sm-4 col-xs-4">Concavity mean</label>
                          <div class="col-md-8 col-sm-8 col-xs-8">
                            <input type="text" class="form-control" placeholder="Default Input">
                          </div>
                        </div>
                        <div class="form-group col-md-4">
                          <label class="control-label col-md-4 col-sm-4 col-xs-4">Concavepoints mean</label>
                          <div class="col-md-8 col-sm-8 col-xs-8">
                            <input type="text" class="form-control" placeholder="Default Input">
                          </div>
                        </div>
                        <div class="form-group col-md-4">
                          <label class="control-label col-md-4 col-sm-4 col-xs-4">Symmetry mean</label>
                          <div class="col-md-8 col-sm-8 col-xs-8">
                            <input type="text" class="form-control" placeholder="Default Input">
                          </div>
                        </div>
                      </div>

                      <div class="row">
                        <div class="form-group col-md-4">
                          <label class="control-label col-md-4 col-sm-4 col-xs-4">Fractal dimension mean</label>
                          <div class="col-md-8 col-sm-8 col-xs-8">
                            <input type="text" class="form-control" placeholder="Default Input">
                          </div>
                        </div>
                        <div class="form-group col-md-4">
                          <label class="control-label col-md-4 col-sm-4 col-xs-4">Radius SE</label>
                          <div class="col-md-8 col-sm-8 col-xs-8">
                            <input type="text" class="form-control" placeholder="Default Input">
                          </div>
                        </div>
                        <div class="form-group col-md-4">
                          <label class="control-label col-md-4 col-sm-4 col-xs-4">Texture SE</label>
                          <div class="col-md-8 col-sm-8 col-xs-8">
                            <input type="text" class="form-control" placeholder="Default Input">
                          </div>
                        </div>
                      </div>

                      <div class="row">
                        <div class="form-group col-md-4">
                          <label class="control-label col-md-4 col-sm-4 col-xs-4">Perimeter SE</label>
                          <div class="col-md-8 col-sm-8 col-xs-8">
                            <input type="text" class="form-control" placeholder="Default Input">
                          </div>
                        </div>
                        <div class="form-group col-md-4">
                          <label class="control-label col-md-4 col-sm-4 col-xs-4">Area SE</label>
                          <div class="col-md-8 col-sm-8 col-xs-8">
                            <input type="text" class="form-control" placeholder="Default Input">
                          </div>
                        </div>
                        <div class="form-group col-md-4">
                          <label class="control-label col-md-4 col-sm-4 col-xs-4">Smoothness SE</label>
                          <div class="col-md-8 col-sm-8 col-xs-8">
                            <input type="text" class="form-control" placeholder="Default Input">
                          </div>
                        </div>
                      </div>

                      <div class="row">
                        <div class="form-group col-md-4">
                          <label class="control-label col-md-4 col-sm-4 col-xs-4">Compactness SE</label>
                          <div class="col-md-8 col-sm-8 col-xs-8">
                            <input type="text" class="form-control" placeholder="Default Input">
                          </div>
                        </div>
                        <div class="form-group col-md-4">
                          <label class="control-label col-md-4 col-sm-4 col-xs-4">Concavity SE</label>
                          <div class="col-md-8 col-sm-8 col-xs-8">
                            <input type="text" class="form-control" placeholder="Default Input">
                          </div>
                        </div>
                        <div class="form-group col-md-4">
                          <label class="control-label col-md-4 col-sm-4 col-xs-4">Concavepoints SE</label>
                          <div class="col-md-8 col-sm-8 col-xs-8">
                            <input type="text" class="form-control" placeholder="Default Input">
                          </div>
                        </div>
                      </div>

                      <div class="row">
                        <div class="form-group col-md-4">
                          <label class="control-label col-md-4 col-sm-4 col-xs-4">Symmetry SE</label>
                          <div class="col-md-8 col-sm-8 col-xs-8">
                            <input type="text" class="form-control" placeholder="Default Input">
                          </div>
                        </div>
                        <div class="form-group col-md-4">
                          <label class="control-label col-md-4 col-sm-4 col-xs-4">Fractal dimension SE</label>
                          <div class="col-md-8 col-sm-8 col-xs-8">
                            <input type="text" class="form-control" placeholder="Default Input">
                          </div>
                        </div>
                        <div class="form-group col-md-4">
                          <label class="control-label col-md-4 col-sm-4 col-xs-4">Radius width</label>
                          <div class="col-md-8 col-sm-8 col-xs-8">
                            <input type="text" class="form-control" placeholder="Default Input">
                          </div>
                        </div>
                      </div>

                      <div class="row">
                        <div class="form-group col-md-4">
                          <label class="control-label col-md-4 col-sm-4 col-xs-4">Texture width</label>
                          <div class="col-md-8 col-sm-8 col-xs-8">
                            <input type="text" class="form-control" placeholder="Default Input">
                          </div>
                        </div>
                        <div class="form-group col-md-4">
                          <label class="control-label col-md-4 col-sm-4 col-xs-4">Perimeter width</label>
                          <div class="col-md-8 col-sm-8 col-xs-8">
                            <input type="text" class="form-control" placeholder="Default Input">
                          </div>
                        </div>
                        <div class="form-group col-md-4">
                          <label class="control-label col-md-4 col-sm-4 col-xs-4">Area width</label>
                          <div class="col-md-8 col-sm-8 col-xs-8">
                            <input type="text" class="form-control" placeholder="Default Input">
                          </div>
                        </div>
                      </div>

                      <div class="row">
                        <div class="form-group col-md-4">
                          <label class="control-label col-md-4 col-sm-4 col-xs-4">Smoothness width</label>
                          <div class="col-md-8 col-sm-8 col-xs-8">
                            <input type="text" class="form-control" placeholder="Default Input">
                          </div>
                        </div>
                        <div class="form-group col-md-4">
                          <label class="control-label col-md-4 col-sm-4 col-xs-4">Compactness width</label>
                          <div class="col-md-8 col-sm-8 col-xs-8">
                            <input type="text" class="form-control" placeholder="Default Input">
                          </div>
                        </div>
                        <div class="form-group col-md-4">
                          <label class="control-label col-md-4 col-sm-4 col-xs-4">Concavity width</label>
                          <div class="col-md-8 col-sm-8 col-xs-8">
                            <input type="text" class="form-control" placeholder="Default Input">
                          </div>
                        </div>                        
                      </div>

                      <div class="row">
                        <div class="form-group col-md-4">
                          <label class="control-label col-md-4 col-sm-4 col-xs-4">Concavepoints width</label>
                          <div class="col-md-8 col-sm-8 col-xs-8">
                            <input type="text" class="form-control" placeholder="Default Input">
                          </div>
                        </div>
                        <div class="form-group col-md-4">
                          <label class="control-label col-md-4 col-sm-4 col-xs-4">Symmetry width</label>
                          <div class="col-md-8 col-sm-8 col-xs-8">
                            <input type="text" class="form-control" placeholder="Default Input">
                          </div>
                        </div>
                        <div class="form-group col-md-4">
                          <label class="control-label col-md-4 col-sm-4 col-xs-4">Fractal dimension width</label>
                          <div class="col-md-8 col-sm-8 col-xs-8">
                            <input type="text" class="form-control" placeholder="Default Input">
                          </div>
                        </div>                        
                      </div>

                      <div class="row">
                        <div class="form-group col-md-4">
                          <label class="control-label col-md-4 col-sm-4 col-xs-4">Tumor size</label>
                          <div class="col-md-8 col-sm-8 col-xs-8">
                            <input type="text" class="form-control" placeholder="Default Input">
                          </div>
                        </div>
                        <div class="form-group col-md-4">
                          <label class="control-label col-md-4 col-sm-4 col-xs-4">Lymph node status</label>
                          <div class="col-md-8 col-sm-8 col-xs-8">
                            <input type="text" class="form-control" placeholder="Default Input">
                          </div>
                        </div>                        
                      </div>
                      
                      <div class="form-group">
                        <div class="col-md-9 col-sm-9 col-xs-12 col-md-offset-5">
                          <button type="submit" class="btn btn-success">Submit</button>
                        </div>
                      </div>

                    </form>
                  </div>
                </div>
              </div>
            </div>

            <!-- Diabetes -->
            <div class="row">
              <div class="col-md-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Diabetes Form</h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                      <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                        <ul class="dropdown-menu" role="menu">
                          <li><a href="#">Settings 1</a>
                          </li>
                          <li><a href="#">Settings 2</a>
                          </li>
                        </ul>
                      </li>
                      <li><a class="close-link"><i class="fa fa-close"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>

                  <div class="x_content">
                    <br />
                    <form class="form-horizontal form-label-left input_mask" action="diabetes.php" method="POST">
                      <div class="row">
                        <div class="form-group col-md-4">
                          <label class="control-label col-md-4 col-sm-4 col-xs-4">Systolic BP</label>
                          <div class="col-md-8 col-sm-8 col-xs-8">
                            <input type="text" name="SBP" class="form-control" placeholder="Default Input">
                          </div>
                        </div>
                        <div class="form-group col-md-4">
                          <label class="control-label col-md-4 col-sm-4 col-xs-4">LDL level</label>
                          <div class="col-md-8 col-sm-8 col-xs-8">
                            <input type="text" name="LDL" class="form-control" placeholder="Default Input">
                          </div>
                        </div>
                        <div class="form-group col-md-4">
                          <label class="control-label col-md-4 col-sm-4 col-xs-4">A1c level</label>
                          <div class="col-md-8 col-sm-8 col-xs-8">
                            <input type="text" name="AL" class="form-control" placeholder="Default Input">
                          </div>
                        </div>
                      </div>  

                      <div class="row">
                        <div class="form-group col-md-4">
                          <label class="control-label col-md-4 col-sm-4 col-xs-4">Gender</label>
                          <div class="col-md-8 col-sm-8 col-xs-8">
                            <input type="text" name="gender" class="form-control" placeholder="Default Input">
                          </div>
                        </div>                                        
                      </div>  
                      
                      <div class="form-group">
                        <div class="col-md-9 col-sm-9 col-xs-12 col-md-offset-5">
                          <button type="submit" class="btn btn-success">Submit</button>
                        </div>
                      </div>

                    </form>
                  </div>
                </div>
              </div>
            </div>

            <!-- Fertility -->
            <div class="row">
              <div class="col-md-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Fertility Form</h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                      <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                        <ul class="dropdown-menu" role="menu">
                          <li><a href="#">Settings 1</a>
                          </li>
                          <li><a href="#">Settings 2</a>
                          </li>
                        </ul>
                      </li>
                      <li><a class="close-link"><i class="fa fa-close"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>

                  <div class="x_content">
                    <br />
                    <form class="form-horizontal form-label-left input_mask">
                      <div class="row">
                        <div class="form-group col-md-4">
                          <label class="control-label col-md-4 col-sm-4 col-xs-4">Season</label>
                          <div class="col-md-8 col-sm-8 col-xs-8">
                            <input type="text" class="form-control" placeholder="Default Input">
                          </div>
                        </div>
                        <div class="form-group col-md-4">
                          <label class="control-label col-md-4 col-sm-4 col-xs-4">Age</label>
                          <div class="col-md-8 col-sm-8 col-xs-8">
                            <input type="text" class="form-control" placeholder="Default Input">
                          </div>
                        </div>
                        <div class="form-group col-md-4">
                          <label class="control-label col-md-4 col-sm-4 col-xs-4">Childhood disease</label>
                          <div class="col-md-8 col-sm-8 col-xs-8">
                            <input type="text" class="form-control" placeholder="Default Input">
                          </div>
                        </div>
                      </div>  

                      <div class="row">
                        <div class="form-group col-md-4">
                          <label class="control-label col-md-4 col-sm-4 col-xs-4">Trauma</label>
                          <div class="col-md-8 col-sm-8 col-xs-8">
                            <input type="text" class="form-control" placeholder="Default Input">
                          </div>
                        </div>
                        <div class="form-group col-md-4">
                          <label class="control-label col-md-4 col-sm-4 col-xs-4">Surgical intervention</label>
                          <div class="col-md-8 col-sm-8 col-xs-8">
                            <input type="text" class="form-control" placeholder="Default Input">
                          </div>
                        </div> 
                        <div class="form-group col-md-4">
                          <label class="control-label col-md-4 col-sm-4 col-xs-4">High fever</label>
                          <div class="col-md-8 col-sm-8 col-xs-8">
                            <input type="text" class="form-control" placeholder="Default Input">
                          </div>
                        </div>                      
                      </div>  

                      <div class="row">
                        <div class="form-group col-md-4">
                          <label class="control-label col-md-4 col-sm-4 col-xs-4">Alcohol consumption</label>
                          <div class="col-md-8 col-sm-8 col-xs-8">
                            <input type="text" class="form-control" placeholder="Default Input">
                          </div>
                        </div>
                        <div class="form-group col-md-4">
                          <label class="control-label col-md-4 col-sm-4 col-xs-4">Smoking habit</label>
                          <div class="col-md-8 col-sm-8 col-xs-8">
                            <input type="text" class="form-control" placeholder="Default Input">
                          </div>
                        </div> 
                        <div class="form-group col-md-4">
                          <label class="control-label col-md-4 col-sm-4 col-xs-4">Sitting hours</label>
                          <div class="col-md-8 col-sm-8 col-xs-8">
                            <input type="text" class="form-control" placeholder="Default Input">
                          </div>
                        </div>                      
                      </div>  
                      
                      <div class="form-group">
                        <div class="col-md-9 col-sm-9 col-xs-12 col-md-offset-5">
                          <button type="submit" class="btn btn-success">Submit</button>
                        </div>
                      </div>

                    </form>
                  </div>
                </div>
              </div>
            </div>

            <!-- Cervical Cancer -->
            <div class="row">
              <div class="col-md-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Cervical Cancer Form</h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                      <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                        <ul class="dropdown-menu" role="menu">
                          <li><a href="#">Settings 1</a>
                          </li>
                          <li><a href="#">Settings 2</a>
                          </li>
                        </ul>
                      </li>
                      <li><a class="close-link"><i class="fa fa-close"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>

                  <div class="x_content">
                    <br />
                    <form class="form-horizontal form-label-left input_mask">
                      <div class="row">
                        <div class="form-group col-md-4">
                          <label class="control-label col-md-4 col-sm-4 col-xs-4">Age</label>
                          <div class="col-md-8 col-sm-8 col-xs-8">
                            <input type="text" class="form-control" placeholder="Default Input">
                          </div>
                        </div>
                        <div class="form-group col-md-4">
                          <label class="control-label col-md-4 col-sm-4 col-xs-4">No. of sexual partners</label>
                          <div class="col-md-8 col-sm-8 col-xs-8">
                            <input type="text" class="form-control" placeholder="Default Input">
                          </div>
                        </div>
                        <div class="form-group col-md-4">
                          <label class="control-label col-md-4 col-sm-4 col-xs-4">1st sexual intercourse</label>
                          <div class="col-md-8 col-sm-8 col-xs-8">
                            <input type="text" class="form-control" placeholder="Default Input">
                          </div>
                        </div>
                      </div>

                      <div class="row">
                        <div class="form-group col-md-4">
                          <label class="control-label col-md-4 col-sm-4 col-xs-4">No. of pregnancies</label>
                          <div class="col-md-8 col-sm-8 col-xs-8">
                            <input type="text" class="form-control" placeholder="Default Input">
                          </div>
                        </div>
                        <div class="form-group col-md-4">
                          <label class="control-label col-md-4 col-sm-4 col-xs-4">Smokes</label>
                          <div class="col-md-8 col-sm-8 col-xs-8">
                            <input type="text" class="form-control" placeholder="Default Input">
                          </div>
                        </div>
                        <div class="form-group col-md-4">
                          <label class="control-label col-md-4 col-sm-4 col-xs-4">Smoking years</label>
                          <div class="col-md-8 col-sm-8 col-xs-8">
                            <input type="text" class="form-control" placeholder="Default Input">
                          </div>
                        </div>
                      </div>

                      <div class="row">
                        <div class="form-group col-md-4">
                          <label class="control-label col-md-4 col-sm-4 col-xs-4">Packs/year</label>
                          <div class="col-md-8 col-sm-8 col-xs-8">
                            <input type="text" class="form-control" placeholder="Default Input">
                          </div>
                        </div>
                        <div class="form-group col-md-4">
                          <label class="control-label col-md-4 col-sm-4 col-xs-4">Hormonal contraceptives</label>
                          <div class="col-md-8 col-sm-8 col-xs-8">
                            <input type="text" class="form-control" placeholder="Default Input">
                          </div>
                        </div>
                        <div class="form-group col-md-4">
                          <label class="control-label col-md-4 col-sm-4 col-xs-4">Hormonal contraceptives years</label>
                          <div class="col-md-8 col-sm-8 col-xs-8">
                            <input type="text" class="form-control" placeholder="Default Input">
                          </div>
                        </div>
                      </div>

                      <div class="row">
                        <div class="form-group col-md-4">
                          <label class="control-label col-md-4 col-sm-4 col-xs-4">IUD</label>
                          <div class="col-md-8 col-sm-8 col-xs-8">
                            <input type="text" class="form-control" placeholder="Default Input">
                          </div>
                        </div>
                        <div class="form-group col-md-4">
                          <label class="control-label col-md-4 col-sm-4 col-xs-4">IUD years</label>
                          <div class="col-md-8 col-sm-8 col-xs-8">
                            <input type="text" class="form-control" placeholder="Default Input">
                          </div>
                        </div>
                        <div class="form-group col-md-4">
                          <label class="control-label col-md-4 col-sm-4 col-xs-4">STDs</label>
                          <div class="col-md-8 col-sm-8 col-xs-8">
                            <input type="text" class="form-control" placeholder="Default Input">
                          </div>
                        </div>
                      </div>

                      <div class="row">
                        <div class="form-group col-md-4">
                          <label class="control-label col-md-4 col-sm-4 col-xs-4">STDs number</label>
                          <div class="col-md-8 col-sm-8 col-xs-8">
                            <input type="text" class="form-control" placeholder="Default Input">
                          </div>
                        </div>
                        <div class="form-group col-md-4">
                          <label class="control-label col-md-4 col-sm-4 col-xs-4">Condylomatosis</label>
                          <div class="col-md-8 col-sm-8 col-xs-8">
                            <input type="text" class="form-control" placeholder="Default Input">
                          </div>
                        </div>
                        <div class="form-group col-md-4">
                          <label class="control-label col-md-4 col-sm-4 col-xs-4">Cervical condylomatosis</label>
                          <div class="col-md-8 col-sm-8 col-xs-8">
                            <input type="text" class="form-control" placeholder="Default Input">
                          </div>
                        </div>
                      </div>

                      <div class="row">
                        <div class="form-group col-md-4">
                          <label class="control-label col-md-4 col-sm-4 col-xs-4">Vaginal condylomatosis</label>
                          <div class="col-md-8 col-sm-8 col-xs-8">
                            <input type="text" class="form-control" placeholder="Default Input">
                          </div>
                        </div>
                        <div class="form-group col-md-4">
                          <label class="control-label col-md-4 col-sm-4 col-xs-4">Vulvo-perineal condylomatosis</label>
                          <div class="col-md-8 col-sm-8 col-xs-8">
                            <input type="text" class="form-control" placeholder="Default Input">
                          </div>
                        </div>
                        <div class="form-group col-md-4">
                          <label class="control-label col-md-4 col-sm-4 col-xs-4">syphilis</label>
                          <div class="col-md-8 col-sm-8 col-xs-8">
                            <input type="text" class="form-control" placeholder="Default Input">
                          </div>
                        </div>
                      </div>

                      <div class="row">
                        <div class="form-group col-md-4">
                          <label class="control-label col-md-4 col-sm-4 col-xs-4">Pelvic inflammatory disease</label>
                          <div class="col-md-8 col-sm-8 col-xs-8">
                            <input type="text" class="form-control" placeholder="Default Input">
                          </div>
                        </div>
                        <div class="form-group col-md-4">
                          <label class="control-label col-md-4 col-sm-4 col-xs-4">Genital herpes</label>
                          <div class="col-md-8 col-sm-8 col-xs-8">
                            <input type="text" class="form-control" placeholder="Default Input">
                          </div>
                        </div>
                        <div class="form-group col-md-4">
                          <label class="control-label col-md-4 col-sm-4 col-xs-4">Molluscum contagiosum</label>
                          <div class="col-md-8 col-sm-8 col-xs-8">
                            <input type="text" class="form-control" placeholder="Default Input">
                          </div>
                        </div>
                      </div>

                      <div class="row">
                        <div class="form-group col-md-4">
                          <label class="control-label col-md-4 col-sm-4 col-xs-4">AIDS</label>
                          <div class="col-md-8 col-sm-8 col-xs-8">
                            <input type="text" class="form-control" placeholder="Default Input">
                          </div>
                        </div>
                        <div class="form-group col-md-4">
                          <label class="control-label col-md-4 col-sm-4 col-xs-4">HIV</label>
                          <div class="col-md-8 col-sm-8 col-xs-8">
                            <input type="text" class="form-control" placeholder="Default Input">
                          </div>
                        </div>
                        <div class="form-group col-md-4">
                          <label class="control-label col-md-4 col-sm-4 col-xs-4">Hepatitis B</label>
                          <div class="col-md-8 col-sm-8 col-xs-8">
                            <input type="text" class="form-control" placeholder="Default Input">
                          </div>
                        </div>
                      </div>

                      <div class="row">
                        <div class="form-group col-md-4">
                          <label class="control-label col-md-4 col-sm-4 col-xs-4">HPV</label>
                          <div class="col-md-8 col-sm-8 col-xs-8">
                            <input type="text" class="form-control" placeholder="Default Input">
                          </div>
                        </div>
                        <div class="form-group col-md-4">
                          <label class="control-label col-md-4 col-sm-4 col-xs-4">No. of diagnosis</label>
                          <div class="col-md-8 col-sm-8 col-xs-8">
                            <input type="text" class="form-control" placeholder="Default Input">
                          </div>
                        </div>
                        <div class="form-group col-md-4">
                          <label class="control-label col-md-4 col-sm-4 col-xs-4">Time since 1st diagnosis</label>
                          <div class="col-md-8 col-sm-8 col-xs-8">
                            <input type="text" class="form-control" placeholder="Default Input">
                          </div>
                        </div>                        
                      </div>

                      <div class="row">
                        <div class="form-group col-md-4">
                          <label class="control-label col-md-4 col-sm-4 col-xs-4">Time since last diagnosis</label>
                          <div class="col-md-8 col-sm-8 col-xs-8">
                            <input type="text" class="form-control" placeholder="Default Input">
                          </div>
                        </div>
                        <div class="form-group col-md-4">
                          <label class="control-label col-md-4 col-sm-4 col-xs-4">Cancer</label>
                          <div class="col-md-8 col-sm-8 col-xs-8">
                            <input type="text" class="form-control" placeholder="Default Input">
                          </div>
                        </div>
                        <div class="form-group col-md-4">
                          <label class="control-label col-md-4 col-sm-4 col-xs-4">Cin</label>
                          <div class="col-md-8 col-sm-8 col-xs-8">
                            <input type="text" class="form-control" placeholder="Default Input">
                          </div>
                        </div>                        
                      </div>

                      <div class="row">
                        <div class="form-group col-md-4">
                          <label class="control-label col-md-4 col-sm-4 col-xs-4">HPV</label>
                          <div class="col-md-8 col-sm-8 col-xs-8">
                            <input type="text" class="form-control" placeholder="Default Input">
                          </div>
                        </div>
                        <div class="form-group col-md-4">
                          <label class="control-label col-md-4 col-sm-4 col-xs-4">Dx</label>
                          <div class="col-md-8 col-sm-8 col-xs-8">
                            <input type="text" class="form-control" placeholder="Default Input">
                          </div>
                        </div>  
                        <div class="form-group col-md-4">
                          <label class="control-label col-md-4 col-sm-4 col-xs-4">Hinselmann</label>
                          <div class="col-md-8 col-sm-8 col-xs-8">
                            <input type="text" class="form-control" placeholder="Default Input">
                          </div>
                        </div>                      
                      </div>

                      <div class="row">
                        <div class="form-group col-md-4">
                          <label class="control-label col-md-4 col-sm-4 col-xs-4">Schiller</label>
                          <div class="col-md-8 col-sm-8 col-xs-8">
                            <input type="text" class="form-control" placeholder="Default Input">
                          </div>
                        </div>
                        <div class="form-group col-md-4">
                          <label class="control-label col-md-4 col-sm-4 col-xs-4">Citology</label>
                          <div class="col-md-8 col-sm-8 col-xs-8">
                            <input type="text" class="form-control" placeholder="Default Input">
                          </div>
                        </div>                                            
                      </div>
                      
                      <div class="form-group">
                        <div class="col-md-9 col-sm-9 col-xs-12 col-md-offset-5">
                          <button type="submit" class="btn btn-success">Submit</button>
                        </div>
                      </div>

                    </form>
                  </div>
                </div>
              </div>
            </div>

            <!-- Inflammation -->
            <div class="row">
              <div class="col-md-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Inflammation Form</h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                      <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                        <ul class="dropdown-menu" role="menu">
                          <li><a href="#">Settings 1</a>
                          </li>
                          <li><a href="#">Settings 2</a>
                          </li>
                        </ul>
                      </li>
                      <li><a class="close-link"><i class="fa fa-close"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>

                  <div class="x_content">
                    <br />
                    <form class="form-horizontal form-label-left input_mask">
                      <div class="row">
                        <div class="form-group col-md-4">
                          <label class="control-label col-md-4 col-sm-4 col-xs-4">Temperature</label>
                          <div class="col-md-8 col-sm-8 col-xs-8">
                            <input type="text" class="form-control" placeholder="Default Input">
                          </div>
                        </div>
                        <div class="form-group col-md-4">
                          <label class="control-label col-md-4 col-sm-4 col-xs-4">Nausea</label>
                          <div class="col-md-8 col-sm-8 col-xs-8">
                            <input type="text" class="form-control" placeholder="Default Input">
                          </div>
                        </div>
                        <div class="form-group col-md-4">
                          <label class="control-label col-md-4 col-sm-4 col-xs-4">Lumbar pain</label>
                          <div class="col-md-8 col-sm-8 col-xs-8">
                            <input type="text" class="form-control" placeholder="Default Input">
                          </div>
                        </div>
                      </div>  

                      <div class="row">
                        <div class="form-group col-md-4">
                          <label class="control-label col-md-4 col-sm-4 col-xs-4">Urine pushing</label>
                          <div class="col-md-8 col-sm-8 col-xs-8">
                            <input type="text" class="form-control" placeholder="Default Input">
                          </div>
                        </div>
                        <div class="form-group col-md-4">
                          <label class="control-label col-md-4 col-sm-4 col-xs-4">Micturition pain</label>
                          <div class="col-md-8 col-sm-8 col-xs-8">
                            <input type="text" class="form-control" placeholder="Default Input">
                          </div>
                        </div> 
                        <div class="form-group col-md-4">
                          <label class="control-label col-md-4 col-sm-4 col-xs-4">Urethral burning</label>
                          <div class="col-md-8 col-sm-8 col-xs-8">
                            <input type="text" class="form-control" placeholder="Default Input">
                          </div>
                        </div>                      
                      </div>  

                      <div class="row">
                        <div class="form-group col-md-4">
                          <label class="control-label col-md-4 col-sm-4 col-xs-4">Inflammation</label>
                          <div class="col-md-8 col-sm-8 col-xs-8">
                            <input type="text" class="form-control" placeholder="Default Input">
                          </div>
                        </div>                                                                   
                      </div>  
                      
                      <div class="form-group">
                        <div class="col-md-9 col-sm-9 col-xs-12 col-md-offset-5">
                          <button type="submit" class="btn btn-success">Submit</button>
                        </div>
                      </div>

                    </form>
                  </div>
                </div>
              </div>
            </div>

            <!-- Thoraric cancer -->
            <div class="row">
              <div class="col-md-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Thoraric Cancer Form</h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                      <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                        <ul class="dropdown-menu" role="menu">
                          <li><a href="#">Settings 1</a>
                          </li>
                          <li><a href="#">Settings 2</a>
                          </li>
                        </ul>
                      </li>
                      <li><a class="close-link"><i class="fa fa-close"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>

                  <div class="x_content">
                    <br />
                    <form class="form-horizontal form-label-left input_mask">
                      <div class="row">
                        <div class="form-group col-md-4">
                          <label class="control-label col-md-4 col-sm-4 col-xs-4">Diagnosis</label>
                          <div class="col-md-8 col-sm-8 col-xs-8">
                            <input type="text" class="form-control" placeholder="Default Input">
                          </div>
                        </div>
                        <div class="form-group col-md-4">
                          <label class="control-label col-md-4 col-sm-4 col-xs-4">Forced vital capacity</label>
                          <div class="col-md-8 col-sm-8 col-xs-8">
                            <input type="text" class="form-control" placeholder="Default Input">
                          </div>
                        </div>
                        <div class="form-group col-md-4">
                          <label class="control-label col-md-4 col-sm-4 col-xs-4">FEV1</label>
                          <div class="col-md-8 col-sm-8 col-xs-8">
                            <input type="text" class="form-control" placeholder="Default Input">
                          </div>
                        </div>
                      </div>  

                      <div class="row">
                        <div class="form-group col-md-4">
                          <label class="control-label col-md-4 col-sm-4 col-xs-4">Performance status</label>
                          <div class="col-md-8 col-sm-8 col-xs-8">
                            <input type="text" class="form-control" placeholder="Default Input">
                          </div>
                        </div>
                        <div class="form-group col-md-4">
                          <label class="control-label col-md-4 col-sm-4 col-xs-4">Pain before surgery</label>
                          <div class="col-md-8 col-sm-8 col-xs-8">
                            <input type="text" class="form-control" placeholder="Default Input">
                          </div>
                        </div> 
                        <div class="form-group col-md-4">
                          <label class="control-label col-md-4 col-sm-4 col-xs-4">Haemoptysis before surgery</label>
                          <div class="col-md-8 col-sm-8 col-xs-8">
                            <input type="text" class="form-control" placeholder="Default Input">
                          </div>
                        </div>                      
                      </div>  

                      <div class="row">
                        <div class="form-group col-md-4">
                          <label class="control-label col-md-4 col-sm-4 col-xs-4">Dyspnoea before surgery</label>
                          <div class="col-md-8 col-sm-8 col-xs-8">
                            <input type="text" class="form-control" placeholder="Default Input">
                          </div>
                        </div>   
                        <div class="form-group col-md-4">
                          <label class="control-label col-md-4 col-sm-4 col-xs-4">Cough before surgery</label>
                          <div class="col-md-8 col-sm-8 col-xs-8">
                            <input type="text" class="form-control" placeholder="Default Input">
                          </div>
                        </div>
                        <div class="form-group col-md-4">
                          <label class="control-label col-md-4 col-sm-4 col-xs-4">Weakness before surgery</label>
                          <div class="col-md-8 col-sm-8 col-xs-8">
                            <input type="text" class="form-control" placeholder="Default Input">
                          </div>
                        </div>                                                                
                      </div>  
                      
                      <div class="row">
                        <div class="form-group col-md-4">
                          <label class="control-label col-md-4 col-sm-4 col-xs-4">Size of tumor</label>
                          <div class="col-md-8 col-sm-8 col-xs-8">
                            <input type="text" class="form-control" placeholder="Default Input">
                          </div>
                        </div>   
                        <div class="form-group col-md-4">
                          <label class="control-label col-md-4 col-sm-4 col-xs-4">Diabetes mellitus</label>
                          <div class="col-md-8 col-sm-8 col-xs-8">
                            <input type="text" class="form-control" placeholder="Default Input">
                          </div>
                        </div>
                        <div class="form-group col-md-4">
                          <label class="control-label col-md-4 col-sm-4 col-xs-4">MI up to 6 months</label>
                          <div class="col-md-8 col-sm-8 col-xs-8">
                            <input type="text" class="form-control" placeholder="Default Input">
                          </div>
                        </div>                                                                
                      </div>  

                      <div class="row">
                        <div class="form-group col-md-4">
                          <label class="control-label col-md-4 col-sm-4 col-xs-4">PAD</label>
                          <div class="col-md-8 col-sm-8 col-xs-8">
                            <input type="text" class="form-control" placeholder="Default Input">
                          </div>
                        </div>   
                        <div class="form-group col-md-4">
                          <label class="control-label col-md-4 col-sm-4 col-xs-4">Smoking</label>
                          <div class="col-md-8 col-sm-8 col-xs-8">
                            <input type="text" class="form-control" placeholder="Default Input">
                          </div>
                        </div>
                        <div class="form-group col-md-4">
                          <label class="control-label col-md-4 col-sm-4 col-xs-4">Asthma</label>
                          <div class="col-md-8 col-sm-8 col-xs-8">
                            <input type="text" class="form-control" placeholder="Default Input">
                          </div>
                        </div>                                                                
                      </div>  

                      <div class="row">
                        <div class="form-group col-md-4">
                          <label class="control-label col-md-4 col-sm-4 col-xs-4">Age at surgery</label>
                          <div class="col-md-8 col-sm-8 col-xs-8">
                            <input type="text" class="form-control" placeholder="Default Input">
                          </div>
                        </div>                                                                
                      </div>  

                      <div class="form-group">
                        <div class="col-md-9 col-sm-9 col-xs-12 col-md-offset-5">
                          <button type="submit" class="btn btn-success">Submit</button>
                        </div>
                      </div>

                    </form>
                  </div>
                </div>
              </div>
            </div>

            <!-- Heart -->
            <div class="row">
              <div class="col-md-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Heart Disease Form</h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                      <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                        <ul class="dropdown-menu" role="menu">
                          <li><a href="#">Settings 1</a>
                          </li>
                          <li><a href="#">Settings 2</a>
                          </li>
                        </ul>
                      </li>
                      <li><a class="close-link"><i class="fa fa-close"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>

                  <div class="x_content">
                    <br />
                    <form class="form-horizontal form-label-left input_mask">
                      <div class="row">
                        <div class="form-group col-md-4">
                          <label class="control-label col-md-4 col-sm-4 col-xs-4">Age</label>
                          <div class="col-md-8 col-sm-8 col-xs-8">
                            <input type="text" class="form-control" placeholder="Default Input">
                          </div>
                        </div>
                        <div class="form-group col-md-4">
                          <label class="control-label col-md-4 col-sm-4 col-xs-4">Sex</label>
                          <div class="col-md-8 col-sm-8 col-xs-8">
                            <input type="text" class="form-control" placeholder="Default Input">
                          </div>
                        </div>
                        <div class="form-group col-md-4">
                          <label class="control-label col-md-4 col-sm-4 col-xs-4">Chest</label>
                          <div class="col-md-8 col-sm-8 col-xs-8">
                            <input type="text" class="form-control" placeholder="Default Input">
                          </div>
                        </div>
                      </div>  

                      <div class="row">
                        <div class="form-group col-md-4">
                          <label class="control-label col-md-4 col-sm-4 col-xs-4">Chest pain type</label>
                          <div class="col-md-8 col-sm-8 col-xs-8">
                            <input type="text" class="form-control" placeholder="Default Input">
                          </div>
                        </div>
                        <div class="form-group col-md-4">
                          <label class="control-label col-md-4 col-sm-4 col-xs-4">Blood pressure</label>
                          <div class="col-md-8 col-sm-8 col-xs-8">
                            <input type="text" class="form-control" placeholder="Default Input">
                          </div>
                        </div> 
                        <div class="form-group col-md-4">
                          <label class="control-label col-md-4 col-sm-4 col-xs-4">Cholesterol</label>
                          <div class="col-md-8 col-sm-8 col-xs-8">
                            <input type="text" class="form-control" placeholder="Default Input">
                          </div>
                        </div>                      
                      </div>  

                      <div class="row">
                        <div class="form-group col-md-4">
                          <label class="control-label col-md-4 col-sm-4 col-xs-4">Blood sugar</label>
                          <div class="col-md-8 col-sm-8 col-xs-8">
                            <input type="text" class="form-control" placeholder="Default Input">
                          </div>
                        </div>   
                        <div class="form-group col-md-4">
                          <label class="control-label col-md-4 col-sm-4 col-xs-4">EC results</label>
                          <div class="col-md-8 col-sm-8 col-xs-8">
                            <input type="text" class="form-control" placeholder="Default Input">
                          </div>
                        </div>
                        <div class="form-group col-md-4">
                          <label class="control-label col-md-4 col-sm-4 col-xs-4">Max heartrate</label>
                          <div class="col-md-8 col-sm-8 col-xs-8">
                            <input type="text" class="form-control" placeholder="Default Input">
                          </div>
                        </div>                                                                
                      </div>  

                      <div class="row">
                        <div class="form-group col-md-4">
                          <label class="control-label col-md-4 col-sm-4 col-xs-4">Angina</label>
                          <div class="col-md-8 col-sm-8 col-xs-8">
                            <input type="text" class="form-control" placeholder="Default Input">
                          </div>
                        </div>   
                        <div class="form-group col-md-4">
                          <label class="control-label col-md-4 col-sm-4 col-xs-4">Old peak</label>
                          <div class="col-md-8 col-sm-8 col-xs-8">
                            <input type="text" class="form-control" placeholder="Default Input">
                          </div>
                        </div>
                        <div class="form-group col-md-4">
                          <label class="control-label col-md-4 col-sm-4 col-xs-4">Peak slope</label>
                          <div class="col-md-8 col-sm-8 col-xs-8">
                            <input type="text" class="form-control" placeholder="Default Input">
                          </div>
                        </div>                                                                
                      </div>  

                      <div class="row">
                        <div class="form-group col-md-4">
                          <label class="control-label col-md-4 col-sm-4 col-xs-4">Major vessels</label>
                          <div class="col-md-8 col-sm-8 col-xs-8">
                            <input type="text" class="form-control" placeholder="Default Input">
                          </div>
                        </div>   
                        <div class="form-group col-md-4">
                          <label class="control-label col-md-4 col-sm-4 col-xs-4">Thal</label>
                          <div class="col-md-8 col-sm-8 col-xs-8">
                            <input type="text" class="form-control" placeholder="Default Input">
                          </div>
                        </div>                                                                                     
                      </div>  
                      
                      <div class="form-group">
                        <div class="col-md-9 col-sm-9 col-xs-12 col-md-offset-5">
                          <button type="submit" class="btn btn-success">Submit</button>
                        </div>
                      </div>

                    </form>
                  </div>
                </div>
              </div>
            </div>
        </div>
        <!-- /page content -->

      </div>
    </div>

    <!-- jQuery -->
    <script src="../vendors/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap -->
    <script src="../vendors/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- FastClick -->
    <script src="../vendors/fastclick/lib/fastclick.js"></script>
    <!-- NProgress -->
    <script src="../vendors/nprogress/nprogress.js"></script>
    <!-- bootstrap-progressbar -->
    <script src="../vendors/bootstrap-progressbar/bootstrap-progressbar.min.js"></script>
    <!-- iCheck -->
    <script src="../vendors/iCheck/icheck.min.js"></script>
    <!-- bootstrap-daterangepicker -->
    <script src="../vendors/moment/min/moment.min.js"></script>
    <script src="../vendors/bootstrap-daterangepicker/daterangepicker.js"></script>
    <!-- bootstrap-datetimepicker -->    
    <script src="../vendors/bootstrap-datetimepicker/build/js/bootstrap-datetimepicker.min.js"></script>
    <!-- bootstrap-wysiwyg -->
    <script src="../vendors/bootstrap-wysiwyg/js/bootstrap-wysiwyg.min.js"></script>
    <script src="../vendors/jquery.hotkeys/jquery.hotkeys.js"></script>
    <script src="../vendors/google-code-prettify/src/prettify.js"></script>
    <!-- jQuery Tags Input -->
    <script src="../vendors/jquery.tagsinput/src/jquery.tagsinput.js"></script>
    <!-- Switchery -->
    <script src="../vendors/switchery/dist/switchery.min.js"></script>
    <!-- Select2 -->
    <script src="../vendors/select2/dist/js/select2.full.min.js"></script>
    <!-- Parsley -->
    <script src="../vendors/parsleyjs/dist/parsley.min.js"></script>
    <!-- Autosize -->
    <script src="../vendors/autosize/dist/autosize.min.js"></script>
    <!-- jQuery autocomplete -->
    <script src="../vendors/devbridge-autocomplete/dist/jquery.autocomplete.min.js"></script>
    <!-- starrr -->
    <script src="../vendors/starrr/dist/starrr.js"></script>
    <!-- Custom Theme Scripts -->
    <script src="../build/js/custom.min.js"></script>
    <script>
    $('#myDatepicker').datetimepicker();
    
    $('#myDatepicker2').datetimepicker({
        format: 'DD.MM.YYYY'
    });
    
    $('#myDatepicker3').datetimepicker({
        format: 'hh:mm A'
    });
    
    $('#myDatepicker4').datetimepicker({
        ignoreReadonly: true,
        allowInputToggle: true
    });

    $('#datetimepicker6').datetimepicker();
    
    $('#datetimepicker7').datetimepicker({
        useCurrent: false
    });
    
    $("#datetimepicker6").on("dp.change", function(e) {
        $('#datetimepicker7').data("DateTimePicker").minDate(e.date);
    });
    
    $("#datetimepicker7").on("dp.change", function(e) {
        $('#datetimepicker6').data("DateTimePicker").maxDate(e.date);
    });
</script>
  </body>
</html>
