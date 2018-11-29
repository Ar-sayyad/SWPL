<?php $data_info = $this->db->get_where('dbo.tblManualTerminalMaint', array('Sr_No' => $param2))->result_array();
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
                                <th>Group Description:<span class="required"></span></th>
                                <th>
                                    <input type="text" id="Group_Desc" name="Group_Desc" value="<?php echo trim($row['Group_Desc']);?>" readonly="" autocomplete="off" placeholder="Group Description" class="form-control">
                                </th>
                                
                                <th>Description:<span class="required"></span></th>
                                <th>
                                    <input type="text" id="Description" name="Description" value="<?php echo trim($row['Description']);?>" readonly="" autocomplete="off" placeholder="Description"  class="form-control">
                                </th>
                            </tr>
                           
                             <tr class="sect2">
                                 <th>Revenue :<span class="required"></span></th>
                                <th>
                                    <input type="text" id="Revenue" name="Revenue" value="<?php echo trim($row['Revenue']);?>" autocomplete="off" placeholder="Revenue" class="form-control">
                                </th>
                                 <th>JSW IL :<span class="required"></span></th>
                                <th>
                                    <input type="text" id="JSWIL_Value" name="JSWIL_Value" value="<?php echo trim($row['JSWIL_Value']);?>" autocomplete="off" placeholder="JSW IL" class="form-control">
                                </th>
                             </tr>
                            
                             
                            <tr>
                                <th colspan="4" style="text-align:center">
                                    <button type="button" name="save" data-id="hello" id="editTermainal" class="btn btn-success" value="save"><i class="material-icons">edit</i> Update</button>
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
    $("#editTermainal").click(function(){
      $("#editTermainal").html('<img src="<?php echo base_url();?>site/content/img/loading.gif" style="width:25px;height:20px;" />');
      $Month= $("#Month").val();
      $year= $("#year").val();
      $Group_Desc= $("#Group_Desc").val();
      $Description= $("#Description").val();
      $Revenue= $("#Revenue").val();
      $JSWIL_Value= $("#JSWIL_Value").val();
      $.post('<?php echo base_url();?>terminalMaint/update/<?php echo $param2;?>', { Month: $Month,year:$year,Group_Desc:$Group_Desc,
          Description:$Description,Revenue:$Revenue,JSWIL_Value:$JSWIL_Value }, function(data){
          //alert(data);
                    if(data==1)
                          {                                  
                                $(".success_msg").html('<i class="material-icons">check_circle_outline</i> Termainal Maint Data Updated Successfully');
                                $(".success_msg").show();
                                window.location.reload();
                                setTimeout(hidetab,4000);
                          }
                          else{
                                  $(".error_msg").html(data);
                                  $(".error_msg").show();
                                  setTimeout(hidetab,4000);
                                  $("#editTermainal").html('<i class="material-icons">edit</i> Update');
                          }
		});      
    });
     $('#Revenue').keypress(function (event) {
            return isNumber(event, this);
        });
         $('#JSWIL_Value').keypress(function (event) {
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