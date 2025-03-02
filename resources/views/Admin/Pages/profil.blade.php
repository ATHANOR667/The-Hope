@extends('Admin.base')
@section('title', 'Mon Profil')
@section('content')

    <style>
        .profile-container {
            max-width: 800px;
            margin: auto;
            padding: 20px;
            background: white;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }
        .profile-header {
            text-align: center;
            margin-bottom: 20px;
        }
        .profile-links {
            display: flex;
            flex-direction: column;
            align-items: center;
            margin-top: 20px;
        }
        .profile-links a {
            margin: 10px 0;
            padding: 10px 20px;
            background-color: #4fc555;
            color: white;
            text-decoration: none;
            border-radius: 5px;
            transition: background-color 0.3s;
        }
        .profile-links a:hover {
            background-color: #356980;
        }
        .message {
            margin-top: 20px;
            padding: 10px;
            background-color: #d4edda;
            color: #155724;
            border: 1px solid #c3e6cb;
            border-radius: 5px;
            text-align: center;
        }
        .profile-info {
            margin: 20px 0;
            text-align: center;
        }
    </style>

    <div class="profile-container">
        <div class="profile-header">
            <h1>Mon Profil</h1>
            <p>Bienvenue,  Voici vos options de gestion de compte.</p>
        </div>

        <div class="profile-info">
            <h3>Informations du Compte</h3>
            <p><strong>Email :</strong> {{ $a->email ?? 'Non défini' }}</p>
            <p><strong>Date de création :</strong> {{ $a->created_at->format('d/m/Y') }}</p>
        </div>

        <div class="profile-links">
            @if($default)
                <a href="{{ route('admin.otp_request_default_erase') }}">Modifier les identifiants par défaut</a>
            @else
                <a href="{{ route('admin.password_reset_init') }}">Modifier mon mot de passe</a>
                <a href="{{ route('admin.email_reset_otp_request') }}">Modifier l'email associé au compte</a>
            @endif
        </div>

        <!-- MESSAGE -->
        @if(session('message'))
            <div class="message">
                {{ session('message') }}
            </div>
        @endif
    </div>

@endsection
