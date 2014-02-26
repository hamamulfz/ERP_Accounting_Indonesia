<?php
class emailCommand extends CConsoleCommand {
	public function actionIndex()
	{
		
        $connection = Yii::app()->db;
        $sqlRaw = "
			select h.id, h.applicant_name, u.email from h_applicant h  
			inner join s_user_registration u on h.id = u.id 
			where h.email is null and u.email NOT LIKE '%apl.com%' and u.email NOT LIKE '%dummy%' and t_status = 1 limit 500
		";
        $rawData = $connection->createCommand($sqlRaw)->queryAll();
        foreach ($rawData as $row) {
	
			$subject="Create Your Sparkling Future. Walk-in Interview Agung Podomoro Group";
			$email = $row['email'];
			$body ='
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional //EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<!-- saved from url=(0061)http://preview.createsend1.com/t/ViewEmail/d/E4A0016D7AC4F2C0 -->
<html><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8"><title></title><meta name="viewport" content="width=320, target-densitydpi=device-dpi">
<style type="text/css">
@media only screen and (max-width: 660px) { 
table[class=w0], td[class=w0] { width: 0 !important; }
table[class=w10], td[class=w10], img[class=w10] { width:10px !important; }
table[class=w15], td[class=w15], img[class=w15] { width:5px !important; }
table[class=w30], td[class=w30], img[class=w30] { width:10px !important; }
table[class=w60], td[class=w60], img[class=w60] { width:10px !important; }
table[class=w125], td[class=w125], img[class=w125] { width:80px !important; }
table[class=w130], td[class=w130], img[class=w130] { width:55px !important; }
table[class=w140], td[class=w140], img[class=w140] { width:90px !important; }
table[class=w160], td[class=w160], img[class=w160] { width:180px !important; }
table[class=w170], td[class=w170], img[class=w170] { width:100px !important; }
table[class=w180], td[class=w180], img[class=w180] { width:80px !important; }
table[class=w195], td[class=w195], img[class=w195] { width:80px !important; }
table[class=w220], td[class=w220], img[class=w220] { width:80px !important; }
table[class=w240], td[class=w240], img[class=w240] { width:180px !important; }
table[class=w255], td[class=w255], img[class=w255] { width:185px !important; }
table[class=w275], td[class=w275], img[class=w275] { width:135px !important; }
table[class=w280], td[class=w280], img[class=w280] { width:135px !important; }
table[class=w300], td[class=w300], img[class=w300] { width:140px !important; }
table[class=w325], td[class=w325], img[class=w325] { width:95px !important; }
table[class=w360], td[class=w360], img[class=w360] { width:140px !important; }
table[class=w410], td[class=w410], img[class=w410] { width:180px !important; }
table[class=w470], td[class=w470], img[class=w470] { width:200px !important; }
table[class=w580], td[class=w580], img[class=w580] { width:280px !important; }
table[class=w640], td[class=w640], img[class=w640] { width:300px !important; }
table[class*=hide], td[class*=hide], img[class*=hide], p[class*=hide], span[class*=hide] { display:none !important; }
table[class=h0], td[class=h0] { height: 0 !important; }
p[class=footer-content-left] { text-align: center !important; }
#headline p { font-size: 30px !important; }
.article-content, #left-sidebar{ -webkit-text-size-adjust: 90% !important; -ms-text-size-adjust: 90% !important; }
.header-content, .footer-content-left {-webkit-text-size-adjust: 80% !important; -ms-text-size-adjust: 80% !important;}
img { height: auto; line-height: 100%;}
 } 
#outlook a { padding: 0; }	
body { width: 100% !important; }
.ReadMsgBody { width: 100%; }
.ExternalClass { width: 100%; display:block !important; } 
body { background-color: #ececec; margin: 0; padding: 0; }
img { outline: none; text-decoration: none; display: block;}
br, strong br, b br, em br, i br { line-height:100%; }
h1, h2, h3, h4, h5, h6 { line-height: 100% !important; -webkit-font-smoothing: antialiased; }
h1 a, h2 a, h3 a, h4 a, h5 a, h6 a { color: blue !important; }
h1 a:active, h2 a:active,  h3 a:active, h4 a:active, h5 a:active, h6 a:active {	color: red !important; }
h1 a:visited, h2 a:visited,  h3 a:visited, h4 a:visited, h5 a:visited, h6 a:visited { color: purple !important; }
  
table td, table tr { border-collapse: collapse; }
.yshortcuts, .yshortcuts a, .yshortcuts a:link,.yshortcuts a:visited, .yshortcuts a:hover, .yshortcuts a span {
color: black; text-decoration: none !important; border-bottom: none !important; background: none !important;
}	
code {
  white-space: normal;
  word-break: break-all;
}
#background-table { background-color: #ececec; }
#top-bar { border-radius:6px 6px 0px 0px; -moz-border-radius: 6px 6px 0px 0px; -webkit-border-radius:6px 6px 0px 0px; -webkit-font-smoothing: antialiased; background-color: #043948; color: #4b5ea9; }
#top-bar a { font-weight: bold; color: #4b5ea9; text-decoration: none;}
#footer { border-radius:0px 0px 6px 6px; -moz-border-radius: 0px 0px 6px 6px; -webkit-border-radius:0px 0px 6px 6px; -webkit-font-smoothing: antialiased; }
body, td { font-family: "Helvetica Neue", Arial, Helvetica, Geneva, sans-serif; }
.header-content, .footer-content-left, .footer-content-right { -webkit-text-size-adjust: none; -ms-text-size-adjust: none; }
.header-content { font-size: 12px; color: #4b5ea9; }
.header-content a { font-weight: bold; color: #4b5ea9; text-decoration: none; }
#headline p { color: #4b5ea9; font-family: "Helvetica Neue", Arial, Helvetica, Geneva, sans-serif; font-size: 36px; text-align: center; margin-top:0px; margin-bottom:30px; }
#headline p a { color: #4b5ea9; text-decoration: none; }
.article-title { font-size: 18px; line-height:24px; color: #4b5ea9; font-weight:bold; margin-top:0px; margin-bottom:18px; font-family: "Helvetica Neue", Arial, Helvetica, Geneva, sans-serif; }
.article-title a { color: #4b5ea9; text-decoration: none; }
.article-title.with-meta {margin-bottom: 0;}
.article-meta { font-size: 13px; line-height: 20px; color: #ccc; font-weight: bold; margin-top: 0;}
.article-content { font-size: 13px; line-height: 18px; color: #444444; margin-top: 0px; margin-bottom: 18px; font-family: "Helvetica Neue", Arial, Helvetica, Geneva, sans-serif; }
.article-content a { color: #00707b; font-weight:bold; text-decoration:none; }
.article-content img { max-width: 100% }
.article-content ol, .article-content ul { margin-top:0px; margin-bottom:18px; margin-left:19px; padding:0; }
.article-content li { font-size: 13px; line-height: 18px; color: #444444; }
.article-content li a { color: #00707b; text-decoration:underline; }
.article-content p {margin-bottom: 15px;}
.footer-content-left { font-size: 12px; line-height: 15px; color: #e2e2e2; margin-top: 0px; margin-bottom: 15px; }
.footer-content-left a { color: #4b5ea9; font-weight: bold; text-decoration: none; }
.footer-content-right { font-size: 11px; line-height: 16px; color: #e2e2e2; margin-top: 0px; margin-bottom: 15px; }
.footer-content-right a { color: #4b5ea9; font-weight: bold; text-decoration: none; }
#footer { background-color: #043948; color: #e2e2e2; }
#footer a { color: #4b5ea9; text-decoration: none; font-weight: bold; }
#permission-reminder { white-space: normal; }
#street-address { color: #4b5ea9; white-space: normal; }
</style>
<!--[if gte mso 9]>
<style _tmplitem="95" >
.article-content ol, .article-content ul {
   margin: 0 0 0 24px !important;
   padding: 0 !important;
   list-style-position: inside !important;
}
</style>
<![endif]--><meta name="robots" content="noindex,nofollow">
<meta property="og:title" content="Walk-in Interview Agung Podomoro Group">
</head><body style="width:100% !important;background-color:#ececec;margin-top:0;margin-bottom:0;margin-right:0;margin-left:0;padding-top:0;padding-bottom:0;padding-right:0;padding-left:0;font-family:&#39;Helvetica Neue&#39;, Arial, Helvetica, Geneva, sans-serif;"><table width="100%" cellpadding="0" cellspacing="0" border="0" id="background-table" style="background-color:#ececec;">
	<tbody><tr style="border-collapse:collapse;">
		<td align="center" bgcolor="#ececec" style="font-family:&#39;Helvetica Neue&#39;, Arial, Helvetica, Geneva, sans-serif;border-collapse:collapse;">
        	<table class="w640" width="640" cellpadding="0" cellspacing="0" border="0" style="margin-top:0;margin-bottom:0;margin-right:10px;margin-left:10px;">
            	<tbody><tr style="border-collapse:collapse;"><td class="w640" width="640" height="20" style="font-family:&#39;Helvetica Neue&#39;, Arial, Helvetica, Geneva, sans-serif;border-collapse:collapse;"></td></tr>
                
            	<tr style="border-collapse:collapse;">
                	<td class="w640" width="640" style="font-family:&#39;Helvetica Neue&#39;, Arial, Helvetica, Geneva, sans-serif;border-collapse:collapse;">
                        <table id="top-bar" class="w640" width="640" cellpadding="0" cellspacing="0" border="0" bgcolor="#00707b" style="border-radius:6px 6px 0px 0px;-moz-border-radius:6px 6px 0px 0px;-webkit-border-radius:6px 6px 0px 0px;-webkit-font-smoothing:antialiased;background-color:#043948;color:#4b5ea9;">
    <tbody><tr style="border-collapse:collapse;">
        <td class="w15" width="15" style="font-family:&#39;Helvetica Neue&#39;, Arial, Helvetica, Geneva, sans-serif;border-collapse:collapse;"></td>
        <td class="w325" width="350" valign="middle" align="left" style="font-family:&#39;Helvetica Neue&#39;, Arial, Helvetica, Geneva, sans-serif;border-collapse:collapse;">
            <table class="w325" width="350" cellpadding="0" cellspacing="0" border="0">
                <tbody><tr style="border-collapse:collapse;"><td class="w325" width="350" height="8" style="font-family:&#39;Helvetica Neue&#39;, Arial, Helvetica, Geneva, sans-serif;border-collapse:collapse;"></td></tr>
            </tbody></table>
            <table class="w325" width="350" cellpadding="0" cellspacing="0" border="0">
                <tbody><tr style="border-collapse:collapse;"><td class="w325" width="350" height="8" style="font-family:&#39;Helvetica Neue&#39;, Arial, Helvetica, Geneva, sans-serif;border-collapse:collapse;"></td></tr>
            </tbody></table>
        </td>
        <td class="w30" width="30" style="font-family:&#39;Helvetica Neue&#39;, Arial, Helvetica, Geneva, sans-serif;border-collapse:collapse;"></td>
        <td class="w255" width="255" valign="middle" align="right" style="font-family:&#39;Helvetica Neue&#39;, Arial, Helvetica, Geneva, sans-serif;border-collapse:collapse;">
            <table class="w255" width="255" cellpadding="0" cellspacing="0" border="0">
                <tbody><tr style="border-collapse:collapse;"><td class="w255" width="255" height="8" style="font-family:&#39;Helvetica Neue&#39;, Arial, Helvetica, Geneva, sans-serif;border-collapse:collapse;"></td></tr>
            </tbody></table>
            <table cellpadding="0" cellspacing="0" border="0">
    <tbody><tr style="border-collapse:collapse;">
        
    </tr>
</tbody></table>
            <table class="w255" width="255" cellpadding="0" cellspacing="0" border="0">
                <tbody><tr style="border-collapse:collapse;"><td class="w255" width="255" height="8" style="font-family:&#39;Helvetica Neue&#39;, Arial, Helvetica, Geneva, sans-serif;border-collapse:collapse;"></td></tr>
            </tbody></table>
        </td>
        <td class="w15" width="15" style="font-family:&#39;Helvetica Neue&#39;, Arial, Helvetica, Geneva, sans-serif;border-collapse:collapse;"></td>
    </tr>
</tbody></table>
                        
                    </td>
                </tr>
                <tr style="border-collapse:collapse;">
                <td id="header" class="w640" width="640" align="center" bgcolor="#00707b" style="font-family:&#39;Helvetica Neue&#39;, Arial, Helvetica, Geneva, sans-serif;border-collapse:collapse;">
    
				<img src="http://www.agungpodomoro-career.com/shareimages/themes/image001.jpg" width="100%">
    
</td>
                </tr>
                
                <tr style="border-collapse:collapse;"><td class="w640" width="640" height="30" bgcolor="#ffffff" style="font-family:&#39;Helvetica Neue&#39;, Arial, Helvetica, Geneva, sans-serif;border-collapse:collapse;"></td></tr>
                <tr id="simple-content-row" style="border-collapse:collapse;"><td class="w640" width="640" bgcolor="#ffffff" style="font-family:&#39;Helvetica Neue&#39;, Arial, Helvetica, Geneva, sans-serif;border-collapse:collapse;">
    <table class="w640" width="640" cellpadding="0" cellspacing="0" border="0">
        <tbody><tr style="border-collapse:collapse;">
            <td class="w30" width="30" style="font-family:&#39;Helvetica Neue&#39;, Arial, Helvetica, Geneva, sans-serif;border-collapse:collapse;"></td>
            <td class="w580" width="580" style="font-family:&#39;Helvetica Neue&#39;, Arial, Helvetica, Geneva, sans-serif;border-collapse:collapse;">
                
                        <table class="w580" width="580" cellpadding="0" cellspacing="0" border="0">
                            <tbody><tr style="border-collapse:collapse;">
                                <td class="w580" width="580" style="font-family:&#39;Helvetica Neue&#39;, Arial, Helvetica, Geneva, sans-serif;border-collapse:collapse;">
                                    <p align="left" class="article-title" style="font-size:18px;line-height:24px;color:#4b5ea9;font-weight:bold;margin-top:0px;margin-bottom:18px;font-family:&#39;Helvetica Neue&#39;, Arial, Helvetica, Geneva, sans-serif;">Walk-in Interview Agung Podomoro Group</p>
                                    <div align="left" class="article-content" style="font-size:13px;line-height:18px;color:#444444;margin-top:0px;margin-bottom:18px;font-family:&#39;Helvetica Neue&#39;, Arial, Helvetica, Geneva, sans-serif;">
                                        <p style="margin-bottom:15px;">
	PT Agung Podomoro Land, Tbk. has been commited to focused on property industry for more than 40 years. 
    Due to our agrresive expansion in Project Development, Shopping Mall Management, Hospitality and Apartement, we offer many vacant positions in Jakarta, Ciawi, Karawang, Bandung, Medan, Batam, Balikpapan, Samarinda, Makassar, Bali.
	</p>
                                    </div>
                                </td>
                            </tr>
                            <tr style="border-collapse:collapse;"><td class="w580" width="580" height="10" style="font-family:&#39;Helvetica Neue&#39;, Arial, Helvetica, Geneva, sans-serif;border-collapse:collapse;"></td></tr>
                        </tbody></table>
                    
                        <table class="w580" width="580" cellpadding="0" cellspacing="0" border="0">
                            <tbody><tr style="border-collapse:collapse;">
                                <td class="w580" width="580" style="font-family:&#39;Helvetica Neue&#39;, Arial, Helvetica, Geneva, sans-serif;border-collapse:collapse;">
                                    <p align="left" class="article-title" style="font-size:18px;line-height:24px;color:#4b5ea9;font-weight:bold;margin-top:0px;margin-bottom:18px;font-family:&#39;Helvetica Neue&#39;, Arial, Helvetica, Geneva, sans-serif;"></p>
                                    <table cellpadding="0" cellspacing="0" border="0" align="right">
                                        <tbody><tr style="border-collapse:collapse;">
                                            <td class="w30" width="15" style="font-family:&#39;Helvetica Neue&#39;, Arial, Helvetica, Geneva, sans-serif;border-collapse:collapse;"></td>
                                            <td style="font-family:&#39;Helvetica Neue&#39;, Arial, Helvetica, Geneva, sans-serif;border-collapse:collapse;"></td>
                                        </tr>
                                        <tr style="border-collapse:collapse;"><td class="w30" width="15" height="5" style="font-family:&#39;Helvetica Neue&#39;, Arial, Helvetica, Geneva, sans-serif;border-collapse:collapse;"></td><td style="font-family:&#39;Helvetica Neue&#39;, Arial, Helvetica, Geneva, sans-serif;border-collapse:collapse;"></td></tr>
                                    </tbody></table>
                                    <div align="left" class="article-content" style="font-size:13px;line-height:18px;color:#444444;margin-top:0px;margin-bottom:18px;font-family:&#39;Helvetica Neue&#39;, Arial, Helvetica, Geneva, sans-serif;">
                                        <p style="margin-bottom:15px;">Come and see our  team in the coming event :</p>
<table>
<tbody><tr style="border-collapse:collapse;">
<td width="20%" style="font-family:&#39;Helvetica Neue&#39;, Arial, Helvetica, Geneva, sans-serif;border-collapse:collapse;">Event</td><td style="font-family:&#39;Helvetica Neue&#39;, Arial, Helvetica, Geneva, sans-serif;border-collapse:collapse;"><strong>: "WALK-IN INTERVIEW - Let&lsquo;s Create Your Sparkling Future with Us"</strong> 
	</td></tr>
	<tr style="border-collapse:collapse;">
						<td style="font-family:&#39;Helvetica Neue&#39;, Arial, Helvetica, Geneva, sans-serif;border-collapse:collapse;">Venue</td>
		<td style="font-family:&#39;Helvetica Neue&#39;, Arial, Helvetica, Geneva, sans-serif;border-collapse:collapse;">: Ballroom, Kuningan City, P7 floor</td>
	</tr>
	<tr style="border-collapse:collapse;">
								<td style="font-family:&#39;Helvetica Neue&#39;, Arial, Helvetica, Geneva, sans-serif;border-collapse:collapse;"></td>
								<td style="font-family:&#39;Helvetica Neue&#39;, Arial, Helvetica, Geneva, sans-serif;border-collapse:collapse;">  Jl. Prof. Dr. Satrio Kav. 18, Setiabudi, Kuningan, Jakarta Selatan</td>
	</tr>
	<tr style="border-collapse:collapse;">
						<td style="font-family:&#39;Helvetica Neue&#39;, Arial, Helvetica, Geneva, sans-serif;border-collapse:collapse;">Date</td>
		<td style="font-family:&#39;Helvetica Neue&#39;, Arial, Helvetica, Geneva, sans-serif;border-collapse:collapse;">: Friday &amp; Saturday, 6 - 7 December 2013</td>
	</tr>
	<tr style="border-collapse:collapse;">
						<td style="font-family:&#39;Helvetica Neue&#39;, Arial, Helvetica, Geneva, sans-serif;border-collapse:collapse;">Time</td>
		<td style="font-family:&#39;Helvetica Neue&#39;, Arial, Helvetica, Geneva, sans-serif;border-collapse:collapse;">: 09 AM to 03 PM</td>
	</tr>
</tbody></table>
<p style="margin-bottom:15px;">
	Note : Please bring along your CV and latest photograph 4x6 two pieces.</p>

                                    </div>
                                </td>
                            </tr>
                            <tr style="border-collapse:collapse;"><td class="w580" width="580" height="10" style="font-family:&#39;Helvetica Neue&#39;, Arial, Helvetica, Geneva, sans-serif;border-collapse:collapse;"></td></tr>
                        </tbody></table>
                    
                        <table class="w580" width="580" cellpadding="0" cellspacing="0" border="0">
                            <tbody><tr style="border-collapse:collapse;">
                                <td class="w580" width="580" style="font-family:&#39;Helvetica Neue&#39;, Arial, Helvetica, Geneva, sans-serif;border-collapse:collapse;">
                                    <p align="left" class="article-title" style="font-size:18px;line-height:24px;color:#4b5ea9;font-weight:bold;margin-top:0px;margin-bottom:18px;font-family:&#39;Helvetica Neue&#39;, Arial, Helvetica, Geneva, sans-serif;"></p>
                                    <div align="left" class="article-content" style="font-size:13px;line-height:18px;color:#444444;margin-top:0px;margin-bottom:18px;font-family:&#39;Helvetica Neue&#39;, Arial, Helvetica, Geneva, sans-serif;">
                                        <p style="margin-bottom:15px;">
	For further information :</p>
<table>
	<tbody>
		<tr style="border-collapse:collapse;">
			<td width="20%" style="font-family:&#39;Helvetica Neue&#39;, Arial, Helvetica, Geneva, sans-serif;border-collapse:collapse;">
				Homepage</td>
			<td style="font-family:&#39;Helvetica Neue&#39;, Arial, Helvetica, Geneva, sans-serif;border-collapse:collapse;">
				: <a href="http://www.agungpodomoro-career.com">www.agungpodomoro-career.com</a></td>
		</tr>
		<tr style="border-collapse:collapse;">
			<td width="20%" style="font-family:&#39;Helvetica Neue&#39;, Arial, Helvetica, Geneva, sans-serif;border-collapse:collapse;">
				e-mail</td>
			<td style="font-family:&#39;Helvetica Neue&#39;, Arial, Helvetica, Geneva, sans-serif;border-collapse:collapse;">
				: <a href="mailto:hr.recruitment@agungpodomoro.com?Subject=Walk-in Interview Agung Podomoro Group" target="_top">hr.recruitment@agungpodomoro.com</a></td>
		</tr>
		<tr style="border-collapse:collapse;">
			<td style="font-family:&#39;Helvetica Neue&#39;, Arial, Helvetica, Geneva, sans-serif;border-collapse:collapse;">
				Phone</td>
			<td style="font-family:&#39;Helvetica Neue&#39;, Arial, Helvetica, Geneva, sans-serif;border-collapse:collapse;">
				: 021 - 300 46 888 / 0812 9694 7590 (PIC : Hendy / Alan)</td>
		</tr>
		<tr style="border-collapse:collapse;">
			<td style="font-family:&#39;Helvetica Neue&#39;, Arial, Helvetica, Geneva, sans-serif;border-collapse:collapse;">
				Twitter</td>
			<td style="font-family:&#39;Helvetica Neue&#39;, Arial, Helvetica, Geneva, sans-serif;border-collapse:collapse;">
				: <a href="https://twitter.com/aplcareer">@aplcareer</a></td>
		</tr>
		<tr style="border-collapse:collapse;">
			<td style="font-family:&#39;Helvetica Neue&#39;, Arial, Helvetica, Geneva, sans-serif;border-collapse:collapse;">
				Facebook</td>
			<td style="font-family:&#39;Helvetica Neue&#39;, Arial, Helvetica, Geneva, sans-serif;border-collapse:collapse;">
				: <a href="https://www.facebook.com/pages/Recruitment-Center-Agung-Podomoro/1383505278551911">Recruitment Center Agung Podomoro</a></td>
		</tr>
	</tbody>
</table>
<p style="margin-bottom:15px;">
	Best Regards,</p>
<br/>
<p style="margin-bottom:15px;">
	Recruitment Center<br/>
	<strong>
	HR Directorate - PT Agung Podomoro Land, Tbk.</strong></p>

                                    </div>
                                </td>
                            </tr>
                            <tr style="border-collapse:collapse;"><td class="w580" width="580" height="10" style="font-family:&#39;Helvetica Neue&#39;, Arial, Helvetica, Geneva, sans-serif;border-collapse:collapse;"></td></tr>
                        </tbody></table>
                    
            </td>
            <td class="w30" width="30" style="font-family:&#39;Helvetica Neue&#39;, Arial, Helvetica, Geneva, sans-serif;border-collapse:collapse;"></td>
        </tr>
    </tbody></table>
</td></tr>
                <tr style="border-collapse:collapse;"><td class="w640" width="640" height="15" bgcolor="#ffffff" style="font-family:&#39;Helvetica Neue&#39;, Arial, Helvetica, Geneva, sans-serif;border-collapse:collapse;"></td></tr>
                
                <tr style="border-collapse:collapse;">
                <td class="w640" width="640" style="font-family:&#39;Helvetica Neue&#39;, Arial, Helvetica, Geneva, sans-serif;border-collapse:collapse;">
    <table id="footer" class="w640" width="640" cellpadding="0" cellspacing="0" border="0" bgcolor="#043948" style="border-radius:0px 0px 6px 6px;-moz-border-radius:0px 0px 6px 6px;-webkit-border-radius:0px 0px 6px 6px;-webkit-font-smoothing:antialiased;background-color:#043948;color:#e2e2e2;">
        <tbody><tr style="border-collapse:collapse;"><td class="w30" width="30" style="font-family:&#39;Helvetica Neue&#39;, Arial, Helvetica, Geneva, sans-serif;border-collapse:collapse;"></td><td class="w580 h0" width="360" height="30" style="font-family:&#39;Helvetica Neue&#39;, Arial, Helvetica, Geneva, sans-serif;border-collapse:collapse;"></td><td class="w0" width="60" style="font-family:&#39;Helvetica Neue&#39;, Arial, Helvetica, Geneva, sans-serif;border-collapse:collapse;"></td><td class="w0" width="160" style="font-family:&#39;Helvetica Neue&#39;, Arial, Helvetica, Geneva, sans-serif;border-collapse:collapse;"></td><td class="w30" width="30" style="font-family:&#39;Helvetica Neue&#39;, Arial, Helvetica, Geneva, sans-serif;border-collapse:collapse;"></td></tr>
        <tr style="border-collapse:collapse;">
            <td class="w30" width="30" style="font-family:&#39;Helvetica Neue&#39;, Arial, Helvetica, Geneva, sans-serif;border-collapse:collapse;"></td>
            <td class="w580" width="360" valign="top" style="font-family:&#39;Helvetica Neue&#39;, Arial, Helvetica, Geneva, sans-serif;border-collapse:collapse;">
            <span class="hide"><p id="permission-reminder" align="left" class="footer-content-left" style="-webkit-text-size-adjust:none;-ms-text-size-adjust:none;font-size:12px;line-height:15px;color:#e2e2e2;margin-top:0px;margin-bottom:15px;white-space:normal;"></p></span>
             </td>
            <td class="hide w0" width="60" style="font-family:&#39;Helvetica Neue&#39;, Arial, Helvetica, Geneva, sans-serif;border-collapse:collapse;"></td>
            <td class="hide w0" width="160" valign="top" style="font-family:&#39;Helvetica Neue&#39;, Arial, Helvetica, Geneva, sans-serif;border-collapse:collapse;">
            <p id="street-address" align="right" class="footer-content-right" style="-webkit-text-size-adjust:none;-ms-text-size-adjust:none;font-size:11px;line-height:16px;margin-top:0px;margin-bottom:15px;color:#4b5ea9;white-space:normal;"></p>
            </td>
            <td class="w30" width="30" style="font-family:&#39;Helvetica Neue&#39;, Arial, Helvetica, Geneva, sans-serif;border-collapse:collapse;"></td>
        </tr>
        <tr style="border-collapse:collapse;"><td class="w30" width="30" style="font-family:&#39;Helvetica Neue&#39;, Arial, Helvetica, Geneva, sans-serif;border-collapse:collapse;"></td><td class="w580 h0" width="360" height="15" style="font-family:&#39;Helvetica Neue&#39;, Arial, Helvetica, Geneva, sans-serif;border-collapse:collapse;"></td><td class="w0" width="60" style="font-family:&#39;Helvetica Neue&#39;, Arial, Helvetica, Geneva, sans-serif;border-collapse:collapse;"></td><td class="w0" width="160" style="font-family:&#39;Helvetica Neue&#39;, Arial, Helvetica, Geneva, sans-serif;border-collapse:collapse;"></td><td class="w30" width="30" style="font-family:&#39;Helvetica Neue&#39;, Arial, Helvetica, Geneva, sans-serif;border-collapse:collapse;"></td></tr>
    </tbody></table>
</td>
                </tr>
                <tr style="border-collapse:collapse;"><td class="w640" width="640" height="60" style="font-family:&#39;Helvetica Neue&#39;, Arial, Helvetica, Geneva, sans-serif;border-collapse:collapse;"></td></tr>
            </tbody></table>
        </td>
	</tr>
</tbody></table>

</body></html>	
			';
	
		
			Yii::import('ext.EmailComponent');
			EmailComponent::sendEmail($email,$subject,$body);
				
			$sql2 = "UPDATE h_applicant SET t_status = 2 WHERE id = ".$row['id'];
			Yii::app()->db->createCommand($sql2)->execute();
		}
	}
}
?>
