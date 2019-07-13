<?php

use Illuminate\Database\Seeder;
use App\Role;
use App\User;
use App\Avatar;
use App\Student;
use App\Category;
use App\Level;
use App\Course;
use App\Goal;
use App\Requirement;
use App\Administrator;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        //Deleting images from storage
       Storage::deleteDirectory('public/courses');
        Storage::deleteDirectory('public/users');
        
        //Creating images from storage
        Storage::makeDirectory('public/courses');
        Storage::makeDirectory('public/users');
        
        //Factory from Role
        factory(Role::class, 1)->create([
          'rol' => 'admin',
        ]);
        
        //Factory from Role
        factory(Role::class, 1)->create([
          'rol' => 'student',
        ]);
        
        //Factory from level
        factory(Level::class, 3)->create();
        
        //Factory from Avatar
        factory(Avatar::class, 10)->create();

        //Factory from Category
        factory(Category::class, 3)->create();

        
        //Factory from custom user also make a student register
        factory(User::class , 1)->create([
         'name' => 'Sandra Gonzales',
         'slug' => 'sandra-gonzales',
         'picture' => Avatar::all()->random()->avatar,
         'phone' => '76064602',
         'email' => 'sandra@gmail.com',
         'role_id' => Role::ADMIN
        ])
        ->each(function(User $u){
        	//making student register
           factory(Student::class, 1)->create([
               'user_id' => $u->id,
           ]);

           factory(Administrator::class, 1)->create([
               'user_id' => $u->id,
           ]);

        });
      
       //Factory from users also make a student register
       factory(User::class, 50)->create(['role_id' => Role::STUDENT])
       ->each(function(User $u){
       	//making student register
       	factory(Student::class , 1)->create([
          'user_id' => $u->id
       	]);
       });

       //Factory from course also make a goals and requirent for a course
       factory(Course::class, 1)->create()
      ->each(function(Course $c){
        $c->goals()->saveMany(factory(Goal::class, 2)->create());
        $c->requirements()->saveMany(factory(Requirement::class, 2)->create());
      });



    }
}
