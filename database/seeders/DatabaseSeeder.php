<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Referency;

class DatabaseSeeder extends Seeder
{
    const PARENTS_AMOUNT = 5;
    const CHILDREN_MIN_AMOUNT = 1;
    const CHILDREN_MAX_AMOUNT = 10;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        Referency::factory(self::PARENTS_AMOUNT)->create()
                ->each(function (Referency $referency) {
                    Referency::factory(rand(self::CHILDREN_MIN_AMOUNT, self::CHILDREN_MAX_AMOUNT))
                            ->create(['parent_id' => $referency->id])->each(function (Referency $child) use ($referency) {
                                Referency::factory(rand(self::CHILDREN_MIN_AMOUNT, self::CHILDREN_MAX_AMOUNT))
                                        ->create(['parent_id' => fake()->randomElement([$referency->id, $child->id])]);
                            });
                });
    }
}
