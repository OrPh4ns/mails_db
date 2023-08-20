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
        Schema::create('emails', function (Blueprint $table) {
            $table->id();
            $table->string('email')->unique()->index();
            $table->integer('found')->default(0);
            $table->boolean('valid')->default(true);
            $table->timestamp('created_at')->useCurrent();
        });
    }
};
