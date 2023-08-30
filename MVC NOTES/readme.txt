---------
| Terms |
---------
MVC: Model View Controller              [Design Pattern / Conceptual Framework]
During implementations we have layers, for modularity & easy management of code.

Model: db, View: UI, Controller: logic

Larvel:
    Features: Secure, auth, supports mvc, easy migration,

Artisan:
    framework/command line tool for Larvel
    performs repetitive programming tasks
    create skeleton code, db structure, migration,
    allows devs creating own commands

    (somewhat like automating time consuming structural tasks)

Port: is a gateway, all HTTP req come to a port.
HTTPS default port: 443, HTTP default port: 80

----------------------
|  Install Composer  |
----------------------
Composer: Dependency manager for PHP, [like npm for nodejs]
Install, edit xampp/php/php.ini file, uncomment extension=zip

> Global installation of laravel installer:
composer global require laravel/installer       (installs laravel installer)
laravel new projectName                         (creates new laravel project)

> Per-project installation:
composer create-project laravel/laravel projectName         (creates new laravel project)

----------
| To Run |
----------
php artisan serve (starts server at port 8000)
(ensure xampp is running mysql & apache)

-----------------------
| Directory structure |
-----------------------
Model Folder: db/sql queries handling files [handles bussiness logic]
Controller : (mediator b/w model & view)
View: HTML files (handles user interface)

Routing: URL defining files
Assets: images / fonts / css / js files

composer.json contains dependencies (that 'should' be there) used in project
composer.lock contains exact version of dependencies (dependencies that 'are' there) used in project
package.json contains all the javascript dependencies used in project

vendor dir: contains all the dependencies that are installed using composer

web.php: contains all routes (URLs) of the project

-----------------------------------------------------------------------------------------

Laravel
is a php web application framework

PHP
Hypertext Preprocessor
initially: Personal Home Page

ORM: Object Relational Mapping (Eloquent tool is used for ORM in laravel)
maps objects to relational database tables


Laravel drew inspiration from frameworks: Ruby on Rails, ASP.NET MVC, Sinatra,
Laravel combines all best features of the above frameworks.

Seed classes allow you to populate your db

-----------------------------------------------------------------------------------------
Kernel.php: contains all the custom middleware (that are used in the project)
cache dir contains all compiled codes, (improves performance)

db dir: factories, migrations, seeds
whenever request comes, it is handled by index.php file
Testing Framework used by laravel: PHPUnit

env: environment variables
index.php file loads the Composer generated autoloader definition, and then retrieves an instance of the Laravel application from bootstrap/app.php

Rasmus Lerdorf created PHP (Personal Home Page) in 1994,
originally as a simple tool to track visitors to his online resume.

app/Console/kernel: contains all artisan commands (that are used in the project)
http/kernel: contains all the middleware (that are used in the project)

---------------
HTTP kernel extends the Illuminate\Foundation\Http\Kernel class, which defines an array of bootstrapers that will be run before the request is executed. These bootstrapers configure error handling, configure logging, detect the application environment, and perform other tasks that need to be done before the request is actually handled.

Typically, these classes handle internal laravel configuration that you do not need to worry about.
---------------

Providers dir:
contains all the service providers

register() vs boot() in service providers:
register() is called when the service provider is registered,
boot() is called when all other service providers have been registered.



-------------------------------------------------------------
purpose of routing:
to map a URL to a controller action
or
directing incoming requests (usually based on URLs) to the appropriate code or handler.

Routing is like traffic director for web applications.



URI: Uniform Resource Identifier
URN: Uniform Resource Name
URL: Uniform Resource Locator

php artisan route:list (lists all the routes of the project)


put vs patch:
put: updates all the fields of the resource
patch: updates only the fields that are provided in the request

PUT : the request body contains the complete new version
whereas for the PATCH method, the request body only needs to contain the specific changes to the resource.


----------------------- ---------------------------------------------------------------
Arrow or Fat Arrow
=>

Arrow or Member Access
->

How to pass parameters in laravel route:
{param}
eg: {id}, {query}, etc.

php artisan route:list --except-vendor              // show php routes (only user defined routes)

what is a route parameter in Laravel?
A placeholder in a route definition that matches any value in the URL segment.





How can you apply global route constraingts in Laravel?
By using pattern method in the RouteServiceProvider.php

facade:
a facade is a class that provides access to an object from the container

namespace:
a namespace is a way of encapsulating items so that items with the same name do not conflict


Q: How can you apply global route constraints in Laravel
by using the pattern method in the RouteServiceProvider.php file.

-----------------------------------------------------------------
associative arrays:
key => value

AIM oF RESPONSE:
is to provide the client with the resource it requested, or inform the client that the action it requested has been caried out; or else to inform the client that an error occurred in processing its request.




