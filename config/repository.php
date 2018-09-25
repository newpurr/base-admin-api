<?php
return [
    'generator'=>[
        'basePath'=>app()->path(),
        'rootNamespace'=>'App\\',
        'paths'=>[
            'models'       => 'Models',
            'repositories' => 'Repository/Repositories',
            'interfaces'   => 'Repository/Contracts',
            'transformers' => 'Repository/Transformers',
            'presenters'   => 'Repository/Presenters',
            'validators'   => 'Repository/Validators',
            'controllers'  => 'Http/Controllers',
            'provider'     => 'RepositoryServiceProvider',
            'criteria'     => 'Repository/Criteria',
        ]
    ]
];