<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class electrical extends CI_Controller {

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
            $data['title'] = "Electrical";
            $data['icons'] = "settings_input_composite";
            $data['Month'] = '';
            $data['Year'] = '';
            $data['month_info'] = $this->swpl_model->select_data_info('dbo.tblMonth');  
            $data['electrical_info'] = '';
            $this->load->view('swpl/electrical',$data);        
           }
            else {
                $this->session->set_userdata('last_page', current_url());
                redirect(base_url());
            }
	}     
        
         public function searchElectrical(){              
             if ($this->session->userdata('admin_login') == 1 || $this->session->userdata('mechanical_login') == 1) {           
                $this->form_validation->set_rules('Month', 'Month', 'required');
                $this->form_validation->set_rules('year', 'Year', 'required');
                if ($this->form_validation->run() == FALSE)
                         {
                                $this->session->set_flashdata('err_msg','All Fields Required..!');
                                 redirect(base_url() . 'electrical');
                        }
                        else
                         { 
                            $mn= trim($this->input->post('Month'));
                            $yr = trim($this->input->post('year'));
                            $cond = array('Month' =>$mn,'Year' =>$yr );
                            $data_info = $this->swpl_model->check_data_info('dbo.tblELManualEntry',$cond);                         
                            $this->electrical($data_info,$mn,$yr);
                         }
             }
            else {
                 $this->session->set_userdata('last_page', current_url());
                           redirect(base_url());
            }
            
        }
        
        
        public function electrical($data_info,$mn,$yr){
                        $data['title'] = "Electrical";
                        $data['icons'] = "settings_input_composite";
                        $data['Month'] = $mn;
                        $data['Year'] = $yr;
                        $data['month_info'] = $this->swpl_model->select_data_info('dbo.tblMonth');  
                        $data['electrical_info'] =  $data_info;
                        $this->load->view('swpl/electrical',$data);        
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
                           
                            $cond = array('Month' => trim($this->input->post('Month')),
                                'Year' => trim($this->input->post('year')));
                         $exist = $this->swpl_model->check_data_info('dbo.tblELManualEntry',$cond);
                         if($exist){
                                echo '<i class="material-icons">close</i> Record Already Exist..!';
                               // redirect(base_url() . 'tugs');
                         }else{
                            $data= array(
                                'Month'=> $this->input->post('Month'),
                                'year'=> $this->input->post('year'),
                                'LEGAL_EXPENSES'=> $this->input->post('LEGAL_EXPENSES'),
                                'CASH_PURCHASE'=> $this->input->post('CASH_PURCHASE'),
                                'ADMIN_UNIT_CON'=> $this->input->post('ADMIN_UNIT_CON'),
                                'ADMIN_UNIT_CON_UINIT_COST'=> $this->input->post('ADMIN_UNIT_CON_UINIT_COST'),
                                'MHS'=> $this->input->post('MHS'),
                                'GSU_MHC'=>$this->input->post('GSU_MHC'),
                                'GANTRY'=> $this->input->post('GANTRY'),
                                'MHS_GANTRY_GSU_MHC_COST'=> $this->input->post('MHS_GANTRY_GSU_MHC_COST'),
                                'POWER_FACTOR_IMROVEMENT'=> $this->input->post('POWER_FACTOR_IMROVEMENT'),
                                'POWER_FACTOR_MONTH'=> $this->input->post('POWER_FACTOR_MONTH'),
                                'DG1'=> $this->input->post('DG1'),
                                'DG2'=> $this->input->post('DG2'),
                                'DG3'=> $this->input->post('DG3'),
                                'DG_sets'=> $this->input->post('DG_sets'),
                                'DG1Unit'=> $this->input->post('DG1Unit'),
                                'DG2Unit'=> $this->input->post('DG2Unit'),
                                'DG3Unit'=> $this->input->post('DG3Unit'),
                                'DG_setsUnit'=> $this->input->post('DG_setsUnit'),
                                'AVG_diesel_cost'=> $this->input->post('AVG_diesel_cost'),
                                'TOTAL_POWER_FAILURE'=> $this->input->post('TOTAL_POWER_FAILURE'),
                                'Number_of_Power_Trips'=> $this->input->post('Number_of_Power_Trips'),
                                'FOR_VSL_OPRNS'=> $this->input->post('FOR_VSL_OPRNS'),
                                'FOR_RAKE_OPRNS'=> $this->input->post('FOR_RAKE_OPRNS'),
                                'Saving_VSL_Operation'=> $this->input->post('Saving_VSL_Operation'),
                                'Budgeted_Power_failure_HRS'=> $this->input->post('Budgeted_Power_failure_HRS'),
                                'SAVING_DEMUR_POWER_FAILURE'=> $this->input->post('SAVING_DEMUR_POWER_FAILURE'));
                            
                            $this->swpl_model->save_data_info('dbo.tblELManualEntry',$data);
                           echo 1;
                         }
                    }
          }
          else{
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
                           
                            /*$cond = array('Month' => trim($this->input->post('Month')),
                                'Year' => trim($this->input->post('year')));
                         $exist = $this->swpl_model->check_data_info('dbo.tblELManualEntry',$cond);
                         if($exist){
                                echo '<i class="material-icons">close</i> Record Already Exist..!';
                         }else{*/
                            $data= array(
                                'Month'=> $this->input->post('Month'),
                                'year'=> $this->input->post('year'),
                                'LEGAL_EXPENSES'=> $this->input->post('LEGAL_EXPENSES'),
                                'CASH_PURCHASE'=> $this->input->post('CASH_PURCHASE'),
                                'ADMIN_UNIT_CON'=> $this->input->post('ADMIN_UNIT_CON'),
                                'ADMIN_UNIT_CON_UINIT_COST'=> $this->input->post('ADMIN_UNIT_CON_UINIT_COST'),
                                'MHS'=> $this->input->post('MHS'),
                                //'MHS_UNIT_COST'=> $this->input->post('MHS_UNIT_COST'),
                                'GSU_MHC'=>$this->input->post('GSU_MHC'),
                                //'GSU_MHC_UNIT_COST'=> $this->input->post('GSU_MHC_UNIT_COST'),
                                'GANTRY'=> $this->input->post('GANTRY'),
                                'MHS_GANTRY_GSU_MHC_COST'=> $this->input->post('MHS_GANTRY_GSU_MHC_COST'),
                                'POWER_FACTOR_IMROVEMENT'=> $this->input->post('POWER_FACTOR_IMROVEMENT'),
                                'POWER_FACTOR_MONTH'=> $this->input->post('POWER_FACTOR_MONTH'),
                                'DG1'=> $this->input->post('DG1'),
                                'DG2'=> $this->input->post('DG2'),
                                'DG3'=> $this->input->post('DG3'),
                                'DG_sets'=> $this->input->post('DG_sets'),
                                'DG1Unit'=> $this->input->post('DG1Unit'),
                                'DG2Unit'=> $this->input->post('DG2Unit'),
                                'DG3Unit'=> $this->input->post('DG3Unit'),
                                'DG_setsUnit'=> $this->input->post('DG_setsUnit'),
                                'AVG_diesel_cost'=> $this->input->post('AVG_diesel_cost'),
                                'TOTAL_POWER_FAILURE'=> $this->input->post('TOTAL_POWER_FAILURE'),
                                'Number_of_Power_Trips'=> $this->input->post('Number_of_Power_Trips'),
                                'FOR_VSL_OPRNS'=> $this->input->post('FOR_VSL_OPRNS'),
                                'FOR_RAKE_OPRNS'=> $this->input->post('FOR_RAKE_OPRNS'),
                                'Saving_VSL_Operation'=> $this->input->post('Saving_VSL_Operation'),
                                'Budgeted_Power_failure_HRS'=> $this->input->post('Budgeted_Power_failure_HRS'),
                                'SAVING_DEMUR_POWER_FAILURE'=> $this->input->post('SAVING_DEMUR_POWER_FAILURE'));
                            
                             $where =array('ID'=>$id);
                            $this->swpl_model->update_data_info('dbo.tblELManualEntry',$data,$where);
                            echo 1;
                            // }
                     }
             }
             else{
                  $this->session->set_userdata('last_page', current_url());
                        redirect(base_url());
             
             }
            
            
        }
        
        public function delete($id){
          if ($this->session->userdata('admin_login') == 1 || $this->session->userdata('mechanical_login') == 1) { 
                       
                       
                $where =array('ID'=>$id);
                $this->swpl_model->delete_data_info('dbo.tblELManualEntry',$where);
                $this->session->set_flashdata('msg', ('<i class="material-icons">check_circle_outline</i> Electrical Details Deleted Successfully'));
                redirect(base_url() . 'electrical');
          }
          else{
               $this->session->set_userdata('last_page', current_url());
                        redirect(base_url());
                       
          }
        }
       
       
        
}
