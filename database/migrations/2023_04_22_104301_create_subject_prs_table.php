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
        Schema::create('subject_prs', function (Blueprint $table) {
            $table->id();
            
            $table->string("title");
            $table->string("description")->nullable();
            $table->string("code");
            $table->string("credit");

            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('subject_prs', function (Blueprint $table) {
            $table->dropSoftDeletes();
        });
        Schema::dropIfExists('subject_prs');
    }
};
