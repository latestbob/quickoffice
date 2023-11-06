<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <p style='margin-top:0in;margin-right:0in;margin-bottom:8.0pt;margin-left:0in;line-height:107%;font-size:15px;font-family:"Calibri","sans-serif";text-align:right;'> <img src="<?php echo("https://quickoffice.online/logo/".\App\Office::where('office_name',Auth::user()->office)->value('logo'));  ?>" alt=""style="width:150px;height:100px;"><span style="font-size:32px;line-height:107%;color:#A6A6A6;">INVOICE</span></p>
<p style='margin-top:0in;margin-right:0in;margin-bottom:8.0pt;margin-left:0in;line-height:107%;font-size:15px;font-family:"Calibri","sans-serif";'>&nbsp;</p>
<p style='margin-top:0in;margin-right:0in;margin-bottom:8.0pt;margin-left:0in;line-height:107%;font-size:15px;font-family:"Calibri","sans-serif";'>&nbsp;</p>
<p style='margin-top:0in;margin-right:0in;margin-bottom:.0001pt;margin-left:0in;line-height:107%;font-size:15px;font-family:"Calibri","sans-serif";'><span style='font-size:16px;line-height:107%;font-family:"Calibri Light","sans-serif";'>&nbsp;</span></p>
<table style="border-collapse:collapse;border:none;">
    <tbody>
        <tr>
            <td style="width: 304.8pt;padding: 0in 5.4pt;vertical-align: top;">
                <p style='margin-top:0in;margin-right:0in;margin-bottom:3.0pt;margin-left:0in;line-height:normal;font-size:15px;font-family:"Calibri","sans-serif";'><span style="font-size:21px;">{{Auth::user()->office}}</span></p>
                <p style='margin-top:0in;margin-right:0in;margin-bottom:3.0pt;margin-left:0in;line-height:normal;font-size:15px;font-family:"Calibri","sans-serif";'><span style='font-size:16px;font-family:"Calibri Light","sans-serif";'>&nbsp;</span></p>
                <p style='margin-top:0in;margin-right:0in;margin-bottom:3.0pt;margin-left:0in;line-height:normal;font-size:15px;font-family:"Calibri","sans-serif";'><span style='font-size:16px;font-family:"Calibri Light","sans-serif";'>Phone: {{\App\Office::where('office_name',Auth::user()->office)->value('official_phone')}}</span></p>
                <p style='margin-top:0in;margin-right:0in;margin-bottom:3.0pt;margin-left:0in;line-height:normal;font-size:15px;font-family:"Calibri","sans-serif";'><span style='font-size:16px;font-family:"Calibri Light","sans-serif";'>Email: {{\App\Office::where('office_name',Auth::user()->office)->value('official_mail')}}</span></p>
                <p style='margin-top:0in;margin-right:0in;margin-bottom:3.0pt;margin-left:0in;line-height:normal;font-size:15px;font-family:"Calibri","sans-serif";'><span style='font-size:16px;font-family:"Calibri Light","sans-serif";'>Address: {{\App\Office::where('office_name',Auth::user()->office)->value('office_address')}}</span></p>
                <p style='margin-top:0in;margin-right:0in;margin-bottom:3.0pt;margin-left:0in;line-height:normal;font-size:15px;font-family:"Calibri","sans-serif";'><span style='font-size:16px;font-family:"Calibri Light","sans-serif";'>Your City, State Zip</span></p>
            </td>
            <td style="width: 162.95pt;padding: 0in 5.4pt;vertical-align: top;">
                <p style='margin-top:0in;margin-right:0in;margin-bottom:3.0pt;margin-left:0in;line-height:normal;font-size:13px;font-family:"Calibri","sans-serif";text-align:right;'><span style='font-size:16px;font-family:"Calibri Light","sans-serif";'>Invoice ref</span></p>
                <p style='margin-top:0in;margin-right:0in;margin-bottom:3.0pt;margin-left:0in;line-height:normal;font-size:13px;font-family:"Calibri","sans-serif";text-align:right;'><span style='font-size:16px;font-family:"Calibri Light","sans-serif";'>Invoice date</span></p>
                <p style='margin-top:0in;margin-right:0in;margin-bottom:3.0pt;margin-left:0in;line-height:normal;font-size:13px;font-family:"Calibri","sans-serif";text-align:right;'><span style='font-size:16px;font-family:"Calibri Light","sans-serif";'>Due date</span></p>
            </td>
            <td style="width: 93.35pt;padding: 0in 5.4pt;vertical-align: top;">
                <p style='margin-top:0in;margin-right:0in;margin-bottom:3.0pt;margin-left:0in;line-height:normal;font-size:13px;font-family:"Calibri","sans-serif";'><span style='font-size:16px;font-family:"Calibri Light","sans-serif";'>{{$invoice->invoiceid}}</span></p>
                <p style='margin-top:0in;margin-right:0in;margin-bottom:3.0pt;margin-left:0in;line-height:normal;font-size:13px;font-family:"Calibri","sans-serif";'><span style='font-size:16px;font-family:"Calibri Light","sans-serif";'>{{date('Y/m/d')}}</span></p>
                <p style='margin-top:0in;margin-right:0in;margin-bottom:3.0pt;margin-left:0in;line-height:normal;font-size:13px;font-family:"Calibri","sans-serif";'><span style='font-size:16px;font-family:"Calibri Light","sans-serif";'> - </span></p>
                <p style='margin-top:0in;margin-right:0in;margin-bottom:3.0pt;margin-left:0in;line-height:normal;font-size:13px;font-family:"Calibri","sans-serif";'><span style='font-size:16px;font-family:"Calibri Light","sans-serif";'>&nbsp;</span></p>
            </td>
        </tr>
    </tbody>
