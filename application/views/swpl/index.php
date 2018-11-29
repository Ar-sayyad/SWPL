<?php include 'includes/header.php';?>

<body>
    <div class="wrapper">
         <?php include 'includes/sidebar.php';?> 
		
        <div class="main-panel">
            
         <?php include 'includes/nav.php';?>
            
            <div class="content">
                <div class="container-fluid">
                    <div class="row">
                        <?php //include 'includes/titlebar.php';?> 
                    
			<div class="row main-section">			
                                <div class="col-lg-12 col-md-12">
                                    <div class="card">
                                        <div class="card-header" data-background-color="purple">
                                            <h4 class="title"> Welcome To JSW </h4>
                                            <p class="category"></p>
                                        </div>                                    
                                        
                                        <div class="card-content">
                                            <div class="row">
                                                   <?php if ($this->session->userdata('admin_login') == 1 || $this->session->userdata('mechanical_login') == 1) { ?>
                                                <div class="col-lg-4 col-md-12">
                                                    <a href="<?php echo base_url();?>electrical">
                                                        <div class="fcard">
                                                            <h4 class="title"><i class="material-icons" style="font-size: 60px;">settings_input_composite</i> Electrical </h4>
                                                        </div>                                                   
                                                    </a>
                                                </div>
                                                 <div class="col-lg-4 col-md-12">
                                                      <a href="<?php echo base_url();?>budget">
                                                        <div class="fcard">
                                                             <h4 class="title"><i class="material-icons" style="font-size: 60px;">attach_money </i> Budget </h4>
                                                        </div>
                                                      </a>
                                                </div>
                                                   <?php }  if ($this->session->userdata('admin_login') == 1 || $this->session->userdata('electrical_login') == 1) { ?>
                                                 <div class="col-lg-4 col-md-12">
                                                      <a href="<?php echo base_url();?>heme">
                                                        <div class="fcard">
                                                             <h4 class="title"><i class="material-icons" style="font-size: 60px;">local_gas_station</i>HEME Diesel Consumption </h4>
                                                        </div>
                                                      </a>
                                                </div>
                                           
                                                <div class="col-lg-4 col-md-12">
                                                     <a href="<?php echo base_url();?>gantryCranes">
                                                        <div class="fcard">
                                                             <h4 class="title"><i class="material-icons" style="font-size: 60px;">directions_boat</i> Gantry Cranes </h4>
                                                        </div>
                                                     </a>
                                                </div>
                                                 <div class="col-lg-4 col-md-12">
                                                      <a href="<?php echo base_url();?>mhcConsumption">
                                                        <div class="fcard">
                                                             <h4 class="title"><i class="material-icons" style="font-size: 60px;">hourglass_full </i> MHC Consumption </h4>
                                                        </div>
                                                      </a>
                                                </div>
                                                 <div class="col-lg-4 col-md-12">
                                                      <a href="<?php echo base_url();?>terminalMaint">
                                                        <div class="fcard">
                                                            <h4 class="title"><i class="material-icons" style="font-size: 60px;">tram</i> Terminal Maint </h4>
                                                        </div>
                                                      </a>
                                                </div>
                                                   <?php } ?>
                                            </div>
                                            
                                        </div>
                                    </div>
                                </div>
			</div>
					
                    </div>
                </div>
                
               <?php include 'includes/footer.php';?> 
            </div>
    </div>
    </div>
</body>	
            
 <?php include 'includes/footer-min.php';?> 