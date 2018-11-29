<?php include 'includes/header.php';?>
<style>
    .card .card-content {
       padding: 30px 30px;
       border: 1px solid #9c27b069;
       box-shadow: 2px 2px 10px 5px #ddd;
}
.card{
    margin-top: 13%;
    width: 50%;
    margin-left: 25%;
}
.table>thead>tr>th{
    line-height: 25px;
    
}
.nm{
    font-size: 30px;
    font-weight: 600;
    color: #9c27b0;
}
</style>
<body style="background-color: #f5f5f5;">
    <div class="wrapper">
            
            
            <div class="content">
                <div class="container">
                    <div class="row">     
                                    <div class="card">                                      
                                        <div class="card-content">
                                             <form action="" method="POST" enctype="multipart/form-data">
                                                <table class="table form">                                                
                                                    <thead class="">

                                                        <tr>
                                                            <th colspan="2" style="text-align:center;">                                                            
                                                                <div class="nm"><i class="material-icons">lock_open</i>  SWPL LOGIN</div>                                                                 
                                                            </th>
                                                        </tr>
                                                         <tr>
                                                             <th colspan="2" style="text-align:center;">&nbsp;<small id="res" class="display-block"></small></th>
                                                        </tr>
                                                        <tr>
                                                            <th  style="line-height: 5.428571;"> 
                                                                Username:<span class="required">*</span>
                                                            </th>
                                                            <th  style="line-height: 5.428571;">
                                                                <div class="form-group">
                                                                <input type="text" id="username" name="username" autocomplete="off" placeholder="Username" class="form-control">
                                                                </div>
                                                            </th>
                                                        </tr>
                                                        <tr>
                                                            <th style="line-height: 5.428571;"> 
                                                               Password:<span class="required">*</span>
                                                            </th>
                                                            <th  style="line-height: 5.428571;">
                                                                <div class="form-group">
                                                                <input type="password" id="password" name="Password" autocomplete="off" placeholder="Password"  class="form-control">
                                                                </div>
                                                            </th>
                                                        </tr>
                                                        <tr>
                                                            <th colspan="2">&nbsp;<br></th>
                                                        </tr>

                                                        <tr>
                                                            <th colspan="4" style="text-align:center">
                                                                <button type="button" name="save" id="loginbtn" class="btn btn-success" value="save"><i class="material-icons">lock_open</i> Login</button>
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
                
            </div>
  
    </div>
</body>	
            
 <?php include 'includes/footer-min.php';?> 

<script type="text/javascript">
            $(document).ready(function() {
                 $('#password').keydown(function(event){    
            if(event.keyCode==13){
               $('#loginbtn').trigger('click');
            }
        });
                $('#loginbtn').click(function(){
                   // alert("hello");
                 $('#res').html("<img style='width:25px;height:25px;'  src='<?php echo base_url();?>site/content/img/loading.gif'>");
               $username = $('#username').val();
               $password = $('#password').val();
               if($username == '' || $password == '')
               {
                   //alert('Please enter all login details.');
                    $('#res').html("<span style='color:red;text-transform:capitalize;font-size:13px'>Enter login details..!</span>");
                   return false;
               }
//               $(this).attr('disabled','disabled');
               $.post('<?php echo base_url();?>Home/validateLogin',{ username:$username,password:$password},function(data){
                   //alert(data);
                  if(data==1) 
                  {	
                  	  $('#res').html("<span style='color:green;text-transform:capitalize;font-size:13px'>Login Success..!</span><br><img style='width:25px;height:25px;' src='<?php echo base_url();?>site/content/img/loading.gif'><br><span style='font-size:12px'>Redirecting.....</span>");
                   
                          window.location="<?php echo base_url();?>";
                  }else{
//                    
                      $('#res').html("<span style='color:red;text-transform:capitalize;font-size:14px'>"+data+"</span>");
                  }
               });
            });
            });
            
        </script>