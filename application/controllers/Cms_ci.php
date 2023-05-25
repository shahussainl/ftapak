<?php

class Cms_ci extends CI_Controller
{
     
    function __construct() 
    {
        parent::__construct();
        $this->load->helper('form');
        date_default_timezone_set('Asia/Karachi');
        if(!$this->session->userdata('user'))
        {
          redirect('Admin/logout');
        }
        // die();
    }
   

        public function orgListView()
        {
            
           $result['orgAllData']= $this->cms_m->dynamicGetTable("organization");
           // print_r($result);
           // exit();
           $this->load->view('backend/include/head');
           $this->load->view('backend/include/header');
           $this->load->view('backend/include/sideBar');
           $this->load->view('backend/layouts/org/orgList',$result);
           $this->load->view('backend/include/footer');
        }
    
        public function orgAddview()
        {
           $this->load->view('backend/include/head');
           $this->load->view('backend/include/header');
           $this->load->view('backend/include/sideBar');
           $this->load->view('backend/layouts/org/addOrg');
           $this->load->view('backend/include/footer');
        }

        public function orgupdateview($id)
        {
             $idd=['org.org_id'=>$id];
             $tableName="organization";
            $result['imagedata']  = $this->cms_m->getImageForUpdate($id);
            $result['updateData'] = $this->cms_m->getOrgUpdateData($idd);
            // print_r($resullt);
            // exit(); 
           $this->load->view('backend/include/head');
           $this->load->view('backend/include/header');
           $this->load->view('backend/include/sideBar');
           $this->load->view('backend/layouts/org/orgUpdateView',$result);
           $this->load->view('backend/include/footer');
        }
        public function singleImgaeDalet($id)
        {
            $re = $this->cms_m->singleImgaeDaletModel($id);

        }
        public function addOrgData()
        {
          // echo "<pre>"; 
          // print_r($_POST);
          // print_r($_FILES);
          // die();
          $org_name = $this->input->post('org_name');
          $org_email = $this->input->post('email');
          $org_contact = $this->input->post('contact');
          $org_fax = $this->input->post('fax');
          $org_type = $this->input->post('org_type');
          $org_address = $this->input->post('address');

          $org_city = $this->input->post('city');
          $org_state = $this->input->post('state');
          $org_contry = $this->input->post('country');
          $org_postCode = $this->input->post('postCode');
          $editor1        = $this->input->post('editor1');
          $start_date = $this->input->post('startdate');
          $expirydate = $this->input->post('expirydate');

          $tableName="organization";
          $tblAddress="org_addresses";
          $city =  ucfirst($org_city);

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
              $image = " ";
            }       
            $orgData = array(
              'org_name'      =>$org_name ,
              'org_contact'   =>$org_contact ,
              'org_email'     =>$org_email ,
              'org_fax'       =>$org_fax ,
              'org_address'   =>$org_address ,
              'org_type'      =>$org_type , 
              'org_logo'      =>$image ,
              'org_desc'      =>$editor1,
              'org_created_by' =>$this->session->userdata('user')['user_id'], 
              'startdate'      => date('Y-m-d',strtotime($start_date)),
              'expirydate'     => date('Y-m-d',strtotime($expirydate))
              );

