<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('personal_pages', function (Blueprint $table) {
            $table->id();
            $table->string('name')->default('');
            $table->string('headline')->default('');
            $table->text('hero_description')->nullable();
            $table->string('hero_label')->nullable();
            $table->string('photo_path')->nullable();
            $table->string('about_title')->default('Обо мне');
            $table->text('about_text')->nullable();
            $table->string('phone')->nullable();
            $table->string('telegram')->nullable();
            $table->string('email')->nullable();
            $table->json('skills')->nullable();
            $table->json('experience')->nullable();
            $table->json('projects')->nullable();
            $table->string('contact_title')->default('Обсудим ваш проект');
            $table->text('contact_text')->nullable();
            $table->string('meta_title')->nullable();
            $table->text('meta_description')->nullable();
            $table->boolean('is_published')->default(false);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('personal_pages');
    }
};
