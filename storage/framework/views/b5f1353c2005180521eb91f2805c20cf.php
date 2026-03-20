<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="fr">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <title>Passcode Accepté</title>
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
            background-color: #10b981; /* Success color */
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
        .btn-container {
            margin: 30px 0;
        }
        .btn {
            display: inline-block;
            padding: 14px 28px;
            background-color: #2563eb;
            color: #ffffff;
            text-decoration: none;
            border-radius: 8px;
            font-weight: 600;
            font-size: 16px;
            box-shadow: 0 4px 6px rgba(37, 99, 235, 0.2);
        }
        .footer {
            text-align: center;
            padding: 20px;
            font-size: 12px;
            color: #94a3b8;
            border-top: 1px solid #f1f5f9;
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
                    <h1>Demande Acceptée</h1>
                </td>
            </tr>
            <tr>
                <td class="content">
                    <p style="font-weight: 600; color: #1e293b; font-size: 18px;">Bonjour <?php echo e($admin->prenom); ?>,</p>
                    <p>Votre demande de mise à jour du passcode a été acceptée par l'administration.</p>
                    <p>Vous disposez de <strong>30 minutes</strong> pour finaliser ce changement en cliquant sur le bouton ci-dessous :</p>

                    <div class="btn-container">
                        <a href="<?php echo e(url()->temporarySignedRoute('admin.reset_passcode', now()->addMinutes(30), ['admin' => $admin->id])); ?>" class="btn">Changer le passcode</a>
                    </div>
                </td>
            </tr>
            <tr>
                <td class="footer">
                    <p>&copy; <?php echo e(date('Y')); ?> <?php echo e(config('app.name')); ?>. Tous droits réservés.</p>
                    <p>L'équipe de <?php echo e(config('app.name')); ?></p>
                </td>
            </tr>
        </table>
    </div>
</body>
</html>
<?php /**PATH /home/athanor/Documents/PhpstormProjects/Hope/Modules/AdminBase/resources/views/mail/passCode/passcode-update-accepted.blade.php ENDPATH**/ ?>