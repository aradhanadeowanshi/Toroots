<?php 
session_start();

if($_SESSION["userId"]) 
    { 
include 'inc/config.php'; $template['header_link'] = 'FORMS'; ?>
<?php include 'inc/template_start.php'; ?>
<?php include 'inc/page_head.php'; 
include 'inc/mydbconfig.php';
?>


<input type="text" id="userid" name="userid" hidden value="<?php echo  $_SESSION["userId"];?>">
<!-- Page content -->
<div id="page-content">
    <!-- Validation Header -->
    <div class="content-header">
        <div class="row">
            <div class="col-sm-6">
                <div class="header-section">
                    <h1>Add New Biggest City</h1>
                </div>
            </div>
           
        </div>
    </div>
    <!-- END Validation Header -->
<div class="row">
    
     <!-- Total states -->
                            <div class="col-sm-6 col-md-3 col-xs-12 ">
                                <a href="javascript:void(0)" class="widget">
                                    <div class="widget-content widget-content-mini text-right clearfix">
                                        <div class="widget-icon pull-left themed-background-warning">
                                            <i class="gi gi-briefcase text-light-op"></i>
                                        </div>
                                        <h2 class="widget-heading h3 text-warning">
                                            <strong><span id="totalState"></span></strong>
                                        </h2>
                                        <span class="text-muted">States</span>
                                    </div>
                                </a>
                            </div> 
            <!-- Total Cities -->
                            <div class="col-sm-6 col-md-3 col-xs-12 ">
                                <a href="javascript:void(0)" class="widget">
                                    <div class="widget-content widget-content-mini text-right clearfix">
                                        <div class="widget-icon pull-left themed-background-warning">
                                            <i class="gi gi-briefcase text-light-op"></i>
                                        </div>
                                        <h2 class="widget-heading h3 text-warning">
                                            <strong><span id="totalBCity"></span></strong>
                                        </h2>
                                        <span class="text-muted">Big Cities</span>
                                    </div>
                                </a>
                            </div> 
           
    
    <!-- Total Location -->
                            <div class="col-sm-6 col-md-3 col-xs-12 ">
                                <a href="javascript:void(0)" class="widget">
                                    <div class="widget-content widget-content-mini text-right clearfix">
                                        <div class="widget-icon pull-left themed-background-warning">
                                            <i class="gi gi-briefcase text-light-op"></i>
                                        </div>
                                        <h2 class="widget-heading h3 text-warning">
                                            <strong><span id="totalLocation"></span></strong>
                                        </h2>
                                        <span class="text-muted">Location</span>
                                    </div>
                                </a>
                            </div>  
     <!-- Total Experience -->
                            <div class="col-sm-6 col-md-3 col-xs-12 ">
                                <a href="javascript:void(0)" class="widget">
                                    <div class="widget-content widget-content-mini text-right clearfix">
                                        <div class="widget-icon pull-left themed-background-warning">
                                            <i class="gi gi-briefcase text-light-op"></i>
                                        </div>
                                        <h2 class="widget-heading h3 text-warning">
                                            <strong><span id="totalexp"></span></strong>
                                        </h2>
                                        <span class="text-muted">Experiences</span>
                                    </div>
                                </a>
                            </div>
    
         </div>
    <!-- Form Validation Content -->
    <div class="row">
        <div class="">
            <!-- Form Validation Block -->
            <div class="block">
                <!-- Form Validation Title -->
               
               <!-- END Form Validation Title -->

                <!-- Form Validation Form -->
				
                <form id="form-validations" action="addBiggestCity.php" method="post" class="form-horizontal form-bordered">
				
					
                    <div class="form-group">
                        <label class="col-md-3 control-label " for="cityName">Location Name<span class="text-danger">*</span></label>
                        <div class="col-md-6">
                            <input type="text" id="cityName" name="cityName" class="form-control" placeholder="Enter biggest city name">
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label class="col-md-3 control-label" for="val-images">Images <span class="text-danger">*</span></label>
                        <div class="col-md-6 row">
						<div style="display:flex">
                           <div id="filediv">
								<input name="file" type="file" id="file"/>
						   </div>
						  </div>
						
                        </div>
                    </div>
                    
                      <div class="form-group ">
                        <div class="col-md-12 form-action">    
                            <div class="col-md-8 col-md-offset-3 form-actions">
                            <button type="submit" class="btn btn-effect-ripple btn-primary">Submit</button>
                            <button type="reset" class="btn btn-effect-ripple btn-danger">Reset</button>
                        </div>
                        </div>  
                    </div>
                    
						
					
                </form>
                  <h1>List of biggest city</h1>
            
         
        <table id="city" class="table table-vcenter table-striped table-hover table-borderless">
        <thead>
            <tr>
                <th>Sr</th>
                <th>City Name</th>
                <th>Image</th>
                  <th>Experiences</th>
                <th>Sales</th>
                <th>Travelers</th>
                <th>Revenue</th>
                <th>Menu Sequence</th>
                <th>Stauts</th>
                <th></th>
            </tr>
        </thead>
    </table>
                
                
            </div>
            <!-- END Form Validation Block -->
          <!--modal -->

     <div id="modalLocation" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h3 class="modal-title text-center"><strong>City</strong></h3>
                            </div>
                            <div class="modal-body">
                                <form id="form-validation" action="page_forms_validation.php" method="post" class="form-horizontal form-bordered">
				<div class="col-md-12 head_form" style="margin-top: -5px;margin-bottom: 23px;">

					</div>
					
                    <div class="form-group">
                        <label class="col-md-3 control-label " for="cityName">City Name</label>
                        <div class="col-md-6">
                            <input type="text" value="" style="display:none" id="editUpdateCityId">
                            <input type="text" id="editCityName" value="" class="form-control" placeholder="Enter location name">
                            
                            <div style="width: 100%;" title="" id="search_location_chosen"><div class="chosen-drop"><ul class="chosen-choices" id ="locations" style="border: 0px solid #fff"> </ul>
                             <label class="checkbox-inline" for="example-inline-checkbox1">
                                                    <input type="checkbox" id="location_verified" name="example-inline-checkbox1" value="verified"> Verified
                                                </label>
                        </div>
                   
                    
                    <div class="form-group">
                        <label class="col-md-3 control-label" for="val-images">Images</label>
                        <img id= "editCityImg"  src="img/defaultimg.png" alt="image" style=" width:100px;height:100px"/><input name="cityImage" type="file" id="cityImage" onchange="imagecallC(this)"/>
                    </div>
                    
                     
                            </div>
                        </div>
                                    </div>
                                    
						
					
                </form>
                            </div>
                            
            
                            <div class="modal-footer">
                                <div class="text-center">
                                    <button type="button" class="btn btn-effect-ripple btn-success" data-dismiss="modal" onclick="updateCity()">Update</button>
                                    <button type="button" class="btn btn-effect-ripple btn-primary" data-dismiss="modal">Close</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                    <!-- End Modal -->         
            
        </div>
    </div>
       <div id="loading">
              <img id="loading-image" src="loading.gif" alt="Loading..." />
        </div>  
    <!-- END Form Validation Content -->
</div>
<?php
	}
	
	else{
		
		header("Location: toroots/"); /* Redirect browser */
		
	}


