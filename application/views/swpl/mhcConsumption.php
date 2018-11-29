<?php include 'includes/header.php';?>

<body>
    <div class="wrapper">
         <?php include 'includes/sidebar.php';?> 
		
        <div class="main-panel">
            
         <?php include 'includes/nav.php';?>
            
            <div class="content">
                <div class="container-fluid">
                    <div class="row">
                        <?php include 'includes/titlebar.php';?> 
                    <div class="error_msgg" style="display: none;width: 50%"></div>
                          <div class="row">
                        <div class="col-lg-12">
                           
                             <div class="card alert">
                                 <div class="col-lg-9" style="">
                                 <form action="<?php echo base_url();?>mhcConsumption/searchConsumption" method="POST" enctype="multipart/form-data"  class="searchform">
                    <table class="table form"> 
                        <thead>
                            <tr>
                                <th>
                                    <select id="Month" name="Month" placeholder="Month" required=""  class="clsmon form-control">
                                        <option value="">---Select Month---</option>
                                         <?php $sr=1; foreach($month_info as $mon){?>                                       
                                        <option data-id="<?php echo trim($mon['FY_Order']);?>" value="<?php echo $sr;?>" <?php if(trim($Month)==trim($mon['MonthName'])){ echo 'selected'; }else{  } ?>><?php echo trim($mon['MonthName']);?></option>                                      
                                         <?php $sr++; }?>  
                                    </select>
                                </th>

                                <th>
                                    <select id="year" name="year" placeholder="year" required=""  class="form-control">
                                        <option value="">---Select Year---</option>                                        
                                        <option value="<?php echo $prev = (date('Y')-1);?>" <?php if(trim($Year)== $prev){ echo 'selected'; }else{ } ?>><?php echo date('Y')-1;?></option>
                                        <option value="<?php echo $curr = date('Y');?>" <?php if(trim($Year)== $curr){ echo 'selected'; }else{ } ?>><?php echo date('Y');?></option>
                                        <option value="<?php echo $post = date('Y')+1;?>" <?php if(trim($Year)== $post){ echo 'selected'; }else{ } ?>><?php echo date('Y')+1;?></option>
                                    </select>
                                </th>
                                
                                 <th>
                                    <select id="Type" name="Type" placeholder="Type" required=""  class="form-control">
                                        <option value="">---Select Type---</option>                                        
                                        <option value="1" <?php if(trim($Type)== '1'){ echo 'selected'; }else{ } ?>>Availability</option>
                                        <option value="2" <?php if(trim($Type)== '2'){ echo 'selected'; }else{ } ?>>Consumption</option>
                                    </select>
                                </th>
                                
                                <th>
                                    <button type="submit" name="search" data-id="hello" id="searchElectrical" class="btn btn-success" value="save"><i class="material-icons">search</i> Search</button>
                                </th>
                            </tr>
                        </thead>
                    </table>
                                 </form>
                                 </div>
                                 <div class="col-lg-3">
                                     <div class="addbtn">
                                         <?php //if(empty($mhcAvail_info) && $Type=='1'){?>
                                         <button data-toggle="modal" onclick=" showAjaxModal('<?php echo base_url();?>home/popup/swpl/addMHCConsumption');" class="btn btn-primary" style="float: right" > <i class="material-icons">add_circle_outline</i> Consumption</button>
                                      <button data-toggle="modal" onclick=" showAjaxModal('<?php echo base_url();?>home/popup/swpl/addConsumption');" class="btn btn-primary" style="float: right" > <i class="material-icons">add_circle_outline</i> Availability</button>
                                      <?php// }elseif (empty ($mhcMHC_info) && $Type=='2') { ?>
                                          
                                      <?php// }?> 
                                    </div>
                                 </div>
                                  
                                <div class="bootstrap-data-table-panel">
                                    <div class="table-responsive">
                                        <table id="bootstrap-data-table-export" class="table table-striped table-bordered">   
                                             <?php  if(!empty($mhcAvail_info)){ ?>
                                            <thead>
                                                <tr>
                                                    <th>SR.</th> 
                                                    <th>Month</th>
                                                    <th>Year</th>
                                                    <th>Vessel Name</th>
                                                    <th>E-Drive hrs clocked</th>
                                                    <th>Diesel Consumption(ltrs)</th>
                                                    <th>Crane Name</th>
                                                    <th style="text-align: left">Actions</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                                                     
                                                 <?php  $sr=1; foreach($mhcAvail_info as $avail){?>
                                                <tr>
                                                    <td><?php echo $sr;?></td>
                                                    <td><?php echo $avail['Month'];?></td>
                                                    <td><?php echo $avail['Year'];?></td>
                                                    <td><?php echo $avail['Vessel_Name'];?></td>
                                                    <td><?php echo $avail['E_DriveHrs'];?></td>
                                                    <td><?php echo $avail['Diesel_Consumption'];?></td>
                                                    <td><?php echo $avail['Crane_Name'];?></td>
                                                    <td style="text-align: left"> 
                                                        <a style="cursor:pointer" rel="tooltip" title="Edit" class="btn btn-primary btn-link btn-sm" onclick="showAjaxModal('<?php echo base_url();?>home/popup/swpl/editConsumption/<?php echo $avail['Sr_no'];?>');">
                                                        <i class="material-icons">edit</i>
                                                        </a>
                                                        
                                                    <!--<a rel="tooltip" title="Remove" class="btn btn-danger btn-link btn-sm" onclick="return checkDelete();" href="<?php echo base_url(); ?>mhcConsumption/delete/<?php echo $avail['Sr_no'];?>">
                                                          <i class="material-icons">close</i>-->
                                                      
                                                        </a>
                                                    </td>
                                                    
                                                </tr>
                                                <?php $sr++; } ?>
                                                
                                            </tbody>  
                                            <?php }?>    
                                            
                                            
                                             <?php  if(!empty($mhcMHC_info)){ ?>
                                            <thead>
                                                <tr>
                                                    <th>SR.</th> 
                                                    <th>Month</th>
                                                    <th>Year</th>
                                                    <th>Crane Name</th>
                                                    <th>Description</th>
                                                    <th>Value</th>
                                                    <th style="text-align: left">Actions</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                                                     
                                                 <?php  $sr=1; foreach($mhcMHC_info as $avail){?>
                                                <tr>
                                                    <td><?php echo $sr;?></td>
                                                    <td><?php echo $avail['Month'];?></td>
                                                    <td><?php echo $avail['Year'];?></td>
                                                    <td><?php echo $avail['Crane_Name'];?></td>
                                                    <td><?php echo $avail['Description'];?></td>
                                                    <td><?php echo $avail['Value'];?></td>
                                                    <td style="text-align: left"> 
                                                        <a style="cursor:pointer" rel="tooltip" title="Edit" class="btn btn-primary btn-link btn-sm" onclick="showAjaxModal('<?php echo base_url();?>home/popup/swpl/editMHCConsumption/<?php echo $avail['Sr_No'];?>');">
                                                        <i class="material-icons">edit</i>
                                                        </a>
                                                        
                                                    <!--<a rel="tooltip" title="Remove" class="btn btn-danger btn-link btn-sm" onclick="return checkDelete();" href="<?php echo base_url(); ?>mhcConsumption/deleteMhc/<?php echo $avail['Sr_No'];?>">
                                                          <i class="material-icons">close</i>-->
                                                      
                                                        </a>
                                                    </td>
                                                    
                                                </tr>
                                                <?php $sr++; } ?>
                                                
                                            </tbody>  
                                            <?php }?>    
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <!-- /# card -->
                        </div>
                        <!-- /# column -->
                    </div>
                        
                        
