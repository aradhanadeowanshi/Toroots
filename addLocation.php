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
                    <h1>Add New Location</h1>
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
				
                <form id="form-validation" action="addLocation.php" method="post" class="form-horizontal form-bordered">

					
                    <div class="form-group">
                        <label class="col-md-3 control-label " for="locationName">Location Name<span class="text-danger">*</span></label>
                        <div class="col-md-6">
                            <input type="text" id="locationName" name="locationName" class="form-control" placeholder="Enter location name">
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
           
          
              
                    <h1>List of location</h1>
            
         
        <table id="location" class="table table-vcenter table-striped table-hover table-borderless">
        <thead>
            <tr>
                <th>Sr</th>
                <th>Location Name</th>
                <th>Image</th>
                <th>Experiences</th>
                <th>Sales</th>
                <th>Travelers</th>
                <th>Revenue</th>
                <th>Menu sequence</th>
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
                                <h3 class="modal-title text-center"><strong>Location</strong></h3>
                            </div>
                            <div class="modal-body">
                                <form id="form-validation" action="page_forms_validation.php" method="post" class="form-horizontal form-bordered">
				<div class="col-md-12 head_form" style="margin-top: -5px;margin-bottom: 23px;">

					</div>
					
                    <div class="form-group">
                        <label class="col-md-3 control-label " for="locationName">Location Name</label>
                        <div class="col-md-6">
                            <input type="text" value="" style="display:none" id="editUpdateLocationId">
                            <input type="text" id="editLocationName" value="" class="form-control" placeholder="Enter location name">
                            
                            <div style="width: 100%;" title="" id="search_location_chosen"><div class="chosen-drop"><ul class="chosen-choices" id ="locations" style="border: 0px solid #fff"> </ul>
                             <label class="checkbox-inline" for="example-inline-checkbox1">
                                                    <input type="checkbox" id="location_verified" name="example-inline-checkbox1" value="verified"> Verified
                                                </label>
                        </div>
                   
                    
                    <div class="form-group">
                        <label class="col-md-3 control-label" for="val-images">Images</label>
                        <img id= "editLocationImg"  src="img/defaultimg.png" alt="image" style=" width:100px;height:100px"/><input name="locationImage" type="file" id="locationImage" onchange="imagecallL(this)"/>
                    </div>
                    
                     
                            </div>
                        </div>
                                    </div>
                                    
						
					
                </form>
                            </div>
                            <div class="modal-footer">
                                <div class="text-center">
                                    <button type="button" class="btn btn-effect-ripple btn-success" data-dismiss="modal" onclick="updateLocation()">Update</button>
                                    <button type="button" class="btn btn-effect-ripple btn-primary" data-dismiss="modal">Close</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                    <!-- End Modal -->        
            
            
            
    <!-- Modal-->        
            
        </div>
    </div>
    <!-- END Form Validation Content -->
</div>
<div id="loading">
              <img id="loading-image" src="loading.gif" alt="Loading..." />
        </div>  
