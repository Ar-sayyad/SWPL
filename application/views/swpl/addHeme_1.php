<div class="row main-section">			
        <div class="col-lg-12 col-md-12">
            <div class="card">

                <div class="card-content">
                <form action="" method="POST" enctype="multipart/form-data">
                    <table class="table form">                                                
                        <thead class="">

                            <tr class="sect2">
                                <th> Select Month :<span class="required">*</span></th>
                                <th>
                                    <select id="Month" name="Month" placeholder="Month" required="" class="clsmon form-control">
                                        <option value="">---Select Month---</option>
                                         <?php foreach($month_info as $mon){?>                                       
                                        <option data-id="<?php echo trim($mon['FY_Order']);?>" value="<?php echo trim($mon['MonthName']);?>"><?php echo trim($mon['MonthName']);?></option>                                      
                                         <?php }?>  
                                    </select>
                                </th>

                                <th> Select Year :<span class="required">*</span></th>
                                <th>
                                    <select id="year" name="year" placeholder="year" required="" class="form-control">
                                        <option value="">---Select Year---</option>
                                        <option value="<?php echo date('Y')-1;?>"><?php echo date('Y')-1;?></option>
                                        <option value="<?php echo date('Y');?>"><?php echo date('Y');?></option>
                                        <option value="<?php echo date('Y')+1;?>"><?php echo date('Y')+1;?></option>
                                    </select>
                                </th>
                            </tr>
                            <tr>
                                <th colspan="4" >
                                     <hr class="hr2">
                                </th>
                            </tr>
                        <tr>
                            <th colspan="4" class="sect" style="color: #751b85;">
                                HEME DIESEL CONSUMPTION
                            </th>
                        </tr>
                            <tr class="sect">
                        <table>
                            <?php $qry = "Select DISTINCT EquipmentType from tblEquipType";                                        
                                      $exist = $this->db->query($qry)->result_array();
                                      foreach($exist as $eqp){?> 
                            <tr>
                                <th>
                                     <input type="text" id="EQPT_Type" name="EQPT_Type" value="<?php echo trim($eqp['EquipmentType']);?>" autocomplete="off" placeholder="Equipment Type" class="EQPT_Type form-control">
                                </th>
                                <th>
                                     <input type="text" id="EQPT_Model_Number" name="EQPT_Model_Number" value="<?php echo trim($eqp['EQPT_Model_Number']);?>" autocomplete="off" placeholder="Model Number" class="EQPT_Model_Number form-control">
                                </th>
                                <th>
                                     <input type="text" id="Diesel_Consumption" name="Diesel_Consumption" autocomplete="off" placeholder="Diesel Consumption" class="Diesel_Consumption form-control">
                                </th>
                                <th>
                                     <input type="text" id="Tank_stock_month_end" name="Tank_stock_month_end" autocomplete="off" placeholder="Tank stock on month end (Litres)" class="Tank_stock_month_end form-control">
                                </th>
                                <th>
                                     <input type="text" id="Engine_Hrs_Initial" name="Engine_Hrs_Initial" autocomplete="off" placeholder="Engine Hrs (Initial)" class="Engine_Hrs_Initial form-control">
                                </th>
                                <th>
                                     <input type="text" id="Engine_Hrs_Final" name="Engine_Hrs_Final" autocomplete="off" placeholder="Engine Hrs (Final)" class="Engine_Hrs_Final form-control">
                                </th>
                                <th>
                                     <input type="text" id="Benchmark" name="Benchmark" autocomplete="off" placeholder="Benchmark" class="Benchmark form-control">
                                </th>
                                <th>
                                     <textarea type="text" id="Remarks" name="Remarks" autocomplete="off" placeholder="Remarks" class="Remarks form-control"></textarea>
                                </th>
                            </tr>
                            
                        </table> 
                                      <?php } ?>                                        
                                                                   
                                </th>
                                <th> Select Model No :<span class="required">*</span></th>
                                <th>
                                    <select id="EQPT_Model_Number" name="EQPT_Model_Number" placeholder="Model Number" required="" class="form-control">
                                          <option value="">-Select Model No-</option>
                                         
                                    </select>
                                   
                                </th>
                            </tr>
                            
                            <tr class="sect">
                                 <th> Select Equipment :<span class="required">*</span></th>
                                <th>
                                    <select id="EQPT_Type" name="EQPT_Type" placeholder="Equipment Type" required="" class="form-control">
                                          <option value="">---Select Equipment---</option>
                                         <?php $qry = "Select DISTINCT EquipmentType from tblEquipType";                                        
                                      $exist = $this->db->query($qry)->result_array();
                                      foreach($exist as $eqp){?>                                        
                                        <option value="<?php echo trim($eqp['EquipmentType']);?>"><?php echo trim($eqp['EquipmentType']);?></option>
                                      <?php } ?>                                        
                                    </select>                                   
                                </th>
                                <th> Select Model No :<span class="required">*</span></th>
                                <th>
                                    <select id="EQPT_Model_Number" name="EQPT_Model_Number" placeholder="Model Number" required="" class="form-control">
                                          <option value="">-Select Model No-</option>
                                         
                                    </select>
                                   
                                </th>
                            </tr>
                            
                            <tr class="sect">
                                 <th>Diesel Consumption (Litres):<span class="required"></span></th>
                                <th>
                                    <input type="text" id="Diesel_Consumption" name="Diesel_Consumption" autocomplete="off" placeholder="Diesel Consumption (Litres)" class="form-control">
                                </th>
                                
                                <th>Tank stock on month end (Litres):<span class="required"></span></th>
                                <th>
                                    <input type="text" id="Tank_stock_month_end" name="Tank_stock_month_end" autocomplete="off" placeholder="Tank stock on month end (Litres)" class="form-control">
                                </th>
                            </tr>
                            
                            <tr class="sect">
                                 <th>Engine Hrs (Initial):<span class="required"></span></th>
                                <th>
                                    <input type="text" id="Engine_Hrs_Initial" name="Engine_Hrs_Initial" autocomplete="off" placeholder="Engine Hrs (Initial)" class="form-control">
                                </th>
                                
                                <th>Engine Hrs (Final):<span class="required"></span></th>
                                <th>
                                    <input type="text" id="Engine_Hrs_Final" name="Engine_Hrs_Final" autocomplete="off" placeholder="Engine Hrs (Final)" class="form-control">
                                </th>
                            </tr>
                            <tr class="sect">
                                 <th>Benchmark:<span class="required"></span></th>
                                <th>
                                    <input type="text" id="Benchmark" name="Benchmark" autocomplete="off" placeholder="Benchmark" class="form-control">
                                </th>
                                
                                <th>Remarks:<span class="required"></span></th>
                                <th>
                                    <textarea type="text" id="Remarks" name="Remarks" autocomplete="off" placeholder="Remarks" class="form-control"></textarea>
                                </th>
                            </tr>
                            <tr>
                                <th colspan="4" >
                                    <hr class="hr2">
                                </th>
                            </tr>
                       <tr>
                            <th colspan="4" class="sect2" style="color: #751b85;">
                                FLT-32  AVAILABILITY & UTILIZATION
                            </th>
                        </tr>
                             <tr class="sect2">
                                 <th> Equipment Type :<span class="required">*</span></th>
                                <th>
                                    <select id="EQUIPMENT" name="EQUIPMENT" placeholder="Equipment" required="" class="form-control">
                                          <option value="">---Equipment Type---</option>
                                         <?php $qryy = "Select Model_No from tblEquipType where EquipmentType='FORKLIFT'";                                        
                                      $existt = $this->db->query($qryy)->result_array();
                                      foreach($existt as $eqpe){?>                                        
                                        <option value="<?php echo trim($eqpe['Model_No']);?>"><?php echo trim($eqpe['Model_No']);?></option>
                                      <?php } ?>                                        
                                    </select>                                   
                                </th>
                                
                                <th>Monthly Hrs:<span class="required"></span></th>
                                <th>
                                    <input type="text" id="MONTHLY_HRS" name="MONTHLY_HRS" autocomplete="off" placeholder="Monthly Hrs" class="form-control">
                                </th>
                            </tr>
                            <tr class="sect2">
                                 <th> Planned Maintenance:<span class="required"></span></th>
                                  <th>
                                    <input type="text" id="PLANNED_MAINTENANCE" name="PLANNED_MAINTENANCE" autocomplete="off" placeholder="Planned Maintenance" class="form-control">
                                </th>
                                <th> Breakdown Hrs:<span class="required"></span></th>
                                  <th>
                                    <input type="text" id="BREAKDOWN_HRS" name="BREAKDOWN_HRS" autocomplete="off" placeholder="Breakdown Hrs" class="form-control">
                                </th>
                             </tr>
                             <tr class="sect2">
                                 <th> Working Hrs:<span class="required"></span></th>
                                  <th>
                                    <input type="text" id="WORKING_HRS" name="WORKING_HRS" autocomplete="off" placeholder="Working Hrs" class="form-control">
                                </th>
                                <th colspan="2">&nbsp;</th>
                             </tr>
                              
                             <tr>
                                <th colspan="4" >
                                    <hr class="hr2">
                                </th>
                            </tr>
                             <tr>
                            <th colspan="4" class="sect" style="color: #751b85;">
                                MAMUAL HEME
                            </th>
                        </tr>
                        <tr class="sect">
                                 <th> Diesel Qty Issued:<span class="required"></span></th>
                                  <th>
                                    <input type="text" id="Diesel_Qty_Issued" name="Diesel_Qty_Issued" autocomplete="off" placeholder="Diesel Qty Issued" class="form-control">
                                </th>
                                <th> Opening Balance:<span class="required"></span></th>
                                  <th>
                                    <input type="text" id="Opening_Balance" name="Opening_Balance" autocomplete="off" placeholder="Opening Balance" class="form-control">
                                </th>
                             </tr>
                             <tr class="sect">
                                 <th> Diesel Filled:<span class="required"></span></th>
                                  <th>
                                    <input type="text" id="Diesel_filled" name="Diesel_filled" autocomplete="off" placeholder="Diesel Filled" class="form-control">
                                </th>
                                 <th colspan="2">&nbsp;</th>
                             </tr>                           
                            <tr>
                                <th colspan="4" style="text-align:center">
                                    <button type="button" name="save" data-id="hello" id="saveHeme" class="btn btn-success" value="save"><i class="material-icons">save</i> Save</button>
                                     <button type="reset" name="Reset" class="btn btn-primary" value="reset"><i class="material-icons">replay</i> Reset</button>
                                </th>
                            </tr>

                        </thead>

                    </table>
                </form>
                </div>
            </div>
        </div>	


