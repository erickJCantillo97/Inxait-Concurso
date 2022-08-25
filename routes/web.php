<?php

use App\Exports\UserExport;
use App\Http\Livewire\Inicio;
use App\Models\Ciudad;
use App\Models\Departamento;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Route;
use Maatwebsite\Excel\Facades\Excel;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', Inicio::class);

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});


Route::get('cargar', function(){
    $client = new Client(
        [
           'base_uri' =>'https://www.datos.gov.co',
        ]
    );
    $response = $client->request('get', 'resource/xdk5-pm3f.json');
    $municipios = json_decode($response->getBody()->getContents());
    foreach ($municipios as  $value) {
        $id = Ciudad::firstOrcreate([
            'departamento_id' => Departamento::firstOrCreate([
                'name' => $value->departamento
            ])->id,
            'name' => $value->municipio,
        ]);
    }
    return back();
})->name('cargar');

Route::get('export', function(){
    return  Excel::download(new UserExport, "Users ".date("Y-m-d H:i:s").".xlsx");
});
