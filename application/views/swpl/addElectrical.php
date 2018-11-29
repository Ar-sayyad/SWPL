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
                                SPARES & CONSUMABLES CONSUMPTION
                            </th>
                        </tr>
                            <tr class="sect">
                                <th>Legal Expenses :<span class="required"></span></th>
                                <th>
                                    <input type="text" id="LEGAL_EXPENSES" name="LEGAL_EXPENSES" autocomplete="off" placeholder="Legal Expenses" class="form-control">
                                </th>
                                
                                <th>Cash Purchase :<span class="required"></span></th>
                                <th>
                                      <input type="text" id="CASH_PURCHASE" name="CASH_PURCHASE"  autocomplete="off" placeholder="Cash Purchase"  class="form-control">
                                </th>
                            </tr>
                            <tr>
                                <th colspan="4" >
                                    <hr class="hr2">
                                </th>
                            </tr>
                       <tr>
                            <th colspan="4" class="sect2" style="color: #751b85;">
                                POWER CONSUMPTION
                            </th>
                        </tr>
                             <tr class="sect2">
                                 <th>Admin- Unit Consumption (KWHR) :<span class="required"></span></th>
                                <th>
                                    <input type="text" id="ADMIN_UNIT_CON" name="ADMIN_UNIT_CON"  autocomplete="off" placeholder="Admin- Unit Consumption (KWHR)" class="form-control">
                                </th>
                                
                                <th>Admin- Unit Cost :<span class="required"></span></th>
                                <th>
                                    <input type="text" id="ADMIN_UNIT_CON_UINIT_COST" name="ADMIN_UNIT_CON_UINIT_COST"  autocomplete="off" placeholder="Admin- Unit Cost" class="form-control">
                                </th>
                            </tr>
                            <tr class="sect2">
                                 <th> MHS:<span class="required"></span></th>
                                  <th>
                                    <input type="text" id="MHS" name="MHS" autocomplete="off" placeholder="MHS" class="form-control">
                                </th>
                                <th> GSU & MHC - 571:<span class="required"></span></th>
                                  <th>
                                    <input type="text" id="GSU_MHC" name="GSU_MHC" autocomplete="off" placeholder="GSU & MHC - 571" class="form-control">
                                </th>
                             </tr>
                           
                              <tr class="sect2">
                                 <th> Gantry:<span class="required"></span></th>
                                  <th>
                                    <input type="text" id="GANTRY" name="GANTRY" value="" autocomplete="off" placeholder="Gantry" class="form-control">
                                </th>
                                <th> MHS/GANTRY/GSU & MHC - 571 U.COST :<span class="required"></span></th>
                                  <th>
                                    <input type="text" id="MHS_GANTRY_GSU_MHC_COST" name="MHS_GANTRY_GSU_MHC_COST" value="" autocomplete="off" placeholder="MHS / GANTRY / GSU & MHC - 571 UNIT COST " class="form-control">
                                </th>
                             </tr>
                              <tr class="sect2">
                                 <th>Power Factor Improvement:<span class="required"></span></th>
                                  <th>
                                    <input type="text" id="POWER_FACTOR_IMROVEMENT" name="POWER_FACTOR_IMROVEMENT" value="" autocomplete="off" placeholder="Saving Power Factor Improvement" class="form-control">
                                </th>
                                <th>Power Factor Month :<span class="required"></span></th>
                                  <th>
                                    <input type="text" id="POWER_FACTOR_MONTH" name="POWER_FACTOR_MONTH" value="" autocomplete="off" placeholder="Power Factor Month" class="form-control">
                                </th>
                             </tr>
                             <tr>
                                <th colspan="4" >
                                    <hr class="hr2">
                                </th>
                            </tr>
                             <tr>
                            <th colspan="4" class="sect" style="color: #751b85;">
                                DIESEL GENERATOR
                            </th>
                        </tr>
                        <tr class="sect">
                                 <th> DG-1 (1500 KVA) HRS:<span class="required"></span></th>
                                  <th>
                                    <input type="text" id="DG1" name="DG1" value="" autocomplete="off" placeholder="DG-1 (1500 KVA) HRS" class="form-control">
                                </th>
                                <th> DG-1 (1500 KVA) Unit Generated:<span class="required"></span></th>
                                  <th>
                                    <input type="text" id="DG1Unit" name="DG1Unit" value="" autocomplete="off" placeholder="DG-1 (1500 KVA) Unit Generated" class="form-control">
                                </th>
                             </tr>
                             <tr class="sect">
                                 <th> DG-2 (1500 KVA) HRS:<span class="required"></span></th>
                                  <th>
                                    <input type="text" id="DG2" name="DG2" value="" autocomplete="off" placeholder="DG-2 (1500 KVA) HRS" class="form-control">
                                </th>
                                 <th> DG-2 (1500 KVA) Unit Generated:<span class="required"></span></th>
                                  <th>
                                    <input type="text" id="DG2Unit" name="DG2Unit" value="" autocomplete="off" placeholder="DG-2 (1500 KVA) Unit Generated" class="form-control">
                                </th>
                             </tr>
                             <tr class="sect">
                                 <th> DG-3 (2000 KVA) HRS:<span class="required"></span></th>
                                  <th>
                                    <input type="text" id="DG3" name="DG3" value="" autocomplete="off" placeholder="DG-3 (2000 KVA) HRS" class="form-control">
                                </th>
                                 <th> DG-3 (2000 KVA) Unit Generated:<span class="required"></span></th>
                                  <th>
                                    <input type="text" id="DG3Unit" name="DG3Unit" value="" autocomplete="off" placeholder="DG-3 (2000 KVA) Unit Generated" class="form-control">
                                </th>
                             </tr>
                              <tr class="sect">
                                <th> DG sets HRS:<span class="required"></span></th>
                                  <th>
                                    <input type="text" id="DG_sets" name="DG_sets" value="" autocomplete="off" placeholder="DG sets (125+250+100kva) HRS" class="form-control">
                                </th>
                                <th> DG sets Unit Generated:<span class="required"></span></th>
                                  <th>
                                    <input type="text" id="DG_setsUnit" name="DG_setsUnit" value="" autocomplete="off" placeholder="DG sets (125+250+100kva) Unit Generated" class="form-control">
                                </th>
                             </tr>
                             <tr class="sect">
                                 <th> Avg. Diesel Cost:<span class="required"></span></th>
                                  <th>
                                    <input type="text" id="AVG_diesel_cost" name="AVG_diesel_cost" value="" autocomplete="off" placeholder="Average diesel cost Rs / Ltr" class="form-control">
                                </th>
