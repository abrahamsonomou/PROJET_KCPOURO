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
        Schema::create('parametres', function (Blueprint $table) {
            $table->id();
            $table->string('site_name')->nullable();
            $table->string('description')->nullable();
            $table->string('telephone')->nullable();
            $table->string('email')->nullable();
            $table->string('email2')->nullable();
            $table->string('copyright')->nullable();
            $table->string('copyright_year')->nullable();
            $table->string('company_name')->nullable();
            $table->string('logo')->nullable();
            $table->string('logo_footer')->nullable();
            $table->string('favicon')->nullable();
            $table->string('default_avatar_user')->nullable();
            $table->string('default_avatar_student')->nullable();
            $table->string('default_avatar_instructor')->nullable();
            $table->string('twitter_link')->nullable();
            $table->string('facebook_link')->nullable();
            $table->string('instagram_link')->nullable();
            $table->string('linkedin_link')->nullable();
            $table->string('youtube_link')->nullable();
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
        Schema::dropIfExists('parametres');
    }
};
