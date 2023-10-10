<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('operationals', function (Blueprint $table) {
            $table->decimal('amount', 12, 2)->after('approved_by');
        });
    }

    public function down()
    {
        Schema::table('operationals', function (Blueprint $table) {
            $table->dropColumn('amount');
        });
    }
};
