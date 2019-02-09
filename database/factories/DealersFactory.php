<?php

use Faker\Generator as Faker;

$factory->define(App\Models\Dealer::class, function (Faker $faker) {
    return [
        //

          /*            'make' => $faker->randomElement($array = array ('Chevy','Ford','Dodge')),
            'model' =>$faker->randomElement($array = array ('Camaro','Mustang','Ram')),
            'year' => $faker->numberBetween(1999,2019),
            'vin' => $faker->unique()->numerify('######'),
            'stock' => $faker->word(5),
            'employee_id' =>  $faker->numberBetween(1,3),
            'dealer_id' =>  $faker->numberBetween(1,3),
            'body_style_id' =>  $faker->numberBetween(1,2),
            'service_id' =>  1,
            'color' => $faker->colorName,
            'note' => $faker->sentence($nbWords = 3, $variableNbWords = true),
            'created_at' => $faker->dateTimeBetween($startDate = '-350 days', $endDate = 'now')
*/

            'name' => $faker->unique->randomElement($array = array ('Advantage Chevy','Porsche of Westmont','Ultimo Motors' ,' Downers Grove Motors','Ford of Naperville' ,' Acura of Westmont',' Lexus of Westmont','Mitsubishi of Joliet' ,' Hiundy of Westmont',' Toyota of westmont')),
            'email' => 'raulhernandezing@gmail.com',
            'phone' => $faker->tollFreePhoneNumber,
            'contact' => $faker->name.' '.$faker->lastName,
            'contact_phone' => $faker->tollFreePhoneNumber,
            'manager' => $faker->name.' '.$faker->lastName,
            'address' => $faker->secondaryAddress ,
            'city' => $faker->cityPrefix,
            'zip_code' => $faker->numerify('######'),
            'logo' => 'chevy',
            'created_at' => '2018-01-15 01:01:13'

    ];
});
