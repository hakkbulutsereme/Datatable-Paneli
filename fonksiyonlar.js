 var code = '<tr id="satir">\n<td width="10"><button type="button" table="" ad="" class="fa fa-minus button satir-sil" style="padding:3px;background-color:red;color:white;border-radius:50%"></button></td>\n<td><input type="text" name="adi[]" value=""></td>\n<td><select class="column_type" value="" name="turu[]" id="field_0_2">\n<option title="4-bayt\'lık bir tamsayı, işaretli aralığı -2,147,483,648\'den 2,147,483,647\'ye kadardır, işaretsiz aralığı 0\'dan 4,294,967,295\'e kadardır">INT</option>\n<option title="Değişken uzunluk (0-65,535) dizgisi, en fazla satır boyutu etkili en fazla uzunluk konusudur">VARCHAR</option>\n<option title="En fazla 65,535 (2^16 - 1) karakter uzunluğunda bir TEXT sütunu, bayt\'larda değerin uzunluğunu gösteren iki-bayt\'lık bir ön ek ile saklanır">TEXT</option>\n<option title="Bir tarih, desteklenen aralık 1000-01-01 ile 9999-12-31 arası">DATE</option>\n<optgroup label="Sayısal">\n<option title="1-bayt\'lık bir tamsayı, işaretli aralığı -128\'den 127\'ye kadardır, işaretsiz aralığı 0\'dan 255\'e kadardır">TINYINT</option>\n<option title="2-bayt\'lık bir tamsayı, işaretli aralığı -32,768\'den 32,767\'ye kadardır, işaretsiz aralığı 0\'dan 65,535\'e kadardır">SMALLINT</option>\n<option title="3-bayt\'lık bir tamsayı, işaretli aralığı -8,388,608\'den 8,388,607\'ye kadardır, işaretsiz aralığı 0\'dan 16,777,215\'e kadardır">MEDIUMINT</option>\n<option title="4-bayt\'lık bir tamsayı, işaretli aralığı -2,147,483,648\'den 2,147,483,647\'ye kadardır, işaretsiz aralığı 0\'dan 4,294,967,295\'e kadardır">INT</option>\n<option title="8-bayt\'lık bir tamsayı, işaretli aralığı -9,223,372,036,854,775,808\'den 9,223,372,036,854,775,807\'ye kadardır, işaretsiz aralığı 0\'dan 18,446,744,073,709,551,615\'e kadardır">BIGINT</option>\n<option disabled="disabled">-</option>\n<option title="Sabit noktalı bir sayı (M, D) - rakamların (M) en fazla sayısı 65\'tir, ondalıkların (D) en fazla sayısı 30\'dur. (varsayılan 0)">DECIMAL</option>\n<option title="Küçük kayan noktalı bir sayı, izin verilebilir değerler -3.402823466E+38\'den -1.175494351E-38\'e, 0 ve 1.175494351E-38\'den 3.402823466E+38\'e kadardır">FLOAT</option>\n<option title="Çift duyarlıklı kayan noktalı bir sayı, izin verilebilir değerler -1.7976931348623157E+308\'den -2.2250738585072014E-308\'e, 0 ve 2.2250738585072014E-308\'den 1.7976931348623157E+308\'e kadardır">DOUBLE</option>\n<option title="DOUBLE için eş anlamlı (istisna: REAL_AS_FLOAT SQL kipte FLOAT için eş anlamlıdır)">REAL</option>\n<option disabled="disabled">-</option>\n<option title="Bir bit alanı türü (M), değer (varsayılan 1\'dir, en fazla 64\'tür) başına bit\'lerin M\'sini saklar">BIT</option>\n<option title="TINYINT(1) için bir eş anlam, sıfır değeri false sayılır, sıfır olmayan değerler true sayılır">BOOLEAN</option>\n<option title="BIGINT UNSIGNED NOT NULL AUTO_INCREMENT UNIQUE için bir kod adı">SERIAL</option>\n</optgroup>\n<optgroup label="Tarih ve saat">\n<option title="Bir tarih, desteklenen aralık 1000-01-01 ile 9999-12-31 arası">DATE</option>\n<option title="Bir tarih ve saat birleşimi, desteklenen aralık 1000-01-01 00:00:00 ile 9999-12-31 23:59:59 arası">DATETIME</option>\n<option title="Bir zaman damgası, aralığı " 1970-01-01="" 00:00:01"="" utc="" ile="" "2038-01-09="" 03:14:07"="" arası,="" devirden="" ("1970-01-01="" 00:00:00"="" utc)="" bu="" yana="" saniye="" sayısı="" olarak="" saklanır"="">TIMESTAMP</option>\n<option title="Bir saat, aralığı -838:59:59 ile 838:59:59 arası">TIME</option>\n<option title="Dört rakamlı (4, varsayılan) bir yıl veya iki rakamlı (2) biçimde, izin verilebilir değerler 70 (1970) ile 69 (2069) arası ya da 1901 ile 2155 arası ve 0000">YEAR</option>\n</optgroup>\n<optgroup label="Dizgi">\n<option title="Saklandığında belirlenmiş uzunluğa sağdan takviyeli boşluklu sabit uzunluk (0-255, varsayılan 1) dizgisi">CHAR</option>\n<option title="Değişken uzunluk (0-65,535) dizgisi, en fazla satır boyutu etkili en fazla uzunluk konusudur">VARCHAR</option>\n<option disabled="disabled">-</option>\n<option title="En fazla 255 (2^8 - 1) karakter uzunluğunda bir TEXT sütunu, bayt\'larda değerin uzunluğunu gösteren bir-bayt\'lık bir ön ek ile saklanır">TINYTEXT</option>\n<option title="En fazla 65,535 (2^16 - 1) karakter uzunluğunda bir TEXT sütunu, bayt\'larda değerin uzunluğunu gösteren iki-bayt\'lık bir ön ek ile saklanır">TEXT</option>\n<option title="En fazla 16,777,215 (2^24 - 1) karakter uzunluğunda bir TEXT sütunu, bayt\'larda değerin uzunluğunu gösteren üç-bayt\'lık bir ön ek ile saklanır">MEDIUMTEXT</option>\n<option title="En fazla 4,294,967,295 veya 4GiB (2^32 - 1) karakter uzunluğunda bir TEXT sütunu, bayt\'larda değerin uzunluğunu gösteren dört-bayt\'lık bir ön ek ile saklanır">LONGTEXT</option>\n<option disabled="disabled">-</option>\n<option title="CHAR türü benzeridir ama ikili değer olmayan karakter dizgileri yerine ikili değer bayt dizgilerini saklar">BINARY</option>\n<option title="VARCHAR türü benzeridir ama ikili değer olmayan karakter dizgileri yerine ikili değer bayt dizgilerini saklar">VARBINARY</option>\n<option disabled="disabled">-</option>\n<option title="En fazla 255 (2^8 - 1) bayt uzunluğunda bir BLOB sütunu, değerin uzunluğunu gösteren bir-bayt\'lık bir ön ek ile saklanır">TINYBLOB</option>\n<option title="En fazla 16,777,215 (2^24 - 1) bayt uzunluğunda bir BLOB sütunu, değerin uzunluğunu gösteren üç-bayt\'lık bir ön ek ile saklanır">MEDIUMBLOB</option>\n<option title="En fazla 65,535 (2^16 - 1) bayt uzunluğunda bir BLOB sütunu, değerin uzunluğunu gösteren iki-bayt\'lık bir ön ek ile saklanır">BLOB</option>\n<option title="En fazla 4,294,967,295 veya 4GiB (2^32 - 1) bayt uzunluğunda bir BLOB sütunu, değerin uzunluğunu gösteren dört-bayt\'lık bir ön ek ile saklanır">LONGBLOB</option>\n<option disabled="disabled">-</option>\n<option title="Bir numaralandırma, 65,535 değerine kadar olan listeden seçilir ya da özel " hata="" değeridir"="">ENUM</option>\n<option title="64 üyeye kadar olan bir gruptan seçilen tek bir değerdir">SET</option>\n</optgroup>\n<optgroup label="Uzaysal">\n<option title="Herhangi bir türün geometrisini saklayabilen bir tür">GEOMETRY</option>\n<option title="2-boyutlu uzayda bir nokta">POINT</option>\n<option title="Noktalar arasındaki doğrusal eklentili bir eğri">LINESTRING</option>\n<option title="Poligon">POLYGON</option>\n<option title="Noktalar topluluğu">MULTIPOINT</option>\n<option title="Noktalar arasındaki doğrusal eklentili bir eğri topluluğu">MULTILINESTRING</option>\n<option title="Poligonlar topluluğu">MULTIPOLYGON</option>\n<option title="Herhangi bir türün geometri nesneleri topluluğu">GEOMETRYCOLLECTION</option>\n</optgroup>\n</select></td>\n<td><input type="number" name="uzunluk[]" value=""></td>\n<td>\n<select name="varsayilan[]" id="field_0_4" class="default_type">\n<option value="NONE">Yok</option>\n<option value="USER_DEFINED">Tanımlandığı gibi:</option>\n<option value="NULL">NULL</option>\n<option value="CURRENT_TIMESTAMP">CURRENT_TIMESTAMP</option>\n</select><br/><input type="text" name="tanimlanan[]" value="" style="max-width:100px;display:none"></td>\n<td>\n<select lang="en" dir="ltr" name="karsilastirma[]" id="field_0_5">\n<option value=""></option>\n<optgroup label="armscii8" title="ARMSCII-8 Armenian">\n<option value="armscii8_bin" title="Ermenice, İkili Değer">armscii8_bin</option>\n<option value="armscii8_general_ci" title="Ermenice, büyük küçük harfe duyarsız">armscii8_general_ci</option>\n</optgroup>\n<optgroup label="ascii" title="US ASCII">\n<option value="ascii_bin" title="Batı Avrupa (çokdilli), İkili Değer">ascii_bin</option>\n<option value="ascii_general_ci" title="Batı Avrupa (çokdilli), büyük küçük harfe duyarsız">ascii_general_ci</option>\n</optgroup>\n<optgroup label="big5" title="Big5 Traditional Chinese">\n<option value="big5_bin" title="Geleneksel Çince, İkili Değer">big5_bin</option>\n<option value="big5_chinese_ci" title="Geleneksel Çince, büyük küçük harfe duyarsız">big5_chinese_ci</option>\n</optgroup>\n<optgroup label="binary" title="Binary pseudo charset">\n<option value="binary" title="İkili Değer">binary</option>\n</optgroup>\n<optgroup label="cp1250" title="Windows Central European">\n<option value="cp1250_bin" title="Orta Avrupa (çokdilli), İkili Değer">cp1250_bin</option>\n<option value="cp1250_croatian_ci" title="Hırvatça, büyük küçük harfe duyarsız">cp1250_croatian_ci</option>\n<option value="cp1250_czech_cs" title="Çekçe, büyük küçük harfe duyarlı">cp1250_czech_cs</option>\n<option value="cp1250_general_ci" title="Orta Avrupa (çokdilli), büyük küçük harfe duyarsız">cp1250_general_ci</option>\n<option value="cp1250_polish_ci" title="Lehçe, büyük küçük harfe duyarsız">cp1250_polish_ci</option>\n</optgroup>\n<optgroup label="cp1251" title="Windows Cyrillic">\n<option value="cp1251_bin" title="Kiril (çokdilli), İkili Değer">cp1251_bin</option>\n<option value="cp1251_bulgarian_ci" title="Bulgarca, büyük küçük harfe duyarsız">cp1251_bulgarian_ci</option>\n<option value="cp1251_general_ci" title="Kiril (çokdilli), büyük küçük harfe duyarsız">cp1251_general_ci</option>\n<option value="cp1251_general_cs" title="Kiril (çokdilli), büyük küçük harfe duyarlı">cp1251_general_cs</option>\n<option value="cp1251_ukrainian_ci" title="Ukraynaca, büyük küçük harfe duyarsız">cp1251_ukrainian_ci</option>\n</optgroup>\n<optgroup label="cp1256" title="Windows Arabic">\n<option value="cp1256_bin" title="Arapça, İkili Değer">cp1256_bin</option>\n<option value="cp1256_general_ci" title="Arapça, büyük küçük harfe duyarsız">cp1256_general_ci</option>\n</optgroup>\n<optgroup label="cp1257" title="Windows Baltic">\n<option value="cp1257_bin" title="Baltık (çokdilli), İkili Değer">cp1257_bin</option>\n<option value="cp1257_general_ci" title="Baltık (çokdilli), büyük küçük harfe duyarsız">cp1257_general_ci</option>\n<option value="cp1257_lithuanian_ci" title="Litvanyaca, büyük küçük harfe duyarsız">cp1257_lithuanian_ci</option>\n</optgroup>\n<optgroup label="cp850" title="DOS West European">\n<option value="cp850_bin" title="Batı Avrupa (çokdilli), İkili Değer">cp850_bin</option>\n<option value="cp850_general_ci" title="Batı Avrupa (çokdilli), büyük küçük harfe duyarsız">cp850_general_ci</option>\n</optgroup>\n<optgroup label="cp852" title="DOS Central European">\n<option value="cp852_bin" title="Orta Avrupa (çokdilli), İkili Değer">cp852_bin</option>\n<option value="cp852_general_ci" title="Orta Avrupa (çokdilli), büyük küçük harfe duyarsız">cp852_general_ci</option>\n</optgroup>\n<optgroup label="cp866" title="DOS Russian">\n<option value="cp866_bin" title="Rusça, İkili Değer">cp866_bin</option>\n<option value="cp866_general_ci" title="Rusça, büyük küçük harfe duyarsız">cp866_general_ci</option>\n</optgroup>\n<optgroup label="cp932" title="SJIS for Windows Japanese">\n<option value="cp932_bin" title="Japonca, İkili Değer">cp932_bin</option>\n<option value="cp932_japanese_ci" title="Japonca, büyük küçük harfe duyarsız">cp932_japanese_ci</option>\n</optgroup>\n<optgroup label="dec8" title="DEC West European">\n<option value="dec8_bin" title="Batı Avrupa (çokdilli), İkili Değer">dec8_bin</option>\n<option value="dec8_swedish_ci" title="İsveççe, büyük küçük harfe duyarsız">dec8_swedish_ci</option>\n</optgroup>\n<optgroup label="eucjpms" title="UJIS for Windows Japanese">\n<option value="eucjpms_bin" title="Japonca, İkili Değer">eucjpms_bin</option>\n<option value="eucjpms_japanese_ci" title="Japonca, büyük küçük harfe duyarsız">eucjpms_japanese_ci</option>\n</optgroup>\n<optgroup label="euckr" title="EUC-KR Korean">\n<option value="euckr_bin" title="Korece, İkili Değer">euckr_bin</option>\n<option value="euckr_korean_ci" title="Korece, büyük küçük harfe duyarsız">euckr_korean_ci</option>\n</optgroup>\n<optgroup label="gb2312" title="GB2312 Simplified Chinese">\n<option value="gb2312_bin" title="Basitleştirilmiş Çince, İkili Değer">gb2312_bin</option>\n<option value="gb2312_chinese_ci" title="Basitleştirilmiş Çince, büyük küçük harfe duyarsız">gb2312_chinese_ci</option>\n</optgroup>\n<optgroup label="gbk" title="GBK Simplified Chinese">\n<option value="gbk_bin" title="Basitleştirilmiş Çince, İkili Değer">gbk_bin</option>\n<option value="gbk_chinese_ci" title="Basitleştirilmiş Çince, büyük küçük harfe duyarsız">gbk_chinese_ci</option>\n</optgroup>\n<optgroup label="geostd8" title="GEOSTD8 Georgian">\n<option value="geostd8_bin" title="Gürcüce, İkili Değer">geostd8_bin</option>\n<option value="geostd8_general_ci" title="Gürcüce, büyük küçük harfe duyarsız">geostd8_general_ci</option>\n</optgroup>\n<optgroup label="greek" title="ISO 8859-7 Greek">\n<option value="greek_bin" title="Yunanca, İkili Değer">greek_bin</option>\n<option value="greek_general_ci" title="Yunanca, büyük küçük harfe duyarsız">greek_general_ci</option>\n</optgroup>\n<optgroup label="hebrew" title="ISO 8859-8 Hebrew">\n<option value="hebrew_bin" title="İbranice, İkili Değer">hebrew_bin</option>\n<option value="hebrew_general_ci" title="İbranice, büyük küçük harfe duyarsız">hebrew_general_ci</option>\n</optgroup>\n<optgroup label="hp8" title="HP West European">\n<option value="hp8_bin" title="Batı Avrupa (çokdilli), İkili Değer">hp8_bin</option>\n<option value="hp8_english_ci" title="İngilizce, büyük küçük harfe duyarsız">hp8_english_ci</option>\n</optgroup>\n<optgroup label="keybcs2" title="DOS Kamenicky Czech-Slovak">\n<option value="keybcs2_bin" title="Çekçe-Slovakça, İkili Değer">keybcs2_bin</option>\n<option value="keybcs2_general_ci" title="Çekçe-Slovakça, büyük küçük harfe duyarsız">keybcs2_general_ci</option>\n</optgroup>\n<optgroup label="koi8r" title="KOI8-R Relcom Russian">\n<option value="koi8r_bin" title="Rusça, İkili Değer">koi8r_bin</option>\n<option value="koi8r_general_ci" title="Rusça, büyük küçük harfe duyarsız">koi8r_general_ci</option>\n</optgroup>\n<optgroup label="koi8u" title="KOI8-U Ukrainian">\n<option value="koi8u_bin" title="Ukraynaca, İkili Değer">koi8u_bin</option>\n<option value="koi8u_general_ci" title="Ukraynaca, büyük küçük harfe duyarsız">koi8u_general_ci</option>\n</optgroup>\n<optgroup label="latin1" title="cp1252 West European">\n<option value="latin1_bin" title="Batı Avrupa (çokdilli), İkili Değer">latin1_bin</option>\n<option value="latin1_danish_ci" title="Danca, büyük küçük harfe duyarsız">latin1_danish_ci</option>\n<option value="latin1_general_ci" title="Batı Avrupa (çokdilli), büyük küçük harfe duyarsız">latin1_general_ci</option>\n<option value="latin1_general_cs" title="Batı Avrupa (çokdilli), büyük küçük harfe duyarlı">latin1_general_cs</option>\n<option value="latin1_german1_ci" title="Almanca (sözlük), büyük küçük harfe duyarsız">latin1_german1_ci</option>\n<option value="latin1_german2_ci" title="Almanca (telefon defteri), büyük küçük harfe duyarsız">latin1_german2_ci</option>\n<option value="latin1_spanish_ci" title="İspanyolca, büyük küçük harfe duyarsız">latin1_spanish_ci</option>\n<option value="latin1_swedish_ci" title="İsveççe, büyük küçük harfe duyarsız">latin1_swedish_ci</option>\n</optgroup>\n<optgroup label="latin2" title="ISO 8859-2 Central European">\n<option value="latin2_bin" title="Orta Avrupa (çokdilli), İkili Değer">latin2_bin</option>\n<option value="latin2_croatian_ci" title="Hırvatça, büyük küçük harfe duyarsız">latin2_croatian_ci</option>\n<option value="latin2_czech_cs" title="Çekçe, büyük küçük harfe duyarlı">latin2_czech_cs</option>\n<option value="latin2_general_ci" title="Orta Avrupa (çokdilli), büyük küçük harfe duyarsız">latin2_general_ci</option>\n<option value="latin2_hungarian_ci" title="Macarca, büyük küçük harfe duyarsız">latin2_hungarian_ci</option>\n</optgroup>\n<optgroup label="latin5" title="ISO 8859-9 Turkish">\n<option value="latin5_bin" title="Türkçe, İkili Değer">latin5_bin</option>\n<option value="latin5_turkish_ci" title="Türkçe, büyük küçük harfe duyarsız">latin5_turkish_ci</option>\n</optgroup>\n<optgroup label="latin7" title="ISO 8859-13 Baltic">\n<option value="latin7_bin" title="Baltık (çokdilli), İkili Değer">latin7_bin</option>\n<option value="latin7_estonian_cs" title="Estçe, büyük küçük harfe duyarlı">latin7_estonian_cs</option>\n<option value="latin7_general_ci" title="Baltık (çokdilli), büyük küçük harfe duyarsız">latin7_general_ci</option>\n<option value="latin7_general_cs" title="Baltık (çokdilli), büyük küçük harfe duyarlı">latin7_general_cs</option>\n</optgroup>\n<optgroup label="macce" title="Mac Central European">\n<option value="macce_bin" title="Orta Avrupa (çokdilli), İkili Değer">macce_bin</option>\n<option value="macce_general_ci" title="Orta Avrupa (çokdilli), büyük küçük harfe duyarsız">macce_general_ci</option>\n</optgroup>\n<optgroup label="macroman" title="Mac West European">\n<option value="macroman_bin" title="Batı Avrupa (çokdilli), İkili Değer">macroman_bin</option>\n<option value="macroman_general_ci" title="Batı Avrupa (çokdilli), büyük küçük harfe duyarsız">macroman_general_ci</option>\n</optgroup>\n<optgroup label="sjis" title="Shift-JIS Japanese">\n<option value="sjis_bin" title="Japonca, İkili Değer">sjis_bin</option>\n<option value="sjis_japanese_ci" title="Japonca, büyük küçük harfe duyarsız">sjis_japanese_ci</option>\n</optgroup>\n<optgroup label="swe7" title="7bit Swedish">\n<option value="swe7_bin" title="İsveççe, İkili Değer">swe7_bin</option>\n<option value="swe7_swedish_ci" title="İsveççe, büyük küçük harfe duyarsız">swe7_swedish_ci</option>\n</optgroup>\n<optgroup label="tis620" title="TIS620 Thai">\n<option value="tis620_bin" title="Tayca, İkili Değer">tis620_bin</option>\n<option value="tis620_thai_ci" title="Tayca, büyük küçük harfe duyarsız">tis620_thai_ci</option>\n</optgroup>\n<optgroup label="ucs2" title="UCS-2 Unicode">\n<option value="ucs2_bin" title="Evrensel Kod (çokdilli), İkili Değer">ucs2_bin</option>\n<option value="ucs2_croatian_ci" title="Hırvatça, büyük küçük harfe duyarsız">ucs2_croatian_ci</option>\n<option value="ucs2_croatian_mysql561_ci" title="Hırvatça">ucs2_croatian_mysql561_ci</option>\n<option value="ucs2_czech_ci" title="Çekçe, büyük küçük harfe duyarsız">ucs2_czech_ci</option>\n<option value="ucs2_danish_ci" title="Danca, büyük küçük harfe duyarsız">ucs2_danish_ci</option>\n<option value="ucs2_esperanto_ci" title="Esperanto, büyük küçük harfe duyarsız">ucs2_esperanto_ci</option>\n<option value="ucs2_estonian_ci" title="Estçe, büyük küçük harfe duyarsız">ucs2_estonian_ci</option>\n<option value="ucs2_general_ci" title="Evrensel Kod (çokdilli), büyük küçük harfe duyarsız">ucs2_general_ci</option>\n<option value="ucs2_general_mysql500_ci" title="Evrensel Kod (çokdilli)">ucs2_general_mysql500_ci</option>\n<option value="ucs2_german2_ci" title="Almanca (telefon defteri), büyük küçük harfe duyarsız">ucs2_german2_ci</option>\n<option value="ucs2_hungarian_ci" title="Macarca, büyük küçük harfe duyarsız">ucs2_hungarian_ci</option>\n<option value="ucs2_icelandic_ci" title="İzlandaca, büyük küçük harfe duyarsız">ucs2_icelandic_ci</option>\n<option value="ucs2_latvian_ci" title="Litvanyaca, büyük küçük harfe duyarsız">ucs2_latvian_ci</option>\n<option value="ucs2_lithuanian_ci" title="Litvanyaca, büyük küçük harfe duyarsız">ucs2_lithuanian_ci</option>\n<option value="ucs2_myanmar_ci" title="bilinmiyor, büyük küçük harfe duyarsız">ucs2_myanmar_ci</option>\n<option value="ucs2_persian_ci" title="Farsça, büyük küçük harfe duyarsız">ucs2_persian_ci</option>\n<option value="ucs2_polish_ci" title="Lehçe, büyük küçük harfe duyarsız">ucs2_polish_ci</option>\n<option value="ucs2_roman_ci" title="Batı Avrupa, büyük küçük harfe duyarsız">ucs2_roman_ci</option>\n<option value="ucs2_romanian_ci" title="Romence, büyük küçük harfe duyarsız">ucs2_romanian_ci</option>\n<option value="ucs2_sinhala_ci" title="Seylanca, büyük küçük harfe duyarsız">ucs2_sinhala_ci</option>\n<option value="ucs2_slovak_ci" title="Slovakça, büyük küçük harfe duyarsız">ucs2_slovak_ci</option>\n<option value="ucs2_slovenian_ci" title="Slovence, büyük küçük harfe duyarsız">ucs2_slovenian_ci</option>\n<option value="ucs2_spanish2_ci" title="Geleneksel İspanyolca, büyük küçük harfe duyarsız">ucs2_spanish2_ci</option>\n<option value="ucs2_spanish_ci" title="İspanyolca, büyük küçük harfe duyarsız">ucs2_spanish_ci</option>\n<option value="ucs2_swedish_ci" title="İsveççe, büyük küçük harfe duyarsız">ucs2_swedish_ci</option>\n<option value="ucs2_thai_520_w2" title="Tayca">ucs2_thai_520_w2</option>\n<option value="ucs2_turkish_ci" title="Türkçe, büyük küçük harfe duyarsız">ucs2_turkish_ci</option>\n<option value="ucs2_unicode_520_ci" title="Evrensel Kod (çokdilli)">ucs2_unicode_520_ci</option>\n<option value="ucs2_unicode_ci" title="Evrensel Kod (çokdilli), büyük küçük harfe duyarsız">ucs2_unicode_ci</option>\n<option value="ucs2_vietnamese_ci" title="Vietnamca, büyük küçük harfe duyarsız">ucs2_vietnamese_ci</option>\n</optgroup>\n<optgroup label="ujis" title="EUC-JP Japanese">\n<option value="ujis_bin" title="Japonca, İkili Değer">ujis_bin</option>\n<option value="ujis_japanese_ci" title="Japonca, büyük küçük harfe duyarsız">ujis_japanese_ci</option>\n</optgroup>\n<optgroup label="utf16" title="UTF-16 Unicode">\n<option value="utf16_bin" title="bilinmiyor, İkili Değer">utf16_bin</option>\n<option value="utf16_croatian_ci" title="Hırvatça, büyük küçük harfe duyarsız">utf16_croatian_ci</option>\n<option value="utf16_croatian_mysql561_ci" title="Hırvatça">utf16_croatian_mysql561_ci</option>\n<option value="utf16_czech_ci" title="Çekçe, büyük küçük harfe duyarsız">utf16_czech_ci</option>\n<option value="utf16_danish_ci" title="Danca, büyük küçük harfe duyarsız">utf16_danish_ci</option>\n<option value="utf16_esperanto_ci" title="Esperanto, büyük küçük harfe duyarsız">utf16_esperanto_ci</option>\n<option value="utf16_estonian_ci" title="Estçe, büyük küçük harfe duyarsız">utf16_estonian_ci</option>\n<option value="utf16_general_ci" title="bilinmiyor, büyük küçük harfe duyarsız">utf16_general_ci</option>\n<option value="utf16_german2_ci" title="Almanca (telefon defteri), büyük küçük harfe duyarsız">utf16_german2_ci</option>\n<option value="utf16_hungarian_ci" title="Macarca, büyük küçük harfe duyarsız">utf16_hungarian_ci</option>\n<option value="utf16_icelandic_ci" title="İzlandaca, büyük küçük harfe duyarsız">utf16_icelandic_ci</option>\n<option value="utf16_latvian_ci" title="Litvanyaca, büyük küçük harfe duyarsız">utf16_latvian_ci</option>\n<option value="utf16_lithuanian_ci" title="Litvanyaca, büyük küçük harfe duyarsız">utf16_lithuanian_ci</option>\n<option value="utf16_myanmar_ci" title="bilinmiyor, büyük küçük harfe duyarsız">utf16_myanmar_ci</option>\n<option value="utf16_persian_ci" title="Farsça, büyük küçük harfe duyarsız">utf16_persian_ci</option>\n<option value="utf16_polish_ci" title="Lehçe, büyük küçük harfe duyarsız">utf16_polish_ci</option>\n<option value="utf16_roman_ci" title="Batı Avrupa, büyük küçük harfe duyarsız">utf16_roman_ci</option>\n<option value="utf16_romanian_ci" title="Romence, büyük küçük harfe duyarsız">utf16_romanian_ci</option>\n<option value="utf16_sinhala_ci" title="Seylanca, büyük küçük harfe duyarsız">utf16_sinhala_ci</option>\n<option value="utf16_slovak_ci" title="Slovakça, büyük küçük harfe duyarsız">utf16_slovak_ci</option>\n<option value="utf16_slovenian_ci" title="Slovence, büyük küçük harfe duyarsız">utf16_slovenian_ci</option>\n<option value="utf16_spanish2_ci" title="Geleneksel İspanyolca, büyük küçük harfe duyarsız">utf16_spanish2_ci</option>\n<option value="utf16_spanish_ci" title="İspanyolca, büyük küçük harfe duyarsız">utf16_spanish_ci</option>\n<option value="utf16_swedish_ci" title="İsveççe, büyük küçük harfe duyarsız">utf16_swedish_ci</option>\n<option value="utf16_thai_520_w2" title="Tayca">utf16_thai_520_w2</option>\n<option value="utf16_turkish_ci" title="Türkçe, büyük küçük harfe duyarsız">utf16_turkish_ci</option>\n<option value="utf16_unicode_520_ci" title="Evrensel Kod (çokdilli)">utf16_unicode_520_ci</option>\n<option value="utf16_unicode_ci" title="Evrensel Kod (çokdilli), büyük küçük harfe duyarsız">utf16_unicode_ci</option>\n<option value="utf16_vietnamese_ci" title="Vietnamca, büyük küçük harfe duyarsız">utf16_vietnamese_ci</option>\n</optgroup>\n<optgroup label="utf16le" title="UTF-16LE Unicode">\n<option value="utf16le_bin" title="bilinmiyor, İkili Değer">utf16le_bin</option>\n<option value="utf16le_general_ci" title="bilinmiyor, büyük küçük harfe duyarsız">utf16le_general_ci</option>\n</optgroup>\n<optgroup label="utf32" title="UTF-32 Unicode">\n<option value="utf32_bin" title="bilinmiyor, İkili Değer">utf32_bin</option>\n<option value="utf32_croatian_ci" title="Hırvatça, büyük küçük harfe duyarsız">utf32_croatian_ci</option>\n<option value="utf32_croatian_mysql561_ci" title="Hırvatça">utf32_croatian_mysql561_ci</option>\n<option value="utf32_czech_ci" title="Çekçe, büyük küçük harfe duyarsız">utf32_czech_ci</option>\n<option value="utf32_danish_ci" title="Danca, büyük küçük harfe duyarsız">utf32_danish_ci</option>\n<option value="utf32_esperanto_ci" title="Esperanto, büyük küçük harfe duyarsız">utf32_esperanto_ci</option>\n<option value="utf32_estonian_ci" title="Estçe, büyük küçük harfe duyarsız">utf32_estonian_ci</option>\n<option value="utf32_general_ci" title="bilinmiyor, büyük küçük harfe duyarsız">utf32_general_ci</option>\n<option value="utf32_german2_ci" title="Almanca (telefon defteri), büyük küçük harfe duyarsız">utf32_german2_ci</option>\n<option value="utf32_hungarian_ci" title="Macarca, büyük küçük harfe duyarsız">utf32_hungarian_ci</option>\n<option value="utf32_icelandic_ci" title="İzlandaca, büyük küçük harfe duyarsız">utf32_icelandic_ci</option>\n<option value="utf32_latvian_ci" title="Litvanyaca, büyük küçük harfe duyarsız">utf32_latvian_ci</option>\n<option value="utf32_lithuanian_ci" title="Litvanyaca, büyük küçük harfe duyarsız">utf32_lithuanian_ci</option>\n<option value="utf32_myanmar_ci" title="bilinmiyor, büyük küçük harfe duyarsız">utf32_myanmar_ci</option>\n<option value="utf32_persian_ci" title="Farsça, büyük küçük harfe duyarsız">utf32_persian_ci</option>\n<option value="utf32_polish_ci" title="Lehçe, büyük küçük harfe duyarsız">utf32_polish_ci</option>\n<option value="utf32_roman_ci" title="Batı Avrupa, büyük küçük harfe duyarsız">utf32_roman_ci</option>\n<option value="utf32_romanian_ci" title="Romence, büyük küçük harfe duyarsız">utf32_romanian_ci</option>\n<option value="utf32_sinhala_ci" title="Seylanca, büyük küçük harfe duyarsız">utf32_sinhala_ci</option>\n<option value="utf32_slovak_ci" title="Slovakça, büyük küçük harfe duyarsız">utf32_slovak_ci</option>\n<option value="utf32_slovenian_ci" title="Slovence, büyük küçük harfe duyarsız">utf32_slovenian_ci</option>\n<option value="utf32_spanish2_ci" title="Geleneksel İspanyolca, büyük küçük harfe duyarsız">utf32_spanish2_ci</option>\n<option value="utf32_spanish_ci" title="İspanyolca, büyük küçük harfe duyarsız">utf32_spanish_ci</option>\n<option value="utf32_swedish_ci" title="İsveççe, büyük küçük harfe duyarsız">utf32_swedish_ci</option>\n<option value="utf32_thai_520_w2" title="Tayca">utf32_thai_520_w2</option>\n<option value="utf32_turkish_ci" title="Türkçe, büyük küçük harfe duyarsız">utf32_turkish_ci</option>\n<option value="utf32_unicode_520_ci" title="Evrensel Kod (çokdilli)">utf32_unicode_520_ci</option>\n<option value="utf32_unicode_ci" title="Evrensel Kod (çokdilli), büyük küçük harfe duyarsız">utf32_unicode_ci</option>\n<option value="utf32_vietnamese_ci" title="Vietnamca, büyük küçük harfe duyarsız">utf32_vietnamese_ci</option>\n</optgroup>\n<optgroup label="utf8" title="UTF-8 Unicode">\n<option value="utf8_bin" title="Evrensel Kod (çokdilli), İkili Değer">utf8_bin</option>\n<option value="utf8_croatian_ci" title="Hırvatça, büyük küçük harfe duyarsız">utf8_croatian_ci</option>\n<option value="utf8_croatian_mysql561_ci" title="Hırvatça">utf8_croatian_mysql561_ci</option>\n<option value="utf8_czech_ci" title="Çekçe, büyük küçük harfe duyarsız">utf8_czech_ci</option>\n<option value="utf8_danish_ci" title="Danca, büyük küçük harfe duyarsız">utf8_danish_ci</option>\n<option value="utf8_esperanto_ci" title="Esperanto, büyük küçük harfe duyarsız">utf8_esperanto_ci</option>\n<option value="utf8_estonian_ci" title="Estçe, büyük küçük harfe duyarsız">utf8_estonian_ci</option>\n<option value="utf8_general_ci" title="Evrensel Kod (çokdilli), büyük küçük harfe duyarsız">utf8_general_ci</option>\n<option value="utf8_general_mysql500_ci" title="Evrensel Kod (çokdilli)">utf8_general_mysql500_ci</option>\n<option value="utf8_german2_ci" title="Almanca (telefon defteri), büyük küçük harfe duyarsız">utf8_german2_ci</option>\n<option value="utf8_hungarian_ci" title="Macarca, büyük küçük harfe duyarsız">utf8_hungarian_ci</option>\n<option value="utf8_icelandic_ci" title="İzlandaca, büyük küçük harfe duyarsız">utf8_icelandic_ci</option>\n<option value="utf8_latvian_ci" title="Litvanyaca, büyük küçük harfe duyarsız">utf8_latvian_ci</option>\n<option value="utf8_lithuanian_ci" title="Litvanyaca, büyük küçük harfe duyarsız">utf8_lithuanian_ci</option>\n<option value="utf8_myanmar_ci" title="bilinmiyor, büyük küçük harfe duyarsız">utf8_myanmar_ci</option>\n<option value="utf8_persian_ci" title="Farsça, büyük küçük harfe duyarsız">utf8_persian_ci</option>\n<option value="utf8_polish_ci" title="Lehçe, büyük küçük harfe duyarsız">utf8_polish_ci</option>\n<option value="utf8_roman_ci" title="Batı Avrupa, büyük küçük harfe duyarsız">utf8_roman_ci</option>\n<option value="utf8_romanian_ci" title="Romence, büyük küçük harfe duyarsız">utf8_romanian_ci</option>\n<option value="utf8_sinhala_ci" title="Seylanca, büyük küçük harfe duyarsız">utf8_sinhala_ci</option>\n<option value="utf8_slovak_ci" title="Slovakça, büyük küçük harfe duyarsız">utf8_slovak_ci</option>\n<option value="utf8_slovenian_ci" title="Slovence, büyük küçük harfe duyarsız">utf8_slovenian_ci</option>\n<option value="utf8_spanish2_ci" title="Geleneksel İspanyolca, büyük küçük harfe duyarsız">utf8_spanish2_ci</option>\n<option value="utf8_spanish_ci" title="İspanyolca, büyük küçük harfe duyarsız">utf8_spanish_ci</option>\n<option value="utf8_swedish_ci" title="İsveççe, büyük küçük harfe duyarsız">utf8_swedish_ci</option>\n<option value="utf8_thai_520_w2" title="Tayca">utf8_thai_520_w2</option>\n<option value="utf8_turkish_ci" title="Türkçe, büyük küçük harfe duyarsız">utf8_turkish_ci</option>\n<option value="utf8_unicode_520_ci" title="Evrensel Kod (çokdilli)">utf8_unicode_520_ci</option>\n<option value="utf8_unicode_ci" title="Evrensel Kod (çokdilli), büyük küçük harfe duyarsız">utf8_unicode_ci</option>\n<option value="utf8_vietnamese_ci" title="Vietnamca, büyük küçük harfe duyarsız">utf8_vietnamese_ci</option>\n</optgroup>\n<optgroup label="utf8mb4" title="UTF-8 Unicode">\n<option value="utf8mb4_bin" title="Evrensel Kod (çokdilli), İkili Değer">utf8mb4_bin</option>\n<option value="utf8mb4_croatian_ci" title="Hırvatça, büyük küçük harfe duyarsız">utf8mb4_croatian_ci</option>\n<option value="utf8mb4_croatian_mysql561_ci" title="Hırvatça">utf8mb4_croatian_mysql561_ci</option>\n<option value="utf8mb4_czech_ci" title="Çekçe, büyük küçük harfe duyarsız">utf8mb4_czech_ci</option>\n<option value="utf8mb4_danish_ci" title="Danca, büyük küçük harfe duyarsız">utf8mb4_danish_ci</option>\n<option value="utf8mb4_esperanto_ci" title="Esperanto, büyük küçük harfe duyarsız">utf8mb4_esperanto_ci</option>\n<option value="utf8mb4_estonian_ci" title="Estçe, büyük küçük harfe duyarsız">utf8mb4_estonian_ci</option>\n<option value="utf8mb4_general_ci" title="Evrensel Kod (çokdilli), büyük küçük harfe duyarsız">utf8mb4_general_ci</option>\n<option value="utf8mb4_german2_ci" title="Almanca (telefon defteri), büyük küçük harfe duyarsız">utf8mb4_german2_ci</option>\n<option value="utf8mb4_hungarian_ci" title="Macarca, büyük küçük harfe duyarsız">utf8mb4_hungarian_ci</option>\n<option value="utf8mb4_icelandic_ci" title="İzlandaca, büyük küçük harfe duyarsız">utf8mb4_icelandic_ci</option>\n<option value="utf8mb4_latvian_ci" title="Litvanyaca, büyük küçük harfe duyarsız">utf8mb4_latvian_ci</option>\n<option value="utf8mb4_lithuanian_ci" title="Litvanyaca, büyük küçük harfe duyarsız">utf8mb4_lithuanian_ci</option>\n<option value="utf8mb4_myanmar_ci" title="bilinmiyor, büyük küçük harfe duyarsız">utf8mb4_myanmar_ci</option>\n<option value="utf8mb4_persian_ci" title="Farsça, büyük küçük harfe duyarsız">utf8mb4_persian_ci</option>\n<option value="utf8mb4_polish_ci" title="Lehçe, büyük küçük harfe duyarsız">utf8mb4_polish_ci</option>\n<option value="utf8mb4_roman_ci" title="Batı Avrupa, büyük küçük harfe duyarsız">utf8mb4_roman_ci</option>\n<option value="utf8mb4_romanian_ci" title="Romence, büyük küçük harfe duyarsız">utf8mb4_romanian_ci</option>\n<option value="utf8mb4_sinhala_ci" title="Seylanca, büyük küçük harfe duyarsız">utf8mb4_sinhala_ci</option>\n<option value="utf8mb4_slovak_ci" title="Slovakça, büyük küçük harfe duyarsız">utf8mb4_slovak_ci</option>\n<option value="utf8mb4_slovenian_ci" title="Slovence, büyük küçük harfe duyarsız">utf8mb4_slovenian_ci</option>\n<option value="utf8mb4_spanish2_ci" title="Geleneksel İspanyolca, büyük küçük harfe duyarsız">utf8mb4_spanish2_ci</option>\n<option value="utf8mb4_spanish_ci" title="İspanyolca, büyük küçük harfe duyarsız">utf8mb4_spanish_ci</option>\n<option value="utf8mb4_swedish_ci" title="İsveççe, büyük küçük harfe duyarsız">utf8mb4_swedish_ci</option>\n<option value="utf8mb4_thai_520_w2" title="Tayca">utf8mb4_thai_520_w2</option>\n<option value="utf8mb4_turkish_ci" title="Türkçe, büyük küçük harfe duyarsız">utf8mb4_turkish_ci</option>\n<option value="utf8mb4_unicode_520_ci" title="Evrensel Kod (çokdilli)">utf8mb4_unicode_520_ci</option>\n<option value="utf8mb4_unicode_ci" title="Evrensel Kod (çokdilli), büyük küçük harfe duyarsız">utf8mb4_unicode_ci</option>\n<option value="utf8mb4_vietnamese_ci" title="Vietnamca, büyük küçük harfe duyarsız">utf8mb4_vietnamese_ci</option>\n</optgroup>\n</select>\n</td>\n<td><select name="index[]" id="field_0_7" data-index="">\n<option value="bos">---</option>\n<option title="Birincil">\nPRIMARY\n</option>\n<option title="Benzersiz">\nUNIQUE\n</option>\n<option title="Index">\nINDEX\n</option>\n<option title="Tam metin">\nFULLTEXT\n</option>\n<option title="Uzaysal">\nSPATIAL\n</option>\n</select></td>\n<td><input type="checkbox" name="bos[]" class="bos" value=""></td>\n<td>\n<input type="checkbox" class="ai" name="aicrement[]" value=""></td>\n</tr>';
  
