<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Menu;

class MenuSeeder extends Seeder
{
    public function run(): void
    {
        $menus = [
            ['name' => 'Espresso', 'category' => 'basic', 'price' => 20000, 'image' => '/assets/menu-espresso.jpg', 'description' => 'Single shot espresso — inti dari setiap menu kopi. Bold, rich, dan murni.', 'tags' => ['Bold','Intense']],
            ['name' => 'Black', 'category' => 'basic', 'price' => 25000, 'image' => '/assets/menu-black.jpg', 'description' => 'Americano / Long Black. Espresso diperluas dengan air panas, rasa lebih ringan tapi tetap beraroma.', 'tags' => ['Classic','Smooth']],
            ['name' => 'White', 'category' => 'basic', 'price' => 28000, 'image' => '/assets/menu-white.jpg', 'description' => 'Espresso dengan susu. Keseimbangan sempurna antara kekuatan kopi dan kelembutan susu.', 'tags' => ['Creamy','Balanced']],
            ['name' => 'Split', 'category' => 'basic', 'price' => 35000, 'image' => '/assets/menu-split.jpg', 'description' => 'Espresso dengan es krim. Perpaduan panas-dingin yang bikin nagih.', 'tags' => ['Unique','Sweet'], 'badge' => 'rec'],
            ['name' => 'Cold Brew', 'category' => 'basic', 'price' => 22000, 'image' => '/assets/menu-coldbrew.jpg', 'description' => 'Kopi seduh dingin. Direndam lama untuk menghasilkan rasa smooth, low acid, sedikit manis alami.', 'tags' => ['Smooth','Refreshing']],
            ['name' => 'Magic', 'category' => 'basic', 'price' => 30000, 'image' => '/assets/menu-magic.jpg', 'description' => 'Flat White khas Australia. Rasio espresso-susu yang tepat menghasilkan tekstur velvety.', 'tags' => ['Velvety','Australian'], 'badge' => 'rec'],
            ['name' => 'Dirty Latte', 'category' => 'basic', 'price' => 30000, 'image' => '/assets/menu-dirtylatte.jpg', 'description' => 'Latte dengan espresso dituang di atas susu dingin. Efek dirty yang artistik dan rasa layered.', 'tags' => ['Layered','Artistic'], 'badge' => 'rec'],
            ['name' => 'Filter', 'category' => 'basic', 'price' => 25000, 'image' => '/assets/menu-filter.jpg', 'description' => 'Manual Brew (V60/AeroPress, dll.). Cup bersih, kompleks, menonjolkan karakter biji.', 'tags' => ['Complex','Clean']],
            ['name' => 'Raso', 'category' => 'signature', 'price' => 25000, 'image' => '/assets/menu-raso.jpg', 'description' => 'Creamy. Rasa seperti choco oat cereal. Cocok untuk penyuka kopi yang lembut dan manis.', 'tags' => ['Creamy','Choco Oat']],
            ['name' => 'Riang', 'category' => 'signature', 'price' => 25000, 'image' => '/assets/menu-riang.jpg', 'description' => 'Creamy latte dengan karakter seperti chocolate grapes. Body ringan dengan rasa manis menyenangkan.', 'tags' => ['Creamy','Grape']],
            ['name' => 'Gadih', 'category' => 'signature', 'price' => 28000, 'image' => '/assets/menu-gadih.jpg', 'description' => 'Bold. Floral. Ferrero taste. Cocok bagi penyuka kopi yang lebih kuat dengan sentuhan hazelnut.', 'tags' => ['Bold','Floral','Ferrero']],
            ['name' => 'Riuh', 'category' => 'signature', 'price' => 28000, 'image' => '/assets/menu-black.jpg', 'description' => 'Creamy. Citrus. Fresh. Salah satu menu paling direkomendasikan. Segar dan memukau.', 'tags' => ['Creamy','Citrus','Fresh'], 'badge' => 'rec'],
            ['name' => 'Montblanc', 'category' => 'refreshment', 'price' => 33000, 'image' => '/assets/menu-split.jpg', 'description' => 'Bright cold brew. Fruity malic. Orange-like acidity. Smooth layered cream.', 'tags' => ['Fruity','Orange','Creamy'], 'badge' => 'best'],
            ['name' => 'Serai Citrus', 'category' => 'refreshment', 'price' => 28000, 'image' => '/assets/menu-seraicitrus.jpg', 'description' => 'Fruity floral. Cold brewed. Mocktail based. Aroma serai harum dipadu citrus menyegarkan.', 'tags' => ['Serai','Citrus','Light']],
            ['name' => 'Noir Citrus', 'category' => 'refreshment', 'price' => 28000, 'image' => '/assets/menu-noircitrus.jpg', 'description' => 'Tropical sparkling. Cold brewed. Mocktail based. Tropical, sparkling, menyegarkan.', 'tags' => ['Tropical','Sparkling']],
            ['name' => 'Green Daissies', 'category' => 'refreshment', 'price' => 25000, 'image' => '/assets/menu-greendaissies.jpg', 'description' => 'Sweet. Soft. Calming refreshment. Manis, ringan, menenangkan.', 'tags' => ['Sweet','Soft','Calming']],
            ['name' => 'Ambershot', 'category' => 'refreshment', 'price' => 25000, 'image' => '/assets/menu-ambershot.jpg', 'description' => 'Fruity. Floral. Herb bitters. Mocktail. Herbal, sedikit pahit, aroma bunga eksotis.', 'tags' => ['Herbal','Floral','Bitters']],
            ['name' => 'Crimson Cloud', 'category' => 'refreshment', 'price' => 30000, 'image' => '/assets/menu-crimsoncloud.jpg', 'description' => 'Signature sparkling berry mocktail. Smooth creamy layer. Berry, sparkling, creamy.', 'tags' => ['Berry','Sparkling','Creamy']],
            ['name' => 'Teh Tarik Original', 'category' => 'non-coffee', 'price' => 23000, 'image' => '/assets/menu-tehtarik.jpg', 'description' => 'Teh tarik klasik. Kaya busa, aroma teh kuat, manis pas.', 'tags' => ['Classic','Frothy']],
            ['name' => 'Teh Tarik Hijau', 'category' => 'non-coffee', 'price' => 23000, 'image' => '/assets/menu-gadih.jpg', 'description' => 'Green tea tarik. Versi modern dengan sensasi green tea ringan.', 'tags' => ['Green Tea','Light']],
            ['name' => 'Chocolate', 'category' => 'non-coffee', 'price' => 25000, 'image' => '/assets/menu-crimsoncloud.jpg', 'description' => 'Minuman cokelat rich dan menghangatkan. Cokelat berkualitas.', 'tags' => ['Rich','Warm']],
            ['name' => 'Cocoa Juzz', 'category' => 'non-coffee', 'price' => 28000, 'image' => '/assets/menu-cocoajuzz.jpg', 'description' => 'Cocoa dengan rasa buah segar. Perpaduan unik cokelat dan kesegaran.', 'tags' => ['Fruity','Unique']],
            ['name' => 'Teh Talua', 'category' => 'sumatra', 'price' => 23000, 'image' => '/assets/menu-tehtalua.jpg', 'description' => 'Teh tradisional khas Sumatera Barat. Teh, kuning telur, gula. Creamy dan manis — warisan nenek moyang.', 'tags' => ['Traditional','Creamy','Egg']],
            ['name' => 'Kopi Tatungkuit', 'category' => 'sumatra', 'price' => 23000, 'image' => '/assets/menu-coldbrew.jpg', 'description' => 'Kopi tradisional Sumatera Barat. Bold, strong, aroma khas kopi lokal.', 'tags' => ['Bold','Strong','Traditional']],
            ['name' => 'Cheese Cake', 'category' => 'dessert', 'price' => 25000, 'image' => '/assets/menu-tehtalua.jpg', 'description' => 'Classic cheesecake lembut dan creamy. Dibuat fresh setiap hari.', 'tags' => ['Creamy','Classic']],
            ['name' => 'Iceberg Cheese Cake', 'category' => 'dessert', 'price' => 30000, 'image' => '/assets/menu-icebergcheesecake.jpg', 'description' => 'Cheesecake ekstra. Lebih rich, lebih indulging — best seller dessert.', 'tags' => ['Rich','Indulging'], 'badge' => 'best'],
            ['name' => 'Butter Croissant', 'category' => 'dessert', 'price' => 23000, 'image' => '/assets/menu-buttercroissant.jpg', 'description' => 'Croissant classic, lapisan renyah, butter premium. Fresh setiap pagi.', 'tags' => ['Flaky','Buttery'], 'badge' => 'rec'],
            ['name' => 'Cheese Croissant', 'category' => 'dessert', 'price' => 25000, 'image' => '/assets/menu-greendaissies.jpg', 'description' => 'Croissant isian keju meleleh. Gurih, renyah, memuaskan.', 'tags' => ['Cheesy','Flaky']],
            ['name' => 'Almond Croissant', 'category' => 'dessert', 'price' => 25000, 'image' => '/assets/menu-buttercroissant.jpg', 'description' => 'Croissant topping almond dan krem almond. Crispy luar, soft dalam.', 'tags' => ['Nutty','Crispy']],
            ['name' => 'Choco Rice', 'category' => 'dessert', 'price' => 25000, 'image' => '/assets/menu-crimsoncloud.jpg', 'description' => 'Cokelat dengan tekstur crispy rice. Manis, renyah, adiktif.', 'tags' => ['Chocolate','Crispy']],
            ['name' => 'Smoked Beef & Cheese Danish', 'category' => 'dessert', 'price' => 25000, 'image' => '/assets/menu-icebergcheesecake.jpg', 'description' => 'Danish pastry dengan smoked beef dan keju. Gurih, savory, filling.', 'tags' => ['Savory','Smoked']],
            ['name' => 'Mie Bangladesh', 'category' => 'food', 'price' => 18000, 'image' => '/assets/menu-miebangladesh.jpg', 'description' => 'Mi pedas khas Bangladesh. Level pedas pas dengan rempah khas.', 'tags' => ['Spicy','Noodles']],
            ['name' => 'French Fries', 'category' => 'food', 'price' => 18000, 'image' => '/assets/menu-frenchfries.jpg', 'description' => 'Kentang goreng klasik. Renyah luar, fluffy dalam. Saus pilihan.', 'tags' => ['Classic','Crispy']],
            ['name' => 'Dirty Fries', 'category' => 'food', 'price' => 23000, 'image' => '/assets/menu-cocoajuzz.jpg', 'description' => 'Kentang goreng topping melimpah. Loaded, gurih, memuaskan.', 'tags' => ['Loaded','Savory'], 'badge' => 'rec'],
            ['name' => 'Saraso Platter', 'category' => 'food', 'price' => 25000, 'image' => '/assets/menu-sarasoplatter.jpg', 'description' => 'Snack platter berbagai camilan pilihan. Cocok berbagi bersama teman.', 'tags' => ['Sharing','Variety'], 'badge' => 'rec'],
            ['name' => 'Corn Ribs', 'category' => 'food', 'price' => 18000, 'image' => '/assets/menu-miebangladesh.jpg', 'description' => 'Jagung goreng berbentuk ribs. Unik, renyah, fun.', 'tags' => ['Unique','Crispy']],
            ['name' => 'Cireng', 'category' => 'food', 'price' => 15000, 'image' => '/assets/menu-miebangladesh.jpg', 'description' => 'Tepung aci khas Bandung. Kenyal, gurih, saus pedas.', 'tags' => ['Chewy','Savory']],
            ['name' => 'Cheese Roll', 'category' => 'food', 'price' => 15000, 'image' => '/assets/menu-greendaissies.jpg', 'description' => 'Roti gulung keju. Simple tapi enak — keju meleleh tiap gigitan.', 'tags' => ['Cheesy','Simple']],
            ['name' => 'Singkong Keju', 'category' => 'food', 'price' => 15000, 'image' => '/assets/menu-frenchfries.jpg', 'description' => 'Singkong goreng keju. Renyah luar, lembut dalam, taburan keju.', 'tags' => ['Crispy','Cheesy']],
        ];

        foreach ($menus as $menu) {
            Menu::create($menu);
        }
    }
}
