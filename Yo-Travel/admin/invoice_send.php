<?php 
        use PHPMailer\PHPMailer\PHPMailer;
        use PHPMailer\PHPMailer\SMTP;
        use PHPMailer\PHPMailer\Exception;

    require '../vendor/autoload.php';


    function send_invoice($get_name,$get_email,$msg,$sub)
    {
    $mail = new PHPMailer(true);
         //Server settings
    // $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
    $mail->isSMTP();                                            //Send using SMTP
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication

    $mail->Host       = "smtp.gmail.com";                     //Set the SMTP server to send through
    $mail->Username   = "yotravelmail@gmail.com";                     //SMTP username
    $mail->Password   = "mrdylmwjwqagvlra";                               //SMTP password

    $mail->SMTPSecure = "tls";            //Enable implicit TLS encryption
    $mail->Port       = 587;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

    //Recipients
    $mail->setFrom("yotravelmail@gmail.com", "Yo-travel");
    $mail->addAddress($get_email);     //Add a recipient

    $mail->isHTML(true);
    $mail->Subject = $sub;

    $email_template = "
    <h3>Dear $get_name ,</h3>
    <p>$msg</p>
    <p></p>
    <p></p>
    <p>Yo-travel(PVT)Ltd</p>
    <p>Tel : 0123456789</p>
    <p>Address : 123/03,</p>
    <p>Colombo,</p>
    <p>Sri Lanka</p>
    ";

    $mail->Body = $email_template;
    $mail->send();


    }

    if(isset($_POST['action']))
    {
    if($_POST["action"] == "invoice_send")
    {
    
    $IID =$_POST["IID"];
    $ID =$_POST["ID"];
    $txt =$_POST["txt"];
    $start =$_POST["start"];

    $get_name = $_POST['name'];
    $get_email = $_POST['email'];
    $sub ='';
    $msg ='';
    
    if($ID == 1){
        $sub = 'Payment Recived';
        $msg = "Your Payment Recived US!. Ready to your travel on $start. Invoice No: $IID. $txt. If you have any problem, Please contact Us.";
    }else{
        $sub = 'Payment Canceld!';
        $msg = "We are canceld your payment.Invoice No: $IID. $txt. If you have any problem, Please contact Us.";
    }
    send_invoice($get_name,$get_email,$msg,$sub);
        


    }
}
?>