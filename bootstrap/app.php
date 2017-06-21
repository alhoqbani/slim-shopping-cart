<?php
use Illuminate\Database\Capsule\Manager as Capsule;

require_once __DIR__ . '/../vendor/autoload.php';
require_once __DIR__ . '/init.php';

$settings = include __DIR__ . '/settings.php';

$app = new App\Application();

require_once __DIR__ . '/container.php';

require_once ROOT . 'routes/routes.php';
