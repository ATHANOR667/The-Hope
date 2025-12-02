<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Réponse à votre Requête - Support</title>
</head>
<body style="font-family: 'Inter', Arial, sans-serif; line-height: 1.6; color: #333333; margin: 0; padding: 0; background-color: #f7f7f7;">

<table width="100%" border="0" cellspacing="0" cellpadding="0" role="presentation">
    <tr>
        <td align="center" style="padding: 30px 20px;">

            <table width="600" border="0" cellspacing="0" cellpadding="0" role="presentation" style="max-width: 600px; border-collapse: collapse; background-color: #ffffff; border-radius: 8px; overflow: hidden; border: 1px solid #e0e0e0; box-shadow: 0 4px 15px rgba(0, 0, 0, 0.08);">

                <tr>
                    <td style="padding: 24px 30px; background-color: #2563EB; color: #ffffff;">
                        <h1 style="font-size: 24px; font-weight: bold; margin: 0;">
                            Votre requête a été traitée
                        </h1>
                    </td>
                </tr>

                <tr>
                    <td style="padding: 30px 30px 20px 30px;">

                        <p style="font-size: 16px; color: #374151; margin-bottom: 25px;">
                            Bonjour {{ $conversation->contact->name ?? 'client' }},
                        </p>

                        <div style="background-color: #F8F9FA; padding: 20px 25px; border: 1px solid #D1E0FF; border-radius: 6px; margin: 20px 0 30px 0;">
                            <p style="font-weight: 700; color: #1E3A8A; margin-bottom: 12px; font-size: 16px; border-bottom: 1px solid #E5E7EB; padding-bottom: 8px;">
                                Réponse de notre équipe de Support :
                            </p>
                            <div style="text-align: left; font-size: 15px; color: #4B5563; margin-top: 0; line-height: 1.7;">
                                <div style="white-space: pre-wrap;">
                                    {{ $content }}
                                </div>
                            </div>
                        </div>
                        <p style="font-size: 16px; color: #4A5568; margin-top: 25px; margin-bottom: 30px;">
                            Nous espérons que cette mise à jour a répondu à votre question. Si ce n'est pas le cas, vous pouvez y répondre directement.
                        </p>

                        <div style="text-align: center; margin-top: 20px; margin-bottom: 30px;">
                            <a href="{{  route('visitor.contact-us') }}" style="display: inline-block; padding: 14px 28px; border: 1px solid #2563EB; font-size: 16px; font-weight: bold; color: #ffffff; background-color: #2563EB; border-radius: 8px; text-decoration: none; box-shadow: 0 4px 8px rgba(37, 99, 235, 0.3); transition: background-color 0.3s ease;">
                                Revenir à la Conversation
                            </a>
                        </div>

                       {{-- <div style="background-color: #ECFDF5; padding: 15px; border-left: 4px solid #059669; border-radius: 4px; margin-top: 30px;">
                            <p style="font-weight: bold; color: #065F46; margin-top: 0; margin-bottom: 5px; font-size: 14px;">
                                Conseil : Répondre par e-mail
                            </p>
                            <p style="text-align: left; font-size: 14px; color: #065F46; margin: 0;">
                                Vous pouvez aussi simplement répondre à cet e-mail. Votre message sera automatiquement ajouté à la conversation de support.
                            </p>
                        </div>--}}

                    </td>
                </tr>

                <tr>
                    <td style="padding: 20px 30px; background-color: #F7FAFC; border-top: 1px solid #e0e0e0; text-align: center;">

                        <p style="font-size: 12px; color: #718096; margin: 0 0 5px 0;">
                            L'équipe de Support - {{ config('app.name') }}
                        </p>
                        <p style="font-size: 12px; margin: 0;">
                            <a href="{{ route('visitor.contact-us') }}" style="color: #2563EB; text-decoration: none; font-weight: bold;">
                                Contacter le Support
                            </a>
                            <span style="color: #718096;"> | </span>
                            <span style="color: #718096;">Merci de votre confiance.</span>
                        </p>
                    </td>
                </tr>
            </table>

        </td>
    </tr>
</table>

</body>
</html>
