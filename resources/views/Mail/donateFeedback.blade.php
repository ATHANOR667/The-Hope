<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Remerciements pour votre Don</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f7f7f7;
            color: #333;
        }
        .container {
            width: 100%;
            max-width: 600px;
            margin: 0 auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        .header {
            text-align: center;
            padding: 10px 0;
            background-color: #4CAF50;
            color: white;
            font-size: 24px;
            border-radius: 8px 8px 0 0;
        }
        .content {
            padding: 20px;
            font-size: 16px;
            line-height: 1.6;
        }
        .footer {
            text-align: center;
            margin-top: 30px;
            font-size: 12px;
            color: #777;
        }
        .highlight {
            color: #4CAF50;
            font-weight: bold;
        }
    </style>
</head>
<body>
<div class="container">
    <div class="header">
        Merci pour votre Don !
    </div>
    <div class="content">
        <p>Bonjour <span class="highlight">{{ $donateur }}</span>,</p>

        <p>Nous tenons à vous remercier chaleureusement pour votre généreux don de <span class="highlight">{{ $montant }} XAF</span> en soutien à la cause : <span class="highlight">{{ $cause->titre }}</span>.</p>

        <p>Votre don est très précieux et contribuera grandement à améliorer la vie de nombreuses personnes. Votre référence de transaction est : <span class="highlight">{{ $reference }}</span>.</p>

{{--
        <p>Vous pouvez consulter la facture associée à ce don dans le fichier PDF ci-joint, qui pourra être utilisé pour vos démarches fiscales, notamment pour obtenir une réduction d'impôt.</p>
--}}

        <p>Nous vous remercions encore une fois pour votre soutien indéfectible et vous encourageons à continuer à faire partie de ce beau projet.</p>

        <p>Bien à vous,</p>
        <p><strong>L’équipe de <span class="highlight">The Hope</span></strong></p>
    </div>

    <div class="footer">
        <p>&copy; {{date('Y')}} The Hope - Tous droits réservés.</p>
    </div>
</div>
</body>
</html>
