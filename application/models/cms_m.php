<?php 

/**
 * 
 */
class Cms_m extends CI_Model
{
	public function dynamicInsertTable($orgData,$tableName)
	{
		return $this->db->insert($tableName,$orgData);
	}
	public function dynamicGetTable($tableName)
	{
	   $query=$this->db->get($tableName);
     //$this->db->order_by("", "asc");
	   return $query->result_array();
	}
	public function dynamicDelete($idd,$tableName1)
	{
		$this->db->where($idd);
		return $this->db->delete($tableName1);
	}
	public function dynamicGetUpdate($id,$tabName)
    {
   	   $this->db->where($id);
   	   $q = $this->db->get($tabName);
   	   return $q->row_array();
    }
    public function dynamicUpdate($u_id,$orgUpdateData,$tableName)
    {
        
         $this->db->where($u_id);
   	     return $this->db->update($tableName,$orgUpdateData);
   	  
    }
    public function addOrgDataM($orgData,$tableName)
    {
       $this->db->insert($tableName,$orgData);
       return $this->db->insert_id();
    }
    public function getOrgUpdateData($id)
    {
       $this->db->select('*');
       $this->db->from('organization as org');
       $this->db->join('org_addresses as add','add.org_id=org.org_id');
       $this->db->where($id);
       $q = $this->db->get();
       return $q->row_array();
    }
    public function updateOrgData($u_id,$orgUpdateData,$tableName)
    {
         $this->db->where($u_id);
         return $this->db->update($tableName,$orgUpdateData); 
    }
    public function getContact($tabName,$ord_id,$id)
    {
       $this->db->where($id);
       $this->db->order_by($ord_id,"desc");
   	   $q = $this->db->get($tabName);
   	   return $q->result_array();
    }
    public function updateTrash($id,$tableContact,$updateTrash)
    {
   	     // $data=array('con_is_trash'=>1);
         $this->db->where($id);
         return $this->db->update($tableContact,$updateTrash);
    }
    public function deleteSittingImage($id)
    {
          $data = array('company_logo'=>'');
          $this->db->where('company_id', $id);        
          $this->db->update('settings', $data);
    }
    public function insertAttendanceM($arrayAttendence)
    {
         return $this->db->insert('attendence', $arrayAttendence);
    }
    public function dynamic_multiple_images($tableNewsImg, $image = array())
    {
        $this->load->database();
        return $this->db->insert_batch($tableNewsImg,$image);
        
    }
    public function dynamicDeleteImge($iddd,$tableNameee)
    {
      $this->db->where($iddd);
      return  $this->db->delete($tableNameee);
    }

    public function deletee($id,$field,$table)
    {
      // $this->load->database();
      $this->db->where($field, $id);
      $this->db->delete($table);
    }
    public function insertTestCente($a)
    {
      // print_r($a);
      // die();
         return $this->db->insert('tbl_testCenter', $a);
    }
    public function addSub($data)
    {
        $subs = $this->db->where($data)->get('subscribe')->row();
        // print_r($subs);
        // exit();
        if(!empty($subs))
        {
          return 1;
        }
        else
        {
          $this->db->insert('subscribe',$data);
          return 0;
        }
     }
     public function findSerachData($prj_name)
     {
          $this->db->select('*');
          $this->db->from('projects as pro');
          $this->db->join('organization as org','pro.org_id=org.org_id');
          // $this->db->like('org_address',$prj_name);
          $this->db->or_like('prj_name',$prj_name);
          
          $this->db->or_like('org_name',$prj_name);
       
          $query = $this->db->get();
          return $query->result_array();
     }

     public function findCnicEmail($arr)
     {
          $this->db->select('*');
          $this->db->from('users');
          $this->db->where('user_email',$arr['user_email']);
          $this->db->or_where('user_cnic',$arr['user_cnic']);
          return $this->db->get()->result();
     }




}

?>