<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fertilizers', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->float('norm_azot');
            $table->float('norm_fosfor');
            $table->float('norm_kalii');
            $table->foreignId('culture_id')->index()->constrained('cultures')->onDelete('cascade');
            $table->text('raion');
            $table->float('cost');
            $table->text('description');
            $table->text('target');
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
        Schema::dropIfExists('fertilizers');
    }
};
