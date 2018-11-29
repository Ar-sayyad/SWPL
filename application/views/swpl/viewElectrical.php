<?php $data_info = $this->db->get_where('dbo.tblELManualEntry', array('ID' => $param2))->result_array();

?>

<div class="row main-section" >			
        <div class="col-lg-12 col-md-12">
            <div class="card">

                <div class="card-content">
                    <div class="bootstrap-data-table-panel">
                                    <div class="table-responsive">
                                        <table id="bootstrap-data-table-export" class="table table-striped table-bordered">
                                            
                                            <tbody>
                                                <?php $sr=1; foreach($data_info as $row){?>
                                                <tr>
                                                     <th>Month</th><td><?php echo $row['Month'];?></td>
                                                     <th>Year</th><td><?php echo $row['Year'];?></td> 
                                                </tr>
                                                <tr>
                                                     <th>Legal Expenses</th><td><?php echo $row['LEGAL_EXPENSES'];?></td> 
                                                    <th>Cash Purchase</th><td><?php echo $row['CASH_PURCHASE'];?></td>
                                                </tr>
                                                <tr>
                                                    <th>Admin Unit</th><td><?php echo $row['ADMIN_UNIT_CON'];?></td> 
                                                    <th>Admin Unit Cost</th><td><?php echo $row['ADMIN_UNIT_CON_UINIT_COST'];?></td>
                                                </tr>
                                                <tr>
                                                    <th>MHS</th><td><?php echo $row['MHS'];?></td>
                                                     <th>GSU MHC</th><td><?php echo $row['GSU_MHC'];?></td>
                                                </tr>
                                              
                                                <tr>
                                                    <th>Gantry</th><td><?php echo $row['GANTRY'];?></td>
                                                    <th>MHS/GANTRY/GSU & MHC - 571 U.COST </th><td><?php echo $row['MHS_GANTRY_GSU_MHC_COST'];?></td>
                                                </tr>
                                                <tr>
                                                    <th>Power Factor Improvement</th><td><?php echo $row['POWER_FACTOR_IMROVEMENT'];?></td>
                                                    <th>Power Factor Month</th><td><?php echo $row['POWER_FACTOR_MONTH'];?></td>
                                                </tr>
                                                <tr>
                                                   <th>DG1</th> <td><?php echo $row['DG1'];?></td>
                                                    <th>DG1 Unit</th> <td><?php echo $row['DG1Unit'];?></td>
                                                    
                                                </tr>
                                                <tr>
                                                    <th>DG2</th><td><?php echo $row['DG2'];?></td>
                                                    <th>DG2 Unit</th><td><?php echo $row['DG2Unit'];?></td>
                                                </tr>
                                                <tr>
                                                    <th>DG3</th><td><?php echo $row['DG3'];?></td>
                                                    <th>DG3 Unit</th><td><?php echo $row['DG3Unit'];?></td>
                                                </tr>
                                                <tr>
                                                    <th>DG Sets</th><td><?php echo $row['DG_sets'];?></td>
                                                    <th>DG Sets Unit</th><td><?php echo $row['DG_setsUnit'];?></td>
                                                </tr>
                                                <tr>
                                                    <th>AVG Diesel Cost</th><td><?php echo $row['AVG_diesel_cost'];?></td>
                                                    <th>Total Power Failure</th><td><?php echo $row['TOTAL_POWER_FAILURE'];?></td>
                                                </tr>
                                                <tr>
                                                    <th>No of Power Trips</th><td><?php echo $row['Number_of_Power_Trips'];?></td>
                                                     <th>FOR VSL OPRNS</th><td><?php echo $row['FOR_VSL_OPRNS'];?></td>
                                                </tr>
                                                <tr>
                                                    <th>FOR RAKE OPRNS </th><td><?php echo $row['FOR_RAKE_OPRNS'];?></td>
                                                    <th>VSL Operation</th><td><?php echo $row['Saving_VSL_Operation'];?></td>
                                                </tr>
                                                <tr>
                                                     <th>Budgeted Power Failure HRS</th><td><?php echo $row['Budgeted_Power_failure_HRS'];?></td>
                                                    <th>Saving Power Failure</th><td><?php echo $row['SAVING_DEMUR_POWER_FAILURE'];?></td>                                                    
                                                    
                                                </tr>
                                                <?php $sr++; }?>    
                                                
                                            </tbody>
                                        </table>
                                    </div>
                                </div>

                </div>
            </div>
        </div>	