if($('.sutun_sayi').val()>0){
	if($('.tabloduzenle').val()==""){ var val = $('.sutun_sayi').val();
	   
	
	   for(i = 0; i < val; i++){
	   
	    var html = $('#satir-ekle').html();  
	
	    var toplu = html+code
	     $('#satir-ekle').html(toplu);
	  }     
	  
	 
	   var yol =  $('#satir-ekle').find('tr input[class=ai]').length;
	i = 0;
	   for(i = 0; i < yol; i++){    
	$('#satir-ekle').find('.ai').eq(i).attr("name","aicrement["+i+"]");//eq ile numaralandırma.
	$('#satir-ekle').find('.column_type').eq(i).attr("name","turu["+i+"]");
	}}
}

   function vtb(database) {
   window.location = "baglan.php?vtb="+database;
  }

 function emptytable(tb) {
  var sil = confirm(">"+tb+"< Tablosunu boşaltmak istediğine Eminmisin?");
  var tablo = "tablobosalt=ok&tablo="+tb;
  if(sil){
  $.ajax({
    url:'tabloisle.php',
    data:tablo,
    type:'POST',
    success:function (sc) {
if (sc.trim() == "ok") {
      alert("Tablo Boşaltıldı!");
      location.reload();
    }else{
 alert("Tablo Boşatılmadı!");
};
    }
  });
}
}
 function siltable(tb) {
  var sil = confirm(">"+tb+"< Tablosunu Silmek istediğine Eminmisin?");
  var tablo = "tablosil=ok&tablo="+tb;
  if(sil){
  $.ajax({
    url:'tabloisle.php',
    data:tablo,
    type:'POST',
    success:function (sc) {
if (sc.trim() == "ok") {
      alert("Tablo Silindi!");
      location.reload();
    }else{
 alert("Tablo Silinemedi!");
};
    }
  });
}
}
 function duzenle(tb) {
  var dz = confirm(">"+tb+"< Tablosunu Düzenlemek istediğine Emin misin?");
 "tabloduzenle=ok&tablo="+tb;
  if(dz){
 window.location = "./?tabloduzenle=ok&tablo="+tb;  

}
}


