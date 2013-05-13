<?php
/**
 * @author      Aaron Lord <aaronlord1@gmail.com>
 * @copyright   (c) 2013 Aaron Lord
 */
namespace Griddle\Foundation;

use Griddle\Support\Str;

class ServiceProvider
{
    protected $private;

    public function __construct($app)
    {
        $this->app = $app;
    }

    public function register()
    {
        $methods = get_class_methods($this);

        foreach($methods as $method)
        {
            if(Str::startsWith($method, 'register') && !($method == 'register'))
            {
                $this->$method();
            }
        }
    }

    private function registerConfig()
    {
        $this->app->config = $this->app->share(function ($app)
        {
            $config = new \Griddle\Config\Config($app);

            $files = glob($app['paths']['app'].'/config/*.php');
            $config->loadFile($files);

            return $config;
        });
    }

    private function registerRouter()
    {
        $this->app->router = $this->app->share(function ($app)
        {
            return new \Griddle\Routing\Router($app);
        });
    }

    private function registerRequest()
    {
        $this->app->request = $this->app->share(function ($app)
        {
            return new \Griddle\HTTP\Request;
        });
    }

    private function registerRedirect()
    {
        $this->app->redirect = $this->app->share(function ($app)
        {
            return new \Griddle\HTTP\Redirect($app->router->getRoutes());
        });
    }

    private function registerView()
    {
        $this->app->view = $this->app->share(function ($app)
        {
            return new \Griddle\View\View($app);
        });
    }

    private function registerDatabase()
    {
        $this->app->database = $this->app->share(function ($app)
        {
            return new \Griddle\Database\Database;
        });
    }

}