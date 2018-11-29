<style>
   
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
                                MANUAL MHC AVAILABILITY
                            </th>
                        </tr>
                            <tr class="sect">
                                <th colspan="4">
                                    <table class="table table-striped table-bordered" id="myData">
                                    <thead class="">
                                        <tr style="background-color:#eee">
                                            <th style="width:10% !important">
                                                SR.
                                            </th>
                                            <th style="width:30% !important">
                                                NAME OF VESSEL
                                            </th>
                                            <th style="width:20% !important">
                                                E-Drive hrs clocked
                                            </th>
                                            <th style="width:20%">
                                               Diesel Consumption(ltrs)
                                            </th>
                                            <th style="width:20%">
                                               Crane Name
                                            </th>                                           
                                        </tr>
                                   </thead>
                                   <tbody>
<!--                                        <tr style="">
                                            <th style="width:10% !important">
                                             
                                            </th>
                                        <th>
                                            <input type="text" id="Van_ID" name="Van_ID" value="" autocomplete="off" class="frmdata Van_ID">
                                       
                                        </th>
                                        <td>
                                            <input type="text" id="E_DriveHrs" name="E_DriveHrs"  autocomplete="off"  class="frmdata E_DriveHrs">
                                        </td>
                                        <td>
                                             <input type="text" id="Diesel_Consumption" name="Diesel_Consumption"  autocomplete="off" class="frmdata Diesel_Consumption">
                                        </td>
                                        <td>
                                             <input type="text" id="Crane_Name" name="Crane_Name"  autocomplete="off" class="frmdata Crane_Name">
                                        </td>
                                    </tr>-->
                                </tbody>
                                </table> 
                                    </th>
                                
                            </tr>
                                                     
                            <tr>
                                <th colspan="4" style="text-align:center">
                                    <button type="button" name="save" data-id="hello" id="saveConsumption" class="btn btn-success" value="save"><i class="material-icons">save</i> Save</button>
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
     function isNumber(evt, element) {
        var charCode = (evt.which) ? evt.which : event.keyCode;
       // alert(charCode);
        if (
            (charCode !== 45 || $(element).val().indexOf('-') !== -1) &&      
            (charCode !== 46 || $(element).val().indexOf('.') !== -1) &&      
            (charCode < 48 || charCode > 57)){
                $(".error_msg").html('Characters Not Allowed..!');
                $(".error_msg").show();
                //$(element).val('');
                setTimeout(hidetab,2000);
            return false;
        }

        return true;
    }
    $(document).ready(function(){ 
     
       $("#Month").change(function(){
            getData();
       });
        $("#year").change(function(){
            getData();
       });
       function getData(){
         $monthid= $("#Month").find('option:selected').attr('data-id');
         $year= $("#year").val();
          if($monthid =='' || $year ==''){
               //alert('Select all fields..!');               
            }else{
               $("#myData").html('<img src="<?php echo base_url();?>site/content/img/loading.gif" style="width:25px;height:20px;" />');
          $.post('<?php echo base_url();?>mhcConsumption/getData/'+$monthid+'/'+$year, {  }, function(data){ 
             $('#myData').html(data);                
             
});
        
            }
            }
      
    $("#saveConsumption").click(function(){
      $("#saveConsumption").html('<img src="<?php echo base_url();?>site/content/img/loading.gif" style="width:25px;height:20px;" />');
      $Month= $("#Month").val();
      $year= $("#year").val();
      
        $Van_ID = new Array();
        $(".Van_ID").each(function() {
           $Van_ID.push($(this).val());
        });
         $VCN_NO= new Array();
        $(".VCN_NO").each(function() {
           $VCN_NO.push($(this).val());
        });
        
         $Vessel_Name = new Array();
        $(".Vessel_Name").each(function() {
           $Vessel_Name.push($(this).val());
        });
         $E_DriveHrs = new Array();
        $(".E_DriveHrs").each(function() {
           $E_DriveHrs.push($(this).val());
        });
          $Diesel_Consumption= new Array();
        $(".Diesel_Consumption").each(function() {
           $Diesel_Consumption.push($(this).val());
        });
        $Crane_Name = new Array();
        $(".Crane_Name").each(function() {
           $Crane_Name.push($(this).val());
        });  
           
      $.post('<?php echo base_url();?>mhcConsumption/save', { Month: $Month,year:$year,Van_ID:$Van_ID,VCN_NO:$VCN_NO,Vessel_Name:$Vessel_Name,E_DriveHrs:$E_DriveHrs,
          Diesel_Consumption:$Diesel_Consumption,Crane_Name:$Crane_Name }, function(data){
          //alert(data);
                    if(data==1)
                          {                                  
                                $(".success_msg").html('<i class="material-icons">check_circle_outline</i> MHC Consumption Data Added Successfully');
                                $(".success_msg").show();
                                window.location.reload();
                                setTimeout(hidetab,4000);
                          }
                          else{
                                  $(".error_msg").html(data);
                                  $(".error_msg").show();
                                  setTimeout(hidetab,4000);
                                  $("#saveConsumption").html('<i class="material-icons">save</i> Save');
                          }
		});      
    });
    
      $('.E_DriveHrs').keypress(function (event) {
            return isNumber(event, this);
        });
         $('.Diesel_Consumption').keypress(function (event) {
            return isNumber(event, this);
        });
  
});
</script>