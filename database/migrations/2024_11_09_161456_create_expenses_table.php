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
        //This is to create the expenses table
        //Blueprint is a way to define the structure of the table
        // $table is a variable that is used to define the structure of the table. 
        Schema::create('expenses', function (Blueprint $table){
            $table -> id();
            $table -> decimal('amount',10,2);
            $table -> string('description');
            $table -> enum('category',['food','transport','utilities','entertainment','other']);
            $table -> date('expense_date');
            $table -> enum('payment_method',['cash','card','bank_transfer']);
            $table -> timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('expenses');
    }
};
