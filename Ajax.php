<html>
<head>

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
