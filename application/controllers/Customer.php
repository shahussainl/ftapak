<?php
   class Customer extends CI_Controller
   {
      function  __construct()
      {
            parent::__construct();
           date_default_timezone_set('Asia/Karachi');
      }
       public function index()
       {
         $this->load->view('frontend/customerlogin');
       }
       public function register()
       {
         $this->load->view('frontend/register');
       }
       public function CustomerVerify() 
       {
            $email        = $this->input->post('user_email');
            $password     = $this->input->post('user_password');
            $condition = [
                'user_email'     => $email,
                'role_id'        => 3,
                'user_is_trash'  => 0
            ];
            $returnedData = $this->API_m->singleRecordArray('users', $condition);
            $size = sizeof($returnedData);
            if($size == 1) 
            {
            foreach ($returnedData as $user) 
            {
                    if($this->password->verify_hash($password,$user->user_password)) {

                        $sessionData = [
                            'user_id'     => $user->user_id,
                            'username'    => $user->user_fullname,
                            'user_email'  => $user->user_email,
                            'user_pic'    => $user->user_img,
                            'role'        => $user->role_id
                        ];
                        $this->session->set_userdata('user', $sessionData);
                        // Notification area
                        $activity = [
                            'notify_operation'   => 'login', //crud name
                            'notify_activity_on' => 'Admin', // id etc
                            'activity_name'      => 'AdminVerify',  // method name
                            'notify_created_for' => $this->session->userdata('user')['user_id'],
                            'modify_date'        => date('Y-m-d H:i:s')
                        ];
                        $this->API_m->create('notifications', $activity);
                        // Notification area end`

                        $this->session->set_flashdata('Msg', 'Login Successfull');
                            redirect('Customer/portal');
                    } else {
                        $this->session->set_flashdata('Msg', 'Wrong Credentials');
                        redirect('Customer/index');
                    }
            }
            } 
            else 
            {
                $this->session->set_flashdata('Msg', 'Wrong Credentials');
                redirect('Customer');
            } 
        }
        public function CustomerRegister() 
       {
            $email         = $this->input->post('user_email');
            $fullname      = $this->input->post('user_fullname');
            $user_cnic     = $this->input->post('user_cnic');
            $user_phone    = $this->input->post('user_phone');
            $password      = $this->input->post('user_password');
            $passwordhash  = $this->password->hash($password);
            $condition = [
                'user_email'     => $email,
                'user_cnic'      => $user_cnic,
            ];
            $returnedData = $this->cms_m->findCnicEmail($condition);
            // echo "<pre>"; print_r($returnedData); die();
            $size = sizeof($returnedData);
                if(empty($size)) 
                {
                    $reg_arr = [
                        'user_cnic'     => $user_cnic,
                        'user_fullname' => $fullname,
                        'user_email'    => $email,
                        'user_contact'  => $user_phone,
                        'user_password' => $passwordhash,
                        'role_id'       => 3
                    ];
                    $this->API_m->create('users', $reg_arr);
                    $this->session->set_flashdata('Msg', 'Registered Successfull!');
                        redirect('Customer/index');
                } else {
                    $this->session->set_flashdata('Msg', 'Already Registered, Try to Sign in');
                    redirect('Customer/register');
                }
            // } 
            // else 
            // {
            //     $this->session->set_flashdata('Msg', 'Wrong Credentials');
            //     redirect('Customer/register');
            // } 
        }

        public function portal()
        {
            $userdata = $this->session->userdata('user');
           
            if(!empty($userdata))
            {
                $userid               = $this->session->userdata('user')['user_id'];
                $result['prjHis']     = $this->Project_m->ApplicantPrjHistory($userid);
                $result['udata']      = $this->API_m->singleRecord('users',['user_id'=>$userid]);
                $result['education']  = $this->API_m->getRecordWhere('applicant_education',['applicant_id'=>$userid]);
                $result['experience'] = $this->API_m->getRecordWhere('applicant_experience',['applicant_id'=>$userid]);
                $result['activejobs'] = $this->Job_m->active_jobs();
                // $result['tPrj']     = $this->API_m->countAllRows('applicants',['user_id'=>$userid]);
                // echo "<pre>"; print_r($result['activejobs']);die();
                $this->load->view('backend/include/head');
                $this->load->view('backend/include/customerheader');
                // $this->load->view('backend/include/sideBar');
                $this->load->view('frontend/customerProfile',$result);
                $this->load->view('backend/include/footer');
            }
            else{
                $this->session->set_flashdata('Msg', 'Wrong Credentials');
                redirect('Customer');
            }
            
        }

        public function logout()
        {
            // Notification area
            $activity = [
            'notify_operation'   => 'logout', //crud name
            'notify_activity_on' =>  'Admin', // id etc
            'activity_name'      => 'logout',  // method name
            'notify_created_for' => $this->session->userdata('user')['user_id'],
            'modify_date'        => date('Y-m-d H:i:s')
            ];
            $this->API_m->create('notifications', $activity);
            // Notification area end
                unset($_SESSION['user']);
                session_destroy();

                $this->session->set_flashdata('Msg', ' Logout Successfull');
                redirect('Customer/index');
            }
            
            public function updateUserPassword()
            {
              // echo "<pre>";
              // print_r($_POST);
              // print_r($this->session->userdata('user')['user_id']);
              $user_id = $this->session->userdata('user')['user_id'];
              $id=['user_id'=>$user_id];
    
              $old_password = $this->input->post('old_password');
              // $new_password = $this->input->post('new_password');
              $new_password=$this->password->hash($this->input->post('newPassword'));
              $userPassword = array('user_password' =>$new_password);
    
              $re = $this->Project_m->updateUserPassword($id,$userPassword);
              if(!$re)
              {
                 echo "not Update";
              }
              else
              {
                echo "Updated";
              }
            }
            public function verifiedOldPassword() 
            {
               echo json_encode($this->Project_m->verifiedOldPassword($this->input->post('CustomeroldPassword')));
            }

            public function updateUserInfo()
            {
                $_SESSION['activetab'] = 'updateUserInfo'; 
                $name             = $this->input->post('name');
                $fname            = $this->input->post('user_f_name');
                $email            = $this->input->post('email');
                $address          = $this->input->post('address');
                $contact          = $this->input->post('contact');
                // $usertele         = $this->input->post('user_telephone');
                $user_idd         = $this->input->post('idd');
                   $id=['user_id'=>$user_idd];
                //    echo"<pre>"; print_r($_POST); die();
                 if(empty($_FILES['photo']['name']))
                   {          
                              $tableUser="users";
                              $arrayUser = array(
                                      'user_fullname'       =>$name,
                                      'user_father_name'    =>$fname,
                                      'user_email'          =>$email,
                                      'user_contact'        =>$contact,
                                    //   'user_telephone'      =>$usertele,
                                      'user_address'        =>$address,                                 
                                    );
                              $re = $this->cms_m->dynamicUpdate($id,$arrayUser,$tableUser);
                                  if(!$re)
                                   {
                                     echo "Not Inserted";
                                    }
                                  else
                                    {
                                      $this->session->set_flashdata('success','Record updated successfully');
                                       redirect('Customer/portal');
                                     }
                   }
                   else
                   {
                            $img = $_FILES['photo']['name'];
                            $config['upload_path']      =  realpath(APPPATH."../uploads/");
                            // echo realpath(APPPATH."../uploads/");
                            // echo "<pre>"; print_r($img); die();
                            $config['allowed_types']    = 'gif|jpg|jpeg|png';
                            $this->load->library('upload',$config);
                            $this->upload->initialize($config);
                            if(!$this->upload->do_upload('photo'))
                            {
                             print_r($this->upload->display_errors());
                               echo "not inserted";
                            }
                           else 
                           {
                                     $tableUser="users";
                                     $arrayUser = array(
                                            'user_fullname'       =>$name,
                                            'user_father_name'    =>$fname,
                                            'user_email'          =>$email,
                                            'user_contact'        =>$contact,
                                            // 'user_telephone'      =>$usertele,
                                            'user_address'        =>$address,
                                            'user_img'            =>$img                                    
                                          );
                                     $re = $this->cms_m->dynamicUpdate($id,$arrayUser,$tableUser);
                                          if(!$re)
                                           {
                                             echo "Not Inserted";
                                            }
                                         
                            }
                   }
                    // Notification area
                              $activity = [
                                 'notify_operation'   => 'update_User_info', //crud name
                                 'notify_activity_on' => $user_idd, // id etc
                                 'activity_name'      => 'updateUserInfo',  // method name
                                 'notify_created_for' => $user_idd,
                                 'modify_date'        => date('Y-m-d H:i:s')
                             ];
                             $this->API_m->create('notifications', $activity);
                     // Notification area end
                   $this->session->set_flashdata('success',' Record updated successfully');
                redirect('Customer/portal');         
            }
            public function deleteUserInfoImg($id)
            {
                  $data = array('user_img'=>'');
                  $idd=['user_id'=>$id];
                  $tableUser="users"; 
    
                  $re = $this->cms_m->updateTrash($idd,$tableUser,$data);
                      if(!empty($re))
                      {
                      // Notification area
                              $activity = [
                                 'notify_operation'   => 'delete_User_InfoImg', //crud name
                                 'notify_activity_on' => $id, // id etc
                                 'activity_name'      => 'deleteUserInfoImg',  // method name
                                 'notify_created_for' => $this->session->userdata('user')['user_id'],
                                 'modify_date'        => date('Y-m-d H:i:s')
                             ];
                             $this->API_m->create('notifications', $activity);
                     // Notification area end
                        $this->session->set_flashdata('danger','Record Deleted successfully');
                            redirect('Customer/userProfileView');  
                      }
                      else
                      {
                          echo "not Delete";
                      }
            }

            public function updateEducation()
            {
                $_SESSION['activetab'] = 'updateEducation'; 
                $qualification = $this->input->post('qualification');    
                $subject       = $this->input->post('subject');  
                $institute     = $this->input->post('institute');    
                $obtained      = $this->input->post('obtained'); 
                $total         = $this->input->post('total');    
                $percentage    = $this->input->post('percentage');   
                $user_id       = $this->session->userdata('user')['user_id'];
                $tableUser="applicant_education";
                $edu_arr = array(
                        'qualification' => $qualification,
                        'subject'       => $subject,
                        'institute'     => $institute,
                        'obtained'      => $obtained,
                        'total'         => $total,                                 
                        'percentage'    => $percentage,                                 
                        'applicant_id'  => $user_id,                                 
                    );
                $re = $this->API_m->create($tableUser,$edu_arr);
                if(!$re)
                {
                    echo "Not Inserted";
                }
                $this->session->set_flashdata('success',' Record updated successfully');
                redirect('Customer/portal');         
            }
            public function updateExperience()
            {
                $org           = $this->input->post('org');    
                $designation   = $this->input->post('designation');  
                $duration      = $this->input->post('duration');    
                $remarks       = $this->input->post('remarks'); 
                $start         = $this->input->post('start');    
                $end           = $this->input->post('end');   
                $user_id       = $this->session->userdata('user')['user_id'];
                $tableUser     = "applicant_experience";
                $exp_arr = array(
                        'org' => $org,
                        'designation'   => $designation,
                        'duration'      => $duration,
                        'remarks'       => $remarks,
                        'start'         => date('Y-m-d', strtotime($start)),                                 
                        'end'           => date('Y-m-d', strtotime($end)),                                 
                        'applicant_id'  => $user_id,                                 
                    );
                    // echo"<pre>"; print_r($exp_arr); die();
                $re = $this->API_m->create($tableUser,$exp_arr);
                if(!$re)
                {
                    echo "Not Inserted";
                }
                $_SESSION['activetab'] = 'updateExperience'; 
                $this->session->set_flashdata('success',' Record updated successfully');
                redirect('Customer/portal');         
            }

             // online apply for tests
    public function insertUpdateApplicants($prjid)
    {
         $prj_id        = $prjid;
         $role_id      = 3;
         $userid      = $this->session->userdata('user')['user_id'];
         $prjrec = $this->API_m->singleRecord('projects',['prj_id'=>$prj_id]);
         $app_rev_date  = date('Y-m-d');
         $test_date     = $prjrec->prj_end_date;
         $test_time     = $prjrec->prj_end_date;
        //    if(!empty($userCnic))
        //    {
                // ***** Application Table data
                $appData = [
                    'user_id'           => $userid,
                    'prj_id'            => $prj_id,
                    'app_received_date' => date('Y-m-d',strtotime($app_rev_date)),
                    'test_date_time'    => date('Y-m-d',strtotime($test_date)).' '.date('H:i:s',strtotime($test_time)),
                    'app_created_date'  => date('Y-m-d'),
                    'app_created_by'    => $userid
                ]; 
                // $apRes = $this->API_m->singleRecord('applicants',['prj_id'=>$prj_id,'user_id'=>$userid]);
                // if(!empty($apRes))
                // {
                //     $this->API_m->updateRecord('applicants',['app_id'=>$apRes->app_id],$appData);
                // }
                // else
                // {
                    $this->API_m->create('applicants',$appData);
                    // email configuration  
                        // $u_res   = $this->API_m->singleRecord('users',['user_id'=>$usr_id]);
                        // $to      = $u_res->user_email;
                        // $subject = "Job Portal";
                        // $body    = "Dear Applicant!<br> Your Application for the applied job in job portal has been Received.<br>Your Date/Time : ".date('Y-m-d',strtotime($test_date));
                        // $this->UserEmail_m->sendDataToEmail($to,$subject,$body);
                    // end email configuration 
                // }
            // }
              $this->session->set_flashdata('success','You have been Applied successfully');
              redirect('Customer/portal');
    }

}


?>