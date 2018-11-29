<style>
    .modal-dialog{
       width: 1000px !important;
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
                                MIS BUDGET
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
                                            <th style="width:40% !important">
                                                Description
                                            </th>
                                            <th style="width:20% !important">
                                               UOM
                                            </th>
                                            <th style="width:30%">
                                               Budget
                                            </th>
                                           
                                        </tr>
                                    <?php $exist = $this->swpl_model->select_data_info('tbl_budgetReq');
                                             $sr=1;  foreach($exist as $eqp){?> 
                                        <tr style="background-color:<?php echo trim($eqp['COLOR']);?>">
                                      
                                            <th style="width:10% !important">
                                                <?php echo $sr;?>
                                            </th>
                                        <th>
                                             <?php echo trim($eqp['Name']);?>
                                            <input type="hidden" id="Name" name="Name" value="<?php echo trim($eqp['Name']);?>" autocomplete="off" class="frmdata Name">
                                        </th>
                                        <th>
                                             <?php echo trim($eqp['UOM']);?>
                                             <input type="hidden" id="UOM" name="UOM" value="<?php echo trim($eqp['UOM']);?>"  class="frmdata UOM">
                                        </th>
                                        <td>
                                            <input type="text" id="Budget" name="Budget"  style="background-color:<?php echo trim($eqp['COLOR']);?>"  autocomplete="off"  class="frmdata Budget">
                                        </td>
                                       
                                    </tr>
                                    <?php $sr++; } ?>
                                </thead>
                                </table> 
                                    </th>
                                
                            </tr>
                                                     
                            <tr>
                                <th colspan="4" style="text-align:center">
                                    <button type="button" name="save" data-id="hello" id="saveBudget" class="btn btn-success" value="save"><i class="material-icons">save</i> Save</button>
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
    $("#saveBudget").click(function(){
      $("#saveBudget").html('<img src="<?php echo base_url();?>site/content/img/loading.gif" style="width:25px;height:20px;" />');
      $Month= $("#Month").val();
      $year= $("#year").val();      
        $Name = new Array();
        $(".Name").each(function() {
           $Name.push($(this).val());
        });
         $UOM= new Array();
        $(".UOM").each(function() {
           $UOM.push($(this).val());
        });
         $Budget = new Array();
        $(".Budget").each(function() {
           $Budget.push($(this).val());
        });                         
           
      $.post('<?php echo base_url();?>budget/save', { Month: $Month,year:$year,Name:$Name,UOM:$UOM,Budget:$Budget }, function(data){
          //alert(data);
                    if(data==1)
                          {                                  
                                $(".success_msg").html('<i class="material-icons">check_circle_outline</i> Budget Data Added Successfully');
                                $(".success_msg").show();
                                window.location.reload();
                                setTimeout(hidetab,4000);
                          }
                          else{
                                  $(".error_msg").html(data);
                                  $(".error_msg").show();
                                  setTimeout(hidetab,4000);
                                  $("#saveBudget").html('<i class="material-icons">save</i> Save');
                          }
		});
      
    });
    $('.Budget').keypress(function (event) {
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