<?php

use App\Models\Task;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/api/tasks', function () {
    $data = [
        'token' => csrf_token(),
        'items' => Task::latest()->simplePaginate(7)
    ];

    return response()->json($data);
});

// select
Route::get('/tasks', function () {
    $data = [
        'token' => csrf_token(),
        'items' => Task::latest()->simplePaginate(7)
    ];

    if (Request::ajax()) {
        return response()->json($data);
    }

    return view('tasks/index', $data);
});

// insert
Route::post('/tasks', function () {
    $data = [
        'token' => csrf_token(),
        'status' => null
    ];

    if (Request::has('title')) {
        try {
            $item = Task::create(
                Request::only('title', 'description')
            );

            $data['status'] = 'Success';
            $data['data'] = compact('item');
        } catch (\Exception $e) {
            $data['status'] = 'Failed';
            $data['message'] = 'Database error';
        }
    }

    return response()->json($data);
});

// delete
Route::get('/tasks/truncate', function () {
    // Task::truncate();
    \DB::table('tasks')->truncate();

    return redirect('/tasks');
});
