<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('properties', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('type');
            $table->string('status')->default('draft');

            $table->string('city');
            $table->string('district')->nullable();
            $table->string('address');
            $table->decimal('latitude', 10, 7)->nullable();
            $table->decimal('longitude', 10, 7)->nullable();

            $table->unsignedSmallInteger('rooms')->nullable();
            $table->unsignedSmallInteger('floor')->nullable();
            $table->decimal('area_sqm', 8, 2)->nullable();
            $table->unsignedInteger('monthly_rent_uah');
            $table->unsignedInteger('deposit_uah')->nullable();
            $table->unsignedSmallInteger('min_term_months')->default(3);

            $table->text('description')->nullable();
            $table->json('amenities')->nullable();
            $table->json('photos')->nullable();

            $table->unsignedTinyInteger('overall_score')->nullable();
            $table->unsignedTinyInteger('real_score')->nullable();
            $table->unsignedTinyInteger('adequate_score')->nullable();
            $table->text('assessment_notes')->nullable();

            $table->foreignId('manager_id')->nullable()->constrained('users')->nullOnDelete();
            $table->timestamp('accepted_at')->nullable();

            $table->timestamps();

            $table->index(['city', 'type', 'status']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('properties');
    }
};
