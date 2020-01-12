<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            /* Old Code Start */
            /* $table->bigIncrements('id');
            $table->timestamps(); */
            /* Old Code Ends */

            /* New Code Start */
            $table->increments("id");
            $table->string("name", 100);
            $table->text("description")->nullable();
            $table->float("price");
            $table->timestamps();

            /* Created & Updated Datatime Columns */

            /* long way */
            /* $table->dateTime("created_at"); */
            /* $table->dateTime("updated_at"); */

            /* Short way */
            /* $table->timestamps(); */


            /* New Code Ends */
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
}
