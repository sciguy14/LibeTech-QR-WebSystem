<!DOCTYPE HTML>
<html>
<head>
<meta charset="utf-8">
<title>Libe Technologies :: Demo System</title>

<script type="text/javascript" src="jquery-1.7.1.min.js"></script>
<script src="gen_validatorv4.js" type="text/javascript"></script>
<link href='http://fonts.googleapis.com/css?family=Dosis' rel='stylesheet' type='text/css'>
<link href="style.css" rel="stylesheet" type="text/css">
</head>

<body>

<div class="container">

  <article class="content" align="center" >
      
    <section align="center">
    	<img src="libetech-small.png" alt="LibeTech">
        <br />
		<h1>DEMO Check-In System (HEC 2012)</h1>
        <br />
        <div align="center">
        <div>Have a smartphone? Enter your information below.  You will receive an email with your check-in QR code, and will have a valid "room assignment" until the next guest checks into this room.  Test it out on the demo lock system!</div></div>
        <br />
        <br />
    </section>
    
    <section align="center" style="padding-right:50px">
    <table align="center">
        <form action="submit.php" method="post" enctype="multipart/form-data" name="register" id="register" />
        <tr><td align="right"><label for="fname">First Name:</label></td><td align="left"><input id="fname" name="fname" type="text" size="50" maxlength="50" /><br /></td></tr>
        <tr><td align="right"><label for="lname">Last Name:</label></td><td align="left"><input id="lname" name="lname" type="text" size="50" maxlength="50" /><br /></td></tr>
        <tr><td align="right"><label for="email">Email:</label></td><td align="left"><input id="email" name="email" type="text" size="50" maxlength="50" /><br /></td></tr>
        <tr><td align="center" colspan="2"><input name="submit" type="submit" /></td></tr>
        </form>
        
        <!--CHECK THAT FORM!-->
        <script  type="text/javascript">
			var frmvalidator = new Validator("register");
			frmvalidator.addValidation("fname","req","Please enter your First Name");
			frmvalidator.addValidation("fname","maxlen=50","Your First Name should not be longer than 50 characters");
			
			frmvalidator.addValidation("lname","req","Please enter your Last Name");
			frmvalidator.addValidation("lname","maxlen=50","Your Last Name should not be longer than 50 characters");
			
			frmvalidator.addValidation("email","maxlen=50","Your email should not be longer than 50 characters");
			frmvalidator.addValidation("email","req","Please enter your email address");
			frmvalidator.addValidation("email","email","Please enter a valid email");
		</script>
        
        
	</table>
    </section>
  </article><!-- end .content -->
    
 
<!-- end .container --></div>
</body>
</html>
