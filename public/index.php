<?php
require_once '../vendor/autoload.php';
use Slim\Factory\AppFactory;
use Illuminate\Database\Capsule\Manager as Capsule;
use App\Controllers\EventsController;
use App\Controllers\CalendarController;
$capsule = new Capsule;
$capsule->addConnection(require("../config/database.php"));
$capsule->setAsGlobal();
$capsule->bootEloquent();
$app = AppFactory::create();
$app->get('/', [EventsController::class, 'index']);
$app->post('/events/create', [EventsController::class, 'create']);
$app->get('/calendar', [CalendarController::class, 'index']);
$app->run();