            $org_idd = $this->cms_m->addOrgDataM($orgData,$tableName);
            $orgAddress = array(
                'address1'      =>$org_address ,
                'postcode'   =>$org_postCode ,
                'city'     =>$city ,
                'state'       =>$org_state ,
                'country'       =>$org_contry ,
                'org_id'       =>$org_idd ,
                
                );
          $re_id = $this->cms_m->dynamicInsertTable($orgAddress,$tblAddress);
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
                          $uploadImgData[$i]['orgp_file']  = $imageData['file_name']; 
                          $uploadImgData[$i]['orgp_id']    = $re_id;
                          $uploadImgData[$i]['img_title']  = $img_titlee[$i];

                       }
                 }
                 if(!empty($uploadImgData))
                  {
                    // Insert files data into the database
                      $re =  $this->cms_m->multiple_images($uploadImgData);            
                  }
                  
                  
              }
                                // Notification area
                                  $activity = [
                                    'notify_operation'   => 'add_Org_data', //crud name
                                    'notify_activity_on' => 5, // id etc
                                    'activity_name'      => 'addOrgData',  // method name
                                    'notify_created_for' => $this->session->userdata('user')['user_id'],
                                    'modify_date'        => date('Y-m-d H:i:s')
                                  ];
                                  $this->API_m->create('notifications', $activity);
                                // Notification area end
                                $this->session->set_flashdata('success','New Record Added successfully');
                                redirect('Cms_ci/orgAddview');
              
        }
        public function deleteOrg($id)
        {
          $tableName="organization";
          $idd = ['org_id'=>$id];
          
            $this->cms_m->dynamicDelete($idd,$tableName);

            // Notification area
              $activity = [
                'notify_operation'   => 'delete_Org_data', //crud name
                'notify_activity_on' => $org_idd, // id etc
                'activity_name'      => 'deleteOrg',  // method name
                'notify_created_for' => $this->session->userdata('user')['user_id'],
                'modify_date'        => date('Y-m-d H:i:s')
              ];
              $this->API_m->create('notifications', $activity);
            // Notification area end
            $this->session->set_flashdata('danger','Record Deleted successfully');
            redirect('Cms_ci/orgListView');
        }
        public function updateOrgData()
        {
              $org_name = $this->input->post('org_name');
              $org_idd = $this->input->post('org_idd');
              $org_email = $this->input->post('email');
              $org_contact = $this->input->post('contact');
              $org_fax = $this->input->post('fax');
              $org_type = $this->input->post('org_type');
              $org_address = $this->input->post('address');
              $org_city = $this->input->post('city');
              $org_state = $this->input->post('state');
              $org_contry = $this->input->post('contry');
              $org_postCode = $this->input->post('postCode');
              $editor1 = $this->input->post('editor1');
              $start_date = $this->input->post('startdate');
              $expirydate = $this->input->post('expirydate');
                
              $uploadImgData = [];
            $city =  ucfirst($org_city);
            $u_id = ['org_id'=>$org_idd];
            $tableName="organization";
            $tblAddress="org_addresses";
          
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
                 $image = $this->input->post('old_image');
            }

                     $orgUpdateData = array(
                                  'org_logo'      =>$image ,
                                  'org_name'      =>$org_name ,
                                  'org_contact'   =>$org_contact ,
                                  'org_email'     =>$org_email ,
                                  'org_fax'       =>$org_fax ,
                                  'org_address'   =>$org_address ,
                                  'org_type'      =>$org_type,
                                  'org_desc'      =>$editor1,
                                  'startdate'      => date('Y-m-d',strtotime($start_date)),
                                  'expirydate'     => date('Y-m-d',strtotime($expirydate))
                             );
                     $orgAddressData = array(
                                         'address1'   =>$org_address ,
                                         'postcode'   =>$org_postCode ,
                                         'city'       =>$city ,
                                         'state'      =>$org_state ,
                                         'country'    =>$org_contry ,
                                        );

                      $this->cms_m->dynamicUpdate($u_id,$orgAddressData,$tblAddress);
                      $this->cms_m->dynamicUpdate($u_id,$orgUpdateData,$tableName);


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
                           $uploadImgData[$i]['orgp_file'] = $imageData['file_name']; 
                           $uploadImgData[$i]['orgp_id']    = $org_idd;
                           $uploadImgData[$i]['img_title']  = $img_titlee[$i];

                        }
                  }
                  if(!empty($uploadImgData))
                   {
                     // Insert files data into the database
                     $re =  $this->cms_m->multiple_images_update($uploadImgData);
                     if(!$re)
                     {
                        echo "Not inserted";
                     }
                  }
                          // Notification area
                            $activity = [
                              'notify_operation'   => 'update_Org_Data', //crud name
                              'notify_activity_on' => $org_idd, // id etc
                              'activity_name'      => 'updateOrgData',  // method name
                              'notify_created_for' => $this->session->userdata('user')['user_id'],
                              'modify_date'        => date('Y-m-d H:i:s')
                            ];
                            $this->API_m->create('notifications', $activity);
                          // Notification area end
                          $this->session->set_flashdata('success','Record updated successfully');
                          redirect('Cms_ci/orgupdateview/'.$org_idd);   

        }
        public function deleteOrgImg($id)
        {
            $data = array('org_logo'=>'');
            $idd=['org_id'=>$id];
            $tableOrg="organization"; 

          $re = $this->cms_m->updateTrash($idd,$tableOrg,$data);
             if(!empty($re))
             {

               // Notification area
                  $activity = [
                    'notify_operation'   => 'delete_Org_Img', //crud name
                    'notify_activity_on' => $id, // id etc
                    'activity_name'      => 'deleteOrgImg',  // method name
                    'notify_created_for' => $this->session->userdata('user')['user_id'],
                    'modify_date'        => date('Y-m-d H:i:s')
                  ];
                  $this->API_m->create('notifications', $activity);
                // Notification area end
               $this->session->set_flashdata('danger','Record Deleted successfully');
               redirect('Cms_ci/orgupdateview/'.$id);   
             }
             else
             {
                 echo "not Delete";
             }
      
        }
 /*****************************************start Contact code**************************************************/
        public function contactView()
        {
          $result['contactData'] = $this->cms_m->getContact("contact",'con_id',['con_is_trash'=>'0']);
          // print_r($result);
          // exit();
           $this->load->view('backend/include/head');
           $this->load->view('backend/include/header');
           $this->load->view('backend/include/sideBar');
           $this->load->view('backend/layouts/contacts/contactView',$result);
           $this->load->view('backend/include/footer');
        }

        public function AddContactData()
        {
               $Contact_name = $this->input->post('name');
               $Contact_number = $this->input->post('phone_number');
               $Contact_email = $this->input->post('email');
               $Contact_address = $this->input->post('address');
               $Contact_status = $this->input->post('status');

               $tableContact="contact";

               $arrayContact = array(
                                  'con_title'     =>$Contact_name ,
                                  'con_mob'       =>$Contact_number ,
                                  'con_email'     =>$Contact_email ,
                                  'con_address'   =>$Contact_address ,
                                  'con_primary'   =>$Contact_status 
                                   );
                   $this->cms_m->dynamicInsertTable($arrayContact,$tableContact);

                // Notification area
                  $activity = [
                    'notify_operation'   => 'AddContactData', //crud name
                    'notify_activity_on' => 5, // id etc
                    'activity_name'      => 'AddContactData',  // method name
                    'notify_created_for' => $this->session->userdata('user')['user_id'],
                    'modify_date'        => date('Y-m-d H:i:s')
                  ];
                  $this->API_m->create('notifications', $activity);
                // Notification area end
                   $this->session->set_flashdata('success','New Record Added successfully');
                   redirect('Cms_ci/contactView');            
         } 
         public function updateContactData()
         {
               $Contact_name = $this->input->post('name');
               $u_idd = $this->input->post('idd');
               $Contact_number = $this->input->post('phone_number');
               $Contact_email = $this->input->post('email');
               $Contact_address = $this->input->post('address');
               $Contact_status = $this->input->post('status');

               $id=['con_id'=>$u_idd];
               $tableContact="contact";
               $arrayContact = array(
                                  'con_title'    =>$Contact_name ,
                                  'con_mob'      =>$Contact_number ,
                                  'con_email'    =>$Contact_email ,
                                  'con_address'  =>$Contact_address ,
                                  'con_primary'  =>$Contact_status
                                   );
               $this->cms_m->dynamicUpdate($id,$arrayContact,$tableContact);

                 // Notification area
                  $activity = [
                    'notify_operation'   => 'update_Contact_Data', //crud name
                    'notify_activity_on' => $u_idd, // id etc
                    'activity_name'      => 'updateContactData',  // method name
                    'notify_created_for' => $this->session->userdata('user')['user_id'],
                    'modify_date'        => date('Y-m-d H:i:s')
                  ];
                  $this->API_m->create('notifications', $activity);
                // Notification area end
               $this->session->set_flashdata('success','Record updated successfully');
               redirect('Cms_ci/contactView');
             
         }
         public function deleteContact($id)
         {
                $tableContact="contact";
                $updateTrash=array('con_is_trash'=>1);
                $idd=['con_id'=>$id];
                $this->cms_m->updateTrash($idd,$tableContact,$updateTrash);
                // Notification area
                  $activity = [
                    'notify_operation'   => 'delete_Contact', //crud name
                    'notify_activity_on' => $id, // id etc
                    'activity_name'      => 'deleteContact',  // method name
                    'notify_created_for' => $this->session->userdata('user')['user_id'],
                    'modify_date'        => date('Y-m-d H:i:s')
                  ];
                  $this->API_m->create('notifications', $activity);
                // Notification area end
                $this->session->set_flashdata('danger','Record Deleted successfully');
                redirect('Cms_ci/contactView');
         } 
