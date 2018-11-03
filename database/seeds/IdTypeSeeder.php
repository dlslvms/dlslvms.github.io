<?php

use Illuminate\Database\Seeder;

class IdTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if(DB::table('id_types')->get()->count() == 0){

            DB::table('id_types')->insert([

                [
                    'id_type' => 'DRIVERS LICENCE',
                ],
                [
                    'id_type' => 'GSIS ID',
                ],
                [
                    'id_type' => 'OFW ID',
                ],
                [
                    'id_type' => 'PAG-IBIG ID',
                ],
                [
                    'id_type' => 'PASSPORT',
                ],
                [
                    'id_type' => 'PHILHEALTH',
                ],
                [
                    'id_type' => 'POSTAL ID',
                ],
                [
                    'id_type' => 'PRC ID',
                ],
                [
                    'id_type' => 'SENIOR CITIZEN ID',
                ],
                [
                    'id_type' => 'SSS ID',
                ],
                [
                    'id_type' => 'TIN ID',
                ],
                [
                    'id_type' => 'UMID ID',
                ],
                [
                    'id_type' => 'VOTERS ID',
                ],
                [
                    'id_type' => 'NATIONAL ID',
                ],
            ]);

        } 
    }
}