$('#ekletablo').on("click",function(){
    

 var val = $('.sutun_sayi').val();

  
 
i = 0;
   for(i = 0; i < val; i++){
    
  var html = $('#satir-ekle').html();
     $('#satir-ekle').html(html+code); 
   }  

   var yol =  $('#satir-ekle').find('tr input[class=ai]').length;

   for(i = 0; i < yol; i++){    
$('#satir-ekle').find('.ai').eq(i).attr("name","aicrement["+i+"]");//eq ile numaralandırma.
$('#satir-ekle').find('.column_type').eq(i).attr("name","turu["+i+"]");
   
}


}); 

$("#tablo_yeni_ad").change(function(){
$("#yeni_ad_kaydet").show();
})
$("#yeni_ad_kaydet").on("click",function(){
 var yeni = $("#tablo_yeni_ad").val();
 var ilk = $("#ilk_ad").val();
 var tablo_ad = "yeni_ad="+yeni+"&ilk_ad="+ilk;
  if (yeni !== ilk) {
 
      $.ajax({
    url:'tabloisle.php',
    data:tablo_ad,
    type:'POST',
    success:function (sc) {
if (sc.trim() == "ok") {
      $("#ilk_ad").val(yeni);
      
   $("#yeni_ad_sc").html("<br/> Yeniden adlandırıldı.");
 setTimeout(500);
 var href = window.location.href.substring(0, window.location.href.indexOf('?'));// url paremetresini ayırma.
 window.location = href+"?tabloduzenle=ok&tablo="+yeni;// url düzenleyip table yönlendirme.
    }else{
   $("#yeni_ad_sc").html("<br/> Yeniden adlandırılamadı. <br/>"+"Hata:"+sc);

};
    }
  });
  }
})
$( document ).on("change",".ai",function()
 {
$(".aiptal").hide();
$(".ai").prop('checked',false);
$(".ai").removeAttr('checked');
$(".ai").val("NONE");
$(this).prop('checked',true);
$(this).val("AUTO_INCREMENT");
$(this).closest("td").append("<a class='aiptal' href='javascript:aiptal()'>iptal</a>");//input  yanına iptal ekleme.
});

