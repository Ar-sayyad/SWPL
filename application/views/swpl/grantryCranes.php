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
                    <!--<div class="error_msgg" style="display: none;width: 50%"></div>-->
                          <div class="row">
                        <div class="col-lg-12">
                           
                             <div class="card alert">
                                 <div class="col-lg-10">
                                 <form action="<?php echo base_url();?>gantryCranes/searchCranes" method="POST" enctype="multipart/form-data"  class="searchform">
                    <table class="table form"> 
                        <thead>
                            <tr>
                                <th>
                                    <select id="Month" name="Month" placeholder="Month" required=""  class="clsmon form-control">
                                        <option value="">---Select Month---</option>
                                         <?php foreach($month_info as $mon){?>                                       
                                        <option data-id="<?php echo trim($mon['FY_Order']);?>" value="<?php echo trim($mon['MonthName']);?>" <?php if(trim($Month)==trim($mon['MonthName'])){ echo 'selected'; }else{  } ?>><?php echo trim($mon['MonthName']);?></option>                                      
                                         <?php }?>  
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
                                    <select id="type" name="type" placeholder="type" required=""  class="form-control">
                                        <option value="">---Select Type---</option>                                        
                                        <option value="1" <?php if($type== 1){ echo 'selected'; }else{ } ?>>MAINTENANCE - BREAKDOWN HRS</option>
                                        <option value="2" <?php if($type== 2){ echo 'selected'; }else{ } ?>>HOISTING - CT & LT HRS</option>
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
                                 <div class="col-lg-2">
                                     <div class="addbtn">
                                         <button data-toggle="modal" onclick="showAjaxModal('<?php echo base_url();?>home/popup/swpl/addCranes/<?php echo $Month;?>/<?php echo $Year;?>');" class="btn btn-primary" style="float: right" > <i class="material-icons">add_circle_outline</i> Add Gantry Data</button>
                                     
                                    </div>
                                     <div class="addbtn">
                                      
                                    </div>
                                 </div>
                                  
                                <div class="bootstrap-data-table-panel">
                                    <div class="table-responsive">
                                        <table id="bootstrap-data-table-export" class="table table-striped table-bordered">   
                                            <?php  if(!empty($GantryCranes_info)){ ?>
                                            <thead>
                                                <tr>
                                                    <th>SR.</th> 
                                                    <th>Month</th>
                                                    <th>Year</th>
                                                    <th>Equipment</th>
                                                    <!--<th>Monthly Hrs</th>-->
                                                    <th>Maintenance (MECH)Hrs</th>
                                                    <th>Maintenance (ELEC)Hrs</th>
                                                    <th>Breakdown (MECH)Hrs</th>
                                                    <th>Breakdown (ELEC)Hrs</th>
                                                    <!--<th>Working Hrs</th>-->
                                                    <th style="text-align: left">Actions</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php  if(!empty($GantryCranes_info)){  $sn=1; foreach($GantryCranes_info as $Cranes){?>
                                                <tr>
                                                    <td><?php echo $sn;?></td>
                                                    <td><?php echo $Cranes['MONTH'];?></td>
                                                    <td><?php echo $Cranes['YEAR'];?></td>
                                                    <td><?php echo $Cranes['EQUIPMENT'];?></td>
                                                    <!--<td><?php echo $Cranes['MONTHLY_HRS'];?></td>-->
                                                    <td><?php echo $Cranes['MAINT_HRS_MECH'];?></td>
                                                    <td><?php echo $Cranes['MAINT_HRS_ELEC'];?></td>
                                                    <td><?php echo $Cranes['BREAK_HRS_MECH'];?></td>
                                                    <td><?php echo $Cranes['BREAK_HRS_ELEC'];?></td>
                                                    <!--<td><?php echo $Cranes['WORKING_HRS'];?></td>-->
                                                    <td style="text-align: left"> 
                                                        <a style="cursor:pointer" rel="tooltip" title="Edit" class="btn btn-primary btn-link btn-sm" onclick="showAjaxModal('<?php echo base_url();?>home/popup/swpl/editCranes/<?php echo $Cranes['Sr_No'];?>');">
                                                        <i class="material-icons">edit</i>
                                                        </a>                                                        
<!--                                                        <a rel="tooltip" title="Remove" class="btn btn-danger btn-link btn-sm" onclick="return checkDelete();" href="<?php echo base_url(); ?>grantryCranes/delete/<?php echo $Cranes['Sr_No'];?>">
                                                          <i class="material-icons">close</i>-->
                                                      
                                                        </a>
                                                    </td>
                                                    
                                                </tr>
                                                <?php $sn++; } }?>    
                                                
                                            </tbody>   
                                            <?php } ?>
                                            
                                             <?php  if(!empty($GantryCraneshrs_info)){ ?>
                                            <thead>
                                                <tr>
                                                    <th>SR.</th> 
                                                    <th>Month</th>
                                                    <th>Year</th>
                                                    <th>Equipment</th>
                                                    <th>HOISTING OPEN HRS</th>
                                                    <th>HOISTING CLOSING HRS</th>
                                                    <th>CT & LT OPEN HRS</th>
                                                    <th>CT & LT CLOSING HRS</th>
                                                    <th style="text-align: left">Actions</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php  if(!empty($GantryCraneshrs_info)){  $sn=1; foreach($GantryCraneshrs_info as $Cranes){?>
                                                <tr>
                                                    <td><?php echo $sn;?></td>
                                                    <td><?php echo $Cranes['MONTH'];?></td>
                                                    <td><?php echo $Cranes['YEAR'];?></td>
                                                    <td><?php echo $Cranes['EQUIPMENT'];?></td>
                                                    <td><?php echo $Cranes['HOISTING_OPEN'];?></td>
                                                    <td><?php echo $Cranes['HOISTING_CLOSING'];?></td>
                                                    <td><?php echo $Cranes['CTLT_OPEN'];?></td>
                                                    <td><?php echo $Cranes['CTLT_CLOSING'];?></td>
                                                    <td style="text-align: left"> 
                                                        <a style="cursor:pointer" rel="tooltip" title="Edit" class="btn btn-primary btn-link btn-sm" onclick="showAjaxModal('<?php echo base_url();?>home/popup/swpl/editCranesHrs/<?php echo $Cranes['Sr_No'];?>');">
                                                        <i class="material-icons">edit</i>
                                                        </a>                                                        
<!--                                                        <a rel="tooltip" title="Remove" class="btn btn-danger btn-link btn-sm" onclick="return checkDelete();" href="<?php echo base_url(); ?>grantryCranes/deleteHrs/<?php echo $Cranes['Sr_No'];?>">
                                                          <i class="material-icons">close</i>-->
                                                      
                                                        </a>
                                                    </td>
                                                    
                                                </tr>
                                                <?php $sn++; } }?>    
                                                
                                            </tbody>   
                                            <?php } ?>
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
       
    $( "form" ).on( "submit", function() {    
      $("#searchElectrical").html('<img src="<?php echo base_url();?>site/content/img/loading.gif" style="width:25px;height:20px;" />');
      $Month= $("#Month").val();
      $year= $("#year").val();
          //alert($Month);
//            if($Month =='' || $year ==''){
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
    