<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller 
{
	public function index()
	{
		$this->load->view('home/templates/header');
		$this->load->view('home/templates/header_common');
		$this->load->view('home/index');
		$this->load->view('home/templates/footer_common');
		$this->load->view('home/templates/footer');
	}
	public function about()
	{
		$this->load->view('home/templates/header');
		$this->load->view('home/templates/header_common');
		$this->load->view('home/about');
		$this->load->view('home/templates/footer_common');
		$this->load->view('home/templates/footer');
	}
	public function career($param='')
	{
	   if(empty($param)):
	       $this->career_view();
	   else:
	       if($param=='submit'):
	           if(empty($_POST)):
	               show_404();
	           else:
	               $this->form_validation->set_rules('f_name','First Name','required');
	               $this->form_validation->set_rules('l_name','Last Name','required');
	               $this->form_validation->set_rules('age','Age','required');
	               $this->form_validation->set_rules('email','Email','required');
	               $this->form_validation->set_rules('phn_no','Phone No','required');
	               $this->form_validation->set_rules('gender','Gender','required');
	               $this->form_validation->set_rules('job_location','Job Location','required');
	               $this->form_validation->set_rules('designation','Designation','required');
	               $this->form_validation->set_rules('message','Message','required');
	               if($this->form_validation->run() == FALSE):
	                   $this->session->set_flashdata('validation_error', 'Some fields were missing. Kindly fill and try again!!');
	                   $this->career_view();
	               else:
	                   
	                   $cust_id=$this->home_model->submit_career_info($param);
        				if($cust_id):
        				    //do upload of resume and set flash data that successfully submitted
        				    $this->load->library('upload');
        				    $document_config['upload_path']="./assets/customer_resume_upload/";
                            $document_config['allowed_types']='jpeg|JPEG|gif|jpg|png|ico|pdf|doc|docx|docm|dotx|dotm|docb|chm|csk|eml|hwp|txt|log|m3u|msg|odm|odt|oxps|pages|pmd|pub|rtf|shs|sxw|tex|vmg|vnt|wp5|wpd|wps|xml|xps';
                            $document_config['max_size']='10280';
                            $this->upload->initialize($document_config);
                                    if (!$this->upload->do_upload('upload_resume')):
                                        $document_upload_error=array('error'=>$this->upload->display_errors());
                                        $post_document="Not Available";
                                    else: 
                                        $document_data=$this->upload->data();
                                        $post_document=$document_data['file_name'];
                                    endif;
                            $resume_doc=$post_document;
                            
                            $this->home_model->save_customer_resume_data($cust_id,$resume_doc);
                            $this->session->set_flashdata('form_submission_success', 'Your data has been submitted successfully. We will revert back soon!');
                            $this->career_view();
        				else:
        				    //set flash data that submition failed
        				    $this->session->set_flashdata('form_submission_failed', 'Sorry Your form has not been submitted! Try Again');
        				    $this->career_view();
        				endif;
	                   
	                   
	               endif;
	           endif;
	       else:
	           show_404();
	       endif;
	   endif;
	}
	
	private function career_view()
	{
		$this->load->view('home/templates/header');
		$this->load->view('home/templates/header_common');
		$this->load->view('home/career');
		$this->load->view('home/templates/footer_common');
		$this->load->view('home/templates/footer');
	}
	
	public function contact($param='')
	{
	   if(empty($param)):
	       $this->contact_view();
	   else:
	       if($param=='submit'):
	           if(empty($_POST)):
	               show_404();
	           else:
	               $this->form_validation->set_rules('f_name','First Name','required');
	               $this->form_validation->set_rules('l_name','Last Name','required');
	               $this->form_validation->set_rules('ph_no','Phone Number','required');
	               $this->form_validation->set_rules('email','Email','required');
	               $this->form_validation->set_rules('message','Message','required');
	               if($this->form_validation->run() == FALSE):
	                   $this->session->set_flashdata('validation_error', 'Some fields were missing. Kindly fill and try again!!');
	                   $this->contact_view();
	               else:
	                   $f_name=$this->input->post('f_name');
	                   $l_name=$this->input->post('l_name');
	                   $ph_no=$this->input->post('ph_no');
	                   $email=$this->input->post('email');
	                   $message=$this->input->post('message');
	                   $contact_us_id=$this->home_model->submit_contact_info($f_name,$l_name,$ph_no,$email,$message);
	                   if($contact_us_id):
	                       $this->session->set_flashdata('contact_submit_success', 'Contact Us info submitted successfully!');
	                       $this->contact_view();
	                   else:
	                        $this->session->set_flashdata('contact_submit_failed', 'Contact Us info submission failed. Try Again!!');
	                        $this->contact_view();
	                   endif;
	                   //print_r($_POST);
	               endif;
	           endif;
	       else:
	           show_404();
	       endif;
	   endif;
	}
	
	private function contact_view()
	{
		$this->load->view('home/templates/header');
		$this->load->view('home/templates/header_common');
		$this->load->view('home/contact');
		$this->load->view('home/templates/footer_common');
		$this->load->view('home/templates/footer');
	}
	
	public function grievances($param='')
	{
	   if(empty($param)):
	       $this->grievances_view();
	   else:
	       if($param=='submit'):
	           if(empty($_POST)):
	               show_404();
	           else:
	               $this->form_validation->set_rules('f_name','First Name','required');
	               $this->form_validation->set_rules('l_name','Last Name','required');
	               $this->form_validation->set_rules('subject','Subject','required');
	               $this->form_validation->set_rules('email','Email','required');
	               $this->form_validation->set_rules('phn_no','Phone Number','required');
	               $this->form_validation->set_rules('place','Place','required');
	               $this->form_validation->set_rules('message','Message','required');
	               if($this->form_validation->run() == FALSE):
	                   $this->session->set_flashdata('validation_error', 'Some fields were missing. Kindly fill and try again!!');
	                   $this->grievances_view();
	               else:
	                   $f_name=$this->input->post('f_name');
	                   $l_name=$this->input->post('l_name');
	                   $subject=$this->input->post('subject');
	                   $email=$this->input->post('email');
	                   $phn_no=$this->input->post('phn_no');
	                   $place=$this->input->post('place');
	                   $message=$this->input->post('message');
	                   $grievances_id=$this->home_model->submit_grievances_info($f_name,$l_name,$subject,$email,$phn_no,$place,$message);
	                   if($grievances_id):
	                       $this->session->set_flashdata('grievances_submit_success', 'Grievances info submitted successfully!');
	                       $this->grievances_view();
	                   else:
	                        $this->session->set_flashdata('grievances_submit_failed', 'Grievances info submission failed. Try Again!!');
	                        $this->grievances_view();
	                   endif;
	                   //print_r($_POST);
	               endif;
	           endif;
	       else:
	           show_404();
	       endif;
	   endif;
	}
	
	private function grievances_view()
	{
		$this->load->view('home/templates/header');
		$this->load->view('home/templates/header_common');
		$this->load->view('home/grievances');
		$this->load->view('home/templates/footer_common');
		$this->load->view('home/templates/footer');
	}


}
