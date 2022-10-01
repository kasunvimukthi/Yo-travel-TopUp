<?php 
session_start(); 
include "db_conn.php";

    //Load Composer's autoloader
    require '../vendor/autoload.php';
  

    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;

if (isset($_POST['email']) && isset($_POST['new_pass'])
    && isset($_POST['code']) && isset($_POST['con_pass'])) {

	function validate($data){
       $data = trim($data);
	   $data = stripslashes($data);
	   $data = htmlspecialchars($data);
	   return $data;
	}

	$code = validate($_POST['code']);
    
	$pass = validate($_POST['new_pass']);

	$re_pass = validate($_POST['con_pass']);

	$Email_Address = validate($_POST['email']);

    
	if($pass !== $re_pass){
		$_SESSION['status'] = "The confirmation password does not match";
		$_SESSION['status_code'] ="info";
		header("Location: ../guest/password_reset_now.php");
	    exit();
	}
    

	else{

		// hashing the password
        $pass = md5($pass);

        $sql = "SELECT * FROM users WHERE Email_Address='$Email_Address' ";
		$result = mysqli_query($conn, $sql);

		if (mysqli_num_rows($result) > 0) {

            $row = mysqli_fetch_array($result);
            $code1 = $row['Code'];
            $name = $row['Name'];

            if($code1 !== $code){

                $_SESSION['status'] = "The Confirmation Code is Wrong";
                $_SESSION['status_code'] ="info";
                header("Location: ../guest/password_reset_now.php");
                exit();
            }
            else {
                $sql2 = "UPDATE users SET Password='$pass' WHERE Email_Address='$Email_Address' LIMIT 1";
                $result2 = mysqli_query($conn, $sql2);
     
                if ($result2) {
                 $_SESSION['status'] = "Your account password updated successfully";
                 $_SESSION['status_code'] ="success";
                 header("Location: ../guest/index.php");
                 send_login_qr_code($Email_Address,$pass,$name);
                  exit();
                }else {
                 $_SESSION['status'] = "unknown error occurred";
                 $_SESSION['status_code'] ="error";
                 header("Location: ../guest/index.php");
                     exit();
                }
             }

		}
	}
	
}else{
	header("Location: index.php");
	exit();
}


function send_login_qr_code($Email_Address,$pass,$name)
    {
		require ('../vendor-QR/autoload.php');
        $barcode = new \Com\Tecnick\Barcode\Barcode();
        $targetPath = "qr-code/";


		
        $qr_detail = $Email_Address.$pass; 
        
        
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
		$mail->Subject = "Successfully reset account password";

		$email_template = "
		<h2>Dear $name ,</h2>
		<h3>You have successfully reset your account password on Yo-travel.com. You can access our system using your new QR code. Your new QR code is attached to this mail.</h3>
		<p>Yo-travel(PVT)Ltd</p>
		<p>Tel : 076 575 6616</p>
		<p>Address : 267/2,</p>
		<p>Ihalabiyanwila,</p>
		<p>Kadawatha</p>
		";

		$mail->Body = $email_template;
		$mail->send();

		}