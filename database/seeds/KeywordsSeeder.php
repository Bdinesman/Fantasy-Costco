<?php

use Illuminate\Database\Seeder;

class KeywordsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $keywords=['communication','magic walkie talkie','any class','combat','weapon','equipment','hand slot','unarmed','strength','cleric','paladin','holy','holy symbol','','ring','laser pointer','ruby','food','olive garden','right','left','main','off','magic','wizard','want','beetle','living','insect','spy','mechanical','animal','consumable','container','drink','beverage','alcohol','head slot','glasses','knowledge','intelligence','language','lens','accessory','hand','history','arcane','non-combat','spell','slot','jewelry','bag','mystery','not a fish','random','???','relax','spa','healing','spatial','restoration','can','cheerwine','disguise','illusion','cantrip','rogue','shield','fighter','captain america','armor','ranged','augmentation','non-magic','death save','creepy','haunted','doll','spooky','bluff','memories','fork','glutton','eating','waist item','chapion','belt','wisdom','charisma','divination','friend','bones','nit','picker','gnome','lockpick','mean','knock','sheriff','badge','impersonating','performance','sword','flaming','poison','doom','fire','poison detector','salt','sharker','immoveable','rod','ladder','climb','climbing','zone of truth',];
        foreach ($keywords as $keyword) {
        	$newKeyword=new \App\Keyword();
        	$newKeyword->keyword=$keyword;
        	$newKeyword->save();
        }
    }
}
