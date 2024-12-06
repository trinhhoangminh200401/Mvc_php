<?php
class Router
{
    private static $namedRoutes = [];
    private static $currentRoute = null; 
    public static function handle($method = "GET", $path = "/", $controller = "",$action=null,$name=null)
    {

        self::$currentRoute = [
            'method' => $method,
            'path' => $path,
            'controller' => $controller,
            'action' => $action,
            'name' => $name
        ];
     
      
        $currentMethod = $_SERVER['REQUEST_METHOD'];
        $currentUri = $_SERVER['REQUEST_URI'];
        if ($currentMethod != $method) {
            return false;
        }
        

        $pattern = self::convertPathToPattern($path);
        if (preg_match($pattern, $currentUri, $matches)) {
            array_shift($matches);
            $matchesFilter = array_filter($matches,'is_string',ARRAY_FILTER_USE_KEY);
            if (is_callable($controller)) {
                call_user_func_array($controller, $matches);
            } else {
          
                require_once(__DIR__ . '/../controller/' . $controller . '.php');
                $controller = new $controller();
                if (!method_exists( $controller, $action)) {
                    die("Method $action does not exist in controller $controller");
             
                }

               
                call_user_func_array([$controller, $action],$matchesFilter);
            }
            exit();
        }
        return false;
    }
    
    public static function get($path = '/', $controller = '', $action = null)
    {
        return self::handle('GET', $path, $controller, $action );
    }
    public static function post($path = '/', $controller = '', $action = null)
    {
        return self::handle('POST', $path, $controller, $action);
    }
    public static function delete($path = '/', $controller = '', $action = null)
    {
        return self::handle('Delete', $path, $controller, $action );
    }
    private static function convertPathToPattern($path)
    {
        return '#^' . preg_replace('/\{([a-zA-Z0-9_]+)\}/', '(?P<$1>[^/]+)', $path) . '$#siD';
    }


    public  function name($name)
    {
        if (self::$currentRoute) {

            self::$currentRoute['name'] = $name;
            
            self::$namedRoutes[$name] = self::$currentRoute;
        }
        return $this;
    }
    public static function urlFor($name, $params = [])
    {
    
        if (isset(self::$namedRoutes[$name])) {
            $route = self::$namedRoutes[$name];
            $url = $route['path']; 
            foreach ($params as $key => $value) {
                $url = preg_replace('/\{' . $key . '\}/', $value, $url);
            }

            return $url;
        }

        return null; 
    }

    
}