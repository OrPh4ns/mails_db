<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('filter_history', function (Blueprint $table) {
            $table->id();
            $table->integer('count');
            $table->timestamp('created_at')->useCurrent();
        });
    }
};
