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
                                          <option value="<?php echo $prev = (date('Y')-1);?>"><?php echo date('Y')-1;?></option>
                                        <option value="<?php echo $curr = date('Y');?>"><?php echo date('Y');?></option>
                                        <option value="<?php echo $post = date('Y')+1;?>"><?php echo date('Y')+1;?></option>
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
                                MANUAL GANTRY CRANES
                            </th>
                        </tr>
                            <tr class="sect">
                                <th colspan="4">
                                <table class="table table-striped table-bordered">
                                    <thead class="">
                                        <tr>
                                            <th style="width:10% !important">
                                                SR.
                                            </th>
                                            <th style="width:10% !important">
                                                Equipment
                                            </th>
<!--                                            <th style="width:10% !important">
                                                Total Monthly Hrs
                                            </th>-->
                                            <th style="width:10%">
                                                Manitenance Mech.Hrs
                                            </th>
                                            <th style="width:10%">
                                                Manitenance Elec.Hrs
                                            </th>
                                            <th style="width:10%">
                                                Breakdown Mech.Hrs
                                            </th>
                                            <th style="width:10%">
                                                Breakdown Elec.Hrs
                                            </th>
<!--                                            <th style="width:10%">
                                                Working Hrs
                                            </th>-->
                                        </tr>
                                    <?php $exist = $this->swpl_model->select_data_info('tbl_grantyMan');
                                             $sr=1;  foreach($exist as $eqp){?> 
                                        <tr style="background-color:<?php echo trim($eqp['COLOR']);?>">
                                            <th style="width:10% !important">
                                                <?php echo $sr;?>
                                            </th>
                                        <th>
                                             <?php echo trim($eqp['EQUIPMENT']);?>
                                            <input type="hidden" id="EQUIPMENT" name="EQUIPMENT" value="<?php echo trim($eqp['EQUIPMENT']);?>" autocomplete="off" class="frmdata EQUIPMENT">
                                        </th>
<!--                                        <th>
                                             <?php echo trim($eqp['MONTHLY_HRS']);?>
                                             <input type="hidden" id="MONTHLY_HRS" name="MONTHLY_HRS" value="<?php echo trim($eqp['MONTHLY_HRS']);?>"  class="frmdata MONTHLY_HRS">
                                        </th>-->
                                        <td>
                                            <input type="text" id="MAINT_HRS_MECH" name="MAINT_HRS_MECH"  autocomplete="off" style="background-color:<?php echo trim($eqp['COLOR']);?>" class="frmdata MAINT_HRS_MECH">
                                        </td>
                                        <td>
                                             <input type="text" id="MAINT_HRS_ELEC" name="MAINT_HRS_ELEC"  autocomplete="off"  style="background-color:<?php echo trim($eqp['COLOR']);?>" class="frmdata MAINT_HRS_ELEC">
                                        </td>
                                        <td>
                                             <input type="text" id="BREAK_HRS_MECH" name="BREAK_HRS_MECH"  autocomplete="off" style="background-color:<?php echo trim($eqp['COLOR']);?>" class="frmdata BREAK_HRS_MECH">
                                        </td>
                                        <td>
                                             <input type="text" id="BREAK_HRS_ELEC" name="BREAK_HRS_ELEC"  autocomplete="off"  style="background-color:<?php echo trim($eqp['COLOR']);?>" class="frmdata BREAK_HRS_ELEC">
                                        </td>
<!--                                        <td>
                                             <input type="text" id="WORKING_HRS" name="WORKING_HRS"  autocomplete="off" style="background-color:<?php echo trim($eqp['COLOR']);?>" class="frmdata WORKING_HRS">
                                        </td>-->
                                    </tr>
                                    <?php $sr++; } ?>
                                     <tr>
                                            <th style="width:10% !important">
                                                SR.
                                            </th>
                                            <th style="width:10% !important">
                                                Equipment
                                            </th>
                                            <th style="width:10%">
                                               HOISTING HRS (READING)<br> OPEN
                                            </th>
                                            <th style="width:10%">
                                                   HOISTING HRS (READING)<br> CLOSING
                                            </th>
                                            <th style="width:10%">
                                                CT & LT HRS (READING)<br> OPEN	
                                            </th>
                                            <th style="width:10%">
                                                 CT & LT HRS (READING)<br> CLOSING	
                                            </th>
                                        </tr>
                                       <?php $existt = $this->swpl_model->select_data_info('tbl_grantyMan');
                                             $sr=1;  foreach($existt as $eqp){?> 
                                        <tr style="background-color:<?php echo trim($eqp['COLOR']);?>">
                                            <th style="width:10% !important">
                                                <?php echo $sr;?>
                                            </th>
                                        <th>
                                             <?php echo trim($eqp['EQUIPMENT']);?>
                                            <input type="hidden" id="EQUIPMENTH" name="EQUIPMENTH" value="<?php echo trim($eqp['EQUIPMENT']);?>" autocomplete="off" class="frmdata EQUIPMENTH">
                                        </th>
                                        <td>
                                            <input type="text" id="HOISTING_OPEN" name="HOISTING_OPEN"  autocomplete="off" style="background-color:<?php echo trim($eqp['COLOR']);?>" class="frmdata HOISTING_OPEN">
                                        </td>
                                        <td>
                                             <input type="text" id="HOISTING_CLOSING" name="HOISTING_CLOSING"  autocomplete="off"  style="background-color:<?php echo trim($eqp['COLOR']);?>" class="frmdata HOISTING_CLOSING">
                                        </td>
                                        <td>
                                             <input type="text" id="CTLT_OPEN" name="CTLT_OPEN"  autocomplete="off" style="background-color:<?php echo trim($eqp['COLOR']);?>" class="frmdata CTLT_OPEN">
                                        </td>
                                        <td>
                                             <input type="text" id="CTLT_CLOSING" name="CTLT_CLOSING"  autocomplete="off"  style="background-color:<?php echo trim($eqp['COLOR']);?>" class="frmdata CTLT_CLOSING">
                                        </td>
                                    </tr>
                                    <?php $sr++; } ?>
                                </thead>
                                </table> 
                                    </th>
                                
                            </tr>
                                                     
                            <tr>
                                <th colspan="4" style="text-align:center">
                                    <button type="button" name="save" data-id="hello" id="saveGranes" class="btn btn-success" value="save"><i class="material-icons">save</i> Save</button>
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
    $("#saveGranes").click(function(){
      $("#saveGranes").html('<img src="<?php echo base_url();?>site/content/img/loading.gif" style="width:25px;height:20px;" />');
      $Month= $("#Month").val();
      $year= $("#year").val();
      
        $EQUIPMENT = new Array();
        $(".EQUIPMENT").each(function() {
           $EQUIPMENT.push($(this).val());
        });
//         $MONTHLY_HRS= new Array();
//        $(".MONTHLY_HRS").each(function() {
//           $MONTHLY_HRS.push($(this).val());
//        });
         $MAINT_HRS_MECH = new Array();
        $(".MAINT_HRS_MECH").each(function() {
           $MAINT_HRS_MECH.push($(this).val());
        });
          $MAINT_HRS_ELEC= new Array();
        $(".MAINT_HRS_ELEC").each(function() {
           $MAINT_HRS_ELEC.push($(this).val());
        });
        $BREAK_HRS_MECH = new Array();
        $(".BREAK_HRS_MECH").each(function() {
           $BREAK_HRS_MECH.push($(this).val());
        });
        $BREAK_HRS_ELEC = new Array();
        $(".BREAK_HRS_ELEC").each(function() {
           $BREAK_HRS_ELEC.push($(this).val());
        });
//        $WORKING_HRS = new Array();
//        $(".WORKING_HRS").each(function() {
//           $WORKING_HRS.push($(this).val());
//        });      

 $EQUIPMENTH = new Array();
        $(".EQUIPMENTH").each(function() {
           $EQUIPMENTH.push($(this).val());
        });
         $HOISTING_OPEN = new Array();
        $(".HOISTING_OPEN").each(function() {
           $HOISTING_OPEN.push($(this).val());
        });
          $HOISTING_CLOSING= new Array();
        $(".HOISTING_CLOSING").each(function() {
           $HOISTING_CLOSING.push($(this).val());
        });
        $CTLT_OPEN = new Array();
        $(".CTLT_OPEN").each(function() {
           $CTLT_OPEN.push($(this).val());
        });
        $CTLT_CLOSING = new Array();
        $(".CTLT_CLOSING").each(function() {
           $CTLT_CLOSING.push($(this).val());
        });
        
           
      $.post('<?php echo base_url();?>gantryCranes/save', { Month: $Month,year:$year,EQUIPMENT:$EQUIPMENT,MAINT_HRS_MECH:$MAINT_HRS_MECH,
          MAINT_HRS_ELEC:$MAINT_HRS_ELEC,BREAK_HRS_MECH:$BREAK_HRS_MECH,BREAK_HRS_ELEC:$BREAK_HRS_ELEC,
          EQUIPMENTH:$EQUIPMENTH,HOISTING_OPEN:$HOISTING_OPEN,HOISTING_CLOSING:$HOISTING_CLOSING,CTLT_OPEN:$CTLT_OPEN,CTLT_CLOSING:$CTLT_CLOSING }, function(data){
          //alert(data);
                    if(data==1)
                          {                                  
                                $(".success_msg").html('<i class="material-icons">check_circle_outline</i> Gantry Cranes Data Added Successfully');
                                $(".success_msg").show();
                                window.location.reload();
                                setTimeout(hidetab,4000);
                          }
                          else{
                                  $(".error_msg").html(data);
                                  $(".error_msg").show();
                                  setTimeout(hidetab,4000);
                                  $("#saveGranes").html('<i class="material-icons">save</i> Save');
                          }
		});      
    });
      $('.MAINT_HRS_MECH').keypress(function (event) {
            return isNumber(event, this);
        });
         $('.MAINT_HRS_ELEC').keypress(function (event) {
            return isNumber(event, this);
        });
         $('.BREAK_HRS_MECH').keypress(function (event) {
            return isNumber(event, this);
        });
         $('.BREAK_HRS_ELEC').keypress(function (event) {
            return isNumber(event, this);
        });
