<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(IdTypeSeeder::class);
        $this->call(DestinationSeeder::class);

        $user = factory(App\User::class)->create([
            'avatar' => 'default.jpg',
            'firstname' => 'Joseph Cyrel',
            'middlename' => 'Villanueva',
            'lastname' => 'Segui',
            'address' => 'R11-2 Reymans Apt. Subd. Villi Lourdes, Mataas na Lupa Lipa City Batangas',
            'birthday' => '1996-05-26',
            'contact_number' => '09178172041',
            'user_number' => '2015179921',
            'user_type' => 'admin',            
            'password' => bcrypt('admin1234'),
            'status' => '0'

            ]);
    
            $user = factory(App\User::class)->create([
                'avatar' => '1812091107_visitor-picture',
                'firstname' => 'Leslie',
                'middlename' => 'Sumaya',
                'lastname' => 'Macahia',
                'address' => 'Lipa, City',
                'birthday' => 'leslie.macahia@gmail.com',
                'contact_number' => '09777330523',
                'user_number' => '2015173511',
                'user_type' => 'user',            
                'password' => bcrypt('user1234'),
                'status' => '0'
            ]);

    }
}
