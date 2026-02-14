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
        Schema::table('services', function (Blueprint $table) {
            $table->string('hero_title')->nullable()->after('title');
            $table->text('hero_subtitle')->nullable()->after('hero_title');
            $table->string('hero_image')->nullable()->after('hero_subtitle');

            $table->longText('description')->nullable()->after('hero_image');
        });
    }

    public function down(): void
    {
        Schema::table('services', function (Blueprint $table) {
            $table->dropColumn(['hero_title','hero_subtitle','hero_image','description']);
        });
    }
};
