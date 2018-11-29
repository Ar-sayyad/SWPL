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
                    <div class="error_msg" style="display: none;width: 50%"></div>
                          <div class="row">
                        <div class="col-lg-12">
                           
                             <div class="card alert">
                                 <div class="col-lg-10">
                                 <form action="<?php echo base_url();?>electrical/searchElectrical" method="POST" enctype="multipart/form-data"  class="searchform">
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
                                    <button type="submit" name="search" data-id="hello" id="searchElectrical" class="btn btn-success" value="save"><i class="material-icons">search</i> Search</button>
                                </th>
                            </tr>
                        </thead>
                    </table>
                                 </form>
                                 </div>
                                 <div class="col-lg-2">
                                     <div class="addbtn">
                                      <button data-toggle="modal" onclick="showAjaxModal('<?php echo base_url();?>home/popup/swpl/addElectrical');" class="btn btn-primary" style="float: right" > <i class="material-icons">add_circle_outline</i> Add Electrical Data</button>
                                    </div>
                                 </div>
                                  
                                <div class="bootstrap-data-table-panel">
                                    <div class="table-responsive">
                                        <table id="bootstrap-data-table-export" class="table table-striped table-bordered">
                                            <thead>
                                                <tr>
                                                    <th>SR.</th> 
                                                    <th>Month</th>
                                                    <th>Year</th>
                                                    <th>Legal Expenses</th>
                                                    <th>Cash Purchase</th>
                                                    <th>Admin Unit</th>
<!--                                                    <th>Admin Unit Cost</th>-->
                                                    <th>MHS</th>
                                                    <!--<th>MHS Unit Cost</th>-->
                                                    <th>GSU MHC</th>
                                                    <!--<th>GSU MHC Unit Cost</th>-->
                                                    <th>Gantry</th>
                                                    <!--<th>Gantry Unit Cost</th>-->
                                                    <!--<th>Power Factor Improvement</th>-->
                                                    <!--<th>Power Factor Month</th>-->
                                                    <!--<th>DG1</th>-->
                                                    <!--<th>DG2</th>-->
                                                    <!--<th>DG3</th>-->
                                                    <!--<th>DG Sets</th>-->
                                                    <!--<th>HEME Diesel</th>-->
                                                    <!--<th>HEME Diesel U.Cost</th>-->
                                                    <th>VSL Operation</th>
                                                    <!--<th>Budgeted Power Failure HRS</th>-->
                                                    <!--<th>Saving Power Failure</th>-->
                                                    <th style="text-align: left">Actions</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php if(!empty($electrical_info)){ $sr=1; foreach($electrical_info as $row){?>
                                                <tr>
                                                    <td><?php echo $sr;?></td>
                                                    <td><?php echo $row['Month'];?></td>
                                                    <td><?php echo $row['Year'];?></td> 
                                                    <td><?php echo $row['LEGAL_EXPENSES'];?></td> 
                                                    <td><?php echo $row['CASH_PURCHASE'];?></td>
                                                    <td><?php echo $row['ADMIN_UNIT_CON'];?></td> 
                                                    <!--<td><?php echo $row['ADMIN_UNIT_CON_UINIT_COST'];?></td>-->
                                                    <td><?php echo $row['MHS'];?></td>
                                                    <!--<td><?php echo $row['MHS_UNIT_COST'];?></td>-->
                                                    <td><?php echo $row['GSU_MHC'];?></td>
                                                    <!--<td><?php echo $row['GSU_MHC_UNIT_COST'];?></td>-->
                                                    <td><?php echo $row['GANTRY'];?></td>
                                                    <!--<td><?php echo $row['GANTRY_UNIT_COST'];?></td>-->
                                                    <!--<td><?php echo $row['POWER_FACTOR_IMROVEMENT'];?></td>-->
                                                    <!--<td><?php echo $row['POWER_FACTOR_MONTH'];?></td>-->
                                                    <!--<td><?php echo $row['DG1'];?></td>-->
                                                    <!--<td><?php echo $row['DG2'];?></td>-->
                                                    <!--<td><?php echo $row['DG3'];?></td>-->
                                                    <!--<td><?php echo $row['DG_sets'];?></td>-->
                                                    <!--<td><?php echo $row['AVG_diesel_cost'];?></td>-->
                                                    <!--<td><?php echo $row['HEME_DIESEL_CON'];?></td>-->
                                                    <!--<td><?php echo $row['HEME_DIESEL_CON_UNIT_COST'];?></td>-->
                                                    <td><?php echo $row['Saving_VSL_Operation'];?></td>
                                                    <!--<td><?php echo $row['Budgeted_Power_failure_HRS'];?></td>-->
                                                    <!--<td><?php echo $row['SAVING_DEMUR_POWER_FAILURE'];?></td>-->
                                                    <td style="text-align: left">                                                       
                                                        
                                                         <a style="cursor:pointer" rel="tooltip" title="View" class="btn btn-info btn-link btn-sm" onclick="showAjaxModal('<?php echo base_url();?>home/popup/swpl/viewElectrical/<?php echo $row['ID'];?>');">
                                                        <i class="material-icons">visibility</i>
                                                        </a>
                                                        <a style="cursor:pointer" rel="tooltip" title="Edit" class="btn btn-primary btn-link btn-sm" onclick="showAjaxModal('<?php echo base_url();?>home/popup/swpl/editElectrical/<?php echo $row['ID'];?>');">
                                                        <i class="material-icons">edit</i>
                                                        </a>
                                                        
<!--                                                        <a rel="tooltip" title="Remove" class="btn btn-danger btn-link btn-sm" onclick="return checkDelete();" href="<?php echo base_url(); ?>electrical/delete/<?php echo $row['ID'];?>">
                                                          <i class="material-icons">close</i>-->
                                                      
                                                        </a>
                                                    </td>
                                                    
                                                </tr>
                                                <?php $sr++; } }?>    
                                                
                                            </tbody>
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
//                          $(".error_msg").html('Month & Year Required');
//                          $(".error_msg").show();
//                          setTimeout(hidetab,4000);
//                          $("#searchElectrical").html('<i class="material-icons">search</i> Search');
//                           return false;
//                  }
//                  else{
//                      return true;
//                  }
            
		
      
    });
});
</script>    
    