<!DOCTYPE html>
<html>

<body>
    <?php

    function parsing($file)
    {

        $stack = array();

        if (!$file = file_get_contents($file))
            throw new Exception('Fichier non trouvé');

        foreach (explode("\n", $file) as $line) {
            $sanitize_line = explode(';', $line);

            foreach ($sanitize_line as $line2) {
                $line2 = str_replace('"', " ", $line2);
                array_push($stack, utf8_encode($line2));
            }
        }
        for ($i = 0; $i < count($stack); $i++) {
            echo $stack[$i];
        }
        return $stack;
    }

    function request($liste, $table)
    {
        //echo $table;
        $bdd = connect_db();

        switch ($table) {
            case 'categorie': {
                    for ($i = 3; $i < count($liste); $i = $i + 3) {
                        try {
                            $bdd = connect_db();
                            $stmt = $bdd->prepare("INSERT INTO categorie VALUES(?,?,?)");
                            $stmt->execute(array($liste[$i], $liste[$i + 1], $liste[$i + 2]));
                            // $stmt->execute();
                        } catch (PDOException $e) {
                            echo "Erreur dans la requête: " . $e->getMessage();
                            die();
                        }
                    }
                    break;
                }
            case 'detailticket':{
                  for($i = 4; $i < count($liste); $i = $i + 4 ) {
                    try{
                      $bdd = connect_db();
                      $stmt = $bdd->prepare("INSERT INTO detailticket VALUES(?,?,?,?)");
                      $stmt->execute(array($liste[$i], $liste[$i + 1], $liste[$i + 2], $liste[$i+3])):
                    } catch (PDOException $e) {
                      echo "Erreur dans la requête ". $e->getMessage();
                      die();
                    }
                }
                break;
              }
            case 'produit':{
                  for($i = 11; $i < count($liste); $i = $i + 11 ) {
                    try{
                      $bdd = connect_db();
                      $stmt = $bdd->prepare("INSERT INTO produit VALUES(?,?,?,?,?,?,?,?,?,?,?)");
                      $stmt->execute(array($liste[$i], $liste[$i + 1], $liste[$i + 2], $liste[$i+3], $liste[$i + 4], $liste[$i + 5], $liste[$i + 6], $liste[$i+ 7], $liste[$i + 8], $liste[$i + 9], $liste[$i + 10]));
                    } catch (PDOException $e) {
                      echo "Erreur dans la requête ". $e->getMessage();
                      die();
                    }
                }
                  break;
              }
            case 'ticket':{
                  for($i = 4; $i < count($liste); $i = $i + 4 ) {
                    try{
                      $bdd = connect_db();
                      $stmt = $bdd->prepare("INSERT INTO ticket VALUES(?,?,?,?)");
                      $stmt->execute(array($liste[$i], $liste[$i + 1], $liste[$i + 2], $liste[$i+3])):
                    } catch (PDOException $e) {
                      echo "Erreur dans la requête ". $e->getMessage();
                      die();
                    }
                }
                  break;
              }
              case 'client':{
                    for($i = 9; $i < count($liste); $i = $i + 9 ) {
                      try{
                        $bdd = connect_db();
                        $stmt = $bdd->prepare("INSERT INTO ticket VALUES(?,?,?,?,?,?,?,?,?)");
                        $stmt->execute(array($liste[$i], $liste[$i + 1], $liste[$i + 2], $liste[$i+3], $liste[$i + 4], $liste[$i + 5], $liste[$i + 6], $liste[$i+ 7], $liste[$i + 8])):
                      } catch (PDOException $e) {
                        echo "Erreur dans la requête ". $e->getMessage();
                        die();
                      }
                  }
                    break;
                }


        }
    }

    function connect_db()
    {
        try {
            return new PDO('mysql:host=localhost;dbname=pjs3;charset=utf8', 'root', '');
        } catch (Exception $e) {
            die("Erreur lors de la connexion : " . $e->getMessage());
        }
    }


    $tab = array("client.csv", "detailticket.csv", "categorie.csv", "produit.csv", "ticket.csv");
    $liste = parsing($file);

    for ($i=0; $i <= 4; $i++) {
      $liste = parsing($tab[$i]);
      request($liste, str_replace(".csv","",$tab[$i]);
    }




    ?>
</body>

</html>
