<?php

use App\Enums\ProductStatus;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('e_name');
            $table->string('slug');
            $table->integer('price');
            $table->integer('discount')->default(0);
            $table->integer('count')->default(0);
            $table->integer('max_sell')->default(0);
            $table->integer('viewed')->default(0);
            $table->integer('sold')->default(0);
            $table->string('image');
            $table->text('description');
            $table->unsignedBigInteger('color_id')->nullable();
            $table->unsignedBigInteger('guaranty_id')->nullable();
            $table->softDeletes();
            $table->string('status')->default(ProductStatus::ACTIVE->value);
            $table->foreignId('category_id')->constrained('categories');
            $table->foreignId('brand_id')->constrained('brands');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
