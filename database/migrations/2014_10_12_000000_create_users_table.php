<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
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
            $table->string('name');
            $table->string('prenom');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('categorie')->nullable();
            $table->text('function');
            $table->string('password');
            $table->string('phone_number');
            $table->string('wilaya');
            $table->string('type_inscription');
            $table->string('state')->default('inactif');
            $table->string('adresse')->nullable();
            $table->string('Rc')->nullable();
            $table->string('Nif')->nullable();
            $table->string('commune');
            $table->string('type_payement');
            $table->float('pos1',18,16)->nullable();
            $table->float('pos2',18,16)->nullable();
            $table->string('Ncompte');
            $table->rememberToken();
            $table->timestamps();
            $table->string('type_compte')->default('simple');
            $table->unsignedInteger('nbr_visite')->default(0);
            $table->timestamp('date_valid')->useCurrent = true;

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
}
