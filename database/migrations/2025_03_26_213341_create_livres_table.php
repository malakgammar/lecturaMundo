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
        Schema::create('livres', function (Blueprint $table) { 
            $table->id(); 
            $table->string('nomlivre'); 
            $table->string('nomauteur'); 
            $table->text('description')->nullable(); 
            $table->date('date_pub'); 
            $table->boolean('status')->default(true); 
            $table->foreignId('categorie_id')->constrained()   
                  ->onDelete('restrict')   
                  ->onUpdate('restrict') ;  
     
            $table->timestamps(); 
        }); 
    } 

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('livres');
    }
};
