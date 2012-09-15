<!DOCTYPE HTML>
<html>
<head>
<meta charset="utf-8">
<title>Libe Technologies :: Demo System</title>
<meta http-equiv="Refresh" content="60;url=index.php" />
<script type="text/javascript" src="jquery-1.7.1.min.js"></script>
<link href='http://fonts.googleapis.com/css?family=Dosis' rel='stylesheet' type='text/css'>
<link href="style.css" rel="stylesheet" type="text/css">
</head>

<body>

<div class="container">
  <br class="clearfloat" />
  <div class="sidebar-left">
  </div><!-- end .sidebars -->
  
  <article class="content" align="center" >
      
    <section align="center">
    	<img src="libetech-small.png" alt="LibeTech">
        <br />
		<h1>DEMO Check-In System (HEC 2012)</h1>
        <br />
        <div align="center">
        <div>For the purposes of this demo, you are now "checked in" until the next person checks in.  You will receive an email with a unique QR code shortly.  Scan it on the door to gain entrance to the room!<br /><br />
        Please wait while your unique code is generated.  Do not refresh this page or navigate away.  This may take up to 1 minute...
        <div id="loading">
			<img id="loading-image" src="loading.gif" alt="Working..." />
		</div>
		<?php		
		
		function filter_data($val)
		{
  			return htmlentities($val,ENT_QUOTES);
		}
		
			//Filter our inputs from the form
			$email = filter_data($_POST['email']);
			$fname = filter_data($_POST['fname']);
			$lname = filter_Data($_POST['lname']);
		
			//creates a unique ID with a random number as a prefix - more secure than a static prefix 
			//This is encoded into a QR code and emailed to the user
			$key = uniqid (rand () . "_",true);
			//echo $key;
			copy('https://chart.googleapis.com/chart?chs=300x300&cht=qr&chl=' . $key, "codes/QR_" . $key . ".png");
			//echo "<img src='codes/QR_" . $key . ".png'/>";
			//echo "<br>";
			
			//this md5 encrypts the username from above, so its ready to be stored in your database
			//This hashed version is what is saved and sent to the door lock.  The door lock never actually sees the unhashed unique ID.
			$md5_key = md5($key);
			$valid_file = "../valid.txt";
			$fh = fopen($valid_file, 'w') or die("Can't Open Key File");
			fwrite($fh, $md5_key);
			fclose($fh);
			//echo $md5_key;

			
			//Email a message to the user with QR Code 
			require_once('class.phpmailer.php');
			$mail = new PHPMailer(true); // the true param means it will throw exceptions on errors, which we need to catch
			$mail->isSendMail(); // telling the class to use SendMail
			try {
			  $mail->Host       = "smtp.1and1.com"; // SMTP server
			  $mail->Port       = 25;                    // set the SMTP port
			  $mail->SetFrom('checkin@libetech.com', 'LibeTech CheckIn Service');
			  $mail->AddAddress($email, $fname . " " . $lname);
			  $mail->Subject = 'Your HEC Demo RoomKey';
			
			  $mail->AddEmbeddedImage("codes/QR_" . $key . ".png", "attach", "QR_" . $key . ".png");
			  $mail->Body = 'Hi ' . $fname . ' ' . $lname . '!<br />Thanks for checking out LibeTech.  Scan your unique QR code below at the door lock to unlock your room.  It will remain valid until the next user has checked into the room.  Enjoy your stay! <br /><img src="cid:attach"> ';
			  $mail->IsHTML(true);
			  $mail->Send();
			  echo "<br /><br /><h2>Success!</h2>Check your email for your Check-In QR Code.<br />\n";
			} catch (phpmailerException $e) {
			  echo $e->errorMessage(); //Pretty error messages from PHPMailer
			} catch (Exception $e) {
			  echo $e->getMessage(); //Boring error messages from anything else!
			}
			unlink("codes/QR_" . $key . ".png"); //we no longer need the QR code we copied here.
			echo "This page will redirect to the registration page automatically.<br /><a href='/admin' alt='Registration Page' title='Registration Page'>Click Here</a> to return to the registration page immediately.";

		?>
 
        
        </div></div>
    </section>
  </article><!-- end .content -->
    
  <div class="sidebar-right">
  </div><!-- end .sidebars -->
 
<!-- end .container --></div>

<!--Handle Loading Image-->
<script language="javascript" type="text/javascript">
  $(window).load(function() {
    $('#loading').hide();
  });
</script>

</body>
</html>
