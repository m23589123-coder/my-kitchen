<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@400;700;900&display=swap" rel="stylesheet">
    <style> body { font-family: 'Cairo', sans-serif; } </style>
</head>
<body class="bg-gray-900 text-white p-6">
    <div class="max-w-6xl mx-auto">
        <header class="text-center mb-12">
            <h1 class="text-5xl font-black text-orange-500 mb-4 tracking-tighter">AklaWorld 🔥</h1>
            <p class="text-gray-400">اختر المكونات اللي في ثلاجتك وهنقولك تطبخ إيه</p>
        </header>

        <!-- فلتر المكونات الذكي -->
        <form action="/" method="GET" class="mb-12 bg-gray-800 p-8 rounded-3xl border border-gray-700 shadow-2xl">
            <h3 class="text-xl font-bold mb-6 flex items-center">🛒 مكوناتك المتاحة:</h3>
            <div class="flex flex-wrap gap-3">
                @foreach($allIngredients as $ing)
                    <label class="relative group">
                        <input type="checkbox" name="my_ingredients[]" value="{{ $ing }}"
                               class="hidden peer" onchange="this.form.submit()"
                               {{ in_array($ing, (array)request('my_ingredients')) ? 'checked' : '' }}>
                        <span class="px-5 py-2 rounded-xl border border-gray-600 bg-gray-700 cursor-pointer peer-checked:bg-orange-500 peer-checked:border-orange-500 transition-all inline-block hover:scale-105">
                            {{ $ing }}
                        </span>
                    </label>
                @endforeach
            </div>
        </form>

        <!-- شبكة النتائج -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-10">
            @forelse($recipes as $recipe)
                <a href="{{ url('/recipe/'.$recipe->id) }}" class="group relative bg-gray-800 rounded-3xl overflow-hidden border border-gray-700 hover:border-orange-500 transition-all duration-500 shadow-lg">
                    <img src="{{ $recipe->image_url }}" class="w-full h-64 object-cover group-hover:scale-110 transition-transform duration-500 opacity-80 group-hover:opacity-100">
                    <div class="absolute bottom-0 left-0 right-0 p-6 bg-gradient-to-t from-black to-transparent">
                        <h2 class="text-2xl font-black mb-2">{{ $recipe->title }}</h2>
                        <div class="flex gap-2">
                            @foreach($recipe->ingredients->take(3) as $ing)
                                <span class="text-[10px] bg-orange-500/20 text-orange-400 px-2 py-1 rounded-md border border-orange-500/30">#{{ $ing->name }}</span>
                            @endforeach
                        </div>
                    </div>
                </a>
            @empty
                <div class="col-span-full text-center py-20 bg-gray-800 rounded-3xl border-2 border-dashed border-gray-700">
                    <p class="text-gray-500 text-xl font-bold italic">مفيش أكلة بتجمع المكونات دي.. جرب تزود مكونات تانية!</p>
                </div>
            @endforelse
        </div>
    </div>
</body>
</html>
