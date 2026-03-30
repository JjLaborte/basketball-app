@vite(['resources/css/app.css', 'resources/js/app.js'])

<div class="min-h-screen bg-slate-900 text-white font-sans">
    <!-- Header Section -->
    <header class="flex flex-col items-center justify-center py-20 px-4 min-h-[520px]" style="background-image: url('{{ asset('images/header.jpg') }}'); background-size: cover; background-position: center; background-repeat: no-repeat;">
        <div class="bg-slate-900/50 p-10 md:p-12 rounded-3xl max-w-4xl text-center">
            <h1 class="text-6xl font-black text-orange-500 italic uppercase tracking-tighter">Elite Trainer AI</h1>
            <p class="text-gray-200 mt-8 mx-6 md:mx-10 lg:mx-16 xl:mx-20 text-center leading-relaxed text-lg">
                Elite Trainer AI is dedicated to empowering basketball players at all levels by providing accessible, high-quality training resources. Our AI-powered platform generates customized training plans based on your position and skill level, ensuring you have the tools to improve and excel on the court.
            </p>
        </div>
    </header>

    <!-- Call to Action Section -->
    <section class="flex flex-col items-center justify-center py-20 px-4">
        <h2 class="text-4xl font-bold text-white mb-8">Start Your Training Program Now</h2>
        <a href="{{ route('form') }}" class="bg-orange-600 hover:bg-orange-500 text-white font-black py-5 px-20 md:px-28 rounded-xl uppercase tracking-widest transition-all transform hover:scale-[1.02] min-w-[220px]">
            Get Started
        </a>
    </section>

    <!-- About Us Section -->
    <section class="py-20 px-4 bg-slate-800">
        <div class="max-w-4xl mx-auto text-center">
            <h2 class="text-4xl font-bold text-white mb-8">About Us</h2>
            <p class="text-gray-400 text-lg leading-relaxed">
                Elite Trainer AI is dedicated to empowering basketball players at all levels by providing accessible, high-quality training resources. Our AI-powered platform generates customized training plans based on your position and skill level, ensuring you have the tools to improve and excel on the court. Whether you're a beginner looking to build fundamentals or a pro refining your game, we're here to support your journey.
            </p>
        </div>
    </section>
</div>