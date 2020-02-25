<?php

use Faker\Generator as Faker;

$factory->define(App\Models\Car::class, function (Faker $faker) {

/*dateTimeBetween($startDate = '-30 years', $endDate = 'now', $timezone = null) // DateTime('2003-03-15 02:00:49', 'Africa/Lagos')
dateTimeInInterval($startDate = '-30 years', $interval = '+ 5 days', $timezone = null) // DateTime('2003-03-15 02:00:49', 'Antartica/Vostok')
dateTimeThisCentury($max = 'now', $timezone = null)     // DateTime('1915-05-30 19:28:21', 'UTC')
dateTimeThisDecade($max = 'now', $timezone = null)      // DateTime('2007-05-29 22:30:48', 'Europe/Paris')
dateTimeThisYear($max = 'now', $timezone = null)        // DateTime('2011-02-27 20:52:14', 'Africa/Lagos')
dateTimeThisMonth($max = 'now', $timezone = null)       // DateTime('2011-10-23 13:46:23', 'Antarctica/Vostok')
amPm($max = 'now')                    // 'pm'
dayOfMonth($max = 'now')              // '04'
dayOfWeek($max = 'now')               // 'Friday'
month($max = 'now')                   // '06'
monthName($max = 'now')               // 'January'
year($max = 'now')                    // '1993'
century                               // 'VI'
timezone                              // 'Europe/Paris'
*/

    return [
        //

                      'make' => $faker->randomElement($array = array ('Chevy','Ford','Dodge','Mitsubishi','Toyote','Porsche')),
            'model' =>$faker->randomElement($array = array ('Camaro','Mustang','Ram', 'Supra','HHR','F140')),
            'year' => $faker->numberBetween(1999,2019),
            'vin' => $faker->unique()->numerify('######'),
            'stock' => $faker->word(5),
            'employee_id' =>  $faker->numberBetween(1,10),
            'level_id' =>  $faker->numberBetween(1 ,2),
            'dealer_id' =>  $faker->numberBetween(1,10),
            'body_style_id' =>  $faker->numberBetween(1,2),
            'service_id' =>  1,
            'color' => $faker->colorName,
            'note' => $faker->sentence($nbWords = 3, $variableNbWords = true),
            'created_at' => $faker->dateTimeBetween($startDate = '2019-01-01 19:28:21', $endDate = '2020-02-20 19:28:21')

               ];
});
