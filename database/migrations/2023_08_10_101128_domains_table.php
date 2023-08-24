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
        Schema::create('domains', function (Blueprint $table) {
            $table->id();
            $table->string('type');
            $table->integer('count')->default(0);
            $table->boolean('valid')->default(true);
            $table->string('country')->default(0);
            $table->timestamp('created_at')->useCurrent();
        });
    }
};
