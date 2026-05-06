<?php

namespace App\Core;

class Router
{

    public function routes()
    {
        //On teste si la superglobale $_GET['controller'] est déclarée et non vide,
        //puis on construit le nom de la classe contrôleur avec une casse correcte.
        //pour compléter le nom de la classe controller à instancier.
        $controller = (isset($_GET['controller']) && !empty($_GET['controller']) ? ucfirst($_GET['controller']) : 'Home');
        $controller = '\\App\\Controllers\\' . $controller . 'Controller';

        //On teste si la superglobale $_GET['action'] est déclarée et non vide.
        //$action, ou par défaut 'index'.
        $action = (isset($_GET['action']) && !empty($_GET['action']) ? $_GET['action'] : 'index');

        //On prépare les paramètres restants éventuels pour la méthode.
        $params = $_GET;
        unset($params['controller'], $params['action']);

        // On instancie le contrôleur
        $controller = new $controller();

        if (method_exists($controller, $action)) {
            // Si des paramètres existent, on exécute la méthode en les passant en argument, sinon sans argument.
            // on exécute la méthode sans argument.
            (!empty($params)) ? call_user_func_array([$controller, $action], $params) : $controller->$action();
        } else {
            // On envoie le code réponse 404
            http_response_code(404);
            echo "La page recherchée n'existe pas";
        }
    }
}
