<?php

use Livewire\Component;

new class extends Component {
    public string $view = 'Menus';
    public string $selectedMenu = 'Tavern Menu';
    public string $selectedCategory = 'Main Courses';
    public string $search = '';

    public function setView(string $view): void
    {
        $this->view = $view;
    }

    public function selectMenu(string $menu): void
    {
        $this->selectedMenu = $menu;
    }

    public function selectCategory(string $category): void
    {
        $this->selectedCategory = $category;
    }

    public function createMenu(): void
    {
        // Create menu logic.
    }

    public function createItem(): void
    {
        // Create menu item logic.
    }

    public function toggleAvailability(int $item): void
    {
        // Toggle item availability.
    }
};