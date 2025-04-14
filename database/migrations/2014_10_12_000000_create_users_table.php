<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->string('email')->unique();
            $table->string('avatar')->nullable();
            $table->string('role')->nullable()->default('student');
            $table->tinyInteger('is_admin')->default(0);
            $table->tinyInteger('is_active')->default(1);
            $table->tinyInteger('is_othor')->default(0);
            $table->tinyInteger('approuve_cours')->default(0);
            $table->tinyInteger('premiere_connexion')->default(1);
            $table->string('first_name')->nullable();
            $table->string('last_name')->nullable();
            $table->string('telephone')->nullable();
            $table->date('date_naissance')->nullable();
            $table->string('adresse1')->nullable();
            $table->string('adresse2')->nullable();
            $table->foreignId('specialite_id')->nullable()->constrained('specialites')->onDelete('set null');
            $table->foreignId('pays_id')->nullable()->constrained('pays')->onDelete('set null');
            $table->foreignId('ville_id')->nullable()->constrained('villes')->onDelete('set null');
            $table->text('bio')->nullable();
            $table->string('twitter_link')->nullable();
            $table->string('facebook_link')->nullable();
            $table->string('instagram_link')->nullable();
            $table->string('linkedln_link')->nullable();
            $table->string('youtube_link')->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password')->nullable();
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
};
