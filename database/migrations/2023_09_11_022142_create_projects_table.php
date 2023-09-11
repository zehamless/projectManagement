<?php

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
        Schema::create('projects', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('po');
            $table->text('memo');
            $table->string('so');
            $table->string('label');
            $table->string('location');
            $table->string('project_manager');
            $table->string('sales_executive');
            $table->date('start_date');
            $table->date('end_date');
            $table->decimal('preliminary_cost', 12, 2);
            $table->decimal('po_amount', 12, 2);
            $table->decimal('expense_budget', 12, 2);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('projects');
    }
};
