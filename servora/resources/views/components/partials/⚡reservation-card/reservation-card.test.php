<?php

use Livewire\Livewire;

it('renders successfully', function () {
    Livewire::test('partials.reservation-card')
        ->assertStatus(200);
});
