<!DOCTYPE html>
<html lang="fr">
    <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../Assets/style/style.css">
    <link rel="icon" type="image/x-png" href="../Assets/picture/motify.png">
    <title>recherche lego
    </title>
    </head>
    <body>
        <header>
          <?php session_start();?>
            <nav class="topnav" id="myTopnav">
                <ul>
                  <li class="title">Motify</li>
                  <li><a href="../index.php">Home</a></li>
                  <?php if((isset($_SESSION['Role']))&&($_SESSION['Role'] == 'ADMIN')){echo'<li><a href="newUser.php">New user</a></li>';}?>
                  <li><a href="UserList.php">Liste des Utilisateurs</a></li>
                  <?php if((isset($_SESSION['Role']))&&($_SESSION['Role'] == 'ADMIN')){echo'<li><a href="newLego.php">New lego</a></li>';}?>
                  <li><a href="LegoList.php">Liste des lego</a></li>
                  <?php
                  if (!$_SESSION['connecter'] == TRUE) {
                      header('Location: connection.php');
                      }else{
                      echo  '<li style="float:right"><a href="deconnect.php">Logout</a></li>';
                      }
                  ?>
                </ul>
              </nav>
          </header>
          <main>
            <div>
            <input type="text" name="searchBar" id="searchBar" placeholder="search for a character"/>
          <div id="afficher"></div>
            <script>
            const searchBar = document.getElementById("searchBar");
            const div = document.getElementById("afficher");
            let filteredCharacters = null;
            let data = [];
            async function fe(){
              let obj;
              const res = await fetch('https://rebrickable.com/api/v3/lego/sets//?key=d2f2a1ef3260ceb4b63aa6bf03c1e9f9')
              obj = await res.json();
              for(i= 0; i < obj.results.length; i++){
                addData(obj.results[i])
              }
              search();
              console.log(data)
              console.log(data)
            //  console.log(obj.results[0].name);
            }
            fe();
            function addData(object) {
  data.push(object);
}
function search(){
  console.log(data[0].name)
  searchBar.addEventListener("keyup", e => {
          const searchString = e.target.value;
          if (searchBar.value.length >= 3){
            for(h = 0; h < data.length; h++){
         filteredCharacters = data.filter(character => {
          console.log("test "+JSON.stringify(character))
  return( 
    character.name.includes(searchString)
  );
});}}
    console.log(filteredCharacters)

    if (div.childElementCount < filteredCharacters.length){
      for(i = 0; i < filteredCharacters.length; i++){
      let num = document.createElement('h2');
      let p = document.createElement('p');
	p.textContent = filteredCharacters[i].name;
  num.textContent = filteredCharacters[i].set_num;
  div.appendChild(num);
	div.appendChild(p);
     // console.log(filteredCharacters[i].name);
    }
  }
    if (searchBar.value == "" || searchBar.value.length < 3){
        while (div.firstChild){
          div.removeChild(div.lastChild);
        }
      }
          });
}
 
            </script>
        </div>
        </main>
      <!--  <footer>
        <p>Author: Luidjy Aubel</p>
        <p><a target="_blank" href="https://aubel-luidjy.alwaysdata.net/">Portfolio</a></p>
      </footer>-->
    </body>
</html>