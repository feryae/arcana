<?php

use Livewire\Livewire;

it('renders successfully', function () {
    Livewire::test('pages::dashboard.mood-insights.index')
        ->assertStatus(200);
});
