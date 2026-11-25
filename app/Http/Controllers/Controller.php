<?php

namespace App\Http\Controllers;

<<<<<<< HEAD
abstract class Controller
{
    //
=======
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
>>>>>>> fed64e2b3b3e9936ac944cb53eb739296d7b2318
}