</table>
<p style='margin-top:0in;margin-right:0in;margin-bottom:.0001pt;margin-left:0in;line-height:107%;font-size:15px;font-family:"Calibri","sans-serif";'><span style='font-size:16px;line-height:107%;font-family:"Calibri Light","sans-serif";'>&nbsp;</span></p>
<p style='margin-top:0in;margin-right:0in;margin-bottom:.0001pt;margin-left:0in;line-height:107%;font-size:15px;font-family:"Calibri","sans-serif";'><span style="font-size:16px;line-height:107%;">&nbsp;</span></p>
<table style="border-collapse:collapse;border:none;">
    <tbody>
        <tr>
            <td style="width: 294.25pt;padding: 0in 5.4pt;height: 83.25pt;vertical-align: top;">
                <p style='margin-top:0in;margin-right:0in;margin-bottom:3.0pt;margin-left:0in;line-height:normal;font-size:15px;font-family:"Calibri","sans-serif";'><span style="font-size:19px;">Bill To:</span></p>
                <p style='margin-top:0in;margin-right:0in;margin-bottom:3.0pt;margin-left:0in;line-height:normal;font-size:15px;font-family:"Calibri","sans-serif";'><span style='font-size:11px;font-family:"Calibri Light","sans-serif";'>&nbsp;</span></p>
                <p style='margin-top:0in;margin-right:0in;margin-bottom:3.0pt;margin-left:0in;line-height:normal;font-size:15px;font-family:"Calibri","sans-serif";'><span style='font-size:16px;font-family:"Calibri Light","sans-serif";'>{{$invoice->client}}</span></p>
                <p style='margin-top:0in;margin-right:0in;margin-bottom:3.0pt;margin-left:0in;line-height:normal;font-size:15px;font-family:"Calibri","sans-serif";'><span style='font-size:16px;font-family:"Calibri Light","sans-serif";'>{{\App\User::where('name',$invoice->client)->value('email')}}</span></p>
                <p style='margin-top:0in;margin-right:0in;margin-bottom:3.0pt;margin-left:0in;line-height:normal;font-size:15px;font-family:"Calibri","sans-serif";'><span style='font-size:16px;font-family:"Calibri Light","sans-serif";'>Billing address</span></p>
            </td>
       
        </tr>
    </tbody>
</table>
<p style='margin-top:0in;margin-right:0in;margin-bottom:.0001pt;margin-left:0in;line-height:107%;font-size:15px;font-family:"Calibri","sans-serif";'><span style="font-size:16px;line-height:107%;">&nbsp;</span></p>
<p style='margin-top:0in;margin-right:0in;margin-bottom:.0001pt;margin-left:0in;line-height:107%;font-size:15px;font-family:"Calibri","sans-serif";'><span style="font-size:16px;line-height:107%;">&nbsp;</span></p>
<p style='margin-top:0in;margin-right:0in;margin-bottom:.0001pt;margin-left:0in;line-height:107%;font-size:15px;font-family:"Calibri","sans-serif";text-align:center;background:#BFBFBF;padding:15px;'><strong><span style="font-size:20px;line-height:107%;">DESCRIPTIONS</span></strong></p>
<p style='margin-top:0in;margin-right:0in;margin-bottom:.0001pt;margin-left:0in;line-height:107%;font-size:15px;font-family:"Calibri","sans-serif";'><span style="font-size:16px;line-height:107%;">&nbsp;</span></p>
<hr>





