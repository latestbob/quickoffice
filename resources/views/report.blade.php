<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<br>
<br>

<table style="float: left; border-collapse: collapse; border: none;">
    <tbody>
        <tr>
            <td style="width: 153.9pt;padding: 0in 5.4pt;vertical-align: top;">
            
                <img src="<?php echo("https://quickoffice.online/logo/".\App\Office::where('office_name',Auth::user()->office)->value('logo'));  ?>" alt=""style="width:150px;height:100px;">
            </td>
            <td style="width: 324.9pt;padding: 0in 5.4pt;vertical-align: top;">
                <p style='margin-top:0in;margin-right:0in;margin-bottom:.0001pt;margin-left:0in;line-height:normal;font-size:15px;font-family:"Calibri","sans-serif";text-align:center;'><strong><span style="font-size:25px;text-transform:uppercase;">{{$report->office}}</span></strong></p>
                <p style='margin-top:0in;margin-right:0in;margin-bottom:.0001pt;margin-left:0in;line-height:normal;font-size:15px;font-family:"Calibri","sans-serif";text-align:center;'><strong><span style="font-size:8px;">&nbsp;</span></strong></p>
                <p style='margin-top:0in;margin-right:0in;margin-bottom:.0001pt;margin-left:0in;line-height:normal;font-size:15px;font-family:"Calibri","sans-serif";text-align:center;'><strong><span style="font-size:16px;">STAFF REPORT</span></strong></p>
                <p style='margin-top:0in;margin-right:0in;margin-bottom:.0001pt;margin-left:0in;line-height:normal;font-size:15px;font-family:"Calibri","sans-serif";text-align:center;'><span style="font-size:12px;">{{date('Y-m-d')}}</span></p>
            </td>
        </tr>
    </tbody>
</table>
<br><br>
<p style='margin-top:0in;margin-right:0in;margin-bottom:10.0pt;margin-left:0in;line-height:115%;font-size:15px;font-family:"Calibri","sans-serif";text-align:center;'><strong><span style="font-size:17px;line-height:115%;">&nbsp;</span></strong></p>
<p style='margin-top:0in;margin-right:0in;margin-bottom:10.0pt;margin-left:0in;line-height:115%;font-size:15px;font-family:"Calibri","sans-serif";'><strong>&nbsp;</strong></p>
<table style="border-collapse:collapse;border:none;">
    <tbody>
        <tr>
            <td style="width: 6.65in;padding: 0in 5.4pt;vertical-align: top;">
                <p style='margin-top:0in;margin-right:0in;margin-bottom:.0001pt;margin-left:0in;line-height:150%;font-size:15px;font-family:"Calibri","sans-serif";text-align:  justify;'><span style='font-size:16px;line-height:150%;font-family:"Times New Roman","serif";'><?php echo htmlspecialchars_decode($report->content);?></span></p>
            </td>
        </tr>
    </tbody>
</table>
<p style='margin-top:0in;margin-right:0in;margin-bottom:10.0pt;margin-left:0in;line-height:115%;font-size:15px;font-family:"Calibri","sans-serif";'><strong>&nbsp;</strong></p>
<p style='margin-top:0in;margin-right:0in;margin-bottom:10.0pt;margin-left:0in;line-height:115%;font-size:15px;font-family:"Calibri","sans-serif";'><strong>&nbsp;</strong></p>
<p style='margin-top:0in;margin-right:0in;margin-bottom:10.0pt;margin-left:0in;line-height:115%;font-size:15px;font-family:"Calibri","sans-serif";'><strong>&nbsp;</strong></p>
<p style='margin-top:0in;margin-right:0in;margin-bottom:10.0pt;margin-left:0in;line-height:115%;font-size:15px;font-family:"Calibri","sans-serif";'><strong>&nbsp;</strong></p>
<p style='margin-top:0in;margin-right:0in;margin-bottom:10.0pt;margin-left:0in;line-height:115%;font-size:15px;font-family:"Calibri","sans-serif";'><strong>&nbsp;</strong></p>
<p style='margin-top:0in;margin-right:0in;margin-bottom:10.0pt;margin-left:0in;line-height:115%;font-size:15px;font-family:"Calibri","sans-serif";'><strong>&nbsp;</strong></p>
<table style="border-collapse:collapse;border:none;">
    <tbody>
        <tr>
            <td style="width: 6.65in;padding: 0in 5.4pt;vertical-align: top;">
                <p style='margin-top:0in;margin-right:0in;margin-bottom:.0001pt;margin-left:0in;line-height:  normal;font-size:15px;font-family:"Calibri","sans-serif";'><strong>{{$report->reporter}}</strong></p>
            </td>
        </tr>
    </tbody>
