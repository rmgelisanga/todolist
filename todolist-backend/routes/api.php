<?php

use App\Models\Project;
use App\Models\User;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::get('/projects', function () {
    $projects = Project::with(['tasks' => ['user']])->get();
    return response()->json(['data' => $projects->toArray()]);
});

Route::get('/getUserTask', function () {
    // DB::enableQueryLog();

    DB::statement("SET SQL_MODE=''");
    // $result = User::with(['projects.taskUser' => function ($query) {
    //     $query->select(DB::raw('sum(hours) as hours'), 'username')->groupBy(DB::raw('tasks.project_id,users.id'));
    // }])->where('username', request()->user)->first()->projects;

    $result = User::with(['projects' => function ($query) {
        $query->groupBy('id')->with(['taskUser' => function ($query) {
            $query->select(DB::raw('sum(hours) as hours'), 'username')->groupBy(DB::raw('tasks.project_id,users.id'));
        }]);
    }])->where('username', request()->user)->first()->projects;

    // $result = User::with(['projects' => function ($query) {
    //     $query->with(['tasks' => ['user']]);
    // }])->where('username', request()->user)->first()->projects;

    // dd(DB::getQueryLog());

    return response()->json(['data' => $result]);
});
