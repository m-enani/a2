<?php
require('restaurants.php');
require('Form.php');
# Instantiate the objects we'll need
$restaurant = new Restaurants('restaurants.json');
$form = new DWA\Form($_GET);
$errors = [];
if($form->isSubmitted()) {
    $cuisineType = $form->get('cuisineType', $default = 'Any'); # String
    $errors = $form->validate(
        [
            'cuisineType' => 'required',
        ]
    );
    if($errors)
        $restaurants = [];
    else
        $restaurants = $restaurant->getByType($cuisineType);
    $haveResults = (count($restaurants) == 0) ? false : true;
}
