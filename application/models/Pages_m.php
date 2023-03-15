<?php
 /**
  * 
  */
 class Pages_m extends CI_Model
 {


// dynamic queries
  // this function is used to get last record
    public function get_last_Rec($table) {

        return $this->db->limit(1)->get($table)->row();
    }

    //this funtion will recieve table name and return all the data of that table

    public function get($table_name) {
        return $this->db->get($table_name)->result();
    }

    //this funtion will recieve table name and a condition and return  the data 

    public function getRecordWhere($table_name, $table_field_name_with_value) {
        return $this->db->where($table_field_name_with_value)->get($table_name)->result();
    }

    // this function will recieved two parameter first one table name second one where clause (['table_field'=>$id])

    public function singleRecord($table_name, $table_field_name_with_value) {
        return $this->db->where($table_field_name_with_value)->get($table_name)->row();
    }

    // this function will recieved two parameter first one table name second one where clause (['table_field'=>$id])

    public function singleRecordArray($table_name, $table_field_name_with_value) {
        return $this->db->where($table_field_name_with_value)->get($table_name)->result();
    }

    //this is used to insert data into database
    public function create($table_name, $table_field_name_with_value) {
        // print_r($table_field_name_with_value);
        // die();
        $result = $this->db->insert($table_name, $table_field_name_with_value);
        if (!$result) {
            return 0;
        } else {
            return $this->db->insert_id();
        }
    }
 //this is used to insert data into database
    public function insertRecord($table_name, $table_field_name_with_value) {
        $result = $this->db->insert($table_name, $table_field_name_with_value);
        if (!$result) {
            return 0;
        } else {
            return $this->db->insert_id();
        }
    }
    //this function is used to count all rows of table under a condition
    public function countAllRows($table, $arg) {
        return $this->db->where($arg)->count_all_results($table);
    }

    // this function will recieved three parameter first one table name second one where clause (['table_field'=>$id]) and thrid one table field name with value in array form.

    public function updateRecord($table_name, $table_field_name, $table_field_data) {
        return $this->db->where($table_field_name)->update($table_name, $table_field_data);
    }

    //this function will recieved two parameter first one table name second one where cluase (['table_field'=>$id])

    public function delete($table_name, $table_field_name_with_value) {
        return $this->db->where($table_field_name_with_value)->delete($table_name);
    }

    //this function will recieve three parameter fist one table name second table_key_field and third one is descion(Ascending or Descending)

    public function getOrderBy($table_name, $table_key_field, $decision) {
        return $this->db->order_by($table_key_field, $decision)->get($table_name)->result();
    }

    public function singleRow($table_name) {
        return $this->db->get($table_name)->row();
    }

// dynamic queries


    public function  getAllNews($limit, $start)
    {
         $this->db->limit($limit, $start);
    	$query = $this->db->select('*')
    	           ->from('news_updates as news')
    	           ->join('users','users.user_id=news.n_u_created_by')
    	           ->join('n_u_img','n_u_img.news_id=news.n_u_id','left')
                 ->order_by('news.n_u_id','DESC')
                 ->group_by('n_u_img.news_id')
                 ->where('news.n_u_is_trash',0)
    	           ->get();

        if ($query->num_rows() > 0) {
            foreach ($query->result_array() as $row) {
                $data[] = $row;
            }
            return $data;
        }
        return false;
    }
    public function getNewDetail($id)
    {
    	$this->db->select('*');
    	$this->db->from('news_updates as news');
    	$this->db->join('users','users.user_id=news.n_u_created_by');
    	$this->db->join('n_u_img','n_u_img.news_id=news.n_u_id','left');
      $this->db->where('news.n_u_is_trash',0);
    	$this->db->where($id);
    	$query = $this->db->get();
    	return $query->row_array();

    }
    public function getRecentNews()
    {
        $this->db->select('*');
        $this->db->from('news_updates as news');
        $this->db->join('n_u_img as img','news.n_u_id=img.news_id');
        $this->db->order_by("news.n_u_id", "desc");
        $this->db->group_by("img.news_id");
        $this->db->where('news.n_u_is_trash',0);
        $this->db->limit(4);
        $query = $this->db->get();
        return $query->result_array();

    }
    public function getDynamic($tableeName) 
    {
        $query = $this->db->get($tableeName);
        return $query->row_array(); 
    }
    public function getDynamicIdData($tblName,$idd)
    { 

        $this->db->where($idd);
        $query = $this->db->get($tblName);
        return $query->row_array();   
    }

    public function getCommentAndReply($id)
    {
      
           $commentData = $this->db->where('newsFeed_id',$id)->get('comments')->result();
           //print_r($commentData);
           //exit();
           foreach($commentData as $row) 
           {
               $result[$row->comment_id]['coment'] = $row;
               $result[$row->comment_id]['replyy'] = $this->db->where('commentsReply.comments_id',$row->comment_id)
                                             ->get('commentsReply')
                                             ->result_array();
           }
               if(!empty($result))
               {
                  return $result;
               }
               else
               {
                   return [];
               }
    }

    public function getComment($id)
    {
         $this->db->where($id);
         $query = $this->db->get('comments');
         return $query->result_array();

    }
    public function getStopMsgDetail($id,$tblName)
    {
         $this->db->where($id);
         $query = $this->db->get($tblName);
         return $query->row_array();
    }

//  job by location 
public function jobByCompany()
{
   return $this->db->select('*')
                  ->from('organization as org')
                  ->join('projects as pro','pro.org_id=org.org_id')
                  ->group_by('org.org_id')
                  ->get()->result();
}


 }
?>