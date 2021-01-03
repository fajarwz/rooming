<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBookingListsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('booking_lists', function (Blueprint $table) {
            $table->id();
            $table->integer('room_status_id');
            $table->integer('user_id');
            $table->date('date'); 
            $table->time('start_time');
            $table->time('end_time');
            $table->string('purpose', 100);
            $table->enum('status', ['PENDING', 'DISETUJUI', 'DIBOOKING', 'DITOLAK', 'BATAL', 'SELESAI'])->default(['PENDING']);
            $table->softDeletes();
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
        Schema::dropIfExists('booking_lists');
    }
}
