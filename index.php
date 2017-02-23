<!DOCTYPE html>
<html>
<head>

<?php require('getRestuarants.php'); ?>

    <title>Mahmoud Enani</title>
    <meta charset="utf-8">


    <meta name="viewport" content="width=device-width, initial-scale=1">

      <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

    <!-- Google Fonts -->
    <link href='//fonts.googleapis.com/css?family=Sofia' rel='stylesheet'>

    <link href='css/main.css' rel='stylesheet'>

</head>

<body>
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <h1>LUNCH OUT!</h1>
      </div>
    </div>

    <form  method='GET' action='index.php'>
        <div class="row">
          <div class="col-md-12">
          </div>
        </div>

        <div class="row">
          <div class="col-md-6">
              <label for="cusinieType">Cuisine:</label>
              <select name="cuisineType" class="form-control" id="cusinieType">
                <option value="any">Any</option>
                <option value="american">American</option>
                <option value="chinese">Chinese</option>
                <<option value="indian">Indian</option>
                <option value="japanese">Japanese</option>
                <option value="mexican">Mexican</option>
                <option value="mediterranean">Mediterranean</option>
              </select>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12">
            <label>Budget:</label><br>
            <label class="radio-inline"><input type="radio" name="budget" value="high">High</label>
            <label class="radio-inline"><input type="radio" name="budget" value="medium">Medium</label>
            <label class="radio-inline"><input type="radio" name="budget" value="low">Low</label>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12">
            <label>Dine in/Take out?</label><br>
            <label class="radio-inline"><input type="radio" name="optinout" value="in">Dine-in</label>
            <label class="radio-inline"><input type="radio" name="optinout" value="out">Take-out</label>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12">
            <label for="usr">Maximum Wait Time (mins)</label>
            <input type="text" class="form-control" name ="waitTime" id="usr">
          </div>
        </div>
        <div class="row">
          <div class="col-md-12">
            <br>
            <input type='submit' class='btn btn-primary btn-small'>
          </div>
        </div>
    </form>

    <div class="row">
      <div class="col-md-12">
        <?php if($errors): ?>

      		<div class='alert alert-danger'>
      			<ul>
      				<?php foreach($errors as $error): ?>
      					<li><?=$error?></li>
      				<?php endforeach; ?>
      			</ul>
      		</div>

      	<?php elseif($form->isSubmitted()): ?>

              <div class='alert alert-info'>
                Results for: <br>
                Cuisine: <?=ucfirst($cuisineType)?><br>
                Budget: <?=ucfirst($budget)?><br>
                Dining: <?=ucfirst($optInOut)?><br>
                Maximum Wait: <?=$waitTime?> minutes<br>
              </div>

      	    <?php if(!$haveResults): ?>
      	        No restaurants found
      	    <?php endif; ?>

      	    <?php foreach($restaurants as $type => $restaurant): ?>
      	        <div class='restaurant'>
      	            <h2><?=$restaurant['name']?></h2>

                    <img src = <?=$restaurant['image']?> alt=<?=$restaurant['name']?>>

      	            Cuisine Type: <?=ucfirst($restaurant['type'])?><br>

      	            Address: <?=$restaurant['address']?>
      	        </div>

      	    <?php endforeach; ?>

      	<?php endif; ?>
      </div>
    </div>
  </div>
</body>
</html>
