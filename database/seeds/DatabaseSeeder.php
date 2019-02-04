<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
         $this->call(RoleTable::class);
         $this->call(PermissionsTable::class);
         $this->call(PermissionsRole::class);
         $this->call(AddAdminUser::class);
         $this->call(SettingTable::class);
         $this->call(FieldsTable::class);
         $this->call(PagesTable::class);
         $this->call(DatasTable::class);
    }
}
