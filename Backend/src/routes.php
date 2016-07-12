<?php
// Routes

$app->get('/', function ($request, $response, $args) { echo TTM\MainController::index($request, $response, $args); });
$app->post('/login', function ($request, $response, $args) { echo TTM\LoginController::doLogin($request, $response, $args); });
$app->get('/getpois', function ($request, $response, $args) { echo TTM\POIController::getPoIs($request, $response, $args); });

/*function ($request, $response, $args) {
    // Sample log message
    $this->logger->info("Slim-Skeleton '/' route");

    // Render index view
    return $this->renderer->render($response, 'index.phtml', $args);
}); */
