
<!DOCTYPE html>
<html lang="pt-br" xmlns="http://www.w3.org/1999/xhtml" xmlns:v="urn:schemas-microsoft-com:vml" xmlns:o="urn:schemas-microsoft-com:office:office">
<head>
    <meta charset="utf-8"> <!-- utf-8 works for most cases -->
    <meta name="viewport" content="width=device-width"> <!-- Forcing initial-scale shouldn't be necessary -->
    <meta http-equiv="X-UA-Compatible" content="IE=edge"> <!-- Use the latest (edge) version of IE rendering engine -->
    <meta name="x-apple-disable-message-reformatting">  <!-- Disable auto-scale in iOS 10 Mail entirely -->
    <meta name="format-detection" content="telephone=no,address=no,email=no,date=no,url=no"> <!-- Tell iOS not to automatically link certain text strings. -->
    <title></title> <!-- The title tag shows in email notifications, like Android 4.4. -->

    <!-- Web Font / @font-face : BEGIN -->
    <!-- NOTE: If web fonts are not required, lines 10 - 27 can be safely removed. -->

    <!-- Desktop Outlook chokes on web font references and defaults to Times New Roman, so we force a safe fallback font. -->
    <!--[if mso]>
        <style>
            * {
                font-family: sans-serif !important;
            }
        </style>
    <![endif]-->

    <!-- All other clients get the webfont reference; some will render the font and others will silently fail to the fallbacks. More on that here: http://stylecampaign.com/blog/2015/02/webfont-support-in-email/ -->
    <!--[if !mso]><!-->
    <!-- insert web font reference, eg: <link href='https://fonts.googleapis.com/css?family=Roboto:400,700' rel='stylesheet' type='text/css'> -->
    <!--<![endif]-->

    <!-- Web Font / @font-face : END -->

    <!-- CSS Reset : BEGIN -->
    <style>

        /* What it does: Remove spaces around the email design added by some email clients. */
        /* Beware: It can remove the padding / margin and add a background color to the compose a reply window. */
        html,
        body {
            margin: 0 auto !important;
            padding: 0 !important;
            height: 100% !important;
            width: 100% !important;
        }

        /* What it does: Stops email clients resizing small text. */
        * {
            -ms-text-size-adjust: 100%;
            -webkit-text-size-adjust: 100%;
        }

        /* What it does: Centers email on Android 4.4 */
        div[style*="margin: 16px 0"] {
            margin: 0 !important;
        }

        /* What it does: forces Samsung Android mail clients to use the entire viewport */
        #MessageViewBody, #MessageWebViewDiv{
            width: 100% !important;
        }

        /* What it does: Stops Outlook from adding extra spacing to tables. */
        table,
        td {
            mso-table-lspace: 0pt !important;
            mso-table-rspace: 0pt !important;
        }

        /* What it does: Replaces default bold style. */
        th {
        	font-weight: normal;
        }

        /* What it does: Fixes webkit padding issue. */
        table {
            border-spacing: 0 !important;
            border-collapse: collapse !important;
            table-layout: fixed !important;
            margin: 0 auto !important;
        }

        /* What it does: Prevents Windows 10 Mail from underlining links despite inline CSS. Styles for underlined links should be inline. */
        a {
            text-decoration: none;
        }

        /* What it does: Uses a better rendering method when resizing images in IE. */
        img {
            -ms-interpolation-mode:bicubic;
        }

        /* What it does: A work-around for email clients meddling in triggered links. */
        a[x-apple-data-detectors],  /* iOS */
        .unstyle-auto-detected-links a,
        .aBn {
            border-bottom: 0 !important;
            cursor: default !important;
            color: inherit !important;
            text-decoration: none !important;
            font-size: inherit !important;
            font-family: inherit !important;
            font-weight: inherit !important;
            line-height: inherit !important;
        }

        /* What it does: Prevents Gmail from changing the text color in conversation threads. */
        .im {
            color: inherit !important;
        }

        /* What it does: Prevents Gmail from displaying a download button on large, non-linked images. */
        .a6S {
           display: none !important;
           opacity: 0.01 !important;
		}
		/* If the above doesn't work, add a .g-img class to any image in question. */
		img.g-img + div {
		   display: none !important;
        }
        .bg-body{
            background: #fdfdfd !important;
        }
        .bg-white{
            background: white !important;
        }
        .bg-first{
            background: #bed62f !important; //deea97
        }
        .bg-first-light{
            background: #f8faea !important;
            /* background: #f2f6d5 !important; */
            /* background: #ebf2c0 !important; */
            /* background: #deea97 !important; */
        }
        .bg-second{
            background: #f36f21 !important;
        }

        .text-white{
            color: #ffffff !important;
        }
        .text-first{
            color: #bed62f !important;
        }
        .text-second{
            color: #f36f21 !important;
        }

        /* What it does: Removes right gutter in Gmail iOS app: https://github.com/TedGoas/Cerberus/issues/89  */
        /* Create one of these media queries for each additional viewport size you'd like to fix */

        /* iPhone 4, 4S, 5, 5S, 5C, and 5SE */
        @media only screen and (min-device-width: 320px) and (max-device-width: 374px) {
            u ~ div .email-container {
                min-width: 320px !important;
            }
        }
        /* iPhone 6, 6S, 7, 8, and X */
        @media only screen and (min-device-width: 375px) and (max-device-width: 413px) {
            u ~ div .email-container {
                min-width: 375px !important;
            }
        }
        /* iPhone 6+, 7+, and 8+ */
        @media only screen and (min-device-width: 414px) {
            u ~ div .email-container {
                min-width: 414px !important;
            }
        }

    </style>

    <!-- What it does: Makes background images in 72ppi Outlook render at correct size. -->
    <!--[if gte mso 9]>
    <xml>
        <o:OfficeDocumentSettings>
            <o:AllowPNG/>
            <o:PixelsPerInch>96</o:PixelsPerInch>
        </o:OfficeDocumentSettings>
    </xml>
    <![endif]-->

    <!-- CSS Reset : END -->

    <!-- Progressive Enhancements : BEGIN -->
    <style>

        /* What it does: Hover styles for buttons */
        .button-td,
        .button-a {
            transition: all 100ms ease-in;
        }
	    .button-td-first,
	    .button-a-first {
	        background: #bed62f !important;
	        border-color: #bed62f !important;
        }
	    .button-td-first:hover,
	    .button-a-first:hover {
	        background: #98ab25 !important;
	        border-color: #98ab25 !important;
        }
	    .button-td-second,
	    .button-a-second {
	        background: #f36f21 !important;
	        border-color: #f36f21 !important;
        }
	    .button-td-second:hover,
	    .button-a-second:hover {
	        background: #c2581a !important;
	        border-color: #c2581a !important;
        }
        .border-radius{
            border-radius: 7px !important;
        }
        .box-shadow{
            /* box-shadow: 0 0 10px #f5f5f5; */
            /* box-shadow: 0 0 3px #f0f0f0; */
            /* box-shadow: 0 0 4px #deea97; */
            box-shadow: 0 0 5px #f8faea !important;
        }

        /* .text-center-mobile{
            text-align: left;
        } */

        /* Media Queries */
        @media screen and (max-width: 600px) {

            .email-container {
                width: 100% !important;
                margin: auto !important;
            }

            /* What it does: Forces table cells into full-width rows. */
            .stack-column,
            .stack-column-center {
                display: block !important;
                width: 100% !important;
                max-width: 100% !important;
                direction: ltr !important;
            }
            /* And center justify these ones. */
            .stack-column-center {
                text-align: center !important;
            }

            /* What it does: Generic utility class for centering. Useful for images, buttons, and nested tables. */
            .center-on-narrow {
                text-align: center !important;
                display: block !important;
                margin-left: auto !important;
                margin-right: auto !important;
                float: none !important;
            }
            table.center-on-narrow {
                display: inline-block !important;
            }

            /* What it does: Adjust typography on small screens to improve readability */
            .email-container p.title {
                font-size: 17px !important;
            }

            .email-container p {
                font-size: 15px !important;
            }

            /* .email-container p.text-size-mobile {
                font-size: 15px !important;
            } */

            .border-radius{
                border-radius: 0;
            }

            .box-shadow{
                box-shadow: 0 0 0 transparent !important;
            }

            .text-align-sd{
                text-align: center !important;
            }
            .text-size-mobile{
                font-size: 10px !important
            }
        }

    </style>
    <!-- Progressive Enhancements : END -->



