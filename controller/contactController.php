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
                $message = $this->salesEmail($name, $email, $phone, $budget, $deadLine, $project);

                //$to = "sales@teamhire.co.uk";
                $to = "sales@teamhire.co.uk";
                $o = $this->sendMail($name, $email, $message, $to);
                $status = (($o === true) ? "pass" : "failed");
                header("Location: site/getquote?status=".$status);
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
        $headers .= "Content-Type: text/html; charset=UTF-8\r\n";
        $mail = mail($receiverEmail, "Notification From Team Hire", $message, $headers);

        if($mail === true)
        {
            return true;
        }

        return false;
    }
    
    
    private function salesEmail($name, $email, $phone, $budget, $duration, $message)
    {
        $msg = '<!DOCTYPE html>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<title>Team Hire</title>
	</head>
	<body bgcolor="#ebebeb" leftmargin="0" topmargin="0" marginwidth="0" marginheight="0" style="-webkit-text-size-adjust: none; -ms-text-size-adjust: none; font-family: Arial, Helvetica, \'Sans-Serif\'; margin: 0; padding: 10px 0;">

    <br>
		
		<!-- 100% wrapper (Black background) -->
		<table border="0" width="100%" height="100%" cellpadding="0" cellspacing="0" bgcolor="#ebebeb" style="border-spacing: 0;">
			<tr><!-- each & every content should be inside this <td> -->
				<td align="center" valign="top" bgcolor="#ebebeb" style="border-collapse: collapse; font-size: 13px; line-height: 23px; font-family: Arial, Helvetica, \'Sans-Serif\'; color: #727272; background-color: #ebebeb;">
					
					<!-- Above mail body text -->
					<table border="0" cellpadding="0" cellspacing="0" align="center" style="border-spacing: 0;">
						<tr><!-- Text above the header -->
							<td style="padding-bottom: 20px; padding-top: 20px; text-align: center; color: #898989; border-collapse: collapse; font-size: 13px; line-height: 23px; font-family: Arial, Helvetica, \'Sans-Serif\';" align="center">
        Email not displaying correctly? <a href="#" style="text-decoration: underline; color: #de5737;">View it in your browser.</a>
							</td>
						</tr>
					</table>
					
					<!-- 600px container (white background) -->
					<table border="0" width="600" cellpadding="0" cellspacing="0" class="container" bgcolor="#ffffff" style="border-spacing: 0;">
						<tr><!-- Main body -->
							<td class="container-padding" bgcolor="#ffffff" style="padding-left: 30px; padding-right: 30px; font-size: 14px; line-height: 20px; font-family: Helvetica, \'Sans-Serif\'; color: #333; text-align: left; border-collapse: collapse; background-color: #ffffff;" align="left">
								
								<br><br>
								
								<!-- Logo and Navigation menu area -->
								<table border="0" cellpadding="0" cellspacing="0" class="columns-container" style="border-spacing: 0;">
									<tr><!-- Header -->
										<td class="force-col" style="padding-right: 20px; border-collapse: collapse; font-size: 13px; line-height: 23px; font-family: Arial, Helvetica, \'Sans-Serif\'; color: #727272;" valign="top">
											
											<!-- ### COLUMN 1 ### -->
											<table border="0" cellspacing="0" cellpadding="0" width="260" align="left" class="col-2" style="border-spacing: 0;">
												<tr>
													<td style="border-collapse: collapse; font-size: 13px; line-height: 23px; font-family: Arial, Helvetica, \'Sans-Serif\'; color: #727272;">
													<!-- Logo image -->
													<a href="http://www.teamhire.co.uk"><img src="http://www.teamhire.co.uk/view/img/teamhirlogo.png" alt="" border="0" height="55"></a>
													</td>
												</tr>
											</table>
											
										</td>
										<td class="force-col" valign="top" style="border-collapse: collapse; font-size: 13px; line-height: 23px; font-family: Arial, Helvetica, \'Sans-Serif\'; color: #727272;">
												
											<!-- ### COLUMN 2 ### -->
											<table border="0" cellspacing="0" cellpadding="0" width="260" align="right" class="col-2" id="last-col-2" style="border-spacing: 0;">
												<tr>
													<td style="padding-top: 10px; text-align: right; border-collapse: collapse; font-size: 13px; line-height: 23px; font-family: Arial, Helvetica, \'Sans-Serif\'; color: #727272;" align="right">
														<!-- Menu links -->
														<a href="http://www.teamhire.co.uk/site/aboutus" style="text-decoration: underline; color: #de5737;">About us</a>  
														<a href="http://www.teamhire.co.uk/site/ourservices" style="text-decoration: underline; color: #de5737;">Services</a>  
														<a href="http://www.teamhire.co.uk/site/howitworks" style="text-decoration: underline; color: #de5737;">How It Works</a>  
													</td>
												</tr>
											</table>
											
										</td>
									</tr>
								</table>
								
								<br><hr style="border-top-color: #dadada; border-top-style: solid; border-width: 1px 0 0;"><br>
								
								<!-- Banner, Image, heading, paragraph -->
								<table border="0" cellpadding="0" cellspacing="0" class="columns-container" style="border-spacing: 0;">
									<tr>

                                        <td class="force-col" style="padding-right: 20px; border-collapse: collapse; font-size: 13px; line-height: 23px; font-family: Arial, Helvetica, \'Sans-Serif\'; color: #727272;" valign="top">

                                            <!-- ### COLUMN 1 ### -->
                                            <table border="0" cellspacing="0" cellpadding="0" width="260" align="left" class="col-2" style="border-spacing: 0;">
                                                <tr>
                                                    <td style="margin-top: 0; margin-bottom: 0; text-align: left; border-collapse: collapse; font-size: 13px; line-height: 23px; font-family: Arial, Helvetica, \'Sans-Serif\'; color: #727272;" align="left">
                                                        <a href="#"><img src="http://www.teamhire.co.uk/view/img/icon/8.png" alt="" border="0" height="20" style="vertical-align: middle; display: inline-block; margin-right: 4px;"></a>
                                                        <a href="#" style="text-decoration: none; font-weight: bold; color: #6e6e6e;">Company/Name</a>
                                                        <br>
                                                        <span style="position:relative; left:40px;"><b>'.$name.'</b></span>
                                                    </td>
                                                </tr>
                                            </table>

                                        </td>
                                        <td class="force-col" valign="top" style="border-collapse: collapse; font-size: 13px; line-height: 23px; font-family: Arial, Helvetica, \'Sans-Serif\'; color: #727272;">

                                            <!-- ### COLUMN 3 ### -->
                                            <table border="0" cellspacing="0" cellpadding="0" width="260" align="left" class="col-2" id="last-col-2" style="border-spacing: 0;">
                                                <tr>
                                                    <td style="margin-top: 0; margin-bottom: 0; line-height: 23px; border-collapse: collapse; font-size: 13px; font-family: Arial, Helvetica, \'Sans-Serif\'; color: #727272;">
                                                        <a href="#"><img src="http://www.teamhire.co.uk/view/img/icon/7.png" alt="" border="0" height="20" style="vertical-align: middle; display: inline-block; margin-right: 4px;"></a>
                                                        <a href="#" style="text-decoration: none; font-weight: bold; color: #6e6e6e;">Email Address/Phone</a>
                                                        <br>
                                                        <span style="position:relative; left:25px;"><b>'.$email.' , '.$phone.'</b></span><br />
                                                    </td>
                                                </tr>
                                            </table>

                                        </td>
									</tr>
                                    <tr>

                                        <td class="force-col" style="padding-right: 20px; border-collapse: collapse; font-size: 13px; line-height: 23px; font-family: Arial, Helvetica, \'Sans-Serif\'; color: #727272;" valign="top">

                                            <!-- ### COLUMN 1 ### -->
                                            <br />
                                            <table border="0" cellspacing="0" cellpadding="0" width="260" align="left" class="col-2" style="border-spacing: 0;">
                                                <tr>
                                                    <td style="margin-top: 0; margin-bottom: 0; text-align: left; border-collapse: collapse; font-size: 13px; line-height: 23px; font-family: Arial, Helvetica, \'Sans-Serif\'; color: #727272;" align="left">
                                                        <a href="#"><img src="http://www.teamhire.co.uk/view/img/icon/1.png" alt="" border="0" height="20" style="vertical-align: middle; display: inline-block; margin-right: 4px;"></a>
                                                        <a href="#" style="text-decoration: none; font-weight: bold; color: #6e6e6e;">Project Expected Delivery</a>
                                                        <br>
                                                        <span style="position:relative; left:40px;"><b>'.$duration.' Weeks</b></span>
                                                    </td>
                                                </tr>
                                            </table>

                                        </td>

                                        <td class="force-col" valign="top" style="border-collapse: collapse; font-size: 13px; line-height: 23px; font-family: Arial, Helvetica, \'Sans-Serif\'; color: #727272;">

                                            <!-- ### COLUMN 3 ### -->
                                            <br />
                                            <table border="0" cellspacing="0" cellpadding="0" width="260" align="left" class="col-2" id="last-col-2" style="border-spacing: 0;">
                                                <tr>
                                                    <td style="margin-top: 0; margin-bottom: 0; line-height: 23px; border-collapse: collapse; font-size: 13px; font-family: Arial, Helvetica, \'Sans-Serif\'; color: #727272;">
                                                        <a href="#"><img src="http://www.teamhire.co.uk/view/img/icon/4.png" alt="" border="0" height="20" style="vertical-align: middle; display: inline-block; margin-right: 4px;"></a>
                                                        <a href="#" style="text-decoration: none; font-weight: bold; color: #6e6e6e;">Project Budget</a>
                                                        <br>
                                                        <span style="position:relative; left:25px;"><b>'.htmlentities($budget).'</b></span><br />
                                                    </td>
                                                </tr>
                                            </table>

                                        </td>
                                    </tr>

								</table>

								<br><hr style="border-top-color: #dadada; border-top-style: solid; border-width: 1px 0 0;"><br>
								
								<!-- Heading paragraph button -->
								<table border="0" cellpadding="0" cellspacing="0" style="border-spacing: 0;">
									<tr><!-- Text above the header -->
										<td style="text-align: left; border-collapse: collapse; font-size: 13px; line-height: 23px; font-family: Arial, Helvetica, \'Sans-Serif\'; color: #727272; margin: 0;" align="left">
											<a href="#" style="text-decoration: none; color: #6e6e6e; font-weight: bold; text-transform: capitalize;">Message</a><br /> '.$message.'
										</td>
									</tr>
								</table>

								<br><hr style="border-top-color: #dadada; border-top-style: solid; border-width: 1px 0 0;"><br>


								<br><br>
								
								<!-- Footer -->
								<table border="0" cellpadding="0" cellspacing="0" class="columns-container" style="border-spacing: 0; background-color: #f8f8f8; padding: 15px; border: 1px solid #ededed;" bgcolor="#f8f8f8">
									<tr>
										<td class="force-col" style="padding-right: 20px; border-collapse: collapse; font-size: 13px; line-height: 23px; font-family: Arial, Helvetica, \'Sans-Serif\'; color: #727272;" valign="top">
											
											<!-- ### COLUMN 1 ### -->
											<table width="245" border="0" cellpadding="0" cellspacing="0" align="left" class="col-2" style="border-spacing: 0;">
												<tr>
													<td style="text-align: left; border-collapse: collapse; font-size: 13px; line-height: 23px; font-family: Arial, Helvetica, \'Sans-Serif\'; color: #727272; margin: 0;" align="left">
														<!-- Logo image -->
														<a href="#"><img src="http://www.teamhire.co.uk/view/img/teamhirlogo.png" alt="" border="0" height="55"></a><br>
    Team Hire - Plati Tech Limited BEC, 50 Cambridge Road Barking, London United Kingdom<br>e-mail : <a href="#" style="text-decoration: underline; color: #de5737;">info@teamhire.co.uk</a>
													</td>
												</tr>
											</table>
											
										</td>
										<td class="force-col" valign="top" style="border-collapse: collapse; font-size: 13px; line-height: 23px; font-family: Arial, Helvetica, \'Sans-Serif\'; color: #727272;">
											
											<!-- ### COLUMN 2 ### -->
											<table border="0" cellspacing="0" cellpadding="0" width="245" align="right" class="col-2" id="last-col-2" style="border-spacing: 0;">
												<tr>
													<td style="margin-top: 0; margin-bottom: 0; font-size: 12px; text-align: left; border-collapse: collapse; line-height: 23px; font-family: Arial, Helvetica, \'Sans-Serif\'; color: #727272;" align="left">
														<a href="#" style="text-decoration: none; font-weight: bold; color: #6e6e6e;">Team Hire</a><br>
    The information contained in this message or any of its attachments may be privileged and confidential and intended for the exclusive use of the addressee.
                                                        If you are not the intended addressee any disclosure, reproduction, distribution or other dissemination or use of this communication is strictly prohibited.
    Please notify the sender immediately by replying to the message and deleting it from your computer. Messages sent to and from Team Hire or Plati Tech Limited may be monitored.
    Internet communications cannot be guaranteed to be secured or error-free as information could be intercepted, corrupted, lost, destroyed, arrive late or incomplete,
                                                        or contain viruses. Please rely on your own virus checker and procedures with regard to any attachment to this message.
													</td>
												</tr>
											</table>
											
										</td>
									</tr>
								</table>
								
								<br>
								
								<!-- Social -->
								<table border="0" cellpadding="0" cellspacing="0" align="left" style="border-spacing: 0;">
									<tr>
										<td style="padding-bottom: 20px; font-size: 12px; line-height: 40px; color: #545454; border-collapse: collapse; font-family: Arial, Helvetica, \'Sans-Serif\';">
        Social :    
    <!-- links -->
											<img src="http://www.teamhire.co.uk/view/img/icon/facebook.png" height="25" alt="" style="vertical-align: middle;">  
											<a href="#" style="text-decoration: none; color: #de5737;">Facebook</a>    
											<img src="http://www.teamhire.co.uk/view/img/icon/twitter.png" height="25" alt="" style="vertical-align: middle;">  
											<a href="#" style="text-decoration: none; color: #de5737;">Twitter</a>    
											<img src="http://www.teamhire.co.uk/view/img/icon/google.png" height="25" alt="" style="vertical-align: middle;">  
											<a href="#" style="text-decoration: none; color: #de5737;">Google</a>    
											<img src="http://www.teamhire.co.uk/view/img/icon/blog.png" height="25" alt="" style="vertical-align: middle;">  
											<a href="#" style="text-decoration: none; color: #de5737;">Rss</a>
										</td>
									</tr>
								</table>
							</td>
						</tr><!-- Mail body end -->
					</table>
					<!-- 600px container end -->
					
				</td>
				<!-- each & every content should be inside above </td> -->
			</tr>
		</table>
		<!-- 100% wrapper end -->
	
		<style type="text/css">
			.ReadMsgBody { width: 100% !important; background-color: #ebebeb !important; }
			.ExternalClass { width: 100% !important; background-color: #ebebeb !important; }
			.ExternalClass { line-height: 100% !important; }
			body { -webkit-text-size-adjust: none !important; -ms-text-size-adjust: none !important; font-family: Arial, Helvetica, \'Sans-Serif\' !important; margin: 0 !important; padding: 0 !important; }
			.yshortcuts a {border-bottom: none !important;}


			/* Constrain email width for small screens */
			@media screen and (max-width: 600px) {
                table[class="container"] {
                    width: 95% !important;
                }
			}

			/* Give content more room on mobile */
			@media screen and (max-width: 480px) {
                td[class="container-padding"] {
                    padding-left: 12px !important;
					padding-right: 12px !important;
				}
			 }

      
			/* Styles for forcing columns to rows */
			@media only screen and (max-width : 600px) {

                /* force container columns to (horizontal) blocks */
                td[class="force-col"] {
                    display: block;
                    padding-right: 0 !important;
				}
				table[class="col-2"] {
                    /* unset table align="left/right" */
                    float: none !important;
					width: 100% !important;

					/* change left/right padding and margins to top/bottom ones */
					margin-bottom: 12px;
					padding-bottom: 12px;
					border-bottom: 0;
				}

				/* remove bottom border for last column/row */
				table[id="last-col-2"] {
                    border-bottom: none !important;
					margin-bottom: 0;
				}

				/* align images right and shrink them a bit */
				img[class="col-2-img"] {
                    float: right;
                    margin-left: 6px;
					max-width: 130px;
				}
			}
		</style>
	</body>
</html>
            ';

        return $msg;
    }
} 