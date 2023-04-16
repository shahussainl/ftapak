<?php

class Admin extends CI_Controller
{
      function  __construct()
      {
            parent::__construct();
           date_default_timezone_set('Asia/Karachi');
      }
       
        public function index()
        {
            
           $this->load->view('backend/Adminlogin');
        }

        // verifying user credientials
  public function AdminVerify() 
  {
          
          // echo "<pre>";
          // print_r($_POST);
          // exit();

        $email        = $this->input->post('user_email');
        $password     = $this->input->post('user_password');
        // echo "<pre>";
        // print_r($email);
        // print_r($password);
        // exit();


 
        $condition = [
            'user_email'     => $email,
            'role_id'        => 1,
            'user_is_trash'  => 0
        ];
      
        $returnedData = $this->API_m->singleRecordArray('users', $condition);
        // echo "<pre>";
        // print_r($returnedData);exit();
       
    $size = sizeof($returnedData);
    // echo "<pre>";
    // print_r($size);
    // exit();
        if($size == 1) 
        {
          // echo "<pre>";
          // print_r($returnedData);
          // exit();
           foreach ($returnedData as $user) 
           {
              // ($this->password->verify_hash
              
                if($this->password->verify_hash($password,$user->user_password)) {

                    $sessionData = [
                        'user_id'     => $user->user_id,
                        'username'    => $user->user_fullname,
                        'user_email'  => $user->user_email,
                        'user_pic'    => $user->user_img,
                        'role'        => $user->role_id
                    ];

                    // echo "<pre>";
                    // print_r($sessionData);
                    // exit();
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
// Notification area end

                    $this->session->set_flashdata('Msg', 'Login Successfull');
                        redirect('MainContent/index');
                } else {
                    $this->session->set_flashdata('Msg', 'Wrong Credentials');
                    redirect('Admin/index');
                }
          }
        } 
        else 
        {
          // echo "<pre>";
          // print_r($size);
          // exit();
            $this->session->set_flashdata('Msg', 'Wrong Credentials');
            redirect('Admin');
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
        redirect('Admin/index');
    }
   
}

?>



<!-- 
    $size = sizeof($returnedData);
        if ($size == 1) 
        {
           foreach ($returnedData as $user) 
           {
              // ($this->password->verify_hash
              if($user->user_status==0 || $user->block_status==0)
               {
                 $this->session->set_flashdata('Msg', ' Wrong Credentials or Blocked by Admin!');
                 redirect('Login/index');
               }
               else
               {
                if ($this->password->verify_hash($password,$user->user_password)) {

                    $sessionData = [
                        'user_id'     => $user->user_id,
                        'username'    => $user->user_fullname,
                        'user_email'  => $user->user_email,
                        'role'        => $user->user_role
                    ];

                    // echo "<pre>";
                    // print_r($sessionData);
                    // exit();
                    $this->session->set_userdata('user', $sessionData);
                    $this->session->set_flashdata('Msg', 'Login Successfull!');

                        redirect('Admin/index');
                } else {
                    $this->session->set_flashdata('Msg', 'Wrong Credentials!');
                    redirect('Login/index');
                }
              }
          }
        } 
        else 
        {
            $this->session->set_flashdata('Msg', 'Wrong Credentials!');
            redirect('Login');
        } -->








<!--                   // echo "<pre>";
          // print_r($_POST);
          // exit();

        $email        = $this->input->post('user_email');
        $password     = $this->input->post('user_password');

        // echo "<pre>";
        // print_r($email);
        // print_r($password);
        // exit();


 
        $condition = [
            'user_email' => $email,
            'user_password'  => $password
        ];
      
        $returnedData = $this->Project_m->loginFunction('users', $condition);
        // echo "<pre>";
        // print_r($returnedData);exit();
        
        $size = sizeof($returnedData);
        // print_r($size);exit();
        if(!$size == 0) 
        {
          foreach ($returnedData as $key => $user) 
          {
                    $sessionData = [
                        'user_id'       => $user['user_id'],
                        'username'      => $user['user_fullname'],
                        'user_email'    => $user['user_email'],
                        'user_password' => $user['user_password']
                      ];

                    // echo "<pre>";
                    // print_r($sessionData);
                    // exit();
                    $this->session->set_userdata('user', $sessionData);
                    $this->session->set_flashdata('Msg', 'Login Successfull!');

                    redirect('MainContent/index');         
          }
        } 
        else 
        {
            $this->session->set_flashdata('Msg', 'Wrong Credentials!');
            redirect('Admin/index');
        } -->