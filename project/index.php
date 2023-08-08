<?php
//phpinfo();
include "vendor/autoload.php";


use \app\Core\Router;

$router = new Router();

$env = file('.env');
foreach ($env as $env_value) {
    putenv($env_value);
}

$router->get('', [\app\Controllers\EmailsController::class, 'index']);
$router->get('/', [\app\Controllers\EmailsController::class, 'index']);
$router->get('logout', function ()
{
    session_destroy();
    \app\Core\Site::Redirect('');
});

$router->route();

?>
