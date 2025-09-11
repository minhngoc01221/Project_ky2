<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('import_export', function (Blueprint $table) {
            $table->id();
            $table->enum('type', ['import', 'export']);
            $table->unsignedBigInteger('product_id');
            $table->integer('quantity');
            $table->timestamp('date')->useCurrent();
            $table->timestamps();

            // Khóa ngoại
            $table->foreign('product_id')
                  ->references('id')
                  ->on('products')
                  ->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('import_export');
    }
};
