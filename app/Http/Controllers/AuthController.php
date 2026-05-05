<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    /**
     * عرض صفحة تسجيل الدخول (استخدام الملف الجديد للهروب من الكاش)
     */
    public function showLogin()
    {
        return view('auth.new_login');
    }

    /**
     * معالجة عملية تسجيل الدخول
     */
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            // التوجه للصفحة الرئيسية بعد الدخول
            return redirect()->intended('/');
        }

        return back()->withErrors([
            'email' => 'البريد الإلكتروني أو كلمة المرور غير صحيحة.',
        ])->onlyInput('email');
    }

    /**
     * عرض صفحة تسجيل حساب جديد (استخدام الملف الجديد للهروب من الكاش)
     */
    public function showRegister()
    {
        return view('auth.new_register');
    }

    /**
     * معالجة تسجيل حساب جديد
     */
    public function register(Request $request)
    {
        // التحقق من البيانات
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8',
        ]);

        // إنشاء اليوزر في الداتابيز
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        // تسجيل دخول تلقائي بعد التسجيل
        Auth::login($user);

        return redirect('/');
    }

    /**
     * تسجيل الخروج
     */
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }
}
