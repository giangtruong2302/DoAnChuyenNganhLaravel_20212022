<?php
include "PHPMailer/src/PHPMailer.php";
include "PHPMailer/src/Exception.php";
include "PHPMailer/src/OAuth.php";
include "PHPMailer/src/POP3.php";
include "PHPMailer/src/SMTP.php";
 
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
class Mailer{
    public function dangky($mailden){
        $mail=new PHPMailer(true);
        //print_r($mail);
        try {
            //Server settings
            $mail->SMTPDebug = 0; //khong mún show                                // Enable verbose debug output
            $mail->isSMTP();                                      // Set mailer to use SMTP
            $mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
            $mail->SMTPAuth = true;                               // Enable SMTP authentication
            $mail->Username = 'duongtruonggiang1215@gmail.com';                 // SMTP username
            $mail->Password = 'qskgnjxczabpctje';                           // SMTP password
            $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
            $mail->Port = 587;                                    // TCP port to connect to
        
            //Recipients
            $mail->setFrom('duongtruonggiang1215@gmail.com', 'Mailer');
            $mail->addAddress($mailden, 'Truong Giang');     // Add a recipient
            //$mail->addAddress('giangca23022000@gmail.com','Giang Ca');               // Name is optional
            //$mail->addAddress('phanducstud18@gmail.com','Duck');
            //$mail->addReplyTo('info@example.com', 'Information');
            //$mail->addCC('cc@example.com');
            //$mail->addBCC('bcc@example.com');
        
            //Attachments
            //$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
            //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
        
            //Content
            $mail->isHTML(true);                                  // Set email format to HTML
            $mail->Subject = 'Register account';
            $mail->Body    = 'Chúc mừng bạn đã đăng ký tài khoản thành công tại web của tôi ! visit me
                                https://truonggiangstu.000webhostapp.com/';
            //$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
        
            $mail->send();
            //echo('mail sent access');
            //header('location: ../index.php');
            echo '<script>swal("đăng ký thành công,"vui lòng check mail để kiểm tra","success")</script>';

        } catch (Exception $e) {
            echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
        }
    }
    public function phanhoi($mailden,$ten,$tieude,$noidung){
        $mail=new PHPMailer(true);
        //print_r($mail);
        try {
            //Server settings
            $mail->SMTPDebug = 0; //khong mún show                                // Enable verbose debug output
            $mail->isSMTP();                                      // Set mailer to use SMTP
            $mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
            $mail->SMTPAuth = true;                               // Enable SMTP authentication
            $mail->Username = 'duongtruonggiang1215@gmail.com';                 // SMTP username
            $mail->Password = 'qskgnjxczabpctje';                           // SMTP password
            $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
            $mail->Port = 587;                                    // TCP port to connect to
        
            //Recipients
            $mail->setFrom('duongtruonggiang1215@gmail.com', 'Mailer');
            $mail->addAddress($mailden, $ten);     // Add a recipient
            //$mail->addAddress('giangca23022000@gmail.com','Giang Ca');               // Name is optional
            //$mail->addAddress('phanducstud18@gmail.com','Duck');
            //$mail->addReplyTo('info@example.com', 'Information');
            //$mail->addCC('cc@example.com');
            //$mail->addBCC('bcc@example.com');
        
            //Attachments
            //$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
            //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
        
            //Content
            $mail->isHTML(true);                                  // Set email format to HTML
            $mail->Subject = $tieude;
            $mail->Body    = $noidung;
            //$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
        
            $mail->send();
            //echo('mail sent access');
            //header('location: ../index.php');
            echo '<script>swal("đăng ký thành công,"vui lòng check mail để kiểm tra","success")</script>';

        } catch (Exception $e) {
            echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
        }
    }
}