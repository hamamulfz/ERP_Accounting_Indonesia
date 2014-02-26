<?php
class emailCommand extends CConsoleCommand {
	public function actionIndex()
	{
		
        $connection = Yii::app()->db;
        $sqlRaw = "
			select `peterjkambey@gmail.com` as email from `TABLE 131`
		";
        $rawData = $connection->createCommand($sqlRaw)->queryAll();
        foreach ($rawData as $row) {
	
			$subject="Announcement. Walk-in Interview Agung Podomoro Group";
			$email = $row['email'];
			$body ='
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional //EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<!-- saved from url=(0061)http://preview.createsend1.com/t/ViewEmail/d/E4A0016D7AC4F2C0 -->
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"><title></title><meta name="viewport" content="width=320, target-densitydpi=device-dpi">
<meta property="og:title" content="Walk-in Interview Agung Podomoro Group">
</head>
<body>
		<h3>WALK-IN INTERVIEW AGUNG PODOMORO GROUP</h3>

		<p>
Dear <strong>' .$email. '</strong><br/> Dengan hormat,
<br/>
<br/>
</p>
 
<p>
Terima kasih atas partisipasi Anda dalam Walk-in Interview Agung Podomoro Group pada hari Jumat & Sabtu / 6 & 7 Desember 2013.
</p>

<p>
Berdasarkan hasil seleksi di tahap Psikotest dan interview awal, saat ini kualifikasi Anda masih belum sesuai dengan kriteria yang dibutuhkan.
</p>
<p>
Demikian pemberitahuan ini kami sampaikan, terima kasih atas perhatian yang telah diberikan.</p>


 

Hormat kami, 

<p><strong>
Recruitment Center - HR Directorate</strong><br/>
Agung Podomoro Group<br/>
Telepon 021 – 30046888 / 081296947590
</p>

</body>
</html>	
			';
	
		
			Yii::import('ext.EmailComponent');
			EmailComponent::sendEmail($email,$subject,$body);
				
			//$sql2 = "UPDATE h_applicant SET t_status = 2 WHERE id = ".$row['id'];
			//Yii::app()->db->createCommand($sql2)->execute();
		}
	}
}
?>
