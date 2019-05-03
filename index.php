<?php
	session_start();

	if (!isset($_SESSION['access_token'])) {
		header('Location: login.php');
		exit();
	}else{ ?>
	<a href="logout.php">logout</a>	
	<?php }
	/*echo "<pre>";
	print_r($_SESSION);
	echo "</pre>"; */
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>User Profile</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">
</head>
<body>
	<div class="container" style="margin-top: 100px">
		<div class="row justify-content-center">
			<div class="col-md-3">
				<img src="<?php echo $_SESSION['userData']['picture']['url'] ?>">
			</div>

			<div class="col-md-9">
				<table class="table table-hover table-bordered">
					<tbody>
						<tr>
							<td>ID</td>
							<td><?php echo $_SESSION['userData']['id'] ?></td>
						</tr>
						<tr>
							<td>First Name</td>
							<td><?php echo $_SESSION['userData']['first_name'] ?></td>
						</tr>
						<tr>
							<td>Last Name</td>
							<td><?php echo $_SESSION['userData']['last_name'] ?></td>
						</tr>
						<tr>
							<td>Email</td>
							<td><?php echo $_SESSION['userData']['email'] ?></td>
						</tr>
                        </tbody>
						</table>
			</div>
            
		</div>
        <div class="row">
            	<?php if(!empty($_SESSION['userData']['accounts'])){
						foreach($_SESSION['userData']['accounts'] as $acc){	
						?>
                             <div class="col-md-12">
                             	<div class="row"> 
                                    <img src="<?php echo $acc['picture']['url']; ?>" height="25" alt="<?php echo $acc["name"]; ?>">
<a href="pageinfo.php?access_token=<?php echo $acc["access_token"]; ?>" ><?php echo $acc["name"]; ?></a>                    
                                    <?php echo $acc["fan_count"]; ?>
                                </div>
                            </div>
						
                        <?php } } ?>
            </div>
	</div>
</body>
</html>
<script type="text/javascript">
function doUpdateAccessToken(accessToken){
	alert(accessToken);
}
</script>
