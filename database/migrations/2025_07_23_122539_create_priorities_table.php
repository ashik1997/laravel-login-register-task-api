<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('priorities', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique();
            $table->string('description');

            $table->timestamps();
        });

        DB::table('priorities')->insert([
            ['name' => 'Low', 'description' => 'Low priority tasks', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Medium', 'description' => 'Medium priority tasks', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'High', 'description' => 'High priority tasks', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Critical', 'description' => 'Critical priority tasks', 'created_at' => now(), 'updated_at' => now() ],
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('priorities');
    }
};
