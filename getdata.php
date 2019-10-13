<?php
if (isset($_POST["ezanivakitler_link"])) {
    $xml_ezanivakitler = simplexml_load_file($_POST["ezanivakitler_link"]);
    $ezanivakitler = "İmsâk : " . $xml_ezanivakitler->cityinfo->vakit->ezaniImsak .
        "<br>Sabâh : " . $xml_ezanivakitler->cityinfo->vakit->ezaniSabah .
        "<br>Güneş : " . $xml_ezanivakitler->cityinfo->vakit->ezaniGunes .
        "<br>İşrak : " . $xml_ezanivakitler->cityinfo->vakit->ezaniIsrak .
        "<br>Kerâhet : " . $xml_ezanivakitler->cityinfo->vakit->ezaniKerahet .
        "<br>Öğle : " . $xml_ezanivakitler->cityinfo->vakit->ezaniOgle .
        "<br>İkindi : " . $xml_ezanivakitler->cityinfo->vakit->ezaniIkindi .
        "<br>Akşam : " . $xml_ezanivakitler->cityinfo->vakit->ezaniAksam .
        "<br>Yatsı : " . $xml_ezanivakitler->cityinfo->vakit->ezaniYatsi .
        "<br>Kıble Sâati : " . $xml_ezanivakitler->cityinfo->vakit->ezaniKible;
    echo $ezanivakitler;
}

if (isset($_POST["digervakitler_link"])) {
    $xml_tumvakitler = simplexml_load_file($_POST["digervakitler_link"]);
    $digervakitler = "İmsâk : " . $xml_tumvakitler->cityinfo->vakit->imsak .
        "<br>Sabâh : " . $xml_tumvakitler->cityinfo->vakit->sabah .
        "<br>Güneş : " . $xml_tumvakitler->cityinfo->vakit->gunes .
        "<br>İşrak : " . $xml_tumvakitler->cityinfo->vakit->israk .
        "<br>Dahve-i Kübrâ : " . $xml_tumvakitler->cityinfo->vakit->dahve .
        "<br>Kerâhet : " . $xml_tumvakitler->cityinfo->vakit->kerahet .
        "<br>Öğle : " . $xml_tumvakitler->cityinfo->vakit->ogle .
        "<br>İkindi : " . $xml_tumvakitler->cityinfo->vakit->ikindi .
        "<br>Asr-ı Sânî : " . $xml_tumvakitler->cityinfo->vakit->asrisani .
        "<br>İsfirâr-ı Şems : " . $xml_tumvakitler->cityinfo->vakit->isfirar .
        "<br>Akşam : " . $xml_tumvakitler->cityinfo->vakit->aksam .
        "<br>İştibâk-i Nücûm : " . $xml_tumvakitler->cityinfo->vakit->istibak .
        "<br>Yatsı : " . $xml_tumvakitler->cityinfo->vakit->yatsi .
        "<br>İşâ-i Sânî : " . $xml_tumvakitler->cityinfo->vakit->isaisani .
        "<br>Gece Yarısı Vakti : " . $xml_tumvakitler->cityinfo->vakit->geceyarisi .
        "<br>Teheccüd : " . $xml_tumvakitler->cityinfo->vakit->teheccud .
        "<br>Seher : " . $xml_tumvakitler->cityinfo->vakit->seher .
        "<br>Kıble Sâati : " . $xml_tumvakitler->cityinfo->vakit->kible;
    echo $digervakitler;
}
