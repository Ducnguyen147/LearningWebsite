<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('task_prs', function (Blueprint $table) {
            $table->id();

            $table->string("name");
            $table->string("description")->nullable();
            $table->string("points")->nullable();
            
            $table->softDeletes();
            $table->timestamps();

            $table->foreignId('subject_pr_id') 
                    ->constrained()
                    ->onUpdate('cascade')
                    ->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('task_prs', function (Blueprint $table) {
            $table->dropSoftDeletes();
        });
        Schema::dropIfExists('task_prs');
    }
};
