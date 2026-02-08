<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Disability;

class DisabilitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $disabilities = [
            ['name' => 'التوحد', 'description' => 'اضطراب طيف التوحد'],
            ['name' => 'الذهنية', 'description' => 'الإعاقة الذهنية'],
            ['name' => 'البصرية', 'description' => 'الإعاقة البصرية'],
            ['name' => 'السمعية', 'description' => 'الإعاقة السمعية'],
            ['name' => 'قصار القامة', 'description' => 'قصر القامة'],
            ['name' => 'الحركية', 'description' => 'الإعاقة الحركية'],
            ['name' => 'نقص في احد الاطراف', 'description' => 'نقص أو فقدان أحد الأطراف'],
        ];

        foreach ($disabilities as $disability) {
            Disability::create($disability);
        }
    }
}