?>
<div id="test">

</div>
<!-- END Page Content -->

<?php include 'inc/page_footer.php'; ?>
<?php include 'inc/template_scripts.php'; ?>
<script type="text/javascript">
     var serverurl = <?php echo $torootsserverurl ?> ;
$(document).ready(function(){
  
    cityList();
    
});
function cityList(){
     $('#loading').show();
      $.ajax({ url: 'service.php?servicename=getCity', 
			type: 'GET',
			datatype:'JSON',
              async: false,
			contentType: 'application/json',
            success: function(data){
                 $('#loading').hide();
                console.log(data);
                var mydata = JSON.parse(data);
                
                //location data
			    var cityList = new Array();
                var sr = 1;
                var CStatus  = "";
                var CColor  = "";
                for(var i = 0 ; i < mydata.citylist.length ; i++)
                {
                     var menuSequence = mydata.citylist[i].menuSequence;
                    cityList[i] = new Array();
                    var cityStatus = mydata.citylist[i].status;
                    if(cityStatus == 1){
                        CStatus = "Not Verified";
                        CColor ="Red";
                    }
                    else{
                        CStatus = "Verified";
                        CColor = "Green";
                    }
                    
                    
                      var TravelerCountInState = 0;
                    if(mydata.citylist[i].TravelerCountInState != null)
                        TravelerCountInState=mydata.citylist[i].TravelerCountInState;
                  var Revenue = 0;
                    if(mydata.citylist[i].revenue != null)
                        Revenue=mydata.citylist[i].revenue;
                
                    
                    
                    cityList[i][0] = sr;
                    cityList[i][1] = mydata.citylist[i].cityName;   
                    cityList[i][2] = '<img src="'+mydata.citylist[i].cityImage+'" style="width:100px; height:100px"/>';
                         cityList[i][3] = mydata.citylist[i].expCountInState; 
                         cityList[i][4] = mydata.citylist[i].salesCountInState; 
                    cityList[i][5] = TravelerCountInState; 
                    cityList[i][6] = Revenue; 
                    cityList[i][8] = '<spam style="color:'+CColor+'">'+CStatus+'</spam>';
                      cityList[i][7] = '<span id="setSequence'+i+'"  onclick="setsequence('+i+','+mydata.citylist[i].id+')">'+menuSequence+'</span><input type="number" id = "sequence'+i+'" value="'+menuSequence+'" min=0 style="display:none">';
                    cityList[i][9] = '<a href="#modalLocation" data-toggle="modal" onclick="setcity(\''+mydata.citylist[i].cityName+'\', '+mydata.citylist[i].id+',\''+mydata.citylist[i].cityImage+'\','+mydata.citylist[i].status+')">Edit</a>'
                    sr++;
                }
                
                //location count  
                $("#totalLocation").text(mydata.LocationCount);
                
                //city count  
                $("#totalBCity").text(mydata.cityCount);
                
                //state count  
                $("#totalState").text(mydata.stateCount);
                 
                
                //Exp count  
                $("#totalexp").text(mydata.ExpCount);
                
                
                $('#city').dataTable({
                        "aaData": cityList,
                    
                        "bDestroy": true
                    
                    
    } );
                
                
			}
			
		
		});
    
    }    
    
    //
    function setcity(par1,par2,par3,par4){
        console.log(par1);  
        $("#editCityName").val(par1);
        $("#editUpdateCityId").val(par2);
       // $("#editLocationImg").src(par3);
        $('#editCityImg').attr('src', par3);
		 if(par4 == 2)
			document.getElementById("location_verified").checked = true;
		else
			document.getElementById("location_verified").checked = false;
    }
    
    
    
      function updateCity (){

        var cityId = $("#editUpdateCityId").val();
var cityName = $("#editCityName").val();
    var status = 1;
if($("#location_verified").is(":checked")){
        status = 2;
}
    var image = document.getElementById("editCityImg").src
    
    var datas=
        {"cityId":cityId,
         "cityName":cityName,
         "status":status,
         "image":image
        } // make JSON string
    	console.log(JSON.stringify(datas));
           $('#loading').show();
   $.ajax({ url:serverurl+'service.php?servicename=updateCityAdmin',
       
			data: JSON.stringify(datas), // make JSO
           type: 'POST',
			datatype:'JSON',
           async: true,
			contentType: 'application/json',
         success: function(data){
             console.log(data);
              $('#loading').hide();
             var n = noty({
                     layout: 'bottomRight',
                     text: 'City Updated',
                     theme:'relax',type: 'success',
                     timeout : '3000',
    animation: {
        open: 'animated bounceInLeft', // Animate.css class names
        close: 'animated bounceOutLeft', // Animate.css class names
        easing: 'swing', // unavailable - no need
        speed: 500 // unavailable - no need
    },
			
			
		
		});
             
         }
    });
        cityList();
    
    }

