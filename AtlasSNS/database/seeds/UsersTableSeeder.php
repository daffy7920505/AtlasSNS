<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         //以下を追加します。
        DB::table('users')->insert([
            'username' => 'a',
            'mail' => 'ad@gmail.com',
            'password' =>bcrypt ('12345'),
            // 'bio' => 'ラーメン',
        ]);
    }

}
