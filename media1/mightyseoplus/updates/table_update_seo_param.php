<?php

namespace Media1\MightySeoPlus\Updates;

use Schema;
use October\Rain\Database\Schema\Blueprint;
use October\Rain\Database\Updates\Migration;

class UpdateSeoParamsTable extends Migration
{
    public function up()
    {
        Schema::table('lovata_mighty_seo_params', function (Blueprint $table) {
            $table->text('itemprop_name')->nullable();
            $table->text('itemprop_description')->nullable();
            $table->text('itemprop_image')->nullable();
            $table->text('og_title')->nullable();
            $table->text('og_description')->nullable();
            $table->text('og_image')->nullable();
            $table->string('og_type')->nullable();
            $table->text('twitter_title')->nullable();
            $table->text('twitter_description')->nullable();
            $table->text('twitter_image')->nullable();
            $table->string('itemtype')->nullable();
        });
    }

    public function down()
    {
        Schema::dropIfExists('lovata_mighty_seo_param');
    }
}
