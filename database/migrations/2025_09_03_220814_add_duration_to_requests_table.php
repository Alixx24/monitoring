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
        Schema::table('requests', function (Blueprint $table) {
            $table->integer('duration')->nullable()->after('email'); // ستون duration رو اضافه کن، می‌تونی محل قرارگیری رو هم تعیین کنی
        });
    }

    public function down()
    {
        Schema::table('requests', function (Blueprint $table) {
            $table->dropColumn('duration'); // اگه خواستی برگردونی این ستون رو حذف می‌کنه
        });
    }
};
