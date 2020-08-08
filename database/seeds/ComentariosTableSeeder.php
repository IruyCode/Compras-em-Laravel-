<?php

use Illuminate\Database\Seeder;

class ComentariosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         DB::table('comentarios')->insert([
        	'produto_id' => 6,
        	'usuario' => 'Lucas TH',
        	'comentario' => 'Toddy menhor que nescau!!',
        	'created_at' => date("Y/m/d h:i:s"),
        	'updated_at' => date("Y/m/d h:i:s"),
        	]);

          DB::table('comentarios')->insert([
        	'produto_id' => 6,
        	'usuario' => 'Huan',
        	'comentario' => 'Tinha na minha cidade tbm!!!',
        	'created_at' => date("Y/m/d h:i:s"),
        	'updated_at' => date("Y/m/d h:i:s"),
        	]);
          
          DB::table('comentarios')->insert([
          	'produto_id'=> 9,
          	'usuario'=> 'Rui',
          	'comentario' => 'Este guarana é muito bom !',
            'created_at' => date("Y/m/d h:i:s"),
        	'updated_at' => date("Y/m/d h:i:s"), 
            ]);

           DB::table('comentarios')->insert([
            'produto_id'=> 14,
            'usuario'=> 'Ana',
            'comentario' => 'Adoro enta caixa da garotoo!',
            'created_at' => date("Y/m/d h:i:s"),
          'updated_at' => date("Y/m/d h:i:s"), 
            ]);
            DB::table('comentarios')->insert([
            'produto_id'=> 14,
            'usuario'=> 'Joao',
            'comentario' => 'Acho ela muito cara :v',
            'created_at' => date("Y/m/d h:i:s"),
          'updated_at' => date("Y/m/d h:i:s"), 
            ]);
             DB::table('comentarios')->insert([
            'produto_id'=> 14,
            'usuario'=> 'Julian',
            'comentario' => 'Melhor marca',
            'created_at' => date("Y/m/d h:i:s"),
          'updated_at' => date("Y/m/d h:i:s"), 
            ]);
              DB::table('comentarios')->insert([
            'produto_id'=> 17,
            'usuario'=> 'ZÉ',
            'comentario' => 'Essa é boa msm',
            'created_at' => date("Y/m/d h:i:s"),
          'updated_at' => date("Y/m/d h:i:s"), 
            ]);
               DB::table('comentarios')->insert([
            'produto_id'=> 19,
            'usuario'=> 'Fernanda',
            'comentario' => 'Diamante negro *.*',
            'created_at' => date("Y/m/d h:i:s"),
          'updated_at' => date("Y/m/d h:i:s"), 
            ]);
                DB::table('comentarios')->insert([
            'produto_id'=> 19,
            'usuario'=> 'Maria',
            'comentario' => 'Comprei 3 ',
            'created_at' => date("Y/m/d h:i:s"),
          'updated_at' => date("Y/m/d h:i:s"), 
            ]);
                 DB::table('comentarios')->insert([
            'produto_id'=> 18,
            'usuario'=> 'Thiago',
            'comentario' => 'Lembra da infancia!!',
            'created_at' => date("Y/m/d h:i:s"),
          'updated_at' => date("Y/m/d h:i:s"), 
            ]);
                   DB::table('comentarios')->insert([
            'produto_id'=> 18,
            'usuario'=> 'TESTE',
            'comentario' => 'Teste!!',
            'created_at' => date("Y/m/d h:i:s"),
          'updated_at' => date("Y/m/d h:i:s"), 
            ]);
    }
}
