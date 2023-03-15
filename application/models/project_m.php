<?php

/**
 * 
 */
class Project_m extends CI_Model
{

   public function addProjectData($arrayName)
   {
       $this->load->database();
       $this->db->insert('projects',$arrayName);

       return $this->db->insert_id();
   }
   public function dynamicInsertGetId($arrayNews,$tableNews)
   {
       $this->load->database();
       $this->db->insert($tableNews,$arrayNews);

       return $this->db->insert_id();
   }
   public function multiple_images($image = array())
   {
        $this->load->database();
        return $this->db->insert_batch('prj_img',$image);
        
   }
   public function deleteProjectM($id)
   {
         $this->load->database();
         $this->db->delete('projects', array('prj_id' => $id)); 
         return $this->db->delete('prj_img', array('project_id' => $id));          
   }

   public function getDataForUpdate($id)
   {
   	   $this->db->where('prj_id',$id);
   	   $q = $this->db->get('projects');
   	   return $q->row_array();
   }
   public function getImageForUpdate($id)
   {
   	   $this->db->where('project_id',$id);
   	   $q = $this->db->get('prj_img');
   	   return $q->result_array();
   }
   public function getImageForUpdateNew($img_id,$imgTable)
   {
       $this->db->where($img_id);
       $q = $this->db->get($imgTable);
       return $q->result_array();
   }
   public function updateProjectDataM($update_id,$updateArray)
   {
   	   $this->db->where($update_id);

   	   $this->db->update('projects',$updateArray);
   	   return $this->db->insert_id();
     
   }
   public function multiple_images_update($image = array())
   {
        $this->load->database();  
        return $this->db->insert_batch('prj_img',$image);       
   }
   public function dynamic_multiple_images_update($tableImg,$image = array())
   {
        $this->load->database();  
        return $this->db->insert_batch($tableImg,$image);       
   }
   public function singleImgaeDaletModel($id)
   {
   	  $this->db->where('img_id',$id);
   	 return  $this->db->delete('prj_img');
   }

	
// ********* < Usman code>
   public function getProjects()
   {
     return $this->db->join('organization','organization.org_id=projects.org_id','left')
                            ->get('projects')
                            ->result_array();
   }

   public function getAllprj()
   {
     return $this->db->select('*')->from('users')
                                  // ->join('projects as prj','prj.prj_id=app.prj_id','left')
                                  // ->join('users as u','u.user_id=app.user_id')
                                  ->where('user_is_trash',0)
                                  ->get()->result();
   }

    public function getUserUp($id)
   {
     return $this->db->select('*')->from('users as u')
                                  // ->join('projects as prj','prj.prj_id=app.prj_id')
                                   ->join('user_addresses as u_add','u_add.user_id=u.user_id')
                                  ->where('u.user_id',$id)
                                  // ->where('prj.prj_id',$prj_id)
                                  ->get()->row();
   }
// ********* < ./ Usman code> 

   public function loginFunction($tableName, $condition)
   
   {
      $this->db->where($condition);
      $re = $this->db->get($tableName);
      return $re->result();

   }

// geting all Applicants

