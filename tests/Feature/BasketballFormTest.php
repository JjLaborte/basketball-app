<?php
namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class BasketballFormTest extends TestCase
{
    // This tells Laravel to wipe the "memory" database before every test
    use RefreshDatabase;

    public function test_user_can_submit_basketball_form_and_see_results()
    {
        // 1. ACT: Send a fake POST request to your route
        $response = $this->post('/generate-plan', [
            'position' => 'PG',
            'level' => 'intermediate',
        ]);

        // 2. ASSERT: Check if it redirected correctly
        // (Assuming your first ID is 1)
        $response.assertRedirect('/training-plan/1');

        // 3. ASSERT: Check if the data actually exists in the database
        $this->assertDatabaseHas('training_plans', [
            'position' => 'PG',
            'skill_level' => 'intermediate',
        ]);
    }

    public function test_home_page_loads_successfully()
    {
        $response = $this->get('/');
        $response->assertStatus(200);
        $response->assertSee('Create My Training Plan');
    }
}