<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Migrations\Migration;

class SeedCategoriesData extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $categories = [
            [
                'name'        => 'Share',
                'description' => 'Share creations, share discoveries',
            ],
            [
                'name'        => 'Course',
                'description' => 'Programming technics and extension packages',
            ],
            [
                'name'        => 'Q&A',
                'description' => 'Please keep polite, and help each other',
            ],
            [
                'name'        => 'Notice',
                'description' => 'LaraBBS notices',
            ],
        ];

        DB::table('categories')->insert($categories);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::table('categories')->truncate();
    }
}