</div>

<script>
   $(document).ready(function(){
    $("#editElectrical").click(function(){
      $("#editElectrical").html('<img src="<?php echo base_url();?>site/content/img/loading.gif" style="widtd:25px;height:20px;" />');
      $Montd= $("#Montd").val();
      $year= $("#year").val();
      $LEGAL_EXPENSES= $("#LEGAL_EXPENSES").val();
      $CASH_PURCHASE= $("#CASH_PURCHASE").val();
      $ADMIN_UNIT_CON= $("#ADMIN_UNIT_CON").val();
      $ADMIN_UNIT_CON_UINIT_COST= $("#ADMIN_UNIT_CON_UINIT_COST").val();
      $MHS= $("#MHS").val();
      $MHS_UNIT_COST= $("#MHS_UNIT_COST").val();
      $GSU_MHC= $("#GSU_MHC").val();
      $GSU_MHC_UNIT_COST= $("#GSU_MHC_UNIT_COST").val();
      $GANTRY= $("#GANTRY").val();
      $GANTRY_UNIT_COST= $("#GANTRY_UNIT_COST").val();
      $POWER_FACTOR_IMROVEMENT= $("#POWER_FACTOR_IMROVEMENT").val();
      $POWER_FACTOR_MONTH= $("#POWER_FACTOR_MONTH").val();
      $DG1= $("#DG1").val();
      $DG2= $("#DG2").val();
      $DG3= $("#DG3").val();
      $DG_sets= $("#DG_sets").val();
      $AVG_diesel_cost= $("#AVG_diesel_cost").val();
      $HEME_DIESEL_CON= $("#HEME_DIESEL_CON").val();
      $HEME_DIESEL_CON_UNIT_COST= $("#HEME_DIESEL_CON_UNIT_COST").val();
      $Saving_VSL_Operation= $("#Saving_VSL_Operation").val();
      $Budgeted_Power_failure_HRS= $("#Budgeted_Power_failure_HRS").val();
      $SAVING_DEMUR_POWER_FAILURE= $("#SAVING_DEMUR_POWER_FAILURE").val();
      
      $.post('<?php echo base_url();?>electrical/update/<?php echo $param2;?>', { Montd: $Montd,year:$year,LEGAL_EXPENSES:$LEGAL_EXPENSES,CASH_PURCHASE:$CASH_PURCHASE,ADMIN_UNIT_CON:$ADMIN_UNIT_CON,
          ADMIN_UNIT_CON_UINIT_COST:$ADMIN_UNIT_CON_UINIT_COST,MHS:$MHS,MHS_UNIT_COST:$MHS_UNIT_COST,GSU_MHC:$GSU_MHC,GSU_MHC_UNIT_COST:$GSU_MHC_UNIT_COST,GANTRY:$GANTRY,
          GANTRY_UNIT_COST:$GANTRY_UNIT_COST,POWER_FACTOR_IMROVEMENT:$POWER_FACTOR_IMROVEMENT,POWER_FACTOR_MONTH:$POWER_FACTOR_MONTH,DG1:$DG1,DG2:$DG2,DG3:$DG3,DG_sets:$DG_sets,
          AVG_diesel_cost:$AVG_diesel_cost,HEME_DIESEL_CON:$HEME_DIESEL_CON,HEME_DIESEL_CON_UNIT_COST:$HEME_DIESEL_CON_UNIT_COST,Saving_VSL_Operation:$Saving_VSL_Operation,
          Budgeted_Power_failure_HRS:$Budgeted_Power_failure_HRS,SAVING_DEMUR_POWER_FAILURE:$SAVING_DEMUR_POWER_FAILURE}, function(data){
          //alert(data);
                    if(data==1)
                          {                                  
                                $(".success_msg").html('<i class="material-icons">check_circle_outline</i> Electrical Details Updated Successfully');
                                $(".success_msg").show();
                                window.location.reload();
                                setTimeout(hidetab,4000);
                          }
                          else{
                                  $(".error_msg").html(data);
                                  $(".error_msg").show();
                                  setTimeout(hidetab,4000);
                                  $("#editElectrical").html('<i class="material-icons">edit</i> Update');
                          }
		});
      
    });
});
</script>