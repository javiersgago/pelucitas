<?php

use Illuminate\Database\Seeder;
use App\Trabajo_user;

class Trabajo_UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    //// php artisan make:seeder Trabajo_UserTableSeeder
    public function run()
    {
        $rel1 = new Trabajo_user;
        $rel1->user_id = 1;
        $rel1->trabajo_id = 1;
        $rel1->save();

        $rel2 = new Trabajo_user;
        $rel2->user_id = 1;
        $rel2->trabajo_id = 2;
        $rel2->save();

        $rel3 = new Trabajo_user;
        $rel3->user_id = 2;
        $rel3->trabajo_id = 1;
        $rel3->save();

        $rel4 = new Trabajo_user;
        $rel4->user_id = 3;
        $rel4->trabajo_id = 2;
        $rel4->save();
    }
}
