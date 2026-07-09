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
        Schema::create('certificates', function (Blueprint $table) {
            $table->id();
            $table->string('thumbnail');
            $table->string('title');
            $table->string('issuer');
            $table->string('certificate_number')->nullable();
            $table->year('issue_year');
            $table->string('credential_url')->nullable();
            $table->date('expired_at')->nullable();
            $table->text('description')->nullable();
            $table->string('pdf_file')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('certificates');
    }
};
