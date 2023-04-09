<?php 
  $res = $this->API_m->singleRecord('users',['user_id'=>$this->session->userdata('user')['user_id']]);
 // echo $res->user_id;
 // echo $res->user_fullname;
 // die();
  $adminData = $this->API_m->singleRecord("settings",['company_id'=>2]);
?>

<div class="wrapper" style="background-color: #fff;">

  <header class="main-header" >

    <!-- Logo -->
    <!-- <a href="<php echo base_url('Job/index');?>" class="logo">
      <span class="logo-mini"><b></b><php if(!empty($adminData->company_name)){ echo substr($adminData->company_name,0,3); } ?></span>
      <span class="logo-lg"><b><php if(!empty($adminData->company_name)){ echo $adminData->company_name; } ?></b></span>
    </a> -->

    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-full navbar-static-top" style="width:100%; margin-left:0px !important;">
      <!-- Sidebar toggle button-->
        <!-- <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
            <span class="sr-only">Toggle navigation</span>
        </a> -->
      <!-- Navbar Right Menu -->
      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <!-- Messages: style can be found in dropdown.less-->
          <li class="dropdown messages-menu">
          <!--   <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <i class="fa fa-envelope-o"></i>
              <span class="label label-success">4</span>
            </a> -->
            <!----statr 1--------------->
            <!-- <ul class="dropdown-menu">
              <li class="header">You have 4 messages</li>
              <li>
              
                <ul class="menu">
                  <li>
                    <a href="#">
                      <div class="pull-left">
                        <img src="<?php //echo base_url('back_asset/dist/img/user2-160x160.jpg');?>" class="img-circle" alt="User Image">
                      </div>
                      <h4>
                        Support Team
                        <small><i class="fa fa-clock-o"></i> 5 mins</small>
                      </h4>
                      <p>Why not buy a new awesome theme?</p>
                    </a>
                  </li>
                  
                  <li>
                    <a href="#">
                      <div class="pull-left">
                        <img src="<?php //echo base_url('back_asset/dist/img/imgempty.png');?>" class="img-circle" alt="User Image">
                      </div>
                      <h4>
                        AdminLTE Design Team
                        <small><i class="fa fa-clock-o"></i> 2 hours</small>
                      </h4>
                      <p>Why not buy a new awesome theme?</p>
                    </a>
                  </li>
                  <li>
                    <a href="#">
                      <div class="pull-left">
                        <img src="<?php //echo base_url('back_asset/dist/img/imgempty.png');?>" class="img-circle" alt="User Image">
                      </div>
                      <h4>
                        Developers
                        <small><i class="fa fa-clock-o"></i> Today</small>
                      </h4>
                      <p>Why not buy a new awesome theme?</p>
                    </a>
                  </li>
                  <li>
                    <a href="#">
                      <div class="pull-left">
                        <?php
                          //if(empty($res->user_img))
                          {
                        ?>
                            <img src="<?php// echo base_url('back_asset/dist/img/imgempty.png');?>" class="img-circle" alt="User Image"> 

                        <?php
                          }
                          //else
                          {
                         ?> 
                             <img src="<?php// echo base_url('uploads/'.$res->user_img)?>" class="img-circle" alt="User Image">  
                        <?php
                          } 
                        ?>
                      
                      </div>
                      <h4>
                        Sales Department
                        <small><i class="fa fa-clock-o"></i> Yesterday</small>
                      </h4>
                      <p>Why not buy a new awesome theme?</p>
                    </a>
                  </li>
                  <li>
                    <a href="#">
                      <div class="pull-left">
                        <img src="<?php// echo base_url('back_asset/dist/img/imgempty.png');?>" class="img-circle" alt="User Image">
                      </div>
                      <h4>
                        Reviewers
                        <small><i class="fa fa-clock-o"></i> 2 days</small>
                      </h4>
                      <p>Why not buy a new awesome theme?</p>
                    </a>
                  </li>
                </ul>
              </li>
              <li class="footer"><a href="#">See All Messages</a></li>
            </ul> -->






            <!---------end 1-------->
          </li>

          
          <!-- Notifications: style can be found in dropdown.less -->
          <li class="dropdown notifications-menu">
         <!--    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <i class="fa fa-bell-o"></i>
              <span class="label label-warning">10</span>
            </a> -->
            <ul class="dropdown-menu">
              <li class="header">You have 10 notifications</li>
              <li>
                <!-- inner menu: contains the actual data -->
                <ul class="menu">
                  <li>
                    <a href="#">
                      <i class="fa fa-users text-aqua"></i> 5 new members joined today
                    </a>
                  </li>
                  <li>
                    <a href="#">
                      <i class="fa fa-warning text-yellow"></i> Very long description here that may not fit into the
                      page and may cause design problems
                    </a>
                  </li>
                  <li>
                    <a href="#">
                      <i class="fa fa-users text-red"></i> 5 new members joined
                    </a>
                  </li>
                  <li>
                    <a href="#">
                      <i class="fa fa-shopping-cart text-green"></i> 25 sales made
                    </a>
                  </li>
                  <li>
                    <a href="#">
                      <i class="fa fa-user text-red"></i> You changed your username
                    </a>
                  </li>
                </ul>
              </li>
              <li class="footer"><a href="#">View all</a></li>
            </ul>
          </li>
          <!-- Tasks: style can be found in dropdown.less -->
          <li class="dropdown tasks-menu">
          <!--   <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <i class="fa fa-flag-o"></i>
              <span class="label label-danger">9</span>
            </a> -->
            <ul class="dropdown-menu">
              <li class="header">You have 9 tasks</li>
              <li>
                <!-- inner menu: contains the actual data -->
                <ul class="menu">
                  <li><!-- Task item -->
                    <a href="#">
                      <h3>
                        Design some buttons
                        <small class="pull-right">20%</small>
                      </h3>
                      <div class="progress xs">
                        <div class="progress-bar progress-bar-aqua" style="width: 20%" role="progressbar"
                             aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
                          <span class="sr-only">20% Complete</span>
                        </div>
                      </div>
                    </a>
                  </li>
                  <!-- end task item -->
                  <li><!-- Task item -->
                    <a href="#">
                      <h3>
                        Create a nice theme
                        <small class="pull-right">40%</small>
                      </h3>
                      <div class="progress xs">
                        <div class="progress-bar progress-bar-green" style="width: 40%" role="progressbar"
                             aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
                          <span class="sr-only">40% Complete</span>
                        </div>
                      </div>
                    </a>
                  </li>
                  <!-- end task item -->
                  <li><!-- Task item -->
                    <a href="#">
                      <h3>
                        Some task I need to do
                        <small class="pull-right">60%</small>
                      </h3>
                      <div class="progress xs">
                        <div class="progress-bar progress-bar-red" style="width: 60%" role="progressbar"
                             aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
                          <span class="sr-only">60% Complete</span>
                        </div>
                      </div>
                    </a>
                  </li>
                  <!-- end task item -->
                  <li><!-- Task item -->
                    <a href="#">
                      <h3>
                        Make beautiful transitions
                        <small class="pull-right">80%</small>
                      </h3>
                      <div class="progress xs">
                        <div class="progress-bar progress-bar-yellow" style="width: 80%" role="progressbar"
                             aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
                          <span class="sr-only">80% Complete</span>
                        </div>
                      </div>
                    </a>
                  </li>
                  <!-- end task item -->
                </ul>
              </li>
              <li class="footer">
                <a href="#">View all tasks</a>
              </li>
            </ul>
          </li>
          <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
               <?php
                if(empty($res->user_img))
                {
              ?>
                  <img src="<?php echo base_url('back_asset/dist/img/imgempty.png');?>" style="width: 50px; height: 50px;" class="img-circle" alt="User Image"> 
                  
              <?php
                }
                else
                { 
               ?> 
                 <img src="<?php echo base_url('uploads/'.$res->user_img);?>" class="user-image" alt="User Image">
              <?php
                } 
              ?>

              <span class="hidden-xs"><?php if(!empty($res->user_fullname)){ echo  $res->user_fullname; } ?></span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                     <?php
                          if(empty($res->user_img))
                          {
                        ?>
                            <img src="<?php echo base_url('back_asset/dist/img/imgempty.png');?>" class="img-circle" alt="User Image"> 
                            
                        <?php
                          }
                          else
                          {
                         ?> 
                             <img src="<?php echo base_url('uploads/'.$res->user_img);?>" class="img-circle" alt="User Image">  
                        <?php
                          } 
                        ?>

                <p>
                  <?= $this->session->userdata('user')['username']; ?> - 
                   <?php
                      if($this->session->userdata('user')['role']==1)
                       {
                         echo "Admin";
                       }
                      elseif ($this->session->userdata('user')['role']==2) 
                       {
                         echo "Staff";
                       }
                       elseif ($this->session->userdata('user')['role']==3) 
                       {
                         echo "Applicant";
                       }
                       elseif ($this->session->userdata('user')['role']==4) 
                       {
                         echo "Organization";
                       }
                    ?>
                  <small>Member since <?= date('d M Y',strtotime($res->user_created_date)); ?></small>
                </p>
              </li>
              <!-- Menu Body -->
              <li class="user-body">
                <div class="row">
                  <div class="col-xs-4 text-center">
                    <a href="#"></a>
                  </div>
                  <div class="col-xs-4 text-center">
                    <a href="#"></a>
                  </div>
                  <div class="col-xs-4 text-center">
                    <a href="#"></a>
                  </div>
                </div>
                <!-- /.row -->
              </li>
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-left">
                  <a href="<?php echo base_url('Customer/portal'); ?>" class="btn btn-default btn-flat">Profile</a>
                </div>
                <div class="pull-right">
                  <a href="<?php echo base_url('Customer/logout');?>" class="btn btn-default btn-flat">Sign out</a>
                </div>
              </li>
            </ul>
          </li>
          <!-- Control Sidebar Toggle Button -->
          <li>
            <!-- <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a> -->
          </li>
        </ul>
      </div>

    </nav>
  </header>