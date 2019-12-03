<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        $date = date('Y-m-d H:i:s');
        \DB::table('users')->insert(['name' => 'Administrador','a_paterno' => 'Paterno','a_materno' => 'Materno', 'email' => 'admin@gmail.com', 'password' => '$2y$12$bpf1K7o.uUi01BBh0gUv4uMSfQaCY8BYnzL1sTQmnQQvqZ8.pKnh.','rol' => 'Administrador','folio' => '1000','activo' => 1,'created_at' => $date,'updated_at' => $date]);
    }
}
