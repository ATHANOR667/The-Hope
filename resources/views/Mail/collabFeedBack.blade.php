<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Confirmation de Soumission</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f7f7f7;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        .container {
            max-width: 600px;
            margin: auto;
            padding: 30px;
            background-color: #ffffff;
            border-radius: 12px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
            word-wrap: break-word; /* Ajouté pour éviter le débordement */
        }

        h1 {
            color: #28a745;
            font-size: 2rem;
            text-align: center;
        }

        .lead {
            font-size: 1.2rem;
            color: #555;
        }

        .content-text {
            font-size: 1rem;
            color: #777;
            line-height: 1.5;
            word-wrap: break-word; /* Ajouté ici pour éviter que le texte ne dépasse */
            overflow-wrap: break-word; /* Pour que le texte long se coupe correctement */
        }

        .btn-custom {
            background-color: #28a745;
            color: white;
            padding: 12px 25px;
            border-radius: 30px;
            font-size: 1.1rem;
            text-align: center;
            text-decoration: none;
            transition: background-color 0.3s ease;
        }

        .btn-custom:hover {
            background-color: #218838;
        }

        .footer {
            text-align: center;
            margin-top: 40px;
            font-size: 0.9rem;
            color: #999;
        }

        .footer p {
            margin: 0;
        }

        hr {
            border-top: 1px solid #e9ecef;
        }

    </style>
</head>
<body>

<div class="container">
    <h1><i class="fas fa-check-circle"></i> Confirmation de Soumission</h1>

    <p class="lead">Bonjour M. {{ $name }},</p>
    <p>Nous avons bien reçu votre message. Voici un récapitulatif :</p>

    <div class="mb-4">
        <p><strong>Vous avez entendu parler de nous via :</strong> {{ $sujet }}</p>
    </div>

    <div class="mb-4">
        <p><strong>Votre message était :</strong></p>
        <p class="content-text">{{ $content }}</p>
    </div>

    <p>Nous vous contacterons sous peu pour discuter de votre projet.</p>
    <p>Merci,</p>
    <p><strong>L'équipe de The HOPE</strong></p>

    <hr>

    <div class="text-center">
        <a href="{{route('guest.welcome')}}" class="btn-custom">Retour à l'accueil</a>
    </div>

    <hr>

    <div class="footer">
        <p>Copyright © {{date('Y')}} HOPE</p>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
