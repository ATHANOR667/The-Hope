<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Problème avec votre Don - The Hope</title>
    <style>
        body {
            font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, Oxygen, Ubuntu, Cantarell, "Fira Sans", "Droid Sans", "Helvetica Neue", sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f0f2f5;
            color: #333;
            -webkit-font-smoothing: antialiased;
            -moz-osx-font-smoothing: grayscale;
        }
        .email-wrapper {
            max-width: 600px;
            margin: 20px auto;
            background-color: #ffffff;
            border-radius: 12px;
            box-shadow: 0 6px 20px rgba(0, 0, 0, 0.08);
            overflow: hidden;
        }
        .header {
            background-color: #dc3545; /* Rouge pour l'échec */
            padding: 30px 20px;
            color: white;
            text-align: center;
            font-size: 28px;
            font-weight: bold;
            line-height: 1.3;
        }
        .header p {
            margin: 0;
        }
        .content {
            padding: 30px;
            font-size: 16px;
            line-height: 1.7;
            color: #555;
        }
        .content p {
            margin-bottom: 1em;
        }
        .highlight {
            color: #dc3545; /* Rouge pour mettre en évidence */
            font-weight: bold;
        }
        .transaction-details {
            background-color: #fef1f2; /* Couleur de fond légère pour les détails */
            border-radius: 8px;
            padding: 15px 20px;
            margin: 25px 0;
            border: 1px solid #fbd9da;
        }
        .transaction-details p {
            margin: 5px 0;
        }
        .footer {
            text-align: center;
            padding: 20px;
            font-size: 13px;
            color: #888;
            border-top: 1px solid #eee;
            margin-top: 20px;
        }
        .logo {
            margin-bottom: 15px;
            font-size: 2.5em;
            font-weight: 900;
            color: white;
            text-transform: uppercase;
            letter-spacing: 2px;
        }
        @media only screen and (max-width: 600px) {
            .email-wrapper {
                margin: 10px;
                border-radius: 8px;
            }
            .header {
                font-size: 22px;
                padding: 20px 15px;
            }
            .content {
                padding: 20px 15px;
                font-size: 15px;
            }
            .footer {
                padding: 15px;
            }
        }
    </style>
</head>
<body>
<div class="email-wrapper">
    <div class="header">
        <div class="logo">Hope</div>
        <p>Problème avec votre Don</p>
    </div>
    <div class="content">
        <p>Bonjour <span class="highlight">{{ $donateur }}</span>,</p>

        <p>Nous vous informons qu'une difficulté est survenue lors du traitement de votre don de <span class="highlight">{{ number_format($montant, 0, ',', ' ') }} {{ $devise }}</span> pour la cause des moins nantis.</p>

        <div class="transaction-details">
            <p><strong>Détails du problème :</strong></p>
            <p>Référence de la transaction : <span class="highlight">{{ $reference }}</span></p>
            <p>Statut : <span class="highlight">Échec</span></p>
{{--
            <p>Raison : <span class="highlight">{{ $errorMessage }}</span></p>
--}}
        </div>

        <p>Nous vous invitons à <a href="{{ route('guest.welcome') . '#section_4' }}" style="color: #dc3545; text-decoration: underline; font-weight: bold;">réessayer votre don</a> ou à vérifier les informations de votre carte/moyen de paiement. Si le problème persiste, n'hésitez pas à nous contacter.</p>

        <p>Nous espérons que vous pourrez finaliser votre contribution très bientôt.</p>

        <p>Bien à vous,</p>
        <p><strong>L’équipe de The Hope</strong></p>
    </div>

    <div class="footer">
        <p>&copy; {{ date('Y') }} The Hope - Tous droits réservés.</p>
        <p><a href="{{ url('/') }}" style="color: #888; text-decoration: none;">Visitez notre site web</a></p>
    </div>
</div>
</body>
</html>
