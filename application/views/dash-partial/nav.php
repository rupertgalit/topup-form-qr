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
        <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#"><i class="fa fa-user fa-fw"></i><i class="fa fa-caret-down"></i></a>
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
             <!-- <li><a href="dashboard"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a></li> -->
            

            <?php if ( $this->session->userdata('user_type') == 'ACCOUNTING' ) {  
                echo ' <li><a href="transactions"><i class="fa fa-exchange fa-fw"></i> Transactions</a></li>           
                <li><a href="transaction-summary"><i class="fa fa-list fa-fw"></i>Transaction Summary</a></li>';          
            } 
            elseif($this->session->userdata('user_type') == 'TECH' ) {

              echo '<li><a href="upload"><i class="fa fa-upload fa-fw"></i> Upload Data</a></li>';
            } 
            else{

              echo ' <li><a href="transactions"><i class="fa fa-exchange fa-fw"></i> Transactions</a></li>           
                <li><a href="transaction-summary"><i class="fa fa-list fa-fw"></i>Transaction Summary</a></li>
                <li><a href="upload"><i class="fa fa-upload fa-fw"></i> Upload Data</a></li>';

            }
            
            
            ?>
            


            <!-- /.sidebar-collapse-->
        </div>
        <!-- /.navbar-static-side-->
    </nav>