<table style="border-collapse:collapse;border:none;">
    <tbody>
        <tr>
            <td style="width: 6.65in;padding: 0in 5.4pt;vertical-align: top;">
                <p style='margin-top:0in;margin-right:0in;margin-bottom:.0001pt;margin-left:0in;line-height:150%;font-size:15px;font-family:"Calibri","sans-serif";text-align:  justify;'><span style='font-size:16px;line-height:150%;font-family:"Times New Roman","serif";'><?php echo htmlspecialchars_decode($invoice->description);?></span></p>
            </td>
        </tr>
    </tbody>
</table>
<hr>


<table style="float:right;font-family: arial, sans-serif;
  border-collapse: collapse;
  width: 40%;">
   <tbody>
        <tr>
            <td style="
  text-align:left;
  padding: 8px;">SUBTOTAL</td>
            <td style="
  text-align: left;
  padding: 8px;">N {{ number_format($invoice->subtotal, 2) }}</td>
        </tr>

        <tr>
            <td style="
  text-align: left;
  padding: 8px;">VAT (%)</td>
            <td style="
  text-align: left;
  padding: 8px;">{{$invoice->vat}}</td>
        </tr>

        <tr>
            <td style="
  text-align: left;
  padding: 8px;">SHIPPING</td>
            <td style="
  text-align: left;
  padding: 8px;">N {{ number_format($invoice->shipping, 2) }}</td>
        </tr>

        <tr style="background:#BFBFBF;">
            <td style="
  text-align: left;
  padding: 8px;"><b>TOTAL</b></td>
            <td style="
  text-align: left;
  padding: 8px;"><B>N {{ number_format($invoice->total, 2) }}</B></td>
        </tr>
   </tbody>

</table>




<p style='margin-top:0in;margin-right:0in;margin-bottom:.0001pt;margin-left:0in;line-height:107%;font-size:15px;font-family:"Calibri","sans-serif";'><br></p>
<p style='margin-top:0in;margin-right:0in;margin-bottom:.0001pt;margin-left:0in;line-height:107%;font-size:15px;font-family:"Calibri","sans-serif";'><span style="font-size:16px;line-height:107%;">&nbsp;</span></p>
<p style='margin-top:0in;margin-right:0in;margin-bottom:.0001pt;margin-left:0in;line-height:107%;font-size:15px;font-family:"Calibri","sans-serif";'><span style="font-size:16px;line-height:107%;">&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;</span></p>
<p style='margin-top:0in;margin-right:0in;margin-bottom:.0001pt;margin-left:0in;line-height:107%;font-size:15px;font-family:"Calibri","sans-serif";'><span style="font-size:16px;line-height:107%;">&nbsp;</span></p>
<p style='margin-top:0in;margin-right:0in;margin-bottom:.0001pt;margin-left:0in;line-height:107%;font-size:15px;font-family:"Calibri","sans-serif";'><span style="font-size:16px;line-height:107%;">&nbsp;</span></p>
<p style='margin-top:0in;margin-right:0in;margin-bottom:.0001pt;margin-left:0in;line-height:107%;font-size:15px;font-family:"Calibri","sans-serif";'><span style="font-size:16px;line-height:107%;">&nbsp;</span></p>
<p style='margin-top:0in;margin-right:0in;margin-bottom:.0001pt;margin-left:0in;line-height:107%;font-size:15px;font-family:"Calibri","sans-serif";'><span style="font-size:16px;line-height:107%;">&nbsp;</span></p>

<p style='margin-top:0in;margin-right:0in;margin-bottom:.0001pt;margin-left:0in;line-height:107%;font-size:15px;font-family:"Calibri","sans-serif";'><span style='font-size:11px;line-height:107%;font-family:"Calibri Light","sans-serif";'>&nbsp;</span></p>
<p style='margin-top:0in;margin-right:0in;margin-bottom:.0001pt;margin-left:0in;line-height:107%;font-size:15px;font-family:"Calibri","sans-serif";'><span style='font-size:16px;line-height:107%;font-family:"Calibri Light","sans-serif";'>Thank you for your business.</span></p>
</body>
</html>