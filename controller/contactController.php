<?php
/**
 * Created by PhpStorm.
 * User: samuel
 * Date: 18/02/15
 * Time: 17:34
 */

namespace controller;


use application\BaseController;

class contactController extends BaseController{

    public function index()
    {
        if($this->isPOSTRequest())
        {
            if(isset($_POST['fullname']) && isset($_POST['email']))
            {
                $name = trim($_POST['fullname']);
                $email = trim($_POST['email']);
                $message = trim($_POST['message']);
                //$to = "info@teamhire.co.uk";
                $to = "info@teamhire.co.uk";
                $o = $this->sendMail($name, $email, $message, $to);
                $status = (($o === true) ? "pass" : "failed");
                header("Location: site/contactus?status=".$status);
                return true;
            }


            if(isset($_POST['proj_budget']))
            {
                $budget = trim($_POST['proj_budget']);
                $deadLine = trim($_POST['proj_deadline']);
                $project = trim($_POST['proj_desc']);
                $name = trim($_POST['proj_name']);
                $email = trim($_POST['proj_email']);
                $phone = trim($_POST['proj_phone']);
                $message = "The Customers Phone number: ".$phone." \r\n";
                $message .= "The Customers email address ".$email." \r\n";
                $message .= "The customers budget ".$budget." \r\n";
                $message .= "The customers expected deadline (in weeks) ".$deadLine." \r\n";
                $message .= "The customers project description ".$project." \r\n";

                $to = "sales@teamhire.co.uk";
                $o = $this->sendMail($name, $email, $message, $to);
                $status = (($o === true) ? "pass" : "failed");
                header("Location: site/contactus?status=".$status);
                return true;
            }
        }


        header("Location: index");
        return false;
    }

    private function sendMail($senderName, $senderEmail, $message, $receiverEmail = "info@teamhire.co.uk")
    {
        $headers = "From: ".$senderName." <".$senderEmail."> \r\n";
        $headers .= "Reply-To: ".$senderName." <".$senderEmail."> \r\n";
        $headers .= "MIME-Version: 1.0\r\n";
        $headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
        $mail = mail($receiverEmail, "Notification From Team Hire", $message, $headers);

        if($mail === true)
        {
            return true;
        }

        return false;
    }
} 