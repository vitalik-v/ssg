<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Actions\Events\GetEvents;
use App\Models\Office;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;


final class MainController extends Controller
{

    public function list(GetEvents $repository)
    {
        $offices = DB::table('offices')->orderBy('rating', 'desc')->get();
        return view('main', compact('offices'));
    }
}
