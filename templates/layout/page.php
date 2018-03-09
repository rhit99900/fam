<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php echo $title . (isset($page_title) ? " : $page_title" : '') ?></title>

	<link href="<?php echo $config['site_url'] ?>css/style.css" rel="stylesheet" type="text/css" />
	<!-- <link href="<?php echo $config['site_url'] ?>images/silk_theme.css" rel="stylesheet" type="text/css" /> -->
	<link href="<?php echo $config['site_url'] ?>bower_components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
	<link href="<?php echo $config['site_url'] ?>bower_components/bootstrap/dist/css/bootstrap-theme.min.css" rel="stylesheet">
	<link href="<?php echo $config['site_home'] ?>css/style.css" rel="stylesheet" type="text/css" />

	<link href="<?php echo $config['site_home'] ?>css/library/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <link href="<?php echo $config['site_home'] ?>css/library/nprogress.css" rel="stylesheet">
    <link href="<?php echo $config['site_home'] ?>css/library/flat/green.css" rel="stylesheet">
    <link href="<?php echo $config['site_home'] ?>css/library/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet">
    <link href="<?php echo $config['site_home'] ?>css/library/jqvmap.min.css" rel="stylesheet"/>
    <link href="<?php echo $config['site_home'] ?>css/library/daterangepicker.css" rel="stylesheet">
    <link href="<?php echo $config['site_home'] ?>css/library/custom.min.css" rel="stylesheet">

    <!--Autofill functionality  -->
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <link rel="stylesheet" href="<?php echo $config['site_home'] ?>/css/layout.css">
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
  </head>


  <body class="nav-md">

    <div class="container body">
      <div class="main_container">
        <div class="col-md-3 left_col">
          <div class="left_col scroll-view">

            <div class="navbar nav_title" style="border: 0;">
              <a href="index.php" class="site_title"><span><small>Applicant Management</small></span></a>
            </div>

            <div class="clearfix"></div>

            <!-- menu profile quick info -->
            <div class="profile clearfix">
              <div class="profile_info">
                <span>Welcome,</span>
                <h2><?php echo $user['name'] ?></h2>
              </div>
            </div>
            <!-- /menu profile quick info -->
            <br />

            <!-- sidebar menu -->
            <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
              <div class="menu_section">
                <br>
                <h3>Navigation Panel</h3>
                <ul class="nav side-menu">
                  <li><a><i class="fa fa-home"></i> Succession Reports <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="index.php">National Report</a></li>
                      <li><a href="city_reports.php">City Reports</a></li>
                      <li><a href="requirements.php">Requirements</a></li>
                    </ul>
                  </li>
                  <li><a><i class="fa fa-table"></i> Dashboards <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="volunteer_data_dashboard.php">Volunteer Data</a></li>
                      <li><a href="evaluation_dashboard.php">Evaluation Dashboard</a></li>
                   </ul>
                  </li>
                  <li><a><i class="fa fa-edit"></i> Evaluation Forms <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="form_kindness_challenge.php">Kindness Challenge</a></li>
                      <li><a href="form_common_task.php">Common Task</a></li>
                      <li><a>Vertical Task<span class="fa fa-chevron-down"></span></a>
                          <ul class="nav child_menu">
                            <li class="sub_menu"><a href="form_city_team_lead.php">City Team Lead</a></li>
                            <li><a href="form_ed_support.php">Ed Support</a></li>
                            <li><a href="form__transition_readiness_and_aftercare.php">Transition Readiness and Aftercare</a></li>
                            <li><a href="form_fundraiisng.php">Fundraising</a></li>
                            <li><a href="form_human_capital.php">Human Capital</a></li>
                            <li><a href="form_finance.php">Finance</a></li>
                            <li><a href="form_shelter_operations.php">Shelter Operations</a></li>
                            <li><a href="form_shelter_operations.php">Shelter Support</a></li>
                            <li><a href="form_ed_mentor.php">Mentor</a></li>
                            <li><a href="form_wingman.php">Wingman</a></li>
                          </ul>
                        </li>
                      <li><a href="form_background_check.php">Background Check</a></li>
                      <li><a href="form_personal_interveiw.php">Personal Interview</a></li>
                    </ul>
                  </li>
                </ul>
              </div>

            </div>
            <!-- /sidebar menu -->

          </div>
        </div>


        <!-- top navigation -->
        <div class="top_nav">
          <div class="nav_menu">
            <nav>
              <div class="nav toggle">
                <a id="menu_toggle"><i class="fa fa-bars"></i></a>
              </div>
            </nav>
          </div>
        </div>
        <!-- /top navigation -->

