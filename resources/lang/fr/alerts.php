<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Alert Language Lines
    |--------------------------------------------------------------------------
    |
    | The following language lines contain alert messages for various scenarios
    | during CRUD operations. You are free to modify these language lines
    | according to your application's requirements.
    |
    */

    'backend' => [
        'roles' => [
            'created' => 'Rôle créé avec succès.',
            'deleted' => 'Rôle supprimé avec succès.',
            'updated' => 'Rôle mis à jour avec succès.',
        ],

        'users' => [
            'cant_resend_confirmation' => "L'application est actuellement paramétrée avec une validation manuelle des utilisateurs.",
            'confirmation_email'  => "Un email de confirmation a été adressé à l'adresse indiquée.",
            'confirmed'              => "Le compte de l'utilisateur a été confirmé avec succès.",
            'created'             => 'Utilisateur créé avec succès.',
            'deleted'             => 'Utilisateur supprimé avec succès.',
            'deleted_permanently' => "L'utilisateur a été supprimé définitivement.",
            'restored'            => "L'utilisateur a été ré-activé.",
            'session_cleared'      => "La session de l'utilisateur a été effacé avec succès.",
            'social_deleted' => 'Le compte de réseau social a été effacé avec succès.',
            'unconfirmed' => "Le compte de l'utilisateur a été infirmé avec succès.",
            'updated'             => 'Utilisateur mis à jour avec succès.',
            'updated_password'    => 'Le mot de passe utilisateur a été mis à jour avec succès.',
        ],
    ],

    'frontend' => [
        'confirm' => [
            'fecundity' => "Voulez vous confirmer l'information pour cet œuf? œuf : ",
        ],
        'contact' => [
            'sent' => "Votre message a été envoyé avec succès. Nous répondrons à l'adresse email que vous nous avez fourni dès que nous le pourrons.",
        ],
        //@todo multi language after this
        'displayList'    => 'Affichage Liste',
        'displayBlock'    => 'Affichage Bloc',
        'addBird'    => 'Ajouter un Oiseau',
        'addCouples'    => 'Ajouter à un couple',
        'addCouple'    => 'Former un couple',
        'addEgg'    => 'Ajouter un œuf',
        'editBird'    => "Modifier l'Oiseau",
        'editSpecie'    => "Modifier l'Espéce",
        'createSpecie'    => "Ajouter une nouvelle Espéce",
        'SelectCustom'    => "Choisir une de vos Espéces",
        'searchSpecie'    => "Cherchez une Espéce ...",
        'noBirds'    => "Vous n'avez pas encore ajouter d'oiseau.",
        'noCouples'    => "Vous n'avez pas encore ajouter de couple.",
        'viewSpecie'    => "Voir la fiche de l'espèce",
        'viewBird'    => "Voir la fiche de l'oiseau",
        'birdUpdated' => "L'oiseau a été mis à jour",
        'birdCreated' => "L'oiseau a été ajouté",
        'goBack' => "Revenir en Arriére",
        'coupleCreated' => "Le couple a été ajouté",
        'eggAdded' => "L'œuf a été ajouté",
        'coupleWellSeparate' => "Le couple a été séparé",
        'couplepeoplesguen'=>'couplepeoplesguen',
        'separateCouple'=>'Séparer le couple',
        'viewcoupleDetails'=>'Afficher les détails de ce couple',
        'viewBirdDetails'=>"Afficher les détails de l'oiseau",
        'vieweggsDetails'=>'Afficher les détails de cet œuf',
        "addEggs"=>"Ajouter un œuf",
        "coupleHistory"=>"Historique du Couple",
        "viewHatching"=>"Voir la couvée en cours",
        'noEggs'    => "Vous n'avez pas encore ajouter d'œufs.",
        'nestlingDead' => 'Le jeune est mort',
        'outOfNest' => 'Sortie du nid/sevrage',
        'dateRange' => 'choisissez une période'


    ],
];
