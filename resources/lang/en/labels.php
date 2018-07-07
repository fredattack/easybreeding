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
        'all'     => 'All',
        'yes'     => 'Yes',
        'no'      => 'No',
        'copyright' => 'Copyright',
        'custom'  => 'Custom',
        'actions' => 'Actions',
        'active'  => 'Active',
        'buttons' => [
            'save'   => 'Save',
            'update' => 'Update',
        ],
        'hide'              => 'Hide',
        'inactive'          => 'Inactive',
        'none'              => 'None',
        'show'              => 'Show',
        'toggle_navigation' => 'Toggle Navigation',
    ],

    'backend' => [
        'access' => [
            'roles' => [
                'create'     => 'Create Role',
                'edit'       => 'Edit Role',
                'management' => 'Role Management',

                'table' => [
                    'number_of_users' => 'Number of Users',
                    'permissions'     => 'Permissions',
                    'role'            => 'Role',
                    'sort'            => 'Sort',
                    'total'           => 'role total|roles total',
                ],
            ],

            'users' => [
                'active'              => 'Active Users',
                'all_permissions'     => 'All Permissions',
                'change_password'     => 'Change Password',
                'change_password_for' => 'Change Password for :user',
                'create'              => 'Create User',
                'deactivated'         => 'Deactivated Users',
                'deleted'             => 'Deleted Users',
                'edit'                => 'Edit User',
                'management'          => 'User Management',
                'no_permissions'      => 'No Permissions',
                'no_roles'            => 'No Roles to set.',
                'permissions'         => 'Permissions',

                'table' => [
                    'confirmed'      => 'Confirmed',
                    'created'        => 'Created',
                    'email'          => 'E-mail',
                    'id'             => 'ID',
                    'last_updated'   => 'Last Updated',
                    'name'           => 'Name',
                    'first_name'     => 'First Name',
                    'last_name'      => 'Last Name',
                    'no_deactivated' => 'No Deactivated Users',
                    'no_deleted'     => 'No Deleted Users',
                    'other_permissions' => 'Other Permissions',
                    'permissions' => 'Permissions',
                    'roles'          => 'Roles',
                    'social' => 'Social',
                    'total'          => 'user total|users total',
                ],

                'tabs' => [
                    'titles' => [
                        'overview' => 'Overview',
                        'history'  => 'History',
                    ],

                    'content' => [
                        'overview' => [
                            'avatar'       => 'Avatar',
                            'confirmed'    => 'Confirmed',
                            'created_at'   => 'Created At',
                            'deleted_at'   => 'Deleted At',
                            'email'        => 'E-mail',
                            'last_updated' => 'Last Updated',
                            'name'         => 'Name',
                            'first_name'   => 'First Name',
                            'last_name'    => 'Last Name',
                            'status'       => 'Status',
                        ],
                    ],
                ],

                'view' => 'View User',
            ],
        ],
    ],

    'frontend' => [

        'auth' => [
            'login_box_title'    => 'Login',
            'login_button'       => 'Login',
            'login_with'         => 'Login with :social_media',
            'register_box_title' => 'Register',
            'register_button'    => 'Register',
            'remember_me'        => 'Remember Me',
        ],

        'contact' => [
            'box_title' => 'Contact Us',
            'button' => 'Send Information',
        ],

        'passwords' => [
            'expired_password_box_title' => 'Your password has expired.',
            'forgot_password'                 => 'Forgot Your Password?',
            'reset_password_box_title'        => 'Reset Password',
            'reset_password_button'           => 'Reset Password',
            'update_password_button'           => 'Update Password',
            'send_password_reset_link_button' => 'Send Password Reset Link',
        ],

        'user' => [
            'passwords' => [
                'change' => 'Change Password',
            ],

            'profile' => [
                'avatar'             => 'Avatar',
                'created_at'         => 'Created At',
                'edit_information'   => 'Edit Information',
                'email'              => 'E-mail',
                'last_updated'       => 'Last Updated',
                'name'               => 'Name',
                'first_name'         => 'First Name',
                'last_name'          => 'Last Name',
                'update_information' => 'Update Information',
            ],
        ],
        //@todo multi language after this
        'birds' => [
            'order'                 => 'Ordre',
            'species'        => 'Specie',
            'familly'           => 'Family',
            'usualName'           => 'UsualName',
            'gender' => 'Gender',
            'male' => 'Male',
            'female' => 'Female',
            'unknow' => 'Unknow',
            'sexingMethode' => 'SexingMethod',
            'mutation' => 'Mutation',
            'birthDate' => 'Date of Birth',
            'age' => 'Age',
            'idType' => "Type d'identifiant",
            'idPerso' => 'Identifiant Personnel',
            'idNummer' => "Numéro d'identifiant",
            'origin' => "Origine",
            'status' => 'Status',
            'disponibility' => 'Disponibilité',
            'history' => 'Historique',
            'mother' => 'Mère',
            'father' => 'Père',
            'orderFirst' => "Choisissez d'abord un Ordre.",
            'famillyFirst' => 'Choisissez d\'abord une Famille.',
            'speciesFirst' => 'Choisissez d\'abord une Espéce.',
            'specieCustom' => 'Choisissez une de vos Espéce.',
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
            'fertilityControl'=>'Contrôle de la fertilité',
            'girdleDate'=>'Age pour baguer',
            'outOfNest'=>'Sortie du nid',
            'weaning'=>'sevrage',
            'sexualMaturity'=>'Maturité sexuelle',
            'spawningInterval'=>'Interval de ponte',


        ],


    ],
];
