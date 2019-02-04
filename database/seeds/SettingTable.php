<?php

use Illuminate\Database\Seeder;

class SettingTable extends Seeder
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
                    'field' => 'system_email',
                    'value' => 'rani@ranimaree.com',
                    'title' => 'System Email',
                ],
                [
                    'field' => 'system_email_2',
                    'value' => 'r.reshotka@bleecker.uk',
                    'title' => 'System Email 2',
                ]
            ]
        );
    }
}
