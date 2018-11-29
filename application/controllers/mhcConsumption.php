<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class mhcConsumption extends CI_Controller {

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
                $data['title'] = "MHC Consumption";
                $data['icons'] = "hourglass_full";
                $data['Month'] = '';
                $data['Year'] = '';
                $data['Mid'] = '';
                $data['Type'] = '';
                $data['month_info'] = $this->swpl_model->select_data_info('dbo.tblMonth');  
                $data['mhcAvail_info'] = '';
                $data['mhcMHC_info'] =  '';
                $this->load->view('swpl/mhcConsumption',$data);
            }
            else {
                $this->session->set_userdata('last_page', current_url());
                redirect(base_url());
            }     
	}     
        
         public function searchConsumption(){   
              if ($this->session->userdata('admin_login') == 1 || $this->session->userdata('electrical_login') == 1) {
            $this->form_validation->set_rules('Month', 'Month', 'required');
            $this->form_validation->set_rules('year', 'Year', 'required');
            $this->form_validation->set_rules('Type', 'Type', 'required');
            if ($this->form_validation->run() == FALSE)
                     {
                              $this->session->set_flashdata('err_msg','All Fields Required..!');
                                redirect(base_url() . 'mhcConsumption');
                    }
                    else
                     { 
                        $month= trim($this->input->post('Month'));
                        $yr = trim($this->input->post('year'));
                        $Type = trim($this->input->post('Type'));
                        switch ($month) {
                            case "1": $mn = 'January'; break;
                            case "2": $mn = 'February'; break;
                            case "3": $mn = 'March'; break;
                            case "4": $mn = 'April'; break;
                            case "5": $mn = 'May'; break;
                            case "6": $mn = 'June'; break;
                            case "7": $mn = 'July'; break;
                            case "8": $mn = 'August'; break;
                            case "9": $mn = 'September'; break;
                            case "10": $mn = 'October'; break;
                            case "11": $mn = 'November'; break;
                            case "12": $mn = 'December'; break;                            
                            default:
                                echo "";
                        }
                        $cond = array('Month' =>$mn,'Year' =>$yr );
                        if($Type=='1'){
                         $data_info = $this->swpl_model->check_data_info('dbo.tblManualMHCAvailability',$cond);
                          $this->mhcConsumption($data_info,$dataMHC_info='',$mn,$yr,$month,$Type); 
                        } else {
                             $dataMHC_info = $this->swpl_model->check_data_info('dbo.tblManualMHCConsumption',$cond);
                              $this->mhcConsumption($data_info='',$dataMHC_info,$mn,$yr,$month,$Type); 
                        }                        
                       
                }
             }
            else {
                $this->session->set_userdata('last_page', current_url());
                redirect(base_url());
            }      
            
        }
        
        
        public function mhcConsumption($data_info,$dataMHC_info,$mn,$yr,$month,$Type){
                        $data['title'] = "MHC Consumption";
                        $data['icons'] = "hourglass_full";
                        $data['Month'] = $mn;
                        $data['Year'] = $yr;
                        $data['Mid'] = $month;
                        $data['Type'] = $Type;
                        $data['month_info'] = $this->swpl_model->select_data_info('dbo.tblMonth');  
                        $data['mhcAvail_info'] =  $data_info;
                        $data['mhcMHC_info'] =  $dataMHC_info;
                        $this->load->view('swpl/mhcConsumption',$data);        
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
                           $Van_ID = $this->input->post('Van_ID');
                           $num_equip = sizeof($Van_ID);
                           
                            $cond = array('Month' => $Month,'Year' => $year);
                         $exist = $this->swpl_model->check_data_info('dbo.tblManualMHCAvailability',$cond);
                         if($exist){
                                echo '<i class="material-icons">close</i> Record Already Exist..!';
                         }else{
                            for ($i = 0; $i < $num_equip; $i++)
                            {
                                $data= array(
                                    'Month'=> $Month,
                                    'Year'=> $year,
                                    'Van_ID'=> $Van_ID[$i],
                                    'VCN_NO'=> $this->input->post('VCN_NO')[$i],
                                    'Vessel_Name'=> $this->input->post('Vessel_Name')[$i],
                                    'E_DriveHrs'=> $this->input->post('E_DriveHrs')[$i],
                                    'Diesel_Consumption'=> $this->input->post('Diesel_Consumption')[$i],
                                    'Crane_Name'=> $this->input->post('Crane_Name')[$i]);
                                $this->swpl_model->save_data_info('dbo.tblManualMHCAvailability',$data);
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
                                    'E_DriveHrs'=> $this->input->post('E_DriveHrs'),
                                    'Diesel_Consumption'=> $this->input->post('Diesel_Consumption'),
                                    'Crane_Name'=> $this->input->post('Crane_Name'));
                             $where =array('Sr_no'=>$id);
                            $this->swpl_model->update_data_info('dbo.tblManualMHCAvailability',$data,$where);
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
                $where =array('Sr_no'=>$id);
                $this->swpl_model->delete_data_info('dbo.tblManualMHCAvailability',$where);
                $this->session->set_flashdata('msg', ('<i class="material-icons">check_circle_outline</i> MHC Consumption Details Deleted Successfully'));
                redirect(base_url() . 'mhcConsumption');
                 }
            else {
                $this->session->set_userdata('last_page', current_url());
                redirect(base_url());
            }    
        }
       
        
         public function saveConsumption(){
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
                               $Crane_Name = $this->input->post('Crane_Name');
                               $num_equip = sizeof($Crane_Name);

                                $cond = array('Month' => $Month,'Year' => $year);
                             $exist = $this->swpl_model->check_data_info('dbo.tblManualMHCConsumption',$cond);
                             if($exist){
                                    echo '<i class="material-icons">close</i> Record Already Exist..!';
                             }else{
                                for ($i = 0; $i < $num_equip; $i++)
                                {
                                    $data= array(
                                        'Month'=> $Month,
                                        'Year'=> $year,
                                        'Crane_Name'=> $Crane_Name[$i],
                                        'Description'=> $this->input->post('Description')[$i],
                                        'Value'=> $this->input->post('Value')[$i]);
                                    $this->swpl_model->save_data_info('dbo.tblManualMHCConsumption',$data);
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
        
         public function updateMHC($id){
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
                                    'Crane_Name'=> $this->input->post('Crane_Name'),
                                    'Description'=> $this->input->post('Description'),
                                    'Value'=> $this->input->post('Value'));
                             $where =array('Sr_no'=>$id);
                            $this->swpl_model->update_data_info('dbo.tblManualMHCConsumption',$data,$where);
                            echo 1;
                     }
            }
            else {
                $this->session->set_userdata('last_page', current_url());
                redirect(base_url());
            }    
            
        }
        public function deleteMhc($id){
             if ($this->session->userdata('admin_login') == 1 || $this->session->userdata('electrical_login') == 1) {
                $where =array('Sr_No'=>$id);
                $this->swpl_model->delete_data_info('dbo.tblManualMHCConsumption',$where);
                $this->session->set_flashdata('msg', ('<i class="material-icons">check_circle_outline</i> MHC Consumption Details Deleted Successfully'));
                redirect(base_url() . 'mhcConsumption');
            }
            else {
                $this->session->set_userdata('last_page', current_url());
                redirect(base_url());
            }       
        }
        
        public function getData($param2,$param4){
            
              $sr=1; 
                                    $qry = "DECLARE @MONTH INT = '$param2', @YEAR INT = '$param4'

SELECT DISTINCT V.VAN_ID, V.VAN_NUM, V.VESSEL_NAME
FROM tblVesselwiseOperation V
WHERE DATENAME (MONTH, CASE WHEN DATEPART(DAY, DISCHARGE_COMPLETED_TIME) = 1 AND CAST(DISCHARGE_COMPLETED_TIME AS TIME) < CAST ('07:00' AS TIME)
					THEN EOMONTH(DATEADD (DAY,-1, DISCHARGE_COMPLETED_TIME))
				ELSE DISCHARGE_COMPLETED_TIME END) = DATENAME(MONTH, str(@MONTH) + '/1/'+ STR(@YEAR)) 
AND DATEPART (YEAR, DISCHARGE_COMPLETED_TIME) = @YEAR
AND APPLICATION_TYPE = 'EXPORT'";                       
                        $data_info =  $this->db->query($qry)->result_array();
                        
                          $data='<table class="table table-striped table-bordered">
                                    <thead class="">
                                        <tr style="background-color:#eee">
                                            <th style="width:10% !important">
                                                SR.
                                            </th>
                                            <th style="width:30% !important">
                                                NAME OF VESSEL
                                            </th>
                                            <th style="width:20% !important">
                                                E-Drive hrs clocked
                                            </th>
                                            <th style="width:20%">
                                               Diesel Consumption(ltrs)
                                            </th>
                                            <th style="width:20%">
                                               Crane Name
                                            </th>                                           
                                        </tr>';
                                    $sr=1;  foreach($data_info as $eqp){
                                        $data.='<tr style="">
                                            <th style="width:10% !important">'.$sr.'
                                            </th>
                                        <th>
                                            <input type="hidden" id="Van_ID" name="Van_ID" value="'.$eqp['VAN_ID'].'" autocomplete="off" class="frmdata Van_ID">
                                       
                                             <input type="hidden" id="VCN_NO" name="VCN_NO" value="'.$eqp['VAN_NUM'].'"  class="frmdata VCN_NO">                                        
                                            '.$eqp['VESSEL_NAME'].'
                                             <input type="hidden" id="Vessel_Name" name="Vessel_Name" value="'.$eqp['VESSEL_NAME'].'"  autocomplete="off"  class="frmdata Vessel_Name">
                                        </th>
                                        <td>
                                             <input type="text" id="E_DriveHrs" name="E_DriveHrs" onkeypress="return isNumber(event, this.value);"  autocomplete="off"  class="frmdata E_DriveHrs">
                                        </td>
                                        <td>
                                             <input type="text" id="Diesel_Consumption" name="Diesel_Consumption" onkeypress="return isNumber(event, this.value);"  autocomplete="off" class="frmdata Diesel_Consumption">
                                        </td>
                                        <td>
                                             <input type="text" id="Crane_Name" name="Crane_Name"  autocomplete="off" class="frmdata Crane_Name">
                                        </td>
                                    </tr>';
                                    $sr++; } 
                                $data.='</thead>
                                </table>';
                       
                                
                                 echo $data;
        }
       
       
        
}
