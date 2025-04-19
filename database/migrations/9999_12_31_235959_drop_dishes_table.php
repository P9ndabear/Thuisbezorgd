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
        Schema::dropIfExists('dishes');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Optional: Recreate table if rolling back?
        // Or leave empty if you don't need rollback for this.
    }
}; 