<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;
use hash;


class dumy extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert([
            [
                'title'             => 'Tesla',
                'slug'              => 'tesla',
                'status'            => 1,
                'parent'            => 0,
                'feature'           => 1,
            ],
            [
                'title'             => 'Toyota',
                'slug'              => 'toyota',
                'status'            => 1,
                'parent'            => 0,
                'feature'           => 1,
            ],
            [
                'title'             => 'Samsung',
                'slug'              => 'samsung',
                'status'            => 1,
                'parent'            => 0,
                'feature'           => 1,
            ],
            [
                'title'             => 'Iphone',
                'slug'              => 'iphone',
                'status'            => 1,
                'parent'            => 0,
                'feature'           => 1,
            ],
            [
                'title'             => 'Intel',
                'slug'              => 'intel',
                'status'            => 1,
                'parent'            => 0,
                'feature'           => 1,
            ],
        ]);
        DB::table('brands')->insert([
            [
                'title'             => 'Tesla',
                'slug'              => 'tesla',
                'status'            => 1,
                'logo'              => 'default.jpg',
            ],
            [
                'title'             => 'Toyota',
                'slug'              => 'toyota',
                'status'            => 1,
                'logo'              => 'default.jpg',
            ],
            [
                'title'             => 'Samsung',
                'slug'              => 'samsung',
                'status'            => 1,
                'logo'              => 'default.jpg',
            ],
            [
                'title'             => 'Iphone',
                'slug'              => 'iphone',
                'status'            => 1,
                'logo'              => 'default.jpg',
            ],
            [
                'title'             => 'Intel',
                'slug'              => 'intel',
                'status'            => 1,
                'logo'              => 'default.jpg',
            ],
        ]);
        DB::table('colors')->insert([
            [
                'title'             => 'Red',
            ],
            [
                'title'             => 'Blue',
            ],
            [
                'title'             => 'Yellow',
            ],
            [
                'title'             => 'Green',
            ],
            [
                'title'             => 'White',
            ],
        ]);
        DB::table('sliders')->insert([
            [
                'title'     => 'Top Selling Company',
                'slug'      => 'Top-selling-company',
                'desc'      => 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Est aut esse ad velit cupiditate iure totam consequatur incidunt error quisquam?',
                'btn_text'  => 'Order Now',
                'btn_link'  => '#',
                'status'    => 1,
                'image'     => 'default.jpg',
            ],
            [
                'title'     => 'Top Selling Company',
                'slug'      => 'Top-selling-company',
                'desc'      => 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Est aut esse ad velit cupiditate iure totam consequatur incidunt error quisquam?',
                'btn_text'  => 'Order Now',
                'btn_link'  => '#',
                'status'    => 1,
                'image'     => 'default.jpg',
            ],
            [
                'title'     => 'Top Selling Company',
                'slug'      => 'Top-selling-company',
                'desc'      => 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Est aut esse ad velit cupiditate iure totam consequatur incidunt error quisquam?',
                'btn_text'  => 'Order Now',
                'btn_link'  => '#',
                'status'    => 1,
                'image'     => 'default.jpg',
            ],
        ]);
        DB::table('baners')->insert([
            [
                'title'     => 'Top Selling Company',
                'slug'      => 'Top-selling-company',
                'desc'      => 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Est aut esse ad velit cupiditate iure totam consequatur incidunt error quisquam?',
                'btn_text'  => 'Order Now',
                'btn_link'  => '#',
                'status'    => 1,
                'image'     => 'default.jpg',
                'subtitle'  => 'Lorem ipsum, dolor sit amet consectetur',
                'price'     => '250',
                'position'  => '1',
            ],
            [
                'title'     => 'Top Selling Company',
                'slug'      => 'Top-selling-company',
                'desc'      => 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Est aut esse ad velit cupiditate iure totam consequatur incidunt error quisquam?',
                'btn_text'  => 'Order Now',
                'btn_link'  => '#',
                'status'    => 1,
                'image'     => 'default.jpg',
                'subtitle'  => 'Lorem ipsum, dolor sit amet consectetur',
                'price'     => '250',
                'position'  => '2',
            ],
        ]);
        DB::table('featureds')->insert([
            [
                'title'     => 'Top Selling Company',
                'slug'      => 'Top-selling-company',
                'btn_text'  => 'Order Now',
                'btn_link'  => '#',
                'status'    => 1,
                'image'     => 'default.jpg',
            ],
            [
                'title'     => 'Top Selling Company',
                'slug'      => 'Top-selling-company',
                'btn_text'  => 'Order Now',
                'btn_link'  => '#',
                'status'    => 1,
                'image'     => 'default.jpg',
            ],
            [
                'title'     => 'Top Selling Company',
                'slug'      => 'Top-selling-company',
                'btn_text'  => 'Order Now',
                'btn_link'  => '#',
                'status'    => 1,
                'image'     => 'default.jpg',
            ],
        ]);
        DB::table('countries')->insert([
            [
                'name'     => 'Bangladesh',
                'priority' => 1,
                'status'   => 1,
            ],
            [
                'name'     => 'India',
                'priority' => 2,
                'status'   => 1,
            ],
            [
                'name'     => 'Pakistan',
                'priority' => 3,
                'status'   => 1,
            ],
        ]);
        DB::table('states')->insert([
            [
                'name'     => 'Sylhet',
                'country'    => 1,
                'status'   => 1,
            ],
            [
                'name'     => 'Dhaka',
                'country'    => 1,
                'status'   => 1,
            ]
        ]);
        DB::table('cities')->insert([
            [
                'name'     => 'Sylhet',
                'state' => 1,
                'status'   => 1,
            ],
            [
                'name'     => 'Sreemangal',
                'state' => 2,
                'status'   => 1,
            ],
            [
                'name'     => 'Magura',
                'state' => 3,
                'status'   => 1,
            ],
        ]);
        DB::table('webinfos')->insert([
            'title'             => 'MSA Rahat',
            'description'       => 'Outstock is a premium Templates theme',
            'favicon'           => 'default.jpg',
            'logo'              => 'default.jpg',
            'site_url'          => '',
        ]);
        DB::table('contactinfos')->insert([
            'address'           => '1234 Heaven Stress, Beverly Hill, Melbourne, USA.',
            'email'             => 'Contact@erentheme.com',
            'phone_one'         => '(800) 123 456 789',
            'phone_two'         => '(800) 987 654 321',
            'description'       => 'Outstock is a premium Templates theme with advanced admin module. It’s extremely customizable, easy to use and fully responsive and retina ready. Vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent luptatum zzril delenit augue duis dolore te feugait nulla facilisi.',
            'facebook'          => 'https://www.facebook.com/',
            'twitter'           => 'https://www.twitter.com/',
            'dribbble'          => 'https://www.dribbble.com/',
            'behance'           => 'https://www.behance.com/',
            'map_api'           => 'https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d14478.041320327731!2d91.88062475!3d24.8805685!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sen!2sbd!4v1622477092380!5m2!1sen!2sbd',
        ]);
        DB::table('footers')->insert([
            'logo'                  => 'default.jpg',
            'description'           => 'Outstock is a premium Templates theme with advanced admin module. It’s extremely customizable, easy to use and fully responsive and retina ready. Vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent luptatum zzril delenit augue duis dolore te feugait nulla facilisi.',
            'email'                 => 'Contact@erentheme.com',
            'address'               => '1234 Heaven Stress, Beverly Hill, Melbourne, USA.',
            'phone'                 => '(800) 123 456 789',
            'copywrite'             => 'CopyWrite Belongs To MSA Inddustry',
            'title_one'             => 'Info',
            'title_one_desc'        => '<li><a href="#">MSA Rahat</a></li>',
            'title_two'             => 'Info 2',
            'title_two_desc'        => '<li><a href="#">MSA Rahat</a></li>',
            'facebook'          => 'https://www.facebook.com/',
            'twitter'           => 'https://www.twitter.com/',
            'dribbble'          => 'https://www.dribbble.com/',
            'behance'           => 'https://www.behance.com/',
        ]);
        DB::table('pageheaders')->insert([
            [
                'title'             => 'Account',
                'breadcrumbs'       => 'Account',
                'page'              => 'Account',
                'visibility'        => '1',
                'image'             => 'default.jpg',
                'tab'               => 'Account',
                'meta_title'        => 'Account',
                'description'       => 'Account',
                'tag'               => 'Account',
            ],
            [
                'title'             => 'Shop',
                'breadcrumbs'       => 'Shop',
                'page'              => 'Shop',
                'visibility'        => '1',
                'image'             => 'default.jpg',
                'tab'               => 'Shop',
                'meta_title'        => 'Shop',
                'description'       => 'Shop',
                'tag'               => 'Shop',
            ],
            [
                'title'             => 'Product Search',
                'breadcrumbs'       => 'Product Search',
                'page'              => 'product-search ',
                'visibility'        => '1',
                'image'             => 'default.jpg',
                'tab'               => 'Product Search',
                'meta_title'        => 'Product Search',
                'description'       => 'Product Search',
                'tag'               => 'Product Search',
            ],
            [
                'title'             => 'Product Details',
                'breadcrumbs'       => 'Product Details',
                'page'              => 'product-details',
                'visibility'        => '1',
                'image'             => 'default.jpg',
                'tab'               => 'Product Details',
                'meta_title'        => 'Product Details',
                'description'       => 'Product Details',
                'tag'               => 'Product Details',
            ],
            [
                'title'             => 'Cart',
                'breadcrumbs'       => 'Cart',
                'page'              => 'Cart',
                'visibility'        => '1',
                'image'             => 'default.jpg',
                'tab'               => 'Cart',
                'meta_title'        => 'Cart',
                'description'       => 'Cart',
                'tag'               => 'Cart',
            ],
            [
                'title'             => 'Login',
                'breadcrumbs'       => 'Login',
                'page'              => 'Login',
                'visibility'        => '1',
                'image'             => 'default.jpg',
                'tab'               => 'Login',
                'meta_title'        => 'Login',
                'description'       => 'Login',
                'tag'               => 'Login',
            ],
            [
                'title'             => 'Register',
                'breadcrumbs'       => 'Register',
                'page'              => 'Register',
                'visibility'        => '1',
                'image'             => 'default.jpg',
                'tab'               => 'Register',
                'meta_title'        => 'Register',
                'description'       => 'Register',
                'tag'               => 'Register',
            ],
            [
                'title'             => 'Forget Password',
                'breadcrumbs'       => 'Forget Password',
                'page'              => 'Forget-Password',
                'visibility'        => '1',
                'image'             => 'default.jpg',
                'tab'               => 'Forget Password',
                'meta_title'        => 'Forget Password',
                'description'       => 'Forget Password',
                'tag'               => 'Forget Password',
            ],
            [
                'title'             => 'Checkout',
                'breadcrumbs'       => 'Checkout',
                'page'              => 'Checkout',
                'visibility'        => '1',
                'image'             => 'default.jpg',
                'tab'               => 'Checkout',
                'meta_title'        => 'Checkout',
                'description'       => 'Checkout',
                'tag'               => 'Checkout',
            ],
            [
                'title'             => 'Blog Search',
                'breadcrumbs'       => 'Blog Search',
                'page'              => 'blog-search',
                'visibility'        => '1',
                'image'             => 'default.jpg',
                'tab'               => 'Blog Search',
                'meta_title'        => 'Blog Search',
                'description'       => 'Blog Search',
                'tag'               => 'Blog Search',
            ],
            [
                'title'             => 'Blog',
                'breadcrumbs'       => 'Blog',
                'page'              => 'Blog',
                'visibility'        => '1',
                'image'             => 'default.jpg',
                'tab'               => 'Blog',
                'meta_title'        => 'Blog',
                'description'       => 'Blog',
                'tag'               => 'Blog',
            ],
            [
                'title'             => 'Page Not Found',
                'breadcrumbs'       => 'Page Not Found',
                'page'              => '404',
                'visibility'        => '1',
                'image'             => 'default.jpg',
                'tab'               => 'Page Not Found',
                'meta_title'        => 'Page Not Found',
                'description'       => 'Page Not Found',
                'tag'               => 'Page Not Found',
            ],
            [
                'title'             => 'Contact',
                'breadcrumbs'       => 'Contact',
                'page'              => 'contact',
                'visibility'        => '1',
                'image'             => 'default.jpg',
                'tab'               => 'Contact',
                'meta_title'        => 'Contact',
                'description'       => 'Contact',
                'tag'               => 'Contact',
            ],
            [
                'title'             => 'Home',
                'breadcrumbs'       => 'Home',
                'page'              => 'home',
                'visibility'        => '1',
                'image'             => 'default.jpg',
                'tab'               => 'Home',
                'meta_title'        => 'Home',
                'description'       => 'Home',
                'tag'               => 'Home',
            ],
        ]);
        DB::table('headertitles')->insert([
            [
                'title'             => 'Sale Off MSA',
                'subtitle'          => 'Mirum est notare quam littera gothica quam nunc putamus parum claram!',
                'position'          => 'sale',
            ],
            [
                'title'             => 'Get Discount Info MSA',
                'subtitle'          => 'Mirum est notare quam littera gothica quam nunc putamus parum claram!',
                'position'          => 'newsletter',
            ],
            [
                'title'             => 'Our Blog Posts MSA',
                'subtitle'          => 'Mirum est notare quam littera gothica quam nunc putamus parum claram!',
                'position'          => 'blog',
            ],
            [
                'title'             => 'Trending Products MSA',
                'subtitle'          => 'Mirum est notare quam littera gothica quam nunc putamus parum claram!',
                'position'          => 'trending',
            ],
        ]);
        DB::table('users')->insert([
            'name' => 'MSA Rahat',
            'email' => 'justshamsulalom@gmail.com',
            'password' => bcrypt('justshamsulalom'),
        ]);
        $faker  = Faker::create();
        foreach( range(1,20) as $index ){
            DB::table('products')->insert([
                'title'         => $faker->sentence($nbWords = 6, $variableNbWords = true),
                'slug'          => $faker->sentence($nbWords = 6, $variableNbWords = true),
                'short_desc'    => $faker->paragraph($nbSentences = 10, $variableNbSentences = true),
                'desc'          => $faker->paragraph($nbSentences = 50, $variableNbSentences = true),
                'price'         => 1050,
                'quantity'      => 20,
                'sku'           => 'SM-280',
                'featured'      => 1,
                'status'        => 1,
                'brand'         => 1,
                'category'      => 1,
                'primary'       => 'default.jpg',
            ]);
        }
        foreach( range(1,20) as $index ){
            DB::table('posts')->insert([
                'title'         => $faker->sentence($nbWords = 6, $variableNbWords = true),
                'slug'          => $faker->sentence($nbWords = 6, $variableNbWords = true),
                'desc'          => $faker->paragraph($nbSentences = 50, $variableNbSentences = true),
                'author'        => 1,
                'category'      => 1,
                'brand'         => 1,
                'status'        => 1,
                'image'         => 'default.jpg',
                'created_at'         => $faker->date(),
            ]);
        }
        foreach( range(1,100) as $index ){
            DB::table('customers')->insert([
                'name'          => $faker->name,
                'email'         => $faker->unique()->safeEmail,
                'password'      => encrypt('password'),
                'image'         => 'default.jpg',
                'created_at'    => $faker->dateTimeBetween('-6 month','+6 month'),
            ]);
        }
    }
}
