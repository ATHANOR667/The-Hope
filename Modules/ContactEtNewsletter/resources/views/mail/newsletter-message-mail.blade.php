<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $newsletterMessage->title }}</title>
</head>
<body style="font-family: 'Inter', Arial, sans-serif; line-height: 1.6; color: #333333; margin: 0; padding: 0; background-color: #f3f4f6;">

<table width="100%" border="0" cellspacing="0" cellpadding="0" role="presentation">
    <tr>
        <td align="center" style="padding: 30px 20px;">

            <table width="600" border="0" cellspacing="0" cellpadding="0" role="presentation" style="max-width: 600px; border-collapse: collapse; background-color: #ffffff; border-radius: 12px; overflow: hidden; border: 1px solid #e5e7eb; box-shadow: 0 10px 20px -5px rgba(0, 0, 0, 0.1);">

                <!-- Header Section -->
                <tr>
                    <td align="center" style="padding: 24px 30px; background-color: #059669; color: #ffffff;">
                        <h1 style="font-size: 28px; font-weight: 800; margin: 0; letter-spacing: 0.05em; text-transform: uppercase;">
                            {{ config('app.name') }}
                        </h1>
                        <p style="font-size: 12px; margin-top: 4px; opacity: 0.9;">Votre source d'information exclusive.</p>
                    </td>
                </tr>

                <!-- Title Section -->
                <tr>
                    <td style="padding: 20px 30px; border-bottom: 2px solid #D1FAE5;">
                        <h2 style="font-size: 24px; font-weight: 700; color: #1f2937; margin: 0; line-height: 1.3;">
                            {{ $newsletterMessage->title }}
                        </h2>
                    </td>
                </tr>

                <!-- WYSIWYG Content Area -->
                <tr>
                    <td class="wysiwyg-content" style="padding: 30px;">
                        <div style="font-size: 16px; color: #4b5563; line-height: 1.8;">
                            {!! $newsletterMessage->content !!}
                        </div>
                    </td>
                </tr>

                <!-- Specific Styling for WYSIWYG Content -->
                <tr>
                    <td style="padding: 0 30px;">
                        <style type="text/css">
                            .wysiwyg-content p {
                                margin-bottom: 1.5em !important;
                                margin-top: 0 !important;
                                line-height: 1.7 !important;
                                font-size: 16px !important;
                                color: #374151 !important;
                            }
                            .wysiwyg-content h1, .wysiwyg-content h2, .wysiwyg-content h3 {
                                margin-top: 2.5em !important;
                                margin-bottom: 0.8em !important;
                                color: #111827 !important;
                                font-weight: 700 !important;
                                line-height: 1.2 !important;
                            }
                            .wysiwyg-content ul, .wysiwyg-content ol {
                                margin-bottom: 1.5em !important;
                                padding-left: 20px !important;
                            }
                            .wysiwyg-content li {
                                margin-bottom: 0.5em !important;
                                line-height: 1.7 !important;
                                color: #374151 !important;
                            }
                            .wysiwyg-content a {
                                color: #059669 !important;
                                text-decoration: underline !important;
                            }
                        </style>
                    </td>
                </tr>
                <!-- End Specific Styling -->

                <!-- Footer Section -->
                <tr>
                    <td style="padding: 30px; background-color: #F0FDF4; border-top: 1px solid #e5e7eb;">

                        @if($newsletterMessage->type === 'goodbye')
                            <div style="text-align: center; background-color: #FEF3C7; padding: 20px; border: 1px solid #FCD34D; border-radius: 8px; margin-bottom: 20px;">
                                <p style="color: #92400E; font-size: 15px; margin: 0 0 10px 0; font-weight: 600;">
                                    👋 Nous sommes tristes de vous voir partir ! Votre feedback est précieux pour nous aider à améliorer nos services.
                                </p>
                                <a href="{{ route('visitor.contact-us') }}" style="display: inline-block; font-size: 14px; font-weight: 600; color: #D97706; text-decoration: none; border-bottom: 1px solid #D97706;">
                                    Partager votre feedback
                                </a>
                            </div>
                        @endif

                        @if(in_array($newsletterMessage->type, ['welcome', 'newsletter']))
                            <p style="font-size: 13px; color: #4B5563; margin-bottom: 15px; text-align: center;">
                                Vous recevez ce message car vous êtes abonné(e) à notre newsletter.
                            </p>

                            <div style="text-align: center; padding-top: 8px;">
                                <a href="{{ route('visitor.newsletter.manage', ['token' => $subscriber->token]) }}"
                                   style="display: inline-block; padding: 10px 20px; border: 1px solid #10B981; font-size: 14px; font-weight: 600; border-radius: 9999px; color: #059669; background-color: #D1FAE5; text-decoration: none; transition: background-color 0.15s;">
                                    Gérer ou Se Désabonner
                                </a>
                            </div>
                        @endif

                        <div style="border-top: 1px solid #D1FAE5; margin: 30px 0 15px 0;"></div>

                        <div style="text-align: center; font-size: 12px; color: #6B7280; line-height: 1.5;">
                            <p style="margin: 0;">Si vous avez des questions, n'hésitez pas à nous contacter.</p>
                            <p style="margin: 8px 0 0 0;">&copy; {{ date('Y') }} {{ config('app.name') }}. Tous droits réservés.</p>
                        </div>
                    </td>
                </tr>
            </table>

        </td>
    </tr>
</table>

<img src="{{ route('visitor.newsletter.track', ['d' => $delivery->id]) }}" width="1" height="1" alt="" style="display: none !important; mso-hide: all; opacity: 0;" />

</body>
</html>
