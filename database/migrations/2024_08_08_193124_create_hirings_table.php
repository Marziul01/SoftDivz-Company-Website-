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
        Schema::create('hirings', function (Blueprint $table) {
            $table->id();
            $table->string('type');
            $table->integer('pricing_id')->nullable();
            $table->integer('service_id')->nullable();
            $table->string('name');
            $table->string('email');
            $table->integer('whatsapp')->nullable();
            $table->string('project_title')->nullable();
            $table->text('desc')->nullable();
            $table->text('images')->nullable();
            $table->string('demo_link')->nullable();
            $table->string('budget')->nullable();
            $table->tinyInteger('status')->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('hirings');
    }
};
