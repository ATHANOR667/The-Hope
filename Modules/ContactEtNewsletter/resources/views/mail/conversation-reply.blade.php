<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mise à Jour de votre Requête - Support</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 p-4 sm:p-8">

<div class="max-w-xl mx-auto bg-white shadow-lg rounded-xl overflow-hidden border border-gray-200">

    <div class="bg-blue-600 p-6 text-white">
        <h1 class="text-2xl font-bold tracking-tight">
            Votre requête a été mise à jour
        </h1>
    </div>

    <div class="p-6 space-y-6">
        <p class="text-gray-700 leading-relaxed">
            Bonjour {{ $conversation->contact->name ?? 'client' }},
        </p>

        <div class="bg-gray-50 p-4 border-l-4 border-blue-500 rounded-md shadow-sm">
            <p class="text-base text-gray-800 whitespace-pre-line">
                {!! nl2br(e($content)) !!}
            </p>
        </div>

        <p class="text-gray-700 leading-relaxed pt-2">
            Nous espérons que cette mise à jour répond à votre question.
        </p>

        <div class="text-center pt-4">
              <a href="{{  route('visitor.contact-us') }}" class="inline-block px-6 py-3 border border-transparent text-base font-medium rounded-md text-white bg-blue-600 shadow-lg hover:bg-blue-700 transition duration-150 transform hover:scale-105">
                Répondre sur notre site web
            </a>
        </div>

        {{--<div class="bg-green-100 p-4 rounded-lg border-l-4 border-green-500 mt-6">
            <p class="font-bold text-green-800 mb-1">
                🟢 OU : Réponse par e-mail
            </p>
            <p class="text-sm text-green-700">
                Vous pouvez aussi simplement répondre à cet e-mail. Votre message sera automatiquement ajouté à la conversation.
            </p>
        </div>--}}

        <hr class="border-gray-200 mt-6 mb-4">
        <p class="text-xs text-gray-500 text-center">
            Merci d'utiliser notre système de support.
        </p>

    </div>

    <div class="p-4 bg-gray-50 text-center border-t border-gray-200">
        <p class="text-xs text-gray-500 mb-2">
            L'équipe de Support - {{ config('app.name') }}
        </p>
        <p class="text-xs space-x-3">
            <a href="{{ route('visitor.contact-us') }}" class="text-blue-600 hover:text-blue-800 font-medium">
                Nous Contacter
            </a>

        </p>
    </div>

</div>
</body>
</html>
