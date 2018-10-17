<?php

use Faker\Generator as Faker;

$factory->define(App\Settings::class, function (Faker $faker) {
    return [

    	'title_fixed' => $faker->text($maxNbChars = 50),
        'description_fixed' => $faker->text($maxNbChars = 400),
        'description_footer' => $faker->text($maxNbChars = 400),
        'telephone' => '+059-7733890',
        'email' => 'info@education-alzard.com',
        'address' => 'Gaza - Palesine',
        'copyright_website' => 'Education Alzard',
        'image_story' => '1522231477.jpg',
        'description_story' => '

Lorem ipsum dolor sit amet, homero erroribus in cum. Cu eos scaevola probatus. Nam atqui intellegat ei, sed ex graece essent delectus. Autem consul eum ea. Duo cu fabulas nonumes contentiones, nihil voluptaria pro id. Has graeci deterruisset ad, est no primis detracto pertinax, at cum malis vitae facilisis.
<br><br>
Dicam diceret ut ius, no epicuri dissentiet philosophia vix. Id usu zril tacimates neglegentur. Eam id legimus torquatos cotidieque, usu decore percipitur definitiones ex, nihil utinam recusabo mel no. Dolores reprehendunt no sit, quo cu viris theophrastus. Sit unum efficiendi cu.
<br><br>
CEO Marc Schumaker
',
    ];
});
