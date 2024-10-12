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
        Schema::create("genres", function (Blueprint $table) {
            $table->id("id");
            $table->string("name");
        });

        Schema::create("developers", function (Blueprint $table) {
            $table->id("id");
            $table->string("name");
        });

        Schema::create("games", function (Blueprint $table) {
            $table->id("id");
            $table->string("name");
            $table->bigInteger("developer_id");

            $table->foreign("developer_id")->references("id")->on("developers")->onDelete("cascade");
        });

        Schema::create("games_to_genres", function (Blueprint $table) {
            $table->bigInteger("game_id");
            $table->bigInteger("genre_id");

            $table->primary(["game_id", "genre_id"]);

            $table->foreign("game_id")->references("id")->on("games")->onDelete("cascade");
            $table->foreign("genre_id")->references("id")->on("genres")->onDelete("cascade");
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::drop("games_to_genres");
        Schema::drop("games");
        Schema::drop("developers");
        Schema::drop("genres");
    }
};
