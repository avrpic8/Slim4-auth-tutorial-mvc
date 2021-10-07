<?php


use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;
use Slim\App;
use Slim\Exception\HttpMethodNotAllowedException;
use Slim\Exception\HttpNotFoundException;
use Slim\Middleware\ErrorMiddleware;
use Slim\Psr7\Response;

return function (App $app) {
    // Parse json, form data and xml
    $app->addBodyParsingMiddleware();

    // Add the Slim built-in routing middleware
    $app->addRoutingMiddleware();
    //$app->add(new WhoopsMiddleware(['enable' => true]));

    $app->add(function (ServerRequestInterface $request, RequestHandlerInterface $handler) {

        try {
            return $handler->handle($request);
        }
        catch (HttpNotFoundException $httpException) {
            $response = new Response();
            $response->getBody()->write('404 Not Found');
            return $response;
        }
        catch (HttpMethodNotAllowedException $notAllowedException){
            $response = (new Response())->withStatus(405);
            $response->getBody()->write('405 Not Allowed');
            return $response;
        }
    });

    // Catch exceptions and errors
    $app->add(ErrorMiddleware::class);
    //$app->setBasePath('/slim_tutorial');
};