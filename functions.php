<?php

require 'utils.php';
require 'core/Route.php';

$baseTemplateDir = get_template_directory() . DS;
$methodsDir = $baseTemplateDir . 'methods';
$cptDir = $baseTemplateDir . 'custom-post-type';
$routesDir = $baseTemplateDir . 'routes';

$methods = ['user'];
$cptFiles = ['post','transaction'];
$routesFiles = ['user'];

$filesToImport = [
    ['names' => $methods, 'dir' => $methodsDir ],
    ['names' => $cptFiles, 'dir' => $cptDir ],
    ['names' => $routesFiles, 'dir' => $routesDir ],
];

foreach($filesToImport as $option) {
    requireFiles($option['names'], $option['dir']);
}
