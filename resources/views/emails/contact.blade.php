<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/xhtml" xmlns:v="urn:schemas-microsoft-com:vml" xmlns:o="urn:schemas-microsoft-com:office:office">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="x-apple-disable-message-reformatting">
    <title>Contact Mail</title>

    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700" rel="stylesheet">

    <!-- CSS Reset : BEGIN -->
    <style>
        /* What it does: Remove spaces around the email design added by some email clients. */
        /* Beware: It can remove the padding / margin and add a background color to the compose a reply window. */
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@100;200;300;400;500;600;700;800;900&display=swap');
        html,
        body {
            margin: 0 auto !important;
            padding: 0 !important;
            height: 100% !important;
            width: 100% !important;
            background: white!important;
            font-family: 'Inter', sans-serif!important;
            font-weight: 500!important;
            line-height: 1.63!important;
        }
        /* What it does: Stops email clients resizing small text. */
        * {
            -ms-text-size-adjust: 100%;
            -webkit-text-size-adjust: 100%;
            font-family: 'Inter', sans-serif!important;
        }
        /* What it does: Centers email on Android 4.4 */
        div[style*="margin: 16px 0"] {
            margin: 0 !important;
        }

    </style>


</head>

<body width="100%" style="margin: 0; padding: 0 !important; mso-line-height-rule: exactly; background-color: white;">


<div style="padding:35px 20px!important; line-height: 2.0!important; " class="email-container">
    <!-- BEGIN BODY -->



    <h4 style="    color: #143855!important; text-transform: capitalize!important;">A new contact message from   <b style="text-transform: capitalize">{{ ($name) }}</b></h4>

    <div style="    color: #143855!important;">
        <p>These are the content of the message:</p>

        <ul>
            <li>Email Address: {{$email}}</li>
            <li>Phone number: {{$phone ?? ''}}</li>
            <li>Message content: {{$messages ?? ''}}</li>

        </ul>
    </div>

</div>

</body>
</html>
