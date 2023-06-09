<?php

namespace Database\Seeders;

use App\Models\SubjectPr;
use App\Models\TaskPr;
use App\Models\SolPr;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SubjectPrSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('subject_prs')->truncate();
        DB::table('task_prs')->truncate();
        DB::table('sol_prs')->truncate();

        $users=\App\Models\User::all();
        $users->each(function ($user){
            SubjectPr::factory(10)
            ->for($user)
            ->has(
                TaskPr::factory()
                    ->count(3)
                    ->has(
                        SolPr::factory()->count(3),
                        'solutions'
                    ),
                'tasks'
            )
            ->create();
        });
    }
}
