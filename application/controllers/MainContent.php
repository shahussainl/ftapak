<?php
   /**
    * 
    */
   class MainContent extends CI_Controller
   {
   
      function  __construct()
      {
            parent::__construct();
           date_default_timezone_set('Asia/Karachi');
          if(!$this->session->userdata('user'))
          {
            redirect('Admin/logout');
          }

      }
     public function index()
     {

           $this->load->view('backend/include/head');
           $this->load->view('backend/include/header');
           $this->load->view('backend/include/sideBar');
           $this->load->view('backend/indexPage');
           $this->load->view('backend/include/footer');
      }	


//  ***************** Project Panel 

        public function projectAddView()
        {
          $result['orgList'] = $this->cms_m->dynamicGetTable("organization");
          // print_r($result);
          //     exit();
           $this->load->view('backend/include/head');
           $this->load->view('backend/include/header');
           $this->load->view('backend/include/sideBar');
           $this->load->view('backend/layouts/projects/addProject',$result);
           $this->load->view('backend/include/footer');
        }

        public function projectList_View()
        {
              
              $result['prjLists'] = $this->Project_m->getProjects();

              // print_r($result);
              // exit();
             $this->load->view('backend/include/head');
             $this->load->view('backend/include/header');
             $this->load->view('backend/include/sideBar');
             $this->load->view('backend/layouts/projects/projectList',$result);
             $this->load->view('backend/include/footer');
        }

        public function updateProjectView($id)
        {    

             $result['updateData'] = $this->Project_m->getDataForUpdate($id);
             $result['imagedata'] = $this->Project_m->getImageForUpdate($id);
             $result['projectList']= $this->cms_m->dynamicGetTable("organization");
             // print_r($result);
             // exit()
             
             $this->load->view('backend/include/head');
             $this->load->view('backend/include/header');
             $this->load->view('backend/include/sideBar');
             $this->load->view('backend/layouts/projects/updateProjectView',$result);
             $this->load->view('backend/include/footer');
        }
        public function projectDetail_View($prj_id)
        {
              
            $result['prjLists']     = $this->Project_m->getPrjFullView($prj_id);
            $result['prj_img']      = $this->API_m->singleRecordArray('prj_img',['project_id'=>$prj_id]);
            $result['appliedLists'] = $this->Project_m->appliedPrjApplicants($prj_id);
              // print_r($result);
              // exit();
             $this->load->view('backend/include/head');
             $this->load->view('backend/include/header');
             $this->load->view('backend/include/sideBar');
             $this->load->view('backend/layouts/projects/projectDetail.php',$result);
             $this->load->view('backend/include/footer');
        }   
        public function assignToApplicatView($id)
        {
             $this->load->view('backend/include/head');
             $this->load->view('backend/include/header');
             $this->load->view('backend/include/sideBar');
             $this->load->view('backend/layouts/applicants/assignToUserView');
             $this->load->view('backend/include/footer');
        }
        public function projectAddData()
        {
          $prj_title   = $this->input->post('title');
          $org_id      = $this->input->post('org_id');
          $start_date  = $this->input->post('create_date');
          $end_date    = $this->input->post('last_date');
          $total_marks = $this->input->post('t_marks');
          $editor1        = $this->input->post('editor1');

            $arrayName = array(
                               'prj_name'        =>$prj_title,
                               'org_id'          =>$org_id,
                               'prj_desc'        =>$editor1,
                               'prj_total_marks' =>$total_marks,
                               'prj_start_date'  => date('Y-m-d',strtotime($start_date)),
                               'prj_end_date'    => date('Y-m-d',strtotime($end_date)),
                               'prj_created_date' =>date('Y-m-d'),
                               'prj_created_by'   =>$this->session->userdata('user')['user_id']
                               
                              );

            $re_id = $this->Project_m->addProjectData($arrayName);
    
           if(!$re_id)
           {
              echo "Not return";
           }
           else
           {
              $img_titlee = $this->input->post('img_title');
              $image = array();
              $ImageCount = count($_FILES['image_name']['name']);
                  for($i = 0; $i < $ImageCount; $i++)
                  {
                      $_FILES['file']['name']       = $_FILES['image_name']['name'][$i];
                      $_FILES['file']['type']       = $_FILES['image_name']['type'][$i];
                      $_FILES['file']['tmp_name']   = $_FILES['image_name']['tmp_name'][$i];
                      $_FILES['file']['error']      = $_FILES['image_name']['error'][$i];
                      $_FILES['file']['size']       = $_FILES['image_name']['size'][$i];

                      // File upload configuration
                      $uploadPath = realpath(APPPATH."../uploads/");

                      $config['upload_path'] = $uploadPath;
                      $config['allowed_types'] = 'jpg|jpeg|png|gif|txt|xls|xlsx|doc|docx|pdf';
                      // $config['max_size'] = '100';
                      // $config['max_width'] = '1024';
                      // $config['max_height'] = '768';


                      // Load and initialize upload library
                      $this->load->library('upload', $config);
                      $this->upload->initialize($config);

                      // Upload file to server
                      if($this->upload->do_upload('file'))
                        {
                           // Uploaded file data
                           $imageData = $this->upload->data();
                           $uploadImgData[$i]['prj_file'] = $imageData['file_name']; 
                           $uploadImgData[$i]['project_id'] = $re_id;
                           $uploadImgData[$i]['img_title']  =$img_titlee[$i];

                        }
                  }
                  if(!empty($uploadImgData))
                   {
                     // Insert files data into the database
                       $re =  $this->Project_m->multiple_images($uploadImgData);            
                   }
                   
                   
               }
                   // Notification area
                          $activity = [
                             'notify_operation'   => 'project_Add_Data', //crud name
                             'notify_activity_on' => 3, // id etc
                             'activity_name'      => 'projectAddData',  // method name
                             'notify_created_for' => $this->session->userdata('user')['user_id'],
                             'modify_date'        => date('Y-m-d H:i:s')
                         ];
                         $this->API_m->create('notifications', $activity);
                 // Notification area end
               $this->session->set_flashdata('success','New Record added successfully');
               redirect('MainContent/projectDetail_View/'.$re_id);    
        }

        public function deleteProject($id)
        {
            $re = $this->Project_m->deleteProjectM($id);

                   // Notification area
                          $activity = [
                             'notify_operation'   => 'delete_Project', //crud name
                             'notify_activity_on' => $id, // id etc
                             'activity_name'      => 'deleteProject',  // method name
                             'notify_created_for' => $this->session->userdata('user')['user_id'],
                             'modify_date'        => date('Y-m-d H:i:s')
                         ];
                         $this->API_m->create('notifications', $activity);
                 // Notification area end
            $this->session->set_flashdata('danger','Record Deleted successfully');
            redirect('MainContent/projectList_View');
        
        }

        public function updateProjectData()
        {
      
          $prj_title = $this->input->post('title');
          $u_idd     = $this->input->post('u_id');
          $org_id = $this->input->post('org_id');
          $start_date = $this->input->post('create_date');
          $end_date = $this->input->post('last_date');
          $total_marks = $this->input->post('t_marks');
          $editor1 = $this->input->post('editor1');

              $update_id = ['prj_id'=>$u_idd];
           
             $updateArray = array(
                               'prj_name'         =>$prj_title,
                               'org_id'           =>$org_id,
                               'prj_desc'         =>$editor1,
                               'prj_total_marks'  =>$total_marks,
                               'prj_start_date'   =>date('Y-m-d',strtotime($start_date)),
                               'prj_end_date'     =>date('Y-m-d',strtotime($end_date)),      
                               'prj_created_date' =>date('Y-m-d')    
                              );

             //$this->Project_m->updateProjectDataM($update_id,$updateArray);
             $this->Project_m->updateProjectDataM($update_id,$updateArray);

             
   
             $img_titlee = $this->input->post('img_title');
              $image = array();
              $ImageCount = count($_FILES['image_name']['name']);
                  for($i = 0; $i < $ImageCount; $i++)
                  {
                      $_FILES['file']['name']       = $_FILES['image_name']['name'][$i];
                      $_FILES['file']['type']       = $_FILES['image_name']['type'][$i];
                      $_FILES['file']['tmp_name']   = $_FILES['image_name']['tmp_name'][$i];
                      $_FILES['file']['error']      = $_FILES['image_name']['error'][$i];
                      $_FILES['file']['size']       = $_FILES['image_name']['size'][$i];

                      // File upload configuration
                      $uploadPath = realpath(APPPATH."../uploads/");

                      $config['upload_path'] = $uploadPath;
                      $config['allowed_types'] = 'jpg|jpeg|png|gif|txt|xls|xlsx|doc|docx|pdf';

                      // Load and initialize upload library
                      $this->load->library('upload', $config);
                      $this->upload->initialize($config);

                      // Upload file to server
                      if($this->upload->do_upload('file'))
                        {
                           // Uploaded file data
                           $imageData = $this->upload->data();
                           $uploadImgData[$i]['prj_file'] = $imageData['file_name']; 
                           $uploadImgData[$i]['project_id'] = $u_idd;
                           $uploadImgData[$i]['img_title']  =$img_titlee[$i];

                        }
                  }
                  if(!empty($uploadImgData))
                   {
                     // Insert files data into the database
                     $re =  $this->Project_m->multiple_images_update($uploadImgData);
                     if(!$re)
                     {
                        echo "Not inserted";
                     }
                     // else
                     // {
                     // $this->session->set_flashdata('success','Record updated successfully');
                     //  redirect('MainContent/updateProjectView/'.$u_idd); 
                     // }            
                
                   
                   
                 }
                    // Notification area
                          $activity = [
                             'notify_operation'   => 'update_Project_Data', //crud name
                             'notify_activity_on' => $u_idd, // id etc
                             'activity_name'      => 'updateProjectData',  // method name
                             'notify_created_for' => $this->session->userdata('user')['user_id'],
                             'modify_date'        => date('Y-m-d H:i:s')
                         ];
                         $this->API_m->create('notifications', $activity);
                 // Notification area end
                 $this->session->set_flashdata('success','Record updated successfully');
                   redirect('MainContent/updateProjectView/'.$u_idd); 

        }
       public function singleImgaeDalet($id)
        {
            //print_r($id);

            $re = $this->Project_m->singleImgaeDaletModel($id);

        }


// **************** User Panel 

       public function userAddView()
       {
           $result['prjs']  = $this->API_m->get('projects');
           $this->load->view('backend/include/head');
           $this->load->view('backend/include/header');
           $this->load->view('backend/include/sideBar');
           $this->load->view('backend/layouts/users/addUser',$result);
           $this->load->view('backend/include/footer');
        }

        public function userList_View()
        {
              
             $result['users'] = $this->API_m->get('users');
             $result['prjs']  = $this->Project_m->getAllprj();
              // print_r($result);
              // exit();
             $this->load->view('backend/include/head');
             $this->load->view('backend/include/header');
             $this->load->view('backend/include/sideBar');
             $this->load->view('backend/layouts/users/userList',$result);
             $this->load->view('backend/include/footer');
        }

        public function updateUserView($id)
        {    

             $result['usersUp'] = $this->Project_m->getUserUp($id);
             $result['prjs']    = $this->API_m->get('projects');
             // echo "<pre>";
             // print_r($result);
             // exit();
             
             $this->load->view('backend/include/head');
             $this->load->view('backend/include/header');
             $this->load->view('backend/include/sideBar');
             $this->load->view('backend/layouts/users/updateUser',$result);
             $this->load->view('backend/include/footer');
        }

        public function deleteUserImg($id)
        {
       
            $data = array('user_img'=>'');
            $idd=['user_id'=>$id];
            $tableSitting="users"; 

          $re = $this->cms_m->updateTrash($idd,$tableSitting,$data);

               // Notification area
                  $activity = [
                      'notify_operation'   => 'delete_User_Imgage', //crud name
                      'notify_activity_on' => $id, // id etc
                      'activity_name'      => 'deleteUserImg',  // method name
                      'notify_created_for' => $this->session->userdata('user')['user_id'],
                      'modify_date'        => date('Y-m-d H:i:s')
                  ];
                  $this->API_m->create('notifications', $activity);
             // Notification area end
                  $this->session->set_flashdata('danger','Record Deleted successfully');
               redirect('MainContent/updateUserView/'.$id); 
       }
       public function userAddData()
       {

          // echo "<pre>";
          // print_r($_POST);
          // exit();
          // $prj_id        = $this->input->post('prj_id');
          // $app_rev_date  = $this->input->post('app_received_date');
          // $test_date     = $this->input->post('test_date');

          $role_id      = $this->input->post('role_id');
          $user_id      = $this->input->post('user_id');
          $userName     = $this->input->post('user_fullname');
          $userFname    = $this->input->post('user_f_name');
          $userCnic     = $this->input->post('user_cnic');
          $user_tele    = $this->input->post('user_telephone');
          $userEmail    = $this->input->post('user_email');
         
          $password      = $this->input->post('user_password');
          $user_password = $this->password->hash($password);

          $userContact  = $this->input->post('user_contact');
          $userAddr     = $this->input->post('user_address');

              $user_city = $this->input->post('city');
              $user_state = $this->input->post('state');
              $user_contry = $this->input->post('country');
              $user_postCode = $this->input->post('postCode');
  
          
                $img = $_FILES['photo']['name'];

                $config['upload_path']      =  realpath(APPPATH."../uploads/");
                $config['allowed_types']    = 'gif|jpg|png';
                $this->load->library('upload',$config);
                $this->upload->initialize($config);

                if(!$this->upload->do_upload('photo'))
                {
                 print_r($this->upload->display_errors());
                   echo "not inserted";
                }
                else 
                {
                          $userData =[
                         'user_fullname'     => $userName,
                         'user_father_name'  => $userFname,
                         'user_email'        => $userEmail,
                         'user_password'     => $user_password,
                         'user_cnic'         => $userCnic,
                         'user_contact'      => $userContact,
                         'user_telephone'    => $user_tele,
                         'user_address'      => $userAddr,
                         'user_img'          => $img,
                         'role_id'           => $role_id,
                         'user_created_date' => date('Y-m-d'),
                         'user_created_by'   => $this->session->userdata('user')['user_id']
                         
                        ];      
                  //$this->API_m->create('users',$userData); 


                       $user_idd = $this->cms_m->addOrgDataM($userData,'users');
                        // print_r($re);
                        // exit();
                        
                                   $userAddress = array(
                                         'address1'      =>$userAddr ,
                                         'postcode'   =>$user_postCode ,
                                         'city'     =>$user_city ,
                                         'state'       =>$user_state ,
                                         'country'       =>$user_contry ,
                                         'user_id'       =>$user_idd ,
                                         
                                         );

                      $this->cms_m->dynamicInsertTable($userAddress,'user_addresses');        
                } 
                 // Notification area
                  $activity = [
                      'notify_operation'   => 'user_AddData', //crud name
                      'notify_activity_on' => 9, // id etc
                      'activity_name'      => 'userAddData',  // method name
                      'notify_created_for' => $this->session->userdata('user')['user_id'],
                      'modify_date'        => date('Y-m-d H:i:s')
                  ];
                  $this->API_m->create('notifications', $activity);
             // Notification area end
             $this->session->set_flashdata('success','New Record added successfully');
             redirect('MainContent/userAddView/'); 
                   
        }
       public function deleteUser($id)
       {
          $data = ['user_is_trash'=>1];
            $re = $this->API_m->updateRecord('users',['user_id'=>$id],$data);

              // Notification area
                          $activity = [
                             'notify_operation'   => 'delete_User', //crud name
                             'notify_activity_on' => $id, // id etc
                             'activity_name'      => 'deleteUser',  // method name
                             'notify_created_for' => $this->session->userdata('user')['user_id'],
                             'modify_date'        => date('Y-m-d H:i:s')
                         ];
                         $this->API_m->create('notifications', $activity);
                 // Notification area end
            $this->session->set_flashdata('danger','Record Deleted successfully');
            redirect('MainContent/userList_View');
        
        }
        public function userProfileView()
        {
              $user_id =$this->session->userdata('user')['user_id'];
              $userTabl="users";
              $id=['user_id'=>$user_id];
              // $userInfo['userInfo'] = $this->API_m->singleRecord('users',['user_id'=>$user_id]);
               $userInfo['userInfo'] = $this->cms_m->dynamicGetUpdate($id,$userTabl); 
              //  echo "<pre>";
              // print_r($userInfo);
              // exit();
           $this->load->view('backend/include/head');
           $this->load->view('backend/include/header');
           $this->load->view('backend/include/sideBar');
           $this->load->view('backend/layouts/users/userProfileView',$userInfo);
           $this->load->view('backend/include/footer');
        }
        public function updateUserInfo()
        {
         $name             = $this->input->post('name');
         $fname            = $this->input->post('user_f_name');
         $email            = $this->input->post('email');
         $address          = $this->input->post('address');
         $contact          = $this->input->post('contact');
         $usertele         = $this->input->post('user_telephone');
         $user_idd         = $this->input->post('idd');
               $id=['user_id'=>$user_idd];
             if(!$img = $_FILES['photo']['name'])
               {          
                          $tableUser="users";
                          $arrayUser = array(
                                  'user_fullname'       =>$name,
                                  'user_father_name'    =>$fname,
                                  'user_email'          =>$email,
                                  'user_contact'        =>$contact,
                                  'user_telephone'      =>$usertele,
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
                                   redirect('MainContent/userProfileView');
                                 }
               }
               else
               {
                        $img = $_FILES['photo']['name'];
                        $config['upload_path']      =  realpath(APPPATH."../uploads/");
                        $config['allowed_types']    = 'gif|jpg|png';
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
                                        'user_telephone'      =>$usertele,
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
                             'notify_created_for' => $this->session->userdata('user')['user_id'],
                             'modify_date'        => date('Y-m-d H:i:s')
                         ];
                         $this->API_m->create('notifications', $activity);
                 // Notification area end

               $this->session->set_flashdata('success',' Record updated successfully');
            redirect('MainContent/userProfileView');         
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
                        redirect('MainContent/userProfileView');  
                  }
                  else
                  {
                      echo "not Delete";
                  }
        }
        public function updateUserPassword()
        {
          // echo "<pre>";
          // print_r($_POST);
          // print_r($this->session->userdata('user')['user_id']);
          $user_id =$this->session->userdata('user')['user_id'];
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
           echo json_encode($this->Project_m->verifiedOldPassword($this->input->post('oldPassword')));
        }


