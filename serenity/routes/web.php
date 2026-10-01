<?php

use Illuminate\Support\Facades\Route;

Route::livewire('/', 'pages::landing')->name('landing');

Route::livewire('/dashboard', 'pages::dashboard/index')->name('dashboard');


Route::livewire('/dashboard/check-in', 'pages::dashboard/check-in/index')->name('dashboard.check-in');
Route::livewire('/dashboard/journey', 'pages::dashboard/journey/index')->name('dashboard.journey');
Route::livewire('/dashboard/therapist', 'pages::dashboard/therapist/index')->name('dashboard.therapist');
Route::livewire('/dashboard/sessions', 'pages::dashboard/sessions/index')->name('dashboard.sessions');
Route::livewire('/dashboard/messages', 'pages::dashboard/messages/index')->name('dashboard.messages');
Route::livewire('/dashboard/rituals', 'pages::dashboard/rituals/index')->name('dashboard.rituals');
Route::livewire('/dashboard/journal', 'pages::dashboard/journal/index')->name('dashboard.journal');
Route::livewire('/dashboard/mood-insights', 'pages::dashboard/mood-insights/index')->name('dashboard.mood-insights');
Route::livewire('/dashboard/wellness-library', 'pages::dashboard/wellness-library/index')->name('dashboard.wellness-library');
Route::livewire('/dashboard/stress-reduction', 'pages::dashboard/stress-reduction/index')->name('dashboard.stress-reduction');