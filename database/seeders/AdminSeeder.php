<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    protected $users = [];

    private function getUsers()
    {
        array_push($this->users, [
            'email' => env('ADMIN_USERNAME', 'admin@admin.com'),
            'password' => env('ADMIN_PASSWORD', '123456'),
            ]
        );
    }

    public function run()
    {
        $this->getUsers();
        foreach($this->users as $user){
            if(!User::where('email',$user['email'])->first()){
                User::create([
                    'email'=>$user['email'],
                    'password' => bcrypt($user['password']),
                    'name' => 'admin',
                    'role_id' => 1,
                ]);
            }
        }
    }
}
