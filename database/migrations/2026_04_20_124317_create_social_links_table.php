<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(): void
    {
        Schema::create('social_links', function (Blueprint $table) {
          
        $table->id();
        $table->string('entity_type');
        $table->unsignedBigInteger('entity_id');
        $table->string('platform', 50);
        $table->string('url', 500);
        $table->timestamps();
        $table->unique(['entity_type', 'entity_id', 'platform']);
        $table->index(['entity_type', 'entity_id']);
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('social_links');
    }
};
