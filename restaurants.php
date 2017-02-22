
<?php


class Restaurants {
    /**
	* Properties
	*/
    private $restaurants;
    /**
	*
	*/
    public function __construct($jsonPath) {
        $restaurantJson = file_get_contents($jsonPath);
        $this->restaurants = json_decode($restaurantJson, true);
    }
    /**
	* Getter for $restaurants property
	*/
    public function getAll() {
        return $this->restaurants;
    }
    /**
	*
	*/
    public function getByType(string $type) {
        $filteredRestaurants = [];
        foreach($this->restaurants as $restaurant) {

            $match = $restaurant['type'] == $type;

            if($match)
                $filteredRestaurants[] = $restaurant;

        }
        return $filteredRestaurants;
    }
} # end of class
