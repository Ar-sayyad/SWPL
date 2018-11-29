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
                                 <div class="col-lg-10">
                                 <form action="<?php echo base_url();?>heme/searchHeme" method="POST" enctype="multipart/form-data"  class="searchform">
                    <table class="table form"> 
                        <thead>
                            <tr>
                                <th>
                                    <select id="Month" name="Month" placeholder="Month" required=''  class="clsmon form-control">
                                        <option value="">---Select Month---</option>
                                         <?php foreach($month_info as $mon){?>                                       
                                        <option data-id="<?php echo trim($mon['FY_Order']);?>" value="<?php echo trim($mon['MonthName']);?>" <?php if(trim($Month)==trim($mon['MonthName'])){ echo 'selected'; }else{  } ?>><?php echo trim($mon['MonthName']);?></option>                                      
                                         <?php }?>  
                                    </select>
                                </th>

                                <th>
                                    <select id="year" name="year" placeholder="year" required=''  class="form-control">
                                        <option value="">---Select Year---</option>                                        
                                        <option value="<?php echo $prev = (date('Y')-1);?>" <?php if(trim($Year)== $prev){ echo 'selected'; }else{ } ?>><?php echo date('Y')-1;?></option>
                                        <option value="<?php echo $curr = date('Y');?>" <?php if(trim($Year)== $curr){ echo 'selected'; }else{ } ?>><?php echo date('Y');?></option>
                                        <option value="<?php echo $post = date('Y')+1;?>" <?php if(trim($Year)== $post){ echo 'selected'; }else{ } ?>><?php echo date('Y')+1;?></option>
                                    </select>
                                </th>
                                 <th>
                                    <select id="Type" name="Type" placeholder="Type" required=''  class="form-control">
                                        <option value="">---Select Type---</option>                                        
                                        <option value="1" <?php if(trim($Type)== "1"){ echo 'selected'; }else{ } ?>>HEME DIESEL CONSUMPTION</option>
                                        <option value="2" <?php if(trim($Type)== "2"){ echo 'selected'; }else{ } ?>>AVAILABILITY & UTILIZATION</option>
                                        <option value="3" <?php if(trim($Type)== "3"){ echo 'selected'; }else{ } ?>>MANUAL HEME</option>
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
                                      <button data-toggle="modal" onclick="showAjaxModal('<?php echo base_url();?>home/popup/swpl/addHeme');" class="btn btn-primary" style="float: right" > <i class="material-icons">add_circle_outline</i> Add HEME Data</button>
                                    </div>
                                 </div>
                                  
                                <div class="bootstrap-data-table-panel">
                                    <div class="table-responsive">
                                        <table id="bootstrap-data-table-export" class="table table-striped table-bordered">
                                            <?php if(!empty($HEME_Diesel_info)){ ?>
                                            <thead>
                                                <tr>
                                                    <th>SR.</th> 
                                                    <th>Month</th>
                                                    <th>Year</th>
                                                    <th>Equipment</th>
                                                    <th>Model No.</th>
                                                    <th>Diesel Consumption</th>
                                                    <th>Tank Stock</th>
                                                    <th>Engine Hrs Initial</th>
                                                    <th>Engine Hrs Final</th>
                                                    <th>Remarks</th>
                                                    <th>Benchmark</th>
                                                    <th style="text-align: left">Actions</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php  $sn=1; foreach($HEME_Diesel_info as $diesel){?>
                                                <tr>
                                                    <td><?php echo $sn;?></td>
                                                    <td><?php echo $diesel['Month'];?></td>
                                                    <td><?php echo $diesel['Year'];?></td> 
                                                    <td><?php echo $diesel['EQPT_Type'];?></td> 
                                                    <td><?php echo $diesel['EQPT_Model_Number'];?></td>
                                                    <td><?php echo $diesel['Diesel_Consumption'];?></td> 
                                                    <td><?php echo $diesel['Tank_stock_month_end'];?></td>
                                                    <td><?php echo $diesel['Engine_Hrs_Initial'];?></td>
                                                    <td><?php echo $diesel['Engine_Hrs_Final'];?></td>
                                                    <td><?php echo $diesel['Remarks'];?></td>
                                                    <td><?php echo $diesel['Benchmark'];?></td>
                                                    <td style="text-align: left"> 
                                                        <a style="cursor:pointer" rel="tooltip" title="Edit" class="btn btn-primary btn-link btn-sm" onclick="showAjaxModal('<?php echo base_url();?>home/popup/swpl/editHemeDiesel/<?php echo $diesel['Sr_No'];?>');">
                                                        <i class="material-icons">edit</i>
                                                        </a>
                                                        
<!--                                                        <a rel="tooltip" title="Remove" class="btn btn-danger btn-link btn-sm" onclick="return checkDelete();" href="<?php echo base_url(); ?>heme/deleteHemeDiesel/<?php echo $diesel['Sr_No'];?>">
                                                          <i class="material-icons">close</i>-->
                                                      
                                                        </a>
                                                    </td>
                                                    
                                                </tr>
                                                <?php $sn++; } ?>    
                                                
                                            </tbody>
                                            <?php } elseif(!empty($HEME_Availability_info)){ ?>
                                            <thead>
                                                <tr>
                                                    <th>SR.</th> 
                                                    <th>Month</th>
                                                    <th>Year</th>
                                                    <th>EQUIPMENT</th>
                                                    <th>MONTHLY HRS</th>
                                                    <th>PLANNED MAINTENANCE</th>
                                                    <th>BREAKDOWN HRS</th>
                                                    <th>WORKING HRS</th>
                                                    <th style="text-align: left">Actions</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php  $srr=1; foreach($HEME_Availability_info as $avail){?>
                                                <tr>
                                                    <td><?php echo $srr;?></td>
                                                    <td><?php echo $avail['Month'];?></td>
                                                    <td><?php echo $avail['Year'];?></td> 
                                                    <td><?php echo $avail['EQUIPMENT'];?></td> 
                                                    <td><?php echo $avail['MONTHLY_HRS'];?></td>
                                                    <td><?php echo $avail['PLANNED_MAINTENANCE'];?></td> 
                                                    <td><?php echo $avail['BREAKDOWN_HRS'];?></td>
                                                     <td><?php echo $avail['WORKING_HRS'];?></td>
                                                    <td style="text-align: left">                                                       
                                                        
                                                        <a style="cursor:pointer" rel="tooltip" title="Edit" class="btn btn-primary btn-link btn-sm" onclick="showAjaxModal('<?php echo base_url();?>home/popup/swpl/editHemeAvailability/<?php echo $avail['Sr_no'];?>');">
                                                        <i class="material-icons">edit</i>
                                                        </a>
                                                        
<!--                                                        <a rel="tooltip" title="Remove" class="btn btn-danger btn-link btn-sm" onclick="return checkDelete();" href="<?php echo base_url(); ?>heme/deleteHemeAvail/<?php echo $avail['Sr_no'];?>">
                                                          <i class="material-icons">close</i>-->
                                                      
                                                        </a>
                                                    </td>
                                                    
                                                </tr>
                                                <?php $srr++; } ?>    
                                                
                                            </tbody>
                                             <?php  } elseif(!empty($HEME_info)){ ?>
                                            <thead>
                                                <tr>
                                                    <th>SR.</th> 
                                                    <th>Month</th>
                                                    <th>Year</th>
                                                    <th>Diesel Qty Issued</th>
                                                    <th>Opening Balance</th>
                                                    <th>Diesel Filled</th>
                                                    <th style="text-align: left">Actions</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php $sr=1; foreach($HEME_info as $row){?>
                                                <tr>
                                                    <td><?php echo $sr;?></td>
                                                    <td><?php echo $row['Month'];?></td>
                                                    <td><?php echo $row['Year'];?></td> 
                                                    <td><?php echo $row['Diesel_Qty_Issued'];?></td> 
                                                    <td><?php echo $row['Opening_Balance'];?></td>
                                                    <td><?php echo $row['Diesel_filled'];?></td> 
                                                   
                                                    <td style="text-align: left">  
                                                        <a style="cursor:pointer" rel="tooltip" title="Edit" class="btn btn-primary btn-link btn-sm" onclick="showAjaxModal('<?php echo base_url();?>home/popup/swpl/editHeme/<?php echo $row['Sr_No'];?>');">
                                                        <i class="material-icons">edit</i>
                                                        </a>
                                                        
<!--                                                        <a rel="tooltip" title="Remove" class="btn btn-danger btn-link btn-sm" onclick="return checkDelete();" href="<?php echo base_url(); ?>heme/deleteHeme/<?php echo $row['Sr_No'];?>">
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
    