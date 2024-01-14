<?php

use App\Enums\UserStatus;
use App\Enums\UserType;
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
            $table->string('password');
            $table->rememberToken();
            $table->enum('user_type', [UserType::ADMIN->value, UserType::USER->value])->
            default(UserType::USER->value);
            $table->enum('user_status', [UserStatus::ACTIVE->value, UserStatus::DELETED->value])->
            default(UserStatus::ACTIVE->value);
            $table->integer('average_score')->nullable();
            $table->integer('highest_score')->nullable();
            $table->integer('highest_score_game_id')->nullable();
            $table->dateTime('highest_score_date')->nullable();
            $table->timestamps();
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
