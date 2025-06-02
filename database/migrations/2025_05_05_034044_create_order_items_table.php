<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
// database/migrations/xxxx_xx_xx_create_order_items_table.php

public function up()
{
    Schema::create('order_items', function (Blueprint $table) {
        $table->id();
        $table->foreignId('order_id')->constrained('orders')->onDelete('cascade');
        $table->foreignId('menu_id')->constrained('menus');
        $table->integer('quantity');
        $table->decimal('price', 10, 2);
        $table->text('note')->nullable();
        $table->timestamps();
    });
}

public function down()
{
    Schema::dropIfExists('order_items');
}
};
