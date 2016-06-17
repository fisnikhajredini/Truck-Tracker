
<!DOCTYPE html>
<html>
<head>
<title>Miswa</title>
<link href="css/style.css" rel='stylesheet' type='text/css' />
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Cube Sign In Form,Login Forms,Sign up Forms,Registration Forms,News latter Forms,Elements"./>
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
</script>
<!--webfonts-->
<link href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,400,300,600,700,800' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Lobster' rel='stylesheet' type='text/css'>
<!--//webfonts-->
</head>
<body>
	<h1>Miswa</h1>
		<div class="app-block">
			<div class="cube"><img src="" class="img-responsive" alt="" /></div>
			<form action= "Signup.php" method= "post">
				 <input type="text" class="text" name='companyname' value = 'Company name' onfocus="this.value='';" onblur="if (this.value=='') {this.value= 'Company Name';}">
                <input type="text" class="text" name='name' value = 'Name' onfocus="this.value='';" onblur="if (this.value=='') {this.value= 'Name';}">
                <input type="text" class="text" name='phone' value = 'Phone number' onfocus="this.value='';" onblur="if (this.value=='') {this.value= 'Phone number';}">
                <input type="text" class="text" name = 'username' value="Username" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Username';}" >
				<input type="password" value="Password" name = 'password' onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Password';}">
                
				<div class="submit"><input type="submit" name="submit" onclick="" value="Sign Up" ></div>
				<div class="clear"></div>
			</form>
			<p class="sign">Already have an account? <a href="index.html"> Sign in</a></p>
			
		</div>
	
</body>
</html>