<?php
    require_once 'vendor/autoload.php';

    class Sendmail{
        public static function SendMail($to,$subject,$content){
            $key = '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';

            $email = new \SendGrid\Mail\Mail();
            $email->setFrom("oussamagrimida1970@gmail.com","Oussama Grimida");
            $email->setSubject($subject);
            $email->addTo($to);
            $email->addContent("text/plain", $content);

            $sendgrid = new \SendGrid($key);

            try{
                $response = $sendgrid->send($email);
                return $response;
            }catch(Exception $e){
                echo 'Email exception Caught :'. $e->getMessage() ."\n";
                return false;
            }
        }
    }

?>