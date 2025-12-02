<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Confirmation de réception de votre message</title>
</head>
<body style="font-family: 'Inter', 'Helvetica Neue', Arial, sans-serif; line-height: 1.6; color: #333333; margin: 0; padding: 0; background-color: #f9f9f9;">

<table width="100%" border="0" cellspacing="0" cellpadding="0" role="presentation">
    <tr>
        <td align="center" style="padding: 24px 0;">
            <table width="600" border="0" cellspacing="0" cellpadding="0" role="presentation" style="max-width: 600px; border-collapse: collapse; background-color: #ffffff; border-radius: 8px; overflow: hidden; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.05);">

                <tr>
                    <td style="padding: 15px 30px; background-color: #FFFFFF; border-bottom: 3px solid #10B981;">
                        <table width="100%" border="0" cellspacing="0" cellpadding="0" role="presentation">
                            <tr>
                                <td align="left" style="width: 50%; vertical-align: middle;">
                                    <img src="{{ $logo }}" alt="The Hope Charity Logo" style="max-width: 150px; height: auto; display: block;">
                                </td>
                                <td align="right" style="width: 50%; vertical-align: middle;">
                                    <p style="margin: 0; font-size: 20px; font-weight: bold; color: #10B981;">The Hope Charity</p>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
                <tr>
                    <td style="padding: 30px;">
                        <p style="font-size: 16px; color: #333333; margin-bottom: 20px;">
                            Bonjour <strong style="color: #10B981;">{{ $name }}</strong> ({{ $email }}),
                        </p>

                        <p style="font-size: 16px; color: #333333; margin-bottom: 20px;">
                            Nous vous confirmons la bonne réception de votre message concernant : <strong style="color: #333333;">{{ $subject }}</strong>.
                        </p>

                        <div style="background-color: #F0FDF4; padding: 15px 20px; border-left: 4px solid #10B981; margin: 24px 0; border-radius: 4px;">
                            <p style="margin: 0; font-size: 15px; color: #15803D;">
                                Notre équipe va l'examiner et vous apportera une réponse dans les plus brefs délais sur cette même adresse email.
                            </p>
                            <p style="margin: 12px 0 0 0; font-size: 15px; font-weight: 600; color: #10B981;">
                                Votre référence de conversation : <span style="font-family: monospace;">#{{ $conversationId }}</span>
                            </p>
                        </div>

                        <div style="margin-top: 30px; padding: 20px; border: 1px solid #E5E7EB; background-color: #F8F5EE; border-radius: 6px;">
                            <p style="margin-top: 0; margin-bottom: 15px; font-size: 14px; font-weight: 600; color: #555555;">
                                Votre message :
                            </p>
                            <div style="white-space: pre-wrap; margin-bottom: 0; font-size: 14px; color: #444444; background-color: #ffffff; padding: 15px; border-radius: 4px; border: 1px solid #E0E0E0;">
                                {{ $content }}
                            </div>
                        </div>

                        <p style="margin-top: 30px; font-size: 16px; color: #333333;">
                            Merci de votre patience et à très bientôt.
                        </p>

                        <p style="font-size: 16px; color: #333333; margin-top: 24px;">
                            Cordialement,<br>
                            <strong style="color: #10B981;">L'équipe The Hope Charity</strong>
                        </p>
                    </td>
                </tr>

                <tr>
                    <td align="center" style="padding: 20px 30px; font-size: 12px; color: #777777; background-color: #F0FDF4; border-top: 1px solid #E0E0E0;">
                        Ceci est un email de confirmation automatique. Veuillez ne pas y répondre directement.
                        <br>
                        <span style="display: block; margin-top: 8px;">&copy; 2025 The Hope Charity. Tous droits réservés.</span>
                    </td>
                </tr>
            </table>
        </td>
    </tr>
</table>

</body>
</html>
