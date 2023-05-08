<?php

declare(strict_types=1);

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->string('name')->nullable();
            $table->timestamps();
        });

        Schema::create('posts_auto_incrementing', function (Blueprint $table) {
            $table->id();
            $table->string('post_id')->unique();
            $table->string('name')->nullable();
            $table->timestamps();
        });

        Schema::create('posts_with_uuid', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('post_id')->unique();
            $table->timestamps();
        });

        Schema::create('posts_with_multi_keys', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->string('post_id')->unique();
            $table->timestamps();
        });
    }
};
