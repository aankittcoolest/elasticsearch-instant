
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Getting shop details</title>
      <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <script type="text/javascript" src="js/data.js"></script>
  </head>
  <body>
<!--
    <form   class="my-form" onsubmit="getShop()">
        <label for="">Enter the shop id</label>
        <input type="text" name="shop_id" value="" id = "shop_id">

    </form>

<button type="button" onclick="getShop()">Click Me!</button>
-->
<span class="label label-success" id="success"></span>
      <span class="label label-danger" id="failure"></span>
              <!-- Input Group -->
        <div class="col-lg-4">
            <div class="form-group">
                <label class="control-label" for="inputGroup">ENTER THE SHOP ID </label>
                <div class="input-group">
                    <input type="text" class="form-control"
                           placeholder="Search by ID and insert into elastic DB" id="shop_id"/>
                    
                     <button type="button" onclick="getShop()" class="btn btn-primary">Enter</button>

                </div>                   
            </div>
        </div>
      
      
      
      
      
      
                    <!-- Input Group -->
        <div class="col-lg-4">
            <div class="form-group">
                <label class="control-label" for="inputGroup">ENTER THE SHOP ID </label>
                <div class="input-group">
                    <input type="text" class="form-control"
                           placeholder="Search data by name" id="freeword"/>
                    
                     <button type="button" onclick="searchShop()" class="btn btn-primary">Enter</button>

                </div>                   
            </div>
        </div>
  </body>
</html>