<?php

return [
    'accepted'             => 'Le champ :attribute doit être accepté.',
    'active_url'           => 'Le champ :attribute n\'est pas une URL valide.',
    'after'                => 'Le champ :attribute doit être une date postérieure au :date.',
    'alpha'                => 'Le champ :attribute doit seulement contenir des lettres.',
    'alpha_dash'           => 'Le champ :attribute doit seulement contenir des lettres, des chiffres et des tirets.',
    'alpha_num'            => 'Le champ :attribute doit seulement contenir des lettres et des chiffres.',
    'array'                => 'Le champ :attribute doit être un tableau.',
    'before'               => 'Le champ :attribute doit être une date antérieure au :date.',
    'between'              => [
        'numeric' => 'La valeur de :attribute doit être comprise entre :min et :max.',
        'file'    => 'Le fichier :attribute doit avoir une taille entre :min et :max kilo-octets.',
        'string'  => 'Le texte :attribute doit avoir entre :min et :max caractères.',
        'array'   => 'Le tableau :attribute doit avoir entre :min et :max éléments.',
    ],
    'boolean'              => 'Le champ :attribute doit être vrai ou faux.',
    'confirmed'            => 'Le champ de confirmation :attribute ne correspond pas.',
    'date'                 => 'Le champ :attribute n\'est pas une date valide.',
    'email'                => 'Le champ :attribute doit être une adresse email valide.',
    'exists'               => 'Le champ :attribute sélectionné est invalide.',
    'file'                 => 'Le champ :attribute doit être un fichier.',
    'filled'               => 'Le champ :attribute doit avoir une valeur.',
    'image'                => 'Le champ :attribute doit être une image.',
    'in'                   => 'Le champ :attribute sélectionné est invalide.',
    'integer'              => 'Le champ :attribute doit être un entier.',
    'ip'                   => 'Le champ :attribute doit être une adresse IP valide.',
    'json'                 => 'Le champ :attribute doit être une chaîne JSON valide.',
    'max'                  => [
        'numeric' => 'La valeur de :attribute ne peut pas être supérieure à :max.',
        'file'    => 'Le fichier :attribute ne peut pas être plus gros que :max kilo-octets.',
        'string'  => 'Le texte de :attribute ne peut pas contenir plus de :max caractères.',
        'array'   => 'Le tableau :attribute ne peut pas avoir plus de :max éléments.',
    ],
    'min'                  => [
        'numeric' => 'La valeur de :attribute doit être supérieure ou égale à :min.',
        'file'    => 'Le fichier :attribute doit avoir une taille supérieure à :min kilo-octets.',
        'string'  => 'Le texte :attribute doit contenir au moins :min caractères.',
        'array'   => 'Le tableau :attribute doit avoir au moins :min éléments.',
    ],
    'numeric'              => 'Le champ :attribute doit contenir un nombre.',
    'regex'                => 'Le format du champ :attribute est invalide.',
    'required'             => 'Le champ :attribute est obligatoire.',
    'unique'               => 'La valeur du champ :attribute est déjà utilisée.',
    // Ajoutez d'autres messages de validation ici...

    'custom' => [
        'nom' => [
            'required' => 'Le champ nom est obligatoire.',
            'regex'    => 'Le format du champ nom est invalide.',
        ],
        // Ajoutez d'autres règles personnalisées ici...
    ],

    'attributes' => [
        'nom' => 'nom',
        'email' => 'adresse email',
        // Ajoutez d'autres attributs ici...
    ],
];
