<?php
include("funcs.php");


$city = $_COOKIE['il'];
$region = $_COOKIE['ilce'];
$city_id = $_COOKIE['city_id'];
$tarih = date('Y-m-d');
// setlocale(LC_TIME, 'tr_TR');
// $times = array();
// $time_names = array("İmsâk", "İsfirâr-ı Şems", "Sabâh", "Akşam", "Güneş", "İştibâk-i Nücûm", "İşrak", "Yatsı", "Dahve-i Kübrâ", "İşâ-i Sânî", "Kerâhet", "Gece Yarısı Vakti", "Öğle", "Teheccüd", "İkindi", "Seher", "Asr-ı Sânî", "Kıble Sâati");
// $time_descriptions = array("İmsâk vakti: Dört mezhebde de, (şer’î gece)nin sonudur. Ya'nî, (Fecr-i sâdık) denilen beyâzlığın şarkdaki (doğudaki) ufk-ı zâhirî (görünen ufuk) hattının bir noktasında
// görülmesidir. Oruc bu vakitde başlar.", "İkindi kerâhet (İsfirâr-ı şems) vakti: Güneş batarken nemâz kılması tahrîmen mekrûh, ya'nî harâm olan zemândır. Güneş sarardıkdan sonra, ön (alt) kenârı zâhirî (görünen) ufuk hattına bir mızrak boyu
// kalınca, ya'nî merkezinin hakîkî ufukdan 5 derece yükseklikde olunca başlayan ve batıncaya kadar olan müddettir. Ya'nî, berrak bir havada, ışığın geldiği yerlerin veya
// kendisinin bakacak kadar sararmağa başladığı vakitden, batıncaya kadar olan zemân demekdir. Bu vakte (İsfirâr-ı şems) zemânı denir. İkindi nemâzını
// kılamayanlar, bu kerâhet vaktinde sadece farzını mutlaka kılmalı, nemâzı kazâya bırakmamalıdır", "Sabâh nemâzı vakti: Sabâh nemâzının ilk vakti imsâk vaktidir. Sabâh nemâzını Türkiye takvîmindeki imsâk vaktinden, Türkiyede 15-20 dakîka sonra kılmak ihtiyâtlı olur.", "Akşam nemâzı Vakti: Güneş kayboldukdan sonra başlayıp, şafak kararıncaya kadar, ya’nî kırmızılık kayboluncaya kadar devâm eder", "Güneş: Sabâh nemâzının son vakti olup, güneşin ön [üst] kenârının, o mahaldeki, ufk-ı zâhirî (görünen ufuk) hattından doğduğu vakittir.", "Akşam kerâhet (iştibâk-i nücûm) vakti: Yıldızlar çoğaldıkdan, ya'nî güneşin arka kenârının zâhirî (görünen) ufuk hattı altına on dereceye indikden sonraki vakittir. Bu vakit ile gurûb vakti arasındaki zemân,
// İstanbul gibi, arzı 41 derece olan mahaller için, bir senede, 53 ile 67 dakîka arasında değişmekdedir. Akşam nemâzını, vaktin evvelinde kılmak sünnetdir. (İştibâk-i
// nücûm) vaktinden, ya'nî yıldızlar çoğaldıkdan, ya'nî güneşin arka kenârının zâhirî ufuk hattı altına on derece irtifâ’a indikden sonraya bırakmak harâmdır. Hastalık,
// seferî olmak, hazır ta’âmı (yemeği) yimek için, bu kadar gecikdirilebilir.", "İşrak vakti: Güneş doğduktan sonra, güneşin arka (alt) kenârının zâhirî (görünen) ufuktan bir mızrak boyu yükseldiği veya güneşin merkezinin ufk-ı hakîkîden (Hakîkî ufukdan),
// 5 derece yükseklikde olduğu vakittir. Güneş doğarken olan kerâhet vaktinin sonudur.", "Yatsı nemâzı vakti: Yatsı, işâ demektir. İşâ-i evvel, yatsının ilk vaktidir. Batıdaki zâhirî (görünen) ufuk hattı üzerinde kırmızılığın kaybolması ile başlayan vakittir. Ya'nî güneşin üst
// kenârının ufk-ı zâhirî (görünen ufuk) altında 17 derece aşağıya indiği vakittir. Yatsı nemâzının vakti, İmâmeyn’e (İmâm-ı Ebû Yûsüf ve İmâm-ı Muhammed’e) göre
// işâ-i evvel vaktinde başlar. Diğer üç mezhebde de böyledir", "Dahve-i kübrâ vakti: Dahve-i kübrâ vakti, oruca niyet etmenin son vaktidir. Dahve-i kübrâ vakti oruc müddetinin, ya'nî şer’î gündüz müddetinin yarısıdır ki, zevâl vaktinden öncedir. Şer'î
// gündüz, imsâk vakti ile akşam vakti arasındaki müddettir. Ya'nî Dahve-i kübrâ vakti, imsâk ve akşam vakitleri toplamının yarısıdır. Bir gün evvel güneş batmasından,
// oruc günü (Dahve-i kübrâ)ya kadar, Ramazan orucuna kalb ile niyyet etmek de farzdır. Belli gün olan adak orucunun ve nâfile orucun niyet zemânı da böyledir. Kazâ
// ve keffâret orucuna ve mu’ayyen olmayan adak oruclarına fecrden (imsâk vaktinden) sonra niyet edilemez.", "İşâ-i sânî vakti: Batıdaki zâhirî (görünen) ufuk hattı üzerinde beyazlığın kaybolması ile başlayan vakittir. Ya'nî güneşin üst kenârının ufk-ı zâhirî (görünen ufuk) altında 19 derece
// aşağıya indiği ve beyazlığın kaybolduğu vakittir. İmâm-ı a’zam’a göre yatsı vaktinin başladığı zemândır.", "Zevâl kerâhet vakti: Güneş Nısf-ün-nehâr dâiresi üzerinde, gündüz ortasından, ya'nî zevâl vaktinden temkin zemânı evvel ve sonra olan iki vakt arasındaki zemândır. Bu zemânın
// başlangıcı, öğle nemâzı vaktinden iki temkin müddeti evvel olup, İstanbul için 20 dakîkadır. Nemâz kılması tahrîmen mekrûh, ya'nî harâm olan zemândır.", "Gece yarısı vakti: Şer’î gece, gurûbdan fecre kadar olan zemândır. Ya'nî güneşin batışı olan akşam vakti ile imsâk vakti arasındaki zemândır. Bu ikisi arasındaki zemân ikiye
// bölünüp, çıkan müddet, akşam nemâzı vaktine eklenirse veya imsâk vaktinden çıkarılırsa, gece yarısı bulunmuş olur. Şâfi’î mezhebinde yatsı nemâzının âhir (son)
// vakti, şer’î gecenin yarısına kadar diyenler vardır. Yatsıyı, şer’î gecenin yarısından sonra kılmak, bunlara göre câiz değildir. Hanefîde ise, mekrûhdur.", "Öğle nemâzı Vakti: Gölgeler kısalıp, uzamağa başladığı zemândan i’tibâren başlar. Öğle vakti, asr-ı evvele kadar, ya’nî her şeyin gölgesi, hakîkî zevâl vaktindeki uzunluğundan, kendi
// boyu mikdârı veyâ asr-ı sânîye kadar, ya’nî boyunun iki misli uzayıncaya kadar devâm eder. Birincisi, iki imâma ve diğer üç mezhebe göre, ikincisi, İmâm-ı a’zama
// göredir.", "Teheccüd vakti: Şer’î gecenin, ya'nî Güneşin batışı olan akşam vakti ile imsâk vakti arasındaki zemânın üçde ikisi geçdikden sonraki vakittir. Ya'nî şer'î gecenin son üçte biridir.
// Teheccüd nemâzı imsâk vaktinden önce kılınır. Teheccüd, uykuyu terk etmek demekdir. Gündüz kılınan bin rek’atden dahâ fazîletlidir. İki rek’at kazâ nemâzı kılmak
// da, teheccüd kılmakdan daha efdaldir.", "İkindi nemâzı vakti: İkindiye asr-ı evvel de denir. İki imâma (İmâm-ı Ebû Yûsüf ve İmâm-ı Muhammed’e) göre, ikindi vaktinin başlama zemânıdır. Diğer üç mezhebde de böyledir. Bir
// şeyin gölgesi, zevâl vaktindeki boyundan, bu şeyin boyu mikdârı uzayınca başlayan vakittir.", "Seher vakti: Güneşin batışı olan akşam vakti ile imsâk vakti arasındaki zemânın son altıda biridir. (Şir’at-ül-islâm) şerhinde diyor ki, (Hadîs-i şerîfde, (Gece seher vaktinde ve
// nemâzlardan sonra yapılan düâ kabûl olunur) buyuruldu. Düâya hamd ve senâ ve salevât ile başlamak ve sonunda iki avucu yüze sürmek sünnetdir). Bu
// vakitlerde istigfâr etmeği, ağlamağı, Allahü teâlâya yalvarmağı ganîmet bilmelidir. (Dürer) de diyor ki: (Seher vaktinde yenilen yemeğe sahûr denir.)", "Asr-ı sânî vakti: İmâm-ı a’zam’a göre, ikindi vaktinin başlama zemânı demektir. Bir şeyin gölgesi, zevâl vaktindeki boyundan, bu şeyin iki misli uzayınca başlayan vakittir.", "Kıble sâati vakti: Harîta üzerinde bir şehir ile, Mekke şehri arasında çizilen doğruya (Kıble hattı) denir. Bu hat, kıble istikametini gösterir. Güneş bu hat üzerine gelince, (Kıble sâati
// vakti) olur. Kıble sâati vakti'nde Güneşe dönen, kıbleye dönmüş olur.");

