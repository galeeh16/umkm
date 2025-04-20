<?php declare(strict_types=1);

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;

final class IndexController extends Controller
{
    public function index()
    {
        return view('home');
    }
}
