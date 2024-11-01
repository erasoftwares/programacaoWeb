<html>
<body>
   <div class="container p-5">
      <h1>Descubra seu signo</h1>
      <form id="signo_form" method="POST" action="show_zodiac_sign.php">
         <div class="mb-3">
            <label for="nome" class="form-label">Data de nascimento</label>
         </div>
         <div class="mb-3">
            <input class="form-control" type="date" name="data_nascimento">
         </div>
         <div class="mb-3">
            <!-- <input type="submit" value="Descobrir">--> 
            <button type="submit" class="btn btn-primary">Descobrir</button>
         </div>
      </form>
   </div>
</body>
</html>

<?php 
   include('header.php');
   //this is a comment
   //echo $_POST["data_nascimento"];
?>

<!-- exemplo de link acesso: http://localhost/Projects/layouts/-->