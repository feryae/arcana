<?php

namespace Database\Seeders;

use App\Models\MenuCategory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class MenuSeeder extends Seeder
{
    public function run(): void
    {
        $categories = [
            [
                'name' => 'Hearth',
                'description' => 'Roasted meats and dishes prepared over the great hearth.',
                'icon' => 'flame',
                'sort_order' => 1,

                'items' => [
                    [
                        'name' => 'Dragonfire Roast',
                        'description' => 'Ember-drake ribs, charred root vegetables, and fireberry glaze.',
                        'price' => 18,
                        'icon' => 'flame',
                    ],
                    [
                        'name' => "Hunter's Feast",
                        'description' => 'Roasted venison, wild mushrooms, buttered potatoes and gravy.',
                        'price' => 14,
                        'icon' => 'meat',
                    ],
                ],
            ],

            [
                'name' => 'Cauldron',
                'description' => 'Hearty soups and slow-cooked stews from the kitchen cauldron.',
                'icon' => 'soup',
                'sort_order' => 2,

                'items' => [
                    [
                        'name' => 'Moonroot Stew',
                        'description' => 'Moonroot, mountain carrots, onions, and slow-cooked beef.',
                        'price' => 9,
                        'icon' => 'soup',
                    ],
                ],
            ],

            [
                'name' => 'Cellar',
                'description' => 'A selection of ales, wines and other drinks from the cellar.',
                'icon' => 'glass',
                'sort_order' => 3,

                'items' => [
                    [
                        'name' => 'Dwarven Black Ale',
                        'description' => 'Dark, rich ale with roasted malt and a warm finish.',
                        'price' => 4,
                        'icon' => 'beer',
                    ],
                    [
                        'name' => 'Elven Moonwine',
                        'description' => 'Delicate pale wine with floral notes and a soft finish.',
                        'price' => 7,
                        'icon' => 'glass-full',
                    ],
                ],
            ],

            [
                'name' => 'Desserts',
                'description' => 'Sweet treats from the royal kitchens.',
                'icon' => 'cake',
                'sort_order' => 4,

                'items' => [
                    [
                        'name' => 'Mooncream Tart',
                        'description' => 'Mooncream custard, honeyed pastry, and wild berries.',
                        'price' => 6,
                        'icon' => 'cake',
                    ],
                ],
            ],
        ];

        foreach ($categories as $categoryData) {
            $items = $categoryData['items'];

            unset($categoryData['items']);

            $category = MenuCategory::create([
                ...$categoryData,
                'slug' => Str::slug($categoryData['name']),
            ]);

            foreach ($items as $index => $itemData) {
                $category->items()->create([
                    ...$itemData,
                    'slug' => Str::slug($itemData['name']),
                    'sort_order' => $index + 1,
                    'is_available' => true,
                ]);
            }
        }
    }
}