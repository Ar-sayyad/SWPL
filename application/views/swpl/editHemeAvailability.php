<?php $data_info = $this->db->get_where('dbo.tblManualHEME_Availability', array('Sr_no' => $param2))->result_array();
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
                                        <option data-id="<?php echo trim($mon['FY_Order']);?>" value="<?php echo trim($mon['MonthName']);?>" <?php if(trim($row['Month'])==trim($mon['MonthName'])){ echo 'selected'; }else{ echo 'disabled'; } ?>><?php echo trim($mon['MonthName']);?></option>                                      
                                         <?php }?>  
                                    </select>
                                </th>

                                <th> Select Year :<span class="required">*</span></th>
                                <th>
                                    <select id="year" name="year" placeholder="year" required="" class="form-control">
                                        <option value="">---Select Year---</option>
                                        <option value="<?php echo $prev = (date('Y')-1);?>" <?php if(trim($row['Year'])== $prev){ echo 'selected'; }else{ echo 'disabled'; } ?>><?php echo date('Y')-1;?></option>
                                        <option value="<?php echo $curr = date('Y');?>" <?php if(trim($row['Year'])== $curr){ echo 'selected'; }else{ echo 'disabled'; } ?>><?php echo date('Y');?></option>
                                        <option value="<?php echo $post = date('Y')+1;?>" <?php if(trim($row['Year'])== $post){ echo 'selected'; }else{ echo 'disabled'; } ?>><?php echo date('Y')+1;?></option>
                                    </select>
                                </th>
                            </tr>
                           
                            <tr class="sect">
                                <th>Equipment :<span class="required">*</span></th>
                                <th>
                                    <input type="text" id="EQUIPMENT" name="EQUIPMENT" value="<?php echo trim($row['EQUIPMENT']);?>" readonly="" autocomplete="off" placeholder="EQUIPMENT" class="form-control">
                                </th>
                                
                                <th>Monthly Hrs:<span class="required"></span></th>
                                <th>
                                    <input type="text" id="MONTHLY_HRS" name="MONTHLY_HRS" value="<?php echo trim($row['MONTHLY_HRS']);?>" autocomplete="off" placeholder="Monthly Hrs"  class="form-control">
                                </th>
                            </tr>
                           
                             <tr class="sect2">
                                 <th>Planned Maintenance :<span class="required"></span></th>
                                <th>
                                    <input type="text" id="PLANNED_MAINTENANCE" name="PLANNED_MAINTENANCE" value="<?php echo trim($row['PLANNED_MAINTENANCE']);?>" autocomplete="off" placeholder="Planned Maintenance" class="form-control">
                                </th>
                                
                                <th>Breakdown Hrs:<span class="required"></span></th>
                                <th>
                                    <input type="text" id="BREAKDOWN_HRS" name="BREAKDOWN_HRS" value="<?php echo trim($row['BREAKDOWN_HRS']);?>" autocomplete="off" placeholder="Breakdown Hrs" class="form-control">
                                </th>
                            </tr>
                            <tr class="sect2">
                                 <th> Working Hrs:<span class="required"></span></th>
                                  <th>
                                    <input type="text" id="WORKING_HRS" name="WORKING_HRS" value="<?php echo trim($row['WORKING_HRS']);?>" autocomplete="off" placeholder="Working Hrs" class="form-control">
                                </th>
                                <th colspan="2">&nbsp; </th>
                             </tr>
                            
                             
                            <tr>
                                <th colspan="4" style="text-align:center">
                                    <button type="button" name="save" data-id="hello" id="editHemeAvail" class="btn btn-success" value="save"><i class="material-icons">edit</i> Update</button>
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
    $("#editHemeAvail").click(function(){
      $("#editHemeAvail").html('<img src="<?php echo base_url();?>site/content/img/loading.gif" style="width:25px;height:20px;" />');
      $Month= $("#Month").val();
      $year= $("#year").val();
      $MONTHLY_HRS= $("#MONTHLY_HRS").val();
      $PLANNED_MAINTENANCE= $("#PLANNED_MAINTENANCE").val();
      $BREAKDOWN_HRS= $("#BREAKDOWN_HRS").val();
      $WORKING_HRS= $("#WORKING_HRS").val();
      
      $.post('<?php echo base_url();?>heme/updateAvailability/<?php echo $param2;?>', { Month: $Month,year:$year,MONTHLY_HRS:$MONTHLY_HRS,
          PLANNED_MAINTENANCE:$PLANNED_MAINTENANCE,BREAKDOWN_HRS:$BREAKDOWN_HRS, WORKING_HRS:$WORKING_HRS}, function(data){
          //alert(data);
                    if(data==1)
                          {                                  
                                $(".success_msg").html('<i class="material-icons">check_circle_outline</i> HEME Availability Data Updated Successfully');
                                $(".success_msg").show();
                                window.location.reload();
                                setTimeout(hidetab,4000);
                          }
                          else{
                                  $(".error_msg").html(data);
                                  $(".error_msg").show();
                                  setTimeout(hidetab,4000);
                                  $("#editHemeAvail").html('<i class="material-icons">edit</i> Update');
                          }
		});
    });
     $('#MONTHLY_HRS').keypress(function (event) {
            return isNumber(event, this);
        });
         $('#PLANNED_MAINTENANCE').keypress(function (event) {
            return isNumber(event, this);
        });
         $('#BREAKDOWN_HRS').keypress(function (event) {
            return isNumber(event, this);
        });
         $('#WORKING_HRS').keypress(function (event) {
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