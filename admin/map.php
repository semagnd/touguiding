<?php
require_once 'logincheck.php';
require_once('class.php');
$user = new User();
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
		<link href="../css/bootstrap-datepicker.min.css" rel="stylesheet">
		 <link href="src/facebox.css" media="screen" rel="stylesheet" type="text/css" />
		 <link href="../bower_components/datatables-responsive/css/dataTables.responsive.css" rel="stylesheet">
		 <script src="lib/jquery.js" type="text/javascript"></script>
    <script src="src/facebox.js" type="text/javascript"></script>
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
	<script type="text/javascript">
	var map = null;
    var geocoder = null;

    function initialize() {
      if (GBrowserIsCompatible()) {
        map = new GMap2(document.getElementById("map_canvas"));
		map.setCenter(new GLatLng(37.4419, -122.1419), 1);
        map.setUIToDefault();
        geocoder = new GClientGeocoder();
      }
    }

    function showAddress(address) {
      if (geocoder) {
        geocoder.getLatLng(
          address,
          function(point) {
            if (!point) {
              alert(address + " not found");
            } else {
              map.setCenter(point, 15);
              var marker = new GMarker(point, {draggable: true});
              map.addOverlay(marker);
              GEvent.addListener(marker, "dragend", function() {
                marker.openInfoWindowHtml(marker.getLatLng().toUrlValue(6));
              });
              GEvent.addListener(marker, "click", function() {
                marker.openInfoWindowHtml(marker.getLatLng().toUrlValue(6));
              });
	      GEvent.trigger(marker, "click");
            }
          }
        );
      }
    }
  </script>
<script src="http://maps.google.com/maps?file=api&amp;v=2&amp;key=ABQIAAAAjU0EJWnWPMv7oQ-jjS7dYxSPW5CJgpdgO_s4yyMovOaVh_KvvhSfpvagV18eOyDWu7VytS6Bi1CWxw" type="text/javascript"></script>
<title></title>
</head>
	</head>
<body onload="initialize()" onunload="GUnload()">
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
		<div class = "panel panel-primary">	
		 <?php
			if(isset($error))
			{
			 	foreach($error as $error)
			 	{
					 ?>
                      <div class='alert alert-danger'>
				<button class='close' data-dismiss='alert'>&times;</button>
					<strong>Sorry !</strong> &nbsp; <?php echo $error; ?>
			  </div>
                     <?php
				}
			}
			else if(isset($_GET['inserted']))
			{
				 ?>
                 <div class="alert alert-info">
				 <button class='close' data-dismiss='alert'>&times;</button>
                      <i class="glyphicon glyphicon-log-in"></i> &nbsp; Successfully registered </a> here
                 </div>
                 <?php
			}
			?>
			<div class = "panel-heading">
				<form name="form1" action="#" onsubmit="showAddress(this.address.value); return false">
<div class="form-group">
<div class="input-group">
<?php
$res = $user->runQuery("SELECT * FROM `booktour` WHERE `email` = '$_SESSION[email]'") or die(mysqli_error());
				$fm = $res->fetch_array();
				$hotel=$fm['hname'];
				?>
	<!--<input type="text" style="width:450px;" name="address" class = "form-control"id="address" value="">
    <button type="submit"class="btn btn-default" ><span class="glyphicon glyphicon-search"></span>Search</button></span></input>-->
	<input id="address" class="form-control input-lg"name="address" type="text" value="<?Php echo $fm['destination'];?>" />
<div class="input-group-addon"><i class="glyphicon glyphicon-search"></i></div>
<a href = "tourist_profile.php" class = "btn btn-sm btn-info" style = "float:right; margin-top:-5px;"><span class = "glyphicon glyphicon-hand-right"></span> BACK</a>

	</div>
</div>
</form>
			<form name="form2" action="#" onsubmit="showAddress(this.address.value); return false">
                              <div class="form-group">
<div class="input-group"> 
<?php
                             $map=$user->runQuery("select * from 'hotel' where 'hname'='$hotel'");
							 $hn=$res->fetch_array();
							 $address=$hn['haddress'];
							 
							 ?>
                                     <select class="form-control" required name="address" id="address">
                                     <option value="" selected="selected"> - Select- </option>
                                     <option value="<?php echo $hotel.','.$address.','.$hn['hcountry']; ?>" > view your hotel</option>
                                     <option value="<?php echo $fm['destination']; ?> " > view your destination </option>
                                     <option value="Ethiopia" > view ethiopia </option>       
                                  </select>
                               <span class="input-group-btn">
                                           <button type="submit" name="Search_Type" class="btn btn-default">
                                    <span class="glyphicon glyphicon-search"></span>
                                  </button>
                                </span>
                               </div>
							   </div>
                           </form>	
			</div>
					<!--<div class = "panel-body">-->

<div id="map_canvas" style="width: 100%; border:2px solid #999; height: 650px;"></div>
	</div>		
	<!--</div>-->
	<div id = "footer">
		<label class = "footer-title">&copy; Copyright tour guiding System 2017</label>
	</div>
<?php require'script.php' ?>

<script src="parsleyjs/dist/parsley.min.js"></script>
<script>
$(document).ready(function(){
	$('form').parsley();
});
</script>	
</body>
</html>