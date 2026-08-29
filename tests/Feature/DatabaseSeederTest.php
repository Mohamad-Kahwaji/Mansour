<?php

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;

uses(RefreshDatabase::class);

test('database seeder can run more than once without duplicating the default user', function () {
    $this->seed();
    $this->seed();

    expect(User::query()->where('email', 'test@example.com')->count())->toBe(1);
});
