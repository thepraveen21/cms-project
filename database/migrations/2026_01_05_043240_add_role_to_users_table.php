<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     * 
     * This migration adds a 'role' column to the users table.
     * The role determines if a user is an admin or regular user.
     */
    public function up(): void
    {
        Schema::table('users', function (Blueprint $table) {
            // Add role column after email column
            // Default value is 'user'
            // Possible values: 'admin' or 'user'
            $table->string('role')->default('user')->after('email');
        });
    }

    /**
     * Reverse the migrations.
     * 
     * This will remove the role column if we rollback the migration.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('role');
        });
    }
};