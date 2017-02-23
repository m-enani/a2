<?php
require('restaurants.php');
require('Form.php');
# Instantiate the objects we'll need
$restaurant = new Restaurants('restaurants.json');
$form = new DWA\Form($_GET);
$errors = [];
if($form->isSubmitted()) {
    $cuisineType = $form->get('cuisineType', $default = 'any'); # String
    $budget = $form->get('budget', $default = 'any'); # String
    $optInOut = $form->get('optinout', $default = 'any'); # String
    $waitTime = $form->get('waitTime', $default = 0); # String

    $errors = $form->validate(
        [
            'cuisineType' => 'required',
            'budget' => 'required',
            'optinout' => 'required',
            'waitTime' => 'numeric'
        ]
    );
    if($errors)
        $restaurants = [];
    else
        $restaurants = $restaurant->getByType($cuisineType, $budget, $optInOut, $waitTime);
    $haveResults = (count($restaurants) == 0) ? false : true;
}
