<html>
   <head>
      <link rel="stylesheet" href="../assets/css/style.css">
   </head>
   <body class="corpo">
   <form id="show_signo_form" method="POST" action="index.php">   
   <?php
      include('header.php'); 

      $signos = simplexml_load_file("signos.xml");
      $nascimento = $_POST['data_nascimento'];
      //echo $nascimento;
      $nascimentoFormatado = new DateTime($nascimento); // converte o valor do input html em objeto para ser manipulado

      // puxa a data atual
      $dataAtual = new DateTime(); 
      $anoAtual = $dataAtual->format('Y');
      $anoSeguinte = $dataAtual->format('Y') + 1;

      // formatando retorno de DateTime para mês
      $mesNascimento = $nascimentoFormatado->format('m');

      // formatando retorno de DateTime para dia
      $diaNascimento = $nascimentoFormatado->format('d'); 

      // formatando retorno de DateTime para o ano
      $anoNascimento = $nascimentoFormatado->format('Y'); 

      //retorna o ultimo dia ref. ao mes fevereiro
      $lastday = date('d', mktime(0, 0, 0, 3, 0, $dataAtual->format('y')));

      $signo = '';
      $sobre = '';
      
      foreach($signos-> signo as $signo){
         
         $diaIniXml = (substr($signo->datainicio,0,2));
         $mesIniXml = (substr($signo->datainicio,3,2));
         $diaFimXml = (substr($signo->datafim,0,2));
         $mesFimXml = (substr($signo->datafim,3,2));
         
         $dataIni = new DateTime($anoNascimento . "-" . $mesIniXml . "-".  $diaIniXml);
         $dataFim = new DateTime($anoNascimento . "-" . $mesFimXml . "-".  $diaFimXml);
         //echo $dataIni->format('d/m/Y')."<br/>";
         //echo $dataFim->format('d/m/Y')."<br/>";
         //echo gettype($dataIni)."<br/>";
         //echo gettype($dataFim)."<br/>";
         //echo gettype($nascimentoFormatado)."<br/>";
         //echo gettype($nascimento)."<br/>";
         //var_dump($dataIni);
         //echo $signo ->signonome . " : Data inicial :" . $dataIni->format('d/m/Y') . " Data Final: " . $dataFim->format('d/m/Y') ."<br/>";
         //var_dump($nascimento >= $dataIni);
         //var_dump($nascimento <= $dataFim);
         //echo $dataIni->date."<br/>";

         if($mesIniXml > $mesFimXml){
            $dataFim->add(new DateInterval('P1Y'));
            $nascimentoFormatado->add(new DateInterval('P1Y'));
         }

         if ($nascimentoFormatado >= $dataIni && $nascimentoFormatado <= $dataFim){
            echo "<div> <label Class='label_signo'> $signo->signonome </label> </div><br/>";
            echo "<div> <label Class='label_descricao'> $signo->descricao </label> </div><br/>";
         }
         unset($dataIni);
         unset($dataFim);
      }
   ?>
   <div class="mb-3">
      <button type="submit" class="btn btn-primary">Voltar</button>
   </div>
   </body>
</html>