// ********** user update data
        public function updateUserData()
        {
// echo "<pre>";
// print_r($_POST);
// exit();
          $prj_id        = $this->input->post('prj_id');
          $app_id        = $this->input->post('app_id');
          $app_rev_date  = $this->input->post('app_received_date');
          $test_date     = $this->input->post('test_date');

          $role_id      = $this->input->post('role_id');
          $user_id      = $this->input->post('user_id');
          $userName     = $this->input->post('user_fullname');
          $userFname    = $this->input->post('user_f_name');
          $userCnic     = $this->input->post('user_cnic');
          $userEmail    = $this->input->post('user_email');
          $userContact  = $this->input->post('user_contact');
          $userTele     = $this->input->post('user_telephone');
          $userAddr     = $this->input->post('user_address');

           $user_city = $this->input->post('city');
              $user_state = $this->input->post('state');
              $user_contry = $this->input->post('country');
              $user_postCode = $this->input->post('postCode');


              $update_user_id=['user_id'=>$user_id];


               $img = $_FILES['photo']['name'];
           $image = '';
          if(!empty($img))
            { 

                $config['upload_path']      =  realpath(APPPATH."../uploads/");
                $config['allowed_types']    = 'gif|jpg|png';
                $this->load->library('upload',$config);
                $this->upload->initialize($config);

                 if(!$this->upload->do_upload('photo'))
                  {
                   print_r($this->upload->display_errors());
                   echo "not inserted";
                  }

                  $image = $_FILES['photo']['name'];
            }
          else 
            {
                 $image = $this->input->post('user_img');
            }
                   
                            $tableUsers="users";
                            $userData = array(
                                    'user_fullname'     => $userName,
                                    'user_father_name'  => $userFname,
                                    'user_email'        => $userEmail,
                                    'user_cnic'         => $userCnic,
                                    'user_contact'      => $userContact,
                                    'user_telephone'    => $userTele,
                                    'user_address'      => $userAddr,
                                    'user_img'          => $image,
                                    'role_id'           => $role_id,
                                    'user_created_date' => date('Y-m-d'),
                                    'user_created_by'   => $this->session->userdata('user')['user_id']
                                    );
                              $tblUsersAdd="user_addresses";
                              $userAddressData = array(
                                         'address1'   =>$userAddr ,
                                         'postcode'   =>$user_postCode ,
                                         'city'       =>$user_city ,
                                         'state'      =>$user_state ,
                                         'country'    =>$user_contry ,
                                        );





                           $this->cms_m->dynamicUpdate($update_user_id,$userAddressData,$tblUsersAdd);

                           $this->cms_m->dynamicUpdate($update_user_id,$userData,$tableUsers);

                            
                     // Notification area
                          $activity = [
                             'notify_operation'   => 'update_User_Data', //crud name
                             'notify_activity_on' => $user_id, // id etc
                             'activity_name'      => 'updateUserData',  // method name
                             'notify_created_for' => $this->session->userdata('user')['user_id'],
                             'modify_date'        => date('Y-m-d H:i:s')
                         ];
                         $this->API_m->create('notifications', $activity);
                 // Notification area end           

            $this->session->set_flashdata('success','Record updated successfully');
                      redirect('MainContent/updateUserView/'.$user_id); 
        }
              
