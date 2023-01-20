<!DOCTYPE html>
<?php
require_once 'logincheck.php';
require_once('class.php');
$user = new USER();


/*if($user->is_loggedin()!="")
{
	$user->redirect('home.php');
}*/
?>
<html lang = "eng">
	<head>
		<title>Tour Guiding System</title>
		<meta charset = "utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel = "shortcut icon" href = "../images/logo.svg" />
		<link rel = "stylesheet" type = "text/css" href = "../css/bootstrap.css" />
		<link rel = "stylesheet" type = "text/css" href = "../css/jquery.dataTables.css" />
		<link rel = "stylesheet" type = "text/css" href = "../css/customize.css" />
	</head>
<body>
		<div class = "navbar navbar-default navbar-fixed-top">
		<img src = "../images/logo.svg" style = "float:left;" height = "55px" /><label class = "navbar-brand">Tour Guiding System - Ethiopia</label>
				<?php
		
				$q = $user->runQuery("SELECT * FROM `user` WHERE `email` = '$_SESSION[email]'") or die(mysqli_error());
				$f = $q->fetch_array();
			?>
			<ul class = "nav navbar-right">	
				<li class = "dropdown">
					<a class = "user dropdown-toggle" data-toggle = "dropdown" href = "#">
						<span class = "glyphicon glyphicon-user"></span>
						<?php
							echo $f['email'];
						?>
						<b class = "caret"></b>
					</a>
				<ul class = "dropdown-menu">
					<li>
					<a onclick="confirmationDelete(this);return false;" href = "canceltour.php?id=<?php echo $_SESSION['email'];?>" class = "btn btn-sm btn-danger"><i class = "glyphicon glyphicon-remove"></i> Delete</a>
						<a class = "me" href = "logout.php"><i class = "glyphicon glyphicon-log-out"></i> Logout</a>
					</li>
				</ul>
				</li>
			</ul>
	</div>
	<div id = "sidebar">
			<ul id = "menu" class = "nav menu">
				<li><a href = "#"><i class = "glyphicon glyphicon-home"></i> Dashboard</a></li>
				 <li><li><a href = "viewguide.php"><i class = "glyphicon glyphicon-eye-open"></i> view guide</a></li></li>
				<li><li><a href = "viewhotel.php"><i class = "glyphicon glyphicon-star"></i>view hotel availability</a></li></li>
				<li><li><a href = "viewpackage.php"><i class = "glyphicon glyphicon-eye-open"></i>view package</a></li></li>
				<li><li><a href = "viewdictionary.php"><i class = "glyphicon glyphicon-eye-open"></i>view dictionary</a></li></li>
				<li><li><a href = "booktour.php"><i class = "glyphicon glyphicon-book"></i>book tour</a></li></li>
				<li><a href = ""><i class = "glyphicon glyphicon-cog"></i> map</a>
					<ul>
						<li><a href = "viewlocationpath.php"><i class = "glyphicon glyphicon-cog"></i> direction view</a></li>
						<li><a href = "map.php"><i class = "glyphicon glyphicon-cog"></i> view your location</a></li>
					</ul>
				</li>
			</ul>
	</div>
	<div id = "content">
		<br />
		<br />
		<br />
		<div class = "panel panel-success">	
		<div class = "panel-heading">
				<label>Book Tour</label>
				<a href = "tourist_profile.php" class = "btn btn-sm btn-info" style = "float:right; margin-top:-5px;"><span class = "glyphicon glyphicon-hand-right"></span> BACK</a>
			</div>
			<div class = "panel-body">
				<form id = "form_admin" method = "POST" enctype = "multi-part/form-data" >
					<div class = "panel panel-default" style = "width:100%; margin:auto;">
					<div class = "panel-heading">
					</div>
					<div class = "panel-body">
		
		<table style="width:95%;" id = "table" class = "table table-striped table-bordered display" cellspacing = "0" >
			<thead style="background-color:#1bd2ea;">
				<tr>
            				<th>guide Name</th>
							<th>age</th>
							<th>email</th>
							<th>phone number</th>
            				<th>View Profile</th>
            			</tr>
			</thead>
			<tbody>
            		
            		<?php
            		
            		$query = "SELECT * FROM guide";
            		$stmt = $user->runQuery($query) or die(mysqli_error());
            		//$stmt->execute();
            		while($row=$stmt->fetch_array()){
						?>
						<tr>
						<td><?php echo $row['gname']; ?></td>
						<td><?php echo $row['gage']?></td>
						<td><?php echo $row['gemail']?></td>
						<td><?php echo $row['gphoneno']?></td>
						<td>
						<center>
						<button data-toggle="modal" data-target="#view-modal" data-id="<?php echo $row['guide_id']; ?>" id="getUser" class="btn btn-sm btn-info"><i class="glyphicon glyphicon-eye-open"></i> View</button>
						</center>
					</td>
				</tr>
			<?php
				}
					//$conn->close();
			?>	
			</tbody>
		</table>
	</div>
        
        
        
        <div id="view-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
             <div class="modal-dialog"> 
                  <div class="modal-content"> 
                  
                       <div class="modal-header"> 
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button> 
                            <h4 class="modal-title">
                            	<i class="glyphicon glyphicon-user"></i> guide Profile
                            </h4> 
                       </div> 
                       <div class="modal-body"> 
                       
                       	   <div id="modal-loader" style="display: none; text-align: center;">
                       	   	<img src="ajax-loader.gif">
                       	   </div>
                       
                       	   <div id="dynamic-content">
                                        
                           <div class="row"> 
                                <div class="col-md-12"> 
                            	
                            	<div class="table-responsive">
                            	
                                <table class="table table-striped table-bordered">
                           		<tr>
                            	<th>guide Name</th>
                            	<td id="gname"></td>
                                </tr>
                                     
                                <tr>
                            	<th>guide age</th>
                            	<td id="age"></td>
                                </tr>
                                       		
                                <tr>
                                <th>guide email</th>
                                <td id="email"></td>
                                </tr>
                                       		
                                <tr>
                                <th>guide phone number</th>
                                <td id="phone"></td>
                                </tr>
                                       		
                                <tr>
                                <th>guide known language</th>
                                <td id="lang"></td>
                                </tr>
								       		
                                <tr>
                                <th>guide experience</th>
                                <td id="experience"></td>
                                </tr>
								       		
                                <tr>
                                <th>about guide</th>
                                <td id="about"></td>
                                </tr>
                                 <tr>
                                <th>status</th>
                                <td id="status"></td>
                                </tr>      		
                                </table>
                                
                                </div>
                                       
                                </div> 
                          </div>
                          
                          </div> 
                             
                        </div> 
                        <div class="modal-footer"> 
                              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>  
                        </div> 
                        
                 </div> 
              </div>
       </div><!-- /.modal -->    
    
    </div>


