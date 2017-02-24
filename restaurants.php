
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
    public function getByType(string $type, $budget, string $optInOut, string $waitTime) {
        $filteredRestaurants = [];
        foreach($this->restaurants as $restaurant) {

          // return all list if default options are selected
          // if ($type == 'any' && $budget == 'any' && $optInOut && $waitTime == ''){
          //   $filteredRestaurants[] = $restaurant;
          // }
          if ($type == 'any' && $restaurant['price'] == $budget && $restaurant['dining'] == $optInOut && ($restaurant['wait_time']  == 0 || $restaurant['wait_time'] <= $waitTime)){
            $filteredRestaurants[] = $restaurant;
          }
          else if ($restaurant['type'] == $type  && $restaurant['price'] == $budget && $restaurant['dining'] == $optInOut && ($restaurant['wait_time']  == 0 || $restaurant['wait_time'] <= $waitTime)){
            $filteredRestaurants[] = $restaurant;
          }

        }

        // sort the array by restaurant name
        function sortResturants($a,$b)
        {
        if ($a['name']==$b['name']) return 0;
        return ($a['name']<$b['name'])?-1:1;
        }

        usort($filteredRestaurants, "sortResturants");

        return $filteredRestaurants;
    }
} # end of class
