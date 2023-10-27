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
        Schema::create('lead_brevo_lists', function (Blueprint $table) {
            $table->id();
        
            $table->unsignedBigInteger('lead_id');
            $table->foreign('lead_id')
                ->references('id')
                ->on('leads')
                ->onDelete('cascade');
            
            $table->unsignedBigInteger('brevo_list_id');
            $table->foreign('brevo_list_id')
                ->references('id')
                ->on('brevo_lists')
                ->onDelete('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('lead_brevo_lists');
    }
};
