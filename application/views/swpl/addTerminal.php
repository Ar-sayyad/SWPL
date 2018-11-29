<style>
    .modal-dialog{
       width: 1350px !important;
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
                            <th colspan="4" class="sect2" style="color: #751b85;">
                                TERMINAL MAINT
                            </th>
                        </tr>
                            <tr class="sect">
                                <th colspan="4">
                                <table class="table table-striped table-bordered">
                                    <thead class="">
                                        <tr>
                                            <th colspan="2">
                                                BUDGETED FUEL COST-Rs/ MT  
                                                <input type="hidden" id="Group_Desc" name="Group_Desc" value="BUDGETED FUEL COST-Rs/ MT" autocomplete="off" class="frmdata Group_Desc">
                                            </th>
                                            <input type="hidden" id="Description" name="Description" value="BUDGETED"  class="frmdata Description">
                                            <th colspan="">
                                                <input type="text" id="Revenue" name="Revenue"  autocomplete="off" placeholder="Revenue"  class="frmdata Revenue">
                                                 <input type="hidden" id="JSWIL_Value" name="JSWIL_Value" value="0"  autocomplete="off" placeholder="JSW IL"  class="frmdata JSWIL_Value">
                                            </th> 
                                             <th colspan="2">
                                                BUDGETED DIESEL COST FOR YEAR (Rs.) 
                                                <input type="hidden" id="Group_Desc" name="Group_Desc" value="BUDGETED DIESEL COST FOR YEAR (Rs.)" autocomplete="off" class="frmdata Group_Desc">
                                            </th>
                                            <input type="hidden" id="Description" name="Description" value="BUDGETED DIESEL COST FOR YEAR (Rs.)"  class="frmdata Description">
                                            <th colspan="">
                                                <input type="text" id="Revenue" name="Revenue"  autocomplete="off" placeholder="Revenue"  class="frmdata Revenue">
                                                 <input type="hidden" id="JSWIL_Value" name="JSWIL_Value" value="0"  autocomplete="off" placeholder="JSW IL"  class="frmdata JSWIL_Value">
                                            </th> 
                                        </tr>
                                        <tr>
                                            <th colspan="2">
                                                AVERAGE DIESEL COST Rs/Ltr 
                                                <input type="hidden" id="Group_Desc" name="Group_Desc" value=" AVERAGE DIESEL COST Rs/Ltr" autocomplete="off" class="frmdata Group_Desc">
                                            </th>
                                            <input type="hidden" id="Description" name="Description" value=" AVERAGE DIESEL COST Rs/Ltr"  class="frmdata Description">
                                            <th colspan="1">
                                                <input type="text" id="Revenue" name="Revenue"  autocomplete="off" placeholder="Revenue"  class="frmdata Revenue">
                                                <input type="hidden" id="JSWIL_Value" name="JSWIL_Value" value="0"  autocomplete="off" placeholder="JSW IL"  class="frmdata JSWIL_Value">
                                            </th>
                                            
                                        </tr>
                                        <tr  class="sect">
                                            <th colspan="3">
                                                <b>LOCAL PURCHASES & REPAIRS</b>
                                            </th>
                                            <th colspan="3">
                                                <b>OTHER SERVICES (AMC,WO,etc)</b>
                                            </th>
                                        </tr>
                                        <tr>
                                            <th colspan="3">
                                                <table class="table table-striped table-bordered">
                                                    <thead class="">
                                                    <tr>
                                                        <th style="width:10% !important">
                                                            SR.
                                                        </th>
                                                        <th style="width:50% !important">
                                                            Description
                                                        </th>
                                                        <th style="width:20% !important">
                                                           Revenue
                                                        </th>  
                                                        <th style="width:20% !important">
                                                           JSW IL
                                                        </th> 
                                                    </tr>
                                                    
                                                <?php $cond = array('Group_Desc' => 'LOCAL PURCHASES & REPAIRS');
                                                        $exist = $this->swpl_model->check_data_info('tbl_TerminalRef',$cond);
                                                         $sr=1;  foreach($exist as $eqp){?> 
                                                    <tr style="background-color:<?php echo trim($eqp['COLOR']);?>">

                                                        <th style="width:10% !important">
                                                            <?php echo $sr;?>
                                                        </th>

                                                    <th>
                                                         <input type="hidden" id="Group_Desc" name="Group_Desc" value="<?php echo trim($eqp['Group_Desc']);?>" autocomplete="off" class="frmdata Group_Desc">
                                                         <?php echo trim($eqp['Description']);?>
                                                         <input type="hidden" id="Description" name="Description" value="<?php echo trim($eqp['Description']);?>"  class="frmdata Description">
                                                    </th>
                                                    <td>
                                                        <input type="text" id="Revenue" name="Revenue"  style="background-color:<?php echo trim($eqp['COLOR']);?>"  autocomplete="off"  class="frmdata Revenue">
                                                    </td>
                                                     <td>
                                                        <input type="text" id="JSWIL_Value" name="JSWIL_Value"  style="background-color:<?php echo trim($eqp['COLOR']);?>"  autocomplete="off"  class="frmdata JSWIL_Value">
                                                    </td>
                                                </tr>
                                                <?php $sr++; } ?>
                                                </thead>
                                                </table>
                                                </th>
                                    
                                    <th colspan="3">
                                                <table class="table table-striped table-bordered">
                                                     <thead class="">
                                                     <tr>
                                                        <th style="width:10% !important">
                                                            SR.
                                                        </th>
                                                        <th style="width:50% !important">
                                                            Description
                                                        </th>
                                                        <th style="width:20% !important">
                                                           Revenue
                                                        </th>  
                                                        <th style="width:20% !important">
                                                           JSW IL
                                                        </th>  
                                                    </tr>
                                    <?php $cond = array('Group_Desc' => 'OTHER SERVICES');
                                            $exist = $this->swpl_model->check_data_info('tbl_TerminalRef',$cond);
                                             $sr=1;  foreach($exist as $eqp){?> 
                                        <tr style="background-color:<?php echo trim($eqp['COLOR']);?>">
                                      
                                            <th style="width:10% !important">
                                                <?php echo $sr;?>
                                            </th>
                                     
                                        <th>
                                             <input type="hidden" id="Group_Desc" name="Group_Desc" value="<?php echo trim($eqp['Group_Desc']);?>" autocomplete="off" class="frmdata Group_Desc">
                                             <?php echo trim($eqp['Description']);?>
                                             <input type="hidden" id="Description" name="Description" value="<?php echo trim($eqp['Description']);?>"  class="frmdata Description">
                                        </th>
                                        <td>
                                            <input type="text" id="Revenue" name="Revenue"  style="background-color:<?php echo trim($eqp['COLOR']);?>"  autocomplete="off"  class="frmdata Revenue">
                                        </td>
                                         <td>
                                            <input type="text" id="JSWIL_Value" name="JSWIL_Value"  style="background-color:<?php echo trim($eqp['COLOR']);?>"  autocomplete="off"  class="frmdata JSWIL_Value">
                                        </td>
                                       
                                    </tr>
                                    <?php $sr++; } ?>
                                                     </thead>
                                                </table>
                                    </th>
                                        </tr>
                                </thead>
                                </table> 
                                    </th>
                                
                            </tr>
                                                     
                            <tr>
                                <th colspan="4" style="text-align:center">
                                    <button type="button" name="save" data-id="hello" id="saveTerminal" class="btn btn-success" value="save"><i class="material-icons">save</i> Save</button>
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
    $("#saveTerminal").click(function(){
      $("#saveTerminal").html('<img src="<?php echo base_url();?>site/content/img/loading.gif" style="width:25px;height:20px;" />');
      $Month= $("#Month").val();
      $year= $("#year").val();
      
        $Group_Desc = new Array();
        $(".Group_Desc").each(function() {
           $Group_Desc.push($(this).val());
        });
         $Description= new Array();
        $(".Description").each(function() {
           $Description.push($(this).val());
        });
         $Revenue = new Array();
        $(".Revenue").each(function() {
           $Revenue.push($(this).val());
        });
         $JSWIL_Value = new Array();
        $(".JSWIL_Value").each(function() {
           $JSWIL_Value.push($(this).val());
        });
        
                          
           
      $.post('<?php echo base_url();?>terminalMaint/save', { Month: $Month,year:$year,Group_Desc:$Group_Desc,Description:$Description,Revenue:$Revenue,JSWIL_Value:$JSWIL_Value }, function(data){
          //alert(data);
                    if(data==1)
                          {                                  
                                $(".success_msg").html('<i class="material-icons">check_circle_outline</i> Terminal Maint Data Added Successfully');
                                $(".success_msg").show();
                                window.location.reload();
                                setTimeout(hidetab,4000);
                          }
                          else{
                                  $(".error_msg").html(data);
                                  $(".error_msg").show();
                                  setTimeout(hidetab,4000);
                                  $("#saveTerminal").html('<i class="material-icons">save</i> Save');
                          }
		});      
    });
    
     $('.Revenue').keypress(function (event) {
            return isNumber(event, this);
        });
        $('.JSWIL_Value').keypress(function (event) {
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