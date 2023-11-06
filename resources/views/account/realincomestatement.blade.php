<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<table style="float: left;border-collapse:collapse;border:none;margin-left:6.75pt;margin-right:6.75pt;">
    <tbody>
        <tr>
            <td style="width: 153.9pt;padding: 0in 5.4pt;vertical-align: top;">
            <img width="101" src="<?php echo("https://quickoffice.online/logo/".\App\Office::where('office_name',Auth::user()->office)->value('logo'));  ?>" align="left" alt="image" style="width:150px;height:100px; float: left; text-align: left; display: inline-block; ">

  
            </td>
            <td style="width: 324.9pt;padding: 0in 5.4pt;vertical-align: top;">
                <p style='margin-top:0in;margin-right:0in;margin-bottom:.0001pt;margin-left:0in;line-height:normal;font-size:15px;font-family:"Calibri","sans-serif";text-align:center;'><strong><span style="font-size:25px;">WALLS AND GATES LIMITED</span></strong></p>
                <p style='margin-top:0in;margin-right:0in;margin-bottom:.0001pt;margin-left:0in;line-height:normal;font-size:15px;font-family:"Calibri","sans-serif";text-align:center;'><strong><span style="font-size:8px;">&nbsp;</span></strong></p>
                <p style='margin-top:0in;margin-right:0in;margin-bottom:.0001pt;margin-left:0in;line-height:normal;font-size:15px;font-family:"Calibri","sans-serif";text-align:center;'><strong><span style="font-size:16px;">INCOME STATEMENT FOR THE YEAR END</span></strong></p>
            </td>
        </tr>
    </tbody>
</table>
<p style='margin-top:0in;margin-right:0in;margin-bottom:10.0pt;margin-left:0in;line-height:115%;font-size:15px;font-family:"Calibri","sans-serif";text-align:center;'><strong><span style="font-size:17px;line-height:115%;">&nbsp;</span></strong></p>
<p style='margin-top:0in;margin-right:0in;margin-bottom:10.0pt;margin-left:0in;line-height:115%;font-size:15px;font-family:"Calibri","sans-serif";'><strong>&nbsp;</strong></p>
<p><br></p>
<p><br></p>
<table style="margin-left:5.4pt;background:#365F91;border-collapse:collapse;border:none;">
    <tbody>
        <tr>
            <td style="width: 3.25in;padding: 0in 5.4pt;vertical-align: top;">
                <p style='margin-top:0in;margin-right:0in;margin-bottom:.0001pt;margin-left:0in;line-height:  normal;font-size:15px;font-family:"Calibri","sans-serif";'><strong><span style="font-size:19px;color:white;">REVENUE</span></strong></p>
            </td>
            <td style="width: 239.4pt;padding: 0in 5.4pt;vertical-align: top;">
                <p style='margin-top:0in;margin-right:0in;margin-bottom:.0001pt;margin-left:0in;line-height:normal;font-size:15px;font-family:"Calibri","sans-serif";text-align:right;'><strong><span style="font-size:19px;color:white;">AMOUNT (</span></strong><strong><span style="font-size:19px;color:white;">N)</span></strong><strong><span style="font-size:19px;color:white;">&nbsp;</span></strong></p>
            </td>
        </tr>
    </tbody>
</table>
<p style='margin-top:0in;margin-right:0in;margin-bottom:10.0pt;margin-left:0in;line-height:115%;font-size:15px;font-family:"Calibri","sans-serif";'><strong>&nbsp;</strong></p>
<table style="border-collapse:collapse;border:none;">
    <tbody>
        <tr>
            <td style="width: 239.4pt;padding: 0in 5.4pt;vertical-align: top;">
                <p style='margin-top:0in;margin-right:0in;margin-bottom:.0001pt;margin-left:0in;line-height:  normal;font-size:15px;font-family:"Calibri","sans-serif";'><strong>CLIENTS JOB</strong></p>
            </td>
            <td style="width: 239.4pt;padding: 0in 5.4pt;vertical-align: top;">
                <p style='margin-top:0in;margin-right:0in;margin-bottom:.0001pt;margin-left:0in;line-height:normal;font-size:15px;font-family:"Calibri","sans-serif";text-align:right;'>{{$jobforclient}}</p>
            </td>
        </tr>
    </tbody>
