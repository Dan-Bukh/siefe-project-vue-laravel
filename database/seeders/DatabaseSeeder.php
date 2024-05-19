<?php

namespace Database\Seeders;

use App\Models\Catalog;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
         //User::factory(10)->create();
        User::create([
            'name' => 'Florik',
            'email' => 'florik@seife.com',
            'password' => Hash::make('qwerty654321'),
        ]);

//        Catalog::create([
//            'category' => 'soap', 'title' => 'Мыло "Бамбуковый уголь и прованские травы"', 'price' => '4', 'count' => '4', 'content' => 'Вес кусочка 125 +/- 5 грамм
//Чёрное чёрное мыло с эффектом детокса и ярким ароматом
// тимьяна и розмарина. Сбалансированный рецепт, высокий процент
// ухаживающего нерафинированного оливкового масла первого холодного отжима
// и как результат обильная пенка и очищающий эффект без стягивания кожи. Бамбуковый
// уголь в составе добавляет мылу абсорбирующих качеств, раскрывает поры и нормализует работу сальных желёз.
// Аромат яркий, камфорно-травяной, пряный. Состав: 100% натуральные ингредиенты: отвар эвкалипта, кокосовое масло, нерафинированное
// оливковое масло EV, уголь бамбуковый, пальмовое масло, ЭМ тимьяна и эвкалипта.', 'image' => 'images/soap1.jpg',
//        ]);

        //        ['category', "title", 'price', 'count', 'content', 'image'];
    }
}
