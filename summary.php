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

                        $idt = $_SESSION['id'];
                        $am = $_GET['amount'];
                        $name = $_GET['title'];
                        $db= mysqli_connect("localhost", "root" , "", "ankiety");   
                        $q = "INSERT INTO `ankiety` (`id`, `id_tworcy`, `ilosc_pytan`, `nazwa`) VALUES (NULL, '$idt', '$am', '$name');";
                        $wynik = mysqli_query($db, $q );
                        $q="SELECT id from ankiety where nazwa = '$name' && id_tworcy = '$idt';";
                        $wynik = mysqli_query($db, $q );
                        $ida = "";
                        if(mysqli_num_rows($wynik) > 0)
                        {
                          while($wiersz = mysqli_fetch_assoc($wynik))
                            {
                                    $ida = $wiersz['id'];
                            } 
                        }
                        // if(mysqli_num_rows($wynik) > 0)
                        // {
                        //     while($wiersz = mysqli_fetch_assoc($wynik))
                        //     {


                        //     }
                        // }
                        for($i =1 ; $i<=$am; $i++)
                        {   
                          $f="$i";
                          $h = "t";
                          $g = "$f$h";
                        $type= $_GET[$g];
                        $h='q';
                        $g = "$f$h";
                        $text = $_GET[$g];
                        $q = "INSERT INTO `pytania` (`id`, `id_ankiety`, `rodzaj_pytania`, `tresc_pytania`) VALUES (NULL, '$ida', '$type', '$text');";
                        $wynik = mysqli_query($db, $q );
                        $q="SELECT id from pytania where id_ankiety = '$ida' && rodzaj_pytania = '$type' && tresc_pytania='$text';";
                        $wynik = mysqli_query($db, $q );
                        if(mysqli_num_rows($wynik) > 0)
                        {
                          while($wiersz = mysqli_fetch_assoc($wynik))
                            {
                                    $idp = $wiersz['id'];
                            } 
                        }
                        for($j = 1; $j<=10; $j++)
                        {
                          $g="$f$j";
                          
                         if(isset($_GET[$g])){

                           $texta = $_GET[$g];
                          $q="INSERT INTO `odpowiedzi` (`id`, `id_pytania`, `odpowiedz`, `id_odpowiedzi` , `id_ankiety`) VALUES (NULL, '$idp', '$texta', '$j' , '$ida');";
                          $wynik = mysqli_query($db, $q );
                         }
                        }
                        }
                        
                        
                       $q=" SELECT ilosc_pytan , nazwa from ankiety where id = $ida;";
                       $wynik = mysqli_query($db, $q );
                       if(mysqli_num_rows($wynik) > 0)
                       {
                         while($wiersz = mysqli_fetch_assoc($wynik))
                           {
                                   $name = $wiersz['nazwa'];
                           } 
                       }
                       echo "    <h1> $name </h1><div id='gen' class='col-4'> <form>";
                       $q=" SELECT id , rodzaj_pytania ,  tresc_pytania from pytania where id_ankiety = $ida;";
                       $wynik = mysqli_query($db, $q );
                       if(mysqli_num_rows($wynik) > 0)
                       {
                         while($wiersz = mysqli_fetch_assoc($wynik))
                           {
                            $name = $wiersz['tresc_pytania'];
                            $idp = $wiersz['id'];
                             echo ' <label for="'.$name.'">'.$name.'</label> <div id="'.$name.'" class="pytania">';
                              $q2="SELECT odpowiedz , id_odpowiedzi FRom odpowiedzi where  id_pytania = '$idp'";
                              $wynik2= mysqli_query($db , $q2);
                                if($wiersz['rodzaj_pytania'] == 'checkbox')
                                {
                                  if(mysqli_num_rows($wynik2) > 0)
                                  {
                                    while($wiersz2 = mysqli_fetch_assoc($wynik2))
                                      { 
                                        echo '<input type="checkbox" name="'.$idp.'[]" value="'.$wiersz2['id_odpowiedzi'].'"> '.$wiersz2['odpowiedz'].'<br>';
                                      }
                                  }
                                }else{
                                  if(mysqli_num_rows($wynik2) > 0)
                                  {
                                    while($wiersz2 = mysqli_fetch_assoc($wynik2))
                                      { 
                                        echo '<input type="radio" name="'.$idp.'" value="'.$wiersz2['id_odpowiedzi'].'"> '.$wiersz2['odpowiedz'].'<br>';
                                      }
                                  }
                                }
                             echo'</div><hr>';
                                   
                           } 
                       }
                       


                ?>

                </form>
                <button><a href="Menu.php">Zakończ</a></button>
                </div>
            </div>
      </div>

  </div>
    </body>