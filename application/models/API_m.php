<?php

class API_m extends CI_Model {

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
// order by where codition
     public function getWhereOrderBy($table_name, $table_key_field, $decision) {
        return $this->db->order_by($table_key_field, $decision)->get($table_name)->result();
    }

    public function singleRow($table_name) {
        return $this->db->get($table_name)->row();
    }

//    function is used to return value on basis of time like 2 hours ago 3 min ago etc
    function time_elapsed_string($datetime, $full = false) {
        $now = new DateTime;
        $ago = new DateTime($datetime);
        $diff = $now->diff($ago);

        $diff->w = floor($diff->d / 7);
        $diff->d -= $diff->w * 7;

        $string = array(
            'y' => 'year',
            'm' => 'month',
            'w' => 'week',
            'd' => 'day',
            'h' => 'hour',
            'i' => 'minute',
            's' => 'second',
        );
        foreach ($string as $k => &$v) {
            if ($diff->$k) {
                $v = $diff->$k . ' ' . $v . ($diff->$k > 1 ? 's' : '');
            } else {
                unset($string[$k]);
            }
        }

        if (!$full)
            $string = array_slice($string, 0, 1);
        
        return $string ?implode(', ', $string) . ' ago' : 'just now';
    }

// ********************<Usman code> 
// upload pic function only for Product images uploadation 

    public function uploadprdPic($id) {

        // $count = 0;
         $record = $this->db->count_all_results('product');
        if($id!='')
        {
            $record = $id;
        }

        $file = '';
        $adver = '';
        if ($_FILES['file']['name'] != '') {
            // $new = 
            $path = $_FILES['file']['name'];
            // $new_name = date('s') . "prdImg" . "." . pathinfo($path, PATHINFO_EXTENSION);

            $path       = $_FILES['file']['name'];
            // mkdir("Proposals/". $_SESSION["FirstName"] ."/");
           
            // $imgName    = rand(99,999);
            // $hash_img   = $this->password->hash($imgName);
            $imgName = $this->random_num(10);
            // echo $imgName;
            // echo "<br>"."db name";
//             if(!is_dir("Proposals/". $_SESSION["FirstName"] ."/")) {
//                  mkdir("Proposals/". $_SESSION["FirstName"] ."/");
//               }

            $hash_img   = substr($imgName,0,4);
            $final_name = $hash_img.date('s'); 
            $new_name   = $final_name.".".pathinfo($path, PATHINFO_EXTENSION); 

            // $new_name = time() . str_replace(' ', '-', $_FILES["file"]['name']);
// $trackingID = rand(99, 999).date('s');
// do
// {
// $trackingID = rand(99, 999).date('s');
// $tracking_record = $this->db->where('order_tracking_id',$trackingID)->get('orders')->row();
// }
// while(!empty($tracking_record));
                // $rand  =  chr(rand(97, 122)). chr(rand(97, 122)). chr(rand(97, 122));
                $rand  =  'prdImg'.$record;
                $fldr  =  realpath(APPPATH . '../img_uploads/product_images/');
                if ( ! is_dir($fldr.'/'.$rand)) {
                 mkdir($fldr.'/'.$rand);
                }


                $adver =  $fldr.'/'.$rand .'/';
                // echo $rand.'/'.$new_name;
            // exit();
            // $res = $this->db->where('');
             // $adver =  realpath(APPPATH . '../img_uploads/product_images/' . $dir_name . '/');
             // $adver =  $dir_name;
            //  echo $adver;
            // exit();
 
            $config = [
                'upload_path' => $adver,
                'allowed_types' => 'gif|jpeg|jpg|png',
                'remove_spaces' => TRUE,
                'image_library' => 'gd2',
                'quality' => 60,
                'file_name' => $new_name
            ];

            $this->load->library('upload', $config);
            $this->upload->initialize($config);

            if ($this->upload->do_upload('file')) {
                $file = $rand.'|'.$new_name;
            } else {
                $file = $this->upload->display_errors();
            }
        }
        return $file;
    }

    // this function will recieved directory name and store in that particular directory and return image name

    public function upload($dir_name) {
        $file = '';
        if ($_FILES['file']['name'] != '') {
            $new_name = date('s') . str_replace(' ', '', $_FILES["file"]['name']);
            $adver = realpath(APPPATH . '../img_uploads/' . $dir_name . '/');
            $config = [
                'upload_path' => $adver,
                'allowed_types' => 'gif|jpeg|jpg|png',
                'remove_spaces' => true,
                'image_library' => 'gd2',
                'quality' => 60,
                'file_name' => $new_name
            ];

            $this->load->library('upload', $config);
            $this->upload->initialize($config);

            if ($this->upload->do_upload('file')) {
                $file = $new_name;
            } else {
                $file = $this->upload->display_errors();
            }
        }
        return $file;
    }

    //this function will received three paramerter first one dirctory name and second one table name and thrid table field data

    public function multipleUploads($dirName, $table_name, $table_field_data) {
        $adver = realpath(APPPATH . "../user_uploads/" . $dirName);
        $this->load->library('upload');
        $files = $_FILES;
        $cpt = count($_FILES['file']['name']);
        $img_array = [];
        for ($i = 0; $i < $cpt; $i++) {
            echo $i;
            $_FILES['file']['name'] = $files['file']['name'][$i];
            $_FILES['file']['type'] = $files['file']['type'][$i];
            $_FILES['file']['tmp_name'] = $files['file']['tmp_name'][$i];
            $_FILES['file']['error'] = $files['file']['error'][$i];
            $_FILES['file']['size'] = $files['file']['size'][$i];

            if (!$_FILES["file"]['name']) {
                $new_name = '';
            } else {
                $new_name = date('s') . str_replace(' ', '', $_FILES["file"]['name']);
            }

            $config = [
                'upload_path' => $adver,
                'allowed_types' => 'gif|png|jpg|jpeg',
                'remove_spaces' => TRUE,
                'image_library' => 'gd2',
                'quality' => 60,
                'file_name' => $new_name
            ];
            $this->upload->initialize($config);
            if ($this->upload->do_upload('file')) {
                $table_field_data['image_name'] = $new_name;

                $this->db->insert($table_name, $table_field_data);
            }
        }
        return 1;
    }

    //this function is used to get max id of table
    public function getMaxId($table, $column_name) {
        return $this->db->select_max($column_name)->get($table)->row();
    }

// this function is used to get next inserted id    
    public function getNextInsertedId($table_name, $column_name) {
        $a = $this->db->limit(1)->order_by($column_name, 'DESC')->get($table_name)->row();
        if (!empty($a)) {
            $id = $a->$column_name;
        } else {
            $id = 0;
        }
        return $id;
    }

    public function getMaxColId($table_name, $column_name) {
        $a = $this->db->select_max($column_name)->get($table_name)->row();
        if (!empty($a)) {
            $id = $a->$column_name + 1;
        } else {
            $id = 1;
        }
        return $id;
    }


public function getRollno($size) {
   
   $length = $size - 2;
   $key = '';
   $keys = range(999, 9999);
   for ($i = 0; $i < $length; $i++) {
       $key .= $keys[array_rand($keys)];
   }
   return  $key;
}

    
}
