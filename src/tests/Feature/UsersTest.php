<?php

use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Foundation\Testing\RefreshDatabase;

uses(RefreshDatabase::class);

it('returns a list of users', function () {
    // Create some users
    $user1 = User::factory()->create();
    $user2 = User::factory()->create();

    // Send GET request to /users
    $response = $this->getJson('/users');

    // Assert the response
    $response->assertStatus(200);
    $response->assertJsonFragment([
        'id' => $user1->id,
        'name' => $user1->name,
        'email' => $user1->email,
    ]);
    $response->assertJsonFragment([
        'id' => $user2->id,
        'name' => $user2->name,
        'email' => $user2->email,
    ]);
});


it('disables a user account', function () {
    // Create a user
    $user = User::factory()->create(['enabled' => true]);

    // Send a POST request to disable the user
    $response = $this->postJson("/users/disable/{$user->id}");

    // Assert the user is now disabled
    $response->assertStatus(200);
    $this->assertDatabaseHas('users', [
        'id' => $user->id,
        'enabled' => false,
    ]);
});

it('enables a user account', function () {
    // Create a user
    $user = User::factory()->create(['enabled' => false]);

    // Send a POST request to enable the user
    $response = $this->postJson("/users/enable/{$user->id}");

    // Assert the user is now enabled
    $response->assertStatus(200);
    $this->assertDatabaseHas('users', [
        'id' => $user->id,
        'enabled' => true,
    ]);
});

