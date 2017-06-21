<?php

use App\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateProductsTable extends Migration
{


    public function up()
    {
        $this->schema->create('products', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('slug');
            $table->text('description');
            $table->string('image');
            $table->float('price');
            $table->unsignedInteger('stock');

            $table->timestamps();
        });
    
    
    }
    
    public function down()
    {
        $this->schema->dropIfExists('products');
    }
    
}
