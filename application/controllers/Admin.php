<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller 
{
	public function index()
	{
	    $this->admin_session();
		$this->load->view('admin/templates/header');
		$this->load->view('admin/templates/header_common');
		$this->load->view('admin/dashboard');
		$this->load->view('admin/templates/footer_common');
		$this->load->view('admin/templates/footer');
	}
	public function login()
	{
		$this->load->view('admin/templates/header');
		//$this->load->view('home/templates/header_common');
		$this->load->view('admin/login');
		//$this->load->view('home/templates/footer_common');
		$this->load->view('admin/templates/footer');
	}
	public function fetch_admin_data()
	{
        $this->admin_session();
        $id=$this->session->userdata('admin_id');
    	$data=$this->admin_model->fetch_admin_data($id);
    	return $data;
	}
	
    public function dinamic_banner_view()
    {
        $this->admin_session();
        $data_for_status=$this->admin_model->get_all_data(array('status'=>'active'), 'banners');
        	   
    }
	public function activate_banner($id)
	{
	    $this->admin_session();
		if(empty($id)):
			show_404();
		else:
		    //check if the banner id is present or not
		    $banner_status=$this->admin_model->get_single_data(array('id'=>$id), 'banners')['status'];//this return true/false
	        if($banner_status=='active'):
	            $this->admin_model->update_data($id, 'id', array('status'=>'inactive'), 'banners');
	            $this->session->set_flashdata('deactivate_success', 'Successfully Banner Deactivated.');
	            redirect('admin/settings','refresh');
	        elseif($banner_status=='inactive'):
	            $data_for_status=$this->admin_model->get_all_data(array('status'=>'active'), 'banners');
	            if(!empty($data_for_status)):
	                $this->session->set_flashdata('available', 'Deactivate your activated banner Fisrt!');
	                redirect('admin/settings','refresh');
	            else:
	                $this->admin_model->update_data($id, 'id', array('status'=>'active'), 'banners');
	                $this->session->set_flashdata('activate_success', 'Successfully Banner Activated.');
	                redirect('admin/settings','refresh');
	            endif;
	        else:
	            $this->session->set_flashdata('not_available', 'Banner Not Available, Please Upload Banner!');
	            redirect('admin/settings','refresh');
	        endif;
		endif;
	}
    private function upload_single_or_multiple_document($param,$veer_folder,$extension_arr,$post_document_name)
    {
        //$param is single or multiple
        //$veer_folder is folder with path but without '/'(slash) before or after
        //$extension_arr is array of all file types that need to be uploaded
        //$post_document_name is the name attribute of html input file element
        $this->admin_session();
        if(empty($post_document_name)):
            $doc=false;
        else:
            if($param=='multiple'):
                //code for multiple file upload
                $this->load->library('my_upload');
                $veer_folder=$veer_folder."/";
                $extension_str='';
                foreach($extension_arr as $ext):$extension_str.=$ext.'|';endforeach;
                $extension_str=substr_replace($extension_str, "", -1);//remove last character
                $veer_file_type=$extension_str;
                $config_document['upload_path']='./'.$veer_folder;
        		$config_document['allowed_types']=$veer_file_type;
                $config_document['remove_spaces']=TRUE;
        		$config_document['overwrite']=FALSE;//TRUE;//overwrites the file if uploaded with the same name
        		$config_document['max_size']='509600';
        		$config_document['max_width']='4096';
        		$config_document['max_height']='4096';
                $config_document['max_filename']='0';//max length that a file name can be, set zero for no limit
        		$config_document['encrypt_name']=FALSE;//file name will be converted to a random encrypted string
                $this->upload->initialize($config_document);
                $this->upload->do_multi_upload($post_document_name);
                $data['upload_document_data_array']=$this->upload->get_multi_upload_data();
                $document_arr=array();
                $document_with_path_arr=array();
                $document_with_path_without_base_url_arr=array();
                $document_file_ext_arr=array();
                if(!empty($data['upload_document_data_array'])):
                    foreach($data['upload_document_data_array'] as $userfile_data):
                        $document_name=$userfile_data['file_name'];
                        $document_full_name=base_url().$veer_folder.$document_name;
                        $document_full_name_without_base_url=$veer_folder.$document_name;
                        $document_file_ext=substr($userfile_data['file_ext'], 1);    //removed starting character
                        $document_arr[]=$document_name;
                        $document_with_path_arr[]=$document_full_name;
                        $document_with_path_without_base_url_arr[]=$document_full_name_without_base_url;
                        $document_file_ext_arr[]=$document_file_ext;
                    endforeach;
                endif;
                $doc['document_arr']=$document_arr;
                $doc['document_with_path_arr']=$document_with_path_arr;
                $doc['document_with_path_without_base_url_arr']=$document_with_path_without_base_url_arr;
                $doc['document_file_ext_arr']=$document_file_ext_arr;
            elseif($param=='single'):
                //code for single fle upload
                $veer_folder=$veer_folder."/";
                $extension_str='';
                foreach($extension_arr as $ext):$extension_str.=$ext.'|';endforeach;
                $extension_str=substr_replace($extension_str, "", -1);//remove last character
                $veer_file_type=$extension_str;
                $config['upload_path']='./'.$veer_folder;
    			$config['allowed_types']=$veer_file_type;
        		$config['max_size']='5096000';
        		$config['max_width']='409600';
        		$config['max_height']='409600';
    			$config['overwrite']=FALSE;//if file uploaded with same name, it will append a number and upload the file with new name//TRUE;//overwrites the file if uploaded with the same name
                $config['max_filename']='0';//max length that a file name can be, set zero for no limit
                $config['remove_spaces']=TRUE;//any spaces in the filename will be converted to underscores
    			$config['encrypt_name']=FALSE;//file name will be converted to a random encrypted string
                $this->load->library('upload');
                $this->upload->initialize($config);
                $this->upload->do_upload($post_document_name);
                $data['upload_data']=$this->upload->data();
                $file_name=$data['upload_data']['file_name'];
                $file_name_with_full_url=base_url().$veer_folder.$file_name;
                $file_name_without_base_url=$veer_folder.$file_name;
                $doc['file_name']=$file_name;
                $doc['file_ext']=substr($data['upload_data']['file_ext'], 1);
                $doc['file_name_with_full_url']=$file_name_with_full_url;
                $doc['file_name_without_base_url']=$file_name_without_base_url;
            else:
                $doc=false;
            endif;
        endif;
        return $doc;
    }
	public function service_setting_data($param='')
	{
		if(empty($param)):
			show_404();
		else:
			if($param=='submit'):
				if(empty($_POST)):
					show_404();
				else:
					$this->form_validation->set_rules('fab_icon','Fab Icon','required|trim');
					$this->form_validation->set_rules('event_name','Event Name','required|trim');
					$this->form_validation->set_rules('event_content','Event Content','required|trim');
					$this->form_validation->set_rules('ask_oppointment','Ask Oppointment','required|trim');
					$this->form_validation->set_rules('additional_info','Additional Information','required|trim');
					if($this->form_validation->run()===FALSE):
						echo validation_errors();
					else:
						$fab_icon=$this->input->post('fab_icon');  
						$event_name=$this->input->post('event_name');
						$event_content=$this->input->post('event_content');
						$ask_oppointment=$this->input->post('ask_oppointment');
						$additional_info=$this->input->post('additional_info');
                        //$blog_pic=$this->upload_single_or_multiple_document($param='single',$veer_folder='assets/dcentevent/fab_icon',$extension_arr=array('jpeg','bmp','gif','JPEG','BMP','GIF','jpg','JPG'),$post_document_name='fab_icon');						
						$user_data=$this->admin_model->service_setting_data($fab_icon,$event_name,$event_content,$ask_oppointment,$additional_info);
						if(!empty($user_data)):
							redirect('admin/service_setting','refresh');
						endif;
					endif;			
				endif;
			else:
				show_404();
			endif;
		endif;
	    
	}
	public function website_setting($param='')
	{
		if(empty($param)):
			show_404();
		else:
			if($param=='submit'):
				if(empty($_POST)):
					show_404();
				else:
					$this->form_validation->set_rules('setting_name','Tittle','required|trim');
					$this->form_validation->set_rules('setting_desc','Content','required|trim');
					if($this->form_validation->run()===FALSE):
						echo validation_errors();
					else:
						$setting_name=$this->input->post('setting_name');
						$setting_desc=$this->input->post('setting_desc');
						$additional_info=$this->input->post('additional_info');
						$user_data=$this->admin_model->website_setting($setting_name,$setting_desc,$additional_info);
						if(!empty($user_data)):
							redirect('admin/setting','refresh');
						endif;
					endif;			
				endif;
			else:
				show_404();
			endif;
		endif;
	    
	}
	public function add_events($param='')
	{
		if(empty($param)):
			show_404();
		else:
			if($param=='submit'):
				if(empty($_POST)):
					show_404();
				else:
					$this->form_validation->set_rules('event_name','Name','required|trim');
					$this->form_validation->set_rules('event_content','Additional Information','required|trim');
					if($this->form_validation->run()===FALSE):
						echo validation_errors();
					else:
						$event_name=$this->input->post('event_name');
						$event_content=$this->input->post('event_content');
                        $events_pic=$this->upload_single_or_multiple_document($param='single',$veer_folder='assets/dcentevent/img',$extension_arr=array('jpeg','bmp','gif','JPEG','BMP','GIF','jpg','JPG','png','PNG'),$post_document_name='event_image');
                        $my_file='not available';
                        if(!empty($events_pic)):
                            $my_file=$events_pic['file_name_with_full_url'];
                        endif;
                        $id=$this->input->post('admin_id');   
						$user_data=$this->admin_model->insert_events($event_name,$event_content,$my_file);
						if(!empty($user_data)):
							redirect('admin/events_setting','refresh');
						endif;
					endif;			
				endif;
			else:
				show_404();
			endif;
		endif;
	    
	}
	public function add_testemonials($param='')
	{
		if(empty($param)):
			show_404();
		else:
			if($param=='submit'):
				if(empty($_POST)):
					show_404();
				else:
					$this->form_validation->set_rules('testemonial_content','Content','required|trim');
					$this->form_validation->set_rules('testemonial_name','Name','required|trim');
					$this->form_validation->set_rules('additional_info','Additional Information','required|trim');
					if($this->form_validation->run()===FALSE):
						echo validation_errors();
					else:
						$testemonial_content=$this->input->post('testemonial_content');
						$testemonial_name=$this->input->post('testemonial_name');
						$additional_info=$this->input->post('additional_info');
						$user_data=$this->admin_model->insert_testemonials($testemonial_content,$testemonial_name,$additional_info);
						if(!empty($user_data)):
							redirect('admin/testemonial_setting','refresh');
						endif;
					endif;			
				endif;
			else:
				show_404();
			endif;
		endif;
	    
	}
	public function setting()  // this function is for adding entire dynamic settings of website
	{
	    $this->admin_session();
        $data['all_settings']=$this->admin_model->get_all_setting();
		$this->load->view('admin/templates/header',$data);
		$this->load->view('admin/templates/header_common');
		$this->load->view('admin/setting');
		$this->load->view('admin/templates/footer_common');
		$this->load->view('admin/templates/footer');
	}
	
	public function events_setting()  // this function is for adding entire dynamic settings of website  
	{
	    $this->admin_session();
        $data['event_settings']=$this->admin_model->fetch_events_data();
		$this->load->view('admin/templates/header',$data);
		$this->load->view('admin/templates/header_common');  
		$this->load->view('admin/events_setting');  
		$this->load->view('admin/templates/footer_common');
		$this->load->view('admin/templates/footer');
	}
	public function testemonial_setting()  // this function is for adding entire dynamic settings of website  
	{
	    $this->admin_session();
        //$data['service_settings']=$this->admin_model->get_all_service_setting_data();
		$this->load->view('admin/templates/header');
		$this->load->view('admin/templates/header_common');  
		$this->load->view('admin/testemonial_setting');  
		$this->load->view('admin/templates/footer_common');
		$this->load->view('admin/templates/footer');
	}
	public function service_setting()  // this function is for adding entire dynamic settings of website
	{
	    $this->admin_session();
        $data['service_settings']=$this->admin_model->get_all_service_setting_data();
		$this->load->view('admin/templates/header',$data);
		$this->load->view('admin/templates/header_common');
		$this->load->view('admin/service_setting');
		$this->load->view('admin/templates/footer_common');
		$this->load->view('admin/templates/footer');
	}
	public function delete_banner($id)
	{
	  	$this->admin_session();
		if(empty($id)):
			show_404();
		else:
		    //check if the banner id is present or not
		    $status=$this->admin_model->check_if_banner_id_exists_or_not($id);  
		      if(!empty($status)):
		           $status=$this->admin_model->get_current_status($id); 
		            if(!empty($status)):
		                $this->admin_model->delete_banner($id); 
		                redirect('admin/settings','refresh');
		            else:
		                    $this->session->set_flashdata('Image Was Not Found', 'You Tried To Activate Or Deactivate An Unknown Image.Contact Administrator!');
		             endif;
		      else:
		         $this->session->set_flashdata('Image Was Not Found', 'You Tried To Activate Or Deactivate An Unknown Image.Contact Administrator!'); 
		      endif;
		endif;
	}
	public function settings()        // this function is for adding banner dynamic settings of website
	{
	    $this->admin_session();
	    $data['banner_data']=$this->admin_model->fetch_banner_data();
	    $data['admin_data']=$this->fetch_admin_data();
		$this->load->view('admin/templates/header',$data);
		$this->load->view('admin/templates/header_common');
		$this->load->view('admin/settings');
		$this->load->view('admin/templates/footer_common');
		$this->load->view('admin/templates/footer');
	}
	public function add_banner($param='')
	{
		if(empty($param)):
			show_404();
		else:
			//check $param is submit or not
			if($param=='submit'):
				//check post is empty or not
				if(empty($_POST)):
					show_404();
				else:
					$this->form_validation->set_rules('banner_name','Tittle','required|trim');
					$this->form_validation->set_rules('banner_description','Slug','required|trim');
					if($this->form_validation->run()===FALSE):
						echo validation_errors();
					else:
						$banner_name=$this->input->post('banner_name');
						$banner_description=$this->input->post('banner_description');
						$banner_pic=$this->upload_single_or_multiple_document($param='single',$veer_folder='assets/banner',$extension_arr=array('jpeg','bmp','gif','JPEG','BMP','GIF','jpg','JPG'),$post_document_name='my_bannner_image');
                        $my_file='not available';
                        if(!empty($banner_pic)):
                            $my_file=$banner_pic['file_name_with_full_url'];
                        endif;
                        $id=$this->input->post('admin_id');   
						$user_data=$this->admin_model->add_banner_image($id,$banner_name,$banner_description,$my_file);
						if(!empty($user_data)):
							redirect('admin/settings','refresh');
						endif;
					endif;			
				endif;
			else:
				show_404();
			endif;
		endif;
	}    
    public function mylogin($param='')
    {
		if(empty($param)):
			show_404();
		else:
			//check $param is submit or not
			if($param=='submit'):
				//check post is empty or not
				if(empty($_POST)):
					show_404();
				else:
                        /*echo "<pre>";
						print_r($_POST);
						echo "</pre>";
                        exit();	*/						

                    $this->form_validation->set_rules('email','Email','required');
                    $this->form_validation->set_rules('password','Password','required');
            
                    if($this->form_validation->run()===FALSE)
                    {
                        redirect('login','refresh');
                    }
                    else
                    {
                        //get email from user
                        $email=$this->input->post('email');
                        $password=$this->input->post('password');
                        //login user , after successful login we will get user_id
                          $admin_id=$this->admin_model->login($email,$password);
                          $firstname=$this->admin_model->retrive_fname($email,$password);
                          $username=$this->admin_model->retrive_uname($email,$password);
                          $lastname=$this->admin_model->retrive_lname($email,$password);
                          $email_rev=$this->admin_model->retrive_email($email,$password);
                          $profile_pic=$this->admin_model->retrive_profile_pic($email,$password);

                        //if user_id is valid then create the session
                        if($admin_id)
                        {
                            //create session
                            $admin_data= array(			//passing data of user in array to be available throughout session
                                'admin_id' =>$admin_id,
                                'admin_username' =>$username,
                                'admin_firstname' =>$firstname,
                                'admin_lastname' =>$lastname,
                                'admin_email_id' =>$email_rev,
                                'admin_profile_pic'=>$profile_pic,
                                'admin_logged_in' =>true,
                                'admin_date'=>date("Y-m-d H:i:s"),
                                'admin_usertype'=>'admin'
                                 );
                            $this->session->set_userdata($admin_data);//setting the user data array to the session
                            //set flash message
                            $this->session->set_flashdata('admin_loggedin','You are now logged in');
                            redirect('admin');//redirecting to the posts index page
                        }
                        else
                        {
                            //set flash message
                            $this->session->set_flashdata('login_failed','Login is invalid');
                            redirect('admin/login');
                        }
                        
                    }
                endif;  
            endif;
        endif;
    }
    public function logout()
    {
        $this->admin_session();
        $this->session->set_flashdata('admin_loggedout','You are now logged out');
        $this->session->unset_userdata('admin_id');
        $this->session->unset_userdata('admin_username');
        $this->session->unset_userdata('admin_firstname');
        $this->session->unset_userdata('admin_lastname');
        $this->session->unset_userdata('admin_profile_pic');
        $this->session->unset_userdata('admin_email_id');
        $this->session->unset_userdata('admin_logged_in');
        $this->session->unset_userdata('admin_date');
        $this->session->unset_userdata('admin_usertype');
        redirect('admin/login');
        $this->session->sess_destroy();
    }
    public function admin_session()
    {
        //check session permission for creating the post
        if(!$this->session->userdata('admin_logged_in'))		
        //check login
        {
            $this->session->set_flashdata('admin_timeout','You are no longer logged in.Login Again.');
            redirect('admin/login');
        }
    }

}
