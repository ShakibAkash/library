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
        Schema::table('books', function (Blueprint $table) {
            $table->string('genre')->nullable()->after('publisher');
            $table->integer('pages')->nullable()->after('genre');
            $table->year('year')->nullable()->after('pages');
            $table->string('isbn')->nullable()->after('year');
            $table->decimal('rating', 2, 1)->default(0)->after('isbn');
            $table->string('status')->default('available')->after('rating'); // available, borrowed, completed
            $table->text('notes')->nullable()->after('description');
            $table->text('review')->nullable()->after('notes');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('books', function (Blueprint $table) {
            $table->dropColumn(['genre', 'pages', 'year', 'isbn', 'rating', 'status', 'notes', 'review']);
        });
    }
};
