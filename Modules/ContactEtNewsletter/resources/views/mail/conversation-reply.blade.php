<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mise à Jour de votre Requête - Support</title>
</head>
<body style="font-family: Arial, sans-serif; line-height: 1.6; color: #333333; margin: 0; padding: 0; background-color: #f7f7f7;">

<table width="100%" border="0" cellspacing="0" cellpadding="0" role="presentation">
    <tr>
        <td align="center" style="padding: 30px 20px;">

            <table width="600" border="0" cellspacing="0" cellpadding="0" role="presentation" style="max-width: 600px; border-collapse: collapse; background-color: #ffffff; border-radius: 8px; overflow: hidden; border: 1px solid #e0e0e0; box-shadow: 0 4px 10px rgba(0, 0, 0, 0.05);">

                <tr>
                    <td style="padding: 24px 30px; background-color: #3B82F6; color: #ffffff;">
                        <h1 style="font-size: 24px; font-weight: bold; margin: 0;">
                            ✉️ Votre requête a été traitée
                        </h1>
                    </td>
                </tr>

                <tr>
                    <td style="padding: 30px 30px 20px 30px;">

                        <p style="font-size: 16px; color: #4A5568; margin-bottom: 25px;">
                            Bonjour **{{ $conversation->contact->name ?? 'client' }}**,
                        </p>

                        <div style="background-color: #F3F4F6; padding: 15px 20px; border-left: 4px solid #3B82F6; border-radius: 4px; margin: 20px 0;">
                            <p style="font-weight: 600; color: #2D3748; margin-bottom: 8px; font-size: 15px;">
                                Réponse de l'équipe :
                            </p>
                            <p style="text-align: left; font-size: 15px; color: #4A5568; margin-top: 0; margin-bottom: 0; white-space: pre-wrap;">
                                {{ $content }}
                            </p>
                        </div>

                        <p style="font-size: 16px; color: #4A5568; margin-top: 25px; margin-bottom: 30px;">
                            Nous espérons que cette mise à jour répond à votre question.
                        </p>

                        <div style="text-align: center; margin-top: 20px; margin-bottom: 30px;">
                            <a href="{{  route('visitor.contact-us') }}" style="display: inline-block; padding: 12px 24px; border: 1px solid #3B82F6; font-size: 16px; font-weight: bold; color: #ffffff; background-color: #3B82F6; border-radius: 6px; text-decoration: none; box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2); transition: background-color 0.3s ease;">
                                Répondre sur notre site web
                            </a>
                        </div>

                        {{--<div style="background-color: #ECFDF5; padding: 15px; border-left: 4px solid #059669; border-radius: 4px; margin-top: 25px;">
                            <p style="font-weight: bold; color: #065F46; margin-top: 0; margin-bottom: 5px; font-size: 14px;">
                                💡 Conseil : Réponse par e-mail
                            </p>
                            <p style="text-align: left; font-size: 14px; color: #065F46; margin: 0;">
                                Vous pouvez aussi simplement répondre à cet e-mail. Votre message sera **automatiquement ajouté** à la conversation.
                            </p>
                        </div>--}}

                    </td>
                </tr>

                <tr>
                    <td style="padding: 20px 30px; background-color: #F7FAFC; border-top: 1px solid #e0e0e0; text-align: center;">
                        <hr style="border: none; border-top: 1px solid #e0e0e0; margin: 0 auto 15px auto; width: 60%;">

                        <p style="font-size: 12px; color: #718096; margin: 0 0 5px 0;">
                            L'équipe de Support - **{{ config('app.name') }}**
                        </p>
                        <p style="font-size: 12px; margin: 0;">
                            <a href="{{ route('visitor.contact-us') }}" style="color: #3B82F6; text-decoration: none; font-weight: bold;">
                                Nous Contacter
                            </a>
                            <span style="color: #718096;"> | </span>
                            <span style="color: #718096;">Merci d'utiliser notre système de support.</span>
                        </p>
                    </td>
                </tr>
            </table>

        </td>
    </tr>
</table>

</body>
</html>
