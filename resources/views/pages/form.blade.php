@vite(['resources/css/app.css', 'resources/js/app.js'])



<div class="min-h-screen bg-slate-900 text-white font-sans">
    <div class="flex flex-col items-center justify-center py-20">
        <h1 class="text-6xl font-black text-orange-500 italic uppercase tracking-tighter">Elite Trainer AI</h1>
        <p class="text-gray-400 mt-2">Custom basketball drills based on your position.</p>
    </div>



    <div class="max-w-xl mx-auto bg-slate-800 p-8 rounded-3xl shadow-2xl border border-slate-700">
        <form action="{{ route('plan.generate') }}" method="POST" class="space-y-6">
            @csrf
            <div>
                <label class="block text-sm font-bold uppercase tracking-widest text-gray-500 mb-3">Select Your Position</label>
                <div class="grid grid-cols-3 gap-3">
                    @foreach(['PG', 'SG', 'POST'] as $pos)
                        <label class="cursor-pointer">
                            <input type="radio" name="position" value="{{ $pos }}" class="peer hidden" required>
                            <div class="bg-slate-700 p-4 rounded-xl text-center font-bold border-2 border-transparent peer-checked:border-orange-500 peer-checked:bg-orange-500/10 transition-all">
                                {{ $pos }}
                            </div>
                        </label>
                    @endforeach
                </div>
            </div>

            <div>
                <label class="block text-sm font-bold uppercase tracking-widest text-gray-500 mb-2">Skill Level</label>
                <select name="level" class="w-full bg-slate-700 border-none rounded-xl p-4 focus:ring-2 focus:ring-orange-500">
                    <option value="beginner">Beginner</option>
                    <option value="intermediate">Intermediate</option>
                    <option value="pro">Pro / Varsity</option>
                </select>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div>
                    <label class="block text-sm font-bold uppercase tracking-widest text-gray-500 mb-2" for="height">Height (cm)</label>
                    <input id="height" name="height" type="number" min="100" max="250" step="1" class="w-full bg-slate-700 border-none rounded-xl p-4 focus:ring-2 focus:ring-orange-500" placeholder="e.g. 180">
                </div>
                <div>
                    <label class="block text-sm font-bold uppercase tracking-widest text-gray-500 mb-2" for="weight">Weight (kg)</label>
                    <input id="weight" name="weight" type="number" min="40" max="180" step="1" class="w-full bg-slate-700 border-none rounded-xl p-4 focus:ring-2 focus:ring-orange-500" placeholder="e.g. 75">
                </div>
            </div>

            <div>
                <label class="block text-sm font-bold uppercase tracking-widest text-gray-500 mb-2">Working Space</label>
                <select name="workspace" class="w-full bg-slate-700 border-none rounded-xl p-4 focus:ring-2 focus:ring-orange-500">
                    <option value="full-court">Full Court</option>
                    <option value="half-court">Half Court</option>
                    <option value="ring-only">Ring Only</option>
                    <option value="no-ring">No Ring</option>
                </select>
            </div>

            <div class="grid grid-cols-2 gap-4">
                <label class="flex items-center gap-2 bg-slate-700 rounded-xl p-4 cursor-pointer">
                    <input type="checkbox" name="weight_room" value="1" class="h-5 w-5 text-orange-500 rounded focus:ring-orange-400" />
                    <span class="text-gray-200 font-semibold">Weight Room Available</span>
                </label>
            </div>

            <button type="submit" class="w-full bg-orange-600 hover:bg-orange-500 text-white font-black py-5 rounded-xl uppercase tracking-widest transition-all transform hover:scale-[1.02]">
                Generate Training Plan
            </button>
        </form>
    </div>
</div>