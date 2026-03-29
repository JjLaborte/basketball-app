<div class="max-w-4xl mx-auto py-12 px-6">
    <div class="flex justify-between items-center mb-10">
        <h1 class="text-4xl font-extrabold">Your Daily Grind</h1>
        
        <a href="#" class="bg-green-600 text-white px-6 py-2 rounded font-bold flex items-center gap-2">
            Download PDF
        </a>
    </div>

    <div class="bg-white shadow-xl rounded-2xl p-8 border-l-8 border-orange-500">
        <h2 class="text-2xl font-bold mb-4">
            Custom {{ $plan->position }} Routine ({{ ucfirst($plan->skill_level) }})
        </h2>
        
        <div class="prose max-w-none text-gray-700">
            {!! nl2br(e($plan->ai_response)) !!}
        </div>
    </div>
</div>