function imagecallC(par){
     var id = par.id ;
    if (par.files && par.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            $("#editCityImg").css('display','block');
            $("#editCityImg").attr('src', e.target.result);
        }

        reader.readAsDataURL(par.files[0]);
    }  
}   

function addcity()
{
	var name =document.getElementById('cityName').value;
	try{	
	var text = document.getElementById("previewimg1").src;
	}
	catch(err){
		var text = "img/defaultimg.png";
	
	}
	
		



	var  addcity={
		"name":name,
		"image":text,
		};
		console.log(JSON.stringify(addcity));
     $('#loading').show();
	$.ajax({ url: '/torootsAdmin/service.php?servicename=addcity',
       	data: JSON.stringify(addcity), // make JSON string
			type: 'POST',
			datatype:'JSON',
			 async: true,
			contentType: 'application/json',
         success: function(data){
              $('#loading').hide();
              var temp = JSON.parse(data);
			
			var status  = temp.status;
        
			
             
             
             if(status = "true"){
			 console.log(data);
				 var n = noty({
                     layout: 'bottomRight',
                     text: 'City Saved',
                     theme:'relax',type: 'success',
                     timeout : '3000',
    animation: {
        open: 'animated bounceInLeft', // Animate.css class names
        close: 'animated bounceOutLeft', // Animate.css class names
        easing: 'swing', // unavailable - no need
        speed: 500 // unavailable - no need
    },
			
			
		
		});
            }
             else{
            $('#loading').hide();
             var n = noty({
                     layout: 'bottomRight',
                     text: 'City Not Saved',
                     theme:'relax',type: 'success',
                     timeout : '3000',
    animation: {
        open: 'animated bounceInLeft', // Animate.css class names
        close: 'animated bounceOutLeft', // Animate.css class names
        easing: 'swing', // unavailable - no need
        speed: 500 // unavailable - no need
    },
			
			
		
		});
             
             
             }
		 }
	});
		cityList();
	
	
}   
  
