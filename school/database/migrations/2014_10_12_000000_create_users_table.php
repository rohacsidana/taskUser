<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\User;
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
            
            $table->id(); //auto-increment, primary key, biginteger
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamps();
        });

        User::create(['name' => 'Dana', 'email' => 'rohacsi.dana@gmail.com']);
        User::create(['name' => 'Sonia', 'email' => 'levenkoen@gmail.com']);
    
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
