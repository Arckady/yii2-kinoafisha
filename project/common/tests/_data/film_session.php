<?php

$count = 20;
$items = [];
$faker = Faker\Factory::create();

for ($i = 0; $i < $count; $i++) {
    $items[$i]['film_id'] = $faker->numberBetween(1, 20);
    $items[$i]['datetime'] = $faker->date('Y-m-d H:i:s');
    $items[$i]['cost'] = $faker->numberBetween(30000, 80000);
}

return $items;
