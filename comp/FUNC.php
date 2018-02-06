<?php

namespace comp;

class FUNC {

    protected static $namabulan = array('Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember');
    protected static $namahari = array('Sun' => 'Minggu', 'Mon' => 'Senin', 'Tue' => 'Selasa', 'Wed' => 'Rabu', 'Thu' => 'Kamis', 'Fri' => 'Jumat', 'Sat' => 'Sabtu');

    public static function rupiah($number){
        return 'Rp. '.number_format($number, 0, ',', '.');
    }

    public static function tanggal($tgl, $opt) {
        $D = date('D', strtotime($tgl));
        $d = date('d', strtotime($tgl));
        $m = date('m', strtotime($tgl));
        $M = date('M', strtotime($tgl));
        $y = date('Y', strtotime($tgl));
        $w = date('H:i:s', strtotime($tgl));
        $t = date('H:i a', strtotime($tgl));
        switch ($opt) {
            case 'time' : return $t;
                break;
            case 'day' : return self::$namahari[$D];
                break;
            case 'short_date' : return date('d/m/Y', strtotime($tgl));
                break;
            case 'long_date' : return intval($d) . ' ' . self::$namabulan[$m - 1] . ' ' . $y;
                break;
            case 'short_date_time' : return date('d/m/Y H:i:s', strtotime($tgl));
                break;
            case 'long_date_time' : return intval($d) . ' ' . self::$namabulan[$m - 1] . ' ' . $y . ' [' . $w . ']';
                break;
            case 'date_month' : return intval($d) . ' ' . $M;
                break;
        }
    }

    public static function moments($session_time) {
        $session_time = strtotime($session_time);
        $time_difference = time() - $session_time;
        $seconds = $time_difference;
        $minutes = round($time_difference / 60);
        $hours = round($time_difference / 3600);
        $days = round($time_difference / 86400);
        $weeks = round($time_difference / 604800);
        $months = round($time_difference / 2419200);
        $years = round($time_difference / 29030400);

        if ($seconds <= 60) {
            echo 'Baru saja';
        } else if ($minutes <= 60) {
            if ($minutes == 1)
                echo 'Satu menit yang lalu';
            else
                echo $minutes . ' menit yang lalu';
        }
        else if ($hours <= 24) {
            if ($hours == 1)
                echo 'Satu jam yang lalu';
            else
                echo $hours . ' jam yang lalu';
        }
        else if ($days <= 7) {
            if ($days == 1)
                echo 'Satu hari yang lalu';
            else
                echo $days . ' hari yang lalu';
        }
        else if ($weeks <= 4) {
            if ($weeks == 1)
                echo 'Satu minggu yang lalu';
            else
                echo $weeks . ' minggu yang lalu';
        }
        else if ($months <= 12) {
            if ($months == 1)
                echo 'Satu bulan yang lalu';
            else
                echo $months . ' bulan yang lalu';
        }
        else {
            if ($years == 1)
                echo 'Satu tahun yang lalu';
            else
                echo $years . ' tahun yang lalu';
        }
    }

    public static function thumbsImage($nw, $nh, $source, $stype, $dest) {
        $size = getimagesize($source); // ukuran gambar
        $w = $size[0];
        $h = $size[1];
        switch ($stype) { // format gambar
            case 'gif':
                $simg = imagecreatefromgif($source);
                break;
            case 'jpg':
                $simg = imagecreatefromjpeg($source);
                break;
            case 'png':
                $simg = imagecreatefrompng($source);
                break;
        }

        $dimg = imagecreatetruecolor($nw, $nh); // menciptakan image baru
        $wm = $w / $nw;
        $hm = $h / $nh;

        $h_height = $nh / 2;
        $w_height = $nw / 2;

        if ($w > $h) {
            $adjusted_width = $w / $hm;
            $half_width = $adjusted_width / 2;
            $int_width = $half_width - $w_height;
            imagecopyresampled($dimg, $simg, -$int_width, 0, 0, 0, $adjusted_width, $nh, $w, $h);
        } elseif (($w < $h) || ($w == $h)) {
            $adjusted_height = $h / $wm;
            $half_height = $adjusted_height / 2;
            $int_height = $half_height - $h_height;
            imagecopyresampled($dimg, $simg, 0, -$int_height, 0, 0, $nw, $adjusted_height, $w, $h);
        } else {
            imagecopyresampled($dimg, $simg, 0, 0, 0, 0, $nw, $nh, $w, $h);
        }

        imagejpeg($dimg, $dest, 100);
        imagedestroy($simg);
        imagedestroy($dimg);
    }

