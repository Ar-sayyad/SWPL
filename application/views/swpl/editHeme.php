<?php $data_info = $this->db->get_where('dbo.tblManualHEME', array('Sr_no' => $param2))->result_array();
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
                                <th>Diesel Qty Issued :<span class="required"></span></th>
                                <th>
                                    <input type="text" id="Diesel_Qty_Issued" name="Diesel_Qty_Issued" value="<?php echo trim($row['Diesel_Qty_Issued']);?>" autocomplete="off" placeholder="Diesel Qty Issued" class="form-control">
                                </th>
                                
                                <th>Opening Balance:<span class="required"></span></th>
                                <th>
                                    <input type="text" id="Opening_Balance" name="Opening_Balance" value="<?php echo trim($row['Opening_Balance']);?>" autocomplete="off" placeholder="Opening Balance"  class="form-control">
                                </th>
                            </tr>
                           
                             <tr class="sect2">
                                 <th>Diesel Filled :<span class="required"></span></th>
                                <th>
                                    <input type="text" id="Diesel_filled" name="Diesel_filled" value="<?php echo trim($row['Diesel_filled']);?>" autocomplete="off" placeholder="Diesel Filled" class="form-control">
                                </th>
                                
                                <th colspan="2">&nbsp; </th>
                             </tr>
                            
                             
                            <tr>
                                <th colspan="4" style="text-align:center">
                                    <button type="button" name="save" data-id="hello" id="editHeme" class="btn btn-success" value="save"><i class="material-icons">edit</i> Update</button>
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
    $("#editHeme").click(function(){
      $("#editHeme").html('<img src="<?php echo base_url();?>site/content/img/loading.gif" style="width:25px;height:20px;" />');
      $Month= $("#Month").val();
      $year= $("#year").val();
      $Diesel_Qty_Issued= $("#Diesel_Qty_Issued").val();
      $Opening_Balance= $("#Opening_Balance").val();
      $Diesel_filled= $("#Diesel_filled").val();
      
      $.post('<?php echo base_url();?>heme/updateHeme/<?php echo $param2;?>', { Month: $Month,year:$year,Diesel_Qty_Issued:$Diesel_Qty_Issued,
          Opening_Balance:$Opening_Balance,Diesel_filled:$Diesel_filled }, function(data){
          //alert(data);
                    if(data==1)
                          {                                  
                                $(".success_msg").html('<i class="material-icons">check_circle_outline</i> HEME Data Updated Successfully');
                                $(".success_msg").show();
                                window.location.reload();
                                setTimeout(hidetab,4000);
                          }
                          else{
                                  $(".error_msg").html(data);
                                  $(".error_msg").show();
                                  setTimeout(hidetab,4000);
                                  $("#editHeme").html('<i class="material-icons">edit</i> Update');
                          }
		});
      
    });
});
</script>