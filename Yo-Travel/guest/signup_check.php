<?php 
session_start(); 


		require_once "db_conn.php";

		use PHPMailer\PHPMailer\PHPMailer;
		use PHPMailer\PHPMailer\SMTP;
		use PHPMailer\PHPMailer\Exception;

    if($_POST["action"] == "email_send")
    {

	
	$pass = $_POST['password'];

	$pass1 = md5($pass);
	$name = $_POST['name'];
	$Email_Address = $_POST['email'];
	






    //Load Composer's autoloader
    require '../vendor/autoload.php';
  



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
		$mail->Password   = "yotravel@password#1234";                               //SMTP password

		$mail->SMTPSecure = "tls";            //Enable implicit TLS encryption
		$mail->Port       = 587;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

		//Recipients
		$mail->setFrom("yotravelmail@gmail.com", "Yo-travel");
		$mail->addAddress($Email_Address);     //Add a recipient

		$mail->isHTML(true);
		
		$mail->addStringAttachment($file2, 'Yo-travel-login.png');
		$mail->Subject = "Successfully created a new account";

		$email_template = "
		<h2>Dear $name ,</h2>
		<h3>You have successfully created a new account on Yo-travel.com. You can access our system using your QR code. Your QR code is attached to this mail.</h3>
		<p>Yo-travel(PVT)Ltd</p>
		<p>Tel : 076 575 6616</p>
		<p>Address : 267/2,</p>
		<p>Ihalabiyanwila,</p>
		<p>Kadawatha</p>
		";

		$mail->Body = $email_template;
		$mail->send();

		
		}
	if($_POST["action"] == "new_user_register")
    {

	$uname = $_POST['uname'];
	$pass = $_POST['regi_password'];

	$re_pass = $_POST['re_password'];
	$name = $_POST['name'];
	$Age = $_POST['age'];
	$Address = $_POST['address'];
	$Email_Address = $_POST['email_address'];
	$Phone_Number = $_POST['cnumber'];
	$status = 1;


		// hashing the password
        $pass = md5($pass);

	    $sql = "SELECT * FROM users WHERE Email_Address='$Email_Address' ";
		$result = mysqli_query($conn, $sql);

		if (mysqli_num_rows($result) > 0) {
			echo 'email';
			
		}else {
           $sql2 = "INSERT INTO users(User_Name, Name, Password, Age, Address, Email_Address, Phone_Number, U_Status ) VALUES('$uname','$name','$pass', '$Age', '$Address', '$Email_Address', '$Phone_Number', '$status')";
           $result2 = mysqli_query($conn, $sql2);
           if ($result2) {
			echo 'success';
			
           }else {
			echo 'error';
           }
		}
	}
	