<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('materials', function (Blueprint $table) {
            $table->uuid('operational_id')->after('id');
            $table->foreign('operational_id')->references('id')->on('operationals')->cascadeOnDelete();
        });
        Schema::table('milestones', function (Blueprint $table) {
            $table->uuid('project_id')->after('id');
            $table->foreign('project_id')->references('id')->on('projects')->cascadeOnDelete();
        });
        Schema::table('customer_contacts', function (Blueprint $table) {
            $table->uuid('customer_id')->after('id');
            $table->foreign('customer_id')->references('id')->on('customers')->cascadeOnDelete();
        });
        Schema::table('projects', function (Blueprint $table) {
            $table->uuid('customer_id')->after('id');
            $table->foreign('customer_id')->references('id')->on('customers')->cascadeOnDelete();
            $table->uuid('customer_contact_id');
            $table->foreign('customer_contact_id')->references('id')->on('customer_contacts')->cascadeOnDelete();
            $table->uuid('project_manager');
            $table->foreign('project_manager')->references('id')->on('users')->cascadeOnDelete();
            $table->uuid('sales_executive');
            $table->foreign('sales_executive')->references('id')->on('users')->cascadeOnDelete();
        });
        Schema::table('operationals', function (Blueprint $table) {
            $table->uuid('project_id')->after('id');
            $table->foreign('project_id')->references('id')->on('projects')->cascadeOnDelete();
            $table->foreignUuid('created_by')->references('id')->on('users');
            $table->uuid('approved_by')->nullable();
            $table->foreign('approved_by')->references('id')->on('users');
        });
        Schema::table('production_cost', function (Blueprint $table) {
            $table->uuid('project_id')->after('id');
            $table->foreign('project_id')->references('id')->on('projects')->cascadeOnDelete();
        });
        Schema::table('operational_expense', function (Blueprint $table) {
            $table->uuid('operational_id')->after('id');
            $table->foreign('operational_id')->references('id')->on('operationals')->cascadeOnDelete();
        });
        Schema::table('operational_agenda', function (Blueprint $table) {
            $table->uuid('operational_id')->after('id');
            $table->foreign('operational_id')->references('id')->on('operationals')->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('materials', function (Blueprint $table): void {
            $table->dropForeign(['operational_id']);
        });
        Schema::table('milestones', function (Blueprint $table): void {
            $table->dropForeign(['project_id']);
        });
        Schema::table('customer_contacts', function (Blueprint $table): void {
            $table->dropForeign(['customerContact_id']);
        });
        Schema::table('projects', function (Blueprint $table): void {
            $table->dropForeign(['customer_id']);
        });
        Schema::table('operationals', function (Blueprint $table): void {
            $table->dropForeign(['project_id']);
        });
        Schema::table('production_cost', function (Blueprint $table): void {
            $table->dropForeign(['project_id']);
        });
        Schema::table('operational_expense', function (Blueprint $table): void {
            $table->dropForeign(['operational_id']);
        });
        Schema::table('operational_agenda', function (Blueprint $table): void {
            $table->dropForeign(['operational_id']);
        });
        Schema::table('operational_team', function (Blueprint $table): void {
            $table->dropForeign(['operational_id']);
            $table->dropForeign(['technicianTeam_id']);
        });
    }
};
