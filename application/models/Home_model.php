<?php 

class Home_model extends CI_Model
{
     public function submit_contact_info($f_name,$l_name,$ph_no,$email,$message)
    {
        $ip=$this->input->ip_address();
        $contact_arr = array
            (
                'contact_name'=>$f_name.' '.$l_name,
                'contact_email'=>$email,
                'contact_phone'=>$ph_no,
                'contact_message'=>$message,
                'contact_ip'=>$ip
            );
        $this->db->insert('contact_us_info',$contact_arr);
        $contact_us_id=$this->db->insert_id();
        return $contact_us_id;
    }
    public function fetch_banner_data_with_status_active()
    {
        $check_arr=array(
            'status'=>'active'
            );
        $data=$this->db->get_where('banners', $check_arr)->row_array();
        return $data;
    }
    public function submit_grievances_info($f_name,$l_name,$subject,$email,$phn_no,$place,$message)
    {
        $ip=$this->input->ip_address();
        $grievances_arr = array
            (
                'firstname'=>$f_name,
                'lastname'=>$l_name,
                'email'=>$email,
                'subject'=>$subject,
                'mobile_no'=>$phn_no,
                'country'=>$place,
                'message'=>$message,
                'sender_ip'=>$ip
            );
        $this->db->insert('grievances',$grievances_arr);
        $grievances_id=$this->db->insert_id();
        return $grievances_id;
    }
    
         public function submit_career_info($param)
    {
        if($param=='submit'):
            $ip=$this->input->ip_address();
            $career_arr = array
                (
                    'cust_fname'=>$this->input->post('f_name'),
                    'cust_lname'=> $this->input->post('l_name'),
                    'cust_email'=>  $this->input->post('email'),
                    'age'=>  $this->input->post('age'),
                    'job_location'=>  $this->input->post('job_location'),
                    'cust_phone'=>  $this->input->post('phn_no'),
                    'designation'=> $this->input->post('designation'),
                    'gender'=> $this->input->post('gender'),
                    'short_desc'=> $this->input->post('message'),
                    'cust_ip'=>$ip
                );
            $this->db->insert('customer_career',$career_arr);
            $cust_id=$this->db->insert_id();
            return $cust_id;
        else:
            return false;
        endif;
    }
    
    public function save_customer_resume_data($cust_id,$resume_doc)
    {
        if($resume_doc):
            $resume_save_data=array(
                'cust_id'=>$cust_id,
                'document_name'=>$resume_doc,
                'document_desc'=>'Resume'
            );
        return $this->db->insert('customer_resume_data',$resume_save_data);
        endif;
    }
     public function get_all_settings()
    {
        return $this->db->get('website_setting')->result_array();
    }
     public function get_all_events_data()
    {
        return $this->db->get('events')->result_array();
    }
     public function get_all_testemonials()
    {
        return $this->db->get('testemonial_settings')->result_array();
    }
 
    
}