<nav class="navbar navbar-transparent navbar-absolute" style="padding-top: 25px;">
    <div class="container-fluid">                   
        <div class="collapse navbar-collapse">
            <ul class="" >                            
                <li class="nav navbar-nav navbar-left" style="margin-left: 40px;">
                    <a style="font-weight: 500;font-size: 16px;">
                        <i class="material-icons">person</i> Welcome, <?php echo $this->session->userdata('log_name');?>
                    </a>
                </li>
                 <li class="nav navbar-nav navbar-right" style="margin-right: 60px;">
                     <a  style="font-weight: 500;font-size: 16px;" href="<?php echo base_url();?>Home/logout">
                        <i class="material-icons">power_settings_new</i> Logout
                    </a>
                </li>
            </ul>                       
        </div>
    </div>
</nav>