<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
       .sc{
            height: 100vw;
            margin: 0 auto;
            background-color: rgba( 15, 13  , 20,1);
            text-align: center;
        }
        .container{
            background-color: rgb(3, 6, 9);
            width: 100vw;
            
        }
        *{
          color: white;
        }
        .Nazwa
        {
          color: white;
        }
        input{
          background-color: rgb(15, 13  , 20) ;
          font-size: 20px;  
        }
        button{
          background-color: rgb(15, 13  , 20) 
        }
        .add{
          margin-top: 50px;
        }
        select{
          background-color: rgb(15, 13  , 20) 
        }
        .quest{
          margin-top: 50px;
          
        }
        #save{
          height:30px;
          width: 150px;
          margin-top: 50px;
        }
        .pytania{
          
        }
        label{
            font-size: 30px;
        }

        #gen{
            text-align: left;
          margin: 0 auto;
        }
        hr{
          border-color: white;
          background-color: white;
          
        }

    </style>

  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>
<body>  
  <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
  <div class="container absolute col-12">
      <div class="col-6 sc">
            <div id="main">
<?php
session_start();
if(isset( $_POST['login']) )
{
   $log =$_POST['login'] ;
   $db= mysqli_connect("localhost", "root" , "", "ankiety");   
   $q = "SELECT login , pass , id FROM uzytkownicy  where login = '$log';";
   $wynik = mysqli_query($db, $q );
   if(mysqli_num_rows($wynik) > 0)
   {
     while($wiersz = mysqli_fetch_assoc($wynik)){
           if( $wiersz['pass'] == $_POST['haslo'])
           {
            $_SESSION['id'] = $wiersz['id'];
           echo "<script>window.location.href  = 'Menu.php' </script>";
         
           }
       } 
    
      
     

   }
}
?>

<section class="vh-100 gradient-custom">
  <div class="container py-5 h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-12 col-md-8 col-lg-6 col-xl-5">
        <div class="card bg-dark text-white" style="border-radius: 1rem;">
          <div class="card-body p-5 text-center">
          <form action="" method="POST">
            <div class="mb-md-5 mt-md-4 pb-5">

              <h2 class="fw-bold mb-2 text-uppercase">Zaloguj się!</h2>
              <p class="text-white-50 mb-5">Wprowadź swój login</p>

              <div class="form-outline form-white mb-4">
                <input type="text" id="typeEmailX" class="form-control form-control-lg" name="login" />
                <label class="form-label" for="typeEmailX">Login</label>
              </div>

              <div class="form-outline form-white mb-4">
                <input type="password" id="typePasswordX" class="form-control form-control-lg" name="haslo" />
                <label class="form-label" for="typePasswordX">Password</label>
              </div>


              <button class="btn btn-outline-light btn-lg px-5" type="submit">Login</button>



            </div>

            </form>

          </div>
        </div>
      </div>
    </div>
  </div>
</section>




            </div>
      </div>

  </div>
    </body>
