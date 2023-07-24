<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up() :void
    {
        Schema::create('thesis', function (Blueprint $table) {
            $table->id();
            $table->string('creatorName');
            $table->string('titleThesis');
            $table->unsignedBigInteger('guideMasterUserId')->nullable();
            $table->unsignedBigInteger('consultantMasterUserId')->nullable();
            $table->unsignedBigInteger('category_id')->nullable();

            $table->date('dateOfRegister')->nullable();
            $table->date('DefenseDate')->nullable();
            $table->string('type')->nullable();
            $table->timestamps();

            // Create a foreign key constraint with cascade on delete
            $table->foreign('category_id')
                ->references('id')
                ->on('categories')
                ->onDelete('cascade');

            $table->foreign('guideMasterUserId')
                ->references('id')
                ->on('users')
                ->onDelete('cascade');

            $table->foreign('consultantMasterUserId')
                ->references('id')
                ->on('users')
                ->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('thesis');
    }

};
