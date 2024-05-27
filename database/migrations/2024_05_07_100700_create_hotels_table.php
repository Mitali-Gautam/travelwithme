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
        Schema::create('hotels', function (Blueprint $table) {
            $table->id()->autoIncrement();
            $table->string("name","200")->nullable(false);
            $table->foreignId('country_id')->nullable()->constrained()->onDelete('cascade');
            $table->foreignId('city_id')->nullable()->constrained()->onDelete('cascade');
            $table->text("description")->nullable();
            $table->text("address")->nullable();
            $table->string("postal_code","100")->nullable(false);
            $table->string("contact_no","100")->nullable(false);
            $table->string("email","200")->nullable(false);
            $table->integer("rating")->nullable(false);
            $table->string("check_in","20")->nullable(false);
            $table->string("check_out","20")->nullable(false);
            $table->string("hotel_temp_image_name","100");
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('hotels');
    }
};
