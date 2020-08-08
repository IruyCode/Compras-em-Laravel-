<?php

use Illuminate\Database\Seeder;

class EstrelasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('estrelas')->insert([
          'id_produto'   => 9,
          'qnt_estrelas' => 3,
          'id_user'      => 1,
          'created_at'   => date("Y/m/d h:i:s"),
          'updated_at'   =>date("Y/m/d h:i:s"),
            ]);
    }
}
