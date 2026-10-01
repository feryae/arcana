<?php

use Livewire\Livewire;

it('renders successfully', function () {
    Livewire::test('pages::dashboard.rituals.index')
        ->assertStatus(200);
});
