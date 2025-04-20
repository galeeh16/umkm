<?php declare(strict_types=1);

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

final class ProfileController extends Controller
{
    public function index()
    {
        return view('profile.index');
    }

    public function product()
    {
        return view('profile.product');
    }
}