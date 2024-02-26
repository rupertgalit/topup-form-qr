<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link rel="shortcut icon" href="<?= base_url("assets/images/updated_logo.png"); ?>">
   <title>Iselco Dashboard</title>
   <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
   <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/metisMenu/2.2.0/metisMenu.min.css">
   <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/timelinejs/2.36.0/css/timeline.css">
   <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.css">
   <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css">
   <link rel="stylesheet" href="<?= base_url("/assets/css/dashboard.css"); ?>">
</head>

<body>

   <div class="loader-wrapper">
      <div class="loader"></div>
   </div>
   <div id="wrapper">
      <!-- Navigation-->
      <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
         <div class="navbar-header">
            <button class="navbar-toggle" type="button" data-toggle="collapse" data-target=".navbar-collapse">
               <span class="sr-only">Toggle navigation</span>
               <span class="icon-bar"></span>
               <span class="icon-bar"></span>
               <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="https://iselco2.com.ph/" target="_blank">
               <img src="<?= base_url("assets/images/updated_logo.png"); ?>" alt="Iselco Logo" style="width: 25px; height: 25px; display: inline-block; vertical-align: middle;">
               <span style="display: inline-block; vertical-align: middle;">ISELCO II</span>
            </a>
         </div>
         <!-- /.navbar-header-->
         <ul class="nav navbar-top-links navbar-right">
            <!-- /.dropdown-->
            <li class="dropdown">
               <a class="dropdown-toggle" data-toggle="dropdown" href="#"><i class="fa fa-user fa-fw"></i><i class="fa fa-caret-down"></i></a>
               <ul class="dropdown-menu dropdown-user">
                  <li><a href="#"><i class="fa fa-user fa-fw"></i> User Profile</a></li>
                  <li><a href="#"><i class="fa fa-gear fa-fw"></i> Settings</a></li>
                  <li class="divider"></li>
                  <li><a href="<?= base_url('auth/logout') ?>"><i class="fa fa-sign-out fa-fw"></i> Logout</a></li>
               </ul>
               <!-- /.dropdown-user-->
            </li>
            <!-- /.dropdown-->
         </ul>
         <!-- /.navbar-top-links-->
         <div class="navbar-default sidebar" role="navigation">
            <div class="sidebar-nav navbar-collapse">
               <ul class="nav" id="side-menu">
                  <!-- <li class="sidebar-search">
                     <div class="input-group custom-search-form">
                       <input class="form-control" type="text" placeholder="Search..."/><span class="input-group-btn">
                         <button class="btn btn-default" type="button"><i class="fa fa-search"></i></button></span>
                     </div> -->
                  <!-- /input-group-->
                  </li>
                  <li><a href="dashboard"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a></li>
                  <li><a href="transactions"><i class="fa fa-exchange fa-fw"></i> Transactions</a></li>
                  <li><a href="upload"><i class="fa fa-upload fa-fw"></i> Upload Data</a></li>
                  <li><a href="transaction-summary"><i class="fa fa-list fa-fw"></i>Transaction Summary</a></li>
                  <!-- <li><a href="#"><i class="fa fa-bar-chart-o fa-fw"></i> Data Table<span class="fa arrow"></span></a>
                     <ul class="nav nav-second-level">
                       <li><a href="flot.html">Flot Charts</a></li>
                       <li><a href="morris.html">Morris.js Charts</a></li>
                     </ul>
                     
                     </li>
                     -->
                  <!-- /.sidebar-collapse-->
            </div>
            <!-- /.navbar-static-side-->
      </nav>
      <div id="page-wrapper">
         <div class="row">
            <div class="col-lg-12">
               <div class="welcome-message">
                  <p>Welcome, administrator!</p>
               </div>
               <h1 class="page-header">Dashboard</h1>
            </div>
         </div>
         <div class='dashboard-card__container'>
            <div class='dashboard-card'>
               <div class="dashboard-card__icon">
                  <i class='fa fa-file-text-o fa-3x'></i>
               </div>
               <h2 class='dashboard-card__title'>
                  Terms
               </h2>
               <p class='dashboard-card__detail'>
                  EOMNet30
               </p>
            </div>

            <div class='dashboard-card'>
               <div class="dashboard-card__icon">
                  <i class='fa fa-credit-card fa-3x'></i>
               </div>
               <h2 class='dashboard-card__title'>
                  Credit Limit
               </h2>
               <p class='dashboard-card__detail'>
                  $450,000.00
               </p>
            </div>

            <div class='dashboard-card'>
               <div class="dashboard-card__icon">
                  <i class='fa fa-money fa-3x'></i>
               </div>
               <h2 class='dashboard-card__title'>
                  Credit Limit Spent
               </h2>
               <p class='dashboard-card__detail'>
                  $20,000.00
               </p>
            </div>

            <div class='dashboard-card'>
               <div class="dashboard-card__icon">
                  <i class='fa fa-credit-card fa-3x'></i>
               </div>
               <h2 class='dashboard-card__title'>
                  Payment
               </h2>
               <p class='dashboard-card__detail'>
                  Test Account
               </p>
            </div>
         </div>



         <div class="row">
            <div class="col-lg-6">
               <div class="panel panel-default">
                  <div class="panel-heading">
                     Area Chart Example
                  </div>
                  <div class="panel-body">
                     <div id="morris-area-chart"></div>
                  </div>
               </div>
            </div>
            <div class="col-lg-6">
               <div class="panel panel-default">
                  <div class="panel-heading">
                     Bar Chart Example
                  </div>
                  <div class="panel-body">
                     <div id="morris-bar-chart"></div>
                  </div>
               </div>
            </div>
            <div class="col-lg-6">
               <div class="panel panel-default">
                  <div class="panel-heading">
                     Line Chart Example
                  </div>
                  <div class="panel-body">
                     <div id="morris-line-chart"></div>
                  </div>
               </div>
            </div>



            <div class="col-lg-6">
               <div class="panel panel-default">
                  <div class="panel-heading">
                     Donut Chart Example
                  </div>
                  <div class="panel-body">
                     <div id="morris-donut-chart"></div>
                  </div>
               </div>
            </div>
         </div>

      </div>
   </div>
   </div>
   </div>
   </div>
   <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
   <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
   <script src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.4/raphael-min.js"></script>
   <script src="//cdnjs.cloudflare.com/ajax/libs/metisMenu/2.2.0/metisMenu.min.js"></script>
   <script src="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.min.js"></script>
   <script src="//cdnjs.cloudflare.com/ajax/libs/timelinejs/2.36.0/js/timeline-min.js"></script>
   <script src="<?= base_url("/assets/js/dashboard.js"); ?>"></script>
   <script src="<?= base_url("/assets/js/datatables.js"); ?>"></script>
   <script src="<?= base_url("/assets/js/table.js"); ?>"></script>
</body>

</html>