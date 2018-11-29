<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class gantryCranes extends CI_Controller {
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
            $data['title'] = "Gantry Cranes";
            $data['icons'] = "directions_boat";
            $data['Month'] = '';
            $data['Year'] = '';
            $data['type'] = '';
            $data['month_info'] = $this->swpl_model->select_data_info('dbo.tblMonth');  
            $data['GantryCranes_info'] = '';
            $data['GantryCraneshrs_info'] = '';
            $this->load->view('swpl/grantryCranes',$data);
            }
            else {
                $this->session->set_userdata('last_page', current_url());
                redirect(base_url());
            }  
	}     
        
         public function searchCranes(){ 
              if ($this->session->userdata('admin_login') == 1 || $this->session->userdata('electrical_login') == 1) {
            $this->form_validation->set_rules('Month', 'Month', 'required');
            $this->form_validation->set_rules('year', 'Year', 'required');
            $this->form_validation->set_rules('type', 'Type', 'required');
            if ($this->form_validation->run() == FALSE)
                     {
                              $this->session->set_flashdata('err_msg','All Fields Required..!');
                                redirect(base_url() . 'gantryCranes');
                    }
                    else
                     { 
                        $mn= trim($this->input->post('Month'));
                        $yr = trim($this->input->post('year'));
                        $type = trim($this->input->post('type'));
                        $cond = array('MONTH' =>$mn,'YEAR' =>$yr); 
                         if($type=='1'){
                            $tblManualGantryCranes_info = $this->swpl_model->check_data_info('dbo.tblManualGantryCranes',$cond);                            
                        $this->grantryCranes($tblManualGantryCranes_info,$tblManualGantryCranesHours_info='',$mn,$yr,$type);
                         }
                         else{
                              $tblManualGantryCranesHours_info = $this->swpl_model->check_data_info('dbo.tblManualGantryCranesHours',$cond);                            
                        $this->grantryCranes($tblManualGantryCranes_info='',$tblManualGantryCranesHours_info,$mn,$yr,$type);
                         }
                     }
                  }
            else {
                $this->session->set_userdata('last_page', current_url());
                redirect(base_url());
            }       
                     
            
        }
        
        
        public function grantryCranes($tblManualGantryCranes_info,$tblManualGantryCranesHours_info,$mn,$yr,$type){
                        $data['title'] = "Gantry Cranes";
                        $data['icons'] = "directions_boat";                       
                        $data['Month'] = $mn;
                        $data['Year'] = $yr;
                        $data['type'] = $type;
                        $data['month_info'] = $this->swpl_model->select_data_info('dbo.tblMonth');  
                        $data['GantryCranes_info'] =  $tblManualGantryCranes_info;
                        $data['GantryCraneshrs_info'] = $tblManualGantryCranesHours_info;
                        $this->load->view('swpl/grantryCranes',$data);        
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
                           $EQUIPMENT = $this->input->post('EQUIPMENT');
                           $num_equip = sizeof($EQUIPMENT);
                            $EQUIPMENTH= $this->input->post('EQUIPMENTH');
                           $num_equip2 = sizeof($EQUIPMENTH);
                           
                         $cond = array('MONTH' => $Month,'YEAR' => $year);
                         $exist = $this->swpl_model->check_data_info('dbo.tblManualGantryCranes',$cond);
                           //$exist = $this->swpl_model->check_data_info('dbo.tblManualGantryCranesHours',$cond);
                         if($exist){
                                echo '<p><i class="material-icons">close</i> Record Already Exist..!</p>';
                               // redirect(base_url() . 'tugs');
                         }else{
                             
                             for ($i = 0; $i < $num_equip; $i++)
                            {
                                $data= array(
                                    'MONTH'=> $Month,
                                    'YEAR'=> $year,
                                    'EQUIPMENT'=> $EQUIPMENT[$i],
//                                    'MONTHLY_HRS'=> $this->input->post('MONTHLY_HRS')[$i],
                                    'MAINT_HRS_MECH'=> $this->input->post('MAINT_HRS_MECH')[$i],
                                    'MAINT_HRS_ELEC'=> $this->input->post('MAINT_HRS_ELEC')[$i],
                                    'BREAK_HRS_MECH'=> $this->input->post('BREAK_HRS_MECH')[$i],
                                    'BREAK_HRS_ELEC'=>$this->input->post('BREAK_HRS_ELEC')[$i]);
                                    //'WORKING_HRS'=> $this->input->post('WORKING_HRS')[$i]);

                                $this->swpl_model->save_data_info('dbo.tblManualGantryCranes',$data);
                            }
                             for ($j = 0; $j < $num_equip2; $j++)
                            {
                            $data1= array(
                                    'MONTH'=> $Month,
                                    'YEAR'=> $year,
                                    'EQUIPMENT'=> $EQUIPMENTH[$j],
                                    'HOISTING_OPEN'=> $this->input->post('HOISTING_OPEN')[$j],
                                    'HOISTING_CLOSING'=> $this->input->post('HOISTING_CLOSING')[$j],
                                    'CTLT_OPEN'=> $this->input->post('CTLT_OPEN')[$j],
                                    'CTLT_CLOSING'=>$this->input->post('CTLT_CLOSING')[$j]);

                                $this->swpl_model->save_data_info('dbo.tblManualGantryCranesHours',$data1);
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
                                    'MONTH'=> $Month,
                                    'YEAR'=> $year,
                                    'EQUIPMENT'=> $this->input->post('EQUIPMENT'),
//                                    'MONTHLY_HRS'=> $this->input->post('MONTHLY_HRS'),
                                    'MAINT_HRS_MECH'=> $this->input->post('MAINT_HRS_MECH'),
                                    'MAINT_HRS_ELEC'=> $this->input->post('MAINT_HRS_ELEC'),
                                    'BREAK_HRS_MECH'=> $this->input->post('BREAK_HRS_MECH'),
                                    'BREAK_HRS_ELEC'=>$this->input->post('BREAK_HRS_ELEC'));
                                    //'WORKING_HRS'=> $this->input->post('WORKING_HRS'));
                            
                             $where =array('Sr_No'=>$id);
                            $this->swpl_model->update_data_info('dbo.tblManualGantryCranes',$data,$where);
                            echo 1;
                            // }
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
                $this->swpl_model->delete_data_info('dbo.tblManualGantryCranes',$where);
                $this->session->set_flashdata('msg', ('<i class="material-icons">check_circle_outline</i> Gantry Cranes Deleted Successfully'));
                redirect(base_url() . 'gantryCranes');
            }
            else {
                $this->session->set_userdata('last_page', current_url());
                redirect(base_url());
            }       
        }
        
        public function saveHrs(){
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
                           $EQUIPMENT = $this->input->post('EQUIPMENT');
                           $num_equip = sizeof($EQUIPMENT);
                           
                         $cond = array('MONTH' => $Month,'YEAR' => $year);
                         $exist = $this->swpl_model->check_data_info('dbo.tblManualGantryCranesHours',$cond);
                         if($exist){
                                echo '<p><i class="material-icons">close</i> Record Already Exist..!</p>';
                               // redirect(base_url() . 'tugs');
                         }else{
                             
                             for ($i = 0; $i < $num_equip; $i++)
                            {
                                $data= array(
                                    'MONTH'=> $Month,
                                    'YEAR'=> $year,
                                    'EQUIPMENT'=> $EQUIPMENT[$i],
                                    'HOISTING_OPEN'=> $this->input->post('HOISTING_OPEN')[$i],
                                    'HOISTING_CLOSING'=> $this->input->post('HOISTING_CLOSING')[$i],
                                    'CTLT_OPEN'=> $this->input->post('CTLT_OPEN')[$i],
                                    'CTLT_CLOSING'=>$this->input->post('CTLT_CLOSING')[$i]);

                                $this->swpl_model->save_data_info('dbo.tblManualGantryCranesHours',$data);
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
        public function updateHrs($id){
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
                                    'MONTH'=> $Month,
                                    'YEAR'=> $year,
                                    'EQUIPMENT'=> $this->input->post('EQUIPMENT'),
                                    'HOISTING_OPEN'=> $this->input->post('HOISTING_OPEN'),
                                    'HOISTING_CLOSING'=> $this->input->post('HOISTING_CLOSING'),
                                    'CTLT_OPEN'=> $this->input->post('CTLT_OPEN'),
                                    'CTLT_CLOSING'=>$this->input->post('CTLT_CLOSING'));
                            
                             $where =array('Sr_No'=>$id);
                            $this->swpl_model->update_data_info('dbo.tblManualGantryCranesHours',$data,$where);
                            echo 1;
                            // }
                     }
                }
            else {
                $this->session->set_userdata('last_page', current_url());
                redirect(base_url());
            }           
            
            
        }
        
        public function weight_check($val)
        {
            if ( ! (int)($val==$val) || ! (float)($val==$val))
		{
			  $this->form_validation->set_message('weight_check', '{field} field must be number or decimal.');
                          return FALSE;
		}                
                else{
                       return TRUE;
                }
                
        }
       
        
}
