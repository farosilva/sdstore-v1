<?php

use Illuminate\Database\Seeder;
use App\Models\ProductImage;

class ProductImageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $lines = [
            ['sku' => 'STOD19', 'image_id' => '1', 'directory' => 'sem-gluten/ravioli-carne/ravioli-carne_1.jpg'],

            ['sku' => 'STOD43', 'image_id' => '1', 'directory' => 'sem-gluten-vegetariana/zucca/zucca_1.jpg'],

            ['sku' => 'STOD86', 'image_id' => '1', 'directory' => 'sem-gluten/rondeli-paleta/rondeli-paleta_1.jpg'],

            ['sku' => 'STOD124', 'image_id' => '1', 'directory' => 'sem-gluten-vegetariana/buffalina/buffalina_1.jpg'],

            ['sku' => 'STOD140', 'image_id' => '1', 'directory' => 'sem-gluten-vegetariana/massa-lasanha/massa-lasanha_1.jpg'],

            ['sku' => 'STOD159', 'image_id' => '1', 'directory' => 'sem-gluten-vegetariana/massa-pizza/massa-pizza_1.jpg'],

            ['sku' => 'STOD167', 'image_id' => '1', 'directory' => 'sem-gluten-vegetariana/massa-pastel/massa-pastel_1.jpg'],

            ['sku' => 'STOD1317', 'image_id' => '1', 'directory' => 'sem-gluten/sopa-feijao/sopa-feijao_1.jpg'],

            ['sku' => 'STOD1643', 'image_id' => '1', 'directory' => 'sem-gluten/sopa-carne/sopa-carne_1.jpg'],

            ['sku' => 'STOD1651', 'image_id' => '1', 'directory' => 'sem-gluten/caldo-verde/caldo-verde_1.jpg'],

            ['sku' => 'STOD1678', 'image_id' => '1', 'directory' => 'sem-gluten/canja-galinha/canja-galinha_1.jpg'],

            ['sku' => 'STOD1927', 'image_id' => '1', 'directory' => 'sem-gluten/coxinha-frango/coxinha-frango_1.jpg'],

            ['sku' => 'STOD2379', 'image_id' => '1', 'directory' => 'sem-gluten-vegana/massa-pastel/massa-pastel_1.jpg'],

            ['sku' => 'STOD2410', 'image_id' => '1', 'directory' => 'sem-gluten-vegetariana/buffalina/buffalina_1.jpg'],

            ['sku' => 'STOD2429', 'image_id' => '1', 'directory' => 'sem-gluten-vegetariana/zucca/zucca_1.jpg'],

            ['sku' => 'STOD2437', 'image_id' => '1', 'directory' => 'sem-gluten/rondeli-paleta/rondeli-paleta_1.jpg'],

            ['sku' => 'STOD2445', 'image_id' => '1', 'directory' => 'sem-gluten/ravioli-carne/ravioli-carne_1.jpg'],

            ['sku' => 'STOD2623', 'image_id' => '1', 'directory' => 'sem-gluten-vegana/coxinha-poro/coxinha-poro_1.jpg'],

            ['sku' => 'STOD2631', 'image_id' => '1', 'directory' => 'sem-gluten-vegetariana/pizza-abobrinha/pizza-abobrinha_1.jpg'],

            ['sku' => 'STOD2649', 'image_id' => '1', 'directory' => 'sem-gluten-vegana/tortelline-abobora/tortelline-abobora_1.jpg'],

            ['sku' => 'STOD2658', 'image_id' => '1', 'directory' => 'sem-gluten-vegana/tortelline-legumes/tortelline-legumes_1.jpg'],

            ['sku' => 'STOD2682', 'image_id' => '1', 'directory' => 'sem-gluten/ravioli-frango/ravioli-frango_1.jpg'],

            ['sku' => 'STOD2712', 'image_id' => '1', 'directory' => 'sem-gluten-vegana/nhoque-batata-doce/nhoque-batata-doce_1.jpg'],

            ['sku' => 'STOD2739', 'image_id' => '1', 'directory' => 'sem-gluten-vegana/nhoque-batata-doce/nhoque-batata-doce_1.jpg'],

            ['sku' => 'STOD2747', 'image_id' => '1', 'directory' => 'sem-gluten-vegana/massa-lasanha/massa-lasanha_1.jpg'],

            ['sku' => 'STOD2763', 'image_id' => '1', 'directory' => 'sem-gluten-vegana/coxinha-palmito/coxinha-palmito_1.jpg'],

            ['sku' => 'STOD2771', 'image_id' => '1', 'directory' => 'sem-gluten-vegana/coxinha-jaca/coxinha-jaca_1.jpg'],

            ['sku' => 'STOD2798', 'image_id' => '1', 'directory' => 'sem-gluten-vegetariana/pizza-mussarela/pizza-mussarela_1.jpg'],

            ['sku' => 'STOD2801', 'image_id' => '1', 'directory' => 'sem-gluten-vegetariana/pizza-vegetariana/pizza-vegetariana_1.jpg'],

            ['sku' => 'STOD2860', 'image_id' => '1', 'directory' => 'sem-gluten-vegana/tortelline-abobora/tortelline-abobora_1.jpg'],

            ['sku' => 'STOD2895', 'image_id' => '1', 'directory' => 'sem-gluten-vegana/talharine-vegano/talharine-vegano_1.jpg'],

            ['sku' => 'STOD2925', 'image_id' => '1', 'directory' => 'sem-gluten/coxinha-frango/coxinha-frango_1.jpg'],

            ['sku' => 'STOD2933', 'image_id' => '1', 'directory' => 'sem-gluten-vegana/coxinha-poro/coxinha-poro_1.jpg'],

            ['sku' => 'STOD2968', 'image_id' => '1', 'directory' => 'sem-gluten-vegetariana/pizza-abobrinha/pizza-abobrinha_1.jpg'],

            ['sku' => 'STOD2976', 'image_id' => '1', 'directory' => 'sem-gluten-vegetariana/pizza-mussarela/pizza-mussarela_1.jpg'],

            ['sku' => 'STOD3009', 'image_id' => '1', 'directory' => 'sem-gluten-vegana/molho-tomate/molho-tomate_1.jpg'],

            ['sku' => 'STOD3085', 'image_id' => '1', 'directory' => 'sem-gluten-vegana/sopa-mandioquinha/sopa-mandioquinha_1.jpg'],

            ['sku' => 'STOD3093', 'image_id' => '1', 'directory' => 'sem-gluten-vegetariana/tortellone-ricota/tortellone-ricota_1.jpg'],

            ['sku' => 'STOD9999', 'image_id' => '1', 'directory' => 'sem-gluten/cacao-molho-batatas/cacao-molho-batatas_1.jpg'],

            ['sku' => 'STOD9998', 'image_id' => '1', 'directory' => 'sem-gluten/carne-assada-legumes/carne-assada-legumes_1.jpg'],

            ['sku' => 'STOD9997', 'image_id' => '1', 'directory' => 'sem-gluten/frango-creme-milho/frango-creme-milho_1.jpg'],
        ];

        foreach($lines as $line){
            ProductImage::create($line);
        }
    }
}
