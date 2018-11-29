<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

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
                if ($this->session->userdata('admin_login') == 1 || $this->session->userdata('mechanical_login') == 1 || $this->session->userdata('electrical_login') == 1) {
                 //$this->session->set_userdata('last_page', current_url());                  
                 $data['title'] = "Dashboard";
                 $data['icons'] = "perm_data_setting";
                 $this->load->view('swpl/index',$data);			
            }
            else{
                  $data['title'] = "Login";
                   $this->load->view('swpl/login',$data);
		}
                
            
	} 
                
          public function popup($account_type = '', $page_name = '', $param2 = '', $param3 = '', $param4 = '',$param5 = '',$param6 = '')
	{
		$page_data['param2']		=	$param2;
                $page_data['param3']		=	$param3;
                $page_data['param4']		=	$param4;
                $page_data['param5']		=	$param5;
                $page_data['param6']		=	$param6;
                $page_data['month_info'] = $this->swpl_model->select_data_info('dbo.tblMonth');
		//echo "hello";
		$this->load->view($account_type.'/'.$page_name,$page_data);		
	}
        
           public function popup1($account_type = '', $page_name = '', $param2 = '', $param3 = '', $param4 = '',$param5 = '',$param6 = '')
	{
		$page_data['param2']		=	$param2;
                $page_data['param3']		=	$param3;
                $page_data['param4']		=	$param4;
                $qry = "DECLARE @MONTH INT = '$param2', @YEAR INT = '$param4'

SELECT DISTINCT V.VAN_ID, V.VAN_NUM, V.VESSEL_NAME
FROM tblVesselwiseOperation V
WHERE DATENAME (MONTH, CASE WHEN DATEPART(DAY, DISCHARGE_COMPLETED_TIME) = 1 AND CAST(DISCHARGE_COMPLETED_TIME AS TIME) < CAST ('07:00' AS TIME)
					THEN EOMONTH(DATEADD (DAY,-1, DISCHARGE_COMPLETED_TIME))
				ELSE DISCHARGE_COMPLETED_TIME END) = DATENAME(MONTH, str(@MONTH) + '/1/'+ STR(@YEAR)) 
AND DATEPART (YEAR, DISCHARGE_COMPLETED_TIME) = @YEAR
AND APPLICATION_TYPE = 'EXPORT'";                       
                        $data_info =  $this->db->query($qry)->result_array();
                        
                $page_data['data_info']		=	$data_info;
                $page_data['month_info'] = $this->swpl_model->select_data_info('dbo.tblMonth');
		//echo "hello";
		$this->load->view($account_type.'/'.$page_name,$page_data);		
	}
        
        function error(){
             $data['title'] = "Page Not Found";
            $data['icons'] = "error";
             $this->load->view('swpl/error',$data);
        }
         //Validating login from ajax request
        function validateLogin() {
             $this->form_validation->set_rules('username', 'user name', 'required');
            $this->form_validation->set_rules('password', 'Password', 'required');
            if ($this->form_validation->run() == FALSE)
                     {
                            echo validation_errors();
                    }
                    else
                     {
                            $user_name= $this->input->post('username');
                            $password = $this->input->post('password');

                            //$credential = array('user_name' => $user_name, 'password' => $password);
                            echo $this->swpl_model->validate_login_info($user_name,$password);
                    }
                
                            
        }
        
          public function logout()
	{
		$this->session->sess_destroy();	
		redirect(base_url());
	}        
        
}
