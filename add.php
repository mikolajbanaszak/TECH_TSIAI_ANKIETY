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
          margin:20px;
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
    </style>

  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>
<body>  
  <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
  <div class="container absolute col-12">
  <form method='GET' action='summary.php'>
      <div class="col-6 sc">
      <div id="main">
      
          <h1 class="Nazwa"> Oto twój formularz</h1> 
          
            <input type="hidden" value="0" id="amount" name="amount">
          <label for="title">Podaj nazwę formularza:</label>
          <input id="title" name="title" type=" text">
      </div>
      <div class="add">
      <button onclick="dodaj()" type="button"> utwórz nowy pytanie </button>
        <br>
      <br>
      <input type="submit"  value="zakoncz">
      
      
      </div>
      </div>
</form>
<?php  session_start(); ?>
  </div>
  <script>
    var a=0;
    const id = [];
    function dodaj()
    {
      
      if(a == 10)
      {
        alert("Maksymalnie można dodać 10 pytań")
      }
      a++;
      var d = a+"q";

      var f = a+"t";
      var b =  document.getElementById('main');
      var t = `         <div id="${a}" class="quest"> <label for="${d}">Podaj Pytanie:</label> <input id="${d}" name="${d}" type="text"><br>
      <label for="${f}">Wybierz rodzaj pytania:</label>
                      <select id="${f}" name="${f}">
                        <option value="radio">Jednokrotnego wyboru</option>
                        <option value="checkbox">Wielokrotnego wyboru</option>
                      </select><br>
                      </div>
          <div>
          <button onclick="questadd(${a})" type="button"  >Dodaj pytanie</button>
          
          </div>
          `
      b.innerHTML += t;
      id[a] = [0]
      document.getElementById('amount').value=`${a}`;

    }
    function questadd(b)
    {
      var c =  document.getElementById(b);
      let m = id[b];
      m++;
      id[b] = m;
      m=`${m}`;
      b=`${b}`;
      var t = `${m}.<label for="${b+m}">Podaj odpowiedz:</label> <input id="${b+m}" name="${b+m}" type="text"><br>`;
      c.innerHTML += t;
    }

    </script>

</body>
</html>