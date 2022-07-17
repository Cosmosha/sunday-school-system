<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;

require_once "mailer/PHPMailer.php";

require_once "mailer/SMTP.php";

require_once "mailer/Exception.php";

require "./models/users.model.php";

class Mailier {

    static public function SendMail($message, $subject, $email){

        //
        // ─── Mail Send Sample Code ──────────────────────────────────────────────────────────────────────────
        //

        $mail = new PHPMailer();

        $receiver = $email;

        $sender = 'no-reply@menosoftech.com';

        //Get Church ID from User

        $table = "user";
        $item = "user_email";
        $result = ModelUsers::MdlShowUsers($table, $item, $receiver);

        $churchid = $result["church_id"];

        //Get Church Initials from CHURCH DB
        $table1 = "church";
        $item1 = "church_id";

        $answer = ModelUsers::MdlShowUsers($table1, $item1, $churchid);
        
        if ($answer["church_id"] == $churchid) {
            # code...
            $church = $answer["initials"];
        }


        $year = date("Y");
        ;

        $cm = "Children's Ministry";


        try {
            //Server settings
            // $mail->SMTPDebug  = SMTP::DEBUG_SERVER; 
            $mail->isSMTP();                                            //Send using SMTP
            $mail->Host       = 'mail.menosoftech.com';   
                              //Set the SMTP server to send through
            $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
            $mail->Username   =  $sender;                     //SMTP username
            $mail->Password   = 'meno@Soft!';                               //SMTP password
            // $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;            //Enable implicit TLS encryption 
            // $mail->Port       = 587;                                   //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
                                                                        // use 465 if you have set 'SMTPSecure = PHPMailer::ENCRYPTION_SMTPS'

            $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
            $mail->Port       = 465;


            // Sender 
            $mail->setFrom($sender, $church.' '.$cm);

            //Recipients
            
            $mail->addAddress($receiver);     //Add a recipient
            // $mail->addReplyTo('no-reply@gmail.com', 'No-Reply');
            $mail->WordWrap = 50;


            //Attachments
            // $mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
            // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name


            $footer = '<br/><br/> <br>--<br><br>';
            $footer .= '<p><strong class="w-50s" style="font-size: 15px; font-weight: bold;">Disclaimer and confidentiality note: </strong></p> 
                        <p>This information may be confidential or privileged. Any unauthorized disclosure is strictly prohibited. <br>
                        Your data has been incorporated into our privacy system to manage your request </p><br>';
            $footer .= '<img src="cid:menosoft" width="500px" height="150px">';
            $mail->addEmbeddedImage(dirname(__FILE__).'/menosoft.png', 'menosoft');
            $footer .= '<br> © Menosoft '.$year.' | Menosoft Technology <br>
                         Metal Cross Street 7 | Takoradi, WR | GH <br>
                        +233-27-350-9432';
            $footer .= '<br><p>Visit Our Website: <a href="http://menosoftech.com"><strong style="font-style: italic ">www.menosoftech.com</strong></a></p>';


            //Content
            $mail->isHTML(true);                                  //Set email format to HTML
            
            $mail->Subject = $subject;
            $mail->Body    = $message.$footer;
            

            // $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
   


            $mail->send();
          //  echo '<p class="text-center text-success">Email has been sent</p>';
            echo' <div class="alert alert-success text-center"> <i class="ti-user"></i> Reset Password has been sent.
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">×</span> </button>
                     </div>'; 
            
        } catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }
    }
}


