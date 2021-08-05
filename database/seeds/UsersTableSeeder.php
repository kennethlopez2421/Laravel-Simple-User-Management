<?php

use App\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
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
        $user = User::where('email', 'johnkennethlopez.lnsinterns@gmail.com')->first();

        if (!$user){
            User::create([
                'name' => 'John Kenneth Lopez',
                'email' => 'johnkennethlopez.lnsinterns@gmail.com',
                'password' => Hash::make('password')
            ]);
        }

        factory(User::class, 5)->create();
    }
}
