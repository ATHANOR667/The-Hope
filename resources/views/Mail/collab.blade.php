<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nouveau message</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
        }

        .container {
            word-wrap: break-word;
            overflow-wrap: break-word;
            background-color: #ffffff;
            padding: 30px;
            border-radius: 15px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        }

        h1 {
            color: #28a745;
            font-size: 2.5rem;
            font-family: 'Arial', sans-serif;
        }

        p {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            color: #333333;
        }

        .content-text {
            white-space: normal;
            font-size: 1.1rem;
            color: #6c757d;
        }

        .btn {
            background-color: #28a745;
            color: white;
            padding: 10px 20px;
            border-radius: 25px;
            font-size: 1.2rem;
            text-align: center;
            text-decoration: none;
        }
        .btn:hover {
            background-color: #218838;
        }

        .email-link {
            color: #007bff;
            text-decoration: none;
            font-weight: bold;
        }

        .email-link:hover {
            text-decoration: underline;
        }

        .mb-4, .mb-3 {
            margin-bottom: 2rem;
        }
    </style>
</head>
<body class="py-5">

<div class="container">
    <h1 class="text-center mb-4">Nouveau message</h1>

    <p><strong>De monsieur :</strong> {{ $name }}</p>
    <p><strong>Il nous connaît via :</strong> {{ $sujet }}</p>

    <div class="mb-3">
        <p><strong>Son message :</strong></p>
        <p class="content-text">{{ $content }}</p>
    </div>

    <p><strong>Son adresse e-mail :</strong>
        <a href="mailto:{{ $email }}" class="email-link">{{ $email }}</a>
    </p>

    <a href="mailto:{{ $email }}" class="btn">Répondre par e-mail</a>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
