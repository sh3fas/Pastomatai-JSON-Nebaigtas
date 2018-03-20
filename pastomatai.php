<!doctype html>
<html>
  <head>
    <title>Pastomatai</title>
    <meta charset="utf-8"/>
        <meta name="viewport" content="width=device-width, initial-scale=1.0" >
        <script
                  src="https://code.jquery.com/jquery-3.2.1.js"
                  integrity="sha256-DZAnKJ/6XZ9si04Hgrsxu/8s717jcIzLy3oi35EouyE="
                  crossorigin="anonymous">
        </script>
        
        <style>
            html {
                font-family: Tahoma;
            }
            
            td {
                border: 1px solid black;
                padding: 5px;
            }
            
            
            body {
                margin: 0;
                width: 100%;
                background-image: url("http://www.doublemesh.com/wp-content/uploads/2012/11/light-patterns1.jpg");
            }
            
            .main {
                border: 1px solid grey;
                border-radius: 15px;
                width: 1000px;
                background-color: beige;
                margin: 0 auto;
            }
            
            .container {
                width: 800px;
                margin: 0 auto;
            }
            
            #miestas {
                padding-left: 10px;
            }
            
            select {
                width: 200px;
            }
            
            .filtras {
                text-align: center;
            }
            
        </style>
    
          </head>
          <body>
             <div class="main">
             <br>
              <div class="container">
                <h2>Paštomatai</h2>

        <?php 

        $adresai = file_get_contents("locations.json");

        $adrs = (json_decode($adresai));

        $adress = json_decode($adresai,true);         

        /*
        var_dump($adr[2]->ZIP);
        echo '<br>';
        echo ($adr[2]->ZIP);
        echo '<br>';
        echo ($adr[2]->NAME);
        echo '<br>';
        echo ($adr[2]->comment_lit);
        echo "<br>";
        */ 

            foreach ($adress as $unique){
            $mas[]=$unique['A1_NAME'];
            $sal[]=$unique['A0_NAME'];
            }

            $miestai = array_unique($mas);
            $salys = array_unique($sal);

            sort($miestai);
            sort($salys);

        ?>
            <br>

            <div class="pastomatai">
               <table>
                        <span><b>Filtras: </b></span>
                        <?php 
                            echo "&nbsp Miestas: <select id='mst'>";
                                foreach($miestai as $mst) {
                                    echo '<option value='.$mst.'>'.$mst.'</option>';
                                }
                            echo '</select>';
                   
                             echo "&nbsp&nbsp Šalis: <select id='sal'>";
                                foreach($salys as $sal) {
                                    echo '<option value='.$sal.'>'.$sal.'</option>';
                                }
                            echo '</select>';
                            echo '<br>';
                            echo '<br>';
                            
                            echo "<h3>Pavadinimas &nbsp | &nbsp Adresas &nbsp | &nbsp Komentaras</h3>";
                            echo '<div id="kontaktai">';
                            foreach ($adrs as $adr){
                                echo '<div class="adr" miestas="'.$adr->A1_NAME.'">';
                                echo '<div class="sal" salis="'.$adr->A0_NAME.'">';
                                echo '<div>'.$adr->NAME."&nbsp  |  &nbsp".$adr->A1_NAME.", ".$adr->A0_NAME."&nbsp  |  &nbsp";
                                echo " ".$adr->comment_est.$adr->comment_eng.$adr->comment_rus.$adr->comment_lav.$adr->comment_lit.'</div>';
                                echo "<br>";
                            echo '</div>';
                            echo '</div>';
                            }

                            ?>
            
                            <script>
                                $(document).ready(function(){
                                    $('#mst').change(function(){
                                        var mst = $(this).val();
                                        $("#kontaktai .adr").hide();
                                        $("#kontaktai .adr[miestas='"+mst+"']").show();
                                        });
                                    });
                                
                                $(document).ready(function(){
                                    $('#sal').change(function(){
                                        var sal = $(this).val();
                                        $("#kontaktai .sal").hide();
                                        $("#kontaktai .sal[salis='"+sal+"']").show();
                                        });
                                    });
                            </script>

               </table>
            </div>
            
            <?php 

            /*
            $straipsnis = file_get_contents("https://www.omniva.lt/locations.json");
            echo str_replace(array("<",">"), array ("(",")"));

            regular expression php
            arba
            explode()

            */
            ?>
            </div>
                </div>
                    </body>
                        </html>