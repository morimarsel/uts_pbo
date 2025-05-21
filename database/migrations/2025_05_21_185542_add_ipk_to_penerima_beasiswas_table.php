<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('penerima_beasiswas', function (Blueprint $table) {
            $table->decimal('ipk', 3, 2)->nullable()->after('nim');
        });
    }

    public function down(): void
    {
        Schema::table('penerima_beasiswas', function (Blueprint $table) {
            $table->dropColumn('ipk');
        });
    }
};
