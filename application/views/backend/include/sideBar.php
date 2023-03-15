<?php
$totalOrg         = $this->db->where('org_is_trash',0)->count_all_results('organization');
$totalPrj         = $this->db->count_all_results('projects');
$totaluser        = $this->db->where('user_is_trash',0)->count_all_results('users');
$totalcon         = $this->db->where('con_is_trash',0)->count_all_results('contact');
$totalabt         = $this->db->where('abt_is_trash',0)->count_all_results('about');
$totalstf         = $this->db->where('stf_is_trash',0)->count_all_results('staff_msgs');
$totalApplicants  = $this->db->where('app_is_trash',0)->count_all_results('applicants');
$totalcntMsgs     = $this->db->count_all_results('contact_msgs');

$ci  = $this->uri->segment(1);
$mtd = $this->uri->segment(2);


  $res = $this->API_m->singleRecord('users',['user_id'=>$this->session->userdata('user')['user_id']]);
  
?>

  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          
             <?php
               if(!$res->user_img)
               {
             ?>
              <img src="<?php echo base_url('back_asset/dist/img/imgempty.png');?>" class="img-circle" alt="User Image"> 
            <?php
               }
              else
               {
               ?> 
               <img src="<?php echo base_url('uploads/'.$res->user_img)?>" class="img-circle" alt="User Image">  
              <?php
               } 
               ?>
        </div>
        <div class="pull-left info">
          <p><?php if(!empty($res->user_fullname)){ echo  $res->user_fullname; } ?></p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
      <!-- search form -->
      <form action="<?= base_url('MainContent/findSearch'); ?>" method="post" class="sidebar-form">
        <div class="input-group">
          <input type="text" name="prj_name" class="form-control" placeholder="Search..." autocomplete="off" value="" required>
          <span class="input-group-btn">
                <button type="submit"  id="search-btn" class="btn btn-flat">
                  <i class="fa fa-search"></i>
                </button>
              </span>
        </div>
      </form>
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">MAIN NAVIGATION</li>
        <li class="<?php if($ci=='MainContent' && $mtd=='index'){ echo 'active'; } ?>">
          <a href="<?php echo base_url('MainContent/index');?>">
            <i class="fa fa-dashboard"></i> <span>Dashboard</span>
            <span class="pull-right-container">
              <!-- <i class="fa fa-angle-left pull-right"></i> -->
            </span>
          </a>
        
        </li>
        <li class="<?php if($mtd=='orgListView'){ echo 'active'; } ?>">
          <a href="<?php echo base_url('cms_ci/orgListView'); ?>">
            <i class="fa fa-calendar"></i> <span>Organization List</span>
            <span class="pull-right-container">
              <small class="label pull-right bg-red"><?= $totalOrg; ?></small>
              
            </span>
          </a>
        </li>
        <li class="treeview <?php if($ci=='MainContent' && $mtd=='projectAddView' || $mtd=='projectList_View' || $mtd=='updateProjectView' || $mtd=='projectDetail_View'){ echo 'active'; } ?>">
          <a href="<?php echo base_url('MainContent/projectAddView'); ?>">
            <i class="fa fa-dashboard"></i> <span>Projects</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>

          <ul class="treeview-menu">
               <li class="<?php if($mtd=='projectAddView'){ echo 'active'; } ?>" >
                  <a href="<?php echo base_url('MainContent/projectAddView'); ?>">
                    <i class="fa fa-calendar"></i> <span>Projects Add</span>
                  </a>
                </li>

                <li  class="<?php if($mtd=='projectList_View' || $mtd=='updateProjectView'){ echo 'active'; } ?>">
                  <a href="<?php echo base_url('MainContent/projectList_View'); ?>">
                    <i class="fa fa-calendar"></i> <span>Projects List</span>
                    <span class="pull-right-container">
                      <small class="label pull-right bg-red"><?= $totalPrj; ?> </small>
                      
                    </span>
                  </a>
                </li>
          </ul>
        </li> 
        
         <li class="treeview <?php if($ci=='MainContent' && $mtd=='userAddView' || $mtd=='userList_View' || $mtd=='updateUserView'){ echo 'active'; } ?>">
          <a href="javascript:void(0);">
            <i class="fa fa-users"></i> <span>Users</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
               <li  class="<?php if($mtd=='userAddView'){ echo 'active'; } ?>">
                  <a href="<?php echo base_url('MainContent/userAddView'); ?>">
                    <i class="fa fa-calendar"></i> <span>User Add</span>
                  </a>
                </li>

                <li class="<?php if($mtd=='userList_View'){ echo 'active'; } ?>">
                  <a href="<?php echo base_url('MainContent/userList_View'); ?>">
                    <i class="fa fa-calendar"></i> <span>User List</span>
                    <span class="pull-right-container">
                      <small class="label pull-right bg-red"><?= $totaluser; ?></small>
                      
                    </span>
                  </a>
                </li>
          </ul>
        </li>
         <li class="<?php if($mtd=='ApplicantsList'){ echo 'active'; } ?>">
          <a href="<?php echo base_url('MainContent/ApplicantsList'); ?>">
            <i class="fa fa-users"></i> <span>Applicants List</span>
            <span class="pull-right-container">
              <small class="label pull-right bg-red"><?= $totalApplicants; ?></small>
              
            </span>
          </a>
        </li> 

        <li class="<?php if($mtd=='testCenterFun'){ echo 'active'; } ?>">
          <a href="<?php echo base_url('Cms_ci/testCenterFun'); ?>">
            <i class="fa fa-calendar"></i> <span>Test Center</span>
            <span class="pull-right-container">
              <small class="label pull-right bg-red"></small>
              
            </span>
          </a>
        </li>

         <li class="treeview <?php if($ci=='Cms_ci' && $mtd=='newsAddView' || $mtd=='newsView' || $mtd=='newsUpdateView'){ echo 'active'; } ?>">
          <a href="#">
            <i class="fa fa-dashboard"></i> <span>News And Updates</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class="<?php if($mtd=='newsAddView'){ echo 'active'; } ?>">
              <a href="<?php echo base_url('Cms_ci/newsAddView');?>"><i class="fa fa-circle-o"></i>Add News</a></li>
            <li class="<?php if($mtd=='newsView'){ echo 'active'; } ?>">
              <a href="<?php echo base_url('Cms_ci/newsView'); ?>"><i class="fa fa-circle-o"></i>News List</a></li>
          </ul>
        </li>
         <li class="<?php if($mtd=='contactView'){ echo 'active'; } ?>">
          <a href="<?php echo base_url('Cms_ci/contactView'); ?>">
            <i class="fa fa-calendar"></i> <span>Contact</span>
            <span class="pull-right-container">
              <small class="label pull-right bg-red"><?= $totalcon; ?></small>
              
            </span>
          </a>
        </li>


  
         <li class="<?php if($mtd=='aboutViewFun'){ echo 'active'; } ?>">
          <a href="<?php echo base_url('Cms_ci/aboutViewFun'); ?>">
            <i class="fa fa-calendar"></i> <span>About</span>
            <span class="pull-right-container">
              <small class="label pull-right bg-red"><?= $totalabt; ?> </small>
              
            </span>
          </a>
        </li>


         <li class="<?php if($mtd=='staffMsgViewFun'){ echo 'active'; } ?>">
          <a href="<?php echo base_url('Cms_ci/staffMsgViewFun'); ?>">
            <i class="fa fa-calendar"></i> <span>Staff Mesages</span>
            <span class="pull-right-container">
              <small class="label pull-right bg-red"><?= $totalstf; ?> </small>
              
            </span>
          </a>
        </li>


         <li class="<?php if($mtd=='sittingUpdate'){ echo 'active'; } ?>">
          <a href="<?php echo base_url('Cms_ci/sittingUpdate'); ?>">
            <i class="fa fa-calendar"></i> <span>Setting</span>
            <span class="pull-right-container">
              <!-- <small class="label pull-right bg-red"><?= $totalstf; ?> </small> -->
              
            </span>
          </a>
        </li>
        <li class="<?php if($mtd=='contactMsg'){ echo 'active'; } ?>">
          <a href="<?php echo base_url('Cms_ci/contactMsg'); ?>">
            <i class="fa fa-calendar"></i> <span>Contact Messages</span>
            <span class="pull-right-container">
              <small class="label pull-right bg-red"><?= $totalcntMsgs; ?> </small>
              
            </span>
          </a>
        </li>


      
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>
