<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        DB::table('sol_prs')
        ->update([
            'description' => DB::raw('(SELECT task_prs.description FROM task_prs WHERE sol_prs.task_pr_id = task_prs.id)')
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('sol_prs', function (Blueprint $table) {
            $table->dropColumn('description');
        });
    }
};
