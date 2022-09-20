<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\Task;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tasks', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->longText('description',150);
            $table->date('end_date')->default('2022-09-10');
            $table->foreignId('user_id')->references('id')->on('users');
            //0: nincs felvéve, 1:folyamatban, 2:kész, 3:tesztelés alatt, 4:elfogadva
            $table->integer('status')->default(0);
            $table->timestamps();
        });

        Task::create(['title' => 'Adatbázis tervezése', 'description' => 'Raktár adatbázis megtervezése','user_id'=>2,'status'=>1]);
        
        Task::create(['title' => 'Végpontok írása', 'description' => 'Felhasználók listázása','end_date'=>'2022-09-21','user_id'=>1]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tasks');
    }
};
