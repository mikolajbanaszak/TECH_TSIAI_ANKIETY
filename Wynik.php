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



                        <h1>Wyniki</h1>
                        <?php
                        $db= mysqli_connect("localhost", "root" , "", "ankiety");   
                         $ida = $_GET['id'];
                         $q=" SELECT ilosc_pytan , nazwa from ankiety where id = $ida;";
                         $wynik = mysqli_query($db, $q );
                         if(mysqli_num_rows($wynik) > 0)
                         {
                           while($wiersz = mysqli_fetch_assoc($wynik))
                             {
                                     $name = $wiersz['nazwa'];
                             } 
                         }
                         echo "    <h1> $name </h1><div id='gen' class='col-4'> 
                         ";
                         $q=" SELECT id , rodzaj_pytania ,  tresc_pytania from pytania where id_ankiety = $ida;";
                         $wynik = mysqli_query($db, $q );
                         if(mysqli_num_rows($wynik) > 0)
                         {
                           while($wiersz = mysqli_fetch_assoc($wynik))
                             {
                              $name = $wiersz['tresc_pytania'];
                              $idp = $wiersz['id'];
                               echo ' <label for="'.$name.'">'.$name.'</label> <div id="'.$name.'" class="pytania">';
                                $q2="SELECT odpowiedz , id_odpowiedzi FRom odpowiedzi where  id_pytania = '$idp' && id_ankiety='$ida'";
                                $wynik2= mysqli_query($db , $q2);
                                    if(mysqli_num_rows($wynik2) > 0)
                                    {
                                      $wiersz2 = mysqli_fetch_assoc($wynik2);
                                        
                                         $g = $wiersz2['id_odpowiedzi'];
                                            
                                            $q3="SELECT Count(id) as amount FRom odp_uz where id_pytania=".$idp.";";
                                            $wynik3 = mysqli_query($db , $q3);
                                            if(mysqli_num_rows($wynik3) > 0)
                                            {
                                                while($wiersz3 = mysqli_fetch_assoc($wynik3))
                                                {
                                                    $amount = $wiersz3['amount'];
                                                    $q4="SELECT id_odpowiedzi FROM odp_uz WHERE id_pytania = ".$idp." GROUP by id_odpowiedzi;";
                                                    $wynik4 = mysqli_query($db , $q4);

                                                    if(mysqli_num_rows($wynik4) > 0)
                                                    {
                                                        while($wiersz4 = mysqli_fetch_assoc($wynik4)){
                                                            $tr=$wiersz4['id_odpowiedzi'];
                                                          $q5='SELECT count(id) as doc  From odp_uz WHERE id_pytania = '.$idp.' && id_odpowiedzi = '.$tr.';';

                                                            $wynik5=mysqli_query($db , $q5);
                                                            $wiersz5 = mysqli_fetch_assoc($wynik5);
                                                            $q6 ='SELECT odpowiedz FROM odpowiedzi WHERE id_ankiety = '.$ida.' && id_odpowiedzi = '.$tr.' && id_pytania ='.$idp.';';
                                                            
                                                            $wynik6=mysqli_query($db , $q6);
                                                            $wiersz6 = mysqli_fetch_assoc($wynik6);
                                                            $doc = $wiersz5['doc'];
                                                            $text = $wiersz6['odpowiedz'];
                                                                $per =  ceil(100*($doc/$amount));
                                                                echo ' <label for="'.$g.'">'.$text.' czyli:'.$per.'%</label> <div id="'.$g.'"> <div class="progress" role="progressbar" aria-label="Basic example" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100">
                                                                <div class="progress-bar" style="width: '.$per.'%"></div>
                                                                </div></div>';
                                                        }
                                                    }
                                                }
                                            }
                                            
                                        
                                    }

                                  
                               echo'</div><hr>';
                                     
                             } 
                         }
                         
  
  
                  ?>
                        
                </div>
            </div>
      </div>

  </div>
    </body>