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
                    <h1>Location Sequence</h1>
                </div>
            </div>
           
        </div>
    </div>
    <!-- END Validation Header -->

    <!-- Form Validation Content -->
    <div class="row">
        <div class="">
            <!-- Form Validation Block -->
            <div class="block">
                <!-- Form Validation Title -->
               
               <!-- END Form Validation Title -->

                <!-- Form Validation Form -->
                 <h1>List of category</h1>
            
         
        <table id="category" class="table table-vcenter table-striped table-hover table-borderless">
        <thead>
            <tr>
                <th>Sr</th>
                <th>Activity Name</th>
                <th>Menu Sequence</th>
                
            </tr>
        </thead>
    </table>
                
            </div>
            <!-- END Form Validation Block -->
            <!--modal -->


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
    $.ajax({ url: 'service.php?servicename=getActivity', 
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
                    
                    categoryList[i] = new Array();
                    
                    categoryList[i][0] = sr;
                    categoryList[i][1] = mydata.categorylist[i].activityName;   
                 categoryList[i][2] = '<span id="setSequence'+i+'"  onclick="setsequence('+i+','+mydata.categorylist[i].id+')">'+menuSequence+'</span><input type="number" id = "sequence'+i+'" value="'+menuSequence+'" min=0 style="display:none">';
                   
                    sr++;
                }
                
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
               $.ajax({ url: 'service.php?servicename=setactivitySequence', 
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