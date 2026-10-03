<?php

use Livewire\Livewire;

it('renders successfully', function () {
    Livewire::test('modifier-picker')
        ->assertStatus(200);
});
