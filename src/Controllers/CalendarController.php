<?php
namespace App\Controllers;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use App\Models\Event;

class CalendarController
{
    public function index(Request $request, Response $response)
    {
        $events = Event::all();
        include __DIR__ . "/../../views/calendar.view.php";
        return $response;
    }
}