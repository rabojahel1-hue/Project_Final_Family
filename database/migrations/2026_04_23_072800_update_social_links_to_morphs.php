<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('social_links', function (Blueprint $table) {
            $table->dropUnique('social_links_entity_type_entity_id_platform_unique');
            $table->dropColumn(['entity_type', 'entity_id']);
            $table->morphs('linkable');
        });
    }

    public function down(): void
    {
        Schema::table('social_links', function (Blueprint $table) {

            $table->string('entity_type');
            $table->unsignedBigInteger('entity_id');
            $table->dropMorphs('linkable');
        });
    }
};
