<html>
<head>
  <?php
  // Tableau de nom
  $a[] = "Anna";
  $a[] = "Brittany";
  $a[] = "Cinderella";
  $a[] = "Diana";
  $a[] = "Eva";
  $a[] = "Fiona";
  $a[] = "Gunda";
  $a[] = "Hege";
  $a[] = "Inga";
  $a[] = "Johanna";
  $a[] = "Kitty";
  $a[] = "Linda";
  $a[] = "Nina";
  $a[] = "Ophelia";
  $a[] = "Petunia";
  $a[] = "Amanda";
  $a[] = "Raquel";
  $a[] = "Cindy";
  $a[] = "Doris";
  $a[] = "Eve";
  $a[] = "Evita";
  $a[] = "Sunniva";
  $a[] = "Tove";
  $a[] = "Unni";
  $a[] = "Violet";
  $a[] = "Liza";
  $a[] = "Elizabeth";
  $a[] = "Ellen";
  $a[] = "Wenche";
  $a[] = "Vicky";

  // On récupèere le parametre q dans l'URL
  $q = $_REQUEST["q"];

  $indice = "";

  // lookup all hints from array if $q is different from ""
  if ($q !== "") {
      $q = strtolower($q);
      $long=strlen($q);
      foreach($a as $nom) {
          if (stristr($q, substr($nom, 0, $long))) {
              if ($indice === "") {
                  $indice = $nom;
              } else {
                  $indice .= ", $nom";
              }
          }
      }
  }

  // Affiche "aucune suggestion" si le nom est inconnue
  echo $indice === "" ? "aucune suggestion" : $indice;
  ?>
</head>
<body>
  <script>
  function showHint(str) {
      if (str.length == 0) {
          document.getElementById("txtHint").innerHTML = "";
          return;
      } else {
          var xmlhttp = new XMLHttpRequest();
          xmlhttp.onreadystatechange = function() {
              if (this.readyState == 4 && this.status == 200) {
                  document.getElementById("txtHint").innerHTML = this.responseText;
              }
          };
          xmlhttp.open("GET", "gethint.php?q=" + str, true);
          xmlhttp.send();
      }
  }
  </script>

<p><b>Tapez votre nom dans le cadre ci-dessous:</b></p>
<form>
Votre nom : <input type="text" onkeyup="showHint(this.value)">
<p>Suggestions: <span id="txtHint"></span></p>
</form>
</body>
</html>
