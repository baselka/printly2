<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('phone')->default('');
            $table->string('phone2')->default('');
            $table->string('gender')->default('');
            $table->string('country')->default('');


            $table->integer('type')->default(0);

            $table->rememberToken();
            $table->timestamps();


        });
        Schema::create('notifications', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->string('content');
            $table->string('route');
            $table->integer('content_id')->nullable();
            $table->integer('read')->default(0);
            $table->integer('normal_user')->default(0);

            $table->integer('flashed')->default(0);

            $table->timestamps();
        });
        Schema::create('visits', function (Blueprint $table) {
            $table->id();
            $table->string('ip');
            $table->string('browser');

            $table->string('device');

            $table->timestamps();

        });
        Schema::create('users_coupons', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id');
            $table->string('code')->unique();

            $table->integer('allowed')->default(0);

            $table->integer('used')->default(0);

        });
        Schema::create('user_promo_codes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id');
            $table->integer('amount')->default(0);
            $table->timestamps();
        });
        DB::insert("insert into users (`name` , `email` , `password`,`gender`,`phone`,`type`)
            VALUES ('admin','admin@admin.com','".Hash::make('admin')."','1','0000000000' , '1')");

            Schema::create('tickets', function (Blueprint $table) {
                $table->id();

                $table->integer('status')->default(0);
                $table->foreignId('user_id')->default(0);


                $table->timestamps();

            });
                Schema::create('ticket_messages', function (Blueprint $table) {
                $table->id();
                $table->string('message');
                $table->string('file');
                 $table->integer('type');  // admin
                $table->integer('has_file')->default(0);
                $table->foreignId('company_id')->default(0);
                $table->foreignId('admin_id')->default(0);

                $table->integer('read')->default(0);
                $table->foreignId('ticket_id')->default(0);


                $table->timestamps();

            });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
