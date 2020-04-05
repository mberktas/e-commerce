<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('products')->insert([[
            "brand" => "DeFacto",
            "category_id" => 1,
            "status" => true,
            "price" => "99.99",
            "stock" => 50,
            "description" => "Erkek Haki Hırka",
            "photo" => "https://img-trendyol.mncdn.com/mnresize/415/622/Assets/ProductImages/oa/65/6568273/1/8681991073451_1_org_zoom.jpg",
            "gender" => 1
        ],[
            "brand" => "DeFacto",
            "category_id" => 1,
            "status" => true,
            "price" => "59.99",
            "stock" => 21,
            "description" => "Erkek Kadife Gömlek",
            "photo" => "https://img-trendyol.mncdn.com/mnresize/415/622/Assets/ProductImages/oa/47/4123599/1/8681816233213_1_org_zoom.jpg",
            "gender" => 1

        ],
        [
            'brand' => 'DeFacto',
            'category_id' => 1,
            'status' => true,
            'price' => "56.99",
            'stock' => 1,
            'description' => "Erkek Mavi Kollu Jean Ceket",
            'photo' => "https://img-trendyol.mncdn.com/mnresize/415/622/assets/product/media/images/20200109/12/2061354/61829953/1/1_org_zoom.jpg",
            "gender" => 1

        ],
        [
            'brand' => 'Koton',
            'category_id' => 1,
            'status' => true,
            'price' => "109.97",
            'stock' => 14,
            'description' => "Kadın Mini Elbise",
            'photo' => "https://img-trendyol.mncdn.com/mnresize/415/622/Assets/ProductImages/oa/67/2988385/1/8681953269618_1_org_zoom.jpg",
            "gender" => 0

        ],
        [
            'brand' => 'Pull & Bear',
            'category_id' => 1,
            'status' => true,
            'price' => "179.00",
            'stock' => 1,
            'description' => "Kadın Bej Deri Ceket",
            'photo' => "https://img-trendyol.mncdn.com/mnresize/415/622/assets/product/media/images/20200210/17/2922517/63338582/1/1_org_zoom.jpg",
            "gender" => 0

        ],
        [
            'brand' => 'Pull & Bear',
            'category_id' => 1,
            'status' => true,
            'price' => "180.00",
            'stock' => 1,
            'description' => "Kadın Siyah Deri Ceket",
            'photo' => "https://img-trendyol.mncdn.com/mnresize/415/622/assets/product/media/images/20191217/16/1548970/43295496/1/1_org_zoom.jpg",
            "gender" => 0

        ],
        [
            'brand' => 'Pull & Bear',
            'category_id' => 1,
            'status' => true,
            'price' => "180.00",
            'stock' => 1,
            'description' => "Kadın Siyah Deri Ceket",
            'photo' => "https://img-trendyol.mncdn.com/mnresize/415/622/assets/product/media/images/20191217/16/1548970/43295496/1/1_org_zoom.jpg",
            "gender" => 0

        ],
        [
        'brand' => 'Bambi',
        'category_id' => 2,
        'status' => true,
        'price' => "114.50",
        'stock' => 30,
        'description' => "Beyaz Kadın Sneaker",
        'photo' =>"https://cdn.dsmcdn.com/mnresize/415/622/assets/product/media/images/20200305/17/4048735/64120082/2/2_org_zoom.jpg",
        "gender" => 0

    ],
    [
        'brand' => 'Hotiç',
        'category_id' => 2,
        'status' => true,
        'price' => "94.50",
        'stock' => 5,
        'description' => "Siyah Kadın Sneaker",
        'photo' => "https://cdn.dsmcdn.com/mnresize/415/622/assets/product/media/images/20200302/10/3958957/63645849/3/3_org_zoom.jpg",
        "gender" => 0

    ],
    [
        'brand' => 'Hotiç',
        'category_id' => 2,
        'status' => true,
        'price' => "104.00",
        'stock' => 5,
        'description' => "Beyaz Kadın Sneaker",
        'photo' => "https://cdn.dsmcdn.com/mnresize/415/622/assets/product/media/images/20200309/13/4250837/64748305/3/3_org_zoom.jpg",
        "gender" => 0

    ],
    [
        'brand' => 'Hotiç',
        'category_id' => 2,
        'status' => true,
        'price' => "109.00",
        'stock' => 5,
        'description' => "Kum Beji Erkek Ayakkabı",
        'photo' => "https://cdn.dsmcdn.com/mnresize/415/622/assets/product/media/images/20200309/13/4250837/64678984/2/2_org_zoom.jpg",

        "gender" => 1
    ],  [
        'brand' => 'Hotiç',
        'category_id' => 2,
        'status' => true,
        'price' => "369.60",
        'stock' => 10,
        'description' => "Deri Erkek Ayakkabi",
        'photo' => "https://cdn.dsmcdn.com/mnresize/415/622/assets/product/media/images/20200114/13/2086184/59636254/1/1_org_zoom.jpeg",
        "gender" => 1

    ],  [
        'brand' => 'Hotiç',
        'category_id' => 2,
        'status' => true,
        'price' => "169.00",
        'stock' => 5,
        'description' => "Kahverengi Erkek Bot",
        'photo' => "https://cdn.dsmcdn.com/mnresize/415/622/assets/product/media/images/20191015/11/367463/57507259/1/1_org_zoom.jpg",
        "gender" => 1

    ],]);
    }
}