   public function getAllApplicants()
   {
      return $this->db->select('*')->from('applicants as app')
                                  ->join('projects as prj','prj.prj_id=app.prj_id')
                                  ->join('users as u','u.user_id=app.user_id')
                                  ->where('u.user_is_trash',0)
                                  ->get()->result();
   }

//  get single project applicants
    public function getPrjApplicants($prj_id)
   {
      return $this->db->select('*')->from('applicants as app')
                                  ->join('projects as prj','prj.prj_id=app.prj_id')
                                  ->join('applicant_test_center as atc','atc.tc_app_id=app.app_id','left')
                                  ->join('test_center as tc','tc.center_id=atc.tc_center_id','left')
                                  ->join('users as u','u.user_id=app.user_id')
                                  ->where('u.user_is_trash',0)
                                  ->where('prj.prj_id',$prj_id)
                                  ->get()->result();
   }

// get single prj applicant list as insert/update page
    public function getPrjApplicantsList($prj_id)
   {
      return $this->db
                  ->select('*,app.app_id as ap_app_id,app.prj_id as ap_prj_id,prj.prj_id as prj_id, att.prj_id as at_prj_id,att.app_id as at_app_id, rln.app_id as rl_app_id,rln.prj_id as rl_prj_id,res.app_id as rs_app_id,res.prj_id as rs_prj_id')
                  ->from('projects as prj')
                  ->join('applicants as app','app.prj_id=prj.prj_id','left')
                  ->join('rollno as rln','rln.app_id=app.app_id','left')
                  ->join('attendence as att','att.app_id=app.app_id','left')
                  ->join('result as res','res.app_id=app.app_id','left')
                  ->join('users as u','u.user_id=app.user_id','left')
                  ->group_by('app.app_id')
                  ->where('u.user_is_trash',0)
                  ->where('prj.prj_id',$prj_id)
                  ->get()->result();
   }

// geting Rollno List of Applicants against single PROJECT

  public function getPrjRollnoList($prj_id)
  {
       return $this->db->select('*')
                       ->from('rollno as rl')
                       ->join('applicants as app','app.app_id=rl.app_id','left')
                       ->join('projects as prj','prj.prj_id=rl.prj_id','left')
                       ->join('users as u','u.user_id=rl.user_id','left')
                       ->where('u.user_is_trash',0)
                       ->where('app.prj_id',$prj_id)
                       ->get()->result();
  }

// geting Applicants Record for Result Generation

  public function getPrjResultList($prj_id)
  {
       return $this->db->select('*, app.prj_id as ap_prj_id,prj.prj_id as prj_id, att.prj_id as at_prj_id,att.app_id as at_app_id, rl.app_id as rl_app_id,rl.rollno_id as rl_rollno_id,app.app_id as ap_app_id,rl.prj_id as rl_prj_id,res.app_id as rs_app_id,res.prj_id as rs_prj_id')
                       ->from('rollno as rl')
                       ->join('applicants as app','app.app_id=rl.app_id','left')
                       ->join('attendence as att','att.app_id=app.app_id','left')
                       ->join('result as res','res.app_id=rl.app_id','left')
                       ->join('projects as prj','prj.prj_id=rl.prj_id','left')
                       ->join('users as u','u.user_id=rl.user_id','left')
                       ->group_by('app.app_id')
                       // ->where('u.user_is_trash',0)
                       // ->where('att.status','P')
                       ->where('rl.prj_id',$prj_id)
                       ->get()->result();
  }

  public function addAttendence($prj_id)
  {
     $this->db->select('*,app.test_date_time as app_tdt, app.app_id as my_app_id, app.prj_id as my_prj_id');
     $this->db->from('applicants as app');
     $this->db->join('users','users.user_id=app.user_id','left');
     $this->db->join('rollno as rl','rl.app_id=app.app_id','left');
     // $this->db->join('attendence as att','app.app_id=att.app_id','left');
     $this->db->where('app.prj_id',$prj_id);
     $result = $this->db->get();
      $rec =  $result->result();

      $data = [];

      foreach($rec as $r)
      {
         $data[$r->my_app_id]['data']   = $r;
         $data[$r->my_app_id]['record'] = $this->db->where('app_id',$r->my_app_id)->where('prj_id',$prj_id)->get('attendence')->row();

      }
       return $data;

  }
  public function getPrjAttendenceList($prj_id)
  {
         $this->db->select('*');
         $this->db->from('attendence as aten');
         $this->db->join('applicants as app','app.app_id=aten.app_id');
         $this->db->join('rollno as rl','rl.app_id=app.app_id');
         $this->db->join('users','users.user_id=app.user_id');
         $this->db->join('projects as pro','pro.prj_id=aten.prj_id');
         $this->db->where('aten.prj_id',$prj_id);
         $result = $this->db->get(); 
         return $result->result_array();
  }

//  geting Applicants Results Record 
  public function getAppResultsList($prj_id)
  {
      return $this->db->select('*')
                       ->from('result as res')
                       ->join('rollno as rl','rl.rollno_id=res.rollno_id','left')
                       ->join('applicants as app','app.app_id=res.app_id','left')
                       ->join('attendence as att','att.app_id=app.app_id','left')
                       ->join('projects as prj','prj.prj_id=res.prj_id','left')
                       ->join('users as u','u.user_id=rl.user_id','left')
                       // ->where('u.user_is_trash',0)
                       ->where('res.prj_id',$prj_id)
                       ->get()->result();
  }
  public function verifiedOldPassword($oldPassword) 
  {
       $result = $this->db->from('users')
               ->where('user_email', $this->session->userdata('user')['user_email'])
               ->get();
       if ($result->num_rows() == 1) 
       {
           $user = $result->row_array();
           if ($this->password->verify_hash($oldPassword, $user['user_password'])) 
           {
               unset($user['user_password']);
               return 1;
           } else 
           {
               return 0;
           }
       }
   }