/*****************************************End Contact code**************************************************/ 



/*****************************************start blog code**************************************************/

    public function newsView()
      {
           $result['newsData']=$this->cms_m->getContact('news_updates','n_u_id',['n_u_is_trash'=>'0']);
           $this->load->view('backend/include/head');
           $this->load->view('backend/include/header');
           $this->load->view('backend/include/sideBar');
           $this->load->view('backend/layouts/news/newsView',$result);
           $this->load->view('backend/include/footer');
      }
      public function newsAddView()
      {
           $this->load->view('backend/include/head');
           $this->load->view('backend/include/header');
           $this->load->view('backend/include/sideBar');
           $this->load->view('backend/layouts/news/newsAdd');
           $this->load->view('backend/include/footer');
      }
      public function newsUpdateView($id)
      {   
            $idd=['n_u_id'=>$id];
            $tableName="news_updates";
            $result['updateData']=$this->cms_m->dynamicGetUpdate($idd,$tableName);
            $img_id=['news_id'=>$id];
            $imgTable="n_u_img";
            $result['imagedata'] = $this->Project_m->getImageForUpdateNew($img_id,$imgTable);

           $this->load->view('backend/include/head');
           $this->load->view('backend/include/header');
           $this->load->view('backend/include/sideBar');
           $this->load->view('backend/layouts/news/updateNewsView',$result);
           $this->load->view('backend/include/footer');
      }
      public function addNewsData()
      {
        // echo "<pre>";
        // print_r($_POST);
        // print_r($_FILES);
        // exit();
         $title = $this->input->post('title');
         $short_desc = $this->input->post('short_desc');
         $datee = $this->input->post('datee');
         $editor1 = $this->input->post('desc');
       
                     $tableNews="news_updates";
                     $arrayNews = array(
                           'n_u_title'       =>$title,
                           'n_u_short_desc'  =>$short_desc,
                           'n_u_long_desc'   =>$editor1,
                           'n_u_date'        =>date('Y-m-d',strtotime($datee)),
                           'n_u_created_by' =>$this->session->userdata('user')['user_id'],
                           );

                     $re_id = $this->Project_m->dynamicInsertGetId($arrayNews,$tableNews);
                     // print_r($re_id);
                     // exit();

                       // Notification area
                           $activity = [
                              'notify_operation'   => 'addNews&updatesData', //crud name
                              'notify_activity_on' => 2, // id etc
                              'activity_name'      => 'addNewsData',  // method name
                              'notify_created_for' => $this->session->userdata('user')['user_id'],
                              'modify_date'        => date('Y-m-d H:i:s')
                            ];
                           $this->API_m->create('notifications', $activity);
                         // Notification area end


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
                              $config['allowed_types'] = 'jpg|jpeg|png|gif|pdf';
                              $this->load->library('upload', $config);
                              $this->upload->initialize($config);

                                   // Upload file to server
                                   if($this->upload->do_upload('file'))
                                     {
                                        // Uploaded file data
                                        $imageData = $this->upload->data();
                                        $uploadImgData[$i]['img'] = $imageData['file_name']; 
                                        $uploadImgData[$i]['news_id'] = $re_id;
                                     }
                          }
                      if(!empty($uploadImgData))
                        {
                            $tableNewsImg="n_u_img";
                            $re =  $this->cms_m->dynamic_multiple_images($tableNewsImg,$uploadImgData);
                               if(!$re)
                               {
                                echo "Not inserted";
                               }
                               else
                               {
                                redirect('Cms_ci/newsView'); 
                                }            
                        }       
                }
               redirect('Cms_ci/newsView');   
         // }
      }   
      public function updateNewsData()
      {
            $title = $this->input->post('title');
            $u_idd = $this->input->post('idd');
            $short_desc = $this->input->post('short_desc');
            $datee = $this->input->post('datee');
            $editor1 = $this->input->post('editor1');
                    
                    $id_u=['n_u_id'=>$u_idd];
                    $tableNews="news_updates";
                     $arrayNews = array(
                           'n_u_title'       =>$title,
                           'n_u_short_desc'  =>$short_desc,
                           'n_u_long_desc'   =>$editor1,
                           'n_u_date'        =>date('Y-m-d',strtotime($datee)),
                           );

                    $re = $this->cms_m->dynamicUpdate($id_u,$arrayNews,$tableNews);
                   
                     // Notification area
                           $activity = [
                              'notify_operation'   => 'updateNews&UpdatesData', //crud name
                              'notify_activity_on' => $u_idd, // id etc
                              'activity_name'      => 'updateNewsData',  // method name
                              'notify_created_for' => $this->session->userdata('user')['user_id'],
                              'modify_date'        => date('Y-m-d H:i:s')
                            ];
                           $this->API_m->create('notifications', $activity);
                         // Notification area end

               

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
                      $config['allowed_types'] = 'jpg|jpeg|png|gif';

                      // Load and initialize upload library
                      $this->load->library('upload', $config);
                      $this->upload->initialize($config);

                      // Upload file to server
                         if($this->upload->do_upload('file'))
                           {
                              // Uploaded file data
                              $imageData = $this->upload->data();
                              $uploadImgData[$i]['img'] = $imageData['file_name']; 
                              $uploadImgData[$i]['news_id'] = $u_idd;
                           }
                  }
              if(!empty($uploadImgData))
               {
                     // Insert files data into the database
                  $tbalImg="n_u_img";
                  $re =  $this->cms_m->dynamic_multiple_images($tbalImg, $uploadImgData);
                     if(!$re)
                     {
                        echo "Not inserted";
                     }
                     else
                     {
                     
                      redirect('Cms_ci/newsUpdateView/'.$u_idd);  
                     }               
                }
                   redirect('Cms_ci/newsUpdateView/'.$u_idd); 
               
       }
       public function deleteNews($id)
       {
                $idd=['n_u_id'=>$id];
                $tableNews="news_updates";
                $updateTrash=array('n_u_is_trash'=>1);
                $re = $this->cms_m->updateTrash($idd,$tableNews,$updateTrash);
                    if(!$re)
                     {
                      echo "Not Inserted";
                     }
                    else
                      {
                          // Notification area
                           $activity = [
                              'notify_operation'   => 'delete_News_Updates', //crud name
                              'notify_activity_on' => $id, // id etc
                              'activity_name'      => 'deleteNews',  // method name
                              'notify_created_for' => $this->session->userdata('user')['user_id'],
                              'modify_date'        => date('Y-m-d H:i:s')
                            ];
                           $this->API_m->create('notifications', $activity);
                         // Notification area end
                        $this->session->set_flashdata('danger','Record Deleted successfully');
                        redirect('Cms_ci/newsView');
                      }

       }
      public function deleteNewsImg($id)
      {
       //print_r($id);
         $tableName="n_u_img";
         $idd=['img_u_n_id'=>$id];
         $re = $this->cms_m->dynamicDeleteImge($idd,$tableName);
           // Notification area
            $activity = [
               'notify_operation'   => 'deleteNews&Updates_Imgages', //crud name
               'notify_activity_on' => $id, // id etc
               'activity_name'      => 'deleteNewsImg',  // method name
               'notify_created_for' => $this->session->userdata('user')['user_id'],
               'modify_date'        => date('Y-m-d H:i:s')
             ];
            $this->API_m->create('notifications', $activity);
          // Notification area end
         

      }


