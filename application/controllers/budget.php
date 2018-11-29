<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class budget extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->database();        	
        $this->load->library('session');
	$this->load->library('form_validation');
        $this->load->model('swpl_model');
        $this->load->helper('file');
        $this->load->helper(array('form', 'url'));
         /* cache control */
        $this->output->set_header('Cache-Control: no-store, no-cache, must-revalidate, post-check=0, pre-check=0');
        $this->output->set_header('Pragma: no-cache');
    }
        
       public function index()
	{
            if ($this->session->userdata('admin_login') == 1 || $this->session->userdata('mechanical_login') == 1) {
            $data['title'] = "Budget";
            $data['icons'] = "attach_money";
            $data['Month'] = '';
            $data['Year'] = '';
            $data['month_info'] = $this->swpl_model->select_data_info('dbo.tblMonth');  
            $data['budget_info'] = '';
            $this->load->view('swpl/budget',$data);
             }
            else {
                $this->session->set_userdata('last_page', current_url());
                redirect(base_url());
            }
	}     
        
         public function searchBudget(){ 
              if ($this->session->userdata('admin_login') == 1 || $this->session->userdata('mechanical_login') == 1) {
                    $this->form_validation->set_rules('Month', 'Month', 'required');
                    $this->form_validation->set_rules('year', 'Year', 'required');
                    if ($this->form_validation->run() == FALSE)
                             {
                                      $this->session->set_flashdata('err_msg','All Fields Required..!');
                                        redirect(base_url() . 'budget');
                            }
                            else
                             { 
                                $mn= trim($this->input->post('Month'));
                                $yr = trim($this->input->post('year'));
                                $cond = array('Month' =>$mn,'Year' =>$yr );
                                $data_info = $this->swpl_model->check_data_info('dbo.tblMISBudget',$cond);                         
                                $this->budget($data_info,$mn,$yr);
                             }   
                }
            else {
                $this->session->set_userdata('last_page', current_url());
                redirect(base_url());
            }
            
        }
        
        
        public function budget($data_info,$mn,$yr){
                        $data['title'] = "Budget";
                        $data['icons'] = "attach_money";
                        $data['Month'] = $mn;
                        $data['Year'] = $yr;
                        $data['month_info'] = $this->swpl_model->select_data_info('dbo.tblMonth');  
                        $data['budget_info'] =  $data_info;
                        $this->load->view('swpl/budget',$data);        
        }
        
        
      public function save(){
           if ($this->session->userdata('admin_login') == 1 || $this->session->userdata('mechanical_login') == 1) {
            $this->form_validation->set_rules('Month', 'Month', 'required');
            $this->form_validation->set_rules('year', 'Year', 'required');
            if ($this->form_validation->run() == FALSE)
                     {
                            echo validation_errors();
                            //redirect(base_url() . 'tugs');
                    }
                    else
                     {   
                           $Month= $this->input->post('Month');
                           $year = $this->input->post('year');
                           $Discription = $this->input->post('Name');
                           $num_equip = sizeof($Discription);
                           
                            $cond = array('Month' => $Month,'Year' => $year);
                         $exist = $this->swpl_model->check_data_info('dbo.tblMISBudget',$cond);
                         if($exist){
                                echo '<i class="material-icons">close</i> Record Already Exist..!';
                               // redirect(base_url() . 'tugs');
                         }else{
                            for ($i = 0; $i < $num_equip; $i++)
                            {
                                $data= array(
                                    'Month'=> $Month,
                                    'Year'=> $year,
                                    'Discription'=> $Discription[$i],
                                    'UOM'=> $this->input->post('UOM')[$i],
                                    'Budget'=> $this->input->post('Budget')[$i]);
                                $this->swpl_model->save_data_info('dbo.tblMISBudget',$data);
                            }
                            echo 1;
                         }
                    }
                 }
            else {
                $this->session->set_userdata('last_page', current_url());
                redirect(base_url());
            }    
            
            
        }
        
        public function update($id){
             if ($this->session->userdata('admin_login') == 1 || $this->session->userdata('mechanical_login') == 1) {
             $this->form_validation->set_rules('Month', 'Month', 'required');
            $this->form_validation->set_rules('year', 'Year', 'required');
            if ($this->form_validation->run() == FALSE)
                     {
                            echo validation_errors();
                            //redirect(base_url() . 'tugs');
                    }
                    else
                     {                              
                           $Month= $this->input->post('Month');
                           $year = $this->input->post('year');                          
                            $data= array(
                                    'Month'=> $Month,
                                    'Year'=> $year,
                                    'Discription'=> $this->input->post('Discription'),
                                    'UOM'=> $this->input->post('UOM'),
                                    'Budget'=> $this->input->post('Budget'));
                             $where =array('Sr_No'=>$id);
                            $this->swpl_model->update_data_info('dbo.tblMISBudget',$data,$where);
                            echo 1;
                     }
                }
            else {
                $this->session->set_userdata('last_page', current_url());
                redirect(base_url());
            }         
            
            
        }
        
        public function delete($id){
             if ($this->session->userdata('admin_login') == 1 || $this->session->userdata('mechanical_login') == 1) {
                $where =array('Sr_No'=>$id);
                $this->swpl_model->delete_data_info('dbo.tblMISBudget',$where);
                $this->session->set_flashdata('msg', ('<i class="material-icons">check_circle_outline</i> Budget Details Deleted Successfully'));
                redirect(base_url() . 'budget');
            }
            else {
                $this->session->set_userdata('last_page', current_url());
                redirect(base_url());
            }    
        }
       
       
        
}
