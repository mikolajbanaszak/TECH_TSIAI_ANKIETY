  <html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
    a{
    font-size: 20px;
    text-decoration: none;
    font-family: Impact, Haettenschweiler, 'Arial Narrow Bold', sans-serif;
        font-size: 20px;
  }
  *{
    
    font-size: 20px;
    text-decoration: none;
    font-family: Impact, Haettenschweiler, 'Arial Narrow Bold', sans-serif;
        font-size: 20px;
      
  }
  body{
    background-image: url("Libraryv2.jfif");
    background-repeat: no-repeat;
    background-attachment: fixed;
    background-size: cover;
    
    
  }
  table{
    border: 2px #000000 solid;
    background-color: rgb(15, 13  , 20);
  }
  button , a
  {
    text-decoration: none;
    
    
    
  }

  div , h1 , table , button{
    text-align: center;
      margin: 0px  auto;
  }
  h1{

    margin: 0px auto;
    background-color: rgb(15, 13  , 20);
    font-size: 40px;
    width: 800px;
  }
  td , th , tr{
    padding: 5px 10px;
    
  
    
  }
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
            <h1> Co chcesz teraz zrobić</h1>  
            <?php
            session_start();
            $id = $_SESSION['id'];

$db= mysqli_connect("localhost", "root" , "", "ankiety");   
$q = "SELECT Id , nazwa  FROM ankiety  where id_tworcy = '$id' ;";
$wynik = mysqli_query($db, $q );
$q2 = "SELECT  login  FROM uzytkownicy  where id = '$id' ;";
$wynik2 = mysqli_query($db, $q2 );
$i = 1;


if(mysqli_num_rows($wynik) > 0) 
{
  echo " <div> <table>";
  while($wiersz = mysqli_fetch_assoc($wynik2)){
    echo "<h3>Twoj Login: " . $wiersz['login'] . "</h3>";
  }
  
  echo  "<tr> <th> ". "Numer" . " </th>  <th> ". "Nazwa" . " </th>   <th> Edytuj </th>  <th>  Link </th> <th> Wyniki</th> </tr> ";
  while($wiersz = mysqli_fetch_assoc($wynik)){
    


    
   
  echo  "<tr><td  > ".$i.". </td> <td  > ". $wiersz['nazwa'] . " </td> <td><button > <a href='edycja.php?id=" . $wiersz['Id'] . "' >  Edytuj </a></button> </td> <td> <button   onclick='my(".$i.")' >  Link </button> </td> <td><button > <a href='Wynik.php?id=" . $wiersz['Id'] . "' >  Wyniki </a></button> </td>  </tr> <input type='hidden' value='http://127.0.0.1/ankiet/ankieta.php?id=" . $wiersz['Id'] . "' id='".$i."'>";
  $i++;
  }
echo "  </table> </div>";
}


?> 
    
    <button > <a href='add.php' >  Dodaj </a></button>
    </div>
      </div>

  </div>

<script>
function my(d){
var b = document.getElementById(d); b.select();  navigator.clipboard.writeText(b.value);
  alert('Copied the link: ' + b.value);
}
</script>
</body>
</html>