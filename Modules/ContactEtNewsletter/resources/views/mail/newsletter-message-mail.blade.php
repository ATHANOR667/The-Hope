<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $newsletterMessage->title }}</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        .wysiwyg-content h1, .wysiwyg-content h2, .wysiwyg-content h3 {
            @apply text-xl font-bold mt-6 mb-3 text-gray-800;
        }
        .wysiwyg-content p {
            @apply mb-4 leading-relaxed text-gray-700;
        }
        .wysiwyg-content ul, .wysiwyg-content ol {
            @apply list-inside mb-4 pl-4 text-gray-700;
        }
        .wysiwyg-content ul {
            @apply list-disc;
        }
        .wysiwyg-content ol {
            @apply list-decimal;
        }
        .wysiwyg-content a {
            @apply text-blue-600 hover:underline;
        }
        .wysiwyg-content img {
            @apply max-w-full h-auto rounded-lg shadow-md my-4;
        }
    </style>
</head>
<body class="bg-gray-100 p-4 sm:p-8">

<div class="max-w-3xl mx-auto bg-white shadow-2xl rounded-lg overflow-hidden border border-gray-200">

    <header class="bg-blue-700 p-6 text-white text-center">
        {{-- Remplacez ceci par un logo si nécessaire --}}
        <h1 class="text-3xl font-extrabold tracking-wider uppercase">
            {{ config('app.name') }}
        </h1>
        <p class="text-sm mt-1 opacity-80">Votre source d'information exclusive.</p>
    </header>

    <div class="p-6 sm:p-8 border-b border-gray-200">
        <h2 class="text-2xl font-bold text-gray-900 leading-tight">
            {{ $newsletterMessage->title }}
        </h2>
    </div>

    <section class="p-6 sm:p-8 text-base">
        <div class="wysiwyg-content">
            {!! $newsletterMessage->content !!}
        </div>
    </section>

    <footer class="p-6 sm:p-8 bg-gray-50 border-t border-gray-200">

        @if($newsletterMessage->type === 'goodbye')
            <div class="text-center bg-yellow-100 p-4 rounded-lg border border-yellow-300">
                <p class="text-gray-700 text-sm mb-2">
                    Nous sommes tristes de vous voir partir ! Votre feedback est précieux.
                </p>
                <a href="{{ route('visitor.contact-us') }}" class="inline-block text-sm font-medium text-yellow-800 hover:text-yellow-900 underline">
                    Nous Contacter (Feedback)
                </a>
            </div>
        @endif

        @if(in_array($newsletterMessage->type, ['welcome', 'message']))
            <p class="text-sm text-gray-600 mb-3">
                ✉️ Vous recevez ce contenu car vous êtes abonné(e) à nos notifications via : **{{ implode(', ', $subscriber->channels) }}**.
            </p>

            <div class="text-center pt-2">
                <a href="{{ route('visitor.newsletter.manage', ['token' => $subscriber->token]) }}"
                   class="inline-block px-4 py-2 border border-blue-500 text-sm font-medium rounded-full text-blue-600 hover:bg-blue-50 transition duration-150">
                    Gérer Mon Abonnement / Me Désabonner
                </a>
            </div>
        @endif

        <hr class="border-gray-200 my-6">

        <div class="text-center text-xs text-gray-500 space-y-1">
            <p>&copy; {{ date('Y') }} {{ config('app.name') }}. Tous droits réservés.</p>
        </div>
    </footer>

</div>

@if($delivery)
    <img src="{{ route('visitor.newsletter.track', ['d' => $delivery->id]) }}" width="1" height="1" alt="" class="hidden" />
@endif
</body>
</html>
