<?php

use Illuminate\Database\Seeder;

class AddToSettingsTable extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('settings')->insert(
            [
                //1
                [
                    'field' => 'system_photo',
                    'value' => '-',
                    'title' => 'Administrator Photo',
                    'type' => 'file'
                ]
            ]
        );
    }
}