<?php
	}
	
	else{
		
		header("Location: localhost:8080/torootsAdmin/"); /* Redirect browser */
		
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
  
    locationList();
    
});
    
    //get location List
    function locationList(){
    
      $.ajax({ url: 'service.php?servicename=getLocation', 
			type: 'GET',
			datatype:'JSON',
			contentType: 'application/json',
            success: function(data){
                console.log(data);
                var mydata = JSON.parse(data);
                
                //location data
			    var locationList = new Array();
                var sr = 1;
                var LStatus  = "";
                var LColor  = "";
                for(var i = 0 ; i < mydata.locationlist.length ; i++)
                {
                    var menuSequence = mydata.locationlist[i].menuSequence;
                    
                    locationList[i] = new Array();
                    var locationStatus = mydata.locationlist[i].status;
                    if(locationStatus == 1){
                        LStatus = "Not Verified";
                        LColor ="Red";
                    }
                    else{
                        LStatus = "Verified";
                        LColor = "Green";
                    }
                    
                        var TravelerCountInState = 0;
                    if(mydata.locationlist[i].TravelerCountInState != null)
                        TravelerCountInState=mydata.locationlist[i].TravelerCountInState;
                  var Revenue = 0;
                    if(mydata.locationlist[i].revenue != null)
                        Revenue=mydata.locationlist[i].revenue;
                
                    
                    
                    
                    console.log(LStatus);
                    locationList[i][0] = sr;
                    locationList[i][1] = mydata.locationlist[i].locationName; 
               
                    
                    locationList[i][2] = '<img src="'+mydata.locationlist[i].locationImage+'" style="width:100px; height:100px"/>'
                         locationList[i][3] = mydata.locationlist[i].expCountInState; 
                         locationList[i][4] = mydata.locationlist[i].salesCountInState; 
                    locationList[i][5] = TravelerCountInState; 
                    locationList[i][6] = Revenue; 
                    locationList[i][8] = '<spam style="color:'+LColor+'">'+LStatus+'</spam>';
                     locationList[i][7] = '<span id="setSequence'+i+'"  onclick="setsequence('+i+','+mydata.locationlist[i].id+')">'+menuSequence+'</span><input type="number" id = "sequence'+i+'" value="'+menuSequence+'" min=0 style="display:none">';
                    locationList[i][9] = '<a href="#modalLocation" data-toggle="modal" onclick="setlocation(\''+mydata.locationlist[i].locationName+'\', '+mydata.locationlist[i].id+',\''+mydata.locationlist[i].locationImage+'\','+mydata.locationlist[i].status+')">Edit</a>'
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
                
                
                $('#location').dataTable({
                        "aaData": locationList,
                    
                        "bDestroy": true
                    
                    
    } );
                
                
			}
			
		
		});
    
    }
    
    
    //
    function setlocation(par1,par2,par3,par4){
     
        $("#editLocationName").val(par1);
        $("#editUpdateLocationId").val(par2);
       // $("#editLocationImg").src(par3);
        $('#editLocationImg').attr('src', par3);
		console.log(par4);
        if(par4 == 2)
			document.getElementById("location_verified").checked = true;
		else
			document.getElementById("location_verified").checked = false;

    }
    
    
    function updateLocation (){

        var locationId = $("#editUpdateLocationId").val();
var locationName = $("#editLocationName").val();
    var status = 1;
if($("#location_verified").is(":checked")){
        status = 2;
}
    var image = document.getElementById("editLocationImg").src
    
    var datas=
        {"locationId":locationId,
         "locationName":locationName,
         "status":status,
         "image":image
        } // make JSON string
    	console.log(JSON.stringify(datas));
   $.ajax({ url:serverurl+'service.php?servicename=updateLocationAdmin',
       
			data: JSON.stringify(datas), // make JSO
           type: 'POST',
			datatype:'JSON',
			 async: false,
			contentType: 'application/json',
         success: function(data){
                           var n = noty({
                     layout: 'bottomRight',
                     text: 'Location Updated',
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
        locationList();
    
    }

function imagecallL(par){
     var id = par.id ;
    if (par.files && par.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            $("#editLocationImg").css('display','block');
            $("#editLocationImg").attr('src', e.target.result);
        }

        reader.readAsDataURL(par.files[0]);
    }  
}   


function addLocation()
{
	var name =document.getElementById('locationName').value;
	try{	
	var text = document.getElementById("previewimg1").src;
	}
	catch(err){
		var text = "img/defaultimg.png";
	console.log("----"+text);
	}
		



	var  addlocation={
		"name":name,
		"image":text,
		};
		console.log(JSON.stringify(addlocation));
         $('#loading').show();

	$.ajax({ url: serverurl+'/service.php?servicename=addLocation',
       	data: JSON.stringify(addlocation), // make JSON string
			type: 'POST',
			datatype:'JSON',
			 async: true,
			contentType: 'application/json',
         success: function(data){
			 console.log(data);
                  $('#loading').hide();
              var temp = JSON.parse(data);
			
			var status  = temp.status;
        
			
             
             
             if(status = "true"){ 
             
              var n = noty({
                     layout: 'bottomRight',
                     text: 'Location Saved',
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
                     text: 'Location Not Saved',
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
		
	
    locationList();	
}

    

function setsequence(id,locationId){
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
               $.ajax({ url: 'service.php?servicename=setLocationSequence', 
           data: JSON.stringify({'value':value,'locationId':locationId}),   
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


<script src="js/pages/addLocation.js"></script>
<script src="js/pages/uiTables.js"></script>
<script>$(function() {
    UiTables.init(); 
	FormsValidation.init();
 });</script>
 
 

<?php include 'inc/template_end.php'; ?>