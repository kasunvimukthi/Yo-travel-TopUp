<?php 
include ('includes/check_login.php');
include "db_conn.php";


	if($_POST["action"] == "admin_insert")
    {

	
	$pass = $_POST['add_Password'];

	$re_pass = $_POST['add_reassword'];
	$name = $_POST['add_Name'];
	
	$Email_Address = $_POST['add_Email'];
	$Phone_Number = $_POST['add_Number'];


		// hashing the password
        $pass = md5($pass);

	    $sql = "SELECT * FROM admin WHERE A_Email='$Email_Address' ";
		$result = mysqli_query($conn, $sql);

		if (mysqli_num_rows($result) > 0) {
			echo 'email';
		}else {
           $sql2 = "INSERT INTO admin(A_Name, A_Password, A_Email, A_Number) VALUES('$name','$pass','$Email_Address', '$Phone_Number')";
           $result2 = mysqli_query($conn, $sql2);
           if ($result2) {
			echo 'Created';
	         
           }else {
			echo 'Error';
           }
		}
	}

	    //Load Composer's autoloader
		require '../vendor/autoload.php';
  

		use PHPMailer\PHPMailer\PHPMailer;
		use PHPMailer\PHPMailer\SMTP;
		use PHPMailer\PHPMailer\Exception;

    if($_POST["action"] == "email_send")
    {
			
	$pass = $_POST['password'];

	$name = $_POST['name'];
	
	$Email_Address = $_POST['email'];


		// hashing the password
        $pass1 = md5($pass);

		require ('../vendor-QR/autoload.php');
        $barcode = new \Com\Tecnick\Barcode\Barcode();
        $targetPath = "qr-code/";


		
        $qr_detail = $Email_Address.$pass1; 
        
        
        if (! is_dir($targetPath)) {
            mkdir($targetPath, 0777, true);
        }
        $bobj = $barcode->getBarcodeObj('QRCODE,H', $qr_detail, - 16, - 16, 'black', array(
            - 2,
            - 2,
            - 2,
            - 2
        ))->setBackgroundColor('#f0f0f0');
        
        $imageData = $bobj->getPngData();
        
        $file2 =  $imageData;
        
		$mail = new PHPMailer(true);
         //Server settings
		// $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
		$mail->isSMTP();                                            //Send using SMTP
		$mail->SMTPAuth   = true;                                   //Enable SMTP authentication

		$mail->Host       = "smtp.gmail.com";                     //Set the SMTP server to send through
		$mail->Username   = "yotravelmail@gmail.com";                     //SMTP username
		$mail->Password   = "iwsstymsrfxjocuq";                               //SMTP password

		$mail->SMTPSecure = "ssl";            //Enable implicit TLS encryption
		$mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

		//Recipients
		$mail->setFrom("yotravelmail@gmail.com", "Yo-travel");
		$mail->addAddress($Email_Address);     //Add a recipient

		$mail->isHTML(true);
		
		$mail->addStringAttachment($file2, 'Yo-travel-login.png');
		$mail->Subject = "Successfully Create Admin Account";

		$email_template = "
		<h2>Dear $name ,</h2>
		<h3>Your admin account successfully create on Yo-travel.com. You can access our system using your QR code. Your QR code is attached to this mail.</h3>
		<p>Yo-travel(PVT)Ltd</p>
		<p>Tel : 076 575 6616</p>
		<p>Address : 267/2,</p>
		<p>Ihalabiyanwila,</p>
		<p>Kadawatha</p>
		";

		$mail->Body = $email_template;
		$mail->send();

		}

	if($_POST["action"] == "G_email_send")
    {
			
	$pass = $_POST['password'];

	$name = $_POST['name'];
	
	$Email_Address = $_POST['email'];


		// hashing the password
        $pass1 = md5($pass);

		require ('../vendor-QR/autoload.php');
        $barcode = new \Com\Tecnick\Barcode\Barcode();
        $targetPath = "qr-code/";


		
        $qr_detail = $Email_Address.$pass1; 
        
        
        if (! is_dir($targetPath)) {
            mkdir($targetPath, 0777, true);
        }
        $bobj = $barcode->getBarcodeObj('QRCODE,H', $qr_detail, - 16, - 16, 'black', array(
            - 2,
            - 2,
            - 2,
            - 2
        ))->setBackgroundColor('#f0f0f0');
        
        $imageData = $bobj->getPngData();
        
        $file2 =  $imageData;
        
		$mail = new PHPMailer(true);
         //Server settings
		// $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
		$mail->isSMTP();                                            //Send using SMTP
		$mail->SMTPAuth   = true;                                   //Enable SMTP authentication

		$mail->Host       = "smtp.gmail.com";                     //Set the SMTP server to send through
		$mail->Username   = "yotravelmail@gmail.com";                     //SMTP username
		$mail->Password   = "iwsstymsrfxjocuq";                               //SMTP password

		$mail->SMTPSecure = "ssl";            //Enable implicit TLS encryption
		$mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

		//Recipients
		$mail->setFrom("yotravelmail@gmail.com", "Yo-travel");
		$mail->addAddress($Email_Address);     //Add a recipient

		$mail->isHTML(true);
		
		$mail->addStringAttachment($file2, 'Yo-travel-login.png');
		$mail->Subject = "Successfully Create Guider Account";

		$email_template = "
		<h2>Dear $name ,</h2>
		<h3>New guider account successfully create on Yo-travel.com. You can access our system using your QR code. Your QR code is attached with this mail.</h3>
		<p>Yo-travel(PVT)Ltd</p>
		<p>Tel : 076 575 6616</p>
		<p>Address : 267/2,</p>
		<p>Ihalabiyanwila,</p>
		<p>Kadawatha</p>
		";

		$mail->Body = $email_template;
		$mail->send();

		}
		