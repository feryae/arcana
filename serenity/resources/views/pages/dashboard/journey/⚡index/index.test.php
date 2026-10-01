<?php

use Livewire\Livewire;

it('renders successfully', function () {
    Livewire::test('pages::dashboard.journey.index')
        ->assertStatus(200);
});
