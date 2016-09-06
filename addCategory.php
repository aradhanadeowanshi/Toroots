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
                    <h1>Add New Category</h1>
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
				
                <form id="form-validation" action="addCategory.php" method="post" class="form-horizontal form-bordered">
			
					
                    <div class="form-group">
                        <label class="col-md-3 control-label " for="categoryName">Category<span class="text-danger">*</span></label>
                        <div class="col-md-6">
                            <input type="text" id="categoryName" name="categoryName" class="form-control" placeholder="Enter category name">
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
                 <h1>List of category</h1>
            
         
        <table id="category" class="table table-vcenter table-striped table-hover table-borderless">
        <thead>
            <tr>
                <th>Sr</th>
                <th>Category Name</th>
                <th>Image</th>
                <th>Experiences</th>
                <th>Sales</th>
                <th>Travelers</th>
                <th>Revenue</th>
                <th>Menu Sequence</th>>
                <th></th>
            </tr>
        </thead>
    </table>
                
            </div>
            <!-- END Form Validation Block -->
            <!--modal -->

     <div id="modalCategory" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h3 class="modal-title text-center"><strong>Category</strong></h3>
                            </div>
                            <div class="modal-body">
                                <form id="form-validation" action="page_forms_validation.php" method="post" class="form-horizontal form-bordered">
				<div class="col-md-12 head_form" style="margin-top: -5px;margin-bottom: 23px;">

					</div>
					
                    <div class="form-group">
                        <label class="col-md-3 control-label " for="categoryName">Category Name</label>
                        <div class="col-md-6">
                            <input type="text" value="" style="display:none" id="editUpdateCategoryId">
                            <input type="text" id="editCategoryName" value="" class="form-control" placeholder="Enter Category name">
                    <div class="form-group">
                        <label class="col-md-3 control-label" for="val-images">Images</label>
                        <img id= "editCategoryImg"  src="img/defaultimg.png" alt="image" style=" width:100px;height:100px"/><input name="locationImage" type="file" id="categoryImage" onchange="imagecallCategory(this)"/>
                    </div>
                    
                     
                            </div>
                        </div>
                                    </div>
                                    
						
					
                </form>
                            </div>
                            <div class="modal-footer">
                                <div class="text-center">
                                    <button type="button" class="btn btn-effect-ripple btn-success" data-dismiss="modal" onclick="updateCategory()">Update</button>
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
		
		header("Location: /toroots/"); /* Redirect browser */
		
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
    getCategoryList();
    
    
});
    // function to list to category
    function getCategoryList(){
    $.ajax({ url: 'service.php?servicename=getCategory', 
			type: 'GET',
			datatype:'JSON',
			contentType: 'application/json',
            success: function(data){
                console.log(data);
                var mydata = JSON.parse(data);
                
                //location data
			    var categoryList = new Array();
                var sr = 1;
                
                for(var i = 0 ; i < mydata.categorylist.length ; i++)
                {
                    var menuSequence = mydata.categorylist[i].menuSequence;
                    
                    
                        var TravelerCountInState = 0;
                    if(mydata.categorylist[i].TravelerCountInState != null)
                        TravelerCountInState=mydata.categorylist[i].TravelerCountInState;
                  var Revenue = 0;
                    if(mydata.categorylist[i].revenue != null)
                        Revenue=mydata.categorylist[i].revenue;
                
                    
                    
                    
                    categoryList[i] = new Array();
                    
                    categoryList[i][0] = sr;
                    categoryList[i][1] = mydata.categorylist[i].categoryName;   
                    categoryList[i][2] = '<img src="'+mydata.categorylist[i].categoryImage+'" style="width:100px; height:100px"/>';
                     categoryList[i][3] = mydata.categorylist[i].expCountInState; 
                         categoryList[i][4] = mydata.categorylist[i].salesCountInState; 
                    categoryList[i][5] = TravelerCountInState; 
                    categoryList[i][6] = Revenue; 
                 categoryList[i][7] = '<span id="setSequence'+i+'"  onclick="setsequence('+i+','+mydata.categorylist[i].id+')">'+menuSequence+'</span><input type="number" id = "sequence'+i+'" value="'+menuSequence+'" min=0 style="display:none">';
                    categoryList[i][8] = '<a href="#modalCategory" data-toggle="modal" onclick="setcategory(\''+mydata.categorylist[i].categoryName+'\', '+mydata.categorylist[i].id+',\''+mydata.categorylist[i].categoryImage+'\')">Edit</a>'
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
                
                
                $('#category').dataTable({
                        "aaData": categoryList,
                    
                        "bDestroy": true
                    
                    
    } );
                
                
			}
			
		
		});
    
    }
    
    
    //
    function setcategory(par1,par2,par3){
        console.log(par1);  
        $("#editCategoryName").val(par1);
        $("#editUpdateCategoryId").val(par2);
       // $("#editLocationImg").src(par3);
        $('#editCategoryImg').attr('src', par3);
    }
    
    
    function updateCategory(){

        var CategoryId = $("#editUpdateCategoryId").val();
var CategoryName = $("#editCategoryName").val();
   
    var image = document.getElementById("editCategoryImg").src
    
    var datas=
        {"categoryId":CategoryId,
         "categoryName":CategoryName,
         "status":status,
		  async: false,
         "image":image
        } // make JSON string
    	console.log(JSON.stringify(datas));
   $.ajax({ url:serverurl+'service.php?servicename=updateCategoryAdmin',
       
			data: JSON.stringify(datas), // make JSO
           type: 'POST',
			datatype:'JSON',
			contentType: 'application/json',
         success: function(data){
             console.log(data);
              var n = noty({
                     layout: 'bottomRight',
                     text: 'Category Updated',
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
        
    getCategoryList();    
    
}


function addcategory()
{
	var name =document.getElementById('categoryName').value;
	try{	
	var text = document.getElementById("previewimg1").src;
	}
	catch(err){
		var text = "img/defaultimg.png";
	
	}
	
		



	var  addcategory={
		"name":name,
		"image":text,
		};
		console.log(JSON.stringify(addcategory));
    $('#loading').show();
	$.ajax({ url: '/torootsAdmin/service.php?servicename=addCategory',
       	data: JSON.stringify(addcategory), // make JSON string
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
                     text: 'Category Saved',
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
                     text: 'Category Not Saved',
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
		
	getCategoryList();    
	
}

function imagecallCategory(par){
     var id = par.id ;
    if (par.files && par.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            $("#editCategoryImg").css('display','block');
            $("#editCategoryImg").attr('src', e.target.result);
        }

        reader.readAsDataURL(par.files[0]);
    }  
} 
    
function setsequence(id,categoryId){
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
               $.ajax({ url: 'service.php?servicename=setCategorySequence', 
           data: JSON.stringify({'value':value,'categoryId':categoryId}),   
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

<script src="js/pages/uiTables.js"></script>
<script src="js/pages/addCategory.js"></script>
<script>$(function() {
    UiTables.init(); 
	FormsValidation.init();
 });</script>
 
 

<?php include 'inc/template_end.php'; ?>