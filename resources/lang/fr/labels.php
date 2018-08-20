<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Labels Language Lines
    |--------------------------------------------------------------------------
    |
    | The following language lines are used in labels throughout the system.
    | Regardless where it is placed, a label can be listed here so it is easily
    | found in a intuitive way.
    |
    */

    'general' => [
        'all'     => 'Tout',
        'yes'     => 'Oui',
        'no'      => 'Non',
        'custom'  => 'Personnalisé',
        'actions' => 'Actions',
        'active'  => 'Active',
        'buttons' => [
            'save'   => 'Enregistrer',
            'update' => 'Mettre à jour',
        ],
        'hide'              => 'Cacher',
        'inactive'          => 'Inactive',
        'none'              => 'Aucun',
        'show'              => 'Voir',
        'toggle_navigation' => 'Navigation',
        'submit' => 'Envoyer',
    ],

    'backend' => [
        'access' => [
            'roles' => [
                'create'     => 'Créer un rôle',
                'edit'       => 'Editer un rôle',
                'management' => 'Gestion des rôles',

                'table' => [
                    'number_of_users' => "Nombre d'utilisateurs",
                    'permissions'     => 'Permissions',
                    'role'            => 'Rôle',
                    'sort'            => 'Ordre',
                    'total'           => 'rôle total|rôles total',
                ],
            ],

            'users' => [
                'active'              => 'Utilisateurs actifs',
                'all_permissions'     => 'Toutes les permissions',
                'change_password'     => 'Modifier le mot de passe',
                'change_password_for' => 'Modifier le mot de passe pour :user',
                'create'              => 'Créer un utilisateur',
                'deactivated'         => 'Utilisateurs désactivés',
                'deleted'             => 'Utilisateurs supprimés',
                'edit'                => 'Éditer un utilisateur',
                'management'          => 'Gestion des utilisateurs',
                'no_permissions'      => 'Aucune permission',
                'no_roles'            => 'Aucun rôle à affecter.',
                'permissions'         => 'Permissions',

                'table' => [
                    'confirmed'      => 'Confirmé',
                    'created'        => 'Création',
                    'email'          => 'Adresse email',
                    'id'             => 'ID',
                    'last_updated'   => 'Mise à jour',
                    'name'           => 'Nom',
                    'first_name'     => 'Prénom',
                    'last_name'      => 'Nom',
                    'no_deactivated' => "Pas d'utilisateurs désactivés",
                    'no_deleted'     => "Pas d'utilisateurs supprimés",
                    'roles'          => 'Rôles',
                    'social' => 'Réseau social',
                    'total'          => 'utilisateur total|utilisateurs total',
                ],

                'tabs' => [
                    'titles' => [
                        'overview' => 'Résumé',
                        'history'  => 'Historique',
                    ],

                    'content' => [
                        'overview' => [
                            'avatar'       => 'Avatar',
                            'confirmed'    => 'Confirmé',
                            'created_at'   => 'Créé le',
                            'deleted_at'   => 'Supprimé le',
                            'email'        => 'Adresse email',
                            'last_updated' => 'Mise à jour',
                            'name'         => 'Nom complet',
                            'first_name'   => 'Prénom',
                            'last_name'    => 'Nom',
                            'status'       => 'Statut',
                        ],
                    ],
                ],

                'view' => 'Voir un utilisateur',
            ],
        ],
    ],

    'frontend' => [
        //@todo multi language after this
        'date' =>[
            'year'    => 'an',
            'years'    => 'ans',
            'month'       => 'Mois',
            'week'       => 'Semaine',
            'weeks'       => 'semaines',
            'day'       => 'Jour',
            'today'  => "Aujourd'hui",
            'days'       => 'jours',
            'list'       => 'Liste',
            'months' =>[
                "January"=> "Janvier",
                "February"=> "Février",
                "March"=> "Mars",
                "April"=> "Avril",
                "May"=> "Mai",
                "June"=> "Juin",
                "July"=> "Juillet",
                "August"=> "Août",
                "September"=> "Septembre",
                "October"=> "Octobre",
                "November"=> "Novembre",
                "December"=> "Décembre"
            ],
        ],
        'calendar'=>[
            'noEvents'=>'Aucune tâche à afficher',
            'colorCategory' => 'Définir la couleur',
            'saveCategory' => 'Enregistrer cette catégorie',
            'chooseCategory'  =>  'Choisir une catégorie',
            'AddNewCategory'  =>  'Ajouter une catégorie',
            'AddNewEvent'  =>  'Ajouter un évènement',
            'cancel'  =>  'Annuler',
            'allDay'  =>  'Toute la journée',
            'addTitle'  =>  'Ajouter un titre',
            'title'  =>  'Titre',
            'mm/dd/yyyy'  =>  'jj/mm/aaaa',
            'name'  =>  'Nom',

        ],
        'auth' => [
            'login_box_title'    => 'Connexion',
            'login_button'       => 'Entrer',
            'login_with'         => 'Se connecter avec :social_media',
            'register_box_title' => "S'enregistrer",
            'register_button'    => 'Créer le compte',
            'remember_me'        => 'Se souvenir de moi',
            'signIn'             => ' Se connecter',
            'noAccount'  =>   'Pas encore de compte?',
            'signUp'    =>      "S'enregistrer",
        ],

        'contact' => [
            'box_title' => 'Nous contacter',
            'button' => 'Envoyer le message',
        ],

        'passwords' => [
            'forgot_password'                 => 'Avez-vous oublié votre mot de passe&nbsp;?',
            'reset_password_box_title'        => 'Réinitialisation du mot de passe',
            'reset_password_button'           => 'Réinitialiser le mot de passe',
            'send_password_reset_link_button' => 'Envoyer le lien de réinitialisation',
        ],

        'user' => [
            'passwords' => [
                'change' => 'Modifier le mot de passe',
            ],

            'profile' => [
                'avatar'             => 'Avatar',
                'created_at'         => 'Date de création',
                'edit_information'   => 'Éditer les informations',
                'email'              => 'Adresse email',
                'last_updated'       => 'Date de mise à jour',
                'name'               => 'Nom complet',
                'first_name'         => 'Prénom',
                'last_name'          => 'Nom',
                'update_information' => 'Mettre à jour les informations',
            ],
        ],
        //@todo multi language after this
        'birds' => [
            'order'                 => 'Ordre',
            'species'        => 'Espéce',
            'familly'           => 'Famille',
            'usualName'           => 'Nom commun',
            'gender' => 'Sexe',
            'male' => 'Mâle',
            'female' => 'Femelle',
            'unknow' => 'Inconnu',
            'sexingMethode' => 'Méthode de sexage',
            'mutation' => 'Mutation',
            'birthDate' => 'Date de Naissance',
            'age' => 'Age',
            'idType' => "Type d'identifiant",
            'idPerso' => 'Id Perso',
            'id' => 'Identifiant',
            'idNummer' => "Numéro d'identifiant",
            'origin' => "Origine",
            'status' => 'Status',
            'disponibility' => 'Disponibilité',
            'history' => 'Historique',
            'mother' => 'Mère',
            'father' => 'Père',
            'orderFirst' => "Choisissez d'abord un Ordre.",
            'famillyFirst' => 'Choisissez d\'abord une Famille',
            'speciesFirst' => 'Choisissez d\'abord une Espéce',
            'specieCustom' => 'Choisissez une de vos Espéce',
            'openRings' => 'Bague Ouverte',
            'closedRings' => 'Bague Fermée',
            'noOne' => 'Aucune',
            'other' => 'Autre',
            'DNA' => 'ADN',
            'endoscopy' => 'Endoscopie',
            'supposed'=>'Supposé',
            'dymorphism'=>'Dymorphisme Sexuelle',
            'thisElevage'=>'Propre élevage',
            'advertencie'=>'Petite annonce',
            'friend'=>'Ami - Contact',
            'expo'=>'Expo - Bourse' ,
            'infoBreeder'=>'Éleveur' ,
            'disponible'=>'Disponible' ,
            'toBeSale'=>'Á céder' ,
            'reserved'=>'Réservé' ,
            'coupled'=>'En couple' ,
            'single'=>'Seul' ,
            'rest'=>'Au Repos' ,
            'incubation'=>'Durée d\'incubation',
            'fertilityControl'=>'Contrôle de la fécondité',
            'girdleDate'=>'Age pour baguer',
            'outOfNest'=>'Sortie du nid',
            'weaning'=>'sevrage',
            'sexualMaturity'=>'Maturité sexuelle',
            'spawningInterval'=>'Interval de ponte',
            'idCouples' => 'id. du couples',
            'couplesFrom' => 'En couple depuis',
            'until' => 'Séparé depuis le',
            'separateCouple' => 'Séparer le couple',
            'hatchingsNbr' => 'Nbr. couvées',
            'eggsNbr' => 'Nbr. Oeufs',
            'whiteEggsNbr' => 'Nbr. Oeufs Blanc',
            'fertilizedEggNbr' => 'Nbr. Oeufs Fécondés',
            'youngNbr' => 'Nbr. jeunes',
            'createCouples'=> 'Former un Couple',
            'selectMale'=>'Choisissez un Mâle',
            'selectFemale'=>'Choisissez une Femelle',
            'selectCouple'=>'Choisissez un Couple',
            'filterBySpecie'=>'Filtrer par Espèce',
            'filterByStatus'=>'Filtrer par Status',
            'filterByCouple'=>'Filtrer par Couple',
            'filterByDisponibility'=>'Filtrer par Disponibilité',
            'filterBySexe'=>'Filtrer par Sexe',
            'all'=>'Tout',
            'filterByMale'=>'Filtrez par Mâle',
            'filterByFemale'=>'Filtrez par femelle',
            'eggsStat'=>"Statistiques de ponte" ,
            'layingStat'=>"Statistiques d' éclosion" ,




        ],
        'eggs'=>[
            "layingDate"=>"Date de ponte",
            "position"=>"Position",
            "eggState"=>"État de l'oeuf",
            "selectEggState"=>"Choisissez l'état de l'oeuf",
            "comment"=>"Remarque",
            "good"=>"Bon",
            "dirty"=>"Sale",
            "flabby"=>"Mou",
            "damaged"=>"Endommagé",
            "broken"=>"Endommagé",
            "nextStep"=>"Prochaine étape",
            "fertilized"=>"Fécondé",
            "white"=>"Oeuf blanc",
            "deadInEgg"=>"Mort dans l'oeuf",
            "hatchingDate"=>"Date d'éclosion",
            "birdHached"=>"Oiseau éclos",
            "hached"=>"Oiseau éclos",
            "birdNotHached"=>"Oeuf non éclos",
            "abandoned" =>"Abandonné par les parents",
            "unknow" =>"Inconnu",
            "selectReasonNotHatched" => "Cause",
            "hatched" => "Ėclos",
            "hatching" => "Ėclosion",
            "eatByParent" => "Mangé par les parents"

        ],
        'hatchings'=>[
            'start'=>'Debut',
            'end'=>'Fin',
            'status' => 'status',
            'still'=>'En cours',
            'finish'=>'Terminées',
            'eggsCount'=>'Nbr. Oeufs',
            'whiteCount'=>'Oeufs Blanc',
            'flabbyCount'=>'Oeufs mou',
            'brokenCount'=>'Oeufs cassé',
            'hatchedCount'=>'Oeufs éclos',
            'deadCount'=>'Mort Dans l\'oeuf',
            'abandonedCount'=>'Abandonné par les parents',
            'eatCount'=>'Tué par les parents',
        ],
        'ZoneAndCage'=>[
            'name' => 'Nom',
            'cage' => 'cage',
            'long' => 'Longueur',
            'large' => 'Largeur',
            'height' => 'Hauteur',
            'zone' => 'Zone',
            'description' =>'Description',
            '²' =>'Description',
        ],
        'table'=>[
                "sProcessing" =>    "Traitement en cours...",
                "sSearch"=>         "Rechercher&nbsp;:",
                "sLengthMenu"=>     "Afficher _MENU_ &eacute;l&eacute;ments",
                "sInfo"=>           "Affichage de l'&eacute;l&eacute;ment _START_ &agrave; _END_ sur _TOTAL_ &eacute;l&eacute;ments",
                "sInfoEmpty"=>      "Affichage de l'&eacute;l&eacute;ment 0 &agrave; 0 sur 0 &eacute;l&eacute;ment",
                "sInfoFiltered"=>   "(filtr&eacute; de _MAX_ &eacute;l&eacute;ments au total)",
                "sInfoPostFix"=>    "",
                "sLoadingRecords"=> "Chargement en cours...",
                "sZeroRecords"=>    "Aucun &eacute;l&eacute;ment &agrave; afficher",
                "sEmptyTable"=>     "Aucune donn&eacute;e disponible dans le tableau",

                "sFirst"=>      "Premier",
                "sPrevious"=>   "Pr&eacute;c&eacute;dent",
                "sNext"=>       "Suivant",
                "sLast"=>       "Dernier",

                "sSortAscending"=>  ": activer pour trier la colonne par ordre croissant",
                "sSortDescending"=> ": activer pour trier la colonne par ordre d&eacute;croissant",

                'rowsX'=> "%d lignes séléctionnées",
                'rows0'=> "Aucune ligne séléctionnée",
                'rows1'=> "1 ligne séléctionnée"

        ],


    ],
];
