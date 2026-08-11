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
    Schema::table('users', function (Blueprint $table) {
        $table->date('tanggal_lahir')->nullable();
        $table->string('gender')->nullable();
        $table->text('alamat')->nullable();
        $table->text('bio')->nullable();
    });
}

public function down(): void
{
    Schema::table('users', function (Blueprint $table) {
        $table->dropColumn(['tanggal_lahir', 'gender', 'alamat', 'bio']);
    });
}
};