</table>
<p style='margin-top:0in;margin-right:0in;margin-bottom:10.0pt;margin-left:0in;line-height:115%;font-size:15px;font-family:"Calibri","sans-serif";'><strong>&nbsp;</strong></p>
<p style='margin-top:0in;margin-right:0in;margin-bottom:10.0pt;margin-left:0in;line-height:115%;font-size:15px;font-family:"Calibri","sans-serif";'><strong>&nbsp;OTHER SOURCES&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</strong></p>
<table style="border-collapse:collapse;border:none;">
    <tbody>
       

        @foreach($othersource as $source)
        <tr>
            <td style="width: 239.4pt;padding: 0in 5.4pt;vertical-align: top;">
                <p style='margin-top:0in;margin-right:0in;margin-bottom:.0001pt;margin-left:0in;line-height:  normal;font-size:15px;font-family:"Calibri","sans-serif";'>&nbsp;{{$source->title}}</p>
            </td>
            <td style="width: 239.4pt;padding: 0in 5.4pt;vertical-align: top;">
                <p style='margin-top:0in;margin-right:0in;margin-bottom:.0001pt;margin-left:0in;line-height:normal;font-size:15px;font-family:"Calibri","sans-serif";text-align:right;'>{{$source->amount}}</p>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
<p style='margin-top:0in;margin-right:0in;margin-bottom:10.0pt;margin-left:0in;line-height:115%;font-size:15px;font-family:"Calibri","sans-serif";'>&nbsp;</p>
<table style="border-collapse:collapse;border:none;">
    <tbody>
        <tr>
            <td style="width: 239.4pt;padding: 0in 5.4pt;vertical-align: top;">
                <p style='margin-top:0in;margin-right:0in;margin-bottom:.0001pt;margin-left:0in;line-height:normal;font-size:15px;font-family:"Calibri","sans-serif";text-align:right;'><strong>GROSS INCOME</strong></p>
            </td>
            <td style="width: 239.4pt;padding: 0in 5.4pt;vertical-align: top;">
                <p style='margin-top:0in;margin-right:0in;margin-bottom:.0001pt;margin-left:0in;line-height:normal;font-size:15px;font-family:"Calibri","sans-serif";text-align:right;'><strong>&nbsp; &nbsp;{{$grossincome}}</strong></p>
            </td>
        </tr>
    </tbody>
</table>
<p style='margin-top:0in;margin-right:0in;margin-bottom:10.0pt;margin-left:0in;line-height:115%;font-size:15px;font-family:"Calibri","sans-serif";'>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;</p>
<table style="margin-left:5.4pt;background:#365F91;border-collapse:collapse;border:none;">
    <tbody>
        <tr>
            <td style="width: 3.25in;padding: 0in 5.4pt;vertical-align: top;">
                <p style='margin-top:0in;margin-right:0in;margin-bottom:.0001pt;margin-left:0in;line-height:  normal;font-size:15px;font-family:"Calibri","sans-serif";'><strong><span style="font-size:19px;color:white;">EXPENSES</span></strong></p>
            </td>
            <td style="width: 239.4pt;padding: 0in 5.4pt;vertical-align: top;">
                <p style='margin-top:0in;margin-right:0in;margin-bottom:.0001pt;margin-left:0in;line-height:normal;font-size:15px;font-family:"Calibri","sans-serif";text-align:right;'><strong><span style="font-size:19px;color:white;">AMOUNT (</span></strong><strong><span style="font-size:19px;color:white;">N)</span></strong></p>
            </td>
        </tr>
    </tbody>
</table>
<p style='margin-top:0in;margin-right:0in;margin-bottom:10.0pt;margin-left:0in;line-height:115%;font-size:15px;font-family:"Calibri","sans-serif";'><strong><span style="font-size:3px;line-height:115%;">&nbsp;</span></strong></p>
<p style='margin-top:0in;margin-right:0in;margin-bottom:10.0pt;margin-left:0in;line-height:115%;font-size:15px;font-family:"Calibri","sans-serif";'><strong>&nbsp;OTHER EXPENSES</strong></p>
<table style="border-collapse:collapse;border:none;">
    <tbody>
        

        @foreach($otherexpenses as $expense)
        <tr>
            <td style="width: 239.4pt;padding: 0in 5.4pt;vertical-align: top;">
                <p style='margin-top:0in;margin-right:0in;margin-bottom:.0001pt;margin-left:0in;line-height:  normal;font-size:15px;font-family:"Calibri","sans-serif";'>&nbsp; {{$expense->title}}</p>
            </td>
            <td style="width: 239.4pt;padding: 0in 5.4pt;vertical-align: top;">
                <p style='margin-top:0in;margin-right:0in;margin-bottom:.0001pt;margin-left:0in;line-height:normal;font-size:15px;font-family:"Calibri","sans-serif";text-align:right;'>{{$expense->amount}}</p>
            </td>
        </tr>
        @endforeach 
    </tbody>
