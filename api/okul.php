<?php
include '../conf.php';



$sql = "SELECT * from tbl_okulara where PARCA = 3";
        $result = $mysqli->query($sql);
?>

<?xml version="1.0" encoding="UTF-8"?>
<!-- This is a WordPress eXtended RSS file generated by WordPress as an export of your site. -->
<!-- It contains information about your site's posts, pages, comments, categories, and other content. -->
<!-- You may use this file to transfer that content from one site to another. -->
<!-- This file is not intended to serve as a complete backup of your site. -->
<!-- To import this information into a WordPress site follow these steps: -->
<!-- 1. Log in to that site as an administrator. -->
<!-- 2. Go to Tools: Import in the WordPress admin panel. -->
<!-- 3. Install the "WordPress" importer from the list. -->
<!-- 4. Activate & Run Importer. -->
<!-- 5. Upload this file using the form provided on that page. -->
<!-- 6. You will first be asked to map the authors in this export file to users -->
<!--    on the site. For each author, you may choose to map to an -->
<!--    existing user on the site or to create a new user. -->
<!-- 7. WordPress will then import each of the posts, pages, comments, categories, etc. -->
<!--    contained in this file into your site. -->
<!-- generator="WordPress/5.7.2" created="2021-06-24 07:29" -->
<rss xmlns:content="http://purl.org/rss/1.0/modules/content/" xmlns:dc="http://purl.org/dc/elements/1.1/" xmlns:excerpt="http://wordpress.org/export/1.2/excerpt/" xmlns:wfw="http://wellformedweb.org/CommentAPI/" xmlns:wp="http://wordpress.org/export/1.2/" version="2.0">
   <channel>
      <title>En İyi Okul Hangisi ? Okul Araştır</title>
      <link>https://okularastir.com</link>
      <description>Hangi Okul?</description>
      <pubDate>Thu, 24 Jun 2021 07:29:53 +0000</pubDate>
      <language>tr</language>
      <wp:wxr_version>1.2</wp:wxr_version>
      <wp:base_site_url>https://okularastir.com</wp:base_site_url>
      <wp:base_blog_url>https://okularastir.com</wp:base_blog_url>
      <generator>https://wordpress.org/?v=5.7.2</generator>
      <?php
       function url_make($str){
            $before = array('ı', 'ğ', 'ü', 'ş', 'ö', 'ç', 'İ', 'Ğ', 'Ü', 'Ö', 'Ç', 'Ş'); // , '\'', '""'
            $after   = array('i', 'g', 'u', 's', 'o', 'c', 'i', 'g', 'u', 'o', 'c', 'S'); // , '', ''
        
            $clean = str_replace($before, $after, $str);
            $clean = preg_replace('/[^a-zA-Z0-9 ]/', '', $clean);
            $clean = preg_replace('!\s+!', '-', $clean);
            $clean = strtolower(trim($clean, '-'));
        return $clean;
        }
            while($row = $result->fetch_assoc()){
                $s = $row['OKUL'];
                $r = preg_replace('/\W+/', '-', strtolower(trim($s)));
                $ilce = $row['ILCE'];
                $il = $row['IL'];

                $kurumTuru = $row['KURUMTURU'];
                if($kurumTuru == 'DEVLET KURUMU'){
                    $InsKurumTuruSlug = 'anaokulu-ve-kres-devlet';
                    $InsKurumTuruName = 'Anaokulu ve Kreş (Devlet)';
                }else if($kurumTuru == 'ÖZEL KURUM'){
                    $InsKurumTuruSlug = 'anaokulu-ve-kres-ozel';
                    $InsKurumTuruName = 'Anaokulu ve Kreş (Özel)';
                }else{
                    $InsKurumTuruSlug = 'belirtilmedi';
                    $InsKurumTuruName = 'Belirtilmedi';
                }
               
            $randoms = mt_rand();
                ?>
                <item>
                    <title><![CDATA[<?=$il;?> <?=$ilce;?> <?=$s;?>]]></title>
                    <link>https://okularastir.com/ilan/<?=url_make($il).'-'.url_make($ilce).'-'.url_make($s);?>/</link>
                    <pubDate>Thu, 24 Jun 2021 07:27:49 +0000</pubDate>
                    <dc:creator><![CDATA[okuloncesi]]></dc:creator>
                    <description />
                    <content:encoded><![CDATA[<?=$row['ACIKLAMA'];?>]]></content:encoded>
                    <excerpt:encoded />
                    <wp:post_date><![CDATA[2021-06-24 07:27:49]]></wp:post_date>
                    <wp:post_date_gmt><![CDATA[2021-06-24 07:27:49]]></wp:post_date_gmt>
                    <wp:post_modified><![CDATA[2021-06-24 07:29:00]]></wp:post_modified>
                    <wp:post_modified_gmt><![CDATA[2021-06-24 07:29:00]]></wp:post_modified_gmt>
                    <wp:comment_status><![CDATA[open]]></wp:comment_status>
                    <wp:ping_status><![CDATA[closed]]></wp:ping_status>
                    <wp:post_name><![CDATA[<?=url_make($il).'-'.url_make($ilce).'-'.url_make($s);?>]]></wp:post_name>
                    <wp:status><![CDATA[publish]]></wp:status>
                    <wp:post_parent>0</wp:post_parent>
                    <wp:menu_order>0</wp:menu_order>
                    <wp:post_type><![CDATA[job_listing]]></wp:post_type>
                    <wp:post_password />
                    <wp:is_sticky>0</wp:is_sticky>
                    <category domain="job_listing_category" nicename="<?=$InsKurumTuruSlug;?>"><![CDATA[<?=$InsKurumTuruName;?>]]></category>
                    <category domain="job_listing_region" nicename="<?=url_make($il);?>-<?=url_make($ilce);?>"><![CDATA[<?=$ilce;?>]]></category>
                    <category domain="job_listing_region" nicename="<?=url_make($il);?>"><![CDATA[<?=ucwords(strtolower($il));?>]]></category>
                    <wp:postmeta>
                        <wp:meta_key><![CDATA[_filled]]></wp:meta_key>
                        <wp:meta_value><![CDATA[0]]></wp:meta_value>
                    </wp:postmeta>
                    <wp:postmeta>
                        <wp:meta_key><![CDATA[_featured]]></wp:meta_key>
                        <wp:meta_value><![CDATA[0]]></wp:meta_value>
                    </wp:postmeta>
                    <wp:postmeta>
                        <wp:meta_key><![CDATA[_edit_last]]></wp:meta_key>
                        <wp:meta_value><![CDATA[1]]></wp:meta_value>
                    </wp:postmeta>
                    <wp:postmeta>
                        <wp:meta_key><![CDATA[_wp_page_template]]></wp:meta_key>
                        <wp:meta_value><![CDATA[default]]></wp:meta_value>
                    </wp:postmeta>
                    <wp:postmeta>
                        <wp:meta_key><![CDATA[_tracked_submitted]]></wp:meta_key>
                        <wp:meta_value><![CDATA[1624519669]]></wp:meta_value>
                    </wp:postmeta>
                    <wp:postmeta>
                        <wp:meta_key><![CDATA[rs_page_bg_color]]></wp:meta_key>
                        <wp:meta_value />
                    </wp:postmeta>
                    <wp:postmeta>
                        <wp:meta_key><![CDATA[_claimed]]></wp:meta_key>
                        <wp:meta_value><![CDATA[0]]></wp:meta_value>
                    </wp:postmeta>
                    <wp:postmeta>
                        <wp:meta_key><![CDATA[_job_tagline]]></wp:meta_key>
                        <wp:meta_value />
                    </wp:postmeta>
                    <wp:postmeta>
                        <wp:meta_key><![CDATA[_job_category]]></wp:meta_key>
                        <wp:meta_value><![CDATA[a:1:{i:0;s:2:"72";}]]></wp:meta_value>
                    </wp:postmeta>
                    <wp:postmeta>
                        <wp:meta_key><![CDATA[_job_video]]></wp:meta_key>
                        <wp:meta_value />
                    </wp:postmeta>
                    <wp:postmeta>
                        <wp:meta_key><![CDATA[_job_regions]]></wp:meta_key>
                        <wp:meta_value><![CDATA[a:2:{i:0;s:<?=strlen(strtolower(url_make($il)));?>:"<?=strtolower(url_make($il));?>";i:1;s:<?=strlen(strtolower(url_make($ilce)));?>:"<?=strtolower(url_make($ilce));?>";}]]></wp:meta_value>
                    </wp:postmeta>
                    <wp:postmeta>
                        <wp:meta_key><![CDATA[_job_location]]></wp:meta_key>
                        <wp:meta_value><![CDATA[<?=$row['ADRES'];?>]]></wp:meta_value>
                    </wp:postmeta>
                    <wp:postmeta>
                        <wp:meta_key><![CDATA[_job_phone]]></wp:meta_key>
                        <wp:meta_value />
                    </wp:postmeta>
                    <wp:postmeta>
                        <wp:meta_key><![CDATA[_job_email]]></wp:meta_key>
                        <wp:meta_value />
                    </wp:postmeta>
                    <wp:postmeta>
                        <wp:meta_key><![CDATA[_job_website]]></wp:meta_key>
                        <wp:meta_value />
                    </wp:postmeta>
                    <wp:postmeta>
                        <wp:meta_key><![CDATA[_job_price_from]]></wp:meta_key>
                        <wp:meta_value />
                    </wp:postmeta>
                    <wp:postmeta>
                        <wp:meta_key><![CDATA[_job_price_to]]></wp:meta_key>
                        <wp:meta_value />
                    </wp:postmeta>
                    <wp:postmeta>
                        <wp:meta_key><![CDATA[_job_price_range]]></wp:meta_key>
                        <wp:meta_value><![CDATA[notsay]]></wp:meta_value>
                    </wp:postmeta>
                    <wp:postmeta>
                        <wp:meta_key><![CDATA[_job_hours]]></wp:meta_key>
                        <wp:meta_value><![CDATA[a:2:{s:8:"timezone";s:3:"UTC";s:3:"day";a:7:{i:1;a:3:{s:4:"from";a:1:{i:0;s:0:"";}s:2:"to";a:1:{i:0;s:0:"";}s:4:"type";s:11:"enter_hours";}i:2;a:3:{s:4:"from";a:1:{i:0;s:0:"";}s:2:"to";a:1:{i:0;s:0:"";}s:4:"type";s:11:"enter_hours";}i:3;a:3:{s:4:"from";a:1:{i:0;s:0:"";}s:2:"to";a:1:{i:0;s:0:"";}s:4:"type";s:11:"enter_hours";}i:4;a:3:{s:4:"from";a:1:{i:0;s:0:"";}s:2:"to";a:1:{i:0;s:0:"";}s:4:"type";s:11:"enter_hours";}i:5;a:3:{s:4:"from";a:1:{i:0;s:0:"";}s:2:"to";a:1:{i:0;s:0:"";}s:4:"type";s:11:"enter_hours";}i:6;a:3:{s:4:"from";a:1:{i:0;s:0:"";}s:2:"to";a:1:{i:0;s:0:"";}s:4:"type";s:11:"enter_hours";}i:0;a:3:{s:4:"from";a:1:{i:0;s:0:"";}s:2:"to";a:1:{i:0;s:0:"";}s:4:"type";s:11:"enter_hours";}}}]]></wp:meta_value>
                    </wp:postmeta>
                    <wp:postmeta>
                        <wp:meta_key><![CDATA[_job_location_friendly]]></wp:meta_key>
                        <wp:meta_value />
                    </wp:postmeta>
                    <wp:postmeta>
                        <wp:meta_key><![CDATA[_job_socials]]></wp:meta_key>
                        <wp:meta_value><![CDATA[a:0:{}]]></wp:meta_value>
                    </wp:postmeta>
                    <wp:postmeta>
                        <wp:meta_key><![CDATA[_job_logo]]></wp:meta_key>
                        <wp:meta_value><![CDATA[1663]]></wp:meta_value>
                    </wp:postmeta>
                    <wp:postmeta>
                        <wp:meta_key><![CDATA[_listing_views_count]]></wp:meta_key>
                        <wp:meta_value><![CDATA[1]]></wp:meta_value>
                    </wp:postmeta>
                    <wp:postmeta>
                        <wp:meta_key><![CDATA[_views_count]]></wp:meta_key>
                        <wp:meta_value><![CDATA[2]]></wp:meta_value>
                    </wp:postmeta>
                    <wp:postmeta>
                        <wp:meta_key><![CDATA[geolocation_lat]]></wp:meta_key>
                        <wp:meta_value />
                    </wp:postmeta>
                    <wp:postmeta>
                        <wp:meta_key><![CDATA[geolocation_long]]></wp:meta_key>
                        <wp:meta_value />
                    </wp:postmeta>
                </item>
                <?php } ?>
   </channel>
</rss>