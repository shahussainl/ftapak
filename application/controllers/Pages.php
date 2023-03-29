<?php
     /**
      * 
      */
     class Pages extends CI_Controller
     {

      function  __construct()
      {
            parent::__construct();
           date_default_timezone_set('Asia/Karachi');
      }
     	 
     	 public function about_usView()
     	 {
            $result['getAboutUs'] = $this->Pages_m->get('about');
            // echo "<pre>";
            // print_r($result);
            // exit();
     	 	    $this->load->view('frontend/include/head');
       	    $this->load->view('frontend/include/header');
       	    $this->load->view('frontend/pages/about_us',$result);
       	    $this->load->view('frontend/include/footer');
     	 } 
       public function aboutDetail($id)
       {
             //echo $id;
             $idd=['abt_id'=>$id];
             $result['getAboutDetail']=$this->Pages_m->getDynamicIdData('about',$idd);
             $result['recentNews']=$this->Pages_m->getRecentNews();
            // echo "<pre>";
            // print_r($result);
            // exit();

            $this->load->view('frontend/include/head');
            $this->load->view('frontend/include/header');
            $this->load->view('frontend/pages/aboutDetail',$result);
            $this->load->view('frontend/include/footer');
       } 
     	 public function newsFeed()
     	 {

        $url       = 'Pages/newsFeed';
// $result['getAllJob'] = $this->Job_m->BlogPagination($uri,'projects');

$config['base_url']     = base_url($url);  
$config['per_page']           = 4;

$config['total_rows']         = $this->Job_m->get_rows('news_updates');


$config['full_tag_open']  = "<ul class='pagination'>";
$config['full_tag_close']   = '</ul>';
$config['num_tag_open']   = '<li class="page-item page-link">';
$config['num_tag_close']  = '</li>';
$config['cur_tag_open']   = '<li class=" active page-item"><a class="page-link" href="#">';
$config['cur_tag_close']  = '</a></li>';

$config['prev_tag_open']  = '<li class="page-item">';
$config['prev_tag_close'] = '</li>';

$config['first_tag_open'] = '<li class="page-item">';
$config['first_tag_close']  = '</li>';
$config['last_tag_open']  = '<li class="page-item">';
$config['last_tag_close'] = '</li>';

$config['next_link']    = '<i class="ti-arrow-right"></i>Next';
$config['next_tag_open']  = '<li><a>';
$config['next_tag_close']   = '</a></li>';

$config['prev_link']    = '<i class="ti-arrow-left"></i>Prev';
$config['prev_tag_open']  = '<li><a>';
$config['prev_tag_close']   = '</a></li>';

$config['first_link']     = false;
$config['last_link']      = false;
$this->pagination->initialize($config);  

$page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
// $result['getAllJob'] = $this->Job_m->fetch_blogs($config["per_page"], $page);

             $result['allNews']=$this->Pages_m->getAllNews($config["per_page"], $page);

             $result['recentNews']=$this->Pages_m->getRecentNews();
             
            // echo "<pre>";
            // print_r($result);
            // exit();
     	 	    $this->load->view('frontend/include/head');
       	    $this->load->view('frontend/include/header');
       	    $this->load->view('frontend/pages/blog_sidebar',$result); 
       	    $this->load->view('frontend/include/footer');
     	 }
     	 public function newsFeedDetail($id)
     	 { 
             
             $idd=['n_u_id'=>$id];
            $result['newsDetail']=$this->Pages_m->getNewDetail($idd);
            $result['recentNews']=$this->Pages_m->getRecentNews();
            $comm_id=['newsFeed_id'=>$id];
            $result['comment'] = $this->Pages_m->getCommentAndReply($id);
            // echo "<pre>";
            // print_r($result);
            // exit();
     	 	    $this->load->view('frontend/include/head');
       	    $this->load->view('frontend/include/header');
       	    $this->load->view('frontend/pages/blog_Detail',$result);
       	    $this->load->view('frontend/include/footer');
     	 }
     	 public function contactUs()
     	 {
            $result['cPrimary']   = $this->API_m->singleRecord('contact',['con_primary'=>1,'con_is_trash'=>0]);
            $result['cSecondary'] = $this->API_m->singleRecordArray('contact',['con_primary'=>0,'con_is_trash'=>0]);
     	 	    $this->load->view('frontend/include/head');
       	    $this->load->view('frontend/include/header');
       	    $this->load->view('frontend/pages/contact',$result);
       	    $this->load->view('frontend/include/footer');
     	 }
       public function all_jobs()
        {
            $result['allJobName']=$this->Job_m->getAllJobByCityName(10);
             // echo "<pre>";
             // print_r($result);
             // exit();
            
            $gov=['org_type'=>'Goverment'];
            $pri=['org_type'=>'Private'];
            $semi=['org_type'=>'Semi_goverment'];
            $other=['org_type'=>'Other'];
            $result['governamentJob'] = $this->Job_m->getGovernament($gov,16);
            $result['semi_governamentJob'] = $this->Job_m->getSemiGovernament($semi,16);
            $result['privateJob'] = $this->Job_m->getPrivate($pri,16);
            $result['otherJob'] = $this->Job_m->getOther($other,16);

            
            $result['allJobByLogo']=$this->Job_m->getAllJobByImg();
            // echo "<pre>";
            // print_r($result);
            // exit();
            $this->load->view('frontend/include/head');
            $this->load->view('frontend/include/header');
            $this->load->view('frontend/pages/all_jobs',$result);
            $this->load->view('frontend/include/footer');
            
       }
       public function company_jobs()
       {
            $result['company'] = $this->Pages_m->jobByCompany();
            $this->load->view('frontend/include/head');
            $this->load->view('frontend/include/header');
            $this->load->view('frontend/pages/company_jobs',$result);
            $this->load->view('frontend/include/footer');
       }
       public function designation_jobs()
       {
            $tableName="projects";
            $result['getAllDesignation'] = $this->cms_m->dynamicGetTable($tableName);
            // echo "<pre>";
            // print_r($result);
            // exit();
            $this->load->view('frontend/include/head');
            $this->load->view('frontend/include/header');
            $this->load->view('frontend/pages/designations_jobs',$result);
            $this->load->view('frontend/include/footer');
       }
       public function category_jobs()
       {
            $this->load->view('frontend/include/head');
            $this->load->view('frontend/include/header');
            $this->load->view('frontend/pages/category_jobs');
            $this->load->view('frontend/include/footer');
       }
       public function location_jobs()
       {
            $this->load->view('frontend/include/head');
            $this->load->view('frontend/include/header');
            $this->load->view('frontend/pages/location_jobs');
            $this->load->view('frontend/include/footer');
       }
       public function skill_jobs()
       {
            $this->load->view('frontend/include/head');
            $this->load->view('frontend/include/header');
            $this->load->view('frontend/pages/skill_jobs');
            $this->load->view('frontend/include/footer');
       }
       public function job_Detail($id)
       {
          $idd=['pro.prj_id'=>$id];    
          $result['jobsDetail']=$this->Job_m->getJobDetail($idd);
          $result['jobFiles']   =$this->Job_m->getJobDetailFiles($id);
            
            // echo "<pre>";
            // print_r($result);
            // exit();
            $this->load->view('frontend/include/head');
            $this->load->view('frontend/include/header');
            $this->load->view('frontend/pages/job_detail',$result);
            $this->load->view('frontend/include/footer');
       }
       public function cityViceSerch($cityName,$condition)
       {
         // echo $cityName;
         // $org_idd=['add.city'=>$cityName];
        $cityName=str_replace('%20',' ',$cityName);
        if($condition=='byCityName')
        {
                $tblName="organization";
                $result['getAllByCityName']=$this->Job_m->getAllByCityNamee($cityName);
                 // echo "<pre>";
                 // print_r($result);
                 // exit();
        }
        else
        {
            $org_idd=['pro.org_id'=>$cityName];
             $result['getAllByCityName']=$this->Job_m->getAllJobDetail($org_idd);
             // echo "<pre>";
             // print_r($result);
             // exit();
        }
      

        
          $this->load->view('frontend/include/head');
          $this->load->view('frontend/include/header');
          $this->load->view('frontend/pages/cityViceSearchView',$result);
          $this->load->view('frontend/include/footer');

       }
       public function serchData()
       {
          $name1 = $this->input->post('search1');
          $name2 = $this->input->post('search2');  
          // echo $name1;
          // echo $name2;
          //exit();
          $result['getAllByCityName']=$this->Job_m->getSearchData($name1,$name2);
          // echo "<pre>";
          // print_r($result);
          // exit();
          $this->load->view('frontend/include/head');
          $this->load->view('frontend/include/header');
          $this->load->view('frontend/pages/cityViceSearchView.php',$result);
          $this->load->view('frontend/include/footer');

       }
       public function commentFun()
       {
         $author = $this->input->post('author');
         $id = $this->input->post('idd');
         $email = $this->input->post('email');
         $contact = $this->input->post('contact');
         $comment = $this->input->post('comment');

         // print_r($author);
         //   print_r($id);
         // print_r($email);
         // print_r($contact);
         // print_r($comment);
         // exit();
         $tblName="comments";
         $commentArray = array(
                               'name' =>$author ,
                               'newsFeed_id' =>$id ,
                               'email' =>$email ,
                               'contact' =>$contact ,
                               'comment_msg' =>$comment ,
                              );   
         $this->cms_m->dynamicInsertTable($commentArray,$tblName);
         echo json_encode(1);
       
       }
       public function addCommentReplay()
       {
           $author = $this->input->post('name');
           $id = $this->input->post('id');
           $email = $this->input->post('email');
           $contact = $this->input->post('contact');
           $comment = $this->input->post('comment_msg');
         //   echo "<pre>";
         // print_r($author);
         // print_r($id);
         // print_r($email);
         // print_r($contact);
         // print_r($comment);
         // exit();
         $tblName="commentsReply";
         $commentReplyArray = array(
                               'name' =>$author ,
                               'comments_id' =>$id ,
                               'email' =>$email ,
                               'contact' =>$contact ,
                               'comment_msg' =>$comment ,
                              );   
         $this->cms_m->dynamicInsertTable($commentReplyArray,$tblName);
         echo json_encode(1);
       }
       public function viewFunction($condition)
       { 
           // print_r($condition);
           // exit(); 
           $page='';
           $result[]='';
           $headTitle='';
           $var=[];
          if($condition=='alllocation')
          {
             $result['allJobName']=$this->Job_m->getAllJobByCityName();
             $page='viewJobByLocation';
             // $headTitle="Governament Job";
          }
          else if($condition=='logo')
          {
            $result['allJobByLogo']=$this->Job_m->getAllJobByImg();
            // echo "<pre>";
            // print_r($result);
            // exit();
            $page='viewByOrgLog';
            $headTitle="Organizaton Jobs";
            
          }
          else if($condition=='gov')
          {
            $var=['org_type'=>'Goverment'];
            $page='viewJobByCategory';
            $headTitle="Governament Job";
            
          }
          else if($condition=='pri')
          {
            $var=['org_type'=>'private'];
            $page='viewJobByCategory';
            $headTitle="Private Job";
          }
          else if($condition=='semi')
          {
            $var=['org_type'=>'Semi_goverment'];
            $page='viewJobByCategory';
            $headTitle=" Semi Governament  Job";
          }
          else if($condition=='other')
          {
            $var=['org_type'=>'Other'];
            $page='viewJobByCategory';
            $headTitle="Other Job";
          }

           $result['governamentJob'] = $this->Job_m->getGovernament($var);
           $result['title']=$headTitle;

            $this->load->view('frontend/include/head');
            $this->load->view('frontend/include/header');
            $this->load->view('frontend/pages/'.$page,$result);
            $this->load->view('frontend/include/footer');

       }

       public function getAllCategory()
       { 
          

            $gov=['org_type'=>'Goverment'];
            $pri=['org_type'=>'Private'];
            $semi=['org_type'=>'Semi_goverment'];
            $other=['org_type'=>'Other'];
            $result['governamentJob'] = $this->Job_m->getGovernament($gov);
            $result['semi_governamentJob'] = $this->Job_m->getSemiGovernament($semi);
            $result['privateJob'] = $this->Job_m->getPrivate($pri);
            $result['otherJob'] = $this->Job_m->getOther($other);
            // echo "<pre>";
            // print_r($result);
            // exit();

            $this->load->view('frontend/include/head');
            $this->load->view('frontend/include/header');
            $this->load->view('frontend/pages/viewAllJobCategories',$result);
            $this->load->view('frontend/include/footer');

       }
       
       
       

//  frontend contact form sendMessage
       public function SendMessage()
       {
            // echo "<pre>";
            // print_r($_POST);
            // exit();
            $name  = $this->input->post('name');
            $email = $this->input->post('email');
            $msg   = $this->input->post('message');

              $arr = [
                'sender_name'  => $name,
                'sender_email' => $email,
                'sender_msg'   => $msg,
                'rec_date'     => date('Y-m-d H:i:s')
              ];
             $res = $this->API_m->create('contact_msgs',$arr);
              if($res)
              {
                echo json_encode(1);
              }
              else
              {
                echo json_encode(0);
              }
       }
      
       public function administration()
       {
          $tblName="staff_msgs";
          $result['getStopMsg']=$this->cms_m->dynamicGetTable($tblName);
          // echo "<pre>";
          // print_r($result);
          // exit();
          $this->load->view('frontend/include/head');
          $this->load->view('frontend/include/header');
          $this->load->view('frontend/pages/stopMsgView',$result);
          $this->load->view('frontend/include/footer');
       } 
       public function stopMsgViewDetail($id)
       {
          // echo $id;
          // exit();
          $idd=['stf_id'=>$id];
          $tblName="staff_msgs";
          $result['getStopMsg']=$this->Pages_m->getStopMsgDetail($idd,$tblName);
          // echo "<pre>";
          // print_r($result);
          // exit();
          $this->load->view('frontend/include/head');
          $this->load->view('frontend/include/header');
          $this->load->view('frontend/pages/stoMsgViewDetail',$result);
          $this->load->view('frontend/include/footer');
       } 
    public function subscribe()
    {
      //  echo "<pre>";
      // print_r($email);
      // exit();
      $email=$this->input->post('email');
      // echo "<pre>";
      // print_r($email);
      // exit();
      $arrayName = array(
                         'email' =>$email);

       $re=$this->cms_m->addSub($arrayName);
       echo $re;
    }

    // online apply for tests
    public function insertUpdateApplicants()
    {
          // echo "<pre>";
          // print_r($_POST);
          // die();
 
          $prj_id        = $this->input->post('prj_id');
          $app_rev_date  = date('Y-m-d');
          $test_date     = $this->input->post('test_date');
          $test_time     = date('H:i:s');

          $role_id      = 3;
          $user_id      = $this->input->post('user_id');
          $userName     = $this->input->post('user_name');
          $userFname    = $this->input->post('user_f_name');
          $userCnic     = $this->input->post('user_cnic');
          $userEmail    = $this->input->post('user_email');
          $userContact  = $this->input->post('user_contact');
          $userAddr     = $this->input->post('address');

          if(!empty($userCnic))
          {
            // $this->API_m->delete('applicants',['prj_id'=>$prj_id]);
            // for($i=0; $i<sizeof($userCnic); $i++)
            // {
              $userid = '';
                $usr_id ='';
              if(!empty($userCnic))
              {
                $userData =
                      array(
                          'user_fullname'     => $userName,
                          'user_father_name'  => $userFname,
                          'user_email'        => $userEmail,
                          'user_cnic'         => $userCnic,
                          'user_contact'      => $userContact,
                          'user_address'      => $userAddr,
                          'role_id'           => $role_id,
                          'user_created_date' => date('Y-m-d'),
                          'user_created_by'   => 1
                          
                        );

                  $res = $this->API_m->singleRecord('users',['user_id'=>$user_id]);
                    if(!empty($res))
                    {
                        $this->API_m->updateRecord('users',['user_id'=>$user_id],$userData);
                        $userid = $user_id;
                        $uAdd = array(
                          'address1'  => $userAddr,
                          'user_id'   => $userid
                          
                        );

                        $this->API_m->updateRecord('user_addresses',['user_id'=>$user_id],$uAdd);
                    }
                    else
                    {
                        $userid =  $this->API_m->create('users',$userData);
                          $usr_id = $userid;
                        $uAdd = array(
                          'address1'      => $userAddr,
                          'user_id'       => $userid
                          
                        );
                        $this->API_m->create('user_addresses',$uAdd);

                    }

                    // ***** Application Table data

                    $appData = [
                          'user_id'           => $userid,
                          'prj_id'            => $prj_id,
                          'app_received_date' => date('Y-m-d',strtotime($app_rev_date)),
                          'test_date_time'    => date('Y-m-d',strtotime($test_date)).' '.date('H:i:s',strtotime($test_time)),
                          'app_created_date'  => date('Y-m-d'),
                          'app_created_by'    => 1
                    ]; 

                      $apRes = $this->API_m->singleRecord('applicants',['prj_id'=>$prj_id,'user_id'=>$userid]);
                    if(!empty($apRes))
                    {
                      $this->API_m->updateRecord('applicants',['app_id'=>$apRes->app_id],$appData);
                    }
                    else
                    {
                      $this->API_m->create('applicants',$appData);
                          // email configuration  
                            // $u_res   = $this->API_m->singleRecord('users',['user_id'=>$usr_id]);
                            // $to      = $u_res->user_email;
                            // $subject = "Job Portal";
                            // $body    = "Dear Applicant!<br> Your Application for the applied job in job portal has been Received.<br>Your Date/Time : ".date('Y-m-d',strtotime($test_date));
                            // $this->UserEmail_m->sendDataToEmail($to,$subject,$body);
                          // end email configuration 

                    }

                    }
              }
              // }
                  // Notification area
              // $activity = [
              // 'notify_operation'   => 'insert_Update_Applicants', //crud name
              // 'notify_activity_on' => 11, // id etc
              // 'activity_name'      => 'insertUpdateApplicants',  // method name
              // 'notify_created_for' => $this->session->userdata('user')['user_id'],
              // 'modify_date'        => date('Y-m-d H:i:s')
              // ];
              // $this->API_m->create('notifications', $activity);
              // Notification area end
              $this->session->set_flashdata('success','You have been Applied successfully');
              redirect('Job/index');
    }
}

?>