    public static function resizeImage($dw, $source, $stype, $dest) {
        $size = getimagesize($source); // ukuran gambar
        $sw = $size[0];
        $sh = $size[1];
        switch ($stype) { // format gambar
            case 'gif':
                $simg = imagecreatefromgif($source);
                break;
            case 'jpg':
                $simg = imagecreatefromjpeg($source);
                break;
            case 'png':
                $simg = imagecreatefrompng($source);
                break;
        }

        // $dw = 800;
        $dh = ($dw / $sw) * $sh;
        $dimg = imagecreatetruecolor($dw, $dh);
        imagecopyresampled($dimg, $simg, 0, 0, 0, 0, $dw, $dh, $sw, $sh);
        imagejpeg($dimg, $dest);

        imagedestroy($simg);
        imagedestroy($dimg);
        unlink($source);
    }

    public static function encodeImage($img_file, $mimeType) {
        $img_bin = base64_encode(fread(fopen($img_file, 'r'), filesize($img_file)));
        return 'data:' . $mimeType . ';base64,' . $img_bin;
    }

    public static function encryptor($string) {
        $output = false;
        $encrypt_method = 'AES-256-CBC';
        $secret_key1 = 'jendralhans@gmail.com';
        $secret_key2 = 'anggoro.triantoko@gmail.com';
        $key1 = hash('sha256', $secret_key1);
        $key2 = substr(hash('sha256', $secret_key2), 0, 16);
        $output = base64_encode(openssl_encrypt(($string), $encrypt_method, $key1, 0, $key2));
        return $output;
    }

    public static function decryptor($string) {
        $output = false;
        $encrypt_method = 'AES-256-CBC';
        $secret_key1 = 'jendralhans@gmail.com';
        $secret_key2 = 'anggoro.triantoko@gmail.com';
        $key1 = hash('sha256', $secret_key1);
        $key2 = substr(hash('sha256', $secret_key2), 0, 16);
        $output = openssl_decrypt(base64_decode($string), $encrypt_method, $key1, 0, $key2);
        return $output;
    }

    public static function showPre($data) {
        echo '<pre>';
        print_r($data);
        echo '</pre>';
    }

    public static function fixedInt($int, $len = '2', $val = '0') {
        return str_pad($int, $len, $val, STR_PAD_LEFT);
    }

    protected static $angka_urutan = array('1' => 'Pertama', '2' => 'Kedua', '3' => 'Ketiga', '4' => 'Keempat', '5' => 'Kelima', '6' => 'Keenam', '7' => 'Ketujuh', '8' => 'Kedelapan', '9' => 'Kesembilan', '10' => 'Kesepuluh');
    
    public static function terbilang($n){
        $number = array("", "Satu", "Dua", "Tiga", "Empat", "Lima", "Enam", "Tujuh", "Delapan", "Sembilan", "Sepuluh", "Sebelas");
        if ($n < 12)
            return " " . $number[$n];
        elseif ($n < 20)
            return self::terbilang($n - 10) . " Belas";
        elseif ($n < 100)
            return self::terbilang($n / 10) . " Puluh" . self::terbilang($n % 10);
        elseif ($n < 200)
            return " seratus" . self::terbilang($x - 100);
        elseif ($n < 1000)
            return self::terbilang($n / 100) . " Ratus" . self::terbilang($n % 100);
        elseif ($n < 2000)
            return " seribu" . self::terbilang($x - 1000);
        elseif ($n < 1000000)
            return self::terbilang($n / 1000) . " Ribu" . self::terbilang($n % 1000);
        elseif ($n < 1000000000)
            return self::terbilang($n / 1000000) . " Juta" . self::terbilang($n % 1000000);
    }
}

?>