//         $('.WORKING_HRS').keypress(function (event) {
//            return isNumber(event, this);
//        });
        $('.HOISTING_OPEN').keypress(function (event) {
            return isNumber(event, this);
        });
         $('.HOISTING_CLOSING').keypress(function (event) {
            return isNumber(event, this);
        });
         $('.CTLT_OPEN').keypress(function (event) {
            return isNumber(event, this);
        });
         $('.CTLT_CLOSING').keypress(function (event) {
            return isNumber(event, this);
        });
    // THE SCRIPT THAT CHECKS IF THE KEY PRESSED IS A NUMERIC OR DECIMAL VALUE.
    function isNumber(evt, element) {

        var charCode = (evt.which) ? evt.which : event.keyCode;

        if (
            (charCode !== 45 || $(element).val().indexOf('-') !== -1) &&      // “-” CHECK MINUS, AND ONLY ONE.
            (charCode !== 46 || $(element).val().indexOf('.') !== -1) &&      // “.” CHECK DOT, AND ONLY ONE.
            (charCode < 48 || charCode > 57)){
                $(".error_msg").html('Characters Not Allowed..!');
                $(".error_msg").show();
                //$(element).val('');
                setTimeout(hidetab,2000);
            return false;
        }

        return true;
    }
});
</script>