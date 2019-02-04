<?php

use Illuminate\Database\Seeder;

class PermissionsRole extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('permission_role')->insert(
            [
                [
                    'role_id' => 1,
                    'permission_id' =>1
                ]
            ]

        );
    }
}
