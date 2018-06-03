<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMembersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $database = config('database.connections.system.database');

        Schema::create('members', function (Blueprint $table) use ($database) {

            $table->increments('id');
            $table->uuid('uuid')->unique()->index();
            $table->unsignedInteger('user_id')->nullable();
            $table->unsignedInteger('department_id')->nullable();
            $table->string('first_name')->nullable();
            $table->string('middle_name')->nullable();
            $table->string('last_name')->nullable();
            $table->string('prefix')->nullable();
            $table->string('suffix')->nullable();
            $table->enum('gender', ['M', 'F'])->nullable();
            $table->unsignedInteger('marital_status_id')->nullable();
            $table->string('salutation')->nullable();
            $table->string('nickname')->nullable();
            $table->enum('status', ['active', 'inactive'])->nullable();
            $table->date('date_of_birth')->nullable();
            $table->string('personal_email')->nullable();
            $table->string('home_phone')->nullable();
            $table->string('mobile_phone')->nullable();
            $table->timestamp('last_attended_at')->nullable();
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('department_id')->references('id')->on('departments')->onDelete('cascade');

            // foreign key to system marital_statuses table
            $table->foreign('marital_status_id')->references('id')->on("{$database}.marital_statuses")->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('members');
    }
}