function setsequence(id,BiggestCityId){
    var sequenceId = "#sequence"+id
    var setSequence = "#setSequence"+id
     $(sequenceId).css("display","block");
    
       $(sequenceId).focus();
    
     $(setSequence).css("display","none");
     $(sequenceId).focusout(function() {
          $(sequenceId).css("display","none");
          $(setSequence).css("display","block");
        var value = $(sequenceId).val();
         //ajax use to set the sequence 
          $('#loading').show();
               $.ajax({ url: 'service.php?servicename=setBiggestCitySequence', 
           data: JSON.stringify({'value':value,'BiggestCityId':BiggestCityId}),   
			type: 'POST',
			datatype:'JSON',
			contentType: 'application/json',
            success: function(data){
            var temp = JSON.parse(data);
			var status  = temp.status;
                
                console.log("test");
                if(status){
                     $('#loading').hide();
                    
                    var n = noty({
                     layout: 'bottomRight',
                     text: 'Sequence Saved',
                     theme:'relax',type: 'success',
                     timeout : '3000',
    animation: {
        open: 'animated bounceInLeft', // Animate.css class names
        close: 'animated bounceOutLeft', // Animate.css class names
        easing: 'swing', // unavailable - no need
        speed: 500 // unavailable - no need
    },
			
			
		
		});
                    console.log(value);
                    $(setSequence).text(value);
                    
                }
            else{
                		 $('#loading').hide();
             var n = noty({
                     layout: 'bottomRight',
                     text: 'Sequence Not Saved',
                     theme:'relax',type: 'erroe',
                     timeout : '3000',
    animation: {
        open: 'animated bounceInLeft', // Animate.css class names
        close: 'animated bounceOutLeft', // Animate.css class names
        easing: 'swing', // unavailable - no need
        speed: 500 // unavailable - no need
    },
			
			
		
		});
                
            }
                    
            }
        });
         
         
         
         //end of ajax
     });
    
}       
  
    
</script>



<script src="js/pages/addBiggestCity.js"></script>
<script src="js/pages/uiTables.js"></script>

<script>$(function() {
    UiTables.init();
	FormsValidation.init();
 });</script>
 
 

<?php include 'inc/template_end.php'; ?>