/*****************************************End blog code**************************************************/

/*****************************************Start About Code**************************************************/
      public function aboutViewFun()
      {
          $result['aboutData'] = $this->cms_m->getContact("about",'abt_id',['abt_is_trash'=>'0']);
          // print_r($result);
          // exit();
           $this->load->view('backend/include/head');
           $this->load->view('backend/include/header');
           $this->load->view('backend/include/sideBar');
           $this->load->view('backend/layouts/about/aboutView',$result);
           $this->load->view('backend/include/footer');
      }

      public function addAboutData()
      {
        
        
         $title = $this->input->post('title');
         $datee = $this->input->post('datee');
         $editor1 = $this->input->post('editor1');
      
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
                        
                     $tableNews="about";
                     $arrayNews = array(
                           'abt_title'         =>$title,
                           'abt_desc'          =>$editor1,
                           'abt_file'          =>$img,
                           'abt_created_date'  =>date("d-m-Y"),
                           'abt_created_by'    =>$this->session->userdata('user')['user_id'],
                           );

                    $re = $this->cms_m->dynamicInsertTable($arrayNews,$tableNews);

                       if(!$re)
                       {
                         echo "Not Added Picture";
                       }
                       else
                       {               
                         // Notification area
                                  $activity = [
                                     'notify_operation'   => 'add_AboutData', //crud name
                                     'notify_activity_on' => 2, // id etc
                                     'activity_name'      => 'addAboutData',  // method name
                                     'notify_created_for' => $this->session->userdata('user')['user_id'],
                                     'modify_date'        => date('Y-m-d H:i:s')
                                 ];
                                 $this->API_m->create('notifications', $activity);
                         // Notification area end
                         $this->session->set_flashdata('success','New Record Added successfully');
                         redirect('Cms_ci/aboutViewFun');
                       }
                }
      }
      public function updateAboutData()
      {
         $title = $this->input->post('title');
         $u_id = $this->input->post('idd');
         $editor1 = $this->input->post('editor');
  
               $id_u=['abt_id'=>$u_id];

               // Notification area
         $activity = [
            'notify_operation'   => 'update_About', //crud name
            'notify_activity_on' => 2, // id etc
            'activity_name'      => 'updateAboutData',  // method name
            'notify_created_for' => $this->session->userdata('user')['user_id'],
            'modify_date'        => date('Y-m-d H:i:s')
        ];
        $this->API_m->create('notifications', $activity);
// Notification area end
             
               if(!$img = $_FILES['photo']['name'])
               {
                            $tableAbout="about";
                            $arrayAbout = array(
                                  'abt_title'            =>$title,
                                  'abt_desc'             =>$editor1,
                                  'abt_created_date'     =>date("d-m-Y"),
                                  'abt_created_by'       =>$this->session->userdata('user')['user_id'],
                                  );
                   
                            $re = $this->cms_m->$re = $this->cms_m->dynamicUpdate($id_u,$arrayAbout,$tableAbout);
                            
                             if(!$re)
                                {
                                  echo "Not Added Picture";
                                }
                                else
                                {
$this->session->set_flashdata('success','Record updated successfully');
                                     redirect('Cms_ci/aboutViewFun');
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
                        
                            $tableAbout="about";
                            $arrayAbout = array(
                                  'abt_title'          =>$title,
                                  'abt_desc'           =>$editor1,
                                  'abt_file'           =>$img,
                                  'abt_created_date'   =>date("d-m-Y"),
                                  'abt_created_by'     =>$this->session->userdata('user')['user_id'],
                                  );

                            $re =  $this->cms_m->dynamicUpdate($id_u,$arrayAbout,$tableAbout);
                               if(!$re)
                                {
                                  echo "Not Added Picture";
                                }
                                else
                                {
                       $this->session->set_flashdata('success','Record updated successfully');
                                  redirect('Cms_ci/aboutViewFun');
                                }
                        }
               }
               
      }
      public function deleteAbout($id)
      {
                $idd=['abt_id'=>$id];
                $tableAbout="about";
                $updateTrash=array('abt_is_trash'=>1);
                $re = $this->cms_m->updateTrash($idd,$tableAbout,$updateTrash);
// Notification area
$activity = [
'notify_operation'   => 'delete', //crud name
'notify_activity_on' => $id, // id etc
'activity_name'      => 'deleteAbout',  // method name
'notify_created_for' => $this->session->userdata('user')['user_id'],
'modify_date'        => date('Y-m-d H:i:s')
];
$this->API_m->create('notifications', $activity);
// Notification area end
                    if(!$re)
                     {
                      echo "Not Inserted";
                     }
                    else
                     {
                      $this->session->set_flashdata('danger','Record Deleted successfully');
                       redirect('Cms_ci/aboutViewFun');
                     }


       }
   

