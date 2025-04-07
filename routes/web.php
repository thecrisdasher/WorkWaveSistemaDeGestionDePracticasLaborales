<?php

use App\Http\Middleware\AuthRolAdmin;
use App\Http\Middleware\AuthRolStudent;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\UserProfileController;
use App\Http\Controllers\ResetPassword;
use App\Http\Controllers\ChangePassword;
use App\Http\Controllers\OfertaController;
use App\Http\Controllers\AdminEmpresasController;
use App\Http\Controllers\SearchController;
use App\Enums\RolType;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\EstudiantePrincipalController;
use GuzzleHttp\Psr7\Request;
use Illuminate\Support\Facades\Auth;

Route::get('/', function () {
    $user = Auth::user(); // Obtiene el usuario autenticado
    switch ($user->id_rol) {
        case RolType::Estudiante->value:
            return redirect('/principal');
        case RolType::Admin->value:
            return redirect('/dashboard');
        case RolType::Empresa->value:
            return redirect('/administrar-empresas');
        default:
            return redirect('/principal');
    }
})->middleware('auth');




// Ruta para el dashboard

// // Ruta para el dashboard
// Route::get('/principal', [estudiantePrincipalController::class, 'principal'])->name('principal');

// Route::get('/oferta/{id}', [OfertaController::class, 'show'])->name('oferta.show');


// //Route::resource('/principal', 'App\Http\Controllers\estudiantePrincipalController')->middleware(['auth']);
// Route::resource('/admin-users', 'App\Http\Controllers\UsersAdminController')->middleware(['auth']);
// Route::get('/busqueda', 'App\Http\Controllers\OfertaController@busqueda')->middleware(['auth']);
// Route::get('/register', [RegisterController::class, 'create'])->middleware('guest')->name('register');
// Route::post('/register', [RegisterController::class, 'store'])->middleware('guest')->name('register.perform');
// Route::get('/login', [LoginController::class, 'show'])->middleware('guest')->name('login');
// Route::post('/login', [LoginController::class, 'login'])->middleware('guest')->name('login.perform');
// Route::get('/reset-password', [ResetPassword::class, 'show'])->middleware('guest')->name('reset-password');
// Route::post('/reset-password', [ResetPassword::class, 'send'])->middleware('guest')->name('reset.perform');
// Route::get('/change-password', [ChangePassword::class, 'show'])->middleware('guest')->name('change-password');
// Route::post('/change-password', [ChangePassword::class, 'update'])->middleware('guest')->name('change.perform');
// Route::get('/dashboard', [HomeController::class, 'index'])->name('home')->middleware('auth');
// Route::get('imprimirUsers', 'App\http\Controllers\PdfController@imprimirUsers')->name('imprimirUsers');
// Route::get('imprimirOfertas', 'App\http\Controllers\PdfController@imprimirOfertas')->name('imprimirOfertas');
// Route::get('imprimirEmpresas', 'App\http\Controllers\PdfController@imprimirEmpresas')->name('imprimirEmpresas');
// Route::post('myurl', [SearchController::class, 'show']);
// Route::get('/oferta/detalle/{id}', [OfertaController::class, 'detalleOferta']);
// Route::post('/oferta/postularme/{id}', [OfertaController::class, 'postularme'])->name('oferta.postularme');
// Route::post('/profile/update-photo', [UserProfileController::class, 'updatePhoto'])->name('profile.update-photo');
// Route::get('/oferta/{id_oferta}', [OfertaController::class, 'show'])->name('ofertas.show');
// Route::get('/QuienesSomos', [LoginController::class, 'quienSomos'])->middleware('guest')->name('QuienesSomos');
// Route::resource('/admin-empresas', 'App\Http\Controllers\AdminEmpresasController')->middleware(['auth']);

// original

Route::resource('/oferta', 'App\Http\Controllers\OfertaController')->middleware(['auth']);
Route::resource('/admin-empresas', 'App\Http\Controllers\AdminEmpresasController')->middleware(['auth', AuthRolAdmin::class]);
Route::resource('/principal', 'App\Http\Controllers\estudiantePrincipalController')->middleware(['auth', AuthRolStudent::class]);
Route::resource('/admin-users', 'App\Http\Controllers\UsersAdminController')->middleware(['auth', AuthRolAdmin::class]);
Route::get('/busqueda', 'App\Http\Controllers\OfertaController@busqueda')->middleware(['auth', AuthRolStudent::class]);
Route::get('/register', [RegisterController::class, 'create'])->middleware('guest')->name('register');
Route::post('/register', [RegisterController::class, 'store'])->middleware('guest')->name('register.perform');
Route::get('/login', [LoginController::class, 'show'])->middleware('guest')->name('login');
Route::post('/login', [LoginController::class, 'login'])->middleware('guest')->name('login.perform');
Route::get('/reset-password', [ResetPassword::class, 'show'])->middleware('guest')->name('reset-password');
Route::post('/reset-password', [ResetPassword::class, 'send'])->middleware('guest')->name('reset.perform');
Route::get('/change-password', [ChangePassword::class, 'show'])->middleware('guest')->name('change-password');
Route::post('/change-password', [ChangePassword::class, 'update'])->middleware('guest')->name('change.perform');
Route::get('/dashboard', [DashboardController::class, 'dashboard'])->name('home')->middleware('auth');
Route::get('imprimirUsers', 'App\http\Controllers\PdfController@imprimirUsers')->name('imprimirUsers');
Route::get('imprimirOfertas', 'App\http\Controllers\PdfController@imprimirOfertas')->name('imprimirOfertas');
Route::get('imprimirEmpresas', 'App\http\Controllers\PdfController@imprimirEmpresas')->name('imprimirEmpresas');
Route::post('myurl', [SearchController::class, 'show']);
Route::get('/oferta/detalle/{id}', [OfertaController::class, 'detalleOferta']);
Route::post('/oferta/postularme/{id}', [OfertaController::class, 'postularme'])->name('oferta.postularme');
Route::post('/profile/update-photo', [UserProfileController::class, 'updatePhoto'])->name('profile.update-photo');
Route::get('/oferta/{id_oferta}', [OfertaController::class, 'show'])->name('ofertas.show');
Route::get('/QuienesSomos', [LoginController::class, 'quienSomos'])->middleware('guest')->name('QuienesSomos');
Route::get('/principal', [estudiantePrincipalController::class, 'principal'])->name('principal');
Route::get('/estadisticas', [App\Http\Controllers\PostulacionesController::class, 'statistics'])->name('postulaciones.statistics');
Route::get('/buscar-ofertas', [EstudiantePrincipalController::class, 'buscarOfertas'])->name('buscar.ofertas');


//middleware
Route::group(['middleware' => 'auth'], function () {
    Route::get('/virtual-reality', [PageController::class, 'vr'])->name('virtual-reality');
    Route::get('/rtl', [PageController::class, 'rtl'])->name('rtl');
    Route::get('/profile', [UserProfileController::class, 'show'])->name('profile');
    Route::post('/profile', [UserProfileController::class, 'update'])->name('profile.update');
    Route::get('/profile-static', [PageController::class, 'profile'])->name('profile-static');
    Route::get('/sign-in-static', [PageController::class, 'signin'])->name('sign-in-static');
    Route::get('/sign-up-static', [PageController::class, 'signup'])->name('sign-up-static');
    Route::get('/{page}', [PageController::class, 'index'])->name('page');
    Route::post('logout', [LoginController::class, 'logout'])->name('logout');
  
});
