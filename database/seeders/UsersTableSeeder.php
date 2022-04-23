<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = [
            [
                'name'              => "Автор не известен",
                'email'             => "unknown_author@color.com",
                'email_verified_at' => now(),
                'password'          => bcrypt(Str::random()),
                'remember_token'    => Str::random(10),
            ],
            [
                'name'              => "Автор",
                'email'             => "author@color.com",
                'email_verified_at' => now(),
                'password'          => bcrypt('123123'),
                'remember_token'    => Str::random(10),
            ]
        ];

        \DB::table('users')->insert($users);
    }
}
