<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Role;
class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    protected $roles = ['admin','user'];

    public function run()
    {
        foreach($this->roles as $role){
            if(!Role::where('name',$role)->first()){
                Role::create([
                    'name'=>$role
                ]);
            }
        }
    }

}
