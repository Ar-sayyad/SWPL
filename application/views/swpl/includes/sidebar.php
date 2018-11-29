 <div class="sidebar" data-color="purple" data-image="">
   
            <div class="logo">
                <a href="<?php echo base_url();?>" class="simple-text">
                   <image src="<?php echo base_url();?>site/content/img/logo.png" >
                </a>
            </div>
            <div class="sidebar-wrapper">
                <ul class="nav">                
                    <?php if ($this->session->userdata('admin_login') == 1 || $this->session->userdata('mechanical_login') == 1) {
                        if($title=='Electrical'){?>
                    <li class="active">
                    <?php } else { ?><li> <?php }?>
                        <a href="<?php echo base_url();?>electrical">
                            <i class="material-icons">settings_input_composite</i>
                            <p>Electrical</p>
                        </a>
                    </li>
                    <?php if($title=='Budget'){?>
                    <li class="active">
                    <?php } else { ?><li> <?php }?>
                        <a href="<?php echo base_url();?>budget">
                            <i class="material-icons">attach_money</i>
                            <p>Budget</p>
                        </a>
                    </li>
                    <?php } ?>
                   <?php  if ($this->session->userdata('admin_login') == 1 || $this->session->userdata('electrical_login') == 1) {
                    if($title=='HEME Diesel Consumption'){?>
                    <li class="active">
                    <?php } else { ?><li> <?php }?>
                        <a href="<?php echo base_url();?>heme">
                            <i class="material-icons">local_gas_station</i>
                            <p>HEME Diesel Consumption </p>
                        </a>
                    </li>
                   <?php if($title=='Gantry Cranes'){?>
                    <li class="active">
                    <?php } else { ?><li> <?php }?>
                        <a href="<?php echo base_url();?>gantryCranes">
                            <i class="material-icons">directions_boat</i>
                            <p>Gantry Cranes </p>
                        </a>
                    </li>
                   
                    <?php if($title=='MHC Consumption'){?>
                    <li class="active">
                    <?php } else { ?><li> <?php }?>
                        <a href="<?php echo base_url();?>mhcConsumption">
                            <i class="material-icons text-gray">hourglass_full</i>
                            <p>MHC Consumption </p>
                        </a>
                    </li>
                    <?php if($title=='Terminal Maint'){?>
                    <li class="active">
                    <?php } else { ?><li> <?php }?>
                        <a href="<?php echo base_url();?>terminalMaint">
                            <i class="material-icons">tram</i>
                            <p> Terminal Maint </p>
                        </a>
                    </li>
                   <?php }?>
                    <li>                 
                        <a href="<?php echo base_url();?>Home/logout">
                            <i class="material-icons">power_settings_new</i>
                            <p> Logout </p>
                        </a>
                    </li>
                    
                   
                  
                </ul>
            </div>
        
		
</div>
<?php include 'modal.php';?>