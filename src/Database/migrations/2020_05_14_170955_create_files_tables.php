<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFilesTables extends Migration
{
    public const tableName = 'files';

    public function up(): void
    {
        Schema::create(self::tableName, function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->uuid('uuid');

            $table->string('file');
            $table->string('extension');
            $table->unsignedBigInteger('reference_id');
            $table->string('reference');

            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists(self::tableName);
    }
}
