<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class heme extends CI_Controller {

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
                $data['title'] = "HEME Diesel Consumption";
                $data['icons'] = "local_gas_station";
                $data['Month'] = '';
                $data['Year'] = '';
                $data['Type'] = '';
                $data['month_info'] = $this->swpl_model->select_data_info('dbo.tblMonth');  
                $data['HEME_info'] = '';
                $data['HEME_Availability_info'] = '';
                $data['HEME_Diesel_info'] = '';
                $this->load->view('swpl/heme',$data);
             }
            else {
                $this->session->set_userdata('last_page', current_url());
                redirect(base_url());
            }
	}     
        
         public function searchHeme(){ 
              if ($this->session->userdata('admin_login') == 1 || $this->session->userdata('electrical_login') == 1) {
            $this->form_validation->set_rules('Month', 'Month', 'required');
            $this->form_validation->set_rules('year', 'Year', 'required');
            $this->form_validation->set_rules('Type', 'Type', 'required');
            if ($this->form_validation->run() == FALSE)
                     {
                              $this->session->set_flashdata('err_msg','All Fields Required..!');
                                redirect(base_url() . 'heme');
                    }
                    else
                     { 
                        $mn= trim($this->input->post('Month'));
                        $yr = trim($this->input->post('year'));
                        $ty = trim($this->input->post('Type'));
                        $cond = array('Month' =>$mn,'Year' =>$yr);
                        if($ty==1){
                        $tblManualHEME_info = '';    
                        $tblManualHEME_Availability_info = '';  
                        $tblManualHEME_Diesel_info = $this->swpl_model->check_data_info('dbo.tblManualHEME_Diesel',$cond);
                        }elseif ($ty==2) {
                            $tblManualHEME_info = '';   
                            $tblManualHEME_Availability_info = $this->swpl_model->check_data_info('dbo.tblManualHEME_Availability',$cond);  
                            $tblManualHEME_Diesel_info = '';               
                            }elseif ($ty==3) {
                                 $tblManualHEME_info = $this->swpl_model->check_data_info('dbo.tblManualHEME',$cond);    
                                 $tblManualHEME_Availability_info = ''; 
                                 $tblManualHEME_Diesel_info = '';
                            }
                         
                        $this->heme($tblManualHEME_info,$tblManualHEME_Availability_info,$tblManualHEME_Diesel_info,$mn,$yr,$ty);
                     }
                 }
            else {
                $this->session->set_userdata('last_page', current_url());
                redirect(base_url());
            }     
            
        }
        
        
        public function heme($tblManualHEME_info,$tblManualHEME_Availability_info,$tblManualHEME_Diesel_info,$mn,$yr,$ty){
                        $data['title'] = "HEME Diesel Consumption";
                        $data['icons'] = "local_gas_station";                        
                        $data['Month'] = $mn;
                        $data['Year'] = $yr;
                        $data['Type'] = $ty;
                        $data['month_info'] = $this->swpl_model->select_data_info('dbo.tblMonth');  
                        $data['HEME_info'] =  $tblManualHEME_info;
                        $data['HEME_Availability_info'] =  $tblManualHEME_Availability_info;
                        $data['HEME_Diesel_info'] =  $tblManualHEME_Diesel_info;
                        $this->load->view('swpl/heme',$data);        
        }
        
        public function getModelNo(){
            $equip = $this->input->post('EQPT_Type');
            $cond = array('EquipmentType' => $equip);
            $exist = $this->swpl_model->check_data_info('dbo.tblEquipType',$cond);             
            echo '<select id="EQPT_Model_Number" name="EQPT_Model_Number" placeholder="Model Number" required="" class="form-control">';
            echo '<option value="">---Select Model No---</option>';
            foreach($exist as $eqp){
                     echo '<option value='.$eqp['Model_No'].'>'.$eqp['Model_No'].'</option>';
            }        
                echo '</select>';
            
        }

        public function save(){
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
                           $EQPT_Type = $this->input->post('EQPT_Type');
                           $EQPT_Model_Number = $this->input->post('EQPT_Model_Number');     
                           $EQUIPMENT = $this->input->post('EQUIPMENT');
                           $Diesel_entries = array();
                           $Avail_entries = array();
                           $num_Diesel = sizeof($EQPT_Type);
                           $num_Avail = sizeof($EQUIPMENT);
                           
                         $cond = array('Month' => $Month,'Year' => $year);
                         $exist = $this->swpl_model->check_data_info('dbo.tblManualHEME_Diesel',$cond);
                         if($exist){
                                echo '<p><i class="material-icons">close</i> Record Already Exist..!</p>';
                               // redirect(base_url() . 'tugs');
                         }else{
                             for ($i = 0; $i < $num_Diesel; $i++)
                            {
                                $data= array(
                                    'Month'=> $Month,
                                    'Year'=> $year,
                                    'EQPT_Type'=> $EQPT_Type[$i],
                                    'EQPT_Model_Number'=> $EQPT_Model_Number[$i],
                                    'Diesel_Consumption'=> $this->input->post('Diesel_Consumption')[$i],
                                    'Tank_stock_month_end'=> $this->input->post('Tank_stock_month_end')[$i],
                                    'Engine_Hrs_Initial'=> $this->input->post('Engine_Hrs_Initial')[$i],
                                    'Engine_Hrs_Final'=> $this->input->post('Engine_Hrs_Final')[$i],
                                    'Benchmark'=>$this->input->post('Benchmark')[$i],
                                    'Remarks'=> $this->input->post('Remarks')[$i]);

                                $this->swpl_model->save_data_info('dbo.tblManualHEME_Diesel',$data);
                            }
                            
                            for ($j = 0; $j < $num_Avail; $j++)
                            {
                            $data1= array(
                                'Month'=> $Month,
                                'Year'=> $year,
                                'EQUIPMENT'=> $EQUIPMENT[$j],
                                'MONTHLY_HRS'=> $this->input->post('MONTHLY_HRS')[$j],
                                'PLANNED_MAINTENANCE'=> $this->input->post('PLANNED_MAINTENANCE')[$j],
                                'BREAKDOWN_HRS'=> $this->input->post('BREAKDOWN_HRS')[$j],
                                'WORKING_HRS'=> $this->input->post('WORKING_HRS')[$j]);
                            
                            $this->swpl_model->save_data_info('dbo.tblManualHEME_Availability',$data1);
                            }
                            
                             $data2= array(
                                'Month'=> $Month,
                                'Year'=> $year,
                                'Diesel_Qty_Issued'=> $this->input->post('Diesel_Qty_Issued'),
                                'Opening_Balance'=> $this->input->post('Opening_Balance'),
                                'Diesel_filled'=> $this->input->post('Diesel_filled'));
                            
                            $this->swpl_model->save_data_info('dbo.tblManualHEME',$data2);
                            echo 1;
                         }
                         
                    }
                }
            else {
                $this->session->set_userdata('last_page', current_url());
                redirect(base_url());
            }     
            
            
        }
        
        public function updateDiesel($id){
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
                                    'Diesel_Consumption'=> $this->input->post('Diesel_Consumption'),
                                    'Tank_stock_month_end'=> $this->input->post('Tank_stock_month_end'),
                                    'Engine_Hrs_Initial'=> $this->input->post('Engine_Hrs_Initial'),
                                    'Engine_Hrs_Final'=> $this->input->post('Engine_Hrs_Final'),
                                    'Benchmark'=>$this->input->post('Benchmark'),
                                    'Remarks'=> $this->input->post('Remarks'));
                            
                             $where =array('Sr_No'=>$id);
                            $this->swpl_model->update_data_info('dbo.tblManualHEME_Diesel',$data,$where);
                            echo 1;
                            // }
                     }
                 }
            else {
                $this->session->set_userdata('last_page', current_url());
                redirect(base_url());
            }          
            
        }
        
        public function deleteHemeDiesel($id){
             if ($this->session->userdata('admin_login') == 1 || $this->session->userdata('electrical_login') == 1) {
                $where =array('Sr_No'=>$id);
                $this->swpl_model->delete_data_info('dbo.tblManualHEME_Diesel',$where);
                $this->session->set_flashdata('msg', ('<i class="material-icons">check_circle_outline</i> HEME Details Deleted Successfully'));
                redirect(base_url() . 'heme');
            }
            else {
                $this->session->set_userdata('last_page', current_url());
                redirect(base_url());
            }         
        }
        
        
         public function updateAvailability($id){
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
                                    'MONTHLY_HRS'=> $this->input->post('MONTHLY_HRS'),
                                    'PLANNED_MAINTENANCE'=> $this->input->post('PLANNED_MAINTENANCE'),
                                    'BREAKDOWN_HRS'=> $this->input->post('BREAKDOWN_HRS'),
                                    'WORKING_HRS'=> $this->input->post('WORKING_HRS'));
                            
                             $where =array('Sr_no'=>$id);
                            $this->swpl_model->update_data_info('dbo.tblManualHEME_Availability',$data,$where);
                            echo 1;
                            // }
                     }
                }
            else {
                $this->session->set_userdata('last_page', current_url());
                redirect(base_url());
            }  
            
            
        }
        
        public function deleteHemeAvail($id){
              if ($this->session->userdata('admin_login') == 1 || $this->session->userdata('electrical_login') == 1) {
                $where =array('Sr_no'=>$id);
                $this->swpl_model->delete_data_info('dbo.tblManualHEME_Availability',$where);
                $this->session->set_flashdata('msg', ('<i class="material-icons">check_circle_outline</i> HEME Details Deleted Successfully'));
                redirect(base_url() . 'heme');
            }
            else {
                $this->session->set_userdata('last_page', current_url());
                redirect(base_url());
            }  
        }
        
        
        public function updateHeme($id){
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
                                    'Diesel_Qty_Issued'=> $this->input->post('Diesel_Qty_Issued'),
                                    'Opening_Balance'=> $this->input->post('Opening_Balance'),
                                    'Diesel_filled'=> $this->input->post('Diesel_filled'));
                            
                             $where =array('Sr_No'=>$id);
                            $this->swpl_model->update_data_info('dbo.tblManualHEME',$data,$where);
                            echo 1;
                            // }
                     }
                }
            else {
                $this->session->set_userdata('last_page', current_url());
                redirect(base_url());
            }  
            
            
        }
        
        public function deleteHeme($id){
              if ($this->session->userdata('admin_login') == 1 || $this->session->userdata('electrical_login') == 1) {
                $where =array('Sr_No'=>$id);
                $this->swpl_model->delete_data_info('dbo.tblManualHEME',$where);
                $this->session->set_flashdata('msg', ('<i class="material-icons">check_circle_outline</i> HEME Details Deleted Successfully'));
                redirect(base_url() . 'heme');
             }
            else {
                $this->session->set_userdata('last_page', current_url());
                redirect(base_url());
            }  
        }
       
       
        
}
