<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class ProductosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('productos')->insert(['nombre' => 'Cerveza Modelo 24 Pack', 'descripcion' => ' Pack Cerveza Modelo Pura Malta 24 Botellas + 2 Copas Edición Especial', 'precio' => 699.0, 'stock' => 100, 'img' => 'https://images-na.ssl-images-amazon.com/images/I/71u5%2BlXpeTS._AC_SL1134_.jpg', 'provedor_id' => 1,]);
        DB::table('productos')->insert(['nombre' => 'Tequila Cuervo 1800 Milenio Extra Añejo 750ml', 'descripcion' => ' De México para el mundo. Cuenta la leyenda que los aztecas descubrieron el pulque, predecesor del tequila, cuando cayó un rayo sobre una planta de agave.', 'precio' => 2999, 'stock' => 100, 'img' => 'https://http2.mlstatic.com/D_NQ_NP_975515-MLM45358400221_032021-O.webp', 'provedor_id' => 1,]);
        DB::table('productos')->insert(['nombre' => 'Vino Nubori Rosé 750ml', 'descripcion' => 'Visual: Posee un rojo frambuesa con ligeros matices violáceos. En nariz: Muy aromático y afrutado, con tonos a grosella, moras y fresa.', 'precio' => 243, 'stock' => 100, 'img' => 'https://http2.mlstatic.com/D_NQ_NP_732455-MLM44526006876_012021-O.webp', 'provedor_id' => 2,]);
        DB::table('productos')->insert(['nombre' => 'Vino Tinto, Cheteau Bellegrave', 'descripcion' => 'Château Bellegrave se encuentra en el sur de Pauillac, entre Château Latour, Pichon-Longueville y Lynch-Bages.', 'precio' => 224, 'stock' => 100, 'img' => 'https://http2.mlstatic.com/D_NQ_NP_748092-MLM44276893285_122020-O.webp', 'provedor_id' => 1,]);
        DB::table('productos')->insert(['nombre' => 'Cerveza Clara Dos Equis Larger 24 Pack', 'descripcion' => ' Dos Equis Lager. Botella No Retornable 355ml. Cerveza mexicana elaborada desde 1984. 4.2% Alc. Vol. Estilo Pale Lager. 10 IBU', 'precio' => 1333, 'stock' => 100, 'img' => 'https://http2.mlstatic.com/D_NQ_NP_747023-MLM44182291306_112020-O.webp', 'provedor_id' => 1,]);
        DB::table('productos')->insert(['nombre' => 'Tequila Jose Cuervo Tradicional Reposado 950ml', 'descripcion' => 'De México para el mundo. Cuenta la leyenda que los aztecas descubrieron el pulque, predecesor del tequila, cuando cayó un rayo sobre una planta de agave.', 'precio' => 502, 'stock' => 100, 'img' => 'https://http2.mlstatic.com/D_NQ_NP_925600-MLM45358412997_032021-O.webp', 'provedor_id' => 2,]);
    }
}
