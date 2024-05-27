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
        Schema::create('packages', function (Blueprint $table) {
            $table->uuid('package_id')->primary();
            $table->string('package_name',200);
            $table->text('package_description');
            $table->string('slug')->unique();
            $table->unsignedInteger('no_of_days');
            $table->unsignedInteger('price');
            $table->unsignedInteger('country_id');
            $table->unsignedInteger('city_id');
            $table->unsignedInteger('category_id');
            $table->unsignedInteger('tag_id');
            $table->text('itenirary');
            $table->text('inclusion');
            $table->text('exclusion');
            $table->date('start_date');
            $table->date('end_date');
            $table->string('image1',200);
            $table->string('image2',200);
            $table->string('image3',200);
            $table->string('image4',200);
            $table->string('image5',200);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('packages');
    }
};
