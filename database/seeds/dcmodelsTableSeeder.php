<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class dcmodelsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        DB::table('dcmodels')->delete();
        DB::table('dcmodels')->insert(array(
                [
                    'name' => 'root',
                    'title' => 'System',
                    'ismenu' => '0',
                    'icon' => '',
                    'url' => '',
                    'templateurl' => '',
                    'files' => <<<FILESIN
FILESIN
                    ,
                    'created_at' => $faker->dateTime,
                    'updated_at' => $faker->dateTime,
                ]
            , [
                    'name' => 'dashboard',
                    'title' => '主页',
                    'ismenu' => '1',
                    'icon' => 'icon-home',
                    'url' => '/dashboard.html',
                    'templateurl' => '/dcassets/templateurl/dashboard',
                    'files' => <<<FILESIN
                            '/js/controllers/GeneralPageController.js'
FILESIN
                    ,
                    'created_at' => $faker->dateTime,
                    'updated_at' => $faker->dateTime,
                ]
            , [
                    'name' => 'sys-setting',
                    'title' => '系统设置',
                    'ismenu' => '1',
                    'icon' => 'icon-settings',
                    'url' => null,
                    'templateurl' => null,
                    'files' => <<<FILESIN
FILESIN
                    ,
                    'created_at' => $faker->dateTime,
                    'updated_at' => $faker->dateTime,
                ]
            , [
                    'name' => 'sys-users',
                    'title' => '用户管理',
                    'ismenu' => '1',
                    'icon' => 'icon-users',
                    'url' => '/sys-users.html',
                    'templateurl' => '/dcassets/templateurl/sys-users',
                    'files' => <<<FILESIN
                            '/assets/global/plugins/select2/select2.css',
                            '/assets/global/plugins/datatables/plugins/bootstrap/dataTables.bootstrap.css',
                            '/views/sys-users/sys-users.css',

                            '/js/controllers/GeneralPageController.js',
                            '/views/sys-users/sys-users.js',
FILESIN
                    ,
                    'created_at' => $faker->dateTime,
                    'updated_at' => $faker->dateTime,
                ]
            , [
                    'name' => 'sys-role',
                    'title' => '角色管理',
                    'ismenu' => '1',
                    'icon' => 'icon-globe',
                    'url' => '/sys-role.html',
                    'templateurl' => '/dcassets/templateurl/sys-role',
                    'files' => <<<FILESIN
                            '/assets/global/plugins/jstree/dist/themes/default/style.min.css',

                            '/assets/global/plugins/jstree/dist/jstree.min.js',
                            '/assets/admin/pages/scripts/ui-tree.js',
                            '/views/sys-role/sys-role.js',
                            '/js/controllers/GeneralPageController.js'
FILESIN
                    ,
                    'created_at' => $faker->dateTime,
                    'updated_at' => $faker->dateTime,
                ]
            , [
                    'name' => 'sys-modelst',
                    'title' => '模块管理',
                    'ismenu' => '1',
                    'icon' => 'icon-support',
                    'url' => '',
                    'templateurl' => '',
                    'files' => <<<FILESIN
                            '/assets/global/plugins/select2/select2.css',
                            '/assets/global/plugins/datatables/plugins/bootstrap/dataTables.bootstrap.css',

                            '/assets/global/plugins/datatables/media/js/jquery.dataTables.min.js',
                            '/assets/global/plugins/select2/select2.min.js',
                            '/assets/global/plugins/datatables/plugins/bootstrap/dataTables.bootstrap.js',
                            '/views/sys-model/sys-model.js',
                            '/js/controllers/GeneralPageController.js'
FILESIN
                    ,
                    'created_at' => $faker->dateTime,
                    'updated_at' => $faker->dateTime,
                ]
            , [
                    'name' => 'sys-addmodel',
                    'title' => '模块编辑',
                    'ismenu' => '0',
                    'icon' => 'icon-direction',
                    'url' => '/sys-addmodel.html',
                    'templateurl' => '/dcassets/templateurl/sys-addmodel',
                    'files' => <<<FILESIN
                            '/assets/global/plugins/select2/select2.css',
                            '/assets/global/plugins/bootstrap-select/bootstrap-select.min.css',
                            '/assets/global/plugins/jquery-multi-select/css/multi-select.css',
                            '/views/sys-addmodel/sys-addmodel.css',

                            '/assets/global/plugins/jquery-validation/js/jquery.validate.min.js',
                            '/assets/global/plugins/jquery-validation/js/additional-methods.min.js',
                            '/assets/global/plugins/bootstrap-wizard/jquery.bootstrap.wizard.min.js',
                            '/assets/global/plugins/select2/select2.min.js',
                            '/assets/global/plugins/jquery-multi-select/js/jquery.multi-select.js',
                            '/views/sys-addmodel/sys-addmodel.js',
                            '/js/controllers/GeneralPageController.js'
FILESIN
                    ,
                    'created_at' => $faker->dateTime,
                    'updated_at' => $faker->dateTime,
                ]
            , [
                    'name' => 'sys-model',
                    'title' => '模块管理',
                    'ismenu' => '1',
                    'icon' => 'icon-puzzle',
                    'url' => '/sys-model.html',
                    'templateurl' => '/dcassets/templateurl/sys-model',
                    'files' => <<<FILESIN
FILESIN
                    ,
                    'created_at' => $faker->dateTime,
                    'updated_at' => $faker->dateTime,
                ]
            , [
                    'name' => 'user-console',
                    'title' => '个人中心',
                    'ismenu' => '1',
                    'icon' => 'icon-user-following',
                    'url' => '',
                    'templateurl' => '',
                    'files' => <<<FILESIN
FILESIN
                    ,
                    'created_at' => $faker->dateTime,
                    'updated_at' => $faker->dateTime,
                ]
            , [
                    'name' => 'user-msg',
                    'title' => '消息管理',
                    'ismenu' => '1',
                    'icon' => 'icon-user-following',
                    'url' => '',
                    'templateurl' => '',
                    'files' => <<<FILESIN
FILESIN
                    ,
                    'created_at' => $faker->dateTime,
                    'updated_at' => $faker->dateTime,
                ]
            , [
                    'name' => 'msger',
                    'title' => '发消息',
                    'ismenu' => '1',
                    'icon' => 'icon-envelope-open',
                    'url' => '/msger.html',
                    'templateurl' => '/dcassets/templateurl/msger',
                    'files' => <<<FILESIN
FILESIN
                    ,
                    'created_at' => $faker->dateTime,
                    'updated_at' => $faker->dateTime,
                ]
            , [
                    'name' => 'msglist',
                    'title' => '消息列表',
                    'ismenu' => '1',
                    'icon' => 'icon-envelope-open',
                    'url' => '/msglist.html',
                    'templateurl' => '/dcassets/templateurl/msglist',
                    'files' => <<<FILESIN
FILESIN
                    ,
                    'created_at' => $faker->dateTime,
                    'updated_at' => $faker->dateTime,
                ]
            , [
                    'name' => 'memo',
                    'title' => '个人便签',
                    'ismenu' => '1',
                    'icon' => 'icon-book-open',
                    'url' => '/memo.html',
                    'templateurl' => '/dcassets/templateurl/memo',
                    'files' => <<<FILESIN
FILESIN
                    ,
                    'created_at' => $faker->dateTime,
                    'updated_at' => $faker->dateTime,
                ]
            , [
                    'name' => 'userpwd',
                    'title' => '修改密码',
                    'ismenu' => '1',
                    'icon' => 'icon-lock',
                    'url' => '/userpwd.html',
                    'templateurl' => '/dcassets/templateurl/userpwd',
                    'files' => <<<FILESIN
FILESIN
                    ,
                    'created_at' => $faker->dateTime,
                    'updated_at' => $faker->dateTime,
                ])
        );
//        DB::table('users')->insert(TestDummy::times(20)->create('App\User')->toArray());
//        TestDummy::times(10)->save('App\User');
//
//        //seed roles
//        DB::table('roles')->delete();
//        TestDummy::times(20)->create('App\models\Role');
//
//        //seed roles_user
//        $usersId = App\User::all()->lists('id')->toArray();
//        $rolesId = App\models\Role::all()->lists('id')->toArray();
//        foreach (range(1, 10) as $index) {
//            DB::table('role_user')->insert([
//                'role_id' => $faker->randomElement($rolesId),
//                'user_id' => $faker->randomElement($usersId),
//            ]);
//        }

//        $categoryIds = Category::lists('id');
//        $postIds = Post::lists('id');
//
//        foreach(range(1, 50) as $index)
//        {
//            $category = Category::find($faker->randomElement($categoryIds));
//            $category->posts()->sync(array($faker->randomElement($postIDs)));
//        }


        //
    }
}
