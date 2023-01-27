<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Course;
use App\Models\Curriculum;
use App\Models\Lead;
use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $defaultPermission = ['lead-management', 'create-admin'];
        foreach ($defaultPermission as $permission) {
            Permission::create(['name' => $permission]);
        }


        $this->create_user_with_role('Super Admin', 'Super Admin', 'super-admin@lms.test');
        $this->create_user_with_role('Communication', 'Communication Team', 'communication@lms.test');
        $teacher = $this->create_user_with_role('Teacher', 'Teacher', 'teacher@lms.test');
        $this->create_user_with_role('Leads', 'Leads', 'leads@lms.test');



        // create leads
        Lead::factory(100)->create();

        $course = Course::create([
            'name' => 'Laravel',
            'description' => 'Laravel is an open-source PHP framework, which is robust and easy to understand. It follows a model-view-controller design pattern.',
            'image' => 'https://user-images.githubusercontent.com/1915268/67271462-31600380-f4d8-11e9-9143-18e197b26f48.png',
            'user_id' => $teacher->id

        ]);

        Curriculum::factory(10)->create();


    }


    private function create_user_with_role($type, $name, $email)
    {
                    //'Super Admin', 'Super Admin', 'super-admin@lms.test'
        $role = Role::create([
            'name' => $type
        ]);

        $user = User::create([
            'name' => $name,
            'email' => $email,
            'password' => bcrypt('z')
        ]);

         if ($type == 'Super Admin') {
            $role->givePermissionTo(Permission::all());
        } elseif ($type == 'Leads') {
            $role->givePermissionTo('lead-management');
        }

        $user->assignRole($role);

        return $user;
    }
}
