<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Carbon\Carbon;
use DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'JC',
            'id' => '1',
            'email' => 'jlunardini@me.com',
            'password' => bcrypt('eminem94'),
        ]);

        DB::table('threads')->insert([
            'id' => '1',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'brand' => 'Naked & Famous',
            'size' => '28',
            'style' => 'Cobra Black',
            'purchased' => '2020',
            'worn' => '0',
            'washed' => '0',
            'user_id' => '1',
            'category' => 'Jeans',
        ]);

        DB::table('threads')->insert([
            'id' => '3',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'brand' => 'Naked & Famous',
            'size' => '28',
            'style' => 'Ash Black Super Guy',
            'purchased' => '2020',
            'worn' => '0',
            'washed' => '0',
            'user_id' => '1',
            'category' => 'Jeans',
        ]);

        DB::table('threads')->insert([
            'id' => '4',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'brand' => 'Unbranded',
            'size' => '28',
            'style' => 'UB144 Skinny Fit',
            'purchased' => '2020',
            'worn' => '0',
            'washed' => '0',
            'user_id' => '1',
            'category' => 'Jeans',
        ]);

        DB::table('threads')->insert([
            'id' => '2',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'brand' => 'Gliden',
            'size' => 'S',
            'style' => 'Black V-Neck',
            'purchased' => '2021',
            'worn' => '0',
            'washed' => '0',
            'user_id' => '1',
            'category' => 'Shirt',
        ]);

        DB::table('threads')->insert([
            'id' => '5',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'brand' => 'Blundstone',
            'size' => '9',
            'style' => "#558 Men's Classics",
            'purchased' => '2021',
            'worn' => '0',
            'washed' => '0',
            'user_id' => '1',
            'category' => 'Kicks',
        ]);

        DB::table('threads')->insert([
            'id' => '6',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'brand' => 'Nike',
            'size' => '9.5',
            'style' => 'Flex Contact 3',
            'purchased' => '2021',
            'worn' => '0',
            'washed' => '0',
            'user_id' => '1',
            'category' => 'Kicks',
        ]);

        DB::table('threads')->insert([
            'id' => '7',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'brand' => 'UGG',
            'size' => '9.5',
            'style' => 'Classic Bailey II',
            'purchased' => '2020',
            'worn' => '0',
            'washed' => '0',
            'user_id' => '1',
            'category' => 'Kicks',
        ]);
        DB::table('threads')->insert([
            'id' => '8',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'brand' => 'Glidden',
            'size' => 'S',
            'style' => 'Pink Floyd',
            'purchased' => '2020',
            'worn' => '0',
            'washed' => '0',
            'user_id' => '1',
            'category' => 'Shirt',
        ]);
        DB::table('threads')->insert([
            'id' => '9',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'brand' => 'Theory',
            'size' => 'S',
            'style' => 'Black Crewneck',
            'purchased' => '2021',
            'worn' => '0',
            'washed' => '0',
            'user_id' => '1',
            'category' => 'Shirt',
        ]);
        DB::table('threads')->insert([
            'id' => '10',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'brand' => 'Canvas',
            'size' => 'S',
            'style' => 'Paradox Brewery',
            'purchased' => '2021',
            'worn' => '0',
            'washed' => '0',
            'user_id' => '1',
            'category' => 'Shirt',
        ]);
        DB::table('threads')->insert([
            'id' => '11',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'brand' => 'Paul Smith',
            'size' => 'S',
            'style' => 'Black Logo Tee',
            'purchased' => '2021',
            'worn' => '0',
            'washed' => '0',
            'user_id' => '1',
            'category' => 'Shirt',
        ]);
        DB::table('threads')->insert([
            'id' => '12',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'brand' => 'Canvas',
            'size' => 'S',
            'style' => 'Gesaffelstein Tour Shirt',
            'purchased' => '2020',
            'worn' => '0',
            'washed' => '0',
            'user_id' => '1',
            'category' => 'Shirt',
        ]);
        DB::table('threads')->insert([
            'id' => '13',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'brand' => 'American Apparel',
            'size' => 'S',
            'style' => 'Barbicide T-Shirt',
            'purchased' => '2020',
            'worn' => '0',
            'washed' => '0',
            'user_id' => '1',
            'category' => 'Shirt',
        ]);
        DB::table('threads')->insert([
            'id' => '14',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'brand' => 'Uniqlo',
            'size' => 'S',
            'style' => 'V-Neck',
            'purchased' => '2019',
            'worn' => '0',
            'washed' => '0',
            'user_id' => '1',
            'category' => 'Shirt',
        ]);
        DB::table('threads')->insert([
            'id' => '15',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'brand' => 'HBA',
            'size' => 'S',
            'style' => 'Box Logo Black',
            'purchased' => '2019',
            'worn' => '0',
            'washed' => '0',
            'user_id' => '1',
            'category' => 'Sweater',
        ]);
        DB::table('threads')->insert([
            'id' => '16',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'brand' => 'The Simpsons',
            'size' => 'S',
            'style' => 'Pink Bart',
            'purchased' => '2017',
            'worn' => '0',
            'washed' => '0',
            'user_id' => '1',
            'category' => 'Sweater',
        ]);
        DB::table('threads')->insert([
            'id' => '17',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'brand' => 'Mishka',
            'size' => 'S',
            'style' => 'Eyeball Logo Hoodie',
            'purchased' => '2019',
            'worn' => '0',
            'washed' => '0',
            'user_id' => '1',
            'category' => 'Sweater',
        ]);
        DB::table('threads')->insert([
            'id' => '18',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'brand' => 'Adidas',
            'size' => 'S',
            'style' => 'Black Stripe Track Pant',
            'purchased' => '2019',
            'worn' => '0',
            'washed' => '0',
            'user_id' => '1',
            'category' => 'Pants',
        ]);
        DB::table('threads')->insert([
            'id' => '19',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'brand' => 'Patagonia',
            'size' => 'S',
            'style' => 'P-6 Uprisal Sweatpants',
            'purchased' => '2021',
            'worn' => '0',
            'washed' => '0',
            'user_id' => '1',
            'category' => 'Pants',
        ]);
        DB::table('threads')->insert([
            'id' => '20',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'brand' => 'Adidas',
            'size' => 'S',
            'style' => 'White Stripe Track',
            'purchased' => '2019',
            'worn' => '0',
            'washed' => '0',
            'user_id' => '1',
            'category' => 'Pants',
        ]);
        DB::table('threads')->insert([
            'id' => '21',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'brand' => 'Canada Goose',
            'size' => 'XS',
            'style' => 'Chilliwack Bomber',
            'purchased' => '2019',
            'worn' => '0',
            'washed' => '0',
            'user_id' => '1',
            'category' => 'Jacket',
        ]);
        DB::table('threads')->insert([
            'id' => '22',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'brand' => 'Canada Goose',
            'size' => 'S',
            'style' => 'Wascana Rain Jacket',
            'purchased' => '2021',
            'worn' => '0',
            'washed' => '0',
            'user_id' => '1',
            'category' => 'Jacket',
        ]);
        DB::table('threads')->insert([
            'id' => '23',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'brand' => 'Patagonia',
            'size' => 'S',
            'style' => 'Synchilla Jacket',
            'purchased' => '2021',
            'worn' => '0',
            'washed' => '0',
            'user_id' => '1',
            'category' => 'Jacket',
        ]);
        DB::table('fit_tag')->insert([
            'tag_id' => '1',
            'fit_id' => '1',
        ]);
        DB::table('fit_tag')->insert([
            'tag_id' => '2',
            'fit_id' => '2',
        ]);
        DB::table('fit_tag')->insert([
            'tag_id' => '2',
            'fit_id' => '3',
        ]);
        DB::table('fits')->insert([
            'id' => '1',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'user_id' => '1',
            'fit' =>
                '[{"id": 2, "size": "S", "worn": 1, "brand": "Gliden", "style": "Black V-Neck", "in_fit": 1, "washed": 0, "user_id": 1, "category": "Tops", "web_link": null, "purchased": 2021, "created_at": "2021-12-15T23:05:08.000000Z", "updated_at": "2021-12-16T02:06:20.000000Z", "worn_today": "2021-12-16T02:05:23.000000Z", "denim_weight": null}, {"id": 4, "size": "28", "worn": 1, "brand": "Naked & Famous", "style": "Cobra Black", "in_fit": 1, "washed": 0, "user_id": 1, "category": "Jeans", "web_link": null, "purchased": 2020, "created_at": "2021-12-15T23:05:08.000000Z", "updated_at": "2021-12-16T02:06:21.000000Z", "worn_today": "2021-12-16T02:05:32.000000Z", "denim_weight": null}, {"id": 5, "size": "28", "worn": 2, "brand": "Naked & Famous", "style": "Cobra Black", "in_fit": 1, "washed": 0, "user_id": 1, "category": "Jeans", "web_link": null, "purchased": 2020, "created_at": "2021-12-15T23:05:08.000000Z", "updated_at": "2021-12-16T02:06:22.000000Z", "worn_today": "2021-12-16T02:05:32.000000Z", "denim_weight": null}]',
        ]);
        DB::table('fits')->insert([
            'id' => '2',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'user_id' => '1',
            'fit' =>
                '[{"id": 2, "size": "S", "worn": 1, "brand": "Gliden", "style": "Black V-Neck", "in_fit": 1, "washed": 0, "user_id": 1, "category": "Tops", "web_link": null, "purchased": 2021, "created_at": "2021-12-15T23:05:08.000000Z", "updated_at": "2021-12-16T02:19:12.000000Z", "worn_today": "2021-12-16T02:06:29.000000Z", "denim_weight": null}]',
        ]);
        DB::table('fits')->insert([
            'id' => '3',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'user_id' => '2',
            'fit' =>
                '[{"id": 2, "size": "S", "worn": 1, "brand": "Gliden", "style": "Black V-Neck", "in_fit": 1, "washed": 0, "user_id": 1, "category": "Tops", "web_link": null, "purchased": 2021, "created_at": "2021-12-15T23:05:08.000000Z", "updated_at": "2021-12-16T02:19:12.000000Z", "worn_today": "2021-12-16T02:06:29.000000Z", "denim_weight": null}]',
        ]);
        DB::table('tags')->insert([
            'id' => '1',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'name' => 'chopping',
        ]);
        DB::table('tags')->insert([
            'id' => '2',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'name' => 'chilling',
        ]);
    }
}
