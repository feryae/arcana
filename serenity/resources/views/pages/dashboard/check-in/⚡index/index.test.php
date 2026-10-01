<?php

use Livewire\Livewire;

it('renders successfully', function () {
    Livewire::test('pages::dashboard.check-in.index')
        ->assertStatus(200);
});
