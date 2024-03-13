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
        Schema::create('waits', function (Blueprint $table) {
            $table->id();
            $table->String('ticketid');
            $table->String('userid');
            $table->bigInteger('quantity');
            $table->String('ticketname');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('waits');
    }
};
