<?php

use Illuminate\Database\Seeder;
use App\Models\Product;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $lines = [
            ['product_id' => '1', 'name' => 'Buffalina', 'status' => 'A'],
            ['product_id' => '2', 'name' => 'Caldo Verde', 'status' => 'A'],
            ['product_id' => '3', 'name' => 'Canja de Galinha', 'status' => 'A'],
            ['product_id' => '4', 'name' => 'Coxinha de Frango com Requeijão', 'status' => 'A'],
            ['product_id' => '5', 'name' => 'Coxinha Vegana de Alho Poró', 'status' => 'A'],
            ['product_id' => '6', 'name' => 'Coxinha Vegana de Carne de Jaca', 'status' => 'A'],
            ['product_id' => '7', 'name' => 'Coxinha Vegana de Palmito', 'status' => 'A'],
            ['product_id' => '8', 'name' => 'Massa de Lasanha', 'status' => 'A'],
            ['product_id' => '9', 'name' => 'Massa para Pastel', 'status' => 'A'],
            ['product_id' => '10', 'name' => 'Massa para Pizza', 'status' => 'A'],
            ['product_id' => '11', 'name' => 'Massa Vegana para Lasanha', 'status' => 'A'],
            ['product_id' => '12', 'name' => 'Massa Vegana para Pastel', 'status' => 'A'],
            ['product_id' => '13', 'name' => 'Molho de Tomate', 'status' => 'A'],
            ['product_id' => '14', 'name' => 'Nhoque Vegano de Batata Doce', 'status' => 'A'],
            ['product_id' => '15', 'name' => 'Pizza de Abobrinha', 'status' => 'A'],
            ['product_id' => '16', 'name' => 'Pizza Mussarela', 'status' => 'A'],
            ['product_id' => '17', 'name' => 'Pizza Vegetariana Integral', 'status' => 'A'],
            ['product_id' => '18', 'name' => 'Ravioli de Carne', 'status' => 'A'],
            ['product_id' => '19', 'name' => 'Ravioli de Frango', 'status' => 'A'],
            ['product_id' => '20', 'name' => 'Rondeli de Paleta Defumada', 'status' => 'A'],
            ['product_id' => '21', 'name' => 'Sopa de Feijão', 'status' => 'A'],
            ['product_id' => '22', 'name' => 'Sopa de Legumes com Carne', 'status' => 'A'],
            ['product_id' => '23', 'name' => 'Sopa de Mandioquinha', 'status' => 'A'],
            ['product_id' => '24', 'name' => 'Talharine Vegano', 'status' => 'A'],
            ['product_id' => '25', 'name' => 'Tortelline Vegano de Abóbora', 'status' => 'A'],
            ['product_id' => '26', 'name' => 'Tortelline Vegano de Legumes', 'status' => 'A'],
            ['product_id' => '27', 'name' => 'Tortellone de Ricota', 'status' => 'A'],
            ['product_id' => '28', 'name' => 'Zucca', 'status' => 'A'],
            ['product_id' => '29', 'name' => 'Cação ao Molho de Tomate com Batatas', 'status' => 'A'],
            ['product_id' => '30', 'name' => 'Carne Assada com Seleta de Legumes', 'status' => 'A'],
            ['product_id' => '31', 'name' => 'Filé de Sobrecoxa com Creme de Milho e Brócolis', 'status' => 'A'],
            ['product_id' => '32', 'name' => 'Pão de Queijo Tradicional', 'status' => 'A'],
            ['product_id' => '33', 'name' => 'Pão de Queijo Gourmet', 'status' => 'A'],
            ['product_id' => '34', 'name' => 'Pão de Queijo Multigrãos', 'status' => 'A'],
            ['product_id' => '35', 'name' => 'Tortinha Integral de Frango com Espinafre', 'status' => 'A'],
            ['product_id' => '36', 'name' => 'Quiche Integral de Ricota com Cebolinha', 'status' => 'A'],
            ['product_id' => '37', 'name' => 'Croissant Integral Peito de Peru com Qjo Branco', 'status' => 'A'],
            ['product_id' => '37', 'name' => 'Croissant Integral Ricota com Cebolinha', 'status' => 'A'],
            ['product_id' => '', 'name' => '', 'status' => 'A'],
            ['product_id' => '', 'name' => '', 'status' => 'A'],
            ['product_id' => '', 'name' => '', 'status' => 'A'],
            ['product_id' => '', 'name' => '', 'status' => 'A'],
            ['product_id' => '', 'name' => '', 'status' => 'A'],
            ['product_id' => '', 'name' => '', 'status' => 'A'],
            ['product_id' => '', 'name' => '', 'status' => 'A'],
        ];

        foreach($lines as $line){
            Product::create($line);
        }
    }
}
