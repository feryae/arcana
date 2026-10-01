<?php

use Livewire\Livewire;

it('renders successfully', function () {
    Livewire::test('pages::dashboard.messages.index')
        ->assertStatus(200);
});
