<?php

class UserEmail_m extends CI_Model {


    //this function is use to send data to desire email address
    public function sendDataToEmail($to,$subject,$body)
    {
            $config['charset'] = 'utf-8';
            $config['mailtype'] = 'text';
            $config['newline'] = '\r\n';
            $this->email->initialize($config);
            $this->email->from('usman.buraqtech@gmail.com', 'SETS Job Portal');
            $this->email->to($to);
            $this->email->subject($subject);
            $this->email->set_mailtype("html");
            $this->email->message($body);
            $eml =  $this->email->send();

            if($eml)
            {
                return  1;
            }
            else
            {
                return 0;
            }
    }

}
?>