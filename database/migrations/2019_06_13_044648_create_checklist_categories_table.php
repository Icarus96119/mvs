<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateChecklistCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('checklist_categories', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->boolean('is_active')->default(true);
            $table->softDeletes();
            $table->timestamps();
        });

        if (Schema::hasColumn('checklists', 'category'))
        {            
            Schema::table('checklists', function (Blueprint $table)
            {
                $table->dropColumn('category');
            });
        }

        Schema::table('checklists', function (Blueprint $table) {
            $table->integer('category_id')->after('body')->unsigned();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('checklists', function (Blueprint $table)
        {
            $table->dropColumn('category_id');
        });
        Schema::dropIfExists('checklist_categories');
    }
}
