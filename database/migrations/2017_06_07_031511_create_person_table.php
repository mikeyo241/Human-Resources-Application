<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePersonTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //

      Schema::create('PERSONS', function (Blueprint $table) {

        $table->increments('PER_ID');
        $table->string('PER_FNAME');
        $table->string('PER_LNAME');
        $table->integer('PER_AGE');
        $table->string('PER_SEX', 6);
        $table->timestamp('created_at')->useCurrent();
        $table->timestamp('updated_at')->default(DB::raw('CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP'));
        $table->boolean('PER_DEL')->default(0);  //  This is used to soft delete the person form the database.
      });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