</table>
<p style='margin-top:0in;margin-right:0in;margin-bottom:10.0pt;margin-left:0in;line-height:115%;font-size:15px;font-family:"Calibri","sans-serif";'><strong>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;</strong></p>
<table style="border-collapse:collapse;border:none;">
    <tbody>
        <tr>
            <td style="width: 239.4pt;padding: 0in 5.4pt;vertical-align: top;">
                <p style='margin-top:0in;margin-right:0in;margin-bottom:.0001pt;margin-left:0in;line-height:  normal;font-size:15px;font-family:"Calibri","sans-serif";'><strong>&nbsp; ADMINISTRATIVE EXPENSES</strong></p>
            </td>
            <td style="width: 239.4pt;padding: 0in 5.4pt;vertical-align: top;">
                <p style='margin-top:0in;margin-right:0in;margin-bottom:.0001pt;margin-left:0in;line-height:normal;font-size:15px;font-family:"Calibri","sans-serif";text-align:right;'>{{$administrative}}</p>
                <p style='margin-top:0in;margin-right:0in;margin-bottom:.0001pt;margin-left:0in;line-height:normal;font-size:15px;font-family:"Calibri","sans-serif";text-align:right;'>&nbsp;</p>
                <p style='margin-top:0in;margin-right:0in;margin-bottom:.0001pt;margin-left:0in;line-height:normal;font-size:15px;font-family:"Calibri","sans-serif";text-align:right;'>&nbsp;</p>
            </td>
        </tr>
        <tr>
            <td style="width: 239.4pt;padding: 0in 5.4pt;vertical-align: top;">
                <p style='margin-top:0in;margin-right:0in;margin-bottom:.0001pt;margin-left:0in;line-height:normal;font-size:15px;font-family:"Calibri","sans-serif";text-align:right;'><strong>TOTAL EXPENSES</strong></p>
            </td>
            <td style="width: 239.4pt;padding: 0in 5.4pt;vertical-align: top;">
                <p style='margin-top:0in;margin-right:0in;margin-bottom:.0001pt;margin-left:0in;line-height:normal;font-size:15px;font-family:"Calibri","sans-serif";text-align:right;'><strong>&nbsp; &nbsp;{{$totalexpense}}</strong></p>
            </td>
        </tr>
    </tbody>
</table>
<p style='margin-top:0in;margin-right:0in;margin-bottom:10.0pt;margin-left:0in;line-height:115%;font-size:15px;font-family:"Calibri","sans-serif";'>&nbsp;</p>
<p style='margin-top:0in;margin-right:0in;margin-bottom:10.0pt;margin-left:0in;line-height:115%;font-size:15px;font-family:"Calibri","sans-serif";'><strong><span style="font-size:19px;line-height:115%;color:white;">A</span></strong></p>
<table style="margin-left:5.4pt;background:#365F91;border-collapse:collapse;border:none;">
    <tbody>
        <tr>
            <td style="width: 3.25in;padding: 0in 5.4pt;vertical-align: top;">
                <p style='margin-top:0in;margin-right:0in;margin-bottom:.0001pt;margin-left:0in;line-height:  normal;font-size:15px;font-family:"Calibri","sans-serif";'><strong><span style="font-size:19px;color:white;">NET PROFIT</span></strong></p>
            </td>
            <td style="width: 239.4pt;padding: 0in 5.4pt;vertical-align: top;">
                <p style='margin-top:0in;margin-right:0in;margin-bottom:.0001pt;margin-left:0in;line-height:normal;font-size:15px;font-family:"Calibri","sans-serif";text-align:right;'><strong><span style="font-size:19px;color:white;">N&nbsp;</span></strong><strong><span style="font-size:19px;color:white;">{{$netincome}}</span></strong></p>
            </td>
        </tr>
    </tbody>
</table>
<p style='margin-top:0in;margin-right:0in;margin-bottom:10.0pt;margin-left:0in;line-height:115%;font-size:15px;font-family:"Calibri","sans-serif";'><strong><span style="font-size:19px;line-height:115%;color:white;">MOUNT (</span></strong><strong><span style='font-size:19px;line-height:115%;font-family:"Segoe UI","sans-serif";color:white;'>₦</span></strong><strong><span style='font-size:19px;line-height:115%;font-family:"Arial Rounded MT Bold","sans-serif";color:white;'>)</span></strong></p>
<p style='margin-top:0in;margin-right:0in;margin-bottom:10.0pt;margin-left:0in;line-height:115%;font-size:15px;font-family:"Calibri","sans-serif";'>&nbsp;</p>
<p style='margin-top:0in;margin-right:0in;margin-bottom:10.0pt;margin-left:0in;line-height:115%;font-size:15px;font-family:"Calibri","sans-serif";'>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;</p>
<p style='margin-top:0in;margin-right:0in;margin-bottom:10.0pt;margin-left:0in;line-height:115%;font-size:15px;font-family:"Calibri","sans-serif";'>&nbsp;</p>
<p style='margin-top:0in;margin-right:0in;margin-bottom:10.0pt;margin-left:0in;line-height:115%;font-size:15px;font-family:"Calibri","sans-serif";'><span style="font-size:17px;line-height:115%;">&nbsp;</span></p>
</body>
</html>