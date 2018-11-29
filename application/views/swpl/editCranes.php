<?php $data_info = $this->db->get_where('dbo.tblManualGantryCranes', array('Sr_No' => $param2))->result_array();
 foreach ($data_info as $row) {
?>
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
                                        <option data-id="<?php echo trim($mon['FY_Order']);?>" value="<?php echo trim($mon['MonthName']);?>" <?php if(trim($row['MONTH'])==trim($mon['MonthName'])){ echo 'selected'; }else{ echo 'disabled'; } ?>><?php echo trim($mon['MonthName']);?></option>                                      
                                         <?php }?>  
                                    </select>
                                </th>

                                <th> Select Year :<span class="required">*</span></th>
                                <th>
                                    <select id="year" name="year" placeholder="year" required="" class="form-control">
                                        <option value="">---Select Year---</option>
                                        <option value="<?php echo $prev = (date('Y')-1);?>" <?php if(trim($row['YEAR'])== $prev){ echo 'selected'; }else{ echo 'disabled'; } ?>><?php echo date('Y')-1;?></option>
                                        <option value="<?php echo $curr = date('Y');?>" <?php if(trim($row['YEAR'])== $curr){ echo 'selected'; }else{ echo 'disabled'; } ?>><?php echo date('Y');?></option>
                                        <option value="<?php echo $post = date('Y')+1;?>" <?php if(trim($row['YEAR'])== $post){ echo 'selected'; }else{ echo 'disabled'; } ?>><?php echo date('Y')+1;?></option>
                                    </select>
                                </th>
                            </tr>
                           
                            <tr class="sect">
                                <th>Equipment :<span class="required"></span></th>
                                <th>
                                    <input type="text" id="EQUIPMENT" name="EQUIPMENT" value="<?php echo trim($row['EQUIPMENT']);?>" readonly="" autocomplete="off" placeholder="Equipment" class="form-control">
                                </th>
                                
<!--                                <th>Monthly Hrs :<span class="required"></span></th>
                                <th>
                                    <input type="text" id="MONTHLY_HRS" name="MONTHLY_HRS" value="<?php echo trim($row['MONTHLY_HRS']);?>" readonly="" autocomplete="off" placeholder="Monthly Hrs" class="form-control">
                                </th>-->
                                <th>Maintenance (MECH)Hrs:<span class="required"></span></th>
                                <th>
                                    <input type="text" id="MAINT_HRS_MECH" name="MAINT_HRS_MECH" value="<?php echo trim($row['MAINT_HRS_MECH']);?>" autocomplete="off" placeholder="Maintenance (MECH)Hrs"  class="form-control">
                                </th>
                                </tr>
                           
                             <tr class="sect2">                               
                            
                                 <th>Maintenance (ELEC)Hrs:<span class="required"></span></th>
                                <th>
                                    <input type="text" id="MAINT_HRS_ELEC" name="MAINT_HRS_ELEC" value="<?php echo trim($row['MAINT_HRS_ELEC']);?>" autocomplete="off" placeholder="Maintenance (ELEC)Hrs" class="form-control">
                                </th>
                                <th>Breakdown (MECH)Hrs:<span class="required"></span></th>
                                <th>
                                    <input type="text" id="BREAK_HRS_MECH" name="BREAK_HRS_MECH" value="<?php echo trim($row['BREAK_HRS_MECH']);?>" autocomplete="off" placeholder="Breakdown (MECH)Hrs" class="form-control">
                                </th>
                                </tr>
                            <tr class="sect">
                                
                             
                                <th>Breakdown (ELEC)Hrs :<span class="required"></span></th>
                                <th>
                                    <input type="text" id="BREAK_HRS_ELEC" name="BREAK_HRS_ELEC" value="<?php echo trim($row['BREAK_HRS_ELEC']);?>" autocomplete="off" placeholder="Breakdown (ELEC)Hrs" class="form-control">
                                </th>
                                <th colspan="2">&nbsp;</th>
<!--                                    Working Hrs:<span class="required"></span></th>
                                <th>
                                    <input type="text" id="WORKING_HRS" name="WORKING_HRS" value="<?php echo trim($row['WORKING_HRS']);?>" autocomplete="off" placeholder="Working Hrs"  class="form-control">
                                </th>-->
                            </tr>
                            
                             
                            <tr>
                                <th colspan="4" style="text-align:center">
                                    <button type="button" name="save" data-id="hello" id="editCranes" class="btn btn-success" value="save"><i class="material-icons">edit</i> Update</button>
                                     <!--<button type="reset" name="Reset" class="btn btn-primary" value="reset"><i class="material-icons">replay</i> Reset</button>-->
                                </th>
                            </tr>

                        </thead>

                    </table>
                </form>
                </div>
            </div>
        </div>	


</div>
 <?php } ?>
<script>
   $(document).ready(function(){
    $("#editCranes").click(function(){
      $("#editCranes").html('<img src="<?php echo base_url();?>site/content/img/loading.gif" style="width:25px;height:20px;" />');
      $Month= $("#Month").val();
      $year= $("#year").val();
      $EQUIPMENT= $("#EQUIPMENT").val();
      //$MONTHLY_HRS= $("#MONTHLY_HRS").val();
      $MAINT_HRS_MECH= $("#MAINT_HRS_MECH").val();
      $MAINT_HRS_ELEC= $("#MAINT_HRS_ELEC").val();
      $BREAK_HRS_MECH= $("#BREAK_HRS_MECH").val();
      $BREAK_HRS_ELEC= $("#BREAK_HRS_ELEC").val();
//      $WORKING_HRS= $("#WORKING_HRS").val(); ,WORKING_HRS:$WORKING_HRS
      
      $.post('<?php echo base_url();?>gantryCranes/update/<?php echo $param2;?>', {  Month: $Month,year:$year,EQUIPMENT:$EQUIPMENT,MAINT_HRS_MECH:$MAINT_HRS_MECH,
          MAINT_HRS_ELEC:$MAINT_HRS_ELEC,BREAK_HRS_MECH:$BREAK_HRS_MECH,BREAK_HRS_ELEC:$BREAK_HRS_ELEC }, function(data){
          //alert(data);
                    if(data==1)
                          {                                  
                                $(".success_msg").html('<i class="material-icons">check_circle_outline</i> Gantry Cranes Data Updated Successfully');
                                $(".success_msg").show();
                                window.location.reload();
                                setTimeout(hidetab,4000);
                          }
                          else{
                                  $(".error_msg").html(data);
                                  $(".error_msg").show();
                                  setTimeout(hidetab,4000);
                                  $("#editCranes").html('<i class="material-icons">edit</i> Update');
                          }
		});      
    });
    $('#MAINT_HRS_MECH').keypress(function (event) {
            return isNumber(event, this);
        });
         $('#MAINT_HRS_ELEC').keypress(function (event) {
            return isNumber(event, this);
        });
         $('#BREAK_HRS_MECH').keypress(function (event) {
            return isNumber(event, this);
        });
         $('#BREAK_HRS_ELEC').keypress(function (event) {
            return isNumber(event, this);
        });
//         $('#WORKING_HRS').keypress(function (event) {
//            return isNumber(event, this);
//        });
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