<!--			<-->
					
                    </div>
                </div>
                
               <?php include 'includes/footer.php';?> 
            </div>
    </div>
    </div>
</body>	

 <?php include 'includes/footer-min.php';?> 
    <script>        
   $(document).ready(function(){
       <?php if(empty($mhcAvail_info) && $Type=='1'){?>
            //showAjaxModal('<?php echo base_url();?>home/popup1/swpl/addConsumption/<?php echo $Mid;?>/<?php echo $Month;?>/<?php echo $Year;?>');
         <?php }elseif (empty ($mhcMHC_info) && $Type=='2') { ?>
               // showAjaxModal('<?php echo base_url();?>home/popup1/swpl/addMHCConsumption/<?php echo $Mid;?>/<?php echo $Month;?>/<?php echo $Year;?>');
        <?php }?> 
    $( "form" ).on( "submit", function() {    
      $("#searchElectrical").html('<img src="<?php echo base_url();?>site/content/img/loading.gif" style="width:25px;height:20px;" />');
      $Month= $("#Month").val();
      $year= $("#year").val();
      $Type= $("#Type").val();
          //alert($Month);
//            if($Month =='' || $year =='' || $Type==''){
//                          $(".error_msgg").html('All Fields are Required..!');
//                          $(".error_msgg").show();
//                          setTimeout(hidetab,4000);
//                          $("#searchElectrical").html('<i class="material-icons">search</i> Search');
//                           return false;
//                  }
//                  else{
//                      return true;
//                  }
            
	function hidetab(){    
            $('#mssg').hide();
            $('.error_msgg').hide();
          }	
      
    });
});
</script>    
    