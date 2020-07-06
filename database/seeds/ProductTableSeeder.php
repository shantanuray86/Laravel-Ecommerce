<?php

use Illuminate\Database\Seeder;

class ProductTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $product = new \App\Product([
        	'title'=>"Book1",
        	'price'=>200,
        	'description'=>"Lorem ipsum. In publishing and graphic design, lorem ipsum is a placeholder text commonly used to demonstrate the visual form of a document or a typeface without relying on meaningful content.",
        	'imagePath'=>'http://ecx.images-amazon.com/images/I/51ZU%2BCvkTyL.jpg'

        	]);
        $product->save();

        $product = new \App\Product([
        	'title'=>"Book2",
        	'price'=>200,
        	'description'=>"Lorem ipsum. In publishing and graphic design, lorem ipsum is a placeholder text commonly used to demonstrate the visual form of a document or a typeface without relying on meaningful content.",
        	'imagePath'=>'http://ecx.images-amazon.com/images/I/51ZU%2BCvkTyL.jpg'

        	]);
        $product->save();

        $product = new \App\Product([
        	'title'=>"Book3",
        	'price'=>200,
        	'description'=>"Lorem ipsum. In publishing and graphic design, lorem ipsum is a placeholder text commonly used to demonstrate the visual form of a document or a typeface without relying on meaningful content.",
        	'imagePath'=>'http://ecx.images-amazon.com/images/I/51ZU%2BCvkTyL.jpg'

        	]);
        $product->save();

        $product = new \App\Product([
        	'title'=>"Book4",
        	'price'=>200,
        	'description'=>"Lorem ipsum. In publishing and graphic design, lorem ipsum is a placeholder text commonly used to demonstrate the visual form of a document or a typeface without relying on meaningful content.",
        	'imagePath'=>'http://ecx.images-amazon.com/images/I/51ZU%2BCvkTyL.jpg'

        	]);
        $product->save();

        $product = new \App\Product([
        	'title'=>"Book5",
        	'price'=>200,
        	'description'=>"Lorem ipsum. In publishing and graphic design, lorem ipsum is a placeholder text commonly used to demonstrate the visual form of a document or a typeface without relying on meaningful content.",
        	'imagePath'=>'http://ecx.images-amazon.com/images/I/51ZU%2BCvkTyL.jpg'

        	]);
        $product->save();

        $product = new \App\Product([
        	'title'=>"Book6",
        	'price'=>200,
        	'description'=>"Lorem ipsum. In publishing and graphic design, lorem ipsum is a placeholder text commonly used to demonstrate the visual form of a document or a typeface without relying on meaningful content.",
        	'imagePath'=>'http://ecx.images-amazon.com/images/I/51ZU%2BCvkTyL.jpg'

        	]);
        $product->save();

        $product = new \App\Product([
        	'title'=>"Book7",
        	'price'=>200,
        	'description'=>"Lorem ipsum. In publishing and graphic design, lorem ipsum is a placeholder text commonly used to demonstrate the visual form of a document or a typeface without relying on meaningful content.",
        	'imagePath'=>'http://ecx.images-amazon.com/images/I/51ZU%2BCvkTyL.jpg'

        	]);
        $product->save();

        $product = new \App\Product([
        	'title'=>"Book8",
        	'price'=>200,
        	'description'=>"Lorem ipsum. In publishing and graphic design, lorem ipsum is a placeholder text commonly used to demonstrate the visual form of a document or a typeface without relying on meaningful content.",
        	'imagePath'=>'http://ecx.images-amazon.com/images/I/51ZU%2BCvkTyL.jpg'

        	]);
        $product->save();
    }
}
