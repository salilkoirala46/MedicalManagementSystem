<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Clinic;

class ClinicControllerTest extends TestCase
{
    use RefreshDatabase; // Refreshes the database before each test

    /**
     * Test the index method of ClinicController.
     *
     * @return void
     */
    public function testIndex()
    {
        // Create some test clinics in the database
        $clinics = Clinic::factory()->count(3)->create();
        $response = $this->get('/clinics');
        $response->assertStatus(200);
    }

    /**
     * Test the getClinicAllDoctors method of ClinicController.
     *
     * @return void
     */
}