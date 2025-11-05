<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Remerciements pour votre Don - The Hope</title>
    <style>
        body {
            font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, Oxygen, Ubuntu, Cantarell, "Fira Sans", "Droid Sans", "Helvetica Neue", sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f0f2f5; /* Couleur de fond plus douce */
            color: #333;
            -webkit-font-smoothing: antialiased;
            -moz-osx-font-smoothing: grayscale;
        }
        .email-wrapper {
            max-width: 600px;
            margin: 20px auto;
            background-color: #ffffff;
            border-radius: 12px; /* Coins plus arrondis */
            box-shadow: 0 6px 20px rgba(0, 0, 0, 0.08); /* Ombre plus subtile */
            overflow: hidden; /* Pour que les coins arrondis soient bien appliqués */
        }
        .header {
            background-color: #28a745; /* Vert pour le succès */
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
            color: #28a745; /* Vert pour mettre en évidence */
            font-weight: bold;
        }
        .transaction-details {
            background-color: #f8f9fa; /* Couleur de fond légère pour les détails */
            border-radius: 8px;
            padding: 15px 20px;
            margin: 25px 0;
            border: 1px solid #e9ecef;
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
            font-size: 2.5em; /* Grande taille pour un logo simple */
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
        <p>Merci pour votre Don !</p>
    </div>
    <div class="content">
        <p>Bonjour <span class="highlight">{{ $donateur }}</span>,</p>

        <p>Nous tenons à vous remercier chaleureusement pour votre généreux don de <span class="highlight">{{ number_format($montant, 0, ',', ' ') }} {{ $devise }}</span> en soutien à la cause des moins nantis.</p>

        <p>Votre contribution est très précieuse et jouera un rôle essentiel dans la réalisation de nos objectifs et l'amélioration de la vie de nombreuses personnes. Grâce à votre soutien, nous pouvons continuer à faire une différence.</p>

        <div class="transaction-details">
            <p><strong>Détails de votre transaction :</strong></p>
            <p>Référence : <span class="highlight">{{ $reference }}</span></p>
            <p>Montant : <span class="highlight">{{ number_format($montant, 0, ',', ' ') }} {{ $devise }}</span></p>
        </div>

        <p>Nous vous sommes infiniment reconnaissants pour votre engagement et vous encourageons à rester informé(e) de l'impact de votre don en visitant régulièrement notre site web ou nos réseaux sociaux.</p>

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
