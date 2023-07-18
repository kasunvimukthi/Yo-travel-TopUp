<?php 

    require_once('includes/check_login.php');
    
    use Phppot\Order;
    //Load Composer's autoloader
    require '../vendor/autoload.php';
  

    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;



    function send_invoice($get_name,$get_email)
    {

    require_once('../tcpdf/config/tcpdf_config.php');
    require_once('../tcpdf/tcpdf.php');

    $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

    // set document information
    $pdf->SetCreator(PDF_CREATOR);
    $pdf->SetAuthor('Vimukthi Perera');
    $pdf->SetTitle('Yo-travel Invoice');
    $pdf->SetSubject('TCPDF Tutorial');
    $pdf->SetKeywords('TCPDF, PDF, example, test, guide');

    // set default header data
    $pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE, PDF_HEADER_STRING, array(0,64,255), array(0,64,128));
    $pdf->setFooterData(array(0,64,0), array(0,64,128));

    // set header and footer fonts
    $pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
    $pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

    // set default monospaced font
    $pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

    // set margins
    $pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
    $pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
    $pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

    // set auto page breaks
    $pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

    // set image scale factor
    $pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

    // set some language-dependent strings (optional)
    if (@file_exists(dirname(__FILE__).'/lang/eng.php')) {
        require_once(dirname(__FILE__).'/lang/eng.php');
        $pdf->setLanguageArray($l);
    }

    // ---------------------------------------------------------

    // set default font subsetting mode
    $pdf->setFontSubsetting(true);

    // Set font
    // dejavusans is a UTF-8 Unicode font, if you only need to
    // print standard ASCII chars, you can use core fonts like
    // helvetica or times to reduce file size.
    $pdf->SetFont('dejavusans', '', 14, '', true);




    // Add a page
    // This method has several options, check the source code documentation for more information.
    $pdf->AddPage();

    // set text shadow effect
    $pdf->setTextShadow(array('enabled'=>true, 'depth_w'=>0.2, 'depth_h'=>0.2, 'color'=>array(196,196,196), 'opacity'=>1, 'blend_mode'=>'Normal'));

    // Set some content to print
    // require_once __DIR__ . 'C:\xampp\htdocs\Yo-Travel\template\check_login.php';

    require_once __DIR__ . './invoice_pdf_template.php';


            $html = invoice($result);

    // Print text using writeHTMLCell()
    $pdf->writeHTMLCell(0, 0, '', '', $html, 0, 1, 0, true, '', true);

    // ---------------------------------------------------------

    // Close and output PDF document
    // This method has several options, check the source code documentation for more information.
    $file = $pdf->Output('Yo-travel.pdf', 'S');

    //============================================================+
    // END OF FILE
    //============================================================+

    require ('../vendor-QR/autoload.php');
        $barcode = new \Com\Tecnick\Barcode\Barcode();
        $targetPath = "qr-code/";

        include "db_conn.php";
        $query = "SELECT *FROM `invoice` WHERE User_ID = {$_SESSION["User_ID"]} ORDER BY Invoice_Number desc LIMIT 1";
        $result2 = mysqli_query($conn, $query);
    
        while($result=mysqli_fetch_array($result2))
        {
        $qr_detail = $result["Invoice_Number"];
        $output = '

        ';
        
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
        }
        // ========================================================
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
    $mail->addAddress($get_email);     //Add a recipient

    $mail->isHTML(true);
    $mail->addStringAttachment($file, 'Yo-travel.pdf');
    $mail->addStringAttachment($file2, 'Yo-travel.png');
    $mail->Subject = "Travel Booking Successful";

    $email_template = "
    <h2>Dear $get_name ,</h2>
    <h3>Your invoice received us. Please deposite to invoice ammount to our bank Account.
    
    Bank : xxxxxxxx
    Account No :xxxx xxxx  xxxx
    Account Name : xxxx xxxx

     Your invoice & QR Code attached with this mail.</h3>
    <p>Yo-travel(PVT)Ltd</p>
    <p>Tel : 076 575 6616</p>
    <p>Address : 267/2,</p>
    <p>Ihalabiyanwila,</p>
    <p>Kadawatha</p>
    ";

    $mail->Body = $email_template;
    $mail->send();

    // if (!$mail->send()){
    //     echo 'mailer error';
    // }else{
    //     echo 'sent';
    // }

    }

    if(isset($_POST['action']))
    {
    if($_POST["action"] == "invoice_send")
    {

    $get_name = $_SESSION['Name'];
    $get_email = $_SESSION['Email_Address'];

    send_invoice($get_name,$get_email);
        


    }
}
?>