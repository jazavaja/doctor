<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProposal extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('proposal', function (Blueprint $table) {
            $table->id();
            $table->string('tracking_code', 50);
            $table->string('proposal_code', 50);
            $table->unsignedBigInteger('system_id')->nullable();
            $table->text('title_proposal');
            $table->unsignedBigInteger('position_id')->nullable();
            $table->text('researcher');
            $table->text('summary_result');
            $table->text('result');
            $table->date('date_register')->nullable();
            $table->timestamps();

            $table->foreign('system_id')->references('id')->on('systems');
            $table->foreign('position_id')->references('id')->on('positions');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('proposal');
    }
}
