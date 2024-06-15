<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\User;


class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Using ORM Eloquent
        $user = new User;
        $user->document=105384758;
        $user->fullname='El Juli';
        $user->gender='Male';
        $user->birthdate='1996-03-03';
        $user->phone='313131313';
        $user->email="correo@hosting.com";
        $user->password=bcrypt("micontraseña");
        $user->role="Admin";
        $user->save();

        $user = new User;
        $user->document=105384898;
        $user->fullname='Santiago Arboleda';
        $user->gender='Male';
        $user->birthdate='1996-03-03';
        $user->phone='313131313';
        $user->email="sarboleda72@misena.edu.co";
        $user->password=bcrypt("admin");
        $user->role="Administrador";
        $user->save();

        // using DB Array
        DB::table('users')->insert([
        'document'=>105384858,
        'fullname'=>'Santiago Arboleda',
        'gender'=>'Male',
        'birthdate'=>'1996-03-03',
        'phone'=>'313131313',
        'email'=>"sarboleda2@misena.edu.co",
        'password'=>bcrypt("12345"),
        'role'=>"Administrador",
        'created_at'=>now(),
        'updated_at'=>now()
        ]);
    }
}
