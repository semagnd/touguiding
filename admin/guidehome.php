<?php
require_once 'logincheck.php';
	//session_start();
	require_once('class.php');
	$user=new user();
	$stmt = $user->runQuery("SELECT * FROM guide where gemail='$_SESSION[email]'") or die(mysqli_error());
	$row1=$stmt->fetch_array();
	$type=$row1['gname'];
	$stmt = $user->runQuery("SELECT * FROM nomessage where type='$type'") or die(mysqli_error());
	$row=$stmt->fetch_array();
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
		<style type="text/css">
	input.parsley-error,
select.parsley-error,
textarea.parsley-error {    
    border-color:#843534;
    box-shadow: none;
}


input.parsley-error:focus,
select.parsley-error:focus,
textarea.parsley-error:focus {    
    border-color:#843534;
    box-shadow:inset 0 1px 1px rgba(0,0,0,.075),0 0 6px #ce8483
}


.parsley-errors-list {
    list-style-type: none;
    opacity: 0;
    transition: all .3s ease-in;

    color: #d16e6c;
    margin-top: 5px;
    margin-bottom: 0;
  padding-left: 0;
}

.parsley-errors-list.filled {
    opacity: 1;
    color: #a94442;
}
	</style>
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
				<li><a data-toggle="modal" data-target="#myModal1"><span class="glyphicon glyphicon-envelope"></span>&nbsp;message(<?php echo $row['messagenum']; ?>) </a></li>
					<a class = "user dropdown-toggle" data-toggle = "dropdown" href = "#">
						<span class = "glyphicon glyphicon-user"></span>
						<?php
							echo $f['email'];
						?>
						<b class = "caret"></b>
					</a>
				<ul class = "dropdown-menu">
					<li>
						<a class = "me" href = "logout.php"><i class = "glyphicon glyphicon-log-out"></i> Logout</a>
					</li>
				</ul>
				</li>
			</ul>
	</div>
	<div id = "sidebar">
			<ul id = "menu" class = "nav menu">
				<li><a href = "guidehome.php"><i class = "glyphicon glyphicon-home"></i> Dashboard</a></li>
				 <li><li><button data-toggle="modal" data-target="#view-modal" data-id="<?php echo $type; ?>" id="getUser" class="btn btn-sm btn-info"><i class="glyphicon glyphicon-eye-open"></i> View your reserve tourist</button></li></li>
			</ul>
	</div>
	<div id = "content">
		<br />
		<br />
		<br />
<div class = "panel panel-primary">
			<div class = "panel-heading">
				<label>message</Label>
				
			</div>
			<div class = "panel-body"style="background-image:url(grid_noise.png);">
				<br />
				<br />		
				<?php
					$stmt = $user->runQuery("SELECT * FROM booktour where gname='$type'") or die(mysqli_error());
					$row2=$stmt->fetch_array();
					$name=$row2['name'];
					$sql= $user->runQuery("SELECT * FROM message where name='$name' and person='$type'") or die(mysqli_error());
					$row3=$sql->fetch_array();
					?>
					<h4 style = "color:#3C763D;"><b>well come: </b></h4>
					<div class="form-group">
					<label style = "font-size:18px;" class = "text-muted"><?php echo $row3['message'];?></label>
					
					<p class="glyphicon glyphicon-calendar"><?php echo $row3['date'];?></p>
					</div>
					<button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">send message</button>

  <!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">send message</h4>
        </div>
		<form id = "form_admin" method = "POST" enctype = "multi-part/form-data" >
        <div class="modal-body">
		
		<label for="message">message</label>
		<textarea class="form-control"name="message" required/ ></textarea>
        </div>
					<div class="form-group">
			<label for="person">choice send for :</label>
            	<select class='form-control' name='person'>
				<option value="<?php $row3['name']; ?>"><?php echo $row3['name'];?></option>
				<option value="admin">admin</option>
				</select>
				
            </div>
        <div class="modal-footer">
		<button type="submit" class="btn btn-primary"name="send">
                	<i class="	glyphicon glyphicon-send"></i>&nbsp;send
                </button>
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
		  <?php
		if(isset($_POST['send']))
		{       $name=$row2['name'];
				$message=$_POST['message'];
				$section="normal";
				$person=$_POST['person'];
		$user->send($name,$message,$section,$person);
		//echo"success";
		$type=$_POST['person'];
		 $user->totalmessage($type);
			
		}
			
		?>
        </div>
		</form>
      </div>
      
    </div>
  </div>
			</div>
			<div class="modal fade" id="myModal1" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">send message</h4>
        </div>
		
        <div class="modal-body">
		<label for="message">message</label>
		<?php
		$name=$row2['name'];
$sql1= $user->runQuery("SELECT * FROM `message` where person='$name' ORDER BY `date` DESC") or die(mysqli_error());

while($row4=$sql1->fetch_array())
{
	?>
	</br>
	</br>
		<div>
		
		<label style = "font-size:18px;" class = "text-muted"><?php echo $row4['message']; ?></label>
		 <p class="glyphicon glyphicon-calendar"><?php echo $row4['date'];?></p>

		</div>	

		<?php
}
?>
<div>		
       
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
		
        </div>
      </div>
      
    </div>
  </div>
			</div>
	<div id="view-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
             <div class="modal-dialog"> 
                  <div class="modal-content"> 
                  
                       <div class="modal-header"> 
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button> 
                            <h4 class="modal-title">
                            	<i class="glyphicon glyphicon-user"></i> tourist Profile
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
                            	<th>tourist Name</th>
                            	<td id="name"></td>
                                </tr> 
                                 <tr>
                                <th>email</th>
                                <td id="email"></td>
                                </tr> 								
                                <tr>
                            	<th>phone number</th>
                            	<td id="phone"></td>
                                </tr>
                                       		
                                <tr>
                                <th>residential address</th>
                                <td id="address"></td>
                                </tr>
                                       		
                                <tr>
                                <th>country</th>
                                <td id="country"></td>
                                </tr> 
                                 <tr>
                                <th>source</th>
                                <td id="source"></td>
                                </tr>
                                 <tr>
                                <th>destination</th>
                                <td id="destination"></td>
                                </tr>
                                 <tr>
                                <th>hotel name</th>
                                <td id="hname"></td>
                                </tr> 
                                 <tr>
                                <th>package name</th>
                                <td id="pname"></td>
                                </tr> 
                                <tr>
                                <th>room type</th>
                                <td id="rtype"></td>
                                </tr>
                                <tr>
                                <th>room number</th>
                                <td id="rnumber"></td>
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
			url: 'getguidetouristinfo.php',
			type: 'POST',
			data: 'id='+uid,
			dataType: 'json'
		})
		.done(function(data){
			console.log(data);
			$('#dynamic-content').hide(); // hide dynamic div
			$('#dynamic-content').show(); // show dynamic div
			$('#name').html(data.name);
			$('#email').html(data.email);
			$('#phone').html(data.mobileno);
			$('#address').html(data.residentialaddresss);
			$('#country').html(data.country);
			$('#source').html(data.source);
			$('#destination').html(data.destination);
			$('#hname').html(data.hname);
			$('#pname').html(data.pname);
			$('#rtype').html(data.room_type);
			$('#rnumber').html(data.room_number);
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