<?php

$count = 20;
$items = [];
$faker = Faker\Factory::create();

for ($i = 0; $i < $count; $i++) {
    $items[$i]['title'] = $faker->title;
    $items[$i]['image_extension'] = 'jpg';
    $items[$i]['description'] = $faker->text;
    $items[$i]['duration'] = $faker->numberBetween(30, 200);
    $items[$i]['age_rating'] = $faker->numberBetween(3, 21);
}

return $items;
