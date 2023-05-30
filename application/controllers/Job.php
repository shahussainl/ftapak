<?php
   class Job extends CI_Controller
   {
      function  __construct()
      {
            parent::__construct();
           date_default_timezone_set('Asia/Karachi');
      }
       public function index()
       {
          // $result['getAllJob']= $this->Job_m->getAllJobs();
          // echo "<pre>";
          // print_r($result);
          // exit();
         $url       = 'Job/index';
         // $result['getAllJob'] = $this->Job_m->BlogPagination($uri,'projects');
         $config['base_url']     = base_url($url);  
         $config['per_page']           = 15;
         $config['total_rows']         = $this->Job_m->get_rows('projects');
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
         $result['getAllJob']      = $this->Job_m->fetch_blogs($config["per_page"], $page);
         $result['jobFiles'] = $this->Job_m->getAllJobFiles();
         $result['recentNews']=$this->Pages_m->getRecentNews();
         // echo $this->pagination->create_links();
         // die();
       	  $this->load->view('frontend/include/head');
       	  $this->load->view('frontend/include/header');
       	  $this->load->view('frontend/index',$result);
       	  $this->load->view('frontend/include/footer');
       }
       public function index2()
       {
       	  $this->load->view('frontend/include/head');
       	  $this->load->view('frontend/include/header');
       	  $this->load->view('frontend/index2');
       	  $this->load->view('frontend/include/footer');
       }
       public function list($liststr)
       {
         $result['list']    = $this->Job_m->findlist($liststr);
         $result['liststr'] = $liststr;
         // echo "<pre>"; print_r($result['list']); die();
         $this->load->view('frontend/include/head');
         $this->load->view('frontend/include/header');
         $this->load->view('frontend/list',$result);
         $this->load->view('frontend/include/footer');
       }
       public function check_rollno_slip($id = null)
       {
          $data['prjid']  = $id;
          $this->load->view('frontend/include/head');
          $this->load->view('frontend/include/header');
          $this->load->view('frontend/check_rollno_slip',$data);
          $this->load->view('frontend/include/footer');
       }
       public function check_eligibility($id = null)
       {
          $data['prjid']  = $id;
          $this->load->view('frontend/include/head');
          $this->load->view('frontend/include/header');
          $this->load->view('frontend/check_eligibility',$data);
          $this->load->view('frontend/include/footer');
       }
       public function check_result($id = null)
       {
          $data['prjid']  = $id;
          $this->load->view('frontend/include/head');
          $this->load->view('frontend/include/header');
          $this->load->view('frontend/test_result',$data);
          $this->load->view('frontend/include/footer');
       }

//  showing test result of searched cnic
      
      public function show_cnic_result_card()
      {
         // echo "<pre>";
         // print_r($_POST);
         // exit(); 
          $cnic  = $this->input->post('result_cnic');
          $prjid = $this->input->post('prjid');
          $result['data'] = $this->Job_m->findCnicResult($cnic,$prjid);
          $this->load->view('frontend/include/head');
          $this->load->view('frontend/include/header');
          $this->load->view('frontend/show_cnic_result_card',$result);
          $this->load->view('frontend/include/footer');
      } 
// showing test rollno slip of searched cnic
      public function show_cnic_rollno_slip()
      {
           // echo "<pre>";
           // print_r($_POST);
           // exit();
           $cnic  = $this->input->post('cnic_rollno_slip');
           $prjid = $this->input->post('prjid');
          $result['data'] = $this->Job_m->findCnicRollno($cnic,$prjid);
          $this->load->view('frontend/include/head');
          $this->load->view('frontend/include/header');
          $this->load->view('frontend/show_cnic_rollno_slip',$result);
          $this->load->view('frontend/include/footer'); 
      }
      // showing test show_cnic_eligibility of searched cnic
      public function show_cnic_eligibility()
      {
          $cnic = $this->input->post('cnic_slip');
          $prjid = $this->input->post('prjid');
          $result['data'] = $this->Job_m->findCnicEligible($cnic,$prjid);
          $this->load->view('frontend/include/head');
          $this->load->view('frontend/include/header');
          $this->load->view('frontend/show_cnic_eligibility_slip',$result);
          $this->load->view('frontend/include/footer'); 
      }
// result print view
      public function result_print_view($user_id='',$prj_id='',$cnic='')
      {
          // $cnic = $this->input->post('result_cnic');
         
            $result['data'] = $this->Job_m->findCnicSingleResult($user_id,$prj_id,$cnic);
            $this->load->view('frontend/result_print_view',$result);
         
      }
// rollno print view
      public function rollno_print_view($user_id='',$prj_id='',$cnic='')
      {
          // $cnic = $this->input->post('result_cnic');
          $result['data'] = $this->Job_m->findCnicSingleRollno($user_id,$prj_id,$cnic);
          $this->load->view('frontend/rollno_print_view',$result);

      }

   }
?>