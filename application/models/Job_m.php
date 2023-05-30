<?php
  /**
   * 
   */
  class Job_m extends CI_Model
  {
  	
  	public function getAllJobs()
  	{
      //  $this->db->select('*');
      //  $this->db->from('projects as pro');
      //  $this->db->join('organization as org','org.org_id=pro.org_id');
      //  $this->db->join('org_addresses as add','org.org_id=add.org_id');
      //  $this->db->limit(20);
      //  $this->db->order_by('pro.prj_id','DESC');
      //  $query = $this->db->get();
      $this->db->select('*');
       $this->db->from('organization as org');
      //  $this->db->join('organization as org','org.org_id=pro.org_id');
       $this->db->join('org_addresses as add','org.org_id=add.org_id');
       $this->db->limit(20);
       $this->db->order_by('org.org_id','DESC');
       $query = $this->db->get();
       return $query->result_array();
  	}
    public function findlist($list_opt)
  	{
       $this->db->select('projects.*');
       $this->db->from('projects');
       if($list_opt=='result')
       {
        $this->db->join('result','result.prj_id=projects.prj_id');
       }
       else if($list_opt=='rollno')
       {
        $this->db->join('rollno','rollno.prj_id=projects.prj_id');
       }
       else
       {
        $this->db->where('applicants.remarks !=','');
         $this->db->join('applicants','applicants.prj_id=projects.prj_id');
       }
      //  $this->db->join('organization as org','org.org_id=pro.org_id');
      //  $this->db->join('org_addresses as add','org.org_id=add.org_id');
       $this->db->limit(20);
       $this->db->order_by('projects.prj_id','DESC');
       $this->db->group_by('projects.prj_id');
       $query = $this->db->get();
       return $query->result();
  	}
  	public function getJobDetail($id)
  	{
      //  return $this->db->select('*')
      //                  ->from('projects as pro')
      //                  ->join('organization as org','org.org_id=pro.org_id')
      //                  ->where($id)
      //                  ->get()->row_array();
      return $this->db->select('*')
                       ->from('organization')
                      //  ->join('organization as org','org.org_id=pro.org_id')
                       ->where($id)
                       ->get()->row_array();
              // $data = [];
      //     foreach($query as $d)
      //     {
      //         $data[$d->prj_id]['prj'] = $d
      //         $data[$d->prj_id]['prjFile']= $this->db->where('project_id',$d->prj_id)->get('prj_img')->result();
      //     }

      // return $data;
       
  	}

    public function getJobDetailFiles($id)
    {
      // return $this->db->select('*')
      //                  ->from('prj_img')
      //                  ->where('project_id',$id)
      //                  ->get()->result();
      return $this->db->select('*')
                       ->from('orgp_img')
                       ->where('orgp_id',$id)
                       ->get()->result();
    }
    // public function getAllJobFiles()
    // {
    //   return $this->db->select('*')
    //                    ->from('prj_img')
    //                   //  ->where('project_id',$id)
    //                    ->get()->result();
    // }
    public function getAllJobFiles()
    {
      return $this->db->select('*')
                       ->from('orgp_img')
                      //  ->where('project_id',$id)
                       ->get()->result();
    }
    public function getAllJobByCityName($limit=null)
    {
      if($limit!=null)
      {
         $this->db->limit($limit);
      }
        $this->db->select('*'); 
        $this->db->from('org_addresses as add'); 
        $this->db->join('organization as org','add.org_id=org.org_id');
        $this->db->join('projects as pro','pro.org_id=org.org_id');     
        $this->db->group_by('add.city');
        // $this->db->order_by('org_address', 'desc');    
        $query = $this->db->get();
        return $query->result_array();

    }

    public function getAllJobByImg()
    {
        $this->db->select('*'); 
        $this->db->from('organization as org'); 
        $this->db->join('projects as pro','pro.org_id=org.org_id'); 
        $this->db->group_by('org.org_id');        
        $query = $this->db->get();
        return $query->result_array();

    }
 
    public function getAllByCityNamee($cityName)
    {
      $this->db->select('*');
      $this->db->from('org_addresses as add');
      $this->db->join('organization as org','add.org_id=org.org_id');
      $this->db->join('projects as pro','pro.org_id=org.org_id');
      $this->db->where('add.city',$cityName);
      $query =  $this->db->get();
      return $query->result_array();

    }
    public function getGovernament($categoris, $litmit=NULL)
    { 
      if($litmit!=null)
      {
        $this->db->limit($litmit);
      }
      $this->db->select('*');
      $this->db->from('organization as org');
      $this->db->join('projects as pro','pro.org_id=org.org_id');
      $this->db->where($categoris);

      $query =  $this->db->get();
      return $query->result_array();
    }
    public function getSemiGovernament($categoris,$limit=null)
    {
      if($limit!=null)
      {
        $this->db->limit($limit);
      }
      $this->db->select('*');
      $this->db->from('organization as org');
      $this->db->join('projects as pro','pro.org_id=org.org_id');
      $this->db->where($categoris);
      $query =  $this->db->get();
      return $query->result_array();
    }
    public function getPrivate($categoris,$limit=null)
    {
      if($limit!=null)
      {
        $this->db->limit($limit);
      }
      $this->db->select('*');
      $this->db->from('organization as org');
      $this->db->join('projects as pro','pro.org_id=org.org_id');
      $this->db->where($categoris);
      $query =  $this->db->get();
      return $query->result_array();
    }
    public function getOther($categoris,$limit=null)
    {
      if($limit!=null)
      {
        $this->db->limit($limit);
      }
      $this->db->select('*');
      $this->db->from('organization as org');
      $this->db->join('projects as pro','pro.org_id=org.org_id');
      $this->db->where($categoris);
      $query =  $this->db->get();
      return $query->result_array();
    }
    public function getSearchData($name1,$name2)
    {
          $this->db->select('*');
          $this->db->from('projects as pro');
          $this->db->join('organization as org','pro.org_id=org.org_id');
          $this->db->like('org_address',$name2);
          $this->db->or_like('prj_name',$name1);
          
          $this->db->or_like('org_name',$name1);
       
          $query = $this->db->get();
          return $query->result_array();
    }
    public function getAllJobDetail($idd)
    {
       $this->db->select('*');
       $this->db->from('projects as pro');
       $this->db->join('organization as org','org.org_id=pro.org_id');
       $this->db->join('org_addresses as add','org.org_id=add.org_id');
       $this->db->where($idd);
       $query = $this->db->get();
       return $query->result_array();
    }

    public function findCnicResult($cnic,$prjid)
    {
      return $this->db->select('*,res.user_id as rs_user_id, app.prj_id as ap_prj_id,prj.prj_id as prj_id, att.prj_id as at_prj_id,att.app_id as at_app_id, rl.app_id as rl_app_id,rl.rollno_id as rl_rollno_id,app.app_id as ap_app_id,rl.prj_id as rl_prj_id,res.app_id as rs_app_id,res.prj_id as rs_prj_id')
                       ->from('rollno as rl')
                       ->join('applicants as app','app.app_id=rl.app_id','left')
                       ->join('attendence as att','att.app_id=app.app_id','left')
                       ->join('result as res','res.app_id=rl.app_id','left')
                       ->join('projects as prj','prj.prj_id=rl.prj_id','left')
                       ->join('users as u','u.user_id=rl.user_id','left')
                       ->group_by('app.app_id')
                       // ->where('u.user_is_trash',0)
                       // ->where('att.status','P')
                       ->where('app.remarks','Eligible')
                       ->where('prj.prj_id',$prjid)
                       ->where('u.user_cnic',$cnic)
                       ->get()->result();
    }

    public function findCnicRollno($cnic,$prjid)
    {
       return $this->db->select('*')
                       ->from('rollno as rl')
                       ->join('applicants as app','app.app_id=rl.app_id','left')
                       ->join('applicant_test_center as atc','atc.tc_app_id=app.app_id','left')
                       ->join('test_center as tc','tc.center_id=atc.tc_center_id','left')
                       ->join('projects as prj','prj.prj_id=rl.prj_id','left')
                       ->join('users as u','u.user_id=rl.user_id','left')
                       ->where('app.remarks','Eligible')
                       ->where('prj.prj_id',$prjid)
                       ->where('u.user_is_trash',0)
                       ->where('u.user_cnic',$cnic)
                       ->get()->result();
    }
    public function findCnicEligible($cnic,$prjid)
    {
       return $this->db->select('*')
                       ->from('rollno as rl')
                       ->join('applicants as app','app.app_id=rl.app_id','left')
                       ->join('applicant_test_center as atc','atc.tc_app_id=app.app_id','left')
                       ->join('test_center as tc','tc.center_id=atc.tc_center_id','left')
                       ->join('projects as prj','prj.prj_id=rl.prj_id','left')
                       ->join('users as u','u.user_id=rl.user_id','left')
                       ->where('prj.prj_id',$prjid)
                       ->where('u.user_is_trash',0)
                       ->where('u.user_cnic',$cnic)
                       ->get()->result();
    }

// printing single result record

    public function findCnicSingleResult($user_id,$prj_id,$cnic)
    {
      return $this->db->select('*,res.user_id as rs_user_id, app.prj_id as ap_prj_id,prj.prj_id as prj_id, att.prj_id as at_prj_id,att.app_id as at_app_id, rl.app_id as rl_app_id,rl.rollno_id as rl_rollno_id,app.app_id as ap_app_id,rl.prj_id as rl_prj_id,res.app_id as rs_app_id,res.prj_id as rs_prj_id')
                       ->from('rollno as rl')
                       ->join('applicants as app','app.app_id=rl.app_id','left')
                       ->join('attendence as att','att.app_id=app.app_id','left')
                       ->join('result as res','res.app_id=rl.app_id','left')
                       ->join('projects as prj','prj.prj_id=rl.prj_id','left')
                       ->join('users as u','u.user_id=rl.user_id','left')
                       // ->group_by('app.app_id')
                       ->where('u.user_is_trash',0)
                       ->where('res.user_id',$user_id)
                       ->where('res.prj_id',$prj_id)
                       ->where('u.user_cnic',$cnic)
                       ->get()->row();
    }

//  printing single rollno sheet for test
    public function findCnicSingleRollno($user_id,$prj_id,$cnic)
    {
       return $this->db->select('*')
                       ->from('rollno as rl')
                       ->join('applicants as app','app.app_id=rl.app_id','left')
                       ->join('applicant_test_center as atc','atc.tc_app_id=app.app_id','left')
                       ->join('test_center as tc','tc.center_id=atc.tc_center_id','left')
                       ->join('projects as prj','prj.prj_id=rl.prj_id','left')
                       ->join('users as u','u.user_id=rl.user_id','left')
                       ->where('u.user_is_trash',0)
                       ->where('rl.prj_id',$prj_id)
                       ->where('rl.user_id',$user_id)
                       ->where('u.user_cnic',$cnic)
                       ->get()->row();
    }


// ************** PAGINATION 
    public function get_rows($table){

    return $this->db->get($table)->num_rows();
   }

  public function BlogPagination($url,$table)
  {
    
    // $this->load->library('pagination');
    $config['base_url']     = base_url($url);  
    $config['per_page']         = 5;
    $config['total_rows']       = $this->Job_m->get_rows($table);
   

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

    $config['next_link']    = '<img src="'.base_url('assets/img/icons/interface/icon-arrow-right.svg').'" alt="Arrow Right" class="icon icon-xs bg-primary" data-inject-svg>';
    $config['next_tag_open']  = '<li class="page-item page-link"><i class="fa fa-long-arrow-right"></i>';
    $config['next_tag_close']   = '</li>';

    $config['prev_link']    = '<img src="'.base_url('assets/img/icons/interface/icon-arrow-left.svg').'" alt="Arrow Left" class="icon icon-xs bg-primary" data-inject-svg>';
    $config['prev_tag_open']  = '<li class="page-item page-link"><i class="fa fa-long-arrow-left"></i>';
    $config['prev_tag_close']   = '</li>';

    $config['first_link']     = false;
    $config['last_link']      = false;
    $this->pagination->initialize($config);  

    $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
    return $data = $this->Job_m->fetch_blogs($config["per_page"], $page);
  } 

    public function fetch_blogs($limit, $start) {
        $this->db->limit($limit, $start);
       
        $query = $this->db->select('*')->from('organization as pro')
                        //  ->join('organization as org','org.org_id=pro.org_id')
                        //  ->join('org_addresses as add','org.org_id=add.org_id')
                         ->order_by('org_id','DESC')
                         ->get();

        if ($query->num_rows() > 0) {
            foreach ($query->result_array() as $row) {
                $data[] = $row;
            }
            return $data;
        }
        return false;
   }
   public function active_jobs() {
      $this->db->limit(10);
      $query = $this->db->select('*')->from('projects as pro')
                      ->join('organization as org','org.org_id=pro.org_id')
                      ->join('org_addresses as add','org.org_id=add.org_id')
                      ->order_by('pro.prj_id','DESC')
                      ->get();
      if ($query->num_rows() > 0) {
          foreach ($query->result_array() as $row) {
              $data[] = $row;
          }
          return $data;
      }
      return false;
  }



  }

?>