<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Icerik extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contents', function (Blueprint $table) {
            $table->id();
            $table->integer('category_id')->unsigned(); //category tablosunda category id ile ilişki kurulacağından unsignedBigInt girildi
            $table->string('title');
            $table->string('image');
            $table->longText('content');
            $table->integer('hit')->default(0);
            $table->string('slug');
            $table->softDeletes();
            $table->timestamps();
            $table->foreign('category_id')->references('id')->on('categories'); //category_id sütunum categories tablosunda id  ile eşit ve benim yabancı anahtarım .
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('icerik');
    }
}
