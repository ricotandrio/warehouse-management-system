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
        Schema::create('logs', function (Blueprint $table) {
            $table->id()->autoIncrement();
            $table->string('entity_name');
            $table->uuid('entity_uuid');
            $table->enum('action_is', ['CREATE', 'UPDATE', 'DELETE']);
            $table->uuid('action_by');
            $table->timestampTz('action_at');
            $table->string('values_before')->nullable();
            $table->string('values_after')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('logs');
    }
};
