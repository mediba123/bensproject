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
        Schema::create('womenclothings', function (Blueprint $table) {
            
                $table->id();
                $table->string('categories', 8)->unique();
                $table->enum('category',['Women clothing', 'Men clothing','Slippers', 
                'Shoes', 'Bags', 'other accessories'])->default('Women clothing');
                $table->string('colour', 30)->nullable();
                $table->decimal('price', 6, 2)->default(9.99);
                $table->string('description', 256)->nullable();
                $table->string('image', 256)->nullable();
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
        Schema::dropIfExists('womenclothings');
    }
};
