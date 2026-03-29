<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('repairs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('device_model_id')->constrained()->cascadeOnDelete();
            $table->foreignId('service_type_id')->constrained()->cascadeOnDelete();
            $table->string('slug')->unique(); // Auto: "thay-man-hinh-iphone-15-pro-max"
            $table->decimal('price', 12, 0)->nullable();       // Giá gốc (VND)
            $table->decimal('sale_price', 12, 0)->nullable();   // Giá khuyến mãi
            $table->string('warranty')->nullable();              // "6 tháng", "12 tháng"
            $table->string('repair_time')->nullable();           // "30 phút", "1 giờ"
            $table->text('short_description')->nullable();       // Mô tả ngắn
            $table->longText('content')->nullable();             // Nội dung SEO đầy đủ (HTML)
            $table->string('meta_title')->nullable();
            $table->text('meta_description')->nullable();
            $table->json('faq')->nullable();                     // FAQ structured data
            $table->boolean('is_featured')->default(false);
            $table->boolean('is_active')->default(true);
            $table->integer('sort_order')->default(0);
            $table->timestamps();

            $table->unique(['device_model_id', 'service_type_id']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('repairs');
    }
};
