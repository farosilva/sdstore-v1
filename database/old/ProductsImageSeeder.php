<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\ProductImage;

class ProductsImageSeeder extends Seeder
{

    public function run()
    {
        $lines = [
            ['product_id' => '2925',    'image_id' => '1',  'directory' => '/sem-gluten/coxinha-frango/coxinha-frango_1.jpg'],
            ['product_id' => '2925',    'image_id' => '2',  'directory' => '/sem-gluten/coxinha-frango/coxinha-frango_2.jpg'],
            ['product_id' => '2925',    'image_id' => '3',  'directory' => '/sem-gluten/coxinha-frango/coxinha-frango_3.jpg'],
            ['product_id' => '2925',    'image_id' => '4',  'directory' => '/sem-gluten/coxinha-frango/coxinha-frango_4.jpg'],

            ['product_id' => '1927',    'image_id' => '1',  'directory' => '/sem-gluten/coxinha-frango/coxinha-frango_1.jpg'],
            ['product_id' => '1927',    'image_id' => '2',  'directory' => '/sem-gluten/coxinha-frango/coxinha-frango_2.jpg'],
            ['product_id' => '1927',    'image_id' => '3',  'directory' => '/sem-gluten/coxinha-frango/coxinha-frango_3.jpg'],
            ['product_id' => '1927',    'image_id' => '4',  'directory' => '/sem-gluten/coxinha-frango/coxinha-frango_4.jpg'],

            ['product_id' => '19',      'image_id' => '1',  'directory' => '/sem-gluten/ravioli-carne/ravioli-carne_1.jpg'],
            ['product_id' => '19',      'image_id' => '2',  'directory' => '/sem-gluten/ravioli-carne/ravioli-carne_2.jpg'],
            ['product_id' => '19',      'image_id' => '3',  'directory' => '/sem-gluten/ravioli-carne/ravioli-carne_3.jpg'],
            ['product_id' => '19',      'image_id' => '4',  'directory' => '/sem-gluten/ravioli-carne/ravioli-carne_4.jpg'],

            ['product_id' => '2445',    'image_id' => '1',  'directory' => '/sem-gluten/ravioli-carne/ravioli-carne_1.jpg'],
            ['product_id' => '2445',    'image_id' => '2',  'directory' => '/sem-gluten/ravioli-carne/ravioli-carne_2.jpg'],
            ['product_id' => '2445',    'image_id' => '3',  'directory' => '/sem-gluten/ravioli-carne/ravioli-carne_3.jpg'],
            ['product_id' => '2445',    'image_id' => '4',  'directory' => '/sem-gluten/ravioli-carne/ravioli-carne_4.jpg'],

            ['product_id' => '86',      'image_id' => '1',  'directory' => '/sem-gluten/rondeli-paleta/rondeli-paleta_1.jpg'],
            ['product_id' => '86',      'image_id' => '2',  'directory' => '/sem-gluten/rondeli-paleta/rondeli-paleta_2.jpg'],
            ['product_id' => '86',      'image_id' => '3',  'directory' => '/sem-gluten/rondeli-paleta/rondeli-paleta_3.jpg'],
            ['product_id' => '86',      'image_id' => '4',  'directory' => '/sem-gluten/rondeli-paleta/rondeli-paleta_4.jpg'],

            ['product_id' => '2437',    'image_id' => '1',  'directory' => '/sem-gluten/rondeli-paleta/rondeli-paleta_1.jpg'],
            ['product_id' => '2437',    'image_id' => '2',  'directory' => '/sem-gluten/rondeli-paleta/rondeli-paleta_2.jpg'],
            ['product_id' => '2437',    'image_id' => '3',  'directory' => '/sem-gluten/rondeli-paleta/rondeli-paleta_3.jpg'],
            ['product_id' => '2437',    'image_id' => '4',  'directory' => '/sem-gluten/rondeli-paleta/rondeli-paleta_4.jpg'],

            ['product_id' => '2682',    'image_id' => '1',  'directory' => '/sem-gluten/ravioli-frango/ravioli-frango_1.jpg'],
            ['product_id' => '2682',    'image_id' => '2',  'directory' => '/sem-gluten/ravioli-frango/ravioli-frango_2.jpg'],
            ['product_id' => '2682',    'image_id' => '3',  'directory' => '/sem-gluten/ravioli-frango/ravioli-frango_3.jpg'],
            ['product_id' => '2682',    'image_id' => '4',  'directory' => '/sem-gluten/ravioli-frango/ravioli-frango_4.jpg'],

            ['product_id' => '1678',    'image_id' => '1',  'directory' => '/sem-gluten/canja-galinha/canja-galinha_1.jpg'],
            ['product_id' => '1678',    'image_id' => '2',  'directory' => '/sem-gluten/canja-galinha/canja-galinha_2.jpg'],
            ['product_id' => '1678',    'image_id' => '3',  'directory' => '/sem-gluten/canja-galinha/canja-galinha_3.jpg'],
            ['product_id' => '1678',    'image_id' => '4',  'directory' => '/sem-gluten/canja-galinha/canja-galinha_4.jpg'],

            ['product_id' => '1651',    'image_id' => '1',  'directory' => '/sem-gluten/caldo-verde/caldo-verde_1.jpg'],
            ['product_id' => '1651',    'image_id' => '2',  'directory' => '/sem-gluten/caldo-verde/caldo-verde_2.jpg'],
            ['product_id' => '1651',    'image_id' => '3',  'directory' => '/sem-gluten/caldo-verde/caldo-verde_3.jpg'],
            ['product_id' => '1651',    'image_id' => '4',  'directory' => '/sem-gluten/caldo-verde/caldo-verde_4.jpg'],

            ['product_id' => '1317',    'image_id' => '1',  'directory' => '/sem-gluten/sopa-feijao/sopa-feijao_1.jpg'],
            ['product_id' => '1317',    'image_id' => '2',  'directory' => '/sem-gluten/sopa-feijao/sopa-feijao_2.jpg'],
            ['product_id' => '1317',    'image_id' => '3',  'directory' => '/sem-gluten/sopa-feijao/sopa-feijao_3.jpg'],
            ['product_id' => '1317',    'image_id' => '4',  'directory' => '/sem-gluten/sopa-feijao/sopa-feijao_4.jpg'],

            ['product_id' => '1643',    'image_id' => '1',  'directory' => '/sem-gluten/sopa-carne/sopa-carne_1.jpg'],
            ['product_id' => '1643',    'image_id' => '2',  'directory' => '/sem-gluten/sopa-carne/sopa-carne_2.jpg'],
            ['product_id' => '1643',    'image_id' => '3',  'directory' => '/sem-gluten/sopa-carne/sopa-carne_3.jpg'],
            ['product_id' => '1643',    'image_id' => '4',  'directory' => '/sem-gluten/sopa-carne/sopa-carne_4.jpg'],

            ['product_id' => '2968',    'image_id' => '1',  'directory' => '/sem-gluten-vegetariana/pizza-abobrinha/pizza-abobrinha_1.jpg'],
            ['product_id' => '2968',    'image_id' => '2',  'directory' => '/sem-gluten-vegetariana/pizza-abobrinha/pizza-abobrinha_2.jpg'],
            ['product_id' => '2968',    'image_id' => '3',  'directory' => '/sem-gluten-vegetariana/pizza-abobrinha/pizza-abobrinha_3.jpg'],
            ['product_id' => '2968',    'image_id' => '4',  'directory' => '/sem-gluten-vegetariana/pizza-abobrinha/pizza-abobrinha_4.jpg'],

            ['product_id' => '2631',    'image_id' => '1',  'directory' => '/sem-gluten-vegetariana/pizza-abobrinha/pizza-abobrinha_1.jpg'],
            ['product_id' => '2631',    'image_id' => '2',  'directory' => '/sem-gluten-vegetariana/pizza-abobrinha/pizza-abobrinha_2.jpg'],
            ['product_id' => '2631',    'image_id' => '3',  'directory' => '/sem-gluten-vegetariana/pizza-abobrinha/pizza-abobrinha_3.jpg'],
            ['product_id' => '2631',    'image_id' => '4',  'directory' => '/sem-gluten-vegetariana/pizza-abobrinha/pizza-abobrinha_4.jpg'],

            ['product_id' => '2976',    'image_id' => '1',  'directory' => '/sem-gluten-vegetariana/pizza-mussarela/pizza-mussarela_1.jpg'],
            ['product_id' => '2976',    'image_id' => '2',  'directory' => '/sem-gluten-vegetariana/pizza-mussarela/pizza-mussarela_2.jpg'],
            ['product_id' => '2976',    'image_id' => '3',  'directory' => '/sem-gluten-vegetariana/pizza-mussarela/pizza-mussarela_3.jpg'],
            ['product_id' => '2976',    'image_id' => '4',  'directory' => '/sem-gluten-vegetariana/pizza-mussarela/pizza-mussarela_4.jpg'],

            ['product_id' => '2798',    'image_id' => '1',  'directory' => '/sem-gluten-vegetariana/pizza-mussarela/pizza-mussarela_1.jpg'],
            ['product_id' => '2798',    'image_id' => '2',  'directory' => '/sem-gluten-vegetariana/pizza-mussarela/pizza-mussarela_2.jpg'],
            ['product_id' => '2798',    'image_id' => '3',  'directory' => '/sem-gluten-vegetariana/pizza-mussarela/pizza-mussarela_3.jpg'],
            ['product_id' => '2798',    'image_id' => '4',  'directory' => '/sem-gluten-vegetariana/pizza-mussarela/pizza-mussarela_4.jpg'],

            ['product_id' => '2801',    'image_id' => '1',  'directory' => '/sem-gluten-vegetariana/pizza-vegetariana/pizza-vegetariana_1.jpg'],
            ['product_id' => '2801',    'image_id' => '2',  'directory' => '/sem-gluten-vegetariana/pizza-vegetariana/pizza-vegetariana_2.jpg'],
            ['product_id' => '2801',    'image_id' => '3',  'directory' => '/sem-gluten-vegetariana/pizza-vegetariana/pizza-vegetariana_3.jpg'],
            ['product_id' => '2801',    'image_id' => '4',  'directory' => '/sem-gluten-vegetariana/pizza-vegetariana/pizza-vegetariana_4.jpg'],

            ['product_id' => '167',     'image_id' => '1',  'directory' => '/sem-gluten-vegetariana/massa-pastel/massa-pastel_1.jpg'],
            ['product_id' => '167',     'image_id' => '2',  'directory' => '/sem-gluten-vegetariana/massa-pastel/massa-pastel_2.jpg'],
            ['product_id' => '167',     'image_id' => '3',  'directory' => '/sem-gluten-vegetariana/massa-pastel/massa-pastel_3.jpg'],
            ['product_id' => '167',     'image_id' => '4',  'directory' => '/sem-gluten-vegetariana/massa-pastel/massa-pastel_4.jpg'],

            ['product_id' => '159',     'image_id' => '1',  'directory' => '/sem-gluten-vegetariana/massa-pizza/massa-pizza_1.jpg'],
            ['product_id' => '159',     'image_id' => '2',  'directory' => '/sem-gluten-vegetariana/massa-pizza/massa-pizza_2.jpg'],
            ['product_id' => '159',     'image_id' => '3',  'directory' => '/sem-gluten-vegetariana/massa-pizza/massa-pizza_3.jpg'],
            ['product_id' => '159',     'image_id' => '4',  'directory' => '/sem-gluten-vegetariana/massa-pizza/massa-pizza_4.jpg'],

            ['product_id' => '140',     'image_id' => '1',  'directory' => '/sem-gluten-vegetariana/massa-lasanha/massa-lasanha_1.jpg'],
            ['product_id' => '140',     'image_id' => '2',  'directory' => '/sem-gluten-vegetariana/massa-lasanha/massa-lasanha_2.jpg'],
            ['product_id' => '140',     'image_id' => '3',  'directory' => '/sem-gluten-vegetariana/massa-lasanha/massa-lasanha_3.jpg'],
            ['product_id' => '140',     'image_id' => '4',  'directory' => '/sem-gluten-vegetariana/massa-lasanha/massa-lasanha_4.jpg'],

            ['product_id' => '43',      'image_id' => '1',  'directory' => '/sem-gluten-vegetariana/zucca/zucca_1.jpg'],
            ['product_id' => '43',      'image_id' => '2',  'directory' => '/sem-gluten-vegetariana/zucca/zucca_2.jpg'],
            ['product_id' => '43',      'image_id' => '3',  'directory' => '/sem-gluten-vegetariana/zucca/zucca_3.jpg'],
            ['product_id' => '43',      'image_id' => '4',  'directory' => '/sem-gluten-vegetariana/zucca/zucca_4.jpg'],

            ['product_id' => '2429',    'image_id' => '1',  'directory' => '/sem-gluten-vegetariana/zucca/zucca_1.jpg'],
            ['product_id' => '2429',    'image_id' => '2',  'directory' => '/sem-gluten-vegetariana/zucca/zucca_2.jpg'],
            ['product_id' => '2429',    'image_id' => '3',  'directory' => '/sem-gluten-vegetariana/zucca/zucca_3.jpg'],
            ['product_id' => '2429',    'image_id' => '4',  'directory' => '/sem-gluten-vegetariana/zucca/zucca_4.jpg'],

            ['product_id' => '124',     'image_id' => '1',  'directory' => '/sem-gluten-vegetariana/buffalina/buffalina_1.jpg'],
            ['product_id' => '124',     'image_id' => '2',  'directory' => '/sem-gluten-vegetariana/buffalina/buffalina_2.jpg'],
            ['product_id' => '124',     'image_id' => '3',  'directory' => '/sem-gluten-vegetariana/buffalina/buffalina_3.jpg'],
            ['product_id' => '124',     'image_id' => '4',  'directory' => '/sem-gluten-vegetariana/buffalina/buffalina_4.jpg'],

            ['product_id' => '2410',    'image_id' => '1',  'directory' => '/sem-gluten-vegetariana/buffalina/buffalina_1.jpg'],
            ['product_id' => '2410',    'image_id' => '2',  'directory' => '/sem-gluten-vegetariana/buffalina/buffalina_2.jpg'],
            ['product_id' => '2410',    'image_id' => '3',  'directory' => '/sem-gluten-vegetariana/buffalina/buffalina_3.jpg'],
            ['product_id' => '2410',    'image_id' => '4',  'directory' => '/sem-gluten-vegetariana/buffalina/buffalina_4.jpg'],

            ['product_id' => '3093',    'image_id' => '1',  'directory' => '/sem-gluten-vegetariana/tortellone-ricota/tortellone-ricota_1.jpg'],
            ['product_id' => '3093',    'image_id' => '2',  'directory' => '/sem-gluten-vegetariana/tortellone-ricota/tortellone-ricota_2.jpg'],
            ['product_id' => '3093',    'image_id' => '3',  'directory' => '/sem-gluten-vegetariana/tortellone-ricota/tortellone-ricota_3.jpg'],
            ['product_id' => '3093',    'image_id' => '4',  'directory' => '/sem-gluten-vegetariana/tortellone-ricota/tortellone-ricota_4.jpg'],

            ['product_id' => '2933',    'image_id' => '1',  'directory' => '/sem-gluten-vegana/coxinha-poro/coxinha-poro_1.jpg'],
            ['product_id' => '2933',    'image_id' => '2',  'directory' => '/sem-gluten-vegana/coxinha-poro/coxinha-poro_2.jpg'],
            ['product_id' => '2933',    'image_id' => '3',  'directory' => '/sem-gluten-vegana/coxinha-poro/coxinha-poro_3.jpg'],
            ['product_id' => '2933',    'image_id' => '4',  'directory' => '/sem-gluten-vegana/coxinha-poro/coxinha-poro_4.jpg'],

            ['product_id' => '2623',    'image_id' => '1',  'directory' => '/sem-gluten-vegana/coxinha-poro/coxinha-poro_1.jpg'],
            ['product_id' => '2623',    'image_id' => '2',  'directory' => '/sem-gluten-vegana/coxinha-poro/coxinha-poro_2.jpg'],
            ['product_id' => '2623',    'image_id' => '3',  'directory' => '/sem-gluten-vegana/coxinha-poro/coxinha-poro_3.jpg'],
            ['product_id' => '2623',    'image_id' => '4',  'directory' => '/sem-gluten-vegana/coxinha-poro/coxinha-poro_4.jpg'],

            ['product_id' => '2771',    'image_id' => '1',  'directory' => '/sem-gluten-vegana/coxinha-jaca/coxinha-jaca_1.jpg'],
            ['product_id' => '2771',    'image_id' => '2',  'directory' => '/sem-gluten-vegana/coxinha-jaca/coxinha-jaca_2.jpg'],
            ['product_id' => '2771',    'image_id' => '3',  'directory' => '/sem-gluten-vegana/coxinha-jaca/coxinha-jaca_3.jpg'],
            ['product_id' => '2771',    'image_id' => '4',  'directory' => '/sem-gluten-vegana/coxinha-jaca/coxinha-jaca_4.jpg'],

            ['product_id' => '2763',    'image_id' => '1',  'directory' => '/sem-gluten-vegana/coxinha-palmito/coxinha-palmito_1.jpg'],
            ['product_id' => '2763',    'image_id' => '2',  'directory' => '/sem-gluten-vegana/coxinha-palmito/coxinha-palmito_2.jpg'],
            ['product_id' => '2763',    'image_id' => '3',  'directory' => '/sem-gluten-vegana/coxinha-palmito/coxinha-palmito_3.jpg'],
            ['product_id' => '2763',    'image_id' => '4',  'directory' => '/sem-gluten-vegana/coxinha-palmito/coxinha-palmito_4.jpg'],

            ['product_id' => '2379',    'image_id' => '1',  'directory' => '/sem-gluten-vegana/massa-pastel/massa-pastel_1.jpg'],
            ['product_id' => '2379',    'image_id' => '2',  'directory' => '/sem-gluten-vegana/massa-pastel/massa-pastel_2.jpg'],
            ['product_id' => '2379',    'image_id' => '3',  'directory' => '/sem-gluten-vegana/massa-pastel/massa-pastel_3.jpg'],
            ['product_id' => '2379',    'image_id' => '4',  'directory' => '/sem-gluten-vegana/massa-pastel/massa-pastel_4.jpg'],

            ['product_id' => '2895',    'image_id' => '1',  'directory' => '/sem-gluten-vegana/talharine-vegano/talharine-vegano_1.jpg'],
            ['product_id' => '2895',    'image_id' => '2',  'directory' => '/sem-gluten-vegana/talharine-vegano/talharine-vegano_2.jpg'],
            ['product_id' => '2895',    'image_id' => '3',  'directory' => '/sem-gluten-vegana/talharine-vegano/talharine-vegano_3.jpg'],
            ['product_id' => '2895',    'image_id' => '4',  'directory' => '/sem-gluten-vegana/talharine-vegano/talharine-vegano_4.jpg'],

            ['product_id' => '2747',    'image_id' => '1',  'directory' => '/sem-gluten-vegana/massa-lasanha/massa-lasanha_1.jpg'],
            ['product_id' => '2747',    'image_id' => '2',  'directory' => '/sem-gluten-vegana/massa-lasanha/massa-lasanha_2.jpg'],
            ['product_id' => '2747',    'image_id' => '3',  'directory' => '/sem-gluten-vegana/massa-lasanha/massa-lasanha_3.jpg'],
            ['product_id' => '2747',    'image_id' => '4',  'directory' => '/sem-gluten-vegana/massa-lasanha/massa-lasanha_4.jpg'],

            ['product_id' => '2739',    'image_id' => '1',  'directory' => '/sem-gluten-vegana/nhoque-batata-doce/nhoque-batata-doce_1.jpg'],
            ['product_id' => '2739',    'image_id' => '2',  'directory' => '/sem-gluten-vegana/nhoque-batata-doce/nhoque-batata-doce_2.jpg'],
            ['product_id' => '2739',    'image_id' => '3',  'directory' => '/sem-gluten-vegana/nhoque-batata-doce/nhoque-batata-doce_3.jpg'],
            ['product_id' => '2739',    'image_id' => '4',  'directory' => '/sem-gluten-vegana/nhoque-batata-doce/nhoque-batata-doce_4.jpg'],

            ['product_id' => '2712',    'image_id' => '1',  'directory' => '/sem-gluten-vegana/nhoque-batata-doce/nhoque-batata-doce_1.jpg'],
            ['product_id' => '2712',    'image_id' => '2',  'directory' => '/sem-gluten-vegana/nhoque-batata-doce/nhoque-batata-doce_2.jpg'],
            ['product_id' => '2712',    'image_id' => '3',  'directory' => '/sem-gluten-vegana/nhoque-batata-doce/nhoque-batata-doce_3.jpg'],
            ['product_id' => '2712',    'image_id' => '4',  'directory' => '/sem-gluten-vegana/nhoque-batata-doce/nhoque-batata-doce_4.jpg'],

            ['product_id' => '2860',    'image_id' => '1',  'directory' => '/sem-gluten-vegana/tortelline-abobora/tortelline-abobora_1.jpg'],
            ['product_id' => '2860',    'image_id' => '2',  'directory' => '/sem-gluten-vegana/tortelline-abobora/tortelline-abobora_2.jpg'],
            ['product_id' => '2860',    'image_id' => '3',  'directory' => '/sem-gluten-vegana/tortelline-abobora/tortelline-abobora_3.jpg'],
            ['product_id' => '2860',    'image_id' => '4',  'directory' => '/sem-gluten-vegana/tortelline-abobora/tortelline-abobora_4.jpg'],

            ['product_id' => '2649',    'image_id' => '1',  'directory' => '/sem-gluten-vegana/tortelline-abobora/tortelline-abobora_1.jpg'],
            ['product_id' => '2649',    'image_id' => '2',  'directory' => '/sem-gluten-vegana/tortelline-abobora/tortelline-abobora_2.jpg'],
            ['product_id' => '2649',    'image_id' => '3',  'directory' => '/sem-gluten-vegana/tortelline-abobora/tortelline-abobora_3.jpg'],
            ['product_id' => '2649',    'image_id' => '4',  'directory' => '/sem-gluten-vegana/tortelline-abobora/tortelline-abobora_4.jpg'],

            ['product_id' => '2658',    'image_id' => '1',  'directory' => '/sem-gluten-vegana/tortelline-legumes/tortelline-legumes_1.jpg'],
            ['product_id' => '2658',    'image_id' => '2',  'directory' => '/sem-gluten-vegana/tortelline-legumes/tortelline-legumes_2.jpg'],
            ['product_id' => '2658',    'image_id' => '3',  'directory' => '/sem-gluten-vegana/tortelline-legumes/tortelline-legumes_3.jpg'],
            ['product_id' => '2658',    'image_id' => '4',  'directory' => '/sem-gluten-vegana/tortelline-legumes/tortelline-legumes_4.jpg'],

            ['product_id' => '3085',    'image_id' => '1',  'directory' => '/sem-gluten-vegana/sopa-mandioquinha/sopa-mandioquinha_1.jpg'],
            ['product_id' => '3085',    'image_id' => '2',  'directory' => '/sem-gluten-vegana/sopa-mandioquinha/sopa-mandioquinha_2.jpg'],
            ['product_id' => '3085',    'image_id' => '3',  'directory' => '/sem-gluten-vegana/sopa-mandioquinha/sopa-mandioquinha_3.jpg'],
            ['product_id' => '3085',    'image_id' => '4',  'directory' => '/sem-gluten-vegana/sopa-mandioquinha/sopa-mandioquinha_4.jpg'],

            ['product_id' => '3009',    'image_id' => '1',  'directory' => '/sem-gluten-vegana/molho-tomate/molho-tomate_1.jpg'],
            ['product_id' => '3009',    'image_id' => '2',  'directory' => '/sem-gluten-vegana/molho-tomate/molho-tomate_2.jpg'],
            ['product_id' => '3009',    'image_id' => '3',  'directory' => '/sem-gluten-vegana/molho-tomate/molho-tomate_3.jpg'],
            ['product_id' => '3009',    'image_id' => '4',  'directory' => '/sem-gluten-vegana/molho-tomate/molho-tomate_4.jpg'],

        ];

        foreach($lines as $line){
            ProductImage::create($line);
        }
    }
}
