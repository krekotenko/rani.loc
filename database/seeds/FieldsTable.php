<?php

use Illuminate\Database\Seeder;

class FieldsTable extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('fields')->insert(
            [
                [
                    "title" => "String",
                    "alias" => "input",
                ],
                [
                    "title" => "Text",
                    "alias" => "textarea",
                ],
                [
                    "title" => "Select",
                    "alias" => "select",
                ],
                [
                    "title" => "Password",
                    "alias" => "password",
                ],
                [
                    "title" => "Radio",
                    "alias" => "radio",
                ],
                [
                    "title" => "Editor",
                    "alias" => "editor",
                ],
                [
                    "title" => "File",
                    "alias" => "file",
                ],
                [
                    "title" => "Hidden",
                    "alias" => "hidden",
                ],
                [
                    "title" => "Multiple Input",
                    "alias" => "multiple_input",
                ],

            ]
        );
    }
}
