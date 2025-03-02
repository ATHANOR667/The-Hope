<?php

namespace App\Http\Controllers;

abstract class Controller
{
    public function  showException($e): string
    {
        return
            "
                <div class='exception-message'>
                    <h3>Une exception est survenue !</h3>
                    <p><strong>Erreur :</strong> " . $e->getMessage() . "</p>
                    <p><strong>Détails :</strong> " . $e->getTraceAsString() . "</p>
                    <p><strong>Code d'erreur :</strong> " . $e->getCode() . "</p>
                </div>
            ";
    }
}
