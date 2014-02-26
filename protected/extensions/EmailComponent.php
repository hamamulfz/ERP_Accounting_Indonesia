<?php
class EmailComponent {
    public static function SendEmail($recipient, $subject, $body, $type = "ssl") {
        $mailer = Yii::createComponent('ext.mailer.EMailer');
        $mailer->IsSMTP();
        $mailer->IsHTML(true);
        $mailer->SMTPAuth = true;
        if ($type == "ssl") {
            $mailer->SMTPSecure = "ssl";
            $mailer->Host = "smtp.gmail.com";
            $mailer->Port = 465;
            $mailer->Username = "recruitment.agungpodomoroland@gmail.com";
            $mailer->Password = Yii::app()->params['broadcastPassword'];
			$mailer->AddReplyTo('hr.recruitment@agungpodomoro.com ', 'Recruitment APL');
            $mailer->From = "recruitment.agungpodomoroland@gmail.com";
        } else {
            $mailer->Host = "mail.agungpodomoro-aphris.com";
            $mailer->Port = 25;
            //$mailer->SMTPSecure = "tls";
            $mailer->Username = "peter";
            $mailer->Password = Yii::app()->params['peterPassword'];
            $mailer->From = "peter@agungpodomoro.com";
        }
        $mailer->CharSet = 'UTF-8';
        //$mailer->addAttachment(Yii::app()->basePath."/reports/BuktiTerima.php");
        //$mailer->addAttachment(Yii::app()->basePath."/reports/bukti_".$id.".pdf");
        $mailer->FromName = Yii::app()->params['userEmail'];
        $mailer->AddAddress($recipient);
        $mailer->Subject = $subject;
        $mailer->Body = $body;
        $mailer->Send();
    }
}
?>