/*****************************************End About Code****************************************************/

/*****************************************Start Staff  Msg Code****************************************************/

      public function staffMsgViewFun()
      {
           $result['aboutData'] = $this->cms_m->getContact("staff_msgs",'stf_id',['stf_is_trash'=>'0']);
          // print_r($result);
          // exit();
           $this->load->view('backend/include/head');
           $this->load->view('backend/include/header');
           $this->load->view('backend/include/sideBar');
           $this->load->view('backend/layouts/msg/staffMsgView',$result);
           $this->load->view('backend/include/footer');

      }
      public function addMsgData()
      {
         $name = $this->input->post('name');
         $designation = $this->input->post('designation');
         $email = $this->input->post('email');
         $staff_msg = $this->input->post('staff_msg');
         $editor1 = $this->input->post('editor1');

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
                     $tableMsg="staff_msgs";
                     $arrayMsg = array(
                           'stf_name'         =>$name,
                           'stf_designation'          =>$designation,
                           'stf_desc'          =>$editor1,
                           'stf_email'          =>$email,
                           'staff_img'          =>$img,
                           'stf_created_date'  =>date("d-m-Y"),
                           'stf_created_by'    =>$this->session->userdata('user')['user_id'],
                           );

                    $re = $this->cms_m->dynamicInsertTable($arrayMsg,$tableMsg);
                     
                    // Notification area
                          $activity = [
                             'notify_operation'   => 'insert_update', //crud name
                             'notify_activity_on' => 2, // id etc
                             'activity_name'      => 'addSitting',  // method name
                             'notify_created_for' => $this->session->userdata('user')['user_id'],
                             'modify_date'        => date('Y-m-d H:i:s')
                         ];
                         $this->API_m->create('notifications', $activity);
                 // Notification area end
                        
                  $this->session->set_flashdata('success','New Record Added successfully');
                    redirect('Cms_ci/staffMsgViewFun');
           }
         
      
    }
      public function deleteMsg($id)
      {
                $idd=['stf_id'=>$id];
                 $tableMsg="staff_msgs";
                $updateTrash=array('stf_is_trash'=>1);
                $re = $this->cms_m->updateTrash($idd,$tableMsg,$updateTrash);
// Notification area
         $activity = [
            'notify_operation'   => 'delete', //crud name
            'notify_activity_on' => $id, // id etc
            'activity_name'      => 'deleteMsg',  // method name
            'notify_created_for' => $this->session->userdata('user')['user_id'],
            'modify_date'        => date('Y-m-d H:i:s')
        ];
        $this->API_m->create('notifications', $activity);
// Notification area end
                    // if(!$re)
                    //  {
                    //   echo "Not Inserted";
                    //  }
                    // else
                    //   {
                    //    redirect('Cms_ci/staffMsgViewFun');
                    //   }

       }
      public function updateMsgData()
      {
         $name = $this->input->post('name');
         $u_id = $this->input->post('idd');
         $designation = $this->input->post('designation');
         $email = $this->input->post('email');
         
         $editor1 = $this->input->post('editor');

         // print_r($name);
         // print_r($u_id);
         // print_r($designation);
         // print_r($email);
         // print_r($editor1);
         // exit();
// Notification area
         $activity = [
            'notify_operation'   => 'update', //crud name
            'notify_activity_on' => $u_id, // id etc
            'activity_name'      => 'updateMsgData',  // method name
            'notify_created_for' => $this->session->userdata('user')['user_id'],
            'modify_date'        => date('Y-m-d H:i:s')
        ];
        $this->API_m->create('notifications', $activity);
// Notification area end
  
               $id_u=['stf_id'=>$u_id];
             
               if(!$img = $_FILES['photo']['name'])
               {
                      $tableMsg="staff_msgs";
                      $arrayMsg = array(
                           'stf_name'         =>$name,
                           'stf_designation'          =>$designation,
                           'stf_desc'          =>$editor1,
                           'stf_email'          =>$email,
                           'stf_created_date'  =>date("d-m-Y"),
                           'stf_created_by'    =>$this->session->userdata('user')['user_id'],
                           );

                    // $re = $this->cms_m->dynamicInsertTable($id_u,$arrayMsg,$tableMsg);
                     $re = $this->cms_m->dynamicUpdate($id_u,$arrayMsg,$tableMsg);
                       if(!$re)
                       {
                         echo "Not Added Picture";
                       }
                       else
                       {
                          $this->session->set_flashdata('success','Record updated successfully');
                          redirect('Cms_ci/staffMsgViewFun');
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
                        
                           
                              $tableMsg="staff_msgs";
                             $arrayMsg = array(
                                   'stf_name'         =>$name,
                                   'stf_designation'          =>$designation,
                                   'stf_desc'          =>$editor1,
                                   'stf_email'          =>$email,
                                   'staff_img'          =>$img,
                                   'stf_created_date'  =>date("d-m-Y"),
                                   'stf_created_by'    =>$this->session->userdata('user')['user_id'],
                                   );

                             //$re = $this->cms_m->dynamicInsertTable($arrayMsg,$tableMsg);
                             $re = $this->cms_m->dynamicUpdate($id_u,$arrayMsg,$tableMsg);
                                if(!$re)
                                {
                                  echo "Not Added Picture";
                                }
                                else
                                {
                                  $this->session->set_flashdata('success',' Record updated successfully');
                                  redirect('Cms_ci/staffMsgViewFun');
                                }


                        }
               }
               
      }  
