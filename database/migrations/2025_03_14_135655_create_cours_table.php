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
        Schema::create('cours', function (Blueprint $table) {
            $table->id();
            $table->string('titre');
            $table->text('description')->nullable();
            $table->string('short_description')->nullable();
            $table->foreignId('categorie_id')->constrained()->onDelete('cascade')->nullable();
            $table->foreignId('niveau_id')->constrained()->onDelete('cascade')->nullable();
            $table->foreignId('langue_id')->constrained()->onDelete('cascade')->nullable();
            $table->decimal('prix', 10, 2)->nullable();
            $table->decimal('prix_promo', 10, 2)->nullable();
            $table->decimal('taux_reduction', 5, 2)->nullable();
            $table->foreignId('devise_id')->constrained()->onDelete('cascade');
            $table->integer('duree')->nullable();
            $table->integer('nombre_lesson')->nullable();
            $table->tinyInteger('certificat')->default(0);
            $table->tinyInteger('top')->default(0);
            $table->tinyInteger('populaire')->default(1);
            $table->integer('nombre_quizz')->nullable();
            $table->text('objectifs')->nullable();
            $table->string('image')->nullable();
            $table->text('commentaire')->nullable();
            $table->string('date_creation')->nullable();
            $table->string('url_video')->nullable();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->tinyInteger('active')->default(1);
            $table->tinyInteger('etat')->default(0);
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
        Schema::dropIfExists('cours');
    }
};
