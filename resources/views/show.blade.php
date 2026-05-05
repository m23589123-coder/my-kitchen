<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 p-4 text-right">
    <div class="max-w-4xl mx-auto bg-white rounded-3xl shadow-xl overflow-hidden">
        <img src="{{ $recipe->image_url }}" class="w-full h-80 object-cover">

        <div class="p-6">
            <div class="flex justify-between items-center mb-6">
                <h1 class="text-3xl font-bold">{{ $recipe->title }}</h1>
                <span class="bg-orange-500 text-white px-4 py-1 rounded-full">{{ $recipe->calories }} سعرة</span>
            </div>

            <div class="grid md:grid-cols-2 gap-8">
                <!-- المكونات -->
                <div class="bg-gray-50 p-4 rounded-xl">
                    <h3 class="font-bold mb-4 border-b-2 border-orange-400 w-fit text-xl">المكونات المطلوبة:</h3>
                    <div class="grid grid-cols-2 gap-2">
                        @foreach($recipe->ingredients as $ing)
                            <div class="text-sm bg-white p-2 rounded shadow-sm border-r-2 border-orange-500">
                                {{ $ing->name }}
                            </div>
                        @endforeach
                    </div>
                </div>

                <!-- الطريقة -->
                <div>
                    <h3 class="font-bold mb-4 text-xl">طريقة التحضير:</h3>
                    <p class="text-gray-700 leading-relaxed whitespace-pre-line bg-orange-50 p-4 rounded-xl">
                        {{ $recipe->description }}
                    </p>
                    <div class="mt-6 text-2xl font-bold text-green-600 font-mono">
                        السعر: {{ $recipe->price }} ج.م
                    </div>
                    <a href="{{ url('/') }}" class="mt-6 inline-block bg-black text-white px-10 py-3 rounded-full">رجوع</a>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
