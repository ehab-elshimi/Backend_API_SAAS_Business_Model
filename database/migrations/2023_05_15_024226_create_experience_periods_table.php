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
        Schema::create('experience_periods', function (Blueprint $table) {
            $table->id();
            $table->string('job_title');
            $table->date('from_date');
            $table->date('to_date');
            $table->enum('job_distance_type', ['remote', 'onsite']);
            $table->enum('job_time_type', ['Full Time ', 'Part Time', 'Contract']);
            $table->text('desc');
            $table->foreignId('company_id')
            ->constrained('companies')
            ->onUpdate('cascade')
            ->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('experience_periods');
    }
};