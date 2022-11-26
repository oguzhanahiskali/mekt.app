<?php

                //estetisyen tüm hastaları görebilir.
                $result = $link->query("SELECT * FROM view_takvim_kart_seans WHERE FIRMA_ID=$user_Firma");
                $events = mysqli_fetch_all($result,MYSQLI_ASSOC);
                $suan = date('Y-m-d H:i:s');
                
                $colorArray = array('7367F0', '28C76F', 'EA5455', 'FF9F43', '00CFE8');
                $roomArray = array('Oda1', 'Oda2', 'Oda3', 'Oda4', 'Oda5');
                foreach($events as $event):

                    $randomRoom = $roomArray[array_rand($roomArray, 1)];
                                    
                    $eventID = $event['ID'];
                    $result = $db->query("select            
                    sk.SEANS_ID as ID,
                    sd.KART_ID,
                    sd.FIRMA_ID,
                    sk.KONTROL_DURUM,
                    sk.SEANS_ID,
                    fr.ROOM_ID,
                    fr.COLOR,
                    concat(sk.KONTROL_TARIH, ' ', sk.KONTROL_SAAT) START,
                    concat(mk.ADI, ' ', mk.SOYADI) TITLE
                    from tbl_seans_kontrol sk
                    left JOIN tbl_seans_detay sd on sd.ID = sk.SEANS_ID
                    left JOIN tbl_firma_resources fr on fr.ID = sk.RESOURCE_ID
                    LEFT JOIN tbl_musteri_kimlik mk on mk.ID = sd.MID WHERE sk.SEANS_ID = $eventID AND sd.FIRMA_ID=$user_Firma ORDER BY 1", PDO::FETCH_ASSOC);
                    if ( $result->rowCount() ){
                        foreach( $result as $row ){
                        echo "{";
                        ?>
                        
                            id: "<?=$row['ID']?>",
                            resourceId: '<?=$row['ROOM_ID']?>',
                            title: "(KONTROL SEANS) <?php  if($row['KONTROL_DURUM'] == 1){ echo 'GELDİ'; }else if($row['KONTROL_DURUM'] == 2){ echo 'İPTAL EDİLDİ'; } ?>
                            \n ~ \n <?php echo $event['ADI_SOYADI'].'\n ['.$event['TITLE'].']'; ?>",
                            start: "<?php echo $row['START'];?>",
                            end: "",
                            allDay:false,
                            color: "<?php
                            if($row['START'] > $suan){
                                if($row['KONTROL_DURUM'] == 1){
                                    echo 'green';
                                }else if($row['KONTROL_DURUM'] == 2){
                                    echo 'red';
                                }else{
                                    echo $row['COLOR'];
                                }
                            }else{ echo "grey"; } ?>"


                        <?php
                        echo "},";
                        }
                    }
                    $start = explode(" ", $event['START']);
                    $end = explode(" ", $event['END']);

                    $yeniTarih = date("d.m.Y H:i", strtotime($event['START']));
                    
                    ?>{
                    id: "<?=$event['ID']?>",
                    resourceId: '<?=$event['ROOM_ID']?>',
                    title: "<?php echo $event['ADI_SOYADI'].' \n ['.$event['TITLE'].']'; ?> \n Est.: <?php echo mb_strtoupper($event['ESTETISYENADI']);?>",
                    start: "<?php echo $event['START'];?>",
                    end: "<?php echo $event['END'];?>",
                    allDay:false,
                    color: "<?php
                    if($event['START'] > $suan){
                        if($event['SEANS_DURUM'] == 1){
                            echo 'green';
                        }else if($event['SEANS_DURUM'] == 2){
                            echo 'red';
                        }else{
                            echo $event['ROOM_COLOR'];
                        }
                    }else{ echo "grey"; } ?>"
                },
                <?php endforeach; ?>