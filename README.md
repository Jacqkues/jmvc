# JMVC

## A simple Model View Controller library built with php


* build a controller : 
    you need to implements the interface Controlleur : 
```php
use jmvc\Controlleur;

class UserControlleur implements Controlleur{
```

* Create a route with : the path , the controller and the function to call

```php
use jmvc\Route;

$editRoute = new Route("/edit",$userControlleur,"editPage");
```

* Add the route to the Router :

```php
use jmvc\Router;

$router = new Router();
$router->addRoute($editRoute);
```

* Create a guard to protect some routes : 

```php
use jmvc\AuthGuard;

$adminGuard = new AuthGuard($authController,"isAdmin");
```

* And create an protected route with the guard : 

```php
use jmvc\ProtectedRoute;

$adminDashboard = new ProtectedRoute("/admin",$adminControlleur,"index",$adminGuard);
```

* Serve the routes : 

```php
$router->handleRequest();
```