   public function updateUserPassword($id,$userPassword)
   {
     $this->db->where($id);
     return $this->db->update('users',$userPassword);

   }

   public function getPrjFullView($prj_id)
   {
     return $this->db->select('*')
                       ->from('projects as prj')
                       ->join('prj_img as pi','pi.project_id=prj.prj_id','left')
                       ->join('organization as org','org.org_id=prj.org_id','left')
                       ->where('prj.prj_id',$prj_id)
                       ->get()->row();


   }
   public function appliedPrjApplicants($prj_id)
   {
         return $this->db->where('prj_id',$prj_id)->count_all_results('applicants');
         // return $this->db->select('*')
         //                   ->from('applicants as app')
         //                   ->join('projects as prj','prj.prj_id=app.prj_id','left')
         //                   ->where('app.prj_id',$prj_id)
         //                   ->get()->result();


   }
   public function ApplicantPrjHistory($id)
   {
      return $this->db->select('*')
                       ->from('applicants as app')
                       ->join('projects as prj','prj.prj_id=app.prj_id')
                       ->join('prj_img as pi','pi.project_id=prj.prj_id')
                       ->join('organization as org','org.org_id=prj.org_id')
                       ->group_by('pi.project_id')
                       ->where('app.user_id',$id)
                       ->get()->result();
   }

// for dashboard charts total projects monthly wise
    public function getCurrentMonthPrj()
    {
 
        $record = [];
        
        for($i = 1; $i <= 12; $i++)
        {
            $month = 1;
            if($i < 10)
            {
                $month = '0'.$i;
            } 
            else
            {
                $month = $i;
            }
            $data = $this->db
                        ->select('count(prj_created_date) as mth')
                        ->where('MONTH(prj_created_date)' , $month)
                        ->where('YEAR(prj_created_date)',date('Y'))
                        ->get('projects')->row();
            
            if(!empty($data->mth))
            {
                $record[$month] = $data->mth;
            }
            else
            {
                $record[$month] = 0;
            }
            
        }
        return $record;
       
    }
// for dashboard chart total applicants monthly wise 
     public function getCurrentMonthApplicants()
    {
 
        $record = [];
        
        for($i = 1; $i <= 12; $i++)
        {
            $month = 1;
            if($i < 10)
            {
                $month = '0'.$i;
            } 
            else
            {
                $month = $i;
            }
            $data = $this->db
                        ->select('count(prj_id) as appl')
                        ->where('MONTH(app_created_date)' , $month)
                        ->where('YEAR(app_created_date)',date('Y'))
                        ->get('applicants')->row();
            
            if(!empty($data->appl))
            {
                $record[$month] = $data->appl;
            }
            else
            {
                $record[$month] = 0;
            }
            
        }
        return $record;
       
    }



}

?>