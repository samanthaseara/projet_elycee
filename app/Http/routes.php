<?php
/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/
Route::pattern('id', '[1-9][0-9]*');
Route::get('/', ['as' => 'home', 'uses' => 'FrontController@index']);
Route::get('/article/{id}', 'FrontController@show');
Route::get('/user/{id}', 'FrontController@showPostByUser');
Route::get('category/{id}', 'FrontController@showPostByCat');
Route::group(['middleware' => ['web']], function () {
    Route::group(['middleware' => ['throttle:60,1']], function () {
        Route::any('login', 'LoginController@login');
    });
    Route::get('logout', 'LoginController@logout');
    Route::group(['middleware' => ['auth']], function () {
        Route::resource('post', 'PostController');
    });
});



/**
 * App conteneur de services exemples
 */
class Bar
{
    private $foo;
    public function __construct(Foo $foo)
    {
        $this->foo = $foo;
    }
    public function getFoo()
    {
        return $this->foo;
    }
}
class Foo
{
}
// Laravel utilisera le paradigme de réflexion (PHP) dans son conteneur de services pour résoudre les dépendances de classe
// la classe Bar est composé d'une classe Foo
$bar = App::make('Bar');
// Vous pouvez également préparer un service
class Ip
{
    private $ip;
    public function __construct($ip)
    {
        $this->ip = $ip;
    }
}
// la méthode bind de la class App (conteneur de services) permet de relier une clé à un service préparé
// on passe $app qui est le conteneur de service lui-même, ici on peut utiliser dans le conteneur d'autre service utile
// à notre classe Ip
App::bind('ip', function ($app) {
    return new Ip($app->make('request')->getClientIp());
});
$ip = App::make('ip');
// faites un dd pour voir l'objet de type Ip
// dd($ip);