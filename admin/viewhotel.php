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
				<li><li><a onclick="confirmationDelete(this);return false;" href = "canceltour.php?id=<?php echo $_SESSION['email'];?>"><i class = "glyphicon glyphicon-remove"></i> Cancel tour</a></li></li>
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
            				<th>hotel Name</th>
							<th>address</th>
							<th>city</th>
							<th>state</th>
            				<th>View Profile</th>
            			</tr>
			</thead>
			<tbody>
            		
            		<?php
            		
            		$query = "SELECT * FROM hotel";
            		$stmt = $user->runQuery($query) or die(mysqli_error());
            		//$stmt->execute();
            		while($row=$stmt->fetch_array()){
						?>
						<tr>
						<td><?php echo $row['hname']; ?></td>
						<td><?php echo $row['haddress']?></td>
						<td><?php echo $row['city']?></td>
						<td><?php echo $row['hstate']?></td>
						<td>
						<center>
						<button data-toggle="modal" data-target="#view-modal" data-id="<?php echo $row['hotel_id']; ?>" id="getUser" class="btn btn-sm btn-info"><i class="glyphicon glyphicon-eye-open"></i> View</button>
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
                            	<i class="glyphicon glyphicon-user"></i> hotel Profile
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
                            	<th>Hotel Name</th>
                            	<td id="hname"></td>
                                </tr>
                                     
                                <tr>
                            	<th>address</th>
                            	<td id="address"></td>
                                </tr>
                                       		
                                <tr>
                                <th>city</th>
                                <td id="city"></td>
                                </tr>
                                       		
                                <tr>
                                <th>state</th>
                                <td id="state"></td>
                                </tr>
                                       		
                                <tr>
                                <th>country</th>
                                <td id="country"></td>
                                </tr>
								       		
                                <tr>
                                <th>Telephone</th>
                                <td id="telephone"></td>
                                </tr>
								       		
                                <tr>
                                <th>mobile number</th>
                                <td id="mobilenumber"></td>
                                </tr>
								       		
                                <tr>
                                <th>star catagory</th>
                                <td id="star"></td>
                                </tr>
								       		
                                <tr>
                                <th>nearest airport</th>
                                <td id="nairport"></td>
                                </tr>
								       		
                                <tr>
                                <th>nearest rail way</th>
                                <td id="nrailway"></td>
                                </tr>
								       		
                                <tr>
                                <th>about hotel </th>
                                <td id="about"></td>
                                </tr>
								       		
                                <tr>
                                <th>hotel fare per day</th>
                                <td id="hfarepday"></td>
                                </tr>
								<tr>
                                <th>contact person</th>
                                <td id="contactp"></td>
                                </tr>
								       		
                                <tr>
                                <th>Designation</th>
                                <td id="designation"></td>
                                </tr>
								       		
                                <tr>
                                <th>contact mobile </th>
                                <td id="cmobile"></td>
                                </tr>
								       		
                                <tr>
                                <th>contact email</th>
                                <td id="cemail"></td>
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
			url: 'gethotel.php',
			type: 'POST',
			data: 'id='+uid,
			dataType: 'json'
		})
		.done(function(data){
			console.log(data);
			$('#dynamic-content').hide(); // hide dynamic div
			$('#dynamic-content').show(); // show dynamic div
			$('#hname').html(data.hname);
			$('#address').html(data.haddress);
			$('#city').html(data.city);
			$('#state').html(data.hstate);
			$('#country').html(data.hcountry);
			$('#country').html(data.hcountry);
			$('#telephone').html(data.hteleno);
			$('#mobilenumber').html(data.hmobileno);
			$('#star').html(data.hstar);
			$('#nairport').html(data.hairport);
			$('#nrailway').html(data.hrail);
			$('#about').html(data.hdescription);
			$('#hfarepday').html(data.hotelfarepday);
			$('#contactp').html(data.cname);
			$('#designation').html(data.cdesignation);
			$('#cmobile').html(data.cmobileno);
			$('#cemail').html(data.cemail);
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
</html>
