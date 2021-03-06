<?php
return [
    'title' => 'Old Competition Problem Sets',
  
    'single' => 'Competition Problem Set',

    'model' => 'App\CompetitionProblemSet',

    'columns' => [
        'name' => [
            'title' => 'Name'
        ],

        'problems' => [
            'title' => 'Problems',
            'relationship' => 'problems',
            'select' => 'COUNT((:table).id)'
        ],
    ],

    'filters' => [
        'name' => [
            'title' => 'Name',
            'type' => 'text'
        ]
    ],

    'edit_fields' => [
        'name' => [
            'title' => 'Name',
            'type' => 'text',
        ],

        'filename' => [
            'title' => 'File',
            'type' => 'file',
            'location' => storage_path() . '/uploads/',
            'naming' => 'random',
            'length' => 20,
            'mimes' => 'pdf'
        ],
    ],
    
    'actions' => array(
        'view_pdf' => array(
            'title' => 'View PDF',
            'messages' => array(
            ),
            'action' => function($competition) {
                return Redirect::to("/competitions/{$competition->id}/pdf");
            },
        ),
    ),
];
