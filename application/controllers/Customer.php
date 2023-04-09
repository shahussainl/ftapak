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
       public function CustomerVerify() 
       {
            $email        = $this->input->post('user_email');
            $password     = $this->input->post('user_password');
            $condition = [
                'user_email'     => $email,
                'role_id'        => 3,
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

        public function portal()
        {
            $userdata = $this->session->userdata('user');
            if(!empty($userdata))
            {
                $userid             = $this->session->userdata('user')['user_id'];
                $result['prjHis']   = $this->Project_m->ApplicantPrjHistory($userid);
                $result['udata']    = $this->API_m->singleRecord('users',['user_id'=>$userid]);
                $result['tPrj']     = $this->API_m->countAllRows('applicants',['user_id'=>$userid]);
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
                redirect('Admin/index');
            }
            
        }

?>