<?php declare(strict_types=1);

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

final class LogoutController extends Controller
{
    public function logout(Request $request)
    {
        // Mengakhiri sesi autent pathologyikasi.
        Auth::logout();
        
        // Menghapus semua data sesi dan membuat ID sesi baru.
        $request->session()->invalidate();

        // Membuat ulang token CSRF untuk keamanan tambahan.
        $request->session()->regenerateToken();

        return redirect()->to('login');
    }
}
