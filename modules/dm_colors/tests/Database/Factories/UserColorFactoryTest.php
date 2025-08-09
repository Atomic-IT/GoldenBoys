<?php

if (!defined('PEST_RUNNING')) {
    return;
}

use App\Models\UserColor;

beforeEach(function (): void {
    $this->createUsers();
});

it('can create record', function (): void {
    $color = UserColor::factory()->create();

    $this->assertDatabaseCount('user_colors', 1);
    $this->assertDatabaseHas('user_colors', ['id' => $color->id]);
});

it('can create multiple records', function (): void {
    $colors = UserColor::factory()->count(3)->create();

    $this->assertDatabaseCount('user_colors', 3);
    foreach ($colors as $color) {
        $this->assertDatabaseHas('user_colors', ['id' => $color->id]);
    }
});

it("can't create record", function (): void {
    try {
        UserColor::factory()->create(['user_id' => 'user_id']);
    } catch (Exception $e) {
        $this->assertStringContainsString('Incorrect integer value', $e->getMessage());

        return;
    }

    $this->fail('Expected exception not thrown.');
})->skip(env('DB_DATABASE') === 'database/database.sqlite', 'temporarily unavailable'); // unavailable for git workflow tests

it("can't create multiple records", function (): void {
    try {
        UserColor::factory()->count(2)->create(['user_id' => 'user_id']);
    } catch (Exception $e) {
        $this->assertStringContainsString('Incorrect integer value', $e->getMessage());

        return;
    }

    $this->fail('Expected exception not thrown.');
})->skip(env('DB_DATABASE') === 'database/database.sqlite', 'temporarily unavailable'); // unavailable for git workflow tests