/*****************************************End Staff Msg Code****************************************************/      

/*****************************************Start  Sitting  Code****************************************************/ 

    public function sittingUpdate()
    {
             $idd=['company_id'=>'2'];
             $tableName="settings";
             $result['updateData']=$this->cms_m->dynamicGetUpdate($idd,$tableName);
            //  echo "<pre>";
            // print_r($result);
            // exit();

           $this->load->view('backend/include/head');
           $this->load->view('backend/include/header');
           $this->load->view('backend/include/sideBar');
           $this->load->view('backend/layouts/sitting/sittingView',$result);
           $this->load->view('backend/include/footer');
    }
    public function addSitting()
    {
         $name             = $this->input->post('name');
         $email            = $this->input->post('email');
         $address          = $this->input->post('address');
         $contact          = $this->input->post('contact');
         $fb_link          = $this->input->post('fb_link');
         $twitter_link     = $this->input->post('twitter_link');
         $google_link      = $this->input->post('google_link');
         $pin_link         = $this->input->post('pin_link');
         $instagaram_link  = $this->input->post('instagaram_link');
         $linkedin_link    = $this->input->post('linkedin_link');
         $map_embedCode    = $this->input->post('map_embedCode');
     
// Notification area
         $activity = [
            'notify_operation'   => 'insert_update', //crud name
            'notify_activity_on' => 2, // id etc
            'activity_name'      => 'addSitting',  // method name
            'notify_created_for' => $this->session->userdata('user')['user_id'],
            'modify_date'        => date('Y-m-d H:i:s')
        ];
        $this->API_m->create('notifications', $activity);
// Notification area end

               $id=['company_id'=>'2'];
             if(!$img = $_FILES['photo']['name'])
               {
                            
                          $tableSitting="settings";
                          $arraySitting = array(
                                  'company_name'       =>$name ,
                                  'company_contact'    =>$contact,
                                  'company_email'      =>$email ,
                                  'company_address'    =>$address ,
                                  'map_embed_code'      =>$map_embedCode,
                                  'company_status'     =>'1',
                                  'fb_link'            =>$fb_link,
                                  'twitter_link'       =>$twitter_link,
                                  'google_link'        =>$google_link,
                                  'pinterest_link'     =>$pin_link,
                                  'instagram_link'     =>$instagaram_link,
                                  'linkedin_link'      =>$linkedin_link
                                );
                          $re = $this->cms_m->dynamicUpdate($id,$arraySitting,$tableSitting);
                              if(!$re)
                               {
                                 echo "Not Inserted";
                                }
                              else
                                {
                $this->session->set_flashdata('success','Record updated successfully');
                                  redirect('Cms_ci/sittingUpdate');
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
                        
                                 $tableSitting="settings";

                                 $arraySitting = array(
                                               'company_name'       =>$name ,
                                               'company_contact'    =>$contact,
                                               'company_email'      =>$email ,
                                               'company_address'    =>$address ,
                                               'company_logo'       =>$img ,
                                               'map_embed_code'      =>$map_embedCode,
                                               'company_status'     =>'1',
                                               'fb_link'            =>$fb_link,
                                               'twitter_link'       =>$twitter_link,
                                               'google_link'        =>$google_link,
                                               'pinterest_link'     =>$pin_link,
                                               'instagram_link'     =>$instagaram_link,
                                               'linkedin_link'      =>$linkedin_link
                                              );
                                  $re = $this->cms_m->dynamicUpdate($id,$arraySitting,$tableSitting);
                                        if(!$re)
                                         {
                                           echo "Not Inserted";
                                          }
                                        else
                                          {

                                      $this->session->set_flashdata('success','Record updated successfully');
                                            redirect('Cms_ci/sittingUpdate');
                                           }
                        }
               }
          redirect('Cms_ci/sittingUpdate');         
    }
    public function deleteSittingImg($id)
    {
           $data = array('company_logo'=>'');
            $idd=['company_id'=>$id];
            $tableSitting="settings"; 

          $re = $this->cms_m->updateTrash($idd,$tableSitting,$data);
             if(!empty($re))
             {
              $this->session->set_flashdata('danger','Record Deleted successfully');
               redirect('Cms_ci/sittingUpdate');   
             }
             else
             {
                 echo "not Delete";
             }
// Notification area
$activity = [
'notify_operation'   => 'delete', //crud name
'notify_activity_on' => $id, // id etc
'activity_name'      => 'deleteSittingImg',  // method name
'notify_created_for' => $this->session->userdata('user')['user_id'],
'modify_date'        => date('Y-m-d H:i:s')
];
$this->API_m->create('notifications', $activity);
// Notification area end

    }