function aiptal() {
$(".aiptal").hide();
$(".ai").prop('checked',false);
$(".ai").removeAttr('checked');
$(".ai").val("NONE");
}


$( document ).on("change",".table_index",function (){
var index = $(this).val();
if (index == "PRIMARY") {index = "PRIMARY KEY"}
if(index !== "bos"){
var sutun = $(this).closest("tr").find("button").attr("ad");
var table = $(this).closest("tr").find("button").attr("table");
var islem = "ALTER TABLE `"+table+"` ADD "+index+"(`"+sutun+"`)";
var onay = confirm("Bu işlemi onaylıyor musunuz? > "+islem);}
if (onay) {
  $.ajax({
    url:"tabloisle.php",
    data:{sutunindex:"ok",islem:islem},
    type:"POST",
    dataType:"json",
    success:function(sc){
if (sc.ok) {
$("#json_cevap").html($("#json_cevap").html()+sc.ok);
}else if(sc.no){
$("#json_cevap").html($("#json_cevap").html()+sc.no);
}
    }
  })
}
})

$( document ).on("change",".default_type",function (){

if ($(this).val() == "USER_DEFINED") {
  $(this).next().next().show();
return;
}else if($(this).val() == "NULL"){

$(this).closest("tr").find(".bos").attr("checked", true);// varsayılanı değişince checkbox aktif olur.

}
else{
  $(this).next().next().hide();

}



})
 
 $(document).on("click",".satir-sil",function (e) {

 if(!$(this).attr("table") == ""){ 
 var yol = $(this).attr("ad"); 
  var sil = confirm(">"+$(this).attr("ad")+"< Satırını Silmek İstediğine Eminmisin?");
  var tablo = "satirsil=ok&tablo="+$(this).attr("table")+"&satir="+$(this).attr("ad");
  if(sil){
  $.ajax({
    url:'tabloisle.php',
    data:tablo,
    type:'POST',
    success:function (sc) {
if (sc.trim() == "ok") {
      
      alert(yol+" Silindi");
   $("#satir-"+yol).remove();
    }else{
 alert("Satır Silinemedi!");
};
    }
  });
}
}else{
  

  e.preventDefault();
            $(this).closest("tr").remove();

}
 });


   var yol =  $('tbody').find('tr input[class=ai]').length;
 
   for(i = 0; i < yol; i++){
 
     
$('tbody').find('.ai').eq(i).attr("name","aicrement["+i+"]");// satır varsa numralandıracak.
$('tbody').find('.column_type').eq(i).attr("name","turu["+i+"]");
 }


  var switchToInput = function () {

       var $input = $("<textarea>", {
            val: $(this).next().val(),
            rows: "3",
            width: "400",
            name:"edit"
        });


        
        $input.addClass("loadNum");
        $(this).replaceWith($input);
             eski =  $(this).text();
             benzersiz = $(this).attr("datafield");
             datatable = $(this).attr("datatable");
             sutun = $(this).attr("sutun");
             
            
        $input.on("blur",switchToSpan);
       
        $input.select();


    };
    var switchToSpan = function () 
    {
      var yeni = $(this).val();

      veri = $(this).closest("tr").find(".silicerik").attr("icerik");
        var $span = $("<span>", {
            text: $(this).val().substring(0,100),
            sutun: sutun,
            datafield: benzersiz,
            datatable: datatable

        });
        
        $span.addClass("loadNum");

        $(this).replaceWith($span);
        
        $span.on("dblclick", switchToInput);
        
       
        $span.on("dblclick",yukle(yeni,eski,benzersiz,datatable,sutun,veri,$span));
       
      
        

    }
    $(".loadNum").on("dblclick",switchToInput);


  function  yukle(yeni,eski,benzersiz,datatable,sutun,veri,$span) {

if(yeni !== eski){

 // var data = "benzersiz="+benzersiz+"&benzersiz_veri="+veri+"&tablo="+datatable+"&sutun="+sutun;
  $.ajax({
    url:"tabloisle.php",
    data:{benzersiz:benzersiz,benzersiz_veri:veri,tablo:datatable,sutun:sutun,yeni:yeni},
    type:"POST",
    dataType:"json",
    success:function(sc){
if (sc.ok) {
  if (sc.ok.length >200) {
    $("#json_cevap").text(sc.ok.substr(0,70)+"[...]"+sc.ok.substr(sc.ok.length-70));
}else{
  $("#json_cevap").text(sc.ok);
} 
$span.next().text(yeni);
}else{if (sc.no.length>200) {$("#json_cevap").text(sc.ok.substr(0,70)+"[...]"+sc.ok.substr(sc.ok.length-70));
}else{
  $("#json_cevap").text(sc.no);
}
}
    }

  })

}}
  
