<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Get a Quote</title>
</head>
<body>
<h3 style="margin: 0">Dear Admin,</h3>
<p><b>Client Name</b> Mr. {{ $name }}, <b>Phone </b> no is {{$phone}}, <b>email</b> {{$email}} Country is {{$country}}.</p>
<p><b>Client message:</b> {{$note}}</p>
<p><b>Quantity</b> {{$quantity}}</p>
<p><b>Delivery Time</b> {{$deliveryTime}}</p>
<p><b>Return Type</b> {{$returnType}}</p>
<p><b>Service Name:</b> {{$serviceName}}</p>
<p><b>File link:</b> {{$fileLink}}</p>
<p><b>Please contact your valuable client as soon as possible.</b> </p>
</body>
</html>