/*****************************************Start  Sitting  Code****************************************************/

/*****************************************Multiple Delete code Star form here*************************************/   

    public function abt_delete_all()
    {
      // echo "<pre>";
      // print_r($_POST);
      // exit();
        if($this->input->post('checkbox_value'))
        {
          $id = $this->input->post('checkbox_value');
          for($count = 0; $count < count($id); $count++)
          {
            $this->cms_m->deletee($id[$count],$this->input->post('field'),$this->input->post('table'));

             if($this->input->post('table')=='news_updates')
              {
                $this->API_m->delete('n_u_img',['news_id'=>$id[$count]]);
              }
              elseif($this->input->post('table')=='projects') 
              {
                $this->API_m->delete('prj_img',['project_id'=>$id[$count]]);
              }
              // elseif($this->input->post('table')=='applicants') 
              // {
              //   $this->API_m->delete('prj_img',['project_id'=>$id[$count]]);
              // }
          }
        }
        else
        {
          echo "not working";
        }
    }
/*****************************************Multiple Delete code Star form here*************************************/ 

/*************************************** Start Test Center Code **********************************************/
   public function testCenterFun()
   {
          $result['testCeneteData'] = $this->cms_m->dynamicGetTable('test_Center');
          // print_r($result);
          // exit();
           $this->load->view('backend/include/head');
           $this->load->view('backend/include/header');
           $this->load->view('backend/include/sideBar');
           $this->load->view('backend/layouts/testCenter/testCenter',$result);
           $this->load->view('backend/include/footer');
   }
   public function AddTestCenterData()
   {
      // echo "<pre>";
      //  print_r($_POST);
      //  exit();
      $name    = $this->input->post('test_name');
      $address = $this->input->post('tes_address');
      $contact = $this->input->post('test_contact');
      $personContact = $this->input->post('contact_person');

      // print_r($name);
      // print_r($address);
      // print_r($contact);
      // print_r($personContact);
      // exit();

            //$tblCenter = "test_center";
            $arra = [
                     'name'     =>$name,
                     'address' =>$address,
                     'contact' =>$contact,
                     'person_contact' =>$personContact
                    ];
            // echo "<pre>";
            // print_r($arra);
            // exit();
        $oid =   $this->API_m->create('test_Center',$arra);
     
// Notification area
$activity = [
'notify_operation'   => 'insertion', //crud name
'notify_activity_on' => $oid, // id etc
'activity_name'      => 'AddTestCenterData',  // method name
'notify_created_for' => $this->session->userdata('user')['user_id'],
'modify_date'        => date('Y-m-d H:i:s')
];
$this->API_m->create('notifications', $activity);
// Notification area end

          $this->session->set_flashdata('success','New Record added successfully');
       redirect('Cms_ci/testCenterFun');
   }
   public function updateCenterData()
   {


          // echo "<pre>";
             // print_r($_POST);
             // exit();
               $name = $this->input->post('name');
               $u_idd = $this->input->post('idd');
               $address = $this->input->post('address');
               $contact = $this->input->post('contact');
               $person_contact= $this->input->post('personcontact');
              

            
               $id=['center_id'=>$u_idd];

               $tableContact="test_center";

               $arrayContact = array(
                                  'name'    =>$name ,
                                  'address'      =>$address ,
                                  'contact'    =>$contact ,
                                  'person_contact'  =>$person_contact ,
                                 
                                   );
               $re = $this->cms_m->dynamicUpdate($id,$arrayContact,$tableContact);
                   if(!$re)
                    {
                      echo "Not Inserted";
                     }
// Notification area
$activity = [
'notify_operation'   => 'update', //crud name
'notify_activity_on' => $u_idd, // id etc
'activity_name'      => 'updateCenterData',  // method name
'notify_created_for' => $this->session->userdata('user')['user_id'],
'modify_date'        => date('Y-m-d H:i:s')
];
$this->API_m->create('notifications', $activity);
// Notification area end
                      $this->session->set_flashdata('success','Record updated successfully');
                       redirect('Cms_ci/testCenterFun');
                

   }
   public function deleteTestCenter($id)
   {
                $tblTest="test_center";
                
                $idd=['center_id'=>$id];
                // $re = $this->cms_m->dte($idd,$tableContact);
                $re = $this->cms_m->dynamicDelete($idd,$tblTest);
                   if(!$re)
                     {
                        echo "Not Inserted";
                     }

// Notification area
$activity = [
'notify_operation'   => 'delete', //crud name
'notify_activity_on' => $id, // id etc
'activity_name'      => 'deleteTestCenter',  // method name
'notify_created_for' => $this->session->userdata('user')['user_id'],
'modify_date'        => date('Y-m-d H:i:s')
];
$this->API_m->create('notifications', $activity);
// Notification area end
                        $this->session->set_flashdata('danger','Record Deleted successfully');
                        redirect('Cms_ci/testCenterFun');
                  

   } 
/*************************************** End Test Center Code *************************************/

//  contact messages received 
    public function contactMsg()
    {
        $result['senderList'] = $this->API_m->get('contact_msgs');
        $this->load->view('backend/include/head');
        $this->load->view('backend/include/header');
        $this->load->view('backend/include/sideBar');
        $this->load->view('backend/layouts/contactMessages/senderMessages',$result);
        $this->load->view('backend/include/footer');
    }

    public function deleteSender($id)
    {
       $this->API_m->delete('contact_msgs',['sender_id'=>$id]);
        $this->session->set_flashdata('danger','Record Deleted successfully');
// Notification area
         $activity = [
            'notify_operation'   => 'delete', //crud name
            'notify_activity_on' => $id, // id etc
            'activity_name'      => 'deleteSender',  // method name
            'notify_created_for' => $this->session->userdata('user')['user_id'],
            'modify_date'        => date('Y-m-d H:i:s')
        ];
        $this->API_m->create('notifications', $activity);
// Notification area end

         redirect('Cms_ci/contactMsg');
    }
}

?>