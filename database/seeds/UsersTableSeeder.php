<?php

use Illuminate\Database\Seeder;

use Laracasts\TestDummy\Factory as TestDummy;
use Illuminate\Database\Eloquent\Model;

use Faker\Factory as Faker;

class UsersTableSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create();
        //seed users
        DB::table('users')->delete();
        DB::table('users')->insert([
            'name' => 'test',
            'email' => 'a@a.com',
            'password' => bcrypt('123'),
            'created_at' => '2015-08-14 21:47:12',
            'updated_at' => '2015-08-14 21:47:12',
        ]);
        DB::table('users')->insert(TestDummy::times(20)->create('App\User')->toArray());
//        TestDummy::times(10)->save('App\User');

        //seed roles
        DB::table('roles')->delete();
        TestDummy::times(20)->create('App\models\Role');

        //seed permissions
        DB::table('permissions')->delete();
        TestDummy::times(40)->create('App\models\Permission');

        //seed roles_user
        $usersId = App\User::all()->lists('id')->toArray();
        $rolesId = App\models\Role::all()->lists('id')->toArray();
        foreach (range(1, 10) as $index) {
            DB::table('role_user')->insert([
                'role_id' => $faker->randomElement($rolesId),
                'user_id' => $faker->randomElement($usersId),
            ]);
        }

        //seed permission_role
        $permission_id = App\models\Permission::all()->lists('id')->toArray();
        $role_id = App\models\Role::all()->lists('id')->toArray();
        foreach (range(1, 20) as $index) {
            DB::table('permission_role')->insert([
                'role_id' => $faker->randomElement($role_id),
                'permission_id' => $faker->randomElement($permission_id),
            ]);
        }

//        foreach(range(1, 50) as $index)
//        {
//            $category = Category::find($faker->randomElement($categoryIds));
//            $category->posts()->sync(array($faker->randomElement($postIDs)));
//        }

    }
}
