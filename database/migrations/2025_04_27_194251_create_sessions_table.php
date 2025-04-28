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
         // Check if the table doesn't already exist before creating it
    if (!Schema::hasTable('sessions')) {
        Schema::create('sessions', function (Blueprint $table) {
            $table->string('id')->primary(); // Primary key for session ID
            $table->foreignId('user_id')->nullable()->index(); // User foreign key (nullable)
            $table->string('ip_address', 45)->nullable(); // Store IP address (nullable)
            $table->text('user_agent')->nullable(); // Store user agent (nullable)
            $table->longText('payload'); // Session payload (data)
            $table->integer('last_activity')->index(); // Last activity timestamp, indexed
        });
    }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sessions');
    }
};
