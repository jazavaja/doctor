<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePlanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('plan', function (Blueprint $table) {
            $table->id();
            $table->string('title_plan', 255);
            $table->string('name_project_manager', 100);
            $table->string('time_project', 50)->nullable();
            $table->date('date_start')->nullable();
            $table->date('date_end')->nullable();
            $table->decimal('amount_contract', 15)->nullable();
            $table->date('date_contract')->nullable();
            $table->string('executive_obligations_summary', 255)->nullable();
            $table->text('names_colleagues')->nullable();
            $table->text('description')->nullable();
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
        Schema::dropIfExists('plan');
    }
}
