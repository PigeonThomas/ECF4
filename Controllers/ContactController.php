<?php

namespace App\Controllers;

use App\Core\Validator;

class ContactController extends Controller
{
    /**
     * Méthode permettant de vérifier le formulaire de contact avant envoie
     *
     * @return void
     */
    public function index()
    {
        $erreur = "";
        $success = "";

        //on contrôle si les champs du formulaire sont remplis
        if (Validator::validatePost($_POST, ['name', 'email', 'message'])) {

            // on prépare et on envoie l'email
            $to      = "votre@email.com";
            $subject = "Message de " . $this->paramPost['name'];
            $body    = "De : " . $this->paramPost['name'] . "\n";
            $body   .= "Email : " . $this->paramPost['email'] . "\n\n";
            $body   .= $this->paramPost['message'];
            $headers = "From: " . $this->paramPost['email'];

            //on envoie l'email et on affiche un message de succès ou d'erreur
            if (mail($to, $subject, $body, $headers)) {
                $success = "Votre message a bien été envoyé !";
            } else {
                $erreur = "Une erreur est survenue lors de l'envoi du message.";
            }
        } else {
            //on affiche un message d'erreur
            $erreur = !empty($_POST) ? "Le formulaire n'a pas été correctement rempli" : "";
        }

        //on envoie les données dans la vue index.php
        $this->render('contact/index', ["erreur" => $erreur, "success" => $success, "submit" => "Envoyer"]);
    }        
}