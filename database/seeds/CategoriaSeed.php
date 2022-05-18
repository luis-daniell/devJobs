<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;

class CategoriaSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('categorias')->insert([
            'nombre' => 'Front End',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('categorias')->insert([
            'nombre' => 'BackEnd',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);



        DB::table('categorias')->insert([
            'nombre' => 'Full Stack',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);


        DB::table('categorias')->insert([
            'nombre' => 'DevOps',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);



        DB::table('categorias')->insert([
            'nombre' => 'DBA',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);



        DB::table('categorias')->insert([
            'nombre' => 'UX / UI',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);



        DB::table('categorias')->insert([
            'nombre' => 'Teachlead',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);



    }
}