</table>
<p style='margin-top:0in;margin-right:0in;margin-bottom:10.0pt;margin-left:0in;line-height:115%;font-size:15px;font-family:"Calibri","sans-serif";'>&nbsp;</p>
<p style='margin-top:0in;margin-right:0in;margin-bottom:10.0pt;margin-left:0in;line-height:115%;font-size:15px;font-family:"Calibri","sans-serif";'>&nbsp;</p>
<p style='margin-top:0in;margin-right:0in;margin-bottom:10.0pt;margin-left:0in;line-height:115%;font-size:15px;font-family:"Calibri","sans-serif";'>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;</p>
<p style='margin-top:0in;margin-right:0in;margin-bottom:10.0pt;margin-left:0in;line-height:115%;font-size:15px;font-family:"Calibri","sans-serif";'><strong><span style="font-size:3px;line-height:115%;">&nbsp;</span></strong></p>
<p style='margin-top:0in;margin-right:0in;margin-bottom:10.0pt;margin-left:0in;line-height:115%;font-size:15px;font-family:"Calibri","sans-serif";'><strong>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;</strong></p>
<p style='margin-top:0in;margin-right:0in;margin-bottom:10.0pt;margin-left:0in;line-height:115%;font-size:15px;font-family:"Calibri","sans-serif";'>&nbsp;</p>
<p style='margin-top:0in;margin-right:0in;margin-bottom:10.0pt;margin-left:0in;line-height:115%;font-size:15px;font-family:"Calibri","sans-serif";'><strong><span style="font-size:19px;line-height:115%;color:white;">A</span></strong></p>
<p style='margin-top:0in;margin-right:0in;margin-bottom:10.0pt;margin-left:0in;line-height:115%;font-size:15px;font-family:"Calibri","sans-serif";'><strong><span style="font-size:19px;line-height:115%;color:white;">MOUNT (</span></strong><strong><span style='font-size:19px;line-height:115%;font-family:"Segoe UI","sans-serif";color:white;'>₦</span></strong><strong><span style='font-size:19px;line-height:115%;font-family:"Arial Rounded MT Bold","sans-serif";color:white;'>)</span></strong></p>
<p style='margin-top:0in;margin-right:0in;margin-bottom:10.0pt;margin-left:0in;line-height:115%;font-size:15px;font-family:"Calibri","sans-serif";'>&nbsp;</p>
<p style='margin-top:0in;margin-right:0in;margin-bottom:10.0pt;margin-left:0in;line-height:115%;font-size:15px;font-family:"Calibri","sans-serif";'>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;</p>
<p style='margin-top:0in;margin-right:0in;margin-bottom:10.0pt;margin-left:0in;line-height:115%;font-size:15px;font-family:"Calibri","sans-serif";'>&nbsp;</p>
<p style='margin-top:0in;margin-right:0in;margin-bottom:10.0pt;margin-left:0in;line-height:115%;font-size:15px;font-family:"Calibri","sans-serif";'><span style="font-size:17px;line-height:115%;">&nbsp;</span></p>
<p style='margin-top:0in;margin-right:0in;margin-bottom:10.0pt;margin-left:0in;line-height:115%;font-size:15px;font-family:"Calibri","sans-serif";'>&nbsp;</p>


</body>
</html>

