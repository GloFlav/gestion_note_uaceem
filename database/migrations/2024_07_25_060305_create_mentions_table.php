<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMentionsTable extends Migration
{
    public function up()
    {
        Schema::create('mentions', function (Blueprint $table) {
            $table->id();
            $table->string('design');
            $table->string('code')->unique();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down()
    {
        Schema::dropIfExists('mentions');
    }
}
