<?php

use App\Models\User;

test('dashboard page renders the custom dashboard view', function () {
    $user = User::factory()->create();

    $response = $this
        ->actingAs($user)
        ->get('/dashboard');

    $response->assertOk();
    $response->assertSee('<h1>Dashboard</h1>', false);
});
