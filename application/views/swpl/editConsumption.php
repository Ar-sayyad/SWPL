<?php $data_info = $this->db->get_where('dbo.tblManualMHCAvailability', array('Sr_no' => $param2))->result_array();
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
                           
                            <tr class="">
                                <th>Vessel Name :<span class="required"></span></th>
                                <th>
                                    <input type="text" id="Vessel_Name" name="Vessel_Name" value="<?php echo trim($row['Vessel_Name']);?>" readonly="" autocomplete="off" placeholder="Vessel Name" class="form-control">
                                </th>
                                
                                <th> E-Drive hrs clocked :<span class="required"></span></th>
                                <th>
                                    <input type="text" id="E_DriveHrs" name="E_DriveHrs" value="<?php echo trim($row['E_DriveHrs']);?>" autocomplete="off" placeholder=" E-Drive hrs clocked" class="form-control">
                                </th>
                                </tr>
                           
                             <tr class="">
                                <th>Diesel Consumption(ltrs):<span class="required"></span></th>
                                <th>
                                    <input type="text" id="Diesel_Consumption" name="Diesel_Consumption" value="<?php echo trim($row['Diesel_Consumption']);?>" autocomplete="off" placeholder="Diesel Consumption(ltrs)"  class="form-control">
                                </th>
                            
                                 <th>Crane Name:<span class="required"></span></th>
                                <th>
                                    <input type="text" id="Crane_Name" name="Crane_Name" value="<?php echo trim($row['Crane_Name']);?>" autocomplete="off" placeholder="Crane Name" class="form-control">
                                </th>
                                </tr>
                            
                             
                            <tr>
                                <th colspan="4" style="text-align:center">
                                    <button type="button" name="save" data-id="hello" id="editConsumption" class="btn btn-success" value="save"><i class="material-icons">edit</i> Update</button>
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
    $("#editConsumption").click(function(){
      $("#editConsumption").html('<img src="<?php echo base_url();?>site/content/img/loading.gif" style="width:25px;height:20px;" />');
      $Month= $("#Month").val();
      $year= $("#year").val();
      $E_DriveHrs= $("#E_DriveHrs").val();
      $Diesel_Consumption= $("#Diesel_Consumption").val();
      $Crane_Name= $("#Crane_Name").val();
      
      $.post('<?php echo base_url();?>mhcConsumption/update/<?php echo $param2;?>', { Month: $Month,year:$year,E_DriveHrs:$E_DriveHrs,
          Diesel_Consumption:$Diesel_Consumption,Crane_Name:$Crane_Name }, function(data){
          //alert(data);
                    if(data==1)
                          {                                  
                                $(".success_msg").html('<i class="material-icons">check_circle_outline</i> MHC Consumption Data Updated Successfully');
                                $(".success_msg").show();
                                window.location.reload();
                                setTimeout(hidetab,4000);
                          }
                          else{
                                  $(".error_msg").html(data);
                                  $(".error_msg").show();
                                  setTimeout(hidetab,4000);
                                  $("#editConsumption").html('<i class="material-icons">save</i> Update');
                          }
		});      
    });
     $('#E_DriveHrs').keypress(function (event) {
            return isNumber(event, this);
        });
         $('#Diesel_Consumption').keypress(function (event) {
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