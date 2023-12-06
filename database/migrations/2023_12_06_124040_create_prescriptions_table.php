<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePrescriptionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('prescriptions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('doctor_id')->nullable()->constrained('doctors')->onDelete('set null');
            $table->foreignId('patient_id')->nullable()->constrained('users')->onDelete('set null');
            $table->string('invoice')->nullable();
            $table->text('symptoms')->nullable();
            $table->text('Diagnosis')->nullable();
            $table->dateTime('date');
            $table->text('note')->nullable();
            $table->string('reference')->nullable();
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
        Schema::dropIfExists('prescriptions');
    }
}