<!--                                <th> HEME Diesel Consumption :<span class="required"></span></th>
                                  <th>
                                    <input type="text" id="HEME_DIESEL_CON" name="HEME_DIESEL_CON" value="" autocomplete="off" placeholder="HEME Diesel Consumption" class="form-control">
                                </th>
                             </tr>
                             <tr class="sect">
                                 <th> HEME Diesel Unit Cost:<span class="required"></span></th>
                                  <th>
                                    <input type="text" id="HEME_DIESEL_CON_UNIT_COST" name="HEME_DIESEL_CON_UNIT_COST" value="" autocomplete="off" placeholder="HEME Diesel Unit Cost" class="form-control">
                                </th>-->
                                <th colspan="2">&nbsp;</th>
                             </tr>
                             <tr>
                                <th colspan="4" >
                                    <hr class="hr2">
                                </th>
                            </tr>
                             <tr>
                                <th colspan="4" class="sect2" style="color: #751b85;">
                                DG SET CAP.INV. PAY BACK
                                </th>
                            </tr>
                            <tr class="sect2">
                                 <th> Total Power Failure:<span class="required"></span></th>
                                  <th>
                                    <input type="text" id="TOTAL_POWER_FAILURE" name="TOTAL_POWER_FAILURE" value="" autocomplete="off" placeholder="Total Power Failure" class="form-control">
                                </th>
                                <th> Number of Power Trips :<span class="required"></span></th>
                                  <th>
                                    <input type="text" id="Number_of_Power_Trips" name="Number_of_Power_Trips" value="" autocomplete="off" placeholder="Number of Power Trips" class="form-control">
                                </th>
                             </tr>
                             <tr class="sect2">
                                 <th> FOR VSL OPRNS:<span class="required"></span></th>
                                  <th>
                                    <input type="text" id="FOR_VSL_OPRNS" name="FOR_VSL_OPRNS" value="" autocomplete="off" placeholder="FOR VSL OPRNS" class="form-control">
                                </th>
                                <th> FOR RAKE OPRNS :<span class="required"></span></th>
                                  <th>
                                    <input type="text" id="FOR_RAKE_OPRNS" name="FOR_RAKE_OPRNS" value="" autocomplete="off" placeholder="FOR RAKE OPRNS" class="form-control">
                                </th>
                             </tr>
                            <tr class="sect2">
                                 <th> Saving Rs. Hr of VSL Operation:<span class="required"></span></th>
                                  <th>
                                    <input type="text" id="Saving_VSL_Operation" name="Saving_VSL_Operation" value="" autocomplete="off" placeholder="Saving Rs. Hr of VSL Operation" class="form-control">
                                </th>
                                <th> Budgeted Power failure Hrs. :<span class="required"></span></th>
                                  <th>
                                    <input type="text" id="Budgeted_Power_failure_HRS" name="Budgeted_Power_failure_HRS" value="" autocomplete="off" placeholder="Budgeted Power failure Hrs." class="form-control">
                                </th>
                             </tr>
                             <tr class="sect2">
                                 <th> Saving of Power Failure By DG Sets:<span class="required"></span></th>
                                  <th>
                                    <input type="text" id="SAVING_DEMUR_POWER_FAILURE" name="SAVING_DEMUR_POWER_FAILURE" value="" autocomplete="off" placeholder="Saving of Power Failure By DG Sets" class="form-control">
                                </th>
                                 <th colspan="2">&nbsp;</th>
                             </tr>
                            <tr>
                                <th colspan="4" style="text-align:center">
                                    <button type="button" name="save" data-id="hello" id="saveElectrical" class="btn btn-success" value="save"><i class="material-icons">save</i> Save</button>
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
    $("#saveElectrical").click(function(){
      $("#saveElectrical").html('<img src="<?php echo base_url();?>site/content/img/loading.gif" style="width:25px;height:20px;" />');
      $Month= $("#Month").val();
      $year= $("#year").val();             
      $LEGAL_EXPENSES= $("#LEGAL_EXPENSES").val(); 
      $CASH_PURCHASE= $("#CASH_PURCHASE").val();        
      $ADMIN_UNIT_CON= $("#ADMIN_UNIT_CON").val(); 
      $ADMIN_UNIT_CON_UINIT_COST= $("#ADMIN_UNIT_CON_UINIT_COST").val();
      $MHS= $("#MHS").val();    
      //$MHS_UNIT_COST= $("#MHS_UNIT_COST").val();      
      $GSU_MHC= $("#GSU_MHC").val();       
      //$GSU_MHC_UNIT_COST= $("#GSU_MHC_UNIT_COST").val();       
      $GANTRY= $("#GANTRY").val();       
      $MHS_GANTRY_GSU_MHC_COST= $("#MHS_GANTRY_GSU_MHC_COST").val();       
      $POWER_FACTOR_IMROVEMENT= $("#POWER_FACTOR_IMROVEMENT").val();       
      $POWER_FACTOR_MONTH= $("#POWER_FACTOR_MONTH").val();     
      $DG1= $("#DG1").val();
      $DG1Unit= $("#DG1Unit").val();
      $DG2= $("#DG2").val();
      $DG2Unit= $("#DG2Unit").val();
      $DG3= $("#DG3").val();
      $DG3Unit= $("#DG3Unit").val();
      $DG_sets= $("#DG_sets").val();
      $DG_setsUnit= $("#DG_setsUnit").val();
      $AVG_diesel_cost= $("#AVG_diesel_cost").val();  
      
      $TOTAL_POWER_FAILURE= $("#TOTAL_POWER_FAILURE").val();           
      $Number_of_Power_Trips= $("#Number_of_Power_Trips").val();
      $FOR_VSL_OPRNS= $("#FOR_VSL_OPRNS").val();
      $FOR_RAKE_OPRNS= $("#FOR_RAKE_OPRNS").val();
        
      $Saving_VSL_Operation= $("#Saving_VSL_Operation").val();      
      $Budgeted_Power_failure_HRS= $("#Budgeted_Power_failure_HRS").val();          
      $SAVING_DEMUR_POWER_FAILURE= $("#SAVING_DEMUR_POWER_FAILURE").val();
      
      $.post('<?php echo base_url();?>electrical/save', { Month: $Month,year:$year,LEGAL_EXPENSES:$LEGAL_EXPENSES,CASH_PURCHASE:$CASH_PURCHASE,ADMIN_UNIT_CON:$ADMIN_UNIT_CON,
          ADMIN_UNIT_CON_UINIT_COST:$ADMIN_UNIT_CON_UINIT_COST,MHS:$MHS,GSU_MHC:$GSU_MHC,GANTRY:$GANTRY,
          MHS_GANTRY_GSU_MHC_COST:$MHS_GANTRY_GSU_MHC_COST,POWER_FACTOR_IMROVEMENT:$POWER_FACTOR_IMROVEMENT,POWER_FACTOR_MONTH:$POWER_FACTOR_MONTH,DG1:$DG1,DG1Unit:$DG1Unit,
          DG2:$DG2,DG2Unit:$DG2Unit,DG3:$DG3,DG3Unit:$DG3Unit,DG_sets:$DG_sets,DG_setsUnit:$DG_setsUnit,AVG_diesel_cost:$AVG_diesel_cost,
          TOTAL_POWER_FAILURE:$TOTAL_POWER_FAILURE,Number_of_Power_Trips:$Number_of_Power_Trips,FOR_VSL_OPRNS:$FOR_VSL_OPRNS,FOR_RAKE_OPRNS:$FOR_RAKE_OPRNS,
          Saving_VSL_Operation:$Saving_VSL_Operation,
          Budgeted_Power_failure_HRS:$Budgeted_Power_failure_HRS,SAVING_DEMUR_POWER_FAILURE:$SAVING_DEMUR_POWER_FAILURE}, function(data){
          //alert(data);
                    if(data==1)
                          {                                  
                                $(".succes_msg").html('<i class="material-icons">check_circle_outline</i> Electrical Details Added Successfully');
                                $(".succes_msg").show();
                                window.location.reload();
                                setTimeout(hidetab,4000);
                          }
                          else{
                                  $(".erro_msg").html(data);
                                  $(".erro_msg").show();
                                  setTimeout(hidetab,4000);
                                  $("#saveElectrical").html('<i class="material-icons">save</i> Save');
                          }
		});
      
    });
     $('#LEGAL_EXPENSES').keypress(function (event) {
            return isNumber(event, this);
        });          
         $('#CASH_PURCHASE').keypress(function (event) {
            return isNumber(event, this);
        });        
       $('#ADMIN_UNIT_CON').keypress(function (event) {
            return isNumber(event, this);
        });
        $('#ADMIN_UNIT_CON_UINIT_COST').keypress(function (event) {
            return isNumber(event, this);
        });
       $('#MHS').keypress(function (event) {
            return isNumber(event, this);
        });
      
       $('#GSU_MHC').keypress(function (event) {
            return isNumber(event, this);
        });
       $('#MHS_GANTRY_GSU_MHC_COST').keypress(function (event) {
            return isNumber(event, this);
        });
       $('#GANTRY').keypress(function (event) {
            return isNumber(event, this);
        });      
       
       $('#POWER_FACTOR_IMROVEMENT').keypress(function (event) {
            return isNumber(event, this);
        });      
       $('#POWER_FACTOR_MONTH').keypress(function (event) {
            return isNumber(event, this);
        });
       $('#DG1Unit').keypress(function (event) {
            return isNumber(event, this);
        });
       $('#DG2Unit').keypress(function (event) {
            return isNumber(event, this);
        });
       $('#DG3Unit').keypress(function (event) {
            return isNumber(event, this);
        });
        $('#DG_setsUnit').keypress(function (event) {
            return isNumber(event, this);
        });
        $('#DG1').keypress(function (event) {
            return isNumber(event, this);
        });
       $('#DG2').keypress(function (event) {
            return isNumber(event, this);
        });
       $('#DG3').keypress(function (event) {
            return isNumber(event, this);
        });
        $('#DG_sets').keypress(function (event) {
            return isNumber(event, this);
        });
       $('#AVG_diesel_cost').keypress(function (event) {
            return isNumber(event, this);
        });
       $('#HEME_DIESEL_CON').keypress(function (event) {
            return isNumber(event, this);
        });    
       $('#HEME_DIESEL_CON_UNIT_COST').keypress(function (event) {
            return isNumber(event, this);
        });  