function htmlspecialchars(str) {
  return str.replace('&', '&amp;').replace('"', '&quot;').replace("'", '&#039;').replace('<', '&lt;').replace('>', '&gt;');
}

  var silicerik = function (argument) {
var onay = confirm($(this).attr("data-field")+" Silmek İstediğine Emin misin?");
if (onay) {
         $(this).closest("tr").remove(); 

var data = "iceriksil=ok&icerikbenzersiz="+$(this).attr("data-field")+"&iceriktable="+$(this).attr("data-table")+"&icerik="+$(this).attr("icerik");

    $.ajax({
    url:'tabloisle.php',
    data:data,
    type:'POST',
    success:function (sc) {
if (sc.trim() == "ok") {
        alert("Seçim Silindi!");

    }else{
    alert("Seçim Silinemedi!");
}
    }
  });
}
  }
    var duzenleicerik = function (argument) {
var onay = confirm($(this).attr("data-field")+":"+$(this).attr("icerik")+" Düzenlemek İstediğine Emin misin?");
if (onay) {
      
    $('#veri-modal').modal("show"); 

var data = "icerikduzenle=ok&icerikbenzersiz="+$(this).attr("data-field")+"&iceriktable="+$(this).attr("data-table")+"&icerik="+$(this).attr("icerik");

    $.ajax({
    url:'tabloisle.php',
    data:data,
    type:'POST',
    success:function (sc) {
if (sc.trim() == "ok") {
        $(".modal-body").html(sc);

    }else{
    $(".modal-body").html(sc);
}
    }
  });
}
  }

       var ekleicerik = function (argument) {
         $('#veri-modal').modal("show"); 
$(".modal-body").html($("#veriekle-container").html());

  } 
 $(".silicerik").on("dblclick",silicerik);
 $(".duzenleicerik").on("click",duzenleicerik);
 $(document).on("click","#verieklebtn",ekleicerik);