</div>
<script>
   $(document).ready(function(){       
       $("#EQPT_Type").change(function(){
           $EQPT_Type = $("#EQPT_Type").val();
           //alert($EQPT_Type);
           $.post('<?php echo base_url();?>heme/getModelNo', { EQPT_Type: $EQPT_Type },function(data){
               if(data){
                   //alert(data);
                   $("#EQPT_Model_Number").html(data);
                    }
                });
       });
    $("#saveHeme").click(function(){
      $("#saveHeme").html('<img src="<?php echo base_url();?>site/content/img/loading.gif" style="width:25px;height:20px;" />');
      $Month= $("#Month").val();
      $year= $("#year").val();
      
      $EQPT_Type= $("#EQPT_Type").val();
      $EQPT_Model_Number= $("#EQPT_Model_Number").val();
      $Diesel_Consumption= $("#Diesel_Consumption").val();
      $Tank_stock_month_end= $("#Tank_stock_month_end").val();
      $Engine_Hrs_Initial= $("#Engine_Hrs_Initial").val();
      $Engine_Hrs_Final= $("#Engine_Hrs_Final").val();
      $Benchmark= $("#Benchmark").val();
      $Remarks= $("#Remarks").val();
      
      $EQUIPMENT= $("#EQUIPMENT").val();
      $MONTHLY_HRS= $("#MONTHLY_HRS").val();
      $PLANNED_MAINTENANCE= $("#PLANNED_MAINTENANCE").val();
      $BREAKDOWN_HRS= $("#BREAKDOWN_HRS").val();
      $WORKING_HRS= $("#WORKING_HRS").val();
      
      $Diesel_Qty_Issued= $("#Diesel_Qty_Issued").val();
      $Opening_Balance= $("#Opening_Balance").val();
      $Diesel_filled= $("#Diesel_filled").val();
      
      $.post('<?php echo base_url();?>heme/save', { Month: $Month,year:$year,EQPT_Type:$EQPT_Type,EQPT_Model_Number:$EQPT_Model_Number,Diesel_Consumption:$Diesel_Consumption,
          Tank_stock_month_end:$Tank_stock_month_end,Engine_Hrs_Initial:$Engine_Hrs_Initial,Engine_Hrs_Final:$Engine_Hrs_Final,Benchmark:$Benchmark,Remarks:$Remarks,
          EQUIPMENT:$EQUIPMENT,MONTHLY_HRS:$MONTHLY_HRS,PLANNED_MAINTENANCE:$PLANNED_MAINTENANCE,BREAKDOWN_HRS:$BREAKDOWN_HRS,WORKING_HRS:$WORKING_HRS,
          Diesel_Qty_Issued:$Diesel_Qty_Issued,Opening_Balance:$Opening_Balance,Diesel_filled:$Diesel_filled}, function(data){
          //alert(data);
                    if(data==1)
                          {                                  
                                $(".success_msg").html('<i class="material-icons">check_circle_outline</i> HEME Details Added Successfully');
                                $(".success_msg").show();
                                window.location.reload();
                                setTimeout(hidetab,4000);
                          }
                          else{
                                  $(".error_msg").html(data);
                                  $(".error_msg").show();
                                  setTimeout(hidetab,4000);
                                  $("#saveHeme").html('<i class="material-icons">save</i> Save');
                          }
		});
      
    });
});
</script>