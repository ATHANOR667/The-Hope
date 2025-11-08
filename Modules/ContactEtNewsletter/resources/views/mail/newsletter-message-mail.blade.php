<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $newsletterMessage->title }}</title>
</head>
<body style="font-family: Arial, sans-serif; line-height: 1.6; color: #333333; margin: 0; padding: 0; background-color: #f3f4f6;">

<table width="100%" border="0" cellspacing="0" cellpadding="0" role="presentation">
    <tr>
        <td align="center" style="padding: 30px 20px;">

            <table width="600" border="0" cellspacing="0" cellpadding="0" role="presentation" style="max-width: 600px; border-collapse: collapse; background-color: #ffffff; border-radius: 8px; overflow: hidden; border: 1px solid #e5e7eb; box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1);">

                <tr>
                    <td align="center" style="padding: 24px 30px; background-color: #1D4ED8; color: #ffffff;">
                        <h1 style="font-size: 28px; font-weight: 800; margin: 0; letter-spacing: 0.05em; text-transform: uppercase;">
                            {{ config('app.name') }}
                        </h1>
                        <p style="font-size: 12px; margin-top: 4px; opacity: 0.9;">Votre source d'information exclusive.</p>
                    </td>
                </tr>

                <tr>
                    <td style="padding: 20px 30px; border-bottom: 1px solid #e5e7eb;">
                        <h2 style="font-size: 22px; font-weight: bold; color: #1f2937; margin: 0; line-height: 1.3;">
                            {{ $newsletterMessage->title }}
                        </h2>
                    </td>
                </tr>

                <tr>
                    <td class="wysiwyg-content" style="padding: 30px; font-size: 15px; color: #4b5563;">
                        <div style="font-size: 15px; color: #4b5563;">
                            {!! $newsletterMessage->content !!}
                        </div>

                    </td>
                </tr>

                <tr>
                    <td style="padding: 30px; background-color: #f9fafb; border-top: 1px solid #e5e7eb;">

                        @if($newsletterMessage->type === 'goodbye')
                            <div style="text-align: center; background-color: #FFFBEB; padding: 15px; border: 1px solid #FCD34D; border-radius: 8px; margin-bottom: 20px;">
                                <p style="color: #78350F; font-size: 14px; margin: 0 0 8px 0;">
                                    Nous sommes tristes de vous voir partir ! Votre feedback est précieux.
                                </p>
                                <a href="{{ route('visitor.contact-us') }}" style="display: inline-block; font-size: 14px; font-weight: 500; color: #F59E0B; text-decoration: underline;">
                                    Nous Contacter (Feedback)
                                </a>
                            </div>
                        @endif

                        @if(in_array($newsletterMessage->type, ['welcome', 'message']))
                            <p style="font-size: 13px; color: #6B7280; margin-bottom: 15px;">
                                ✉️ Vous recevez ce contenu car vous êtes abonné(e) à nos notifications via : **{{ implode(', ', $subscriber->channels) }}**.
                            </p>

                            <div style="text-align: center; padding-top: 8px;">
                                <a href="{{ route('visitor.newsletter.manage', ['token' => $subscriber->token]) }}"
                                   style="display: inline-block; padding: 8px 16px; border: 1px solid #3B82F6; font-size: 14px; font-weight: 500; border-radius: 9999px; color: #2563EB; text-decoration: none; transition: background-color 0.15s;">
                                    Gérer Mon Abonnement / Me Désabonner
                                </a>
                            </div>
                        @endif

                        <div style="border-top: 1px solid #e5e7eb; margin: 24px 0;"></div>

                        <div style="text-align: center; font-size: 12px; color: #9CA3AF; line-height: 1.5;">
                            <p style="margin: 0;">&copy; {{ date('Y') }} {{ config('app.name') }}. Tous droits réservés.</p>
                        </div>
                    </td>
                </tr>
            </table>

        </td>
    </tr>
</table>

@if($delivery)
    <img src="{{ route('visitor.newsletter.track', ['d' => $delivery->id]) }}" width="1" height="1" alt="" style="display: none !important; mso-hide: all; opacity: 0;" />
@endif
</body>
</html>
