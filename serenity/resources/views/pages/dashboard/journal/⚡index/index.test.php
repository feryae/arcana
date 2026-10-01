<?php

use Livewire\Livewire;

it('renders successfully', function () {
    Livewire::test('pages::dashboard.journal.index')
        ->assertStatus(200);
});
