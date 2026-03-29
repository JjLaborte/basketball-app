<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TrainingPlan;

class PageController extends Controller
{
    public function home() {
        return view('pages.home');
    }

    public function generate(Request $request) {
        // 1. Validate the incoming data
        $validated = $request->validate([
            'position' => 'required|string',
            'level' => 'required|string',
        ]);

        // 2. Create a placeholder AI response for now
        $placeholderResponse = "This is a custom " . $validated['position'] . " workout for a " . $validated['level'] . " player. (Real AI logic coming next!)";

        // 3. Save to the Database
        $plan = TrainingPlan::create([
            'position' => $validated['position'],
            'skill_level' => $validated['level'],
            'ai_response' => $placeholderResponse,
        ]);

        // 4. Redirect to the results page with the real ID
        return redirect()->route('plan.show', ['id' => $plan->id]);
    }

    public function showPlan($id) {
        // Fetch the specific plan from the database
        $plan = TrainingPlan::findOrFail($id);

        return view('pages.results', compact('plan'));
    }
}