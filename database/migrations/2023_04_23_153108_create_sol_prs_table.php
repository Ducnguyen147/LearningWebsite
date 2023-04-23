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
        Schema::create('sol_prs', function (Blueprint $table) {
            $table->id();

            $table->timestamp("submission_date");
            $table->string("name");
            $table->string("email");
            $table->string("points")->nullable();
            $table->timestamp("evaluation_time")->nullable();
            
            $table->timestamps();

            $table->foreignId('task_pr_id') 
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
        Schema::dropIfExists('sol_prs');
    }
};