$conn = mysqli_connect($host, $username, $pass, $db);
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
mysqli_set_charset($conn, "utf8");

if (isset($city)) {
    $url = "http://www.turktakvim.com/XMLservis.php?tip=vakit&cityID=" . $city_id . "&tarih=" . date('Y-m-d');
    $url_ezani = "http://www.turktakvim.com/XMLservis.php?tip=ezani&cityID=" . $city_id . "&tarih=" . date('Y-m-d');
} else {
    $url = "http://www.turktakvim.com/XMLservis.php?tip=vakit&cityID=16741&tarih=" . date('Y-m-d');
    $url_ezani = "http://www.turktakvim.com/XMLservis.php?tip=ezani&cityID=16741&tarih=" . date('Y-m-d');
}
$xml_genel = get_content("http://www.turktakvim.com/XMLservis.php?tip=takvim&tarih=" . date('Y-m-d'));
?>

<!DOCTYPE html>
<html lang="tr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=0,maximum-scale=1,user-scalable=no">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://fonts.googleapis.com/css?family=Open+Sans&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/bootstrap.css">

    <style>
        @media only screen and (max-width:700px) {
            #container {
                width: 100%;
                height: auto;
                margin: 0;
            }
        }

        @media all and (max-width:375px) {
            footer>button {
                font-size: .9rem !important;
            }
        }

        /* @media all and (max-width:375px) {
            footer>button {
                display: block;
                width: 100%;
                margin-bottom: 5px;
            }
        } */

        body {
            font-family: 'Open Sans', sans-serif;
            text-align: center;
            background-color: #f1f1f1;
        }

        #container {
            margin: auto;
            /* width: 400px; */
            width: 100%;
            /* border: 1px solid gray; */
            padding: 10px;
        }

        #leftside {
            width: 50%;
            float: left;
        }

        #rightside {
            width: 50%;
            float: left;
        }

        .modal-body {
            text-align: left;
        }
    </style>
