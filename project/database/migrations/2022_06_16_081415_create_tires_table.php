<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTiresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tires', function (Blueprint $table) {
            $table->id();
            $table->string('title')->comment('タイトル');
            $table->string('maker')->comment('メーカー');
            $table->string('brand')->comment('ブランド');
            $table->string('series')->comment('シリーズ');
            $table->string('type')->comment('タイプ');
            $table->date('posted_at')->comment('投稿日時');
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
        Schema::dropIfExists('tires');
    }
}
