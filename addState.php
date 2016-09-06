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
                    <h1>Add New State</h1>
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
				
                <form id="form-validation" action="addState.php" method="post" class="form-horizontal form-bordered">
				
					
                    <div class="form-group">
                        <label class="col-md-3 control-label " for="stateName">Location Name<span class="text-danger">*</span></label>
                        <div class="col-md-6">
                            <input type="text" id="stateName" name="stateName" class="form-control" placeholder="Enter location name">
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
						
					
               <h1>List of state</h1>
            
         
        <table id="state" class="table table-vcenter table-striped table-hover table-borderless">
        <thead>
            <tr>
                <th>Sr</th>
                <th>State Name</th>
                <th>Image</th>
                <th>Experiences</th>
                <th>Sales</th>
                <th>Travelers</th>
                <th>Revenue</th>
                <th></th>
            </tr>
        </thead>
    </table>
            </div>
            <!-- END Form Validation Block -->
  <!--modal -->

     <div id="modalState" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h3 class="modal-title text-center"><strong>State</strong></h3>
                            </div>
                            <div class="modal-body">
                                <form id="form-validation" action="page_forms_validation.php" method="post" class="form-horizontal form-bordered">
				<div class="col-md-12 head_form" style="margin-top: -5px;margin-bottom: 23px;">

				
					
                    <div class="form-group">
                        <label class="col-md-3 control-label " for="statenName">State Name</label>
                        <div class="col-md-6">
                            <input type="text" value="" style="display:none" id="editUpdateStateId">
                            <input type="text" id="editStateName" value="" class="form-control" placeholder="Enter state name">
                            
                            <div style="width: 100%;" title="" id="search_location_chosen">
                   
                    
                    <div class="form-group">
                        <label class="col-md-3 control-label" for="val-images">Images</label>
                        <img id= "editStateImg"  src="img/defaultimg.png" alt="image" style=" width:100px;height:100px"/><input name="stateImage" type="file" id="stateImage" onchange="imagecallS(this)"/>
                    </div>
                    
                     
                            </div>
                        </div>
                                    </div>
                                    
						
					
                </form>
                            </div>
                            <div class="modal-footer">
                                <div class="text-center">
                                    <button type="button" class="btn btn-effect-ripple btn-success" data-dismiss="modal" onclick="updateState()">Update</button>
                                    <button type="button" class="btn btn-effect-ripple btn-primary" data-dismiss="modal">Close</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            

                    <!-- End Modal -->     
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
		
		header("Location: localhost:8080/toroots/"); /* Redirect browser */
		
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
  
    stateList();
    
});
    
function stateList(){
  $.ajax({ url: 'service.php?servicename=getState', 
			type: 'GET',
			datatype:'JSON',
			contentType: 'application/json',
            success: function(data){
                console.log(data);
                var mydata = JSON.parse(data);
                
                //location data
			    var stateList = new Array();
                var sr = 1;
               
                for(var i = 0 ; i < mydata.statelist.length ; i++)
                {
                    stateList[i] = new Array();
                    
                var TravelerCountInState = 0;
                    if(mydata.statelist[i].TravelerCountInState != null)
                        TravelerCountInState=mydata.statelist[i].TravelerCountInState;
                  var Revenue = 0;
                    if(mydata.statelist[i].revenue != null)
                        Revenue=mydata.statelist[i].revenue;
                
                    stateList[i][0] = sr;
                    stateList[i][1] = mydata.statelist[i].stateName;   
                    stateList[i][2] = '<img src="'+mydata.statelist[i].stateImage+'" style="width:100px; height:100px"/>';
                    stateList[i][3] = mydata.statelist[i].expCountInState;
                    stateList[i][4] = mydata.statelist[i].salesCountInState;
                    stateList[i][5] = TravelerCountInState;
                    stateList[i][6] = Revenue;
                  
                    stateList[i][7] = '<a href="#modalState" data-toggle="modal" onclick="setstate(\''+mydata.statelist[i].stateName+'\', '+mydata.statelist[i].id+',\''+mydata.statelist[i].stateImage+'\')">Edit</a>'
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
                
                
                $('#state').dataTable({
                        "aaData": stateList,
                    
                        "bDestroy": true
                    
                    
    } );
                
                
			}
			
		
		});
    





}  
    
 function setstate(par1,par2,par3){
      
        $("#editStateName").val(par1);
        $("#editUpdateStateId").val(par2);
       // $("#editLocationImg").src(par3);
        $('#editStateImg').attr('src', par3);
    }
        
  function imagecallS(par){
     var id = par.id ;
    if (par.files && par.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            $("#editStateImg").css('display','block');
            $("#editStateImg").attr('src', e.target.result);
        }

        reader.readAsDataURL(par.files[0]);
    }  
}     

     function updateState(){

        var stateId = $("#editUpdateStateId").val();
var stateName = $("#editStateName").val();
    
    var image = document.getElementById("editStateImg").src
    
    var datas=
        {"stateId":stateId,
         "stateName":stateName,
         "image":image
        } // make JSON string
    	console.log(JSON.stringify(datas));
   $.ajax({ url:serverurl+'service.php?servicename=updateStateAdmin',
       
			data: JSON.stringify(datas), // make JSO
           type: 'POST',
			datatype:'JSON',
			 async: false,
			contentType: 'application/json',
         success: function(data){
             console.log(data);
             var n = noty({
                     layout: 'bottomRight',
                     text: 'State Updated',
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
        stateList();
    
    }

function imagecallS(par){
     var id = par.id ;
    if (par.files && par.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            $("#editStateImg").css('display','block');
            $("#editStateImg").attr('src', e.target.result);
        }

        reader.readAsDataURL(par.files[0]);
    }  
}   
  


function addstate()
{
	var name =document.getElementById('stateName').value;
	try{	
	var text = document.getElementById("previewimg1").src;
	}
	catch(err){
		var text = "img/defaultimg.png";
	
	}
		



	var  addstate={
		"name":name,
		"image":text,
		};
		console.log(JSON.stringify(addstate));
     $('#loading').show();
	$.ajax({ url: serverurl+'/service.php?servicename=addState',
       	data: JSON.stringify(addstate), // make JSON string
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
                     text: 'State Saved',
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
                     text: 'State Not Saved',
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
		 
		
	 stateList();
	
}  
    
    
    </script>
    
    
    
<script src="js/pages/addState.js"></script>
    <script src="js/pages/uiTables.js"></script>

<script>$(function() {
    UiTables.init(); 
	FormsValidation.init();
 });</script>
 
 

<?php include 'inc/template_end.php'; ?>