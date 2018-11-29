<?php $data_info = $this->db->get_where('dbo.tblManualHEME_Diesel', array('Sr_No' => $param2))->result_array();
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
                                <th>EQPT Type :<span class="required">*</span></th>
                                <th>
                                    <input type="text" id="EQPT_Type" name="EQPT_Type" value="<?php echo trim($row['EQPT_Type']);?>" readonly="" autocomplete="off" placeholder="EQPT Type" class="form-control">
                                </th>
                                
                                <th>EQPT Model No:<span class="required">*</span></th>
                                <th>
                                    <input type="text" id="EQPT_Model_Number" name="EQPT_Model_Number" value="<?php echo trim($row['EQPT_Model_Number']);?>" readonly="" autocomplete="off" placeholder="EQPT Model No"  class="form-control">
                                </th>
                            </tr>
                           
                             <tr class="sect2">
                                 <th>Diesel Consumption :<span class="required"></span></th>
                                <th>
                                    <input type="text" id="Diesel_Consumption" name="Diesel_Consumption" value="<?php echo trim($row['Diesel_Consumption']);?>" autocomplete="off" placeholder="Diesel Consumption" class="form-control">
                                </th>
                                
                                <th>Tank Stock:<span class="required"></span></th>
                                <th>
                                    <input type="text" id="Tank_stock_month_end" name="Tank_stock_month_end" value="<?php echo trim($row['Tank_stock_month_end']);?>" autocomplete="off" placeholder="Tank Stock" class="form-control">
                                </th>
                            </tr>
                            <tr class="sect2">
                                 <th> Engine Hrs Initial:<span class="required"></span></th>
                                  <th>
                                    <input type="text" id="Engine_Hrs_Initial" name="Engine_Hrs_Initial" value="<?php echo trim($row['Engine_Hrs_Initial']);?>" autocomplete="off" placeholder="Engine Hrs Initial" class="form-control">
                                </th>
                                <th> Engine Hrs Final :<span class="required"></span></th>
                                  <th>
                                    <input type="text" id="Engine_Hrs_Final" name="Engine_Hrs_Final" value="<?php echo trim($row['Engine_Hrs_Final']);?>" autocomplete="off" placeholder="Engine Hrs Final" class="form-control">
                                </th>
                             </tr>
                             <tr class="sect2">
                                 <th> Remarks:<span class="required"></span></th>
                                  <th>
                                    <input type="text" id="Remarks" name="Remarks" value="<?php echo trim($row['Remarks']);?>" autocomplete="off" placeholder="Remarks" class="form-control">
                                </th>
                                <th>Benchmark :<span class="required"></span></th>
                                  <th>
                                    <input type="text" id="Benchmark" name="Benchmark" value="<?php echo trim($row['Benchmark']);?>" autocomplete="off" placeholder="Benchmark" class="form-control">
                                </th>
                             </tr>
                             
                            <tr>
                                <th colspan="4" style="text-align:center">
                                    <button type="button" name="save" data-id="hello" id="editHemeDiesel" class="btn btn-success" value="save"><i class="material-icons">edit</i> Update</button>
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
    $("#editHemeDiesel").click(function(){
      $("#editHemeDiesel").html('<img src="<?php echo base_url();?>site/content/img/loading.gif" style="width:25px;height:20px;" />');
      $Month= $("#Month").val();
      $year= $("#year").val();
      $Diesel_Consumption= $("#Diesel_Consumption").val();
      $Tank_stock_month_end= $("#Tank_stock_month_end").val();
      $Engine_Hrs_Initial= $("#Engine_Hrs_Initial").val();
      $Engine_Hrs_Final= $("#Engine_Hrs_Final").val();
      $Remarks= $("#Remarks").val();
      $Benchmark= $("#Benchmark").val();
      
      $.post('<?php echo base_url();?>heme/updateDiesel/<?php echo $param2;?>', { Month: $Month,year:$year,Diesel_Consumption:$Diesel_Consumption,
          Tank_stock_month_end:$Tank_stock_month_end,Engine_Hrs_Initial:$Engine_Hrs_Initial,
          Engine_Hrs_Final:$Engine_Hrs_Final,Remarks:$Remarks,Benchmark:$Benchmark}, function(data){
          //alert(data);
                    if(data==1)
                          {                                  
                                $(".success_msg").html('<i class="material-icons">check_circle_outline</i> HEME Diesel Updated Successfully');
                                $(".success_msg").show();
                                window.location.reload();
                                setTimeout(hidetab,4000);
                          }
                          else{
                                  $(".error_msg").html(data);
                                  $(".error_msg").show();
                                  setTimeout(hidetab,4000);
                                  $("#editHemeDiesel").html('<i class="material-icons">edit</i> Update');
                          }
		});      
    });
        $('#Diesel_Consumption').keypress(function (event) {
            return isNumber(event, this);
        }); 
        $('#Tank_stock_month_end').keypress(function (event) {
            return isNumber(event, this);
        });
         $('#Engine_Hrs_Initial').keypress(function (event) {
            return isNumber(event, this);
        });
         $('#Engine_Hrs_Final').keypress(function (event) {
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