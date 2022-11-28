<?php

use App\Models\News;
use App\Models\OurClient;
use App\Models\PortoDesain;
use App\Models\Profile_proyek;
use App\Models\Sartifikasi;
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
        Schema::create('images', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Profile_proyek::class)->nullable();
            $table->foreignIdFor(PortoDesain::class)->nullable();
            $table->foreignIdFor(Sartifikasi::class)->nullable();
            $table->foreignIdFor(OurClient::class)->nullable();
            $table->foreignIdFor(News::class)->nullable();
            $table->string('image');
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
        Schema::dropIfExists('images');
    }
};