</head>

<body onload="startTime()">
    <div id="container">
        <header>
            <h1>Türkiye Takvimi</h1>
            <div id="time">
                <span id="tarih"></span> | <span id="saat"></span>
            </div>
        </header>
        <hr>
        <main>
            <?php
            $sql = "SELECT gununsozu,gununolayi FROM onyuz_turkce WHERE tarih = '$tarih'";
            $result = mysqli_query($conn, $sql);
            if (mysqli_num_rows($result) > 0)
                while ($row = mysqli_fetch_assoc($result)) {
                    echo $row["gununsozu"];
                    $gununolayi = $row["gununolayi"];
                }

            echo "<hr>";
            echo "<p><small><a href='/MYPROJ_turktakvimhybrid'>$city / $region</a></small></p>";

            $xml_tumvakitler = get_content($url);
            $aksam = strval($xml_tumvakitler->cityinfo->vakit->aksam);
            echo "İmsak : " . $xml_tumvakitler->cityinfo->vakit->imsak;
            echo "<br>Güneş : " . $xml_tumvakitler->cityinfo->vakit->gunes;
            echo "<br>Öğle : " . $xml_tumvakitler->cityinfo->vakit->ogle;
            echo "<br>İkindi : " . $xml_tumvakitler->cityinfo->vakit->ikindi;
            echo "<br>Akşam : " . $xml_tumvakitler->cityinfo->vakit->aksam;
            echo "<br>Yatsı : " . $xml_tumvakitler->cityinfo->vakit->yatsi;
            echo "<br><br>";

            echo '<div>
                    <span id="neyekalan"></span>&nbsp;<span id="kalan"></span>
                </div>';
            echo "<hr>";
            echo $gununolayi;
            ?>
        </main>
        <hr>
        <footer>
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#digervakitler" id="btn_digervakitler">Diğer Vakitler</button>
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#ezanivakitler" id="btn_ezanivakitler">Ezani Vakitler</button>
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#arkayaprak" id="btn_arkayaprak">Arka Yaprak</button>
        </footer>
    </div>

    <!-- Diğer Vakitler Modal -->
    <div class="modal fade" id="digervakitler" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Diğer Vakitler</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body text-center" id="digervakitlermodalcontent">
                    <img src="img/ajax-loader.gif" alt="">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Ana Sayfa</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Arka Yaprak Modal -->
    <div class="modal fade" id="arkayaprak" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" width="1000">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Arka Yaprak</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body" id="arkayaprakmodalcontent">
                    <?php
                    $sql = "SELECT baslik,arkaYuz FROM arkayuz_turkce WHERE tarih = '$tarih'";
                    $result = mysqli_query($conn, $sql);
                    if (mysqli_num_rows($result) > 0)
                        while ($row = mysqli_fetch_assoc($result)) {
                            echo "<strong>" . $row["baslik"] . "</strong><br><br>";
                            echo $row["arkaYuz"];
                        }
                    ?>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Ana Sayfa</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Ezani Vakitler Modal -->
    <div class="modal fade" id="ezanivakitler" role="dialog">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Ezani Vakitler</h4>
                </div>
                <div class="modal-body text-center" id="ezanivakitlermodalcontent">
                    <img src="img/ajax-loader.gif" alt="">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Ana Sayfa</button>
                </div>
            </div>
        </div>
    </div>



    <script src="js/jquery-3.4.1.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.js"></script>
    <script src="js/moment.js"></script>
    <script>
        var current_time;
        var kalan;
        var imsak = '<?php echo $xml_tumvakitler->cityinfo->vakit->imsak; ?>';
        var gunes = '<?php echo $xml_tumvakitler->cityinfo->vakit->gunes; ?>';
        var ogle = '<?php echo $xml_tumvakitler->cityinfo->vakit->ogle; ?>';
        var ikindi = '<?php echo $xml_tumvakitler->cityinfo->vakit->ikindi; ?>';
        var aksam = '<?php echo $xml_tumvakitler->cityinfo->vakit->aksam; ?>';
        var yatsi = '<?php echo $xml_tumvakitler->cityinfo->vakit->yatsi; ?>';

        function startTime() {
            var today = new Date();
            var h = today.getHours();
            var m = today.getMinutes();
            var s = today.getSeconds();
            m = checkTime(m);
            s = checkTime(s);
            current_time = h + ":" + m;
            //current_time = "21:00";
            if (current_time.length < 5) current_time = "0" + current_time;


            if ((current_time >= imsak) && (current_time < gunes)) {
                document.getElementById('neyekalan').innerHTML = "Güneş vaktine kalan:";
                console.log("imsak gunes araligi");
                calculate_hours_difference(gunes);
            } else if ((current_time >= gunes) && (current_time < ogle)) {
                document.getElementById('neyekalan').innerHTML = "Öğle vaktine kalan:";
                console.log("duha");
                calculate_hours_difference(ogle);
            } else if ((current_time >= ogle) && (current_time < ikindi)) {
                document.getElementById('neyekalan').innerHTML = "İkindi vaktine kalan:";
                console.log("ogle");
                calculate_hours_difference(ikindi);
            } else if ((current_time >= ikindi) && (current_time < aksam)) {
                document.getElementById('neyekalan').innerHTML = "Akşam vaktine kalan:";
                console.log("ikindi");
                calculate_hours_difference(aksam);
            } else if ((current_time >= aksam) && (current_time < yatsi)) {
                document.getElementById('neyekalan').innerHTML = "Yatsı vaktine kalan:";
                console.log("aksam");
                calculate_hours_difference(yatsi);
            } else if (24 >= current_time >= yatsi) {


                document.getElementById('neyekalan').innerHTML = "İmsak vaktine kalan:";
                console.log("yatsi");
                calculate_hours_difference_imsak(imsak);

            } else if (imsak >= current_time) {

                document.getElementById('neyekalan').innerHTML = "İmsak vaktine kalan:";
                console.log("yatsi");
                calculate_hours_difference(imsak);
            } else {
                console.log("else");
            }

            document.getElementById('saat').innerHTML = current_time;
            document.getElementById('kalan').innerHTML = kalan;
            var t = setTimeout(startTime, 500);
        }

        function calculate_hours_difference(deger) {
            var start = moment.duration(current_time, "HH:mm");
            var end = moment.duration(deger, "HH:mm");
            var diff = end.subtract(start);

            if (diff.hours() != 0 && diff.minutes() != 0)
                kalan = diff.hours() + " saat " + diff.minutes() + " dakika";
            else if (diff.hours() == 0 && diff.minutes() != 0)
                kalan = diff.minutes() + " dakika";
            else if (diff.hours() != 0 && diff.minutes() == 0)
                kalan = diff.hours() + " saat";
            else
                kalan = "60 saniye içinde";
        }


        function calculate_hours_difference_imsak(deger) {
            var start = moment.duration(current_time - 24, "HH:mm");

            var end = moment.duration(deger, "HH:mm");

            var diff = end.subtract(start);

            if (diff.hours() != 0 && diff.minutes() != 0)
                kalan = diff.hours() + " saat " + diff.minutes() + " dakika";
            else if (diff.hours() == 0 && diff.minutes() != 0)
                kalan = diff.minutes() + " dakika";
            else if (diff.hours() != 0 && diff.minutes() == 0)
                kalan = diff.hours() + " saat";
            else
                kalan = "60 saniye içinde";
        }


        function checkTime(i) {
            if (i < 10) {
                i = "0" + i
            }; // add zero in front of numbers < 10
            return i;
        }

        $("#btn_ezanivakitler").click(function() {
            $.ajax({
                method: "POST",
                url: "getdata.php",
                data: {
                    ezanivakitler_link: '<?php echo "$url_ezani"; ?>'
                },
                success: function(res) {
                    document.getElementById('ezanivakitlermodalcontent').innerHTML = res;
                }
            })
        })

        $("#btn_digervakitler").click(function() {
            $.ajax({
                method: "POST",
                url: "getdata.php",
                data: {
                    digervakitler_link: '<?php echo "$url"; ?>'
                },
                success: function(res) {
                    document.getElementById('digervakitlermodalcontent').innerHTML = res;
                }
            })
        })

        $(document).ready(function() {
            var tarih = new Date();
            var gun = tarih.getDay();
            var ay = tarih.getMonth();
            var yil = tarih.getFullYear();
            var gunler = ['Pazar', 'Pazartesi', 'Salı', 'Çarşamba', 'Perşembe', 'Cuma', 'Cumartesi'];
            var aylar = ['Ocak', 'Şubat', 'Mart', 'Nisan', 'Mayıs', 'Haziran', 'Temmuz', 'Ağustos', 'Eylül', 'Ekim', 'Kasım', 'Aralık'];
            $('#tarih').html(tarih.getDate() + ' ' + aylar[ay] + ' ' + yil + ' ' + gunler[gun]);
        })
    </script>
</body>

</html>