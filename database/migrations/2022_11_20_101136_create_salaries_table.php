<?php

use App\Models\Salary;
use App\Models\User;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSalariesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('salaries', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(User::class);
            $table->string('basic_salary');
            $table->string('position_salary');
            $table->string('overtime_salary');
            $table->string('piece');
            $table->string('total_salary');
            $table->string('month');
            $table->year('year');
            $table->timestamps();
        });

        // Schema::create('users_has_salary', function (Blueprint $table) {
        //     $table->foreignIdFor(Salary::class)->references('id')->on('salaries')->onDelete('cascade');
        //     $table->foreignIdFor(User::class)->references('id')->on('users')->onDelete('cascade');;
        // });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('salaries');
    }
}
