<?php $data_info = $this->db->get_where('dbo.tblManualGantryCranesHours', array('Sr_No' => $param2))->result_array();
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
                                
                                <th>HOISTING OPEN HRS:<span class="required"></span></th>
                                <th>
                                    <input type="text" id="HOISTING_OPEN" name="HOISTING_OPEN" value="<?php echo trim($row['HOISTING_OPEN']);?>" autocomplete="off" placeholder="HOISTING OPEN HRS"  class="form-control">
                                </th>
                                </tr>
                           
                             <tr class="sect2">                               
                            
                                 <th>HOISTING CLOSING HRS:<span class="required"></span></th>
                                <th>
                                    <input type="text" id="HOISTING_CLOSING" name="HOISTING_CLOSING" value="<?php echo trim($row['HOISTING_CLOSING']);?>" autocomplete="off" placeholder="HOISTING CLOSING HRS" class="form-control">
                                </th>
                                <th>CT & LT OPEN HRS:<span class="required"></span></th>
                                <th>
                                    <input type="text" id="CTLT_OPEN" name="CTLT_OPEN" value="<?php echo trim($row['CTLT_OPEN']);?>" autocomplete="off" placeholder="CT & LT OPEN HRS" class="form-control">
                                </th>
                                </tr>
                            <tr class="sect">
                                
                             
                                <th>CT & LT CLOSING HRS:<span class="required"></span></th>
                                <th>
                                    <input type="text" id="CTLT_CLOSING" name="CTLT_CLOSING" value="<?php echo trim($row['CTLT_CLOSING']);?>" autocomplete="off" placeholder="CT & LT CLOSING HRS" class="form-control">
                                </th>
                                <th colspan="2">&nbsp;</th>
                            
                             
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
      $HOISTING_OPEN= $("#HOISTING_OPEN").val();
      $HOISTING_CLOSING= $("#HOISTING_CLOSING").val();
      $CTLT_OPEN= $("#CTLT_OPEN").val();
      $CTLT_CLOSING= $("#CTLT_CLOSING").val();
      
      $.post('<?php echo base_url();?>gantryCranes/updateHrs/<?php echo $param2;?>', {  Month: $Month,year:$year,EQUIPMENT:$EQUIPMENT,HOISTING_OPEN:$HOISTING_OPEN,
          HOISTING_CLOSING:$HOISTING_CLOSING,CTLT_OPEN:$CTLT_OPEN,CTLT_CLOSING:$CTLT_CLOSING }, function(data){
          //alert(data);
                    if(data==1)
                          {                                  
                                $(".success_msg").html('<i class="material-icons">check_circle_outline</i> Gantry Cranes Hrs Data Updated Successfully');
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
    $('#HOISTING_OPEN').keypress(function (event) {
            return isNumber(event, this);
        });
         $('#HOISTING_CLOSING').keypress(function (event) {
            return isNumber(event, this);
        });
         $('#CTLT_OPEN').keypress(function (event) {
            return isNumber(event, this);
        });
         $('#CTLT_CLOSING').keypress(function (event) {
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