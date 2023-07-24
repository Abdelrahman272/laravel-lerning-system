<?php

namespace Database\Seeders;

use App\Models\Level;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LevelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('levels')->delete();
        $levels = [
            'الصف الاول الثانوي',
            'الصف الثاني الثانوي',
            'الصف الثالث الثانوي',
        ];

        foreach ($levels as $level) {
            Level::create(['name' => $level]);
        }
    }
}
