<?php if ( ! defined( 'BASEPATH' ) ) exit( 'No direct script access allowed' );

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require_once ( APPPATH . 'PHPMailer/Exception.php' );
require_once ( APPPATH . 'PHPMailer/SMTP.php' );
require_once ( APPPATH . 'PHPMailer/PHPMailer.php' );

if ( ! function_exists( 'sendemail' ) ) 
 {

    function sendemail( $request )
 {
        $errors = array();
        $mail = new PHPMailer();

        $email = $request[ 'email' ];
        $receiver = $email;
        $subject = $request[ 'subject' ];
        $message =  $request[ 'message' ];
        $name =  $request[ 'name' ];
        $body = $message;

        $mail->isSMTP();
        $mail->Host =  $_ENV[ 'SMTP_SERVER' ];
        $mail->SMTPAuth = true;
        $mail->Username = $_ENV[ 'EMAIL_USERNAME' ];
        $mail->Password =  $_ENV[ 'EMAIL_PASSWORD' ];
        $mail->Port = 587;
        $mail->SMTPSecure = 'tls';

        // Email Settings
        $mail->isHTML( true );
        $mail->setFrom( $_ENV[ 'EMAIL_SETFROM' ], $name );
        $mail->addAddress( $receiver );
        $mail->Subject = $subject;
        $mail->Body = $body;

        if ( $mail->send() ) {
            $status = 'success';
            $response = 'Email is sent!';
        } else {
            $status = 'failed';
            $response = 'Something is wrong: <br><br>' . $mail->ErrorInfo;
        }
        // echo $mail->SMTPDebug = SMTP::DEBUG_SERVER;
        // Enable verbose debug output

        return $status;
        return $response;
        // echo 'ron';

    }

}

