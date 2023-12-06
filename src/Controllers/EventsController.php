<?php
namespace App\Controllers;

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use App\Models\Event;
class EventsController {
    public function index(Request $request, Response $response) {
        include __DIR__."/../../views/create.view.php";
        return $response;
    }
    public function create(Request $request, Response $response) {
        $data = $request->getParsedBody();
        if(empty($data['title']) || empty($data['description']) || empty($data['location']) || empty($data['date'])) {
            return $response
                ->withHeader('Location', '/')
                ->withStatus(302);
        }
        $event = new Event(); // Adjust the namespace and model name accordingly
        $event->title = $data['title'];
        $event->description = $data['description'];
        $event->location = $data['location'];
        $event->date = $data['date'];
        $event->save();
        return $response
            ->withHeader('Location', '/calendar')
            ->withStatus(302);
    }
}