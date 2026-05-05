<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>تسجيل الدخول | AklaWorld</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@400;700;900&display=swap" rel="stylesheet">
    <style> body { font-family: 'Cairo', sans-serif; } </style>
</head>
<body class="bg-gray-50 flex items-center justify-center min-h-screen p-4">

    <div class="max-w-md w-full bg-white rounded-[30px] shadow-2xl overflow-hidden border border-gray-100">
        <div class="p-10">
            <div class="text-center mb-10">
                <h1 class="text-5xl font-black text-orange-500 tracking-tight">Akla<span class="text-gray-800">World</span></h1>
                <p class="text-gray-400 mt-3 font-medium">نورتنا يا ليدر.. سجل دخولك</p>
            </div>

            <form method="POST" action="{{ route('login') }}" class="space-y-6">
                @csrf
                <div>
                    <label class="block text-sm font-bold text-gray-700 mb-2 mr-2">البريد الإلكتروني</label>
                    <input type="email" name="email" required
                        class="w-full px-6 py-4 rounded-2xl bg-gray-50 border-2 border-transparent focus:border-orange-500 focus:bg-white transition-all outline-none text-gray-800"
                        placeholder="mail@example.com">
                </div>

                <div>
                    <label class="block text-sm font-bold text-gray-700 mb-2 mr-2">كلمة المرور</label>
                    <input type="password" name="password" required
                        class="w-full px-6 py-4 rounded-2xl bg-gray-50 border-2 border-transparent focus:border-orange-500 focus:bg-white transition-all outline-none text-gray-800"
                        placeholder="••••••••">
                </div>

                <button type="submit"
                    class="w-full bg-orange-500 hover:bg-orange-600 text-white font-black py-4 rounded-2xl shadow-xl shadow-orange-200 transition-all transform hover:scale-[1.02]">
                    يلا ناكل! (دخول)
                </button>
            </form>

            <div class="mt-8 text-center">
                <p class="text-gray-500">جديد معانا؟
                    <a href="{{ route('register') }}" class="text-orange-600 font-bold hover:underline">اعمل حساب في ثانية</a>
                </p>
            </div>
        </div>
    </div>

</body>
</html>
