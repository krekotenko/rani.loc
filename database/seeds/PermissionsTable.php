<?php

use Illuminate\Database\Seeder;

class PermissionsTable extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('permissions')->insert(
            [
                [
                    'alias' => 'ADMINISTRATOR_ACCESS',
                    'title' => 'Administrator access',
                ]
            ]
        );
    }
}
