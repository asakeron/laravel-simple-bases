<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddNameFilesTable extends Migration
{
    private const columnName = 'name';

    public function up(): void
    {
        Schema::table('files', function (Blueprint $table) {
            $table->string(self::columnName)->nullable();
        });
    }

    public function down(): void
    {
        Schema::table('files', function (Blueprint $table) {
            $table->dropColumn(self::columnName);
        });
    }
}
