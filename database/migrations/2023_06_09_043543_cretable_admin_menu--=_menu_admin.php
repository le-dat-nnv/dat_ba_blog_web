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
        Schema::create('fs_menu_admin', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->integer('is_published');
            $table->string('slug');
            $table->integer('parent_id');
            $table->integer('order');
            $table->text('icon_class');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('fs_news');
    }
};
