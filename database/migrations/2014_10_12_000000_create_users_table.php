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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password', 255)->nullable();
            $table->rememberToken();
            $table->timestamps();

            // Campos específicos do JWT (opcional)
            $table->string('jwt_token')->nullable();
            $table->string('jwt_refresh_token')->nullable();
            $table->timestamp('jwt_expires_at')->nullable();

            // Campos adicionais (opcional)
            // ...
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
