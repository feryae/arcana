<?php

use Livewire\Livewire;

it('renders successfully', function () {
    Livewire::test('pages::dashboard.therapist.index')
        ->assertStatus(200);
});