</head>
<!--
	The email background color (#222222) is defined in three places:
	1. body tag: for most email clients
	2. center tag: for Gmail and Inbox mobile apps and web versions of Gmail, GSuite, Inbox, Yahoo, AOL, Libero, Comcast, freenet, Mail.ru, Orange.fr
	3. mso conditional: For Windows 10 Mail
-->
<body class="bg-body" width="100%" style="margin: 0; padding: 0 !important; mso-line-height-rule: exactly;">
	<center class="bg-body" style="width: 100%;">
    <!--[if mso | IE]>
    <table class="bg-body" role="presentation" border="0" cellpadding="0" cellspacing="0" width="100%">
    <tr>
    <td>
    <![endif]-->

        <!-- Email Body : BEGIN -->
        <table align="center" role="presentation" cellspacing="0" cellpadding="0" border="0" width="600" style="margin: auto;" class="email-container">
	        <!-- Email Header : BEGIN -->
            <tr>
                <td style="padding: 20px 0; text-align: center">
                    {{-- <img src="{{ asset('/images/brand/logo-horizontal.png') }}" width="130" height="50" alt="Logotipo" border="0" style="height: auto; font-family: sans-serif; font-size: 15px; line-height: 15px; color: #555555;"> --}}
                    <img src="{{ $message->embed(public_path() . '/images/brand/logo-horizontal.png') }}" width="130" height="50" alt="Logotipo" border="0" style="height: auto; font-family: sans-serif; font-size: 15px; line-height: 15px; color: #555555;">
                </td>
            </tr>
            <!-- Email Header : END -->

            <tr>
	            <td style="padding: 10px 0;">
	                <table style="background: #bed62f" role="presentation" cellspacing="0" cellpadding="0" border="0" width="100%">
	                    <tr>
                            <td style="padding: 20px; text-align: center; font-family: sans-serif; font-size: 18px; line-height: 20px; color: #fff; font-weight: bold;">
                                <p class="title" style="margin: 0;">@yield('title')</p>
                            </td>
	                    </tr>
	                </table>
	            </td>
            </tr>

        </table>

        <table align="center" role="presentation" cellspacing="0" cellpadding="0" border="0" width="600" style="margin: auto;" class="email-container">
            @yield('content')
	    </table>
	    <!-- Email Body : END -->

        <br>

	    <!-- Email Footer : BEGIN -->
        <table align="center" role="presentation" cellspacing="0" cellpadding="0" border="0" width="600" style="margin: auto;" class="email-container">
	        {{-- <tr>
	            <td style="font-family: sans-serif; font-size: 12px; line-height: 15px; text-align: center; color: #888888;">
	                <webversion style="color: #cccccc; text-decoration: underline; font-weight: bold;">Ver no Navegador</webversion>
	            </td>
            </tr> --}}

	        <tr>
                <td style="font-family: sans-serif; font-size: 14px; line-height: 1; padding-bottom: 20px; text-align: center; color: #888888;">
                    <span style="font-size: 14px;" class="unstyle-auto-detected-links">{{ env('APP_COMPANY') }}</span>
	            </td>
            </tr>

	        <tr>
                <td style="font-family: sans-serif; font-size: 12px; line-height: 15px; text-align: center; color: #888888;">
                    <span class="unstyle-auto-detected-links">Telefone: {{ env('APP_PHONE') }}</span>
                    <br>
                    <span class="unstyle-auto-detected-links">WhatsApp: {{ env('APP_WHATSAPP') }}</span>
	            </td>
            </tr>

            <tr>
                <td style="font-family: sans-serif; font-size: 14px; line-height: 1; padding-top: 10px; padding-bottom: 10px; text-align: center; color: #888888;">
                    <a href="{{ route('contacts') }}" style="font-weight: bold; color: #bed62f">envie uma mensagem</a>
	            </td>
            </tr>

            <tr>
	            <td style="padding: 10px 0;">
	                <table class="bg-second" style="background: #f36f21" role="presentation" cellspacing="0" cellpadding="0" border="0" width="100%">
	                    <tr>
                            <td style="text-align: center; font-family: sans-serif; margin: auto; padding: 5px 0; font-size: 14px; ">
                                <span style="color: #ffffff">Visite nossas redes sociais</span>
	                        </td>
	                    </tr>
	                    <tr>
                            <td style="text-align: center; margin: auto; padding-bottom: 5px;">
                                <a style="text-decoration: none;" href="{{ env('URL_FACEBOOK') }}">
                                    <img src="{{ $message->embed(public_path().'/images/icons/facebook.png') }}" style="width: 18px; margin: 0 10px;" alt="Facebook">
                                </a>
                                <a style="text-decoration: none;" href="{{ env('URL_INSTAGRAM') }}">
                                    <img src="{{ $message->embed(public_path().'/images/icons/instagram.png') }}" style="width: 18px; margin: 0 10px;" alt="Facebook">
                                </a>
	                        </td>
	                    </tr>
	                </table>
	            </td>
            </tr>

            <tr>
                <td style="font-family: sans-serif; font-size: 12px; line-height: 15px; text-align: center; color: #888888;">
                    <span class="unstyle-auto-detected-links">Enviado em {{ now()->format('d/m/Y H:i:s') }}</span>
                </td>
            </tr>

	        <tr>
                <td style="padding: 10px 0; font-family: sans-serif; font-size: 12px; line-height: 15px; text-align: center; color: #888888;">
                    <a href="#" style="color: #888888; text-decoration: underline;">Não desejo receber estes e-mails</a>
	            </td>
	        </tr>
	    </table>
	    <!-- Email Footer : END -->

    <!--[if mso | IE]>
    </td>
    </tr>
    </table>
    <![endif]-->
    </center>
</body>
</html>