//  finding cnic if already exist

        public function getUserDetail()
        {
            $uCnic = $this->input->post('user_cnic');
            $userData = $this->db
            ->select('*')
            ->where('user_cnic',$uCnic)
            ->get('users')
            ->row();
            echo json_encode($userData);
        }

// **************** insertion of applicants data **************
        
        public function insertApplicants()
        {
          // echo "<pre>";
          // print_r($_POST);
          // exit();
          // echo "<pre>";
 //          print_r($_POST);
 //          exit();
          $prj_id        = $this->input->post('prj_id');
          $app_rev_date  = $this->input->post('ar_date');
          $test_date     = $this->input->post('test_date');
          $test_time     = $this->input->post('test_time');

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
            for($i=0; $i<sizeof($userCnic); $i++)
            {
              $userid = '';
              $usr_id ='';
              if(!empty($userCnic[$i]))
              {
               $userData =
                      array(
                         'user_fullname'     => $userName[$i],
                         'user_father_name'  => $userFname[$i],
                         'user_email'        => $userEmail[$i],
                         'user_cnic'         => $userCnic[$i],
                         'user_contact'      => $userContact[$i],
                         'user_address'      => $userAddr[$i],
                         'role_id'           => $role_id,
                         'user_created_date' => date('Y-m-d'),
                         'user_created_by'   => $this->session->userdata('user')['user_id']
                         
                        );

                  $res = $this->API_m->singleRecord('users',['user_id'=>$user_id[$i]]);
                    if(!empty($res))
                    {
                        $this->API_m->updateRecord('users',['user_id'=>$user_id[$i]],$userData);
                        $userid = $user_id[$i];
                    }
                    else
                    {
                       $userid =  $this->API_m->create('users',$userData);
                         $usr_id = $userid;

                    }

                    // ***** Application Table data

                    $appData = [
                          'user_id'           => $userid,
                          'prj_id'            => $prj_id,
                          'app_received_date' => date('Y-m-d',strtotime($app_rev_date[$i])),
                          'test_date_time'    => date('Y-m-d',strtotime($test_date)).' '.date('H:i:s',strtotime($test_time)),
                          'app_created_date'  => date('Y-m-d'),
                          'app_created_by'    => $this->session->userdata('user')['user_id']
                    ]; 
                    $this->API_m->create('applicants',$appData);
// email configuration  
                    // if(!empty($usr_id))
                    // {
              // $u_res   = $this->API_m->singleRecord('users',['user_id'=>$usr_id]);
              // $to      = $u_res->user_email;
              // $subject = "Job Portal";
              // $body    = "Dear Applicant!<br> Your Application for the applied job in job portal has been Received.<br>Your Date/Time : ".date('Y-m-d',strtotime($test_date));
              // $this->UserEmail_m->sendDataToEmail($to,$subject,$body);
                   // }
// end email configuration 

                    }
                  }
              }
