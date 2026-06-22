<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LogoutController extends Controller
{
    public function destroy(Request $request)
    {
        Auth::logout(); // Xóa user khỏi session hiện tại.

        $request->session()->invalidate(); // Xóa toàn bộ session, tạo session ID mới.
        $request->session()->regenerateToken(); // Tạo CSRF token mới

        return redirect('/');
    }
}
