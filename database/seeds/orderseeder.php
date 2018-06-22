<?php

use Illuminate\Database\Seeder;
use App\Order;

class orderseeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        Order::create(['orderName'=>'Accipitriformes']);
        Order::create(['orderName'=>'Ansériformes']);
        Order::create(['orderName'=>'Apodiformes']);
        Order::create(['orderName'=>'Aptérygiformes']);
        Order::create(['orderName'=>'Bucérotiformes']);
        Order::create(['orderName'=>'Caprimulgiformes']);
        Order::create(['orderName'=>'Cariamiformes']);
        Order::create(['orderName'=>'Casuariiformes']);
        Order::create(['orderName'=>'Charadriiformes']);
        Order::create(['orderName'=>'Ciconiiformes']);
        Order::create(['orderName'=>'Coliiformes']);
        Order::create(['orderName'=>'Columbiformes']);
        Order::create(['orderName'=>'Coraciiformes']);
        Order::create(['orderName'=>'Cuculiformes']);
        Order::create(['orderName'=>'Eurypygiformes']);
        Order::create(['orderName'=>'Falconiformes']);
        Order::create(['orderName'=>'Galliformes']);
        Order::create(['orderName'=>'Gaviiformes']);
        Order::create(['orderName'=>'Gruiformes']);
        Order::create(['orderName'=>'Leptosomiformes']);
        Order::create(['orderName'=>'Mesitornithiformes']);
        Order::create(['orderName'=>'Musophagiformes']);
        Order::create(['orderName'=>'Opisthocomiformes']);
        Order::create(['orderName'=>'Otidiformes']);
        Order::create(['orderName'=>'Passériformes']);
        Order::create(['orderName'=>'Pélécaniformes']);
        Order::create(['orderName'=>'Phaethontiformes']);
        Order::create(['orderName'=>'Phoenicoptériformes']);
        Order::create(['orderName'=>'Piciformes']);
        Order::create(['orderName'=>'Podicipédiformes']);
        Order::create(['orderName'=>'Procellariiformes']);
        Order::create(['orderName'=>'Psittaciformes']);
        Order::create(['orderName'=>'Pterocliformes']);
        Order::create(['orderName'=>'Rhéiformes']);
        Order::create(['orderName'=>'Sphénisciformes']);
        Order::create(['orderName'=>'Strigiformes']);
        Order::create(['orderName'=>'Struthioniformes']);
        Order::create(['orderName'=>'Suliformes']);
        Order::create(['orderName'=>'Tinamiformes']);
        Order::create(['orderName'=>'Trogoniformes']);


    }
}
