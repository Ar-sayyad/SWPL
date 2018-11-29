<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class terminalMaint extends CI_Controller {

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
            if ($this->session->userdata('admin_login') == 1 || $this->session->userdata('electrical_login') == 1) {
                $data['title'] = "Terminal Maint";
                $data['icons'] = "tram";
                $data['Month'] = '';
                $data['Year'] = '';
                $data['month_info'] = $this->swpl_model->select_data_info('dbo.tblMonth');  
                $data['mhc_info'] = '';
                $this->load->view('swpl/terminalMaint',$data);
            }
            else {
                $this->session->set_userdata('last_page', current_url());
                redirect(base_url());
            }     
	}     
        
         public function searchMaint(){ 
              if ($this->session->userdata('admin_login') == 1 || $this->session->userdata('electrical_login') == 1) {
                $this->form_validation->set_rules('Month', 'Month', 'required');
                $this->form_validation->set_rules('year', 'Year', 'required');
                if ($this->form_validation->run() == FALSE)
                         {
                                  $this->session->set_flashdata('err_msg','All Fields Required..!');
                                    redirect(base_url() . 'terminalMaint');
                        }
                        else
                         { 
                            $mn= trim($this->input->post('Month'));
                            $yr = trim($this->input->post('year'));
                            $cond = array('Month' =>$mn,'Year' =>$yr );
                            $data_info = $this->swpl_model->check_data_info('dbo.tblManualTerminalMaint',$cond);                         
                            $this->terminalMaint($data_info,$mn,$yr);
                         }
                }
            else {
                $this->session->set_userdata('last_page', current_url());
                redirect(base_url());
            }       
            
        }
        
        
        public function terminalMaint($data_info,$mn,$yr){
                        $data['title'] = "Terminal Maint";
                        $data['icons'] = "tram";
                        $data['Month'] = $mn;
                        $data['Year'] = $yr;
                        $data['month_info'] = $this->swpl_model->select_data_info('dbo.tblMonth');  
                        $data['mhc_info'] =  $data_info;
                        $this->load->view('swpl/terminalMaint',$data);        
        }
        
        
      public function save(){
              if ($this->session->userdata('admin_login') == 1 || $this->session->userdata('electrical_login') == 1) {
            $this->form_validation->set_rules('Month', 'Month', 'required');
            $this->form_validation->set_rules('year', 'Year', 'required');
            if ($this->form_validation->run() == FALSE)
                     {
                            echo validation_errors();
                    }
                    else
                     {   
                           $Month= $this->input->post('Month');
                           $year = $this->input->post('year');
                           $Group_Desc = $this->input->post('Group_Desc');
                           $num_equip = sizeof($Group_Desc);
                           
                            $cond = array('Month' => $Month,'Year' => $year);
                         $exist = $this->swpl_model->check_data_info('dbo.tblManualTerminalMaint',$cond);
                         if($exist){
                                echo '<i class="material-icons">close</i> Record Already Exist..!';
                         }else{
                            for ($i = 0; $i < $num_equip; $i++)
                            {
                                $data= array(
                                    'Month'=> $Month,
                                    'Year'=> $year,
                                    'Group_Desc'=> $Group_Desc[$i],
                                    'Description'=> $this->input->post('Description')[$i],
                                    'Revenue'=> $this->input->post('Revenue')[$i],
                                    'JSWIL_Value'=>$this->input->post('JSWIL_Value')[$i]);
                                $this->swpl_model->save_data_info('dbo.tblManualTerminalMaint',$data);
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
             if ($this->session->userdata('admin_login') == 1 || $this->session->userdata('electrical_login') == 1) {
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
                                    'Group_Desc'=> $this->input->post('Group_Desc'),
                                    'Description'=> $this->input->post('Description'),
                                    'Revenue'=> $this->input->post('Revenue'),
                                    'JSWIL_Value'=>$this->input->post('JSWIL_Value'));
                             $where =array('Sr_No'=>$id);
                            $this->swpl_model->update_data_info('dbo.tblManualTerminalMaint',$data,$where);
                            echo 1;
                     }
                }
            else {
                $this->session->set_userdata('last_page', current_url());
                redirect(base_url());
            }            
            
            
        }
        
        public function delete($id){
             if ($this->session->userdata('admin_login') == 1 || $this->session->userdata('electrical_login') == 1) {
                $where =array('Sr_No'=>$id);
                $this->swpl_model->delete_data_info('dbo.tblManualTerminalMaint',$where);
                $this->session->set_flashdata('msg', ('<i class="material-icons">check_circle_outline</i> Terminal Details Deleted Successfully'));
                redirect(base_url() . 'terminalMaint');
            }
            else {
                $this->session->set_userdata('last_page', current_url());
                redirect(base_url());
            }        
        }
       
       
        
}
