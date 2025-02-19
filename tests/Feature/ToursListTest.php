<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\Tour;
use App\Models\Travel;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ToursListTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic feature test example.
     */

    public function test_tours_list_shows_only_travels_with_correct_id(): void
    {
        $travel = Travel::factory()->create();
        $tour =  Tour::factory()->create(['travel_id' => $travel->id]);

        $response = $this->get('/api/v1/travels/'.$travel->slug.'/tours');

        $response->assertStatus(200);
        $response->assertJsonCount(1, 'data');
        $response->assertJsonFragment(['id' => $tour->id]);
    }

    public function test_tours_list_shows_correct_prices(): void
    {
        $travel = Travel::factory()->create();
        $tour =  Tour::factory()->create([
            'travel_id' => $travel->id,
            'price' => 12.34,
        ]);

        $response = $this->get('/api/v1/travels/'.$travel->slug.'/tours');

        $response->assertStatus(200);
        $response->assertJsonFragment(['price' => '12.34']);
    }

    public function test_tours_list_return_paginated_data_correctly(): void
    {
        $travel = Travel::factory()->create();
        $tour =  Tour::factory(16)->create([
            'travel_id' => $travel->id,
        ]);
        
        $response = $this->get('/api/v1/travels/'.$travel->slug.'/tours');

        $response->assertStatus(200);
        $response->assertJsonCount(15, 'data');
        $response->assertJsonPath('meta.last_page', 2);
    }
}