//         $('#TOTAL_POWER_FAILURE').keypress(function (event) {
//            return isNumber(event, this);
//        });
        $('#Number_of_Power_Trips').keypress(function (event) {
            return isNumber(event, this);
        });
//        $('#FOR_VSL_OPRNS').keypress(function (event) {
//            return isNumber(event, this);
//        });
//        $('#FOR_RAKE_OPRNS').keypress(function (event) {
//            return isNumber(event, this);
//        });
       $('#Saving_VSL_Operation').keypress(function (event) {
            return isNumber(event, this);
        });
       $('#Budgeted_Power_failure_HRS').keypress(function (event) {
            return isNumber(event, this);
        });
       $('#SAVING_DEMUR_POWER_FAILURE').keypress(function (event) {
            return isNumber(event, this);
        });        
    // THE SCRIPT THAT CHECKS IF THE KEY PRESSED IS A NUMERIC OR DECIMAL VALUE.
    function isNumber(evt, element) {

        var charCode = (evt.which) ? evt.which : event.keyCode;

        if (
            (charCode !== 45 || $(element).val().indexOf('-') !== -1) &&      // “-” CHECK MINUS, AND ONLY ONE.
            (charCode !== 46 || $(element).val().indexOf('.') !== -1) &&      // “.” CHECK DOT, AND ONLY ONE.
            (charCode < 48 || charCode > 57)){
                $(".erro_msg").html('Characters Not Allowed..!');
                $(".erro_msg").show();
                //$(element).val('');
                setTimeout(hidetab,2000);
            return false;
        }

        return true;
    }
});
</script>