<script src="../assets/jquery-1.12.4.min.js"></script>
<script src="../assets/js/bootstrap.min.js"></script>


<script>
$(document).ready(function(){
	
	$(document).on('click', '#getUser', function(e){
		
		e.preventDefault();
		
		var uid = $(this).data('id'); // get id of clicked row
		
		$('#dynamic-content').hide(); // hide dive for loader
		$('#modal-loader').show();  // load ajax loader
		
		$.ajax({
			url: 'getguide.php',
			type: 'POST',
			data: 'id='+uid,
			dataType: 'json'
		})
		.done(function(data){
			console.log(data);
			$('#dynamic-content').hide(); // hide dynamic div
			$('#dynamic-content').show(); // show dynamic div
			$('#gname').html(data.gname);
			$('#age').html(data.gage);
			$('#email').html(data.gemail);
			$('#phone').html(data.gphoneno);
			$('#lang').html(data.knownlang);
			$('#experience').html(data.exprience);
			$('#about').html(data.about);
			$('#status').html(data.status);
			$('#modal-loader').hide();    // hide ajax loader
		})
		.fail(function(){
			$('.modal-body').html('<i class="glyphicon glyphicon-info-sign"></i> Something went wrong, Please try again...');
		});
		
	});
	
});

</script>
<div id = "footer">
		<label class = "footer-title">&copy; Copyright tour guiding System 2017</label>
	</div>
	</body>
		<script src = "../js/jquery.dataTables.js"></script>
		<script type = "text/javascript">
	$(document).ready(function() {
		$('#table').DataTable();
		$('#table1').DataTable();
	});
	
</script>
</div>	
	</div>
	<div id = "footer">
		<label class = "footer-title">&copy; Copyright tour guiding System 2017</label>
	</div>
<?php// require'script.php' ?>
<script type = "text/javascript">
    $(document).ready(function() {
        function disableBack() { window.history.forward() }

        window.onload = disableBack();
        window.onpageshow = function(evt) { if (evt.persisted) disableBack() }
    });
</script>	
<script src="parsleyjs/dist/parsley.min.js"></script>
<script>
$(document).ready(function(){
	$('form').parsley();
});
</script>
</body>
</html>
