<style>
    .modal-dialog{
       width: 1300px !important;
    } 
    .table>thead>tr>th, .table>tbody>tr>th, .table>tfoot>tr>th, .table>thead>tr>td, .table>tbody>tr>td, .table>tfoot>tr>td {
    padding: 0px 6px;
    color:black;
    text-align: center;
    }
    .table>tbody>tr>td, .table>tbody>tr>th, .table>tfoot>tr>td, .table>tfoot>tr>th, .table>thead>tr>td, .table>thead>tr>th {   
    line-height: 2.428571 !important;
}

</style>

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
                                <th colspan="4">
                                <table class="table table-striped table-bordered">
                                    <thead class="">
                                        <tr>
                                            <th style="width:10% !important">
                                                Equipment
                                            </th>
                                            <th style="width:10% !important">
                                                Model No
                                            </th>
                                            <th style="width:10%">
                                                Diesel Consumption
                                            </th>
                                            <th style="width:10%">
                                                Tank stock(Ltr)
                                            </th>
                                            <th style="width:10%">
                                                Engine Hrs(Init.)
                                            </th>
                                            <th style="width:10%">
                                                Engine Hrs(Final)
                                            </th>
                                            <th style="width:10%">
                                                Benchmark
                                            </th>
                                            <th style="width:10% !important">
                                                Remarks
                                            </th>
                                        </tr>
                                    <?php $exist = $this->swpl_model->select_data_info('tblEquipType');
                                              foreach($exist as $eqp){?> 
                                        <tr style="background-color:<?php echo trim($eqp['color']);?>">
                                        <th>
                                             <?php echo trim($eqp['EquipmentType']);?>
                                            <input type="hidden" id="EQPT_Type" name="EQPT_Type" value="<?php echo trim($eqp['EquipmentType']);?>" autocomplete="off" class="frmdata EQPT_Type">
                                        </th>
                                        <th>
                                             <?php echo trim($eqp['Model_No']);?>
                                             <input type="hidden" id="EQPT_Model_Number" name="EQPT_Model_Number" value="<?php echo trim($eqp['Model_No']);?>"  style="background-color:<?php echo trim($eqp['color']);?>" class="frmdata EQPT_Model_Number">
                                        </th>
                                        <td>
                                            <input type="text" id="Diesel_Consumption" name="Diesel_Consumption"  autocomplete="off" style="background-color:<?php echo trim($eqp['color']);?>" class="frmdata Diesel_Consumption">
                                        </td>
                                        <td>
                                             <input type="text" id="Tank_stock_month_end" name="Tank_stock_month_end"  autocomplete="off"  style="background-color:<?php echo trim($eqp['color']);?>" class="frmdata Tank_stock_month_end">
                                        </td>
                                        <td>
                                             <input type="text" id="Engine_Hrs_Initial" name="Engine_Hrs_Initial"  autocomplete="off" style="background-color:<?php echo trim($eqp['color']);?>" class="frmdata Engine_Hrs_Initial">
                                        </td>
                                        <td>
                                             <input type="text" id="Engine_Hrs_Final" name="Engine_Hrs_Final"  autocomplete="off"  style="background-color:<?php echo trim($eqp['color']);?>" class="frmdata Engine_Hrs_Final">
                                        </td>
                                        <td>
                                             <input type="text" id="Benchmark" name="Benchmark"  autocomplete="off" style="background-color:<?php echo trim($eqp['color']);?>" class="frmdata Benchmark">
                                        </td>
                                        <td>
                                             <input type="text" id="Remarks" name="Remarks"  autocomplete="off" style="background-color:<?php echo trim($eqp['color']);?>" class="frmdata Remarks">
                                        </td>
                                    </tr>
                                    <?php } ?>
                                </thead>
                                </table> 
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
                                <th colspan="4">
                                <table class="table table-striped table-bordered">
                                    <thead class="">
                                        <tr>
                                            <th style="width:20% !important">
                                                Equipment
                                            </th>
                                            <th style="width:20% !important">
                                                Monthly Hrs
                                            </th>
                                            <th style="width:20% !important">
                                                Planned Maintenance
                                            </th>
                                            <th style="width:20% !important">
                                                Breakdown Hrs
                                            </th>
                                            <th style="width:20% !important">
                                                Working Hrs:
                                            </th>
                                        </tr>
                                    <?php $cond = array('EquipmentType'=>'FORKLIFT');
                                    $existt = $this->swpl_model->check_data_info('tblEquipType',$cond);
                                              foreach($existt as $eqpt){?> 
                                        <tr class="sect2">
                                        <th>
                                             <?php echo trim($eqpt['Model_No']);?>
                                            <input type="hidden" id="EQUIPMENT" name="EQUIPMENT" value="<?php echo trim($eqpt['Model_No']);?>" class="frmdata EQUIPMENT">
                                        </th>
                                        <td>
                                            <input type="text" id="MONTHLY_HRS" name="MONTHLY_HRS"  autocomplete="off" placeholder=""  style="background-color:#f5f5f569" class="frmdata MONTHLY_HRS ">
                                        </td>
                                        <td>
                                             <input type="text" id="PLANNED_MAINTENANCE" name="PLANNED_MAINTENANCE"  autocomplete="off" placeholder="" style="background-color:#f5f5f569" class="frmdata PLANNED_MAINTENANCE ">
                                        </td>
                                        <td>
                                             <input type="text" id="BREAKDOWN_HRS" name="BREAKDOWN_HRS"  autocomplete="off" placeholder="" style="background-color:#f5f5f569" class="frmdata BREAKDOWN_HRS">
                                        </td>
                                        <td>
                                             <input type="text" id="WORKING_HRS" name="WORKING_HRS"  autocomplete="off" placeholder="" style="background-color:#f5f5f569" class="frmdata WORKING_HRS">
                                        </td>
                                    </tr>
                                    <?php } ?>
                                </thead>
                                </table> 
                                    </th>
                                
                            </tr>
                             
                            
                             <tr>
                                <th colspan="4" >
                                    <hr class="hr2">
                                </th>
                            </tr>
                             <tr>
                            <th colspan="4" class="sect" style="color: #751b85;">
                                MANUAL HEME
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
      
        $EQPT_Type = new Array();
        $(".EQPT_Type").each(function() {
           $EQPT_Type.push($(this).val());
        });
         $EQPT_Model_Number= new Array();
        $(".EQPT_Model_Number").each(function() {
           $EQPT_Model_Number.push($(this).val());
        });
         $Diesel_Consumption = new Array();
        $(".Diesel_Consumption").each(function() {
           $Diesel_Consumption.push($(this).val());
        });
        $Tank_stock_month_end = new Array();
        $(".Tank_stock_month_end").each(function() {
           $Tank_stock_month_end.push($(this).val());
        });
        $Engine_Hrs_Initial = new Array();
        $(".Engine_Hrs_Initial").each(function() {
           $Engine_Hrs_Initial.push($(this).val());
        });
        $Engine_Hrs_Final = new Array();
        $(".Engine_Hrs_Final").each(function() {
           $Engine_Hrs_Final.push($(this).val());
        });
        $Benchmark = new Array();
        $(".Benchmark").each(function() {
           $Benchmark.push($(this).val());
        });
        $Remarks = new Array();
        $(".Remarks").each(function() {
           $Remarks.push($(this).val());
        });
        
      /***new table data***/
      
        $EQUIPMENT = new Array();
        $(".EQUIPMENT").each(function() {
           $EQUIPMENT.push($(this).val());
        });
        $MONTHLY_HRS = new Array();
        $(".MONTHLY_HRS").each(function() {
           $MONTHLY_HRS.push($(this).val());
        });
        $PLANNED_MAINTENANCE = new Array();
        $(".PLANNED_MAINTENANCE").each(function() {
           $PLANNED_MAINTENANCE.push($(this).val());
        });
        $BREAKDOWN_HRS = new Array();
        $(".BREAKDOWN_HRS").each(function() {
           $BREAKDOWN_HRS.push($(this).val());
        });
        $WORKING_HRS = new Array();
        $(".WORKING_HRS").each(function() {
           $WORKING_HRS.push($(this).val());
        });
      
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
                                $(".succes_msg").html('<i class="material-icons">check_circle_outline</i> HEME Details Added Successfully');
                                $(".succes_msg").show();
                                window.location.reload();
                                setTimeout(hidetab,4000);
                          }
                          else{
                                  $(".erro_msg").html(data);
                                  $(".erro_msg").show();
                                  setTimeout(hidetab,4000);
                                  $("#saveHeme").html('<i class="material-icons">save</i> Save');
                          }
		});
      
    });
    
     $('.Diesel_Consumption').keypress(function (event) {
            return isNumber(event, this);
        }); 
        $('.Tank_stock_month_end').keypress(function (event) {
            return isNumber(event, this);
        });
         $('.Engine_Hrs_Initial').keypress(function (event) {
            return isNumber(event, this);
        });
         $('.Engine_Hrs_Final').keypress(function (event) {
            return isNumber(event, this);
        });
        
        /*******/
         $('.MONTHLY_HRS').keypress(function (event) {
            return isNumber(event, this);
        });
         $('.PLANNED_MAINTENANCE').keypress(function (event) {
            return isNumber(event, this);
        });
         $('.BREAKDOWN_HRS').keypress(function (event) {
            return isNumber(event, this);
        });
         $('.WORKING_HRS').keypress(function (event) {
            return isNumber(event, this);
        });
        
        /********/
         $('#Diesel_Qty_Issued').keypress(function (event) {
            return isNumber(event, this);
        });
         $('#Opening_Balance').keypress(function (event) {
            return isNumber(event, this);
        });
         $('#Diesel_filled').keypress(function (event) {
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