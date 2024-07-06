<?php
return [
    'color' => null,
    'interactive' => true,
    'help' => null,
    'sourcePath' => '@akiraz2/blog/',
    'messagePath' => '@akiraz2/blog/messages',
    'languages' => [
        'ru-RU',
    ],
    'translator' => 'Module::t',
    'sort' => false,
    'overwrite' => true,
    'removeUnused' => false,
    'markUnused' => true,
    'except' => [
        '.svn',
        '.git',
        '.gitignore',
        '.gitkeep',
        '.hgignore',
        '.hgkeep',
        '/vendor',
        '/BaseYii.php',
        '/node_modules',
        '/vagrant',
        '*test*',
        '*fixture*',
        'environments'
    ],
    'only' => [
        '*.php',
    ],
    'format' => 'php',
    /*'db' => 'db',
    'sourceMessageTable' => '{{%source_message}}',
    'messageTable' => '{{%message}}',*/
    'catalog' => 'messages',
    'ignoreCategories' => [],
    'phpFileHeader' => '',
    'phpDocBlock' => null,
];
