<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="fr">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <title>Votre Code de Vérification (OTP)</title>
    <style type="text/css">
        body {
            font-family: 'Segoe UI', Roboto, Helvetica, Arial, sans-serif;
            line-height: 1.6;
            color: #1e293b;
            background-color: #f8fafc;
            margin: 0;
            padding: 0;
            -webkit-font-smoothing: antialiased;
        }
        .wrapper {
            width: 100%;
            table-layout: fixed;
            background-color: #f8fafc;
            padding-bottom: 40px;
        }
        .container {
            max-width: 600px;
            margin: 0 auto;
            background-color: #ffffff;
            border-radius: 16px;
            overflow: hidden;
            margin-top: 40px;
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);
        }
        .header {
            background-color: #2563eb; /* Primary color de CoreUI */
            padding: 40px 20px;
            text-align: center;
            color: #ffffff;
        }
        .header h1 {
            margin: 0;
            font-size: 24px;
            font-weight: 700;
            letter-spacing: -0.025em;
        }
        .content {
            padding: 40px 30px;
            text-align: center;
        }
        .content p {
            margin: 0 0 20px;
            font-size: 16px;
            color: #475569;
        }
        .otp-container {
            background-color: #f1f5f9;
            border-radius: 12px;
            padding: 24px;
            margin: 30px 0;
            border: 1px solid #e2e8f0;
        }
        .otp-code {
            font-family: 'Courier New', Courier, monospace;
            font-size: 36px;
            font-weight: 800;
            color: #2563eb; /* Primary color de CoreUI */
            letter-spacing: 8px;
            margin: 0;
        }
        .expiry-text {
            font-size: 14px;
            color: #64748b;
            margin-top: 10px;
        }
        .warning-box {
            background-color: #fffbeb;
            border-left: 4px solid #f59e0b;
            padding: 20px;
            margin: 0 30px 30px;
            text-align: left;
            border-radius: 0 8px 8px 0;
        }
        .warning-box p {
            margin: 0;
            font-size: 13px;
            color: #92400e;
            line-height: 1.5;
        }
        .footer {
            text-align: center;
            padding: 20px;
            font-size: 12px;
            color: #94a3b8;
        }
        @media only screen and (max-width: 600px) {
            .container {
                margin-top: 20px;
                width: 95%;
            }
            .content {
                padding: 30px 20px;
            }
        }
    </style>
</head>
<body>
<div class="wrapper">
    <table role="presentation" class="container" cellpadding="0" cellspacing="0" width="100%">
        <tr>
            <td class="header">
                <h1><?php echo e(config('app.name')); ?></h1>
            </td>
        </tr>
        <tr>
            <td class="content">
                <p style="font-weight: 600; color: #1e293b; font-size: 18px;">Code de vérification</p>
                <p>Bonjour,</p>
                <p>Utilisez le code ci-dessous pour sécuriser votre accès. Pour votre sécurité, ce code est à usage unique.</p>

                <div class="otp-container">
                    <div class="otp-code"><?php echo e($otp); ?></div>
                    <div class="expiry-text">Valable pendant <?php echo e($expiryMinutes ?? 10); ?> minutes</div>
                </div>

                <p style="font-size: 14px;">Si vous n'êtes pas à l'origine de cette demande, vous pouvez ignorer cet email en toute sécurité.</p>
            </td>
        </tr>
        <tr>
            <td>
                <div class="warning-box">
                    <p><strong>Attention :</strong> Ne partagez jamais ce code avec qui que ce soit. Nos conseillers ne vous le demanderont jamais.</p>
                </div>
            </td>
        </tr>
        <tr>
            <td class="footer">
                <p>&copy; <?php echo e(date('Y')); ?> <?php echo e(config('app.name')); ?>. Tous droits réservés.</p>
                <p>Ceci est un message automatique, merci de ne pas y répondre.</p>
            </td>
        </tr>
    </table>
</div>
</body>
</html>
<?php /**PATH /home/athanor/Documents/PhpstormProjects/Hope/Modules/Shared/resources/views/mail/auth/otp.blade.php ENDPATH**/ ?>