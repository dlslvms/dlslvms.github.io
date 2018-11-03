<?php

use Illuminate\Database\Seeder;

class DestinationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if(DB::table('destinations')->get()->count() == 0){

            DB::table('destinations')->insert([

                [
                    'destination' => 'CAPILLA DE SAN JUAN BAUTISTA DE LA SALLE',
                ],
                [
                    'destination' => 'CBEAM HALL',
                ],
                [
                    'destination' => 'CHEZ RAFAEL',
                ],
                [
                    'destination' => 'CLARO M RECTO HALL',
                ],
                [
                    'destination' => 'COLLEGE LEARNING RESOURCE CENTER',
                ],
                [
                    'destination' => 'EL FILIBUSTERISMO',
                ],
                [
                    'destination' => 'GREGORIO ZARA HALL',
                ],
                [
                    'destination' => 'INTEGRATED LEARNING RESOURCE CENTER',
                ],
                [
                    'destination' => 'INTEFRATED SCHOOL COMPLEX',
                ],
                [
                    'destination' => 'MABINI HALL',
                ],
                [
                    'destination' => 'NOLI ME TANGEHERE',
                ],
                [
                    'destination' => 'RETREAT COMPLEX',
                ],
                [
                    'destination' => 'SENTRUM',
                ],
                [
                    'destination' => 'SEN. JOSE DIOKNO HALL',
                ],
                [
                    'destination' => 'SPORTS COMPLEX',
                ],
                [
                    'destination' => 'ST. BR. BENILDE HALL',
                ],
                [
                    'destination' => 'STUDENTS CENTER',
                ],
            ]);
        }
    }
}
