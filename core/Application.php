<?php namespace Core;

use Exception;
use Illuminate\Container\Container;
use Illuminate\Http\Request;
use Illuminate\Database\Capsule\Manager as Capsule;

class Application extends Container{

    use ApplicationHelper;

    protected $router;

    public function startApplication()
    {

        $this->router = $this['router'];

        $this->controllers($this['config']['paths']['controllers']);
        $this->database($this['config']['database']['connections'][$this['config']['database']['default']]);
        require __DIR__ . '/../app/routes.php';
        $request = Request::createFromGlobals();
        $response = $this->router->dispatch($request);
        $response->send();
        return true;
    }

    public function catchGlobalExceptions(Exception $e)
    {
        return true;
    }

    public function database($data)
    {
        $capsule = new Capsule;
        $capsule->addConnection($data);

        $capsule->setAsGlobal();
        $capsule->bootEloquent();
    }

    public function controllers($path)
    {
        foreach (glob( __DIR__ . '/../'. $path . '/' . '*Controller.php') as $controller) {
            require_once $controller;
        }
    }

} 