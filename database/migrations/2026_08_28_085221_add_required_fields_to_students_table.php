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
        Schema::table('students', function (Blueprint $table) {
            $table->string('first_name')->nullable()->after('student_id');
            $table->string('middle_name')->nullable()->after('first_name');
            $table->string('last_name')->nullable()->after('middle_name');

            $table->string('mobile_number')->nullable()->after('email');
            $table->date('date_of_birth')->nullable()->after('mobile_number');
            $table->string('gender')->nullable()->after('date_of_birth');

            $table->string('program')->nullable()->after('gender');
            $table->text('address')->nullable()->after('year_level');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('students', function (Blueprint $table) {
            $table->dropColumn([
                'first_name',
                'middle_name',
                'last_name',
                'mobile_number',
                'date_of_birth',
                'gender',
                'program',
                'address',
            ]);
        });
    }
};