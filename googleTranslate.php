         <?php
         include $_SERVER['DOCUMENT_ROOT'].'/header-top.php';
        
            $asd = [];
            function GoogleTranslate($texts){
                $queryParams = [
                    'target' => 'de',
                    'source' => 'tr',
                    'format' => 'text',
                    'key'    => 'AIzaSyCzXaucDhXKQ8iHuT5qVXoQywLBQBWYmOU',
                ];

                // Now let's add q=<text> for each text
                $queryString = http_build_query($queryParams);
                foreach($texts as $t){
                    $queryString .= '&q='.rawurlencode($t);
                }

                $url = "https://translation.googleapis.com/language/translate/v2?$queryString";

                $responseBody = file_get_contents($url);
                $responseArr = json_decode($responseBody, true);
                echo "<pre>";
                print_r($responseArr['data']['translations']);
                $valArr = $responseArr['data']['translations'];

                                

                 $arrs = [
                    'key' => $texts,
                    'value' => $valArr,
                 ];

                 print_r($arrs);
            }
            $arrs = ["bugün", "okula", "gidiyorum", "tamam mı?"];

            GoogleTranslate($arrs);

        ?>