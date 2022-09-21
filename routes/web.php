<?php

use App\Models\Project;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\ProjectController;


/* EJEMPLOS */
//1. aprendible.com = Route::get('/', function)
//2. aprendible.com/contacto = Route::get('contacto', function)
/*3. aprendible.com/saludo = Route::get('saludo/{nombre?}', function($nombre = "Invitado") {
  return "Hola " .$nombre;
}); */
/*4. Le damos nombre a la ruta por si cambiamos en un futuro la uri 
La hemos cambiado de "contacto" a "contactanos" pero al darle un nombre, va a seguir funcionando. Estos nos quita de cambiar uno a uno todos los <a>.

Ruta origen inicial ->
Route::get('contacto', function() {
  return "Seccion de Contactos";
});

Ruta origen cambiada ->
Route::get('contactanos', function() {
  return "Seccion de Contactos";
})->name('contactos');

Ruta inicial con la uri "contacto" ->
Route::get('/', function () {
  echo "<a href='/contacto'>Contactos 1</a><br>";
  echo "<a href='/contacto'>Contactos 2</a><br>";
  echo "<a href='/contacto'>Contactos 3</a><br>";
  echo "<a href='/contacto"'>Contactos 4</a><br>";
});

Ruta cambiada añadiendole el nombre ->
Route::get('/', function () {
  echo "<a href='".route ('contactos')."'>Contactos 1</a><br>";
  echo "<a href='".route ('contactos')."'>Contactos 2</a><br>";
  echo "<a href='".route ('contactos')."'>Contactos 3</a><br>";
  echo "<a href='".route ('contactos')."'>Contactos 4</a><br>";
}); */

/*5. Ruta para pasarle a la vista variables. Declaramos en la linea 41 la variable nombre y se la pasamos a la view con la compact.
Route::get('/', function () {
  $nombre = "Pablo";
  
    return view ('home', compact('nombre')); // = ('home', ['nombre' => $nombre])
})->name('home'); */

/*6. Para pasar paginas estaticas o con una o pocas variables podemos utlicar Route::view en vez de Route::get. Por ejemplo para la vista de las politicas de privacidad, terminos y condiciones, etc...
Route::view('/', 'home')->name('home');
Route::view('/about', 'about')->name('about');
Route::view('/portfolio', 'portfolio')->name('portfolio');
Route::view('/contact', 'contact')->name('contact'); */

/*7. Vamos a pasar un array de informacion a la vista portfolio. Lo hacemos a traves de la funcion compact. */

/* $portfolio = [
  ['title'=> 'Proyecto #1'],
  ['title'=> 'Proyecto #2'],
  ['title'=> 'Proyecto #3'],
  ['title'=> 'Proyecto #4']
];

Route::view('/portfolio', 'portfolio', compact('portfolio'))->name('portfolio'); */

Route::view('/', 'home')->name('home');
Route::view('/about', 'about')->name('about');

/* Route::get('/portfolio', [ProjectController::class, 'index'])->name('projects.index');
Route::get('/portfolio/create', [ProjectController::class, 'create'])->name('projects.create');
Route::get('/portfolio/{project}/edit', [ProjectController::class, 'edit'])->name('projects.edit');
Route::patch('/portfolio/{project}', [ProjectController::class, 'update'])->name('projects.update');
Route::post('/portfolio', [ProjectController::class, 'store'])->name('projects.store');
Route::get('/portfolio/{project}', [ProjectController::class, 'show'])->name('projects.show');
Route::delete('/portfolio/{project}', [ProjectController::class, 'destroy'])->name('projects.destroy'); */

Route::resource('portfolio', ProjectController::class)
    ->names('projects')
    ->parameters(['portfolio' => 'project']);

Route::view('/contact', 'contact')->name('contact');
Route::post('/contact', [MessageController::class, 'store'])->name('messages.store');

/* Route::apiresource('portfolioProjects', PortfolioController::class); */

Auth::routes();

