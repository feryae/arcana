<?php

use Livewire\Livewire;

it('renders successfully', function () {
    Livewire::test('pages::dashboard.stress-reduction.index')
        ->assertStatus(200);
});
