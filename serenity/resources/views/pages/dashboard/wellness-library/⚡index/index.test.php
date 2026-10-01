<?php

use Livewire\Livewire;

it('renders successfully', function () {
    Livewire::test('pages::dashboard.wellness-library.index')
        ->assertStatus(200);
});
