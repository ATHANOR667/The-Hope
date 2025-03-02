@extends('Admin.form-base')

@section('title', 'login')

@section('content')
    <div class="form-container">
        <form method="POST">
            @csrf

            <!-- MOT DE PASSE -->
            <div class="form-group">
                <input type="password" name="password" placeholder="Mot de passe" required>
                @error('password')
                <span class="error-message">{{$message}}</span>
                @enderror
            </div>

            <button type="submit">Soumettre</button>
        </form>

        @if(!$default)
            <div class="password-reset">
                <a href="{{ route('admin.password_reset_init_while_dissconnected') }}">Modifier mon mot de passe</a>
            </div>
        @endif

        <!-- MESSAGE -->
        @if(session('message'))
            <div class="success-message">
                {{session('message')}}
            </div>
        @endif
    </div>
    <style>
        /* Reset de base */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        /* Styles de base */
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f5f5f5;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            padding: 20px;
        }

        .form-container {
            width: 100%;
            max-width: 400px;
            padding: 20px;
            background: #fff;
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        }

        .form-group {
            margin-bottom: 20px;
        }

        input[type="password"] {
            width: 100%;
            padding: 12px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 16px;
            background-color: #f9f9f9;
        }

        input[type="password"]:focus {
            border-color: #5cb85c;
            outline: none;
        }

        button {
            width: 100%;
            padding: 12px;
            background-color: #5cb85c;
            color: white;
            border: none;
            border-radius: 5px;
            font-size: 16px;
            cursor: pointer;
            margin-top: 10px;
        }

        button:hover {
            background-color: #4cae4c;
        }

        .error-message {
            color: #d9534f;
            font-size: 14px;
            margin-top: 5px;
        }

        .password-reset {
            margin-top: 20px;
            text-align: center;
        }

        .password-reset a {
            color: #007bff;
            text-decoration: none;
        }

        .password-reset a:hover {
            text-decoration: underline;
        }

        .success-message {
            margin-top: 20px;
            padding: 10px;
            background-color: #dff0d8;
            color: #3c763d;
            border-radius: 5px;
            text-align: center;
        }

        /* Styles responsives */
        @media (max-width: 768px) {
            .form-container {
                padding: 15px;
            }

            input, button {
                font-size: 14px;
                padding: 10px;
            }

            .error-message, .success-message {
                font-size: 13px;
            }
        }

        @media (max-width: 480px) {
            .form-container {
                padding: 10px;
            }

            input, button {
                font-size: 12px;
                padding: 8px;
            }

            .error-message, .success-message {
                font-size: 12px;
            }
        }

    </style>
@endsection
