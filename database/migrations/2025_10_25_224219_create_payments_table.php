<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
   public function up()
    {
        Schema::create('payments', function (Blueprint $table) {
            $table->id();

            // اگر در پروژه کاربر دارید:
            $table->unsignedBigInteger('user_id')->nullable()->index();

            // ارتباط با سفارش (اختیاری)
            $table->unsignedBigInteger('order_id')->nullable()->index();

            // شناسه تراکنش ارائه‌شده توسط درگاه
            $table->string('transaction_id')->nullable()->index();

            // مبلغ بر حسب ریال (int بزرگ)
            $table->unsignedBigInteger('amount');

            // واحد پول (R: Rial, T: Toman) یا ISO
            $table->string('currency', 5)->default('R');

            // نام درگاه مانند zarinpal, mellat
            $table->string('driver', 50)->nullable()->index();

            // وضعیت تراکنش: pending, paid, failed, refunded, cancelled
            $table->string('status', 30)->default('pending')->index();

            // داده‌های اضافی درگاه (JSON خام)
            $table->json('raw_response')->nullable();

            // اطلاعات کارت (به صورت امن — فقط نگه‌داشتن بخشی از شماره)
            $table->string('card_holder')->nullable();
            $table->string('card_pan', 30)->nullable(); // مثلا **** **** 1234

            // زمان پرداخت (اگر موفق)
            $table->timestamp('paid_at')->nullable();

            $table->timestamps();

            // اگر جدول users/order در پروژه وجود دارد، می‌توانید foreign key اضافه کنید:
            // $table->foreign('user_id')->references('id')->on('users')->onDelete('set null');
            // $table->foreign('order_id')->references('id')->on('orders')->onDelete('set null');
        });
    }
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payments');
    }
};