<!-- page content -->
        <div class="right_col" role="main">

<?php include($GLOBALS['template']->template); ?>

</div>

        <!-- footer content -->
        <footer>
          <div class="pull-right">
            Gentelella - Bootstrap Admin Template by <a href="https://colorlib.com">Colorlib</a>
          </div>
          <div class="clearfix"></div>
        </footer>
        <!-- /footer content -->
      </div>
    </div>

    <script src="<?php echo $config['site_home'] ?>/js/library/jquery.min.js"></script>
    <script src="<?php echo $config['site_home'] ?>/js/library/bootstrap.min.js"></script>
    <script src="<?php echo $config['site_home'] ?>/js/library/fastclick.js"></script>
    <script src="<?php echo $config['site_home'] ?>/js/library/nprogress.js"></script>
    <script src="<?php echo $config['site_home'] ?>/js/library/Chart.min.js"></script>
    <script src="<?php echo $config['site_home'] ?>/js/library/gauge.min.js"></script>
    <script src="<?php echo $config['site_home'] ?>/js/library/bootstrap-progressbar.min.js"></script>
    <script src="<?php echo $config['site_home'] ?>/js/library/icheck.min.js"></script>
    <script src="<?php echo $config['site_home'] ?>/js/library/skycons.js"></script>
    <script src="<?php echo $config['site_home'] ?>/js/library/jquery.flot.js"></script>
    <script src="<?php echo $config['site_home'] ?>/js/library/jquery.flot.pie.js"></script>
    <script src="<?php echo $config['site_home'] ?>/js/library/jquery.flot.time.js"></script>
    <script src="<?php echo $config['site_home'] ?>/js/library/jquery.flot.stack.js"></script>
    <script src="<?php echo $config['site_home'] ?>/js/library/jquery.flot.resize.js"></script>
    <script src="<?php echo $config['site_home'] ?>/js/library/jquery.flot.orderBars.js"></script>
    <script src="<?php echo $config['site_home'] ?>/js/library/jquery.flot.spline.min.js"></script>
    <script src="<?php echo $config['site_home'] ?>/js/library/curvedLines.js"></script>
    <script src="<?php echo $config['site_home'] ?>/js/library/date.js"></script>
    <script src="<?php echo $config['site_home'] ?>/js/library/jquery.vmap.js"></script>
    <script src="<?php echo $config['site_home'] ?>/js/library/jquery.vmap.world.js"></script>
    <script src="<?php echo $config['site_home'] ?>/js/library/jquery.vmap.sampledata.js"></script>
    <script src="<?php echo $config['site_home'] ?>/js/library/moment.min.js"></script>
    <script src="<?php echo $config['site_home'] ?>/js/library/daterangepicker.js"></script>
    <script src="<?php echo $config['site_home'] ?>/js/library/jquery.inputmask.bundle.min.js"></script>
    <script src="<?php echo $config['site_home'] ?>/js/library/jquery.knob.min.js"></script>
    <script src="<?php echo $config['site_home'] ?>/js/library/custom.min.js"></script>
<!-- <script src="<?php echo $config['site_url'] ?>bower_components/jquery/dist/jquery.min.js" type="text/javascript"></script>
<script src="<?php echo $config['site_url'] ?>bower_components/bootstrap/dist/js/bootstrap.min.js"></script> -->
	<script src="<?php echo $config['site_home'] ?>js/application.js" type="text/javascript"></script>
	<?php echo $js_includes; ?>

  </body>
</html>