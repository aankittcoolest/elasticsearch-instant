
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Getting shop details</title>
      <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
      <link rel="stylesheet" href="css/style.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <script type="text/javascript" src="js/freeword.js"></script>
    <script type="text/javascript">
      
        function searchq() {
            var searchTxt = $("input[name='q']").val();
            console.log(searchTxt);
            
            $.post("suggesters.php", {searchVal: searchTxt}, function(output){

            
                $('#output').html(output); 
            }); 
                   
                   }
        


//$('#output').click(function(){
//   console.log("okay"); 
//});
        
//$(document).ready(function(){
//    $("#cake").on("click", function(){
//        console.log("okay");
//    });
//});

      
      </script>
  </head>
  <body>
      
                <section class="main">
                     
                    <div class="search">
                              <table class="table table-striped">
                                  <tr><td><input type="text" name="q" placeholder="Search..." id="freeword"  onkeydown="searchq();" autocomplete="off"/>  
                                    <ul class="results" >
                                        <div id="output"></div>
		                             </ul>
                                    </td>
                                 <td><button type="button" onclick="searchShop()" class="btn btn-primary">Enter</button></td></tr>
                            </table>                    
                    </div>

</section>
            


<!--
<span class="label label-success" id="success"></span>
      <span class="label label-danger" id="failure"></span>
               Input Group 
        <div class="col-lg-4">
            <div class="form-group">
                <label class="control-label" for="inputGroup">ENTER shop name </label>
                <div class="input-group">
                    <input type="text" class="form-control" name="q"
                           placeholder="Search by name" id="freeword"  onkeydown="searchq();"/>
                    
                     <button type="button" onclick="searchShop()" class="btn btn-primary">Enter</button>

                </div>                   
            </div>
        </div>
      <div id="output"></div>
-->
      

      
      <table class="table table-striped" id="populate-data">

</table>

  </body>
</html>