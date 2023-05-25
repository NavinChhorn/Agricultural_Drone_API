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
        Schema::create('drones', function (Blueprint $table) {
            $table->id();
            $table->string('type');
            $table->string('battery');
            $table->foreignId('instruction_id')->constrained(table:"instructions")->onDelete("cascade")->onUpdate("cascade");
            $table->foreignId('plan_id')->constrained(table:"plans")->onDelete("cascade")->onUpdate("cascade");
            $table->foreignId('location_id')->constrained(table:"locations")->onDelete("cascade")->onUpdate("cascade");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('drones');
    }
};
