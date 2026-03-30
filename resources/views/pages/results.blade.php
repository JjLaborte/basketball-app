@vite(['resources/css/app.css', 'resources/js/app.js'])

<div class="min-h-screen bg-slate-900 text-white font-sans py-16 px-4">
    <div class="max-w-5xl mx-auto">
        <div class="bg-slate-800/80 backdrop-blur rounded-3xl p-8 md:p-10 mb-10 border border-slate-700">
            <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4">
                <div>
                    <h1 class="text-4xl md:text-5xl font-extrabold text-orange-500 tracking-tight">Your Daily Grind</h1>
                    <p class="text-slate-300 mt-2">Here is your personalized basketball training plan based on the details you provided.</p>
                </div>
                <a href="{{ route('home') }}" class="bg-orange-600 hover:bg-orange-500 text-white px-6 py-3 rounded-xl font-bold uppercase tracking-wider">Build another plan</a>
            </div>
        </div>

        <div class="grid gap-6 md:grid-cols-2">
            <div class="bg-slate-800 rounded-3xl shadow-xl p-6 border border-slate-700">
                <h2 class="text-xl font-bold text-orange-500 mb-4">Player Profile</h2>
                <ul class="space-y-3 text-slate-100">
                    <li><strong class="text-slate-300">Position:</strong> {{ strtoupper($plan->position) }}</li>
                    <li><strong class="text-slate-300">Skill Level:</strong> {{ ucfirst($plan->skill_level) }}</li>
                    <li><strong class="text-slate-300">Details:</strong></li>
                </ul>
                <div class="mt-3 p-4 bg-slate-700 rounded-xl text-slate-200 text-sm leading-relaxed">
                    {!! nl2br(e($plan->ai_response)) !!}
                </div>
            </div>

            <div class="bg-orange-600/10 rounded-3xl shadow-inner p-6 border border-orange-500/30">
                <h2 class="text-xl font-bold text-orange-300 mb-3">Training Plan</h2>
                <div class="bg-slate-900 rounded-xl p-4 text-slate-100">
                    <h3 class="text-lg font-semibold mb-2">Custom {{ $plan->position }} Routine ({{ ucfirst($plan->skill_level) }})</h3>
                    <p class="leading-relaxed text-slate-200">{!! nl2br(e($plan->ai_response)) !!}</p>
                </div>
                <a href="{{ route('home') }}" class="inline-block mt-6 bg-orange-600 hover:bg-orange-500 text-white py-3 px-5 rounded-xl font-bold">Edit details</a>
            </div>
        </div>
    </div>
</div>