$this->session->set_flashdata('success','Applicants Record added successfully');
              redirect('MainContent/assignToApplicatView/'.$prj_id);
          }

// insert update applicants record
        public function insertUpdateApplicants()
        {
          // echo "<pre>";
          // print_r($_POST);
          // exit();
          // echo "<pre>";
          //          print_r($_POST);
          //          exit();
          $prj_id        = $this->input->post('prj_id');
          $app_rev_date  = $this->input->post('ar_date');
          $test_date     = $this->input->post('test_date');
          $test_time     = $this->input->post('test_time');

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
            for($i=0; $i<sizeof($userCnic); $i++)
            {
              $userid = '';
               $usr_id ='';
              if(!empty($userCnic[$i]))
              {
               $userData =
                      array(
                         'user_fullname'     => $userName[$i],
                         // 'user_father_name'  => $userFname[$i],
                         'user_email'        => $userEmail[$i],
                         'user_cnic'         => $userCnic[$i],
                         'user_contact'      => $userContact[$i],
                         'user_address'      => $userAddr[$i],
                         'role_id'           => $role_id,
                         'user_created_date' => date('Y-m-d'),
                         'user_created_by'   => $this->session->userdata('user')['user_id']
                         
                        );

                  $res = $this->API_m->singleRecord('users',['user_id'=>$user_id[$i]]);
                    if(!empty($res))
                    {
                        $this->API_m->updateRecord('users',['user_id'=>$user_id[$i]],$userData);
                        $userid = $user_id[$i];
                        $uAdd = array(
                         'city'      => $userAddr[$i],
                         'user_id'   => $userid
                         
                        );

                        $this->API_m->updateRecord('user_addresses',['user_id'=>$user_id[$i]],$uAdd);
                    }
                    else
                    {
                       $userid =  $this->API_m->create('users',$userData);
                         $usr_id = $userid;
                       $uAdd = array(
                         'city'      => $userAddr[$i],
                         'user_id'   => $userid
                         
                        );
                        $this->API_m->create('user_addresses',$uAdd);

                    }

                    // ***** Application Table data

                    $appData = [
                          'user_id'           => $userid,
                          'prj_id'            => $prj_id,
                          'app_received_date' => date('Y-m-d',strtotime($app_rev_date[$i])),
                          'test_date_time'    => date('Y-m-d',strtotime($test_date)).' '.date('H:i:s',strtotime($test_time)),
                          'app_created_date'  => date('Y-m-d'),
                          'app_created_by'    => $this->session->userdata('user')['user_id']
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
              }
                  // Notification area
                          $activity = [
                             'notify_operation'   => 'insert_Update_Applicants', //crud name
                             'notify_activity_on' => 11, // id etc
                             'activity_name'      => 'insertUpdateApplicants',  // method name
                             'notify_created_for' => $this->session->userdata('user')['user_id'],
                             'modify_date'        => date('Y-m-d H:i:s')
                         ];
                         $this->API_m->create('notifications', $activity);
                 // Notification area end
$this->session->set_flashdata('success','Applicants Record added successfully');
              redirect('MainContent/AddprjApplicantsList/'.$prj_id);
          }
       
//  ************** Applicants list ********

          public function ApplicantsList()
          {
              $result['appList'] = $this->Project_m->getAllApplicants();
            

              // print_r($result);
              // exit();
             $this->load->view('backend/include/head');
             $this->load->view('backend/include/header');
             $this->load->view('backend/include/sideBar');
             $this->load->view('backend/layouts/applicants/applicantList',$result);
             $this->load->view('backend/include/footer');
          }

// ********* single Project Applicants List
          public function prjApplicantsList($prj_id)
          {
              $result['appList'] = $this->Project_m->getPrjApplicants($prj_id);
              $result['textCenter'] = $this->API_m->get('test_center');
              //  echo "<pre>";
              // print_r($result);
              // exit();
             
              // print_r($result);
              // exit();
             $this->load->view('backend/include/head');
             $this->load->view('backend/include/header');
             $this->load->view('backend/include/sideBar');
             $this->load->view('backend/layouts/applicants/prjApplicantList',$result);
             $this->load->view('backend/include/footer');
          }
// ********** add project applicants list
 public function AddprjApplicantsList($prj_id)
          {
            $result['appList'] = $this->Project_m->getPrjApplicantsList($prj_id);

              // print_r($result);
              // exit();
             $this->load->view('backend/include/head');
             $this->load->view('backend/include/header');
             $this->load->view('backend/include/sideBar');
             $this->load->view('backend/layouts/applicants/AddprjApplicantsList',$result);
             $this->load->view('backend/include/footer');
          } 
//  *********** Generate Rollno# for Applicants againsts single Project
          public function GenerateRollNo($prj_id)
          {

          
            $applicantList = $this->API_m->singleRecordArray('applicants',['prj_id'=>$prj_id]);
            // $applicantList = $this->API_m->singleRecordArray('applicants',['prj_id'=>$prj_id]);

            // echo "<pre>";
            // print_r($prj_id);
            // print_r($applicantList);
            // exit();

          // $rlList =  strlen(sizeof($applicantList));
        $rlprj = $this->API_m->singleRecordArray('rollno',['prj_id'=>$prj_id]);
           $count  = 1;
          if(!empty($rlprj))
          {
            $lstRln = $this->db->where('prj_id',$prj_id)->order_by('roll_no','DESC')->get('rollno')->row();
            // if($lstRln)
            // {
              $count  = $lstRln->roll_no+1;
            // }
          }
          else
          {
            $count  = 1;
          }

// **************** Rollno Data
            foreach($applicantList as $list)
            {

// ********* Rollno Generation of each Applicant
$rn = sprintf('%04d',$count);
      // echo "<pre>";
      // print_r($rn);
      // exit();


                  $rollnoData = [ 
                      'roll_no'              => $rn,
                      'user_id'              => $list->user_id,
                      'prj_id'               => $list->prj_id,
                      'app_id'               => $list->app_id,
                      'rollno_created_date'  => date('Y-m-d'),
                      'rollno_created_by'    => $this->session->userdata('user')['user_id']
                ];
                $ar = $this->API_m->singleRecord('rollno',['app_id'=>$list->app_id]); 
                if(!empty($ar))
                {
                    // $this->API_m->updateRecord('rollno',['rollno_id'=>$ar->rollno_id],$rollnoData);
                }
                else
                {
                   $this->API_m->create('rollno',$rollnoData); 
// email configuration  
              // $u_res   = $this->API_m->singleRecord('users',['user_id'=>$list->user_id]);
              // $to      = $u_res->user_email;
              // $subject = "Job Portal";
              // $body    = "Dear Applicant!<br> Your Rollno for the applied job in job portal is : ".$rn;
              // $this->UserEmail_m->sendDataToEmail($to,$subject,$body);
// end email configuration 
                $count++;
                }
            
            }

                  // Notification area
                          $activity = [
                             'notify_operation'   => 'GenerateRollNo', //crud name
                             'notify_activity_on' =>  $prj_id, // id etc
                             'activity_name'      => 'GenerateRollNo',  // method name
                             'notify_created_for' => $this->session->userdata('user')['user_id'],
                             'modify_date'        => date('Y-m-d H:i:s')
                         ];
                         $this->API_m->create('notifications', $activity);
                 // Notification area end
            
             $this->session->set_flashdata('success','Rollno list are Generated successfully');
             redirect('MainContent/AddprjApplicantsList/'.$prj_id);
          }

//  ********** Rollno# View of single project
          public function prjRollnoView($prj_id)
          {
             // $result['rollnoList'] = $this->API_m->singleRecordArray('rollno',['prj_id' => $prj_id]);
             $result['rollnoList'] = $this->Project_m->getPrjRollnoList($prj_id);
             $this->load->view('backend/include/head');
             $this->load->view('backend/include/header');
             $this->load->view('backend/include/sideBar');
             $this->load->view('backend/layouts/applicants/applicantRnoList',$result);
             $this->load->view('backend/include/footer');
          }
/*********** start code for attendence *************/ 
          public function attendenceView($id)
          {
             //$result['appList'] = $this->Project_m->getPrjResultList($id);
             $result['appList'] = $this->Project_m->addAttendence($id);
             $this->load->view('backend/include/head');
             $this->load->view('backend/include/header');
             $this->load->view('backend/include/sideBar');
             $this->load->view('backend/layouts/attendence/attendence.php',$result);
             $this->load->view('backend/include/footer'); 
          }
          public function attendenceListView($id)
          {
             $result['attendenceList'] = $this->Project_m->getPrjAttendenceList($id);
             $this->load->view('backend/include/head');
             $this->load->view('backend/include/header');
             $this->load->view('backend/include/sideBar');
             $this->load->view('backend/layouts/attendence/attendenceListView',$result);
             $this->load->view('backend/include/footer'); 
          }
          public function insertAttendence()
          { 

            // echo "<pre>";
            // print_r($_POST['app_id']);
            // exit();
                  $prj_id     = $this->input->post('prj_id');
                  $app_id     = $this->input->post('app_id');
                  $atten      = $this->input->post('atten');
                  $test_date  = $this->input->post('test_date');
                  $tableName  ="attendence";
                    


               // if()
               // {

               // }
               $re = $this->API_m->delete('attendence',['prj_id'=>$prj_id]);
                if(!empty($app_id))
                {
                  for($i=0; $i<sizeof($app_id); $i++)
                   {
                      $arrayAttendence = array(
                                    'app_id'         =>$app_id[$i], 
                                    'prj_id'         =>$prj_id,
                                    'test_date_time' =>date('Y-m-d',strtotime($test_date[$i])),
                                    'status'         =>$atten[$i]
                                  );

                      $re =  $this->cms_m->insertAttendanceM($arrayAttendence);
                   } 
                }
                  // Notification area
                          $activity = [
                             'notify_operation'   => 'insertAttendence', //crud name
                             'notify_activity_on' =>  $prj_id, // id etc
                             'activity_name'      => 'insert_Attendence',  // method name
                             'notify_created_for' => $this->session->userdata('user')['user_id'],
                             'modify_date'        => date('Y-m-d H:i:s')
                         ];
                         $this->API_m->create('notifications', $activity);
                 // Notification area end
                 $this->session->set_flashdata('success','Attendence Records Added Successfully');
                 redirect('MainContent/attendenceView/'.$prj_id);
           }

/*********** End code for attendence *************/          

        public function assignResultView($prj_id)
        {
             $result['appList'] = $this->Project_m->getPrjResultList($prj_id);
             $this->load->view('backend/include/head');
             $this->load->view('backend/include/header');
             $this->load->view('backend/include/sideBar');
             $this->load->view('backend/layouts/applicants/assignResultView',$result);
             $this->load->view('backend/include/footer');
        }

        public function InsertApplicantsResults()
        {
            // echo "<pre>";
            // print_r($_POST);
            // exit();

              $prj_id    = $this->input->post('prj_id');
              $user_id   = $this->input->post('user_id');
              $app_id    = $this->input->post('app_id');
              $rollno_id = $this->input->post('rollno_id');
              $obt_marks = $this->input->post('obt_marks');
              $percent   = $this->input->post('percent');
              if(!empty($user_id))
              {
                  for($i=0; $i<sizeof($user_id); $i++)
                  {

                      $resultData = [ 
                          'prj_id'            => $prj_id,
                          'user_id'           => $user_id[$i],
                          'app_id'            => $app_id[$i],
                          'rollno_id'         => $rollno_id[$i],
                          'obt_marks'         => $obt_marks[$i],
                          'percentage'        => $percent[$i],
                          'res_created_date'  => date('Y-m-d'),
                          'res_created_by'    => $this->session->userdata('user')['user_id']
                    ]; 
          $r = $this->API_m->singleRecord('result',['prj_id'=>$prj_id,'app_id'=>$app_id[$i]]);
                    if(!empty($r))
                    {
                        $this->API_m->updateRecord('result',['app_id'=>$app_id[$i]],$resultData);
                    }
                    else
                    {
                      $this->API_m->create('result',$resultData); 
// email configuration  
              // $u_res   = $this->API_m->singleRecord('users',['user_id'=>$user_id[$i]]);
              // $to      = $u_res->user_email;
              // $subject = "Job Portal";
              // $body    = "Dear Applicant!<br> Your Result for the applied job in job portal has been Announced.";
              // $this->UserEmail_m->sendDataToEmail($to,$subject,$body);
// end email configuration 
                    }



                 }
              }

                 // Notification area
                          $activity = [
                             'notify_operation'   => 'Insert_Applicants_Results', //crud name
                             'notify_activity_on' =>  $prj_id, // id etc
                             'activity_name'      => 'InsertApplicantsResults',  // method name
                             'notify_created_for' => $this->session->userdata('user')['user_id'],
                             'modify_date'        => date('Y-m-d H:i:s')
                         ];
                         $this->API_m->create('notifications', $activity);
                 // Notification area end
            
           $this->session->set_flashdata('success','Applicants Results  added successfully');
            redirect('MainContent/assignResultView/'.$prj_id);

        }

//  Applicants Results ProjectWise
        public function getPrjAppResults($prj_id)
        {
             $result['ResultList'] = $this->Project_m->getAppResultsList($prj_id);
             $this->load->view('backend/include/head');
             $this->load->view('backend/include/header');
             $this->load->view('backend/include/sideBar');
             $this->load->view('backend/layouts/applicants/applicantsResultsList',$result);
             $this->load->view('backend/include/footer');
        }

// *** START **** assigning check applicants for test center
        public function checkedApplicant()
        {
            // echo "<pre>";
            // print_r($_POST);
            // exit();
            $prj_id    = $this->input->post('prj_id');
            $app_id    = $this->input->post('app_id');
            $center_id = $this->input->post('center_id'); 
            $tst_date  = $this->input->post('test_date');
            $tst_time  = $this->input->post('test_time');
// ************* insert/update of test date/time for applicants
             if(!empty($tst_date))
              {
                  for($i=0; $i<sizeof($app_id);$i++)
                  {
                      $arrTest = [
                         'test_date_time'    => date('Y-m-d',strtotime($tst_date)).' '.date('H:i:s',strtotime($tst_time))
                      ];
                      $res = $this->API_m->singleRecord('applicants',['app_id'=>$app_id[$i]]);
                      if(!empty($res))
                      {
                        $this->API_m->updateRecord('applicants',['app_id'=>$app_id[$i]],$arrTest);
                      }
                      
                  }
              }
// ************* end insert/update of test date/time for applicants


//  ****************** insert applicant test center code
              if(!empty($center_id))
              {
                  for($i=0; $i<sizeof($app_id);$i++)
                  {
                      $arr = [
                          'tc_app_id'    => $app_id[$i],
                          'tc_prj_id'    => $prj_id,
                          'tc_center_id' => $center_id
                      ];
// echo "<pre>";
// print_r($arrTest);
// exit();
                      $res = $this->API_m->singleRecord('applicant_test_center',['tc_app_id'=>$app_id[$i]]);
                      if(!empty($res))
                      {
                        $this->API_m->updateRecord('applicant_test_center',['tc_app_id'=>$app_id[$i]],$arr);
                      }
                      else
                      {
                        $this->API_m->create('applicant_test_center',$arr);
                      }
                  }
              }
// ******************* end insertion of applicant test center code

                // Notification area
                          $activity = [
                             'notify_operation'   => 'checkedApplicant', //crud name
                             'notify_activity_on' =>  $prj_id, // id etc
                             'activity_name'      => 'checkedApplicant',  // method name
                             'notify_created_for' => $this->session->userdata('user')['user_id'],
                             'modify_date'        => date('Y-m-d H:i:s')
                         ];
                         $this->API_m->create('notifications', $activity);
                 // Notification area end
            $this->session->set_flashdata('success','Test Center Assigned to Selected Applicants');
            redirect('MainContent/prjApplicantsList/'.$prj_id);
        }
// ***** END **** assigning check applicants for test center


        public function applicantProfile_View($id)
        {
             // print_r($result);
             // exit();
             $result['prjHis']  = $this->Project_m->ApplicantPrjHistory($id);
             $result['udata']   = $this->API_m->singleRecord('users',['user_id'=>$id]);
             $result['tPrj']    = $this->API_m->countAllRows('applicants',['user_id'=>$id]);
             $this->load->view('backend/include/head');
             $this->load->view('backend/include/header');
             $this->load->view('backend/include/sideBar');
             $this->load->view('backend/layouts/applicants/applicantProfile',$result);
             $this->load->view('backend/include/footer');
        }  

//  Dashboard sidebar search through Applicant id
        public function findSearch()
        {
          $prj_name = $this->input->post('prj_name');
          // echo"<pre>";
          // print_r($prj_name);
          // exit();
          $result['prjLists'] = $this->cms_m->findSerachData($prj_name);
          // echo "<pre>";
          // print_r($result);
          // exit();


          if(sizeof($result['prjLists'])>1)
          {
                // echo "<pre>";
                // //print_r($result);

                // echo'deer dadata';
                //  exit();


             //$result['projectList'] = $this->Project_m->getProjects();

              // print_r($result);
              // exit();
             $this->load->view('backend/include/head');
             $this->load->view('backend/include/header');
             $this->load->view('backend/include/sideBar');
             $this->load->view('backend/layouts/projects/searchPrjList',$result);
             $this->load->view('backend/include/footer');
          }
          else if(sizeof($result['prjLists'])==1)
          {
            
            // foreach ($result['prjLists'] as $key => $row) 
            // {
            
            //  $id=$row['prj_id'];
            // }
           $id = $result['prjLists'][0]['prj_id'];
            // print_r($result['prjLists'][0]['prj_id']);
            // echo "<pre>";
            //   print_r($result['prjLists']);
            //   // echo $id;
            //    exit();

             $result['prjLists']     = $this->Project_m->getPrjFullView($id);
             $result['prj_img']      = $this->API_m->singleRecordArray('prj_img',['project_id'=>$id]);
             $result['appliedLists'] = $this->Project_m->appliedPrjApplicants($id);
           
             $this->load->view('backend/include/head');
             $this->load->view('backend/include/header');
             $this->load->view('backend/include/sideBar');
             $this->load->view('backend/layouts/projects/projectDetail',$result);
             $this->load->view('backend/include/footer');
          }
          else
          {
              redirect('MainContent/notFoundPage');
          }
        }
        public function notFoundPage()
        {
           $this->load->view('backend/include/head');
           $this->load->view('backend/include/header');
           $this->load->view('backend/include/sideBar');
           $this->load->view('backend/notFound');
           $this->load->view('backend/include/footer');
        }

   }
?>