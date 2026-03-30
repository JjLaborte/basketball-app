<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TrainingPlan;
use Illuminate\Support\Facades\Http;

class PageController extends Controller
{
    public function home() {
        return view('pages.home');
    }

    public function form() {
        return view('pages.form');
    }

    public function generate(Request $request) {
        // 1. Validate the incoming data
        $validated = $request->validate([
            'position' => 'required|string',
            'level' => 'required|string',
            'height' => 'nullable|numeric|min:100|max:250',
            'weight' => 'nullable|numeric|min:40|max:180',
            'workspace' => 'nullable|string|in:full-court,half-court,ring-only,no-ring',
            'weight_room' => 'nullable|boolean',
            'ring_available' => 'nullable|boolean',
        ]);

        // 2. Build the prompt for Gemini
        $prompt = "Create a personalized basketball training plan for a {$validated['position']} player at {$validated['level']} skill level.";
        if (!empty($validated['height'])) {
            $prompt .= " Player height: {$validated['height']} cm.";
        }
        if (!empty($validated['weight'])) {
            $prompt .= " Player weight: {$validated['weight']} kg.";
        }
        if (!empty($validated['workspace'])) {
            $workspace = str_replace('-', ' ', $validated['workspace']);
            $prompt .= " Available workspace: {$workspace}.";
        }
        $weightRoom = !empty($validated['weight_room']) ? 'yes' : 'no';
        $ring = !empty($validated['ring_available']) ? 'yes' : 'no';
        $prompt .= " Weight room available: {$weightRoom}. Ring available: {$ring}.";
        $prompt .= " Provide a detailed daily training routine including drills, exercises, and tips tailored to their profile.";

        // 3. Call Gemini API
        $apiKey = config('services.gemini.api_key');
        $response = Http::post("https://generativelanguage.googleapis.com/v1beta/models/gemini-1.5-flash:generateContent?key={$apiKey}", [
            'contents' => [
                [
                    'parts' => [
                        ['text' => $prompt]
                    ]
                ]
            ]
        ]);

        if ($response->failed()) {
            // Handle error
            $aiResponse = "Error generating plan: " . $response->body();
        } else {
            $data = $response->json();
            $aiResponse = $data['candidates'][0]['content']['parts'][0]['text'] ?? 'No response from AI.';
        }

        // 4. Save to the Database
        $plan = TrainingPlan::create([
            'position' => $validated['position'],
            'skill_level' => $validated['level'],
            'ai_response' => $aiResponse,
        ]);

        // 5. Redirect to the results page
        return redirect()->route('plan.show', ['id' => $plan->id]);
    }

    public function showPlan($id) {
        // Fetch the specific plan from the database
        $plan = TrainingPlan::findOrFail($id);

        return view('pages.results', compact('plan'));
    }
}