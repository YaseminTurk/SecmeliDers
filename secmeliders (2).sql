-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Anamakine: 127.0.0.1
-- Üretim Zamanı: 24 Ağu 2020, 14:33:10
-- Sunucu sürümü: 5.6.17
-- PHP Sürümü: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Veritabanı: `secmeliders`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `admin_id` int(11) NOT NULL AUTO_INCREMENT,
  `admin_ad` varchar(50) COLLATE utf8_turkish_ci NOT NULL,
  `admin_soyad` varchar(50) COLLATE utf8_turkish_ci NOT NULL,
  `admin_kadi` varchar(50) COLLATE utf8_turkish_ci NOT NULL,
  `admin_sifre` varchar(50) COLLATE utf8_turkish_ci NOT NULL,
  `admin_yetki` enum('0','1') COLLATE utf8_turkish_ci NOT NULL,
  PRIMARY KEY (`admin_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci AUTO_INCREMENT=2 ;

--
-- Tablo döküm verisi `admin`
--

INSERT INTO `admin` (`admin_id`, `admin_ad`, `admin_soyad`, `admin_kadi`, `admin_sifre`, `admin_yetki`) VALUES
(1, 'Yasemin', 'Türk', 'ysmn', '12345', '');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `bolum`
--

CREATE TABLE IF NOT EXISTS `bolum` (
  `bolum_id` int(11) NOT NULL AUTO_INCREMENT,
  `bolum_ad` varchar(200) COLLATE utf8_turkish_ci NOT NULL,
  PRIMARY KEY (`bolum_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci AUTO_INCREMENT=7 ;

--
-- Tablo döküm verisi `bolum`
--

INSERT INTO `bolum` (`bolum_id`, `bolum_ad`) VALUES
(1, 'BİLGİSAYAR MÜHENDİSLİĞİ'),
(2, 'BİYOMEDİKAL MÜHENDİSLİĞİ'),
(3, 'ELEKTRİK-ELEKTRONİK MÜHENDİSLİĞİ'),
(4, 'MAKİNE MÜHENDİSLİĞİ'),
(5, 'MEKATRONİK MÜHENDİSLİĞİ'),
(6, 'METALURJİ VE MALZEME MÜHENDİSLİĞİ');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `dersler`
--

CREATE TABLE IF NOT EXISTS `dersler` (
  `ders_id` int(11) NOT NULL AUTO_INCREMENT,
  `bolum_id` int(11) NOT NULL,
  `ders_kodu` int(11) NOT NULL,
  `ders_ad` varchar(100) COLLATE utf8_turkish_ci NOT NULL,
  `ders_donem` int(10) NOT NULL,
  `ders_akts` int(10) NOT NULL,
  `ders_kontenjan` int(10) NOT NULL,
  `ders_secim` int(11) NOT NULL,
  PRIMARY KEY (`ders_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci AUTO_INCREMENT=259 ;

--
-- Tablo döküm verisi `dersler`
--

INSERT INTO `dersler` (`ders_id`, `bolum_id`, `ders_kodu`, `ders_ad`, `ders_donem`, `ders_akts`, `ders_kontenjan`, `ders_secim`) VALUES
(1, 1, 3301462, 'İŞ HUKUKU VE ETİK', 4, 2, 1, 0),
(2, 1, 3301463, 'İLETİŞİM BECERİLERİ VE AKADEMİK RAPORLAMA', 4, 2, 3, 0),
(3, 1, 3301464, 'SOSYAL SORUMLULUK VE DEĞERLER EĞİTİMİ', 4, 2, 3, 0),
(4, 1, 3301465, 'ETKİLİ İLETİŞİM VE BEDEN DİLİ', 4, 2, 1, 0),
(5, 1, 3301466, 'MEDYA OKUR YAZARLIĞI', 4, 2, 2, 0),
(6, 1, 3301467, 'YÖNETİM VE ORGANİZASYON', 4, 2, 2, 0),
(7, 1, 3301468, 'ÇEVRE VE EKOLOJİ', 4, 2, 2, 0),
(8, 1, 3301469, 'YAŞAM BOYU ÖĞRENME', 4, 2, 2, 0),
(9, 1, 3301470, 'İLETİŞİM VE STRES YÖNETİMİ', 4, 2, 2, 0),
(10, 1, 3301561, 'SİNYAL İŞLEME', 5, 3, 2, 0),
(11, 1, 3301562, 'TASARIM DESENLERİ', 5, 3, 3, 0),
(12, 1, 3301563, 'İNSAN BİLGİSAYAR ETKİLEŞİMİ', 5, 3, 2, 0),
(13, 1, 3301564, 'BİYOMEDİKAL SİSTEMLER', 5, 3, 1, 0),
(14, 1, 3301565, 'SİMÜLASYON VE MODELLEME', 5, 3, 3, 0),
(15, 1, 3301566, 'BİLGİSAYAR DONANIMI', 5, 3, 2, 0),
(16, 1, 3301567, 'WEB TASARIMI', 5, 3, 1, 0),
(17, 1, 3301568, 'VERİ MADENCİLİĞİ', 5, 3, 3, 0),
(18, 1, 3301661, 'SİSTEM PROGRAMLAMA', 6, 3, 2, 0),
(19, 1, 3301662, 'BİLGİSAYAR ve AĞ GÜVENLİĞİ', 6, 3, 3, 0),
(20, 1, 3301663, 'GÖMÜLÜ SİSTEMLER', 6, 3, 2, 0),
(21, 1, 3301664, 'İŞ ZEKASI', 6, 3, 1, 0),
(22, 1, 3301665, 'ROBOTİK', 6, 3, 3, 0),
(23, 1, 3301666, 'İŞLETİM SİSTEMLERİ YÖNETİMİ', 6, 3, 3, 0),
(24, 1, 3301667, 'WEB SERVİSLERİ', 6, 3, 2, 0),
(25, 1, 3301668, 'MİKROBİLGİSAYARLI SİSTEM TASARIMI', 6, 3, 2, 0),
(26, 1, 3301669, 'MESLEKİ İNGİLİZCE', 6, 3, 3, 0),
(27, 1, 3301670, 'KRİPTOLOJİ', 6, 3, 3, 0),
(28, 1, 3301671, 'BİLGİSAYAR BİLİMLERİNDE İNOVASYON VE ARAŞTIRMA TEKNİKLERİ', 6, 3, 1, 0),
(29, 1, 3301672, 'DİSİPLİNLERARASI ÇALIŞMA', 6, 3, 3, 0),
(30, 1, 3301673, 'GERÇEKÇİ MODELLEME VE SİMÜLASYON TASARIMI', 6, 3, 3, 0),
(31, 1, 3301761, 'PROG. MANTIK KONTROLLÖR', 7, 3, 2, 0),
(32, 1, 3301762, 'PARALEL İŞLEMCİLİ SİSTEMLER', 7, 3, 3, 0),
(33, 1, 3301763, 'KONTROL SİSTEMLERİ', 7, 3, 3, 0),
(34, 1, 3301764, 'BİLGİSAYAR DESTEKLİ TASARIM', 7, 3, 3, 0),
(35, 1, 3301765, 'YÖNEYLEM ARAŞTIRMASI', 7, 3, 2, 0),
(36, 1, 3301766, 'KABLOSUZ AĞLAR', 7, 3, 3, 0),
(37, 1, 3301767, 'BULUT BİLİŞİM', 7, 3, 3, 0),
(38, 1, 3301768, 'PAKET PROGRAMLAR', 7, 3, 3, 0),
(39, 1, 3301769, 'BİLGİSAYAR GRAFİKLERİ', 7, 3, 2, 0),
(40, 1, 3301770, 'VERİ İLETİŞİM TEKNİKLERİ', 7, 3, 2, 0),
(41, 1, 3301771, 'OYUN PROGRAMLAMA', 7, 3, 2, 0),
(42, 1, 3301772, 'E-TİCARET VE UYGULAMALARI', 7, 3, 2, 0),
(43, 1, 3301773, 'PARALEL PROGRAMLAMA', 7, 3, 2, 0),
(44, 1, 3301774, 'MVC TABANLI WEB MİMARİSİ', 7, 3, 2, 0),
(45, 1, 3301775, 'YEŞİL BİLİŞİM', 7, 3, 3, 0),
(46, 1, 3301776, 'ÇEVRE VE ENERJİ', 7, 6, 3, 0),
(47, 1, 3301782, 'KALİTE ve GÜVENCE SİSTEMLERİ', 7, 2, 2, 0),
(48, 1, 3301783, 'MÜHENDİSLİK EKONOMİSİ', 7, 2, 3, 0),
(49, 1, 3301784, 'İŞARET DİLİ', 7, 2, 2, 0),
(50, 1, 3301785, 'DIŞ TİCARET', 7, 2, 2, 0),
(51, 1, 3301786, 'TOPLUMA HİZMET UYGULAMALARI', 7, 2, 3, 0),
(52, 1, 3301787, 'REKLAMCILIK VE STRATEJİLERİ', 7, 2, 1, 0),
(53, 1, 3301788, 'BİLİMSEL ARAŞTIRMA VE YAYIN ETİĞİ', 7, 6, 3, 0),
(88, 3, 3302457, 'SENSÖRLER VE DÖNÜŞTÜRÜCÜLER ', 4, 3, 5, 0),
(89, 3, 3302458, 'VERİ YAPILARI', 4, 3, 2, 0),
(90, 3, 3302459, 'MÜHENDİSLİK VERİ MADENCİLİĞİ', 4, 3, 4, 0),
(91, 3, 3302460, 'MALZEME BİLİMİ', 4, 3, 4, 0),
(92, 3, 3302461, 'İŞ HUKUKU VE ETİK', 4, 2, 3, 0),
(93, 3, 3302462, 'TEKNOLOJİ TARİHİ', 4, 2, 5, 0),
(94, 3, 3302463, 'SOSYAL SORUMLULUK VE DEĞERLER EĞİTİMİ', 4, 2, 3, 0),
(95, 3, 3302464, 'YÖNETİM VE ORGANİZSAYON', 4, 2, 4, 0),
(96, 3, 3302465, 'İLETİŞİM BECERİLERİ', 4, 2, 2, 0),
(97, 3, 3302555, 'HABERLEŞME SİSTEMLERİ-1', 5, 3, 2, 0),
(98, 3, 3302556, 'ELEKTRONİK DEVRE TASARIMI', 5, 3, 2, 0),
(99, 3, 3302557, 'YÜKSEK GERİLİM TEKNİĞİ', 5, 3, 2, 0),
(100, 3, 3302558, 'YENİLENEBİLİR ENERJİ KAYNAKLARI', 5, 3, 2, 0),
(101, 3, 3302559, ' ROBOTİK', 5, 3, 2, 0),
(102, 3, 3302560, 'VERİ İLETİŞİM TEKNİKLERİ', 5, 3, 1, 0),
(103, 3, 3302561, 'YAPAY ZEKA', 5, 3, 2, 0),
(104, 3, 3302562, 'MÜHENDİSLİK YAZILIMLARI', 5, 3, 2, 0),
(105, 3, 3302654, 'HABERLEŞME SİSTEMLERİ-2', 6, 3, 2, 0),
(106, 3, 3302655, 'ELEKTRİK ENERJİ ÜRETİMİ', 6, 3, 3, 0),
(107, 3, 3302656, 'GÖMÜLÜ SİSTEMLER', 6, 3, 3, 0),
(108, 3, 3302657, 'ELEKTRİK TESİSLERİNDE KORUMA', 6, 3, 3, 0),
(109, 3, 3302658, 'ELEKTRİK TESİSLERİNDE TOPRAKLAMA', 6, 3, 3, 0),
(110, 3, 3302659, 'NÜKLEER ENERJİ MÜHENDİSLİĞİNE GİRİŞ', 6, 3, 2, 0),
(111, 3, 3302660, 'RADYO VE TV SİSTEMLERİ', 6, 3, 1, 0),
(112, 3, 3302661, 'FİLTRE TASARIM', 6, 3, 2, 0),
(113, 3, 3302662, 'GÜÇ ELEKTRONİĞİNİN ENDÜSTRİYEL UYGULAMALARI', 6, 3, 3, 0),
(114, 3, 3302663, 'GÜÇ SİSTEM ANALİZ', 6, 3, 2, 0),
(115, 3, 3302664, 'GENİŞ ÖLÇEKLİ TÜM DEVRE (VLSI) TASARIMI', 6, 3, 2, 0),
(116, 3, 3302754, 'ANTENLER VE YAYILMA', 7, 4, 2, 0),
(117, 3, 3302755, 'AYDINLATMA VE İÇ TESİSAT', 7, 4, 3, 0),
(118, 3, 3302756, 'FPGA İLE SAYISAL SİSTEM TASARIMI ', 7, 4, 3, 0),
(119, 3, 3302757, 'ELEKTRİK İLETİM SİSTEMLERİ', 7, 4, 3, 0),
(120, 3, 3302758, 'SAYISAL SİNYAL İŞLEME ', 7, 4, 3, 0),
(121, 3, 3302759, 'ELEKTRİK MOTORLARI SÜRÜCÜLERİ ', 7, 4, 3, 0),
(122, 3, 3302760, 'ÇEVRE VE ENERJİ', 7, 6, 3, 0),
(123, 3, 3302761, 'ELEKTRİK DAĞITIM SİSTEMLERİ', 7, 4, 3, 0),
(124, 3, 3302762, 'OPTO ELEKTRONİK SİSTEMLER', 7, 4, 3, 0),
(125, 3, 3302763, 'MİKRODALGA TEKNİĞİ', 7, 4, 3, 0),
(126, 3, 3302764, 'ELEKTRİK ENERJİSİ YÖNETİMİ', 7, 4, 3, 0),
(127, 3, 3302765, 'ÖZEL ELEKTRİK MAKİNALARI', 7, 4, 3, 0),
(128, 3, 3302766, 'TIP ELEKTRONİĞİ', 7, 4, 3, 0),
(129, 3, 3302767, 'TOPLUMA HİZMET UYGULAMALARI', 7, 2, 3, 0),
(130, 3, 3302768, 'GİRİŞİMCİLİK VE İŞ PLANI HAZIRLAMA', 7, 2, 2, 0),
(131, 3, 3302769, 'KALİTE VE GÜVENCE SİSTEMİ', 7, 2, 2, 0),
(132, 3, 3302770, 'MÜHENDİSLİK EKONOMİSİ', 7, 2, 2, 0),
(133, 3, 3302771, 'BİLİMSEL ARAŞTIRMA VE YAYIN ETİĞİ', 7, 6, 2, 0),
(134, 4, 3303358, 'TOZ METALURJİSİ (YM)', 3, 3, 2, 0),
(140, 4, 3303359, 'MODERN İMALAT YÖNTEMLERİ (YM)', 3, 3, 2, 0),
(141, 4, 3303360, 'SAÇ METAL KALIPÇILIĞI (YM)', 3, 3, 2, 0),
(142, 4, 3303361, 'MEKANİK SİSTEM TASARIMI (YM)', 3, 3, 2, 0),
(143, 4, 3303362, ' TAŞIT TEKNOLOJİSİ (YM)', 3, 3, 2, 0),
(144, 4, 3303363, 'TEMEL MOTOR TEKNOLOJİLERİ (YM)', 3, 3, 2, 0),
(145, 4, 3303364, 'ALTERNATİF ENERJİ KAYNAKLARI (YM)', 3, 3, 2, 0),
(146, 4, 3303365, 'ELEKTRİKLİ TAŞITLAR (YM)', 3, 3, 2, 0),
(147, 4, 3303457, 'TAHRİBATSIZ MUAYENE METOTLARI (YM', 4, 3, 2, 0),
(148, 4, 3303458, 'BİLGİSAYAR KONTROLLÜ TAKIM. TEZ. (CNC) (YM', 4, 3, 2, 0),
(149, 4, 3303459, 'ENDÜSTRİYEL TASARIM (YM)', 4, 3, 2, 0),
(150, 4, 3303460, 'PLASTİK KALIPÇILIĞI (YM) ', 4, 3, 2, 0),
(151, 4, 3303461, 'KAYNAK TEKNİKLERİ (YM)', 4, 3, 2, 0),
(152, 4, 3303462, 'KOMPOZİT YAPILARA GİRİŞ (YM)', 4, 3, 2, 0),
(153, 4, 3303463, 'İÇTEN YANMALI MOTORLAR (YM)', 4, 3, 2, 0),
(154, 4, 3303464, ' GAZ TÜRBÜNLERİ (YM)', 4, 3, 2, 0),
(155, 4, 3303465, 'GÜÇ AKTARMA ORGANLARI (YM)', 4, 3, 2, 0),
(156, 4, 330346, 'YAKITLAR VE YANMA (YM)', 4, 3, 2, 0),
(157, 4, 3303467, 'BAM YAKIT SİSTEMLERİ (YM)', 4, 3, 2, 0),
(158, 4, 3302468, 'SOSYAL SORUMLULUK VE DEĞERLER EĞİTİMİ (YM)', 4, 2, 2, 0),
(159, 4, 3303469, 'KURUMSAL KAYNAK PLANLAMASI (YM)', 4, 2, 2, 0),
(160, 4, 3304470, ' İŞLETME ORGANİZASYONU (YM)', 4, 2, 2, 0),
(161, 4, 3305471, 'PAZARLAMA İLKELERİ (YM)', 4, 2, 2, 0),
(162, 4, 3306472, 'ULULARARASI İLİŞKİLER (YM)', 4, 2, 2, 0),
(163, 4, 3307473, 'TEKNOLOJİ TARİHİ (YM)', 4, 2, 2, 0),
(164, 4, 3303557, 'ISIL İŞLEM TEKNİKLERİ (YM)', 5, 3, 2, 0),
(165, 4, 3303558, 'DÖKÜM TEKNOLOJİLERİ (YM)', 5, 3, 2, 0),
(166, 4, 3303558, 'TRASPORT TEKNİĞİ (YM)', 5, 3, 2, 0),
(167, 4, 3303559, 'OTOMATİK KONTROL (YM)', 5, 3, 2, 0),
(168, 4, 3303559, 'OPTİMİZASYON TEKNİKLERİ (YM)', 5, 3, 2, 0),
(169, 4, 3303560, 'KALDIRMA VE İLETME MEKANİZMALARI (YM)', 5, 3, 2, 0),
(170, 4, 3303561, 'OTOMOTİV ELEKTRİK VE ELEKTRONİĞİ (YM) ', 5, 3, 2, 0),
(171, 4, 3303562, 'TAŞIT MEKANİĞİ (YM) ', 5, 3, 2, 0),
(172, 4, 3303563, 'MOTOR KONSTRÜKSİYONU (YM)', 5, 3, 2, 0),
(173, 4, 3303564, 'SAM YAKIT SİSTEMLERİ (YM)', 5, 3, 2, 0),
(174, 4, 3303565, 'KAZANLAR VE HESAPLAMALARI (YM)', 5, 3, 2, 0),
(175, 4, 3303566, 'AKIM MAKİNALARI (YM) ', 5, 3, 2, 0),
(176, 4, 3303567, 'RAYLI SİSTEM TEKNOLOJİLERİ (YM)', 5, 3, 2, 0),
(177, 4, 3303568, 'ENERJİ DEPOLAMA SİSTEMLERİ (YM)', 5, 3, 2, 0),
(178, 4, 3303569, 'UÇAK MOTORLARI (YM)', 5, 3, 2, 0),
(179, 4, 3303651, ' MALZEMELERİN MEKANİK DAVRANIŞLARI (YM)', 6, 3, 2, 0),
(180, 4, 3303652, 'SONLU ELEMANLAR (YM)', 6, 3, 2, 0),
(181, 4, 3303653, 'ROBOTİK (YM)', 6, 3, 2, 0),
(182, 4, 3303654, 'MİKRO İŞLEME (YM)', 6, 3, 2, 0),
(183, 4, 3303655, 'HİDROLİK PNÖMATİK SİSTEMLER (YM)', 6, 3, 2, 0),
(184, 4, 3303656, 'İMALATTA KALİTE KONTROL (YM)', 6, 3, 2, 0),
(185, 4, 3303657, 'BİLGİSAYAR DESTEKLİ MÜHENDİSLİK ANALİZİ (YM)', 6, 3, 2, 0),
(186, 4, 3303658, 'İMALATTA TİTREŞİM (YM) ', 6, 3, 2, 0),
(187, 4, 3303658, 'ISI DEĞİŞTİRİCİLER (YM)', 6, 3, 2, 0),
(188, 4, 3303659, 'ENERJİ YÖNETİMİ (YM)', 6, 3, 2, 0),
(189, 4, 3303660, 'İKLİMLENDİRME VE SOĞUTMA SİSTEMLERİ (YM)', 6, 3, 2, 0),
(190, 4, 3303661, 'TAŞIT GÜVENLİK SİSTEMLERİ (YM) ', 6, 3, 2, 0),
(191, 4, 3303662, 'TAŞITLARDA AKTARMA ORGANLARI (YM)', 6, 3, 2, 0),
(192, 4, 3303663, ' MOTOR PERFORMANS TESTLERİ (YM)', 6, 3, 2, 0),
(193, 4, 3303664, 'TAŞIT YÖNLENDİRME SÜS. VE FREN SİS. (YM) ', 6, 3, 2, 0),
(194, 4, 3303665, 'TAŞIT TASARIMI (YM)', 6, 3, 2, 0),
(195, 4, 3303666, ' MOTOR DİNAMİĞİ (YM) ', 6, 3, 2, 0),
(196, 4, 3303756, 'APARAT TASARIMI (YM)', 7, 3, 2, 0),
(197, 4, 3303757, 'ÜRETİM TESİS TASARIMI (YM)', 7, 3, 2, 0),
(198, 4, 3303758, ' DÖVME TEKNOLOJİSİ (YM) ', 7, 3, 2, 0),
(199, 4, 3303759, 'NANO TEKNOLOJİ (YM)', 7, 3, 2, 0),
(200, 4, 3303760, 'HİDROLİK MAKİNALAR (YM) ', 7, 3, 2, 0),
(201, 4, 3303761, 'BİLGİSAYAR DESTEKLİ TASARIM VE ÜRETİM (YM)', 7, 3, 2, 0),
(202, 4, 3303762, 'ENJEKSİYON KALIPÇILIĞI (YM)', 7, 3, 2, 0),
(203, 4, 3303763, 'BİLGİSAYAR DESTEKLİ KALIP TASARIMI (YM)', 7, 3, 2, 0),
(204, 4, 3303764, 'ENDÜSTRİYEL OTOMASYON (YM) ', 7, 3, 2, 0),
(205, 4, 3303765, 'TRİBOLOJİ (YM)', 7, 3, 2, 0),
(206, 4, 3303766, 'BALİSTİK (YM) ', 7, 3, 2, 0),
(207, 4, 3303767, 'MODAL ANALİZ (YM)', 7, 3, 2, 0),
(208, 7, 3303768, 'OTOMOTİV MEKATRONİĞİ (YM)', 7, 3, 2, 0),
(209, 4, 3303769, 'TESİSAT TEKNOLOJİSİ VE TASARIMI (YM) ', 7, 3, 2, 0),
(210, 4, 3303770, ' TAŞIT PERFORMANS TESTLERİ (YM) ', 7, 3, 2, 0),
(211, 4, 3303771, 'TAŞIT KAYNAKLI EMİSYONLAR (YM)', 7, 3, 2, 0),
(212, 4, 3303772, 'OTOMOTİVDEKİ YENİ TEKNOLOJİLER (YM)', 7, 3, 2, 0),
(213, 4, 3303773, 'TAŞIT HASAR ANALİZİ (YM)', 7, 3, 2, 0),
(214, 4, 3303774, ' TAŞIT GÜVENLİK SİSTEMLERİ (YM)', 7, 3, 2, 0),
(215, 4, 3303775, 'ELEKTRİK SANTRALLERİ (YM) ', 7, 3, 2, 0),
(216, 4, 3303776, 'MOTOR KONSTRÜKSİYONU (YM)', 7, 3, 2, 0),
(217, 4, 3303777, 'BİYO AKIŞKAN DİNAMİĞİ (YM)', 7, 3, 2, 0),
(218, 4, 3303778, 'İŞ MAKİNALARI (YM)', 7, 3, 2, 0),
(219, 4, 3303779, 'ISI YALITIMI (YM)', 7, 3, 2, 0),
(220, 4, 3303780, 'ÇEVRE VE ENERJİ (YM) ', 7, 6, 2, 0),
(221, 4, 3303781, 'SOSYOLOJİ (YM) ', 7, 2, 2, 0),
(222, 4, 3303782, 'KALİTE YÖNETİMİ VE STANDARDİZASYON (YM)', 7, 2, 2, 0),
(223, 4, 3303783, 'FİKRİ VE SINAİ HAKLAR (YM) ', 7, 2, 2, 0),
(224, 4, 3303784, 'ARAŞTIRMA VE YAYIN ETİĞİ (YM)', 7, 6, 2, 0),
(225, 4, 3303785, 'MÜHENDİSLİK EKONOMİSİ (YM) ', 7, 2, 2, 0),
(226, 4, 3303786, 'İLETİŞİM TEKNİKLERİ (YM)', 7, 2, 2, 0),
(227, 4, 3303787, ' İŞ HUKUKU VE ETİK (YM)', 7, 2, 2, 0),
(228, 4, 3303788, 'GİRİŞİMCİLİK VE İŞ PLANI HAZIRLAMA (YM)', 7, 2, 2, 0),
(229, 4, 3303789, 'ENDÜSTRİYEL SOSYOLOJİ (YM) ', 7, 2, 2, 0),
(230, 4, 3303790, 'PROJE YÖNETİMİ (YM)', 7, 2, 2, 0),
(231, 4, 3303791, 'FABRİKA ORGANİZASYONU VE YÖNETİMİ (YM)', 7, 2, 2, 0),
(232, 4, 3303792, 'İSTATİSTİK (YM)', 7, 2, 2, 0),
(233, 4, 3303793, 'TOPLUMA HİZMET UYGULAMALARI (YM)', 7, 2, 2, 0),
(234, 6, 3304412, 'TEKNOLOJİ TARİHİ', 4, 2, 2, 0),
(235, 6, 3304413, 'MÜHENDİSLİK EKONOMİSİ', 4, 2, 2, 0),
(236, 6, 3302424, 'SOSYAL SORUMLULUK VE DEĞERLER EĞİTİMİ', 4, 2, 1, 0),
(237, 6, 3304510, 'POLİMER MALZEMELER', 5, 4, 1, 0),
(238, 6, 3304511, 'ÖZEL ÇELİKLER', 5, 4, 1, 0),
(239, 6, 3304512, 'MALZEME KİMYASI', 5, 4, 2, 0),
(240, 6, 3304513, 'MALZEMELERİN KAYNAK KABİLİYETİ ', 5, 4, 2, 0),
(241, 6, 3304514, 'TAHRİBATSIZ MUAYENE YÖNTEMLERİ', 5, 4, 2, 0),
(242, 6, 3304609, 'MALZEMELERİN GERİ KAZANIMI', 6, 4, 2, 0),
(243, 6, 3304610, 'SERAMİK MALZEMELER ', 6, 4, 2, 0),
(244, 6, 3304611, 'DÖKÜM TEKNOLOJİSİ', 6, 4, 2, 0),
(245, 6, 3304612, 'REFRAKTERLER VE ENDÜSTRİYEL FIRINLAR', 6, 4, 2, 0),
(246, 6, 3304613, 'HASAR ANALİZİ', 6, 4, 2, 0),
(247, 6, 3304614, ' KAYNAK METALURJİSİ VE UYGULAMALARI', 6, 4, 2, 0),
(248, 6, 3304708, 'CEVHER HAZIRLAMA ', 7, 4, 2, 0),
(249, 6, 3304709, 'KOROZYON', 7, 4, 2, 0),
(250, 6, 3304710, 'BİYO-MALZEMELER', 7, 4, 2, 0),
(251, 6, 3304711, 'YÜZEY MÜHENDİSLİĞİ ', 7, 4, 2, 0),
(252, 6, 3304712, ' TOZ METALURJİSİ ', 7, 4, 2, 0),
(253, 6, 3304713, 'TOPLAM KALİTE YÖNETİMİ ', 7, 2, 2, 0),
(254, 6, 3304714, 'ARAŞTIRMA VE YAYIN İLKELERİ ', 7, 2, 2, 0),
(255, 6, 3304715, 'GİRİŞİMCİLİK VE İŞ PLANI HAZIRLAMA ', 7, 2, 2, 0),
(257, 2, 2, '2', 2, 2, 2, 0),
(258, 1, 1, '1', 1, 1, 1, 0);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `ders_ogrenci`
--

CREATE TABLE IF NOT EXISTS `ders_ogrenci` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ogrenci_id` int(11) NOT NULL,
  `ders_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `gecici_ders`
--

CREATE TABLE IF NOT EXISTS `gecici_ders` (
  `gecici_ders_id` int(11) NOT NULL AUTO_INCREMENT,
  `gecici_ders_ogrenci_id` int(11) NOT NULL,
  `gecici_ders_ders_id` int(11) NOT NULL,
  `gecici_ders_durum` tinyint(4) NOT NULL,
  PRIMARY KEY (`gecici_ders_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `ogrenci`
--

CREATE TABLE IF NOT EXISTS `ogrenci` (
  `ogrenci_id` int(11) NOT NULL AUTO_INCREMENT,
  `bolum_id` int(11) NOT NULL,
  `ogrenci_no` int(11) NOT NULL,
  `ogrenci_ad` varchar(50) COLLATE utf8_turkish_ci NOT NULL,
  `ogrenci_soyad` varchar(50) COLLATE utf8_turkish_ci NOT NULL,
  `ogrenci_kadi` varchar(50) COLLATE utf8_turkish_ci NOT NULL,
  `ogrenci_sifre` varchar(50) COLLATE utf8_turkish_ci NOT NULL,
  `ogrenci_sinif` int(11) NOT NULL,
  PRIMARY KEY (`ogrenci_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci AUTO_INCREMENT=9 ;

--
-- Tablo döküm verisi `ogrenci`
--

INSERT INTO `ogrenci` (`ogrenci_id`, `bolum_id`, `ogrenci_no`, `ogrenci_ad`, `ogrenci_soyad`, `ogrenci_kadi`, `ogrenci_sifre`, `ogrenci_sinif`) VALUES
(1, 1, 143301000, 'Deniz', 'Altay', 'dnz', '12345', 0),
(2, 1, 143301001, 'Yasemin ', 'Kaya', 'ysmnky', '12345', 4),
(3, 3, 143301002, 'Ahmet', 'Türk', 'ahmt', '12345', 0),
(4, 3, 143301003, 'Mehmet', 'Türk', 'mhmt', '12345', 0),
(5, 1, 143301004, 'Arife', 'Türk', 'arifetrk', '12345', 0),
(6, 1, 143301005, 'Ebru', 'Türk', 'ebrutrk', '12345', 0),
(7, 1, 1, '1', '1', '1', '1', 0),
(8, 3, 2, '2', '2', '2', '2', 2);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
