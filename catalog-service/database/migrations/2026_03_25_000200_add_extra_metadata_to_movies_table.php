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
        Schema::table('movies', function (Blueprint $table) {
            $table->unsignedInteger('views_count')->default(0)->after('video_url');
            $table->date('released_at')->nullable()->after('views_count');
            $table->text('tags')->nullable()->after('released_at');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('movies', function (Blueprint $table) {
            $table->dropColumn(['views_count', 'released_at', 'tags']);
        });
    }
};
