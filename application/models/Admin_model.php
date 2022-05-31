<?php 

class Admin_model extends CI_Model
{
    public function login($email,$password)
    {
        //validate
        $this->db->where('admin_email',$email);
        $this->db->where('password',$password);
        
        $result=$this->db->get('admin');
        
        if($result->num_rows()==1)
        {
            return $result->row(0)->admin_id;
        }
        else
        {
            return false;
        }
    }
    public function retrive_fname($email,$password)
    {
        //$this->load->databse;
        $this->db->where('admin_email',$email);
        $this->db->where('password',$password);
        
        $result=$this->db->get('admin');
        
        if($result->num_rows()==1)
        {
            return $result->row(0)->admin_fname;
        }
        else
        {
            return false;
        }
    }
    public function retrive_uname($email,$password)
    {
        //$this->load->databse;
        $this->db->where('admin_email',$email);
        $this->db->where('password',$password);
        
        $result=$this->db->get('admin');
        
        if($result->num_rows()==1)
        {
            return $result->row(0)->admin_uname;
        }
        else
        {
            return false;
        }
    }

    public function retrive_email($email,$password)
    {
        //$this->load->databse;
        $this->db->where('admin_email',$email);
        $this->db->where('password',$password);
        
        $result=$this->db->get('admin');
        
        if($result->num_rows()==1)
        {
            return $result->row(0)->admin_email;
        }
        else
        {
            return false;
        }
    }

    public function retrive_lname($email,$password)
    {
        //$this->load->databse;
        $this->db->where('admin_email',$email);
        $this->db->where('password',$password);
        
        $result=$this->db->get('admin');
        
        if($result->num_rows()==1)
        {
            return $result->row(0)->admin_lname;
        }
        else
        {
            return false;
        }
    }
    public function retrive_profile_pic($email,$password)
    {
        //$this->load->databse;
        $this->db->where('admin_email',$email);
        $this->db->where('password',$password);
        
        $result=$this->db->get('admin');
        
        if($result->num_rows()==1)
        {
            return $result->row(0)->admin_profile_pic;
        }
        else
        {
            return false;
        }
    }

    public function check_if_banner_id_exists_or_not($id)
    {
        $present_status=false;
        $check_arr=array(
            'id'=>$id
            );
        $data=$this->db->get_where('banners', $check_arr)->row_array();
        if(!empty($data)):
            //if id exists returns true or else false
            $present_status=true;
        endif;
        return $present_status;
    }
    public function get_current_status($id)
    {
        $this->db->select('status');
        $this->db->from('banners');
        $this->db->where('id', $id);
        return $this->db->get()->row_array();
    }
    public function service_setting_data($fab_icon,$event_name,$event_content,$ask_oppointment,$additional_info)
    {
        $data = array ( 
                        'fab_icon'=>$fab_icon,
                        'event_name'=>$event_name,
						'event_content'=>$event_content,
						'ask_oppointment'=>$ask_oppointment,
						'additional_info'=>$additional_info,
						'created_by'=>'Admin', 
						'created_by_id'=>$this->session->userdata('admin_id'), 
						'created_by_ip'=>$this->input->ip_address() 
                        ); 
		$this->db->insert('service',$data);
    	return $this->db->insert_id();
    }
    public function website_setting($setting_name,$setting_desc,$additional_info)
    {
                                $my_info="";
                                if($additional_info==""):
                                    $my_info="Not Available";
                                else:
                                    $my_info = $additional_info;
                                endif;
        $data = array ( 
                        'setting_name'=>$setting_name,
                        'setting_desc'=>$setting_desc,
						'additional_info'=>$my_info,
						'created_by'=>'admin',
						'created_by_id'=>$this->session->userdata('admin_id'),
						'created_by_ip'=>$this->input->ip_address()
                        );
		$this->db->insert('website_setting',$data);
    	return $this->db->insert_id();
	}
    public function get_all_setting()
    {
        return $this->db->get('website_setting')->result_array();
    }
    public function delete_banner($id)
    {
            $this -> db -> where('id', $id);
            $this -> db -> delete('banners');
            return true;
    }
    public function fetch_admin_data($id)
    {
        return $this->db->get('admin')->result_array();
    }
   	public function add_banner_image($id,$banner_name,$banner_description,$my_file)
	{
        $data = array ( 
                        'banner_name'=>$banner_name,
                        'banner_description'=>$banner_description,
						'bannner_image'=>$my_file,
						'created_by'=>'Admin',
						'created_by_id'=>$this->session->userdata('admin_id'),
						'created_by_ip'=>$this->input->ip_address()
                        );
		$this->db->insert('banners',$data);
    	return $this->db->insert_id();
	}
   	public function insert_testemonials($testemonial_content,$testemonial_name,$additional_info)
	{
        $data = array ( 
                        'testemonial_content'=>$testemonial_content,
                        'testemonial_name'=>$testemonial_name,
						'additional_info'=>$additional_info,
						'created_by'=>'Admin',
						'created_by_id'=>$this->session->userdata('admin_id'),
						'created_by_ip'=>$this->input->ip_address()
                        );
		$this->db->insert('testemonial_settings',$data);
    	return $this->db->insert_id();
	}
   	public function insert_events($event_name,$event_content,$my_file)
	{
        $data = array ( 
                        'event_name'=>$event_name,
                        'event_content'=>$event_content,
						'event_image'=>$my_file,
						'created_by'=>'Admin',
						'created_by_id'=>$this->session->userdata('admin_id'),
						'created_by_ip'=>$this->input->ip_address()
                        );
		$this->db->insert('events',$data);
    	return $this->db->insert_id();
	}
	public function get_all_service_setting_data()
	{
	    return $this->db->get('service')->result_array();
	}
    public function fetch_banner_data()
    {
        return $this->db->get('banners')->result_array();
    }
    public function fetch_events_data()
    {
        return $this->db->get('events')->result_array();
    }
    public function get_single_data($array, $table_name)
    {
        $data=$this->db->get_where($table_name, $array)->row_array();
        return $data;
    }
    public function get_all_data($array, $table_name)
    {
        $data=$this->db->get_where($table_name, $array)->result_array(); 
        return $data;
    }
    public function update_data($id, $key, $updated_data, $table_name)
    {
        $this->db->where($key, $id);
        $this->db->update($table_name,$updated_data);
        return true;
    }
}