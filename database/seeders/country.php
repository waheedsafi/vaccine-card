<?php

namespace Database\Seeders;

use App\Models\Country;
use App\Models\CountryTrans;
use App\Models\District;
use App\Models\DistrictTrans;
use App\Models\Province;
use App\Models\ProvinceTrans;
use App\Models\Translate;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CountrySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $country = [
            "Afghanistan" => [
                "fa" => "افغانستان",
                "ps" => "افغانستان",
                "nationality"=>[
                    "en"=>"Afghan",
                    "fa"=>"افغان",
                    "ps"=>"افغان",
                ],
            ],

                "United States" => [
                "fa" => "ایالات متحده",
                "ps" => "متحده ایالات",
                "nationality"=>[
                    "en"=>"American",
                    "fa"=>"امریکایی",
                    "ps"=>"آمریکایی",

                ],
            ],

                "United Kingdom" => [
                "fa" => "بریتانیا",
                "ps" => "بریتانیا",
                "nationality"=>[
                    "en"=>"British",
                    "fa"=>"برتانیایی",
                    "ps"=>"بریتانیایی",

                ],
            ],

                "Afghanistan" => [
                "fa" => "افغانستان",
                "ps" => "افغانستان",
                "nationality"=>[
                    "en"=>"Afghan",
                    "fa"=>"افغان",
                    "ps"=>"افغان",

                ],
            ],

                "Canada" => [
                "fa" => "کانادا",
                "ps" => "کاناډا",
                "nationality"=>[
                    "en"=>"Canadian",
                    "fa"=>"کانادایی",
                    "ps"=>"کاناډایی",

                ],
            ],

                "Germany" => [
                "fa" => "آلمان",
                "ps" => "جرمني",
                "nationality"=>[
                    "en"=>"German",
                    "fa"=>"آلمانی",
                    "ps"=>"جرمنی",

                ],
            ],

                "France" => [
                "fa" => "فرانسه",
                "ps" => "فرانسه",
                "nationality"=>[
                    "en"=>"French",
                    "fa"=>"فرانسوی",
                    "ps"=>"فرانسوی",

                ],
            ],

                "Italy" => [
                "fa" => "ایتالیا",
                "ps" => "ایټالیا",
                "nationality"=>[
                    "en"=>"Italian",
                    "fa"=>"ایتالیایی",
                    "ps"=>"ایټالوی",

                ],
            ],

                "Spain" => [
                "fa" => "اسپانیا",
                "ps" => "هسپانیا",
                "nationality"=>[
                    "en"=>"Spanish",
                    "fa"=>"اسپانیایی",
                    "ps"=>"هسپانوی",

                ],
            ],

                "China" => [
                "fa" => "چین",
                "ps" => "چین",
                "nationality"=>[
                    "en"=>"Chinese",
                    "fa"=>"چینی",
                    "ps"=>"چینایی",

                ],
            ],

                "Japan" => [
                "fa" => "جاپان",
                "ps" => "جاپان",
                "nationality"=>[
                    "en"=>"Japanese",
                    "fa"=>"جاپانی",
                    "ps"=>"جاپانی",

                ],
            ],

                "Russia" => [
                "fa" => "روسیه",
                "ps" => "روسیه",
                "nationality"=>[
                    "en"=>"Russian",
                    "fa"=>"روسی",
                    "ps"=>"روسی",

                ],
            ],

                "India" => [
                "fa" => "هند",
                "ps" => "هند",
                "nationality"=>[
                    "en"=>"Indian",
                    "fa"=>"هندی",
                    "ps"=>"هندی",

                ],
            ],

                "Afghanistan" => [
                "fa" => "افغانستان",
                "ps" => "افغانستان",
                "nationality"=>[
                    "en"=>"Afghan",
                    "fa"=>"افغان",
                    "ps"=>"افغان",

                ],
            ],

                "Iran" => [
                "fa" => "ایران",
                "ps" => "ایران",
                "nationality"=>[
                    "en"=>"Iranian",
                    "fa"=>"ایرانی",
                    "ps"=>"ایرانی",

                ],
            ],

                "Pakistan" => [
                "fa" => "پاکستان",
                "ps" => "پاکستان",
                "nationality"=>[
                    "en"=>"Pakistani",
                    "fa"=>"پاکستانی",
                    "ps"=>"پاکستانی",

                ],
            ],

                "Turkey" => [
                "fa" => "ترکیه",
                "ps" => "ترکیه",
                "nationality"=>[
                    "en"=>"Turkish",
                    "fa"=>"ترکیه",
                    "ps"=>"ترکی",

                ],
            ],

                "Saudi Arabia" => [
                "fa" => "افغانستان",
                "ps" => "افغانستان",
                "nationality"=>[
                    "en"=>"Saudi",
                    "fa"=>"عربستان سعودی",
                    "ps"=>"سعودي عربستان",

                ],
            ],

                "Egypt" => [
                "fa" => "مصر",
                "ps" => "مصر",
                "nationality"=>[
                    "en"=>"Egyptian",
                    "fa"=>"مصری",
                    "ps"=>"مصری",

                ],
            ],

                "Brazil" => [
                "fa" => "برزیل",
                "ps" => "برزیل",
                "nationality"=>[
                    "en"=>"Brazilian",
                    "fa"=>"برزیلی",
                    "ps"=>"برازیلي",

                ],
            ],

                "Mexico" => [
                "fa" => "مکسیکو",
                "ps" => "مکسیکو",
                "nationality"=>[
                    "en"=>"Mexican",
                    "fa"=>"مکزیکی",
                    "ps"=>"میکسیکویي",

                ],
            ],

                "Australia" => [
                "fa" => "استرالیا",
                "ps" => "استرالیا",
                "nationality"=>[
                    "en"=>"Australian",
                    "fa"=>"استرالیایی",
                    "ps"=>"استرالیایی",

                ],
            ],

                "Argentina" => [
                "fa" => "ارجنټاین",
                "ps" => "آرژانتین",
                "nationality"=>[
                    "en"=>"Argentine",
                    "fa"=>"آرژانتینی",
                    "ps"=>"ارجنټایني",

                ],
            ],

                "Bangladesh" => [
                "fa" => "بنگلادش",
                "ps" => "بنګله دېش",
                "nationality"=>[
                    "en"=>"Bangladeshi",
                    "fa"=>"بنگلادشی",
                    "ps"=>"بنګله‌دېشي",

                ],
            ],

                "Belgium" => [
                "fa" => "بیلجیم",
                "ps" => "بیلجیم",
                "nationality"=>[
                    "en"=>"Belgian",
                    "fa"=>"بیلجیمي",
                    "ps"=>"بیلجیمي",

                ],
            ],

                "Netherlands" => [
                "fa" => "هلندی",
                "ps" => "هالنډي",
                "nationality"=>[
                    "en"=>"Dutch",
                    "fa"=>"هلند",
                    "ps"=>"هالنډ",

                ],
            ],

                "Sweden" => [
                "fa" => "سویډن",
                "ps" => "سویډن",
                "nationality"=>[
                    "en"=>"Swedish",
                    "fa"=>"سویډني",
                    "ps"=>"سویډني",

                ],
            ],

                "Norway" => [
                "fa" => "ناروې",
                "ps" => "ناروې",
                "nationality"=>[
                    "en"=>"Norwegian",
                    "fa"=>"نارویجی",
                    "ps"=>"نارویجی",

                ],
            ],

                "Denmark" => [
                "fa" => "دانمارک",
                "ps" => "ډنمارک",
                "nationality"=>[
                    "en"=>"Danish",
                    "fa"=>"دانمارکی",
                    "ps"=>"ډنمارکي",

                ],
            ],

                "Finland" => [
                "fa" => "فنلاند",
                "ps" => "فنلنډ",
                "nationality"=>[
                    "en"=>"Finnish",
                    "fa"=>"فنلاندی",
                    "ps"=>"فنلنډي",

                ],
            ],

                "Switzerland" => [
                "fa" => "سویس",
                "ps" => "سوئیس",
                "nationality"=>[
                    "en"=>"Swiss",
                    "fa"=>"سوئیسی",
                    "ps"=>"سویسي",

                ],
            ],

                "Austria" => [
                "fa" => "اتریش",
                "ps" => "آستریا",
                "nationality"=>[
                    "en"=>"Austrian",
                    "fa"=>"اتریشی",
                    "ps"=>"اتریشي",

                ],
            ],

                "Poland" => [
                "fa" => "پولنډ",
                "ps" => "پولنډ",
                "nationality"=>[
                    "en"=>"Polish",
                    "fa"=>"پولندی",
                    "ps"=>"پولنډی",

                ],
            ],

                "Portugal" => [
                "fa" => "پرتغال",
                "ps" => "پرتګال",
                "nationality"=>[
                    "en"=>"Portuguese",
                    "fa"=>"پرتغالی",
                    "ps"=>"پرتګالي",

                ],
            ],

                "Greece" => [
                "fa" => "یونان",
                "ps" => "یونان",
                "nationality"=>[
                    "en"=>"Greek",
                    "fa"=>"یونانی",
                    "ps"=>"یوناني",

                ],
            ],

                "Ukraine" => [
                "fa" => "اوکراین",
                "ps" => "اوکراین",
                "nationality"=>[
                    "en"=>"Ukrainian",
                    "fa"=>"اوکرایني",
                    "ps"=>"اوکرایني",

                ],
            ],

                "South Korea" => [
                "fa" => "کره جنوبی",
                "ps" => "جنوبي کوریا",
                "nationality"=>[
                    "en"=>"Korean",
                    "fa"=>"کوریایي",
                    "ps"=>"کوریایي",

                ],
            ],

                "North Korea" => [
                "fa" => "افغانستان",
                "ps" => "افغانستان",
                "nationality"=>[
                    "en"=>"North Korean",
                    "fa"=>"کره شمالی",
                    "ps"=>"شمالي کوریا",

                ],
            ],

                "Thailand" => [
                "fa" => "تایلند",
                "ps" => "تایلینډ",
                "nationality"=>[
                    "en"=>"Thai",
                    "fa"=>"تایلندی",
                    "ps"=>"تايلنډی",

                ],
            ],

                "Vietnam" => [
                "fa" => "ویتنام",
                "ps" => "ویتنام",
                "nationality"=>[
                    "en"=>"Vietnamese",
                    "fa"=>"ویتنامی",
                    "ps"=>"ویتنامی",

                ],
            ],

                "Indonesia" => [
                "fa" => "اندونیزیا",
                "ps" => "اندونیزیا",
                "nationality"=>[
                    "en"=>"Indonesian",
                    "fa"=>"اندونزیایی",
                    "ps"=>"اندونیزیایي",

                ],
            ],

                "Malaysia" => [
                "fa" => "مالیزیا",
                "ps" => "مالیزیا",
                "nationality"=>[
                    "en"=>"Malaysian",
                    "fa"=>"مالزیایی",
                    "ps"=>"مالیزیایي",

                ],
            ],

                "Philippines" => [
                "fa" => "فیلیپین",
                "ps" => "فیلیپین",
                "nationality"=>[
                    "en"=>"Filipino",
                    "fa"=>"فیلیپینی",
                    "ps"=>"فلیپیني",

                ],
            ],

                "Iraq" => [
                "fa" => "عراق",
                "ps" => "عراق",
                "nationality"=>[
                    "en"=>"Iraqi",
                    "fa"=>"عراقی",
                    "ps"=>"عراقي",

                ],
            ],

                "Syria" => [
                "fa" => "سوریه",
                "ps" => "سوریه",
                "nationality"=>[
                    "en"=>"Syrian",
                    "fa"=>"سوریایی",
                    "ps"=>"سوریایي",

                ],
            ],

                "Jordan" => [
                "fa" => "اردن",
                "ps" => "اردن",
                "nationality"=>[
                    "en"=>"Jordanian",
                    "fa"=>"اردنی",
                    "ps"=>"اردني",

                ],
            ],

                "Lebanon" => [
                "fa" => "لبنان",
                "ps" => "لبنان",
                "nationality"=>[
                    "en"=>"Lebanese",
                    "fa"=>"لبنانی",
                    "ps"=>"لبناني",

                ],
            ],

                "Qatar" => [
                "fa" => "قطر",
                "ps" => "قطر",
                "nationality"=>[
                    "en"=>"Qatari",
                    "fa"=>"قطری",
                    "ps"=>"قطري",

                ],
            ],

                "UAE" => [
                "fa" => "امارات متحده عربی",
                "ps" => "متحده عربي امارات",
                "nationality"=>[
                    "en"=>"Emirati",
                    "fa"=>"اماراتی",
                    "ps"=>"اماراتي",

                ],
            ],

                "Kuwait" => [
                "fa" => "کویت",
                "ps" => "کویت",
                "nationality"=>[
                    "en"=>"Kuwaiti",
                    "fa"=>"کویتی",
                    "ps"=>"کویتي",

                ],
            ],

                "Oman" => [
                "fa" => "عمان",
                "ps" => "عمان",
                "nationality"=>[
                    "en"=>"Omani",
                    "fa"=>"عمانی",
                    "ps"=>"عماني",

                ],
            ],

                "Yemen" => [
                "fa" => "یمن",
                "ps" => "یمن",
                "nationality"=>[
                    "en"=>"Yemeni",
                    "fa"=>"یمنی",
                    "ps"=>"یمني",

                ],
            ],

                "Sudan" => [
                "fa" => "سودان",
                "ps" => "سودان",
                "nationality"=>[
                    "en"=>"Sudanese",
                    "fa"=>"سودانی",
                    "ps"=>"سوداني",

                ],
            ],

                "South Africa" => [
                "fa" => "آفریقای جنوبی",
                "ps" => "جنوبي افریقا",
                "nationality"=>[
                    "en"=>"South African",
                    "fa"=>"آفریقای جنوبی",
                    "ps"=>"جنوبي افريقايي",

                ],
            ],

                "Kenya" => [
                "fa" => "کنیا",
                "ps" => "کنیا",
                "nationality"=>[
                    "en"=>"Kenyan",
                    "fa"=>"کینيایي",
                    "ps"=>"کینيایي",

                ],
            ],

                "Nigeria" => [
                "fa" => "نایجیریا",
                "ps" => "نایجیریا",
                "nationality"=>[
                    "en"=>"Nigerian",
                    "fa"=>"نایجریایي",
                    "ps"=>"نایجریایي",

                ],

            ],

                "Morocco" => [
                "fa" => "مراکش",
                "ps" => "مراکش",
                "nationality"=>[
                    "en"=>"Moroccan",
                    "fa"=>"مراکشی",
                    "ps"=>"مراکشي",

                ],
            ],

                "Tunisia" => [
                "fa" => "تونس",
                "ps" => "تونس",
                "nationality"=>[
                    "en"=>"Tunisian",
                    "fa"=>"تونسی",
                    "ps"=>"تونسې",

                ],
            ],

                "Algeria" => [
                "fa" => "الجزایر",
                "ps" => "الجزایر",
                "nationality"=>[
                    "en"=>"Algerian",
                    "fa"=>"الجزایری",
                    "ps"=>"الجریایي",

                ],
            ],

                "Angola" => [
                "fa" => "انګولا",
                "ps" => "آنگولا",
                "nationality"=>[
                    "en"=>"Angolan",
                    "fa"=>"آنگولایی",
                    "ps"=>"انګولايي",

                ],
            ],

                "Mozambique" => [
                "fa" => "موزامبیک",
                "ps" => "موزامبیک",
                "nationality"=>[
                    "en"=>"Mozambican",
                    "fa"=>"موزامبیکی",
                    "ps"=>"موزامبیکي",

                ],
            ],

                "Zambia" => [
                "fa" => "زامبیا",
                "ps" => "زامبیا",
                "nationality"=>[
                    "en"=>"Zambian",
                    "fa"=>"زامبیايي",
                    "ps"=>"زامبیايي",

                ],
            ],

                "Zimbabwe" => [
                "fa" => "زیمبابوې",
                "ps" => "زیمبابوې",
                "nationality"=>[
                    "en"=>"Zimbabwean",
                    "fa"=>"زیمبابوې",
                    "ps"=>"زیمبابوې",

                ],
            ],

                "Malawi" => [
                "fa" => "مالاوی",
                "ps" => "مالاوي",
                "nationality"=>[
                    "en"=>"Malawian",
                    "fa"=>"مالاويی",
                    "ps"=>"مالاویایی",

                ],
            ],

                "Tanzania" => [
                "fa" => "تانزانیا",
                "ps" => "تنزانیا",
                "nationality"=>[
                    "en"=>"Tanzanian",
                    "fa"=>"تانزانیایی",
                    "ps"=>"تنزانيایي",

                ],
            ],

                "Uganda" => [
                "fa" => "اوگاندا",
                "ps" => "اوګانډا",
                "nationality"=>[
                    "en"=>"Ugandan",
                    "fa"=>"اوگاندایی",
                    "ps"=>"اوګنډايي",

                ],
            ],

                "Rwanda" => [
                "fa" => "رواندا",
                "ps" => "روانډا",
                "nationality"=>[
                    "en"=>"Rwandan",
                    "fa"=>"رواندايي",
                    "ps"=>"روانډایي",

                ],
            ],

                "Burundi" => [
                "fa" => "بوروندی",
                "ps" => "بورونډي",
                "nationality"=>[
                    "en"=>"Afghan",
                    "fa"=>"بوروندی",
                    "ps"=>"بورونډي",

                ],
            ],

                "Ethiopia" => [
                "fa" => "اتیوپی",
                "ps" => "اتیوپیا",
                "nationality"=>[
                    "en"=>"Ethiopian",
                    "fa"=>"اتیوپیایی",
                    "ps"=>"اتیوپیایي",

                ],
            ],

                "Somalia" => [
                "fa" => "سومالی",
                "ps" => "سومالیا",
                "nationality"=>[
                    "en"=>"Somali",
                    "fa"=>"سومالی",
                    "ps"=>"سومالیايي",

                ],
            ],

                "Chad" => [
                "fa" => "چاد",
                "ps" => "چاډ",
                "nationality"=>[
                    "en"=>"Chadian",
                    "fa"=>"چادی",
                    "ps"=>"چادي",

                ],
            ],

                "Central African Republic" => [
                "fa" => "جمهوری آفریقای مرکزی",
                "ps" => "د افریقې مرکزي جمهوریت",
                "nationality"=>[
                    "en"=>"Central African",
                    "fa"=>"جمهوری آفریقای مرکزی",
                    "ps"=>"مرکزي افريقايي",

                ],
            ],

                "Congo" => [
                "fa" => "کانګو",
                "ps" => "کنگو",
                "nationality"=>[
                    "en"=>"Congolese",
                    "fa"=>"کنگویی",
                    "ps"=>"کونګولایی",

                ],
            ],

                "Democratic Republic of the Congo" => [
                "fa" => "جمهوری دموکراتیک کنگو",
                "ps" => "د کانګو ډیموکراتیک جمهوریت",
                "nationality"=>[
                    "en"=>"Congolese",
                    "fa"=>"کونګولایی",
                    "ps"=>"کونګولایی",

                ],
            ],

                "Gabon" => [
                "fa" => "گابن",
                "ps" => "ګابون",
                "nationality"=>[
                    "en"=>"Gabonese",
                    "fa"=>"گابنی",
                    "ps"=>"گابوني",

                ],
            ],

                "Seychelles" => [
                "fa" => "سیچل",
                "ps" => "سیچل",
                "nationality"=>[
                    "en"=>"Seychellois",
                    "fa"=>"سیچلسی",
                    "ps"=>"سیچلسی",

                ],
            ],

                "Mauritius" => [
                "fa" => "موریس",
                "ps" => "موریس",
                "nationality"=>[
                    "en"=>"Mauritian",
                    "fa"=>"موریسی",
                    "ps"=>"موریسی",

                ],
            ],

                "Madagascar" => [
                "fa" => "ماداگاسکار",
                "ps" => "ماداګاسکار",
                "nationality"=>[
                    "en"=>"Malagasy",
                    "fa"=>"ماداگاسکاري",
                    "ps"=>"ماداگاسکاري",

                ],
            ],

                "Comoros" => [
                "fa" => "کوموروس",
                "ps" => "کوموروس",
                "nationality"=>[
                    "en"=>"Comorian",
                    "fa"=>"کوموروسی",
                    "ps"=>"کوموروسی",

                ],
            ],

                "Somaliland" => [
                "fa" => "سرزمین سومالی",
                "ps" => "سومالیلینډ",
                "nationality"=>[
                    "en"=>"Somalilander",
                    "fa"=>"سومالیا لندی",
                    "ps"=>"سومالیلنډی",

                ],
            ],

                "Sri Lanka" => [
                "fa" => "سری‌لانکا",
                "ps" => "سریلانکا",
                "nationality"=>[
                    "en"=>"Sri Lankan",
                    "fa"=>"سریلانکایی",
                    "ps"=>"سریلانکایی",

                ],
            ],

                "Nepal" => [
                "fa" => "نپال",
                "ps" => "نیپال",
                "nationality"=>[
                    "en"=>"Nepali",
                    "fa"=>"نپالی",
                    "ps"=>"نیپالي",

                ],
            ],

                "Bhutan" => [
                "fa" => "بوتان",
                "ps" => "بوتان",
                "nationality"=>[
                    "en"=>"Bhutanese",
                    "fa"=>"بوتانی",
                    "ps"=>"بوتاني",

                ],
            ],

                "Maldives" => [
                "fa" => "مالدیو",
                "ps" => "مالدیو",
                "nationality"=>[
                    "en"=>"Maldivian",
                    "fa"=>"مالدیوئی",
                    "ps"=>"مالدیوي",

                ],
            ],

                "Bangladesh" => [
                "fa" => "بنگلادش",
                "ps" => "بنګله‌دېش",
                "nationality"=>[
                    "en"=>"Bangladeshi",
                    "fa"=>"بنگلادشی",
                    "ps"=>"بنګله‌دېشي",

                ],
            ],

                "India" => [
                "fa" => "هندوستان",
                "ps" => "افغانستان",
                "nationality"=>[
                    "en"=>"Indian",
                    "fa"=>"هندی",
                    "ps"=>"هندی",

                ],
            ],

                "Pakistan" => [
                "fa" => "پاکستان",
                "ps" => "پاکستان",
                "nationality"=>[
                    "en"=>"Pakistani",
                    "fa"=>"پاکستانی",
                    "ps"=>"پاکستاني",

                ],
            ],

                "Belarus" => [
                "fa" => "بلاروس",
                "ps" => "بیلاروس",
                "nationality"=>[
                    "en"=>"Belarusian",
                    "fa"=>"بلاروسی",
                    "ps"=>"بلاروسی",

                ],
            ],

                "Lithuania" => [
                "fa" => "لتونی",
                "ps" => "لتوانیا",
                "nationality"=>[
                    "en"=>"Lithuanian",
                    "fa"=>"لیتوانیایی",
                    "ps"=>"لیتوانیایي",

                ],
            ],

                "Latvia" => [
                "fa" => "لتونی",
                "ps" => "لاتویا",
                "nationality"=>[
                    "en"=>"Latvian",
                    "fa"=>"لتوانيایي",
                    "ps"=>"لتوانيایي",

                ],
            ],

                "Estonia" => [
                "fa" => "استونی",
                "ps" => "استونیا",
                "nationality"=>[
                    "en"=>"Estonian",
                    "fa"=>"استونیایی",
                    "ps"=>"استونیايي",

                ],
            ],

                "Moldova" => [
                "fa" => "مولداوی",
                "ps" => "مولداوا",
                "nationality"=>[
                    "en"=>"Moldovan",
                    "fa"=>"مولداوی",
                    "ps"=>"مولداوي",

                ],
            ],

                "Armenia" => [
                "fa" => "ارمنستان",
                "ps" => "ارمنستان",
                "nationality"=>[
                    "en"=>"Armenian",
                    "fa"=>"ارمنی",
                    "ps"=>"ارمني",

                ],
            ],

                "Georgia" => [
                "fa" => "گرجستان",
                "ps" => "ګرجستان",
                "nationality"=>[
                    "en"=>"Georgian",
                    "fa"=>"گرجی",
                    "ps"=>"گرجي",

                ],
            ],

                "Azerbaijan" => [
                "fa" => "آذربایجان",
                "ps" => "آذربایجان",
                "nationality"=>[
                    "en"=>"Azerbaijani",
                    "fa"=>"آذربایجانی",
                    "ps"=>"آذربایجاني",

                ],
            ],

                "Kazakhstan" => [
                "fa" => "قزاقستان",
                "ps" => "قزاقستان",
                "nationality"=>[
                    "en"=>"Kazakh",
                    "fa"=>"قزاق",
                    "ps"=>"قزاق",

                ],
            ],

                "Kyrgyzstan" => [
                "fa" => "قرقیزستان",
                "ps" => "قرقیزستان",
                "nationality"=>[
                    "en"=>"Kyrgyz",
                    "fa"=>"قرغیزي",
                    "ps"=>"قرغیزي",

                ],
            ],

                "Uzbekistan" => [
                "fa" => "ازبکستان",
                "ps" => "ازبکستان",
                "nationality"=>[
                    "en"=>"Uzbek",
                    "fa"=>"ازبکي",
                    "ps"=>"ازبکی",

                ],
            ],

                "Turkmenistan" => [
                "fa" => "ترکمنستان",
                "ps" => "ترکمنستان",
                "nationality"=>[
                    "en"=>"Turkmen",
                    "fa"=>"پاکستانی",
                    "ps"=>"پاکستاني",

                ],
            ],

                "Tajikistan" => [
                "fa" => "تاجیکستان",
                "ps" => "تاجیکستان",
                "nationality"=>[
                    "en"=>"Tajik",
                    "fa"=>"تاجيکي",
                    "ps"=>"تاجیکی",

                ],
            ],

                "Bulgaria" => [
                "fa" => "بلغارستان",
                "ps" => "بلغاریا",
                "nationality"=>[
                    "en"=>"Bulgarian",
                    "fa"=>"بلغاری",
                    "ps"=>"بلغارۍ",

                ],
            ],

                "Romania" => [
                "fa" => "رومانی",
                "ps" => "رومانیا",
                "nationality"=>[
                    "en"=>"Romanian",
                    "fa"=>"پاکستانی",
                    "ps"=>"رومانیایی",

                ],
            ],

                "Croatia" => [
                "fa" => "کرواټیا",
                "ps" => "کرواټیا",
                "nationality"=>[
                    "en"=>"Croatian",
                    "fa"=>"کرواتی",
                    "ps"=>"کروات",

                ],
            ],

                "Slovenia" => [
                "fa" => "سلووینیا",
                "ps" => "سلووینیا",
                "nationality"=>[
                    "en"=>"Slovene",
                    "fa"=>"اسلوونیایی",
                    "ps"=>"اسلوویني",

                ],
            ],

                "Serbia" => [
                "fa" => "صربستان",
                "ps" => "سربیا",
                "nationality"=>[
                    "en"=>"Serbian",
                    "fa"=>"صربستانی",
                    "ps"=>"صربستاني",

                ],
            ],

                "Bosnia and Herzegovina" => [
                "fa" => "بوسنی و هرزگوین",
                "ps" => "بوسنیا او هرزګووینا",
                "nationality"=>[
                    "en"=>"Bosnian",
                    "fa"=>"بوسنیایی",
                    "ps"=>"بوسنیايي",

                ],
            ],

                "Montenegro" => [
                "fa" => "مونته‌نگرو",
                "ps" => "مونټینیګرو",
                "nationality"=>[
                    "en"=>"Montenegrin",
                    "fa"=>"مونته‌نگرویی",
                    "ps"=>"مونته‌نگروېی",

                ],
            ],

                "North Macedonia" => [
                "fa" => "مقدونیه شمالی",
                "ps" => "شمالي مقدونیه",
                "nationality"=>[
                    "en"=>"Montenegrin",
                    "fa"=>"مقدونیایی",
                    "ps"=>"مقدونيایي",

                ],
            ],

                "Albania" => [
                "fa" => "آلبانی",
                "ps" => "البانیا",
                "nationality"=>[
                    "en"=>"Albanian",
                    "fa"=>"آلبانیایی",
                    "ps"=>"آلبانیايي",

                ],
            ],

                "Kosovo" => [
                "fa" => "کوزوو",
                "ps" => "کوسوو",
                "nationality"=>[
                    "en"=>"Kosovar",
                    "fa"=>"کوزوو",
                    "ps"=>"کوزوو",

                ],
            ],

                "Malta" => [
                "fa" => "مالټا",
                "ps" => "مالټا",
                "nationality"=>[
                    "en"=>"Maltese",
                    "fa"=>"مالتی",
                    "ps"=>"مالټی",

                ],
            ],

                "Cyprus" => [
                "fa" => "قبرس",
                "ps" => "قبرس",
                "nationality"=>[
                    "en"=>"Cypriot",
                    "fa"=>"قبرسی",
                    "ps"=>"قبرسي",

                ],
            ],

                "Turkey" => [
                "fa" => "ترکی",
                "ps" => "ترکی",
                "nationality"=>[
                    "en"=>"Turkish",
                    "fa"=>"ترکی",
                    "ps"=>"ترکی",

                ],
            ],

                "Israel" => [
                "fa" => "اسرائیل",
                "ps" => "اسرائیل",
                "nationality"=>[
                    "en"=>"Israeli",
                    "fa"=>"اسرائیلی",
                    "ps"=>"اسرائیلي",

                ],
            ],

                "Palestine" => [
                "fa" => "فلسطین",
                "ps" => "فلسطین",
                "nationality"=>[
                    "en"=>"Palestinian",
                    "fa"=>"فلسطینی",
                    "ps"=>"فلسطینی",

                ],
            ],

                "Barbados" => [
                "fa" => "باربادوس",
                "ps" => "باربادوس",
                "nationality"=>[
                    "en"=>"Barbadian",
                    "fa"=>"باربادوسی",
                    "ps"=>"باربادوسي",

                ],
            ],

                "Saint Lucia" => [
                "fa" => "سینټ لوسیا",
                "ps" => "سینټ لوسیا",
                "nationality"=>[
                    "en"=>"Saint Lucian",
                    "fa"=>"سنت لوسیایی",
                    "ps"=>"سانت لوسیایي",

                ],
            ],

                "Saint Vincent and the Grenadines" => [
                "fa" => "سینټ وینسنت او ګریناډینز",
                "ps" => "سینټ وینسنت او ګریناډینز",
                "nationality"=>[
                    "en"=>"St. Vincentian",
                    "fa"=>"سنت وینسنتی",
                    "ps"=>"سینت وینسینټی",

                ],
            ],

                "Antigua and Barbuda" => [
                "fa" => "آنتیگوا و باربودا",
                "ps" => "آنتیګوا او باربودا",
                "nationality"=>[
                    "en"=>"Antiguan and Barbudan",
                    "fa"=>"آنتیگویی و باربودایی",
                    "ps"=>"آنتیګوایي او باربودایي",

                ],
            ],

                "Dominica" => [
                "fa" => "دومینیکا",
                "ps" => "دومینیکا",
                "nationality"=>[
                    "en"=>"Dominican",
                    "fa"=>"دومینیکایی",
                    "ps"=>"ډومینیکايي",

                ],
            ],

                "Grenada" => [
                "fa" => "گرانادا",
                "ps" => "ګریناډا",
                "nationality"=>[
                    "en"=>"Grenadian",
                    "fa"=>"گرنادایی",
                    "ps"=>"ګرينډايي",

                ],
            ],

                "Saint Kitts and Nevis" => [
                "fa" => "سنت کیتس و نویس",
                "ps" => "سینټ کیټس او نیویس",
                "nationality"=>[
                    "en"=>"St. Kitts and Nevisian",
                    "fa"=>"سنت کیتس و نویسی",
                    "ps"=>"سینټ کیټس او نویسی",

                ],
            ],

                "Jamaica" => [
                "fa" => "جامائیکا",
                "ps" => "جامائیکا",
                "nationality"=>[
                    "en"=>"Jamaican",
                    "fa"=>"جامائیکایی",
                    "ps"=>"جامايکايي",

                ],
            ],

                "Haiti" => [
                "fa" => "هائیتی",
                "ps" => "هایټي",
                "nationality"=>[
                    "en"=>"Haitian",
                    "fa"=>"هائیتی",
                    "ps"=>"هایټي",

                ],
            ],

                "Cuba" => [
                "fa" => "کوبا",
                "ps" => "کیوبا",
                "nationality"=>[
                    "en"=>"Cuban",
                    "fa"=>"کوبایی",
                    "ps"=>"کوبایي",

                ],
            ],

                "Dominican Republic" => [
                "fa" => "جمهوری دومینیکن",
                "ps" => "دومینیکن جمهوریت",
                "nationality"=>[
                    "en"=>"Dominican",
                    "fa"=>"دومینیکایی",
                    "ps"=>"دومینیکايي",

                ],
            ],

                "Puerto Rico" => [
                "fa" => "پورتوریکو",
                "ps" => "پورتوریکو",
                "nationality"=>[
                    "en"=>"Puerto Rican",
                    "fa"=>"پورتوریکویی",
                    "ps"=>"پورتوریکويی",

                ],
            ],

                "Costa Rica" => [
                "fa" => "کاستاریکا",
                "ps" => "کاستاریکا",
                "nationality"=>[
                    "en"=>"Costa Rican",
                    "fa"=>"کاستاریکایی",
                    "ps"=>"کاستاریکایي",

                ],
            ],

                "Panama" => [
                "fa" => "پاناما",
                "ps" => "پاناما",
                "nationality"=>[
                    "en"=>"Panamanian",
                    "fa"=>"پانامایی",
                    "ps"=>"پاناماايي",

                ],
            ],

                "Nicaragua" => [
                "fa" => "نیکاراگوئه",
                "ps" => "نیکاراګوا",
                "nationality"=>[
                    "en"=>"Nicaraguan",
                    "fa"=>"نیکاراگویی",
                    "ps"=>"نیکاراګوایي",

                ],
            ],

                "El Salvador" => [
                "fa" => "السالوادور",
                "ps" => "السالوادور",
                "nationality"=>[
                    "en"=>"Salvadoran",
                    "fa"=>"ال‌ساوادوري",
                    "ps"=>"ال‌ساوادوری",

                ],
            ],

                "Honduras" => [
                "fa" => "هندوراس",
                "ps" => "هندوراس",
                "nationality"=>[
                    "en"=>"Honduran",
                    "fa"=>"هندوراسی",
                    "ps"=>"هندوراسي",

                ],
            ],

                "Guatemala" => [
                "fa" => "گواتمالا",
                "ps" => "ګواتیمالا",
                "nationality"=>[
                    "en"=>"Guatemalan",
                    "fa"=>"گواتمالایی",
                    "ps"=>"ګواتمالایي",

                ],
            ],

                "Belize" => [
                "fa" => "بلیز",
                "ps" => "بلیز",
                "nationality"=>[
                    "en"=>"Belizan",
                    "fa"=>"بلیزی",
                    "ps"=>"بلیزي",

                ],
            ],

                "Colombia" => [
                "fa" => "کلمبیا",
                "ps" => "کولمبیا",
                "nationality"=>[
                    "en"=>"Colombian",
                    "fa"=>"کلمبیایی",
                    "ps"=>"کلمبیايي",

                ],
            ],

                "Venezuela" => [
                "fa" => "ونزوئلا",
                "ps" => "وینزویلا",
                "nationality"=>[
                    "en"=>"Venezuelan",
                    "fa"=>"ونزوئلایی",
                    "ps"=>"ونزویلايي",

                ],
            ],

                "Guyana" => [
                "fa" => "گویان",
                "ps" => "ګویانا",
                "nationality"=>[
                    "en"=>"Guyanese",
                    "fa"=>"گویانیایی",
                    "ps"=>"ګویانيایي",

                ],
            ],

                "Suriname" => [
                "fa" => "سورینام",
                "ps" => "سورینام",
                "nationality"=>[
                    "en"=>"Surinamese",
                    "fa"=>"سورینامی",
                    "ps"=>"سورینامي",

                ],
            ],

                "French Guiana" => [
                "fa" => "گویان فرانسه",
                "ps" => "ګویانا فرانسوي",
                "nationality"=>[
                    "en"=>"French Guianese",
                    "fa"=>"گویانای فرانسوی",
                    "ps"=>"ګویانا فرانسوي",

                ],
            ],

                "Luxembourg" => [
                "fa" => "لوکزامبورگ",
                "ps" => "لوکزامبورګ",
                "nationality"=>[
                    "en"=>"Luxembourgish",
                    "fa"=>"لوکزامبورگی",
                    "ps"=>"لوکزامبورګي",

                ],
            ],

                "Iceland" => [
                "fa" => "ایسلند",
                "ps" => "ایسلهڼډ",
                "nationality"=>[
                    "en"=>"Icelandic",
                    "fa"=>"ایسلندی",
                    "ps"=>"ایسلينډي",

                ],
            ],

                "Ireland" => [
                "fa" => "ایرلند",
                "ps" => "آیرلنډ",
                "nationality"=>[
                    "en"=>"Irish",
                    "fa"=>"ایرلندی",
                    "ps"=>"ایرلندۍ",

                ],
            ],

                "Andorra" => [
                "fa" => "انډورا",
                "ps" => "آندورا",
                "nationality"=>[
                    "en"=>"Andorran",
                    "fa"=>"آندورایی",
                    "ps"=>"انډورایي",

                ],
            ],

                "Monaco" => [
                "fa" => "موناکو",
                "ps" => "موناکو",
                "nationality"=>[
                    "en"=>"Monégasque",
                    "fa"=>"موناکویی",
                    "ps"=>"موناکوي",

                ],
            ],

                "San Marino" => [
                "fa" => "سان مارینو",
                "ps" => "سان مارینو",
                "nationality"=>[
                    "en"=>"Sanmarinese",
                    "fa"=>"سان‌مارینویی",
                    "ps"=>"سان‌مارينوي",

                ],
            ],

                "Vatican City" => [
                "fa" => "واتیکان",
                "ps" => "د واتیکان ښار",
                "nationality"=>[
                    "en"=>"Vatican",
                    "fa"=>"واتیکانی",
                    "ps"=>"واتیکاني",

                ],
            ],

                "Liechtenstein" => [
                "fa" => "لیختن‌اشتاین",
                "ps" => "لیختن‌اشتاین",
                "nationality"=>[
                    "en"=>"Liechtensteiner",
                    "fa"=>"لیختن‌اشتایني",
                    "ps"=>"لیختن‌اشتایني",

                ],
            ],

                "Czech Republic" => [
                "fa" => "جمهوری چک",
                "ps" => "چک جمهوریت",
                "nationality"=>[
                    "en"=>"Czech",
                    "fa"=>"چکی",
                    "ps"=>"چکی",
                ],
            ],


                "Slovakia" => [
                "fa" => "اسلواکی",
                "ps" => "سلوواکیا",
                "nationality"=>[
                    "en"=>"Slovak",
                    "fa"=>"اسلواکی",
                    "ps"=>"اسلواکي",

                ],

                "Hungary" => [
                "fa" => "هنګري",
                "ps" => "هنګري",
                "nationality"=>[
                    "en"=>"Hungarian",
                    "fa"=>"مجارستاني",
                    "ps"=>"مجارستاني",

                ],

                "Trinidad and Tobago" => [
                "fa" => "ترینیداد و توباگو",
                "ps" => "ترینیداد او توباګو",
                "nationality"=>[
                    "en"=>"Trinidadian and Tobagonian",
                    "fa"=>"ترینیدادی و توباگویی",
                    "ps"=>"ترینیدادي او توباګوي",

                ],

                "The Bahamas" => [
                "fa" => "باهاماس",
                "ps" => "باهاماس",
                "nationality"=>[
                    "en"=>"Bahamian",
                    "fa"=>"باهامی",
                    "ps"=>"باهامي",

                ],

                "South Sudan" => [
                "fa" => "سودان جنوبی",
                "ps" => "جنوبي سوډان",
                "nationality"=>[
                    "en"=>"South Sudanese",
                    "fa"=>"جنوب سودانی",
                    "ps"=>"جنوبي سوډاني",

                ],

                "Eritrea" => [
                "fa" => "اریتره",
                "ps" => "اریتریا",
                "nationality"=>[
                    "en"=>"Eritrean",
                    "fa"=>"اریتریایی",
                    "ps"=>"پاکستاني",

                ],

                "Djibouti" => [
                "fa" => "جیبوتی",
                "ps" => "جیبوتي",
                "nationality"=>[
                    "en"=>"Djiboutian",
                    "fa"=>"جیبوتی",
                    "ps"=>"جیبوتي",

                ],

                "Mali" => [
                "fa" => "مالی",
                "ps" => "مالي",
                "nationality"=>[
                    "en"=>"Malian",
                    "fa"=>"مالي",
                    "ps"=>"مالي",

                ],

                "Niger" => [
                "fa" => "نیجر",
                "ps" => "نیجر",
                "nationality"=>[
                    "en"=>"Nigerien",
                    "fa"=>"نیجری",
                    "ps"=>"نیجري",

                ],

                "Burkina Faso" => [
                "fa" => "بورکینا فاسو",
                "ps" => "بورکینا فاسو",
                "nationality"=>[
                    "en"=>"Burkinabé",
                    "fa"=>"بورکینی",
                    "ps"=>"بورکيني",

                ],

                "Senegal" => [
                "fa" => "سنگال",
                "ps" => "سینیګال",
                "nationality"=>[
                    "en"=>"Senegalese",
                    "fa"=>"سنگالی",
                    "ps"=>"سنگالي",

                ],

                "The Gambia" => [
                "fa" => "گامبیا",
                "ps" => "ګامبیا",
                "nationality"=>[
                    "en"=>"Gambian",
                    "fa"=>"گامبیایی",
                    "ps"=>"ګامبيایي",

                ],

                "Guinea" => [
                "fa" => "ګینه",
                "ps" => "گینه",
                "nationality"=>[
                    "en"=>"Guinean",
                    "fa"=>"گینه‌ای",
                    "ps"=>"ګینه‌اي",

                ],

                "Guinea-Bissau" => [
                "fa" => "گینه بیسائو",
                "ps" => "ګینه بیساؤ",
                "nationality"=>[
                    "en"=>"Guinea-Bissauan",
                    "fa"=>"گینه‌بیساوویی",
                    "ps"=>"ګینه‌بیساوۍ",

                ],

                "Cape Verde" => [
                "fa" => "کیپ ورد",
                "ps" => "کیپ ورد",
                "nationality"=>[
                    "en"=>"Cape Verdean",
                    "fa"=>"کیپ وردی",
                    "ps"=>"کیپ وردي",

                ],


                "Sao Tome and Principe" => [
                "fa" => "سائو تومه و پرینسیپ",
                "ps" => "سائو تومه و پرینسیپ",
                "nationality"=>[
                    "en"=>"São Toméan",
                    "fa"=>"سائوتومه‌ای و پرینسیپی",
                    "ps"=>"سائوتومه او پرنسيپي",

                ],

                "Equatorial Guinea" => [
                "fa" => "گینه استوایی",
                "ps" => "استوایي ګینه",
                "nationality"=>[
                    "en"=>"Equatorial Guinean",
                    "fa"=>"گینه استوایی",
                    "ps"=>"ګینه‌استوایي",

                ],

                "Libya" => [
                "fa" => "لیبیا",
                "ps" => "لیبیا",
                "nationality"=>[
                    "en"=>"Libyan",
                    "fa"=>"لیبیایی",
                    "ps"=>"لیبیایي",

                ],

                "Ghana" => [
                "fa" => "غنا",
                "ps" => "غنا",
                "nationality"=>[
                    "en"=>"Ghanaian",
                    "fa"=>"غنایی",
                    "ps"=>"غنايي",

                ],


                "Togo" => [
                "fa" => "توگو",
                "ps" => "ټوګو",
                "nationality"=>[
                    "en"=>"Togian",
                    "fa"=>"توگویی ",
                    "ps"=>"توګوي",

                ],

                "Benin" => [
                "fa" => "بنین",
                "ps" => "بنین",
                "nationality"=>[
                    "en"=>"Beninese",
                    "fa"=>"بنینی",
                    "ps"=>"بنيني",

                ],

                "Cote d'Ivoire" => [
                "fa" => "ساحل عاج",
                "ps" => "عاج ساحل",
                "nationality"=>[
                    "en"=>"Ivorian",
                    "fa"=>"ساحل عاجی",
                    "ps"=>"ساحل عاجي",

                ],

                "Cameroon" => [
                "fa" => "کامرون",
                "ps" => "کامرون",
                "nationality"=>[
                    "en"=>"Cameroonian",
                    "fa"=>"مالي",
                    "ps"=>"مالي",

                ],

                "MaLesotholi" => [
                "fa" => "لسوتو",
                "ps" => "لیسوتو",
                "nationality"=>[
                    "en"=>"Lesothan",
                    "fa"=>"لسوتویی",
                    "ps"=>"لسوتوي",

                ],

                "Eswatini" => [
                "fa" => "اسواتینی",
                "ps" => "ایسواتیني",
                "nationality"=>[
                    "en"=>"Swazi",
                    "fa"=>"اسواتینی",
                    "ps"=>"اسواتيني",

                ],

                "Botswana" => [
                "fa" => "بوتسوانا",
                "ps" => "بوټسوانا",
                "nationality"=>[
                    "en"=>"Botswanan",
                    "fa"=>"بوتسوانایی",
                    "ps"=>"بوتسوانایي",

                ],

                "Namibia" => [
                "fa" => "نامیبیا",
                "ps" => "نامیبیا",
                "nationality"=>[
                    "en"=>"Namibian",
                    "fa"=>"نامیبیاایی",
                    "ps"=>"نامیبیايي",

                ],

                "New Zealand" => [
                "fa" => "نیوزیلند",
                "ps" => "نیوزیلېنډ",
                "nationality"=>[
                    "en"=>"New Zealander",
                    "fa"=>"نیوزیلندی",
                    "ps"=>"نیوزیلنډي",

                ],

                "Fiji" => [
                "fa" => "فیجی",
                "ps" => "فیجي",
                "nationality"=>[
                    "en"=>"Fijian",
                    "fa"=>"فیجیایی",
                    "ps"=>"فیجيایي",

                ],

                "Papua New Guinea" => [
                "fa" => "پاپوا گینه نو",
                "ps" => "پاپوا گینه نو",
                "nationality"=>[
                    "en"=>"Papua New Guinean",
                    "fa"=>"پاپوآ گینه‌نوایی",
                    "ps"=>"پاپوآګینه‌نوایي",

                ],

                "Solomon Islands" => [
                "fa" => "جزایر سلیمان",
                "ps" => "سلیمان ټاپوګان",
                "nationality"=>[
                    "en"=>"Solomon Islander",
                    "fa"=>"سلیمانی",
                    "ps"=>"سلیماني",

                ],

                "Vanuatu" => [
                "fa" => "وانواتو",
                "ps" => "وانواتو",
                "nationality"=>[
                    "en"=>"Vanuatuan",
                    "fa"=>"وانواتویی",
                    "ps"=>"وانواتوي",

                ],

                "Samoa" => [
                "fa" => "ساموآ",
                "ps" => "ساموآ",
                "nationality"=>[
                    "en"=>"Samoan",
                    "fa"=>"ساموایی",
                    "ps"=>"ساموايي",

                ],

                "Tonga" => [
                "fa" => "تونگا",
                "ps" => "ټونګا",
                "nationality"=>[
                    "en"=>"Tongan",
                    "fa"=>"تونگایی",
                    "ps"=>"تونګي",

                ],

                "Kiribati" => [
                "fa" => "کیریباتی",
                "ps" => "کیریباتي",
                "nationality"=>[
                    "en"=>"Kiribatian",
                    "fa"=>"کیریباتی",
                    "ps"=>"کیریباتي",

                ],

                "Marshall Islands" => [
                "fa" => "جزایر مارشال",
                "ps" => "مارشال ټاپوګان",
                "nationality"=>[
                    "en"=>"Marshallese",
                    "fa"=>"جزایر مارشال",
                    "ps"=>"مارشالي",

                ],

                "Federated States of Micronesia" => [
                "fa" => "ایالات فدرال میکرونزیا",
                "ps" => "د مایکرو نیژیا متحده ایالات",
                "nationality"=>[
                    "en"=>"Micronesian",
                    "fa"=>"میکرونزیایی",
                    "ps"=>"میکرونزیايي",

                ],

                "Palau" => [
                "fa" => "پالائو",
                "ps" => "پالاو",
                "nationality"=>[
                    "en"=>"Palauan",
                    "fa"=>"پالائویی",
                    "ps"=>"پالاويي",

                ],

                "Nauru" => [
                "fa" => "نائورو",
                "ps" => "نائورو",
                "nationality"=>[
                    "en"=>"Nauruan",
                    "fa"=>"ناورو",
                    "ps"=>"نائورویی",

                ],

                "Tuvalu" => [
                "fa" => "تووالو",
                "ps" => "تووالو",
                "nationality"=>[
                    "en"=>"Tuvaluan",
                    "fa"=>"تووالو",
                    "ps"=>"تووالوۍ",

                ],

                "Timor-Leste" => [
                "fa" => "تیمور-لیست",
                "ps" => "تیمور-لیست",
                "nationality"=>[
                    "en"=>"Timorese",
                    "fa"=>"تیموری",
                    "ps"=>"تیموري",

                ],


                

    


                "fa" => "افغانستان",
                "ps" => "افغانستان",
                    "Kabul" => [
                        "fa" => "کابل",
                        "ps" => "کابل",
                        "District" => [
                            "Paghman" => ["fa" => "پغمان", "ps" => "پغمان"],
                            "Shakardara" => ["fa" => "شکردره", "ps" => "شکردره"],
                            "Kabul" => ["fa" => "کابل", "ps" => "کابل"],
                            "Chahar Asyab" => ["fa" => "چهاراسیاب", "ps" => "څلور اسیاب"],
                            "Surobi" => ["fa" => "سرابی", "ps" => "سرابی"],
                            "Bagrami" => ["fa" => "بگرام", "ps" => "بگرام"],
                            "Deh Sabz" => ["fa" => "دِه‌سبز", "ps" => "دِه‌سبز"],
                            "Farza" => ["fa" => "فَرزه", "ps" => "فَرزه"],
                            "Guldara" => ["fa" => "گُلدره", "ps" => "گُلدره"],
                            "Istalif" => ["fa" => "اِستالِف", "ps" => "اِستالِف"],
                            "Kalakan" => ["fa" => "کَلَکان", "ps" => "کَلَکان"],
                            "Khaki Jabbar" => ["fa" => "خاکِ جبار", "ps" => "خاکِ جبار"],
                            "Mir Bacha Kot" => ["fa" => "میربچه‌کوت ", "ps" => "مېربچه کوټ"],
                            "Mussahi" => ["fa" => "موسهی ", "ps" => " موسهی"],
                            "Qarabagh" => ["fa" => "قره‌باغ ", "ps" => " قره‌باغ"],


                        ]
                    ],
                    "Herat" => [
                        "fa" => "هرات",
                        "ps" => "هرات",
                        "District" => [
                            "Herat" => ["fa" => "هرات", "ps" => "هرات"],
                            "Ghorian" => ["fa" => "غوریان", "ps" => "غوریان"],
                            "Shindand" => ["fa" => "شندند", "ps" => "شندند"],
                            "Karukh" => ["fa" => "کرخ", "ps" => "کرخ"],
                            "Pashtun Zarghun" => ["fa" => "پشتون زرغون", "ps" => "پشتون زرغون"],
                            "Gulran" => ["fa" => "گلران", "ps" => "گلران"],
                            "Chishti Sharif" => ["fa" => "چِشت شریف", "ps" => "چِشت شریف"],
                            "Farsi" => ["fa" => "فارسی", "ps" => "فارسی"],
                            "Guzara" => ["fa" => "گُذَره", "ps" => "گُذَره"],
                            "Enjil" => ["fa" => "اِنجیل", "ps" => "اِنجیل"],
                                                "Kohsan" => ["fa" => "کُهسان", "ps" => "کُهسان"],
                            "Kushk" => ["fa" => "کُشک", "ps" => "کُشک"],
                            "Kushki Kuhna" => ["fa" => "کُشک کهنه", "ps" => "کُشک کهنه"],
                            "Obe" => ["fa" => "اوبه", "ps" => "اوبه"],
                            "Zinda Jan" => ["fa" => "زنده‌جان", "ps" => "زنده‌جان"],
                            "Adraskan" => ["fa" => "ادرسکان", "ps" => "ادرسکان"],
                            "Koshk Roobat Sangi" => ["fa" => "کوشک روبات سنګي", "ps" => "کوشک روبات سنګي"],


                        ]
                    ],



                    "Balkh" => [
                        "fa" => "بلخ",
                        "ps" => "بلخ",
                        "District" => [
                            "Mazar-e Sharif" => ["fa" => "مزار شریف", "ps" => "مزار شریف"],
                            "Chahar Kint" => ["fa" => "چهارکنت", "ps" => "څلورکنت"],
                            "Sholgara" => ["fa" => "شولگره", "ps" => "شولگره"],
                            "Zari" => ["fa" => "زاری", "ps" => "زاری"],
                            "Charbolak" => ["fa" => "چارپولَک", "ps" => "چارپولَک"],
                            "Chimtal" => ["fa" => "چَمتال", "ps" => "چَمتال"],
                            "Dawlatabad" => ["fa" => "دولت‌آباد", "ps" => "دولت‌آباد"],
                            "Dihdadi" => ["fa" => "دِهدادی", "ps" => "دِهدادی"],
                            "Kaldar" => ["fa" => "کُلدار", "ps" => "کُلدار"],
                            "Khulm" => ["fa" => "خَلَم", "ps" => "خَلَم"],
                            "Kishindih" => ["fa" => "کَشنده", "ps" => "کَشنده"],
                            "Nahri Shahi" => ["fa" => "نهر شاهی", "ps" => "نهر شاهی"],
                            "Sholgara" => ["fa" => "شولگره", "ps" => "شولگره"],
                            "Shortepa" => ["fa" => "شورتپه", "ps" => "شورتپه"],
                            "Marmul" => ["fa" => "مارمَل", "ps" => "مارمَل"],
                            "Balkh" => ["fa" => "بلخ", "ps" => "بلخ"],


                        ]
                    ],
                    "Kandahar" => [
                        "fa" => "کندهار",
                        "ps" => "کندهار",
                        "District" => [
                            "Kandahar" => ["fa" => "کندهار", "ps" => "کندهار"],
                            "Dand" => ["fa" => "دند", "ps" => "دند"],
                            "Panjwayi" => ["fa" => "پنجوایی", "ps" => "پنجوایی"],
                            "Shah Wali Kot" => ["fa" => "شاه ولیکوت", "ps" => "شاه ولیکوت"],
                            "Arghandab" => ["fa" => "ارغنداب", "ps" => "ارغنداب"],
                            "Arghistan" => ["fa" => "اَرغستان", "ps" => "اَرغستان"],
                            "Daman" => ["fa" => "دامان", "ps" => "ژړی"],
                            "Ghorak" => ["fa" => "غورَک", "ps" => "غورَک"],
                            "Khakrez" => ["fa" => "خاکریز", "ps" => "خاکریز"],
                            "Maruf" => ["fa" => "معروف", "ps" => "معروف"],
                            "Maiwand" => ["fa" => "مَیوَند", "ps" => "مَیوَند"],
                            "Miyanishin" => ["fa" => "میانَشین", "ps" => "میانَشین"],
                            "Reg" => ["fa" => "ریگستان", "ps" => "ریگستان"],
                            "Shorabak" => ["fa" => "شورابَک", "ps" => "شورابَک"],
                            "Spin Boldak" => ["fa" => "سپین‌بولدَک", "ps" => "سپین‌بولدَک"],
                            "Nish" => ["fa" => "نیش", "ps" => "نیش"],
                            "Takhta pul" => ["fa" => "تخته پل", "ps" => "تخته پل"],
                            "Zhary" => ["fa" => "زهری ", "ps" => "زهری"], 


                        ]
                    ],
                    "Nangarhar" => [
                        "fa" => "ننگرهار",
                        "ps" => "ننګرهار",
                        "District" => [
                            "Jalalabad" => ["fa" => "جلال آباد", "ps" => "جلال آباد"],
                            "Behsood" => ["fa" => "بهسود", "ps" => "بهسود"],
                            "Surkh Rod" => ["fa" => "سرخ رود", "ps" => "سرخ رود"],
                            "Nazi Bagh" => ["fa" => "نازی باغ", "ps" => "نازی باغ"],
                            "Khogiyani" => ["fa" => "خوگیانی", "ps" => "خوگیانی"],
                            "Deh Bala" => ["fa" => "ده‌بالا", "ps" => "ده‌بالا"],
                            "Shinwar" => ["fa" => "شینوار", "ps" => "شینوار"],
                            "Achin" => ["fa" => "اَچین", "ps" => "اَچین"],
                            "Chaparhar" => ["fa" => "چَپَرهار", "ps" => "چَپَرهار"],
                            "Darai Nur" => ["fa" => "درهٔ نور", "ps" => "درهٔ نور"],
                            "Bati Kot" => ["fa" => "بَتی‌کوت", "ps" => "بَتی‌کوت"],
                            "Dur Baba" => ["fa" => "دَربابا", "ps" => "دَربابا"],
                            "Goshta" => ["fa" => "گوشته", "ps" => "گوشته"],
                            "Hisarak" => ["fa" => "حصارک", "ps" => "حصارک"],
                            "Kama" => ["fa" => "کامه", "ps" => "کامه"],
                            "Khogyani" => ["fa" => "خوگیانی", "ps" => "خوگیانی"],
                            "Kot" => ["fa" => "کوت", "ps" => "کوت"],
                            "Kuz Kunar" => ["fa" => "کوزکُنر", "ps" => "کوزکُنر"],
                            "Lal Pur" => ["fa" => "لعل‌پور", "ps" => "لعل‌پور"],
                            "Momand Dara" => ["fa" => "مُهمنددره", "ps" => "مُهمنددره"],
                            "Nazyan" => ["fa" => "نازیان", "ps" => "نازیان"],
                            "Pachir Aw Agam" => ["fa" => "پَچیرواَگام", "ps" => "پَچیرواَگام"],
                            "Rodat" => ["fa" => "رودات", "ps" => "رودات"],
                            "Sherzad" => ["fa" => "شیرزاد", "ps" => "شیرزاد"],
                            "Surkh Rod" => ["fa" => "سرخ‌رود", "ps" => "سرخ‌رود"],



                        ]
                    ],
                    "Logar" => [
                        "fa" => "لوگر",
                        "ps" => "لوګر",
                        "District" => [
                            "Pul-e Alam" => ["fa" => "پُل علم", "ps" => "پُل علم"],
                            "Kharwar" => ["fa" => "خرور", "ps" => "خرور"],
                            "Mohammad Agha" => ["fa" => "محمد آغی", "ps" => "محمد آغی"],
                            "Baraki Barak" => ["fa" => "برکی برک", "ps" => "برکی برک"],
                            "Charkh" => ["fa" => "چَرخ ", "ps" => " څرخ"],
                            "Khoshi" => ["fa" => " خوشی", "ps" => " خوښی"],
                            "Azra" => ["fa" => "ازره  ", "ps" => " اَزره"],
                        ]
                    ],
                    "Ghazni" => [
                        "fa" => "غزنی",
                        "ps" => "غزنی",
                        "District" => [
                            "Ghazni" => ["fa" => "غزنی", "ps" => "غزنی"],
                            "Jaghori" => ["fa" => "جاغوری", "ps" => "جاغوری"],
                            "Qarabagh" => ["fa" => "قره باغ", "ps" => "قره باغ"],
                            "Ab Band" => ["fa" => "آب بند", "ps" => "آب بند"],
                            "Ajristan" => ["fa" => "اجرستان", "ps" => "اَجرستان"],
                            "Andar" => ["fa" => "اَندَر", "ps" => "اندړ"],
                            "Deh Yak" => ["fa" => "ده یک", "ps" => "ده‌یک"],
                            "Gelan" => ["fa" => "گېلان", "ps" => "گیلان"],
                            "Giro" => ["fa" => "گیرو", "ps" => "گېرو"],
                            "Jaghatū" => ["fa" => "جَغَتو", "ps" => "جغتو"],
                            "Khogyani" => ["fa" => "خوگیانی
                                ", "ps" => "خوگیاڼی "],
                            "Khwaja Umari" => ["fa" => "خواجه‌عُمری", "ps" => "خواجه عمري"],
                            "Malistan" => ["fa" => "مالستان", "ps" => "مالستان"],
                            "Muqur" => ["fa" => "مقر", "ps" => "مقر"],
                            "Nawa" => ["fa" => "ناوه", "ps" => "ناوه"],
                            "Nawur" => ["fa" => "ناور", "ps" => "ناور"],
                            "Rashidan" => ["fa" => "رشیدان", "ps" => "راشیدان"],
                            "Waghaz" => ["fa" => "وغاز", "ps" => "وغاز"],
                            "Zana Khan" => ["fa" => "زنه خان", "ps" => "زنه‌خان"],
                            "Wali-Mohammad Shahid" => ["fa" => " ولي محمد شهید", "ps" => "ولی محمد شهید"],
                        ]
                    ],
                    "Badakhshan" => [
                        "fa" => "بدخشان",
                        "ps" => "بدخشان",
                        "District" => [
                            "Faizabad" => ["fa" => "فیض آباد", "ps" => "فیض آباد"],
                            "Yawan" => ["fa" => "یوان", "ps" => "یوان"],
                            "Khwahan" => ["fa" => "خوایان", "ps" => "خوایان"],
                            "Shahriyir" => ["fa" => "شاه رییر", "ps" => "شاه رییر"],
                            "Arghanj Khwa" => ["fa" => "ارغنجخواه ", "ps" => "اَرغَنج‌خواه"],
                            "Argo" => ["fa" => "اَرگو", "ps" => "ارگو "],
                            "Baharak" => ["fa" => "بهارک", "ps" => "بهارک"],
                            "Darayim" => ["fa" => "درایم", "ps" => "درایم"],
                            "Ishkashim" => ["fa" => "اِشکاشِم", "ps" => "اشکاشم"],
                            "Jurm" => ["fa" => "جُرم", "ps" => "جورم"],
                            "Kishim" => ["fa" => "کِشِم", "ps" => "کشم"],
                            "Kohistan" => ["fa" => "کوهستان", "ps" => "کوهستان"],
                            "Kuf Ab" => ["fa" => "کوف‌آب", "ps" => "کوف آب "],
                            "Keran wa Menjan" => ["fa" => "کُران و مُنجان", "ps" => "کوران و منجان"],
                            "Raghistan" => ["fa" => "راغستان", "ps" => "راغستان"],
                            "Shahri Buzurg" => ["fa" => "شهر بزرگ", "ps" => "شهربزرگ"],
                            "Sheghnan" => ["fa" => "شِغنان", "ps" => "شغنان"],
                            "Shekay" => ["fa" => "شِکی", "ps" => "شېکي"],
                            "Shuhada" => ["fa" => "شهدا ", "ps" => "شهدا "],
                            "Tagab	" => ["fa" => "تگاب ", "ps" => "تگاب "],
                            "Tishkan" => ["fa" => "تیشکان", "ps" => "تېشکان"],
                            "Wakhan" => ["fa" => "واخان", "ps" => "واخان"],
                            "Warduj" => ["fa" => "وَردوج", "ps" => "وردوج"],
                            "Yaftali Sufla" => ["fa" => "یفتلِ پایین", "ps" => "یفتال سفله"],
                            "Yamgan" => ["fa" => "یَمَگان", "ps" => "یمگان "],
                            "Zebak" => ["fa" => "زیباک", "ps" => "زېباک"],
                            "Maymy	" => ["fa" => "میمی ", "ps" => "میمی "],
                            "Nussai	" => ["fa" => "نوسی ", "ps" => "نوسی "],
                            "Koof	" => ["fa" => "کوف ", "ps" => "کوف"],
                            "Khash	" => ["fa" => "خاش ", "ps" => "خاش"],
                        ]
                    ],
                    "Bamyan" => [
                        "fa" => "بامیان",
                        "ps" => "بامیان",
                        "District" => [
                            "Bamyan" => ["fa" => "بامیان", "ps" => "بامیان"],
                            "Waras" => ["fa" => "وراز", "ps" => "وراز"],
                            "Saighan" => ["fa" => "سایغان", "ps" => "سایغان"],
                            "Kahmard" => ["fa" => "کَهمَرد", "ps" => "کهمرد "],
                            "Panjab" => ["fa" => "پنجاب", "ps" => "پنجآب"],
                            "Sayghan" => ["fa" => "سَیغان", "ps" => "سيغان "],
                            "Shibar" => ["fa" => "شیبَر", "ps" => "شیبَر"],
                            "Waras" => ["fa" => "وَرَس", "ps" => "ورس"],
                            "Yakawlang" => ["fa" => "یکاولنگ", "ps" => "يکاولنگ"],
                        ]
                    ],
                    "Samangan" => [
                        "fa" => "سمنگان",
                        "ps" => "سمنگان",
                        "District" => [
                            "Aybak" => ["fa" => "ایبک", "ps" => "ایبک"],
                            "Kohistan" => ["fa" => "کوهستان", "ps" => "کوهستان"],
                            "Dahana-i-Ghori" => ["fa" => "دهن غوری", "ps" => "دهن غوری"],
                            "Darah Sof Balla" => ["fa" => "دره صوف بالا", "ps" => "دره صوفي بالا"],
                            "Darah Sof Payan" => ["fa" => "دره صوف پایین", "ps" => "دره صوفي پایان "],
                            "Feroz Nakhchir	" => ["fa" => "فیروزنَخچیر", "ps" => "فیروز نخچر"],
                            "Hazrat Sultan" => ["fa" => "حضرتِ سلطان", "ps" => "حضرت سلطان"],
                            "Khuram Wa Sarbagh" => ["fa" => "خُرم و سارباغ", "ps" => "خرم او سرباغ"],
                            "Ruyi Du Ab" => ["fa" => "روی دوآب", "ps" => "روی دو آب"],


                        ]
                    ],
                    "Takhar" => [
                        "fa" => "تخار",
                        "ps" => "تخار",
                        "District" => [
                            "Taloqan" => ["fa" => "تالقان", "ps" => "تالقان"],
                            "Dasht Qala" => ["fa" => "داشتی قلعه", "ps" => "داشتی قلعه"],
                            "Yangi Qala" => ["fa" => "یونی قلعه", "ps" => "یونی قلعه"],
                            "Baharak" => ["fa" => "بهارک", "ps" => "بهارک"],
                            "Bangi" => ["fa" => "بَنگی", "ps" => "بنگي"],
                            "Chah Ab" => ["fa" => "چاه‌آب", "ps" => "چاه آب"],
                            "Darqad" => ["fa" => "دَرقَد", "ps" => "درقد"],
                            "Dashti Qala" => ["fa" => "یَنگی‌قلعه", "ps" => "ینگي کلا"],
                            "Farkhar" => ["fa" => "فَرخار", "ps" => "فرخار"],
                            "Hazar Sumuch" => ["fa" => "هزارسَموچ", "ps" => "هزار سموچ"],
                            "Ishkamish" => ["fa" => "اِشکمِش", "ps" => "اشکامش"],
                            "Kalafgan" => ["fa" => "کلفگان", "ps" => "کلفگان"],
                            "Khwaja Bahauddin" => ["fa" => "خواجه بهاوالدین", "ps" => "خواجه بهاوالدین"],
                            "Khwaja Ghar" => ["fa" => "خواجه غار", "ps" => "خواجه غر"],
                            "Namak Ab" => ["fa" => "نمک‌آب", "ps" => "نمک آب"],
                            "Rustaq" => ["fa" => "روستاق", "ps" => "رستاق"],
                            "Warsaj" => ["fa" => "ورساج", "ps" => "ورساج"],
                            "Chaal" => ["fa" => "چال", "ps" => "چال"],
                            "hazar Somuch " => ["fa" => "هزار سموچ", "ps" => "هزار سموچ"],

                        ]
                    ],
                    "Paktia" => [
                        "fa" => "پکتیا",
                        "ps" => "پکتیا",
                        "District" => [
                            "Gardez" => ["fa" => "ګردیز", "ps" => "ګردیز"],
                            "Ahmad Aba" => ["fa" => "احمد آباد ", "ps" => "احمدآباد"],
                            "Laja Ahmad khel" => ["fa" => "لجه احمدخیل", "ps" => " لژه احمد خېل "],
                            "Dand Aw Patan" => ["fa" => "دَند پَتان", "ps" => "ډنډ او پټان"],
                            "Gerda Serai" => ["fa" => "گرده ثیری", "ps" => "گرده ثیری"],
                            "Janikhel District" => ["fa" => "جانی‌خیل", "ps" => "جانيخېل"],
                            "Mirzaka" => ["fa" => "میرزکه", "ps" => "میرزکه"],
                            "Rohani Baba" => ["fa" => "روحاني بابا", "ps" => "روحاني بابا"],
                            "Said Karam" => ["fa" => "سيد کرم", "ps" => "سيد کرم"],
                            "Shwak" => ["fa" => "شواک", "ps" => "شواک"],
                            "Chamkani" => ["fa" => "چَمکَنی", "ps" => "څمکنۍ"],
                            "Zadran" => ["fa" => "زَدران", "ps" => "ځدران"],
                            "Zazi " => ["fa" => "جاجی", "ps" => "ځاځي"],
                            "Zurmat" => ["fa" => "زرمت", "ps" => "زرمت"],
                            "Jaji Ali Khil" => ["fa" => "ځاځي علي خیل", "ps" => "ځاځي علي خیل"],
                            "laja Mangal" => ["fa" => "لجه منگل", "ps" => "لژه منګل"],


                        ]
                    ],
                    "Khost" => [
                        "fa" => "خوست",
                        "ps" => "خوست",
                        "District" => [
                            "Khost" => ["fa" => "خوست", "ps" => "خوست"],
                            "Mandozai" => ["fa" => "مندوزی", "ps" => "مندوزی"],
                            "Zazai Maidan" => ["fa" => "زازای میدان", "ps" => "زازای میدان"],
                            "Bak" => ["fa" => "باک", "ps" => "باک"],
                            "Gurbuz" => ["fa" => "گُربُز", "ps" => "گوربز"],
                            "Jaji Maydan" => ["fa" => "جاجی‌میدان", "ps" => "ځاځي میدان"],
                            "Musa Khel	" => ["fa" => "موسی‌خیل", "ps" => "موسی خېل"],
                            "Nadir Shah Kot" => ["fa" => "نادرشاه‌کوت", "ps" => "نادرشاه کوټ"],
                            "Qalandar" => ["fa" => "قَلَندر", "ps" => "قلندر"],
                            "Sabari" => ["fa" => "صَبری", "ps" => "سبري"],
                            "Shamal" => ["fa" => "شَمَل", "ps" => "شمال"],
                            "Spera" => ["fa" => "سپیره", "ps" => "سپېره"],
                            "Tani" => ["fa" => "تَنی", "ps" => "تڼۍ"],
                            "Tirazayi" => ["fa" => "تیریزائی", "ps" => "تېره زی"],
                            "Matun" => ["fa" => "متون", "ps" => "متون"],
                        ]
                    ],
                    "Paktika" => [
                        "fa" => "پکتیکا",
                        "ps" => "پکتیکا",
                        "District" => [
                            "Sharan" => ["fa" => "شرن", "ps" => "شرن"],
                            "Sarobi" => ["fa" => "سروری", "ps" => "سروری"],
                            "Barmal" => ["fa" => "برمل", "ps" => "برمل"],
                            "Dila" => ["fa" => "دیله", "ps" => "ډیله"],
                            "Gayan" => ["fa" => "گیان", "ps" => "گیان"],
                            "Gomal" => ["fa" => "گومَل", "ps" => "گومال"],
                            "Janikhel" => ["fa" => "جانی‌خیل", "ps" => "جاني خېل"],
                            "Zarghun Shar " => ["fa" => "زرغون‌شهر", "ps" => "زرغون ښار"],
                            "Mata Khan" => ["fa" => "مَتاخان", "ps" => "مټاخان"],
                            "Nika" => ["fa" => "نکه", "ps" => "نېکه"],
                            "Omna" => ["fa" => "اومَنه", "ps" => "اومنا"],
                            "Sar Hawza" => ["fa" => "سرروضه", "ps" => "سر حوزه"],
                            "Surobi" => ["fa" => "سَروبی", "ps" => "سروبي"],
                            "Terwa" => ["fa" => "تَروُو", "ps" => "تېروه"],
                            "Urgun" => ["fa" => "اُرگون", "ps" => "ارگون"],
                            "Wazakhwa" => ["fa" => "وازه‌خواه", "ps" => "وازه خوا"],
                            "Wor Mamay" => ["fa" => "وَرمَمی", "ps" => "ور مامی"],
                            "Yahyakhel" => ["fa" => "یخیی خېل ", "ps" => "یخیی خېل "],
                            "Yusufkhel" => ["fa" => "یوسف خېل ", "ps" => "یوسف خېل "],
                            "Zerok" => ["fa" => "زیروک", "ps" => "زیروک"],
                            "Deela wa Khosmand" => ["fa" => "خوشمند", "ps" => "دیله او خوشمند "],
                            "Khosmand" => ["fa" => "خوشمند", "ps" => "خوشمند"],







                        ]
                    ],
                    "Nimroz" => [
                        "fa" => "نمروز",
                        "ps" => "نمروز",
                        "District" => [
                            "Zaranj" => ["fa" => "زرنج", "ps" => "زرنج"],
                            "Khash Rod" => ["fa" => "خرش رود", "ps" => "خرش رود"],
                            "Chahar Burjak" => ["fa" => "چهاربُرجک", "ps" => "چاربورجک"],
                            "Chakhansur" => ["fa" => "چَخانسور", "ps" => "چخانسور"],
                            "Kang" => ["fa" => "کَنگ", "ps" => "کنگ"],
                            "Delaram" => ["fa" => "دل آرام", "ps" => "دل آرام"],
                        ]
                    ],
                    "Urozgan" => [
                        "fa" => "اُروزگان",
                        "ps" => "اُروزگان",
                        "District" => [
                            "Tarin Kot" => ["fa" => " ترین‌کوت", "ps" => "ترین کوټ"],
                            "Deh Rawud" => ["fa" => "ده راود", "ps" => "ده راود"],
                            "Chora" => ["fa" => "چوره", "ps" => "چوره"],
                            "Khas Uruzgan" => ["fa" => "خاص‌ارزگان", "ps" => "خاص اروزگان"],
                            "Shahidi Hassas" => ["fa" => "شهید حساس", "ps" => "شهيدې حساس"],
                            "Gizab" => ["fa" => "گیزاب", "ps" => "ګیزاب"],
                            "Chinar Tu" => ["fa" => "چنار تو", "ps" => "چنار تو"],
                            "Chahar Chinai" => ["fa" => "چهار چینایی", "ps" => "چهار چینایی"],
                        ]
                    ],
                    "Daykundi" => [
                        "fa" => "دایکندی",
                        "ps" => "دایکندی",
                        "District" => [
                            "Nili" => ["fa" => "نیلی", "ps" => "نیلی"],
                            "Kiti" => ["fa" => "کتی", "ps" => "کتی"],
                            "Ishtarlay" => ["fa" => "اَشتَرَلی", "ps" => "اشتارلي"],
                            "Kajran" => ["fa" => "کِجران", "ps" => "کجران "],
                            "Khadir " => ["fa" => "خِدیر", "ps" => "خادر "],
                            "Miramor" => ["fa" => "میرامور", "ps" => "میرامور"],
                            "Sangtakht" => ["fa" => "سنگِ تخت", "ps" => "سنگ تخت"],
                            "Shahristan" => ["fa" => "شهرستان", "ps" => "شهرستان"],
                            "Patoo " => ["fa" => "پاتو", "ps" => "پاتو"],


                        ]
                    ],
                    "Badghis" => [
                        "fa" => "بدخشانی",
                        "ps" => "بدخشانی",
                        "District" => [
                            "Qala-i-Naw" => ["fa" => "قلعه نو", "ps" => "قلعه نو"],
                            "Murghab" => ["fa" => "مرغاب", "ps" => "مرغاب"],
                            "Jawand" => ["fa" => "جواند", "ps" => "جواند"],
                            "Ab Kamari " => ["fa" => "آب‌کَمَری", "ps" => "آبکمري"],
                            "Ghormach " => ["fa" => "غورماچ", "ps" => "غورماچ"],
                            "Muqur " => ["fa" => "مُقُر", "ps" => "مقر"],
                            "Bala Murghab " => ["fa" => "بالا مرغاب", "ps" => "بالا مرغاب"],
                            "Qadis " => ["fa" => "قادِس", "ps" => "قاديس"],

                        ]
                    ],
                    "Ghor" => [
                        "fa" => "غور",
                        "ps" => "غور",
                        "District" => [
                            "Chaghcharan" => ["fa" => "چغچران", "ps" => "چغچران"],
                            "Lal wa Sarjangal" => ["fa" => "لال و سرجنگل", "ps" => "لال و سرجنگل"],
                            "Marghab " => ["fa" => "مرغاب", "ps" => "مرغاب"],
                            "Charsada " => ["fa" => "چارسده", "ps" => "چارسده "],
                            "Dawlat Yar " => ["fa" => "دولت یار", "ps" => "دولت یار"],
                            "Du Layna " => ["fa" => "دولینه", "ps" => "دو لاینه"],
                            "Pasaband " => ["fa" => "پسابند", "ps" => "پسابند"],
                            "Saghar " => ["fa" => "ساغر", "ps" => "ساغر"],
                            "Shahrak " => ["fa" => "شهرک", "ps" => "شهرک"],
                            "Taywara " => ["fa" => "تیوره", "ps" => "تایواره"],
                            "Tulak " => ["fa" => "تولک", "ps" => "تولک"],
                            "Feroz Koh " => ["fa" => "فیروز کوه", "ps" => "فیروز کوه"],
                        ]
                    ],
                    "Sar-e Pol" => [
                        "fa" => "سرپل",
                        "ps" => "سرپل",
                        "District" => [
                            "Sar-e Pol" => ["fa" => "سرپل", "ps" => "سرپل"],
                            "Kohistanat" => ["fa" => "کوهستانات", "ps" => "کوهستانات"],
                            "Balkhab" => ["fa" => "بلخاب", "ps" => "بلخاب"],
                            "Gosfandi" => ["fa" => "گوسفندی", "ps" => "گوسفندي "],
                            "Sangcharak" => ["fa" => "سانچارک", "ps" => "سنگچارک"],
                            "Sayyad" => ["fa" => "صیاد", "ps" => "سیاد"],
                            "Sozma Qala" => ["fa" => "سرپل", "ps" => "سوزمه کلا"],
                            "Al jehad" => ["fa" => "الجهاد", "ps" => "الجهاد"],
                            "Said Abad" => ["fa" => "سید آباد", "ps" => "سید آباد"],
                            "Al Fath" => ["fa" => "الجهاد", "ps" => "الفتح"],
                            "Al Badri" => ["fa" => "البدري", "ps" => "البدري"],

                        ]
                    ],
                    "Faryab" => [
                        "fa" => "فاریاب",
                        "ps" => "فاریاب",
                        "District" => [
                            "Maymana" => ["fa" => "مینه", "ps" => "مینه"],
                            "Andkhoi" => ["fa" => "اندخوی", "ps" => "اندخوی"],
                            "Ghowchak" => ["fa" => "غوچک", "ps" => "غوچک"],
                            "Almar" => ["fa" => "اَلمار", "ps" => "الیمار"],
                            "Bilchiragh" => ["fa" => "بُلچراغ", "ps" => "بېلچراغ"],
                            "Dawlat Abad" => ["fa" => "دولت‌آباد", "ps" => "دولت اباد"],
                            "Gurziwan" => ["fa" => "گَرزیوان", "ps" => "گورزیوان"],
                            "Khani Chahar Bagh" => ["fa" => "خانه چارباغ", "ps" => "خانه چارباغ"],
                            "Khwaja Sabz Posh" => ["fa" => "خواجه سبزپوش ولی", "ps" => "خواجه سبز پوش"],
                            "Kohistan" => ["fa" => "کوهستان", "ps" => "کوهستان"],
                            "Pashtun Kot" => ["fa" => "پشتون‌کوت", "ps" => "پښتونکوټ"],
                            "Qaramqol" => ["fa" => "قَرَم‌قُل", "ps" => "قرمگل"],
                            "Qaysar" => ["fa" => "قیصار", "ps" => "قیصار"],
                            "Qurghan" => ["fa" => "قَرغان", "ps" => "قرغان"],
                            "Shirin Tagab" => ["fa" => "شیرین‌تَگاب", "ps" => "شیرین تگاب"],

                        ]
                    ],
                    "Panjshir" => [
                        "fa" => "پنجشیر",
                        "ps" => "پنجشیر",
                        "District" => [
                            "Bazarak" => ["fa" => "بازارک", "ps" => "بازارک"],
                            "Shahristan" => ["fa" => "شهریستان", "ps" => "شهریستان"],
                            "Anaba" => ["fa" => "اَنابه", "ps" => "انابه "],
                            "Darah " => ["fa" => "دره ", "ps" => "دره "],
                            "Khenj" => ["fa" => "خِنج", "ps" => "خنج"],
                            "Paryan" => ["fa" => "پریان", "ps" => "پریان"],
                            "Rokha" => ["fa" => "روخه", "ps" => "روخه "],
                            "Shotul" => ["fa" => "شُتُل", "ps" => "شوتل"],
                            "Abshar" => ["fa" => "ابشار", "ps" => "ابشار"],
                            "Hais Awall" => ["fa" => "حصه اول", "ps" => "اوله حصه"],
                        ]
                    ],
                    "Parwan" => [
                        "fa" => "پروان",
                        "ps" => "پروان",
                        "District" => [
                            "Bagram" => ["fa" => "بَگرام", "ps" => "بَگرام"],
                            "Charikar" => ["fa" => "چاریکار", "ps" => "چاریکار"],
                            "Ghorband" => ["fa" => "غوربند", "ps" => "غوربند"],
                            "Jabul Saraj" => ["fa" => "جبل سراج", "ps" => "جبل‌سراج"],
                            "Kohi Safi" => ["fa" => "کوهِ صافی", "ps" => "کوه سافي"],
                            "Salang" => ["fa" => "سالَنگ", "ps" => "
                                سالنگ"],
                            "Sayed Khel " => ["fa" => "سیدخیل", "ps" => "سید خیل "],
                            "Sheikh Ali" => ["fa" => " شیخ علي", "ps" => " شیخ علي"],
                            "Shinwari" => ["fa" => "شینواری", "ps" => "شینواري"],
                            "Surkhi Parsa" => ["fa" => "سرخِ پارسا", "ps" => "سرخ پارسا"],
                            "Sia Gerd " => ["fa" => "سیاه گرد", "ps" => "تور گرد"],



                        ]
                    ],

                    "Maidan Wardak" => [
                        "fa" => " میدان وردگ",
                        "ps" => " میدان وردگ",
                        "District" => [
                            "Chak" => ["fa" => "چکِ وردک", "ps" => "چک"],
                            "Day Mirdad" => ["fa" => "دایمیرداد", "ps" => "دايمرداد"],
                            "Bihsud" => ["fa" => "بهسود", "ps" => "بهسود "],
                            "Jaghatu " => ["fa" => "جغتو ", "ps" => "جغتو "],
                            "Jalrez" => ["fa" => "جلریز", "ps" => "جلريز"],
                            "Markazi Bihsud" => ["fa" => "مرکزِ بهسود", "ps" => "مرکزي بهسود"],
                            "Maydan Shahr" => ["fa" => "میدان شار", "ps" => "ميدان ښار "],
                            "Nirkh" => ["fa" => "نِرخ", "ps" => "نرخ"],
                            "Saydabad" => ["fa" => "سیدآباد", "ps" => "سيد آباد"],

                        ]
                    ],

                    "Nuristan" => [
                        "fa" => "نورستان",
                        "ps" => "نورستان",
                        "District" => [
                            "Bargi Matal" => ["fa" => "برگِ مَتال", "ps" => "برگېمټال"],
                            "Du Ab" => ["fa" => "دوآب", "ps" => "دو آب "],
                            "Kamdesh" => ["fa" => "کامدیش", "ps" => "کامدېش "],
                            "Mandol " => ["fa" => "مَندول ", "ps" => "منډول "],
                            "Nurgaram " => ["fa" => "نورگرام ", "ps" => "نورگرام "],
                            "Parun" => ["fa" => "پارون", "ps" => "پارون"],
                            "Wama" => ["fa" => "واما", "ps" => "واما "],
                            "Waygal" => ["fa" => "وایگَل", "ps" => "وایگل"],

                        ]
                    ],

                    "Helmand " => [
                        "fa" => " هلمند",
                        "ps" => "هلمند",
                        "District" => [
                            "Baghran" => ["fa" => "بَغران", "ps" => "باغران"],
                            "Dishu" => ["fa" => "دیشو", "ps" => "دیشو"],
                            "Garmsir" => ["fa" => "گرمسیر", "ps" => "گرمسېر "],
                            "Grishk " => ["fa" => "گريشک ", "ps" => "گريشک "],
                            "Kajaki" => ["fa" => "کَجَکی", "ps" => "کجکي"],
                            "Khanashin" => ["fa" => "خان‌نشین", "ps" => "خانېشين"],
                            "Lashkargah" => ["fa" => "لشکرگاه", "ps" => "لښکرگاه "],
                            "Nad Ali" => ["fa" => "نادعلی", "ps" => "نادعلي"],
                            "Musa Qala" => ["fa" => "موسی‌قلعه", "ps" => "موسی کلا"],
                            "Nawa-I-Barakzayi" => ["fa" => "ناوهٔ بارکزائی", "ps" => "نوی بارکزی"],
                            "Nawzad" => ["fa" => "نوزاد", "ps" => "نوزاد"],
                            "Sangin" => ["fa" => "سَنگین", "ps" => "سنگین"],
                            "Washir" => ["fa" => "واشیر", "ps" => "واشېر"],
                            "Marjah" => ["fa" => "مرجح", "ps" => "مرجح"],
                            "Nahr -E- Seraj" => ["fa" => "نهر سراج", "ps" => "نهر سراج"],
                            "Naw mish" => ["fa" => "ناو میش", "ps" => "ناو میش"],
                            "Nawa" => ["fa" => "ناوه", "ps" => "ناوه"],


                        ]
                    ],

                    "Zabul" => [
                        "fa" => " زابل",
                        "ps" => "زابل",
                        "District" => [
                            "Argahandab" => ["fa" => "اَرغَنداب", "ps" => "ارغنداب"],
                            "Atghar" => ["fa" => "اَتغَر", "ps" => "اټغار"],
                            "Daychopan" => ["fa" => "دای چوپان", "ps" => "دای چوپان "],
                            "Kakar " => ["fa" => "کاکَر ", "ps" => "کاکړ "],
                            "Mezana" => ["fa" => "میزان", "ps" => "میزان"],
                            "Naw Bahar" => ["fa" => "نوبهار", "ps" => "نو بجر "],
                            "Qalat" => ["fa" => "قَلات", "ps" => "قلات "],
                            "Shamulzayi" => ["fa" => "شمولزی", "ps" => " شمولزی"],
                            " Shinkay" => ["fa" => "شینکی", "ps" => " شینکی"],
                            "Tarnak Wa Jaldak" => ["fa" => "ترنک او جلدک", "ps" => "ترنک او جلدک "],
                            "Shah joyi" => ["fa" => "شاه جویی", "ps" => "شاه جویي "],


                        ]
                    ],

                    "Farah " => [
                        "fa" => " فراه",
                        "ps" => "فراه",
                        "District" => [
                            "Anar Dara" => ["fa" => "انار دره", "ps" => "انار دره"],
                            "Bakwa" => ["fa" => "شهریستان", "ps" => "شهریستان"],
                            "Anaba" => ["fa" => "بَکواه", "ps" => "بکوا "],
                            "Bala Buluk " => ["fa" => "بالابلوک ", "ps" => "بالا بلوک "],
                            "Farah" => ["fa" => "فراه
                                ", "ps" => "فراه
                                "],
                            "Gulistan" => ["fa" => "گلستان", "ps" => "گلستان"],
                            "Khaki Safed" => ["fa" => "خاک سفېد", "ps" => "خاک سفېد "],
                            "Lash wa Juwayn" => ["fa" => "لاش و جُوَین", "ps" => "د لاش او جواین"],
                            "Pur Chaman" => ["fa" => "پرچمن", "ps" => "پر چمن"],
                            "Pusht Rod" => ["fa" => "پُشت‌رود", "ps" => "پشت رود"],
                            "Qala i Kah" => ["fa" => "قلعهٔ کاه", "ps" => "قلعه کاه"],
                            "Shib Koh" => ["fa" => "شیب‌کوه", "ps" => "شېب کوه"],

                        ]
                    ],

                    "Laghman " => [
                        "fa" => " لَغمان",
                        "ps" => " لَغمان",
                        "District" => [
                            "Alingar" => ["fa" => "علینگار", "ps" => "الینگار"],
                            "Alishing" => ["fa" => "علیشِنگ", "ps" => "الیشنگ"],
                            "Mihtarlam" => ["fa" => "مهترلام", "ps" => "مهترلام "],
                            "Dawlat Shah " => ["fa" => "دولت‌شاه ", "ps" => "دولتشاه "],
                            "Qarghayi" => ["fa" => "قرغیي", "ps" => "قرغیي"],
                            "Bad pokh" => ["fa" => "باد پوخ", "ps" => "باد پوښ"],
                            "Spinghar" => ["fa" => "سپین غر", "ps" => "سپین غر"],


                        ]
                    ],

                    "Kunar" => [
                        "fa" => " کنړ",
                        "ps" => "کنړ",
                        "District" => [
                            "Asadabad" => ["fa" => "اسد اباد", "ps" => "اسد اباد"],
                            "Bar Kunar" => ["fa" => "بَرکُنر", "ps" => "بر کنړ"],
                            "Chapa Dara" => ["fa" => "چپه‌دره", "ps" => "چپه دره "],
                            "Chawkay " => ["fa" => "چوکی ", "ps" => "څوکۍ "],
                            "Dangam" => ["fa" => "دانگام", "ps" => "دانگام"],
                            "Dara-I-Pech" => ["fa" => "دره‌پیچ", "ps" => "پېچ دره"],
                            "Nurgal" => ["fa" => "نورگُل", "ps" => "نورگل "],
                            "Khas Kunar" => ["fa" => "خاص‌کُنر", "ps" => "خاص کنړ"],
                            "Marawara" => ["fa" => "مَرَوَره", "ps" => "مروره"],
                            "Narang Wa Badil" => ["fa" => "نَرَنگ", "ps" => "نرنگ و باډېل"],
                            "Nari" => ["fa" => "ناری", "ps" => "ناړۍ"],
                            "Shaigal" => ["fa" => "شیگل", "ps" => "شیگل "],
                            "Sirkanai " => ["fa" => "سرکانی", "ps" => "سرکاڼو"],
                            "Wata Pur " => ["fa" => "وَتَه‌پور", "ps" => "وټه پور"],
                            "Ghazi Abad" => ["fa" => "غازي اباد", "ps" => "غازي آباد"],
                            "Narang" => ["fa" => "نارنج", "ps" => "نارنج "],


                        ]
                    ],

                    "Kapisa" => [
                        "fa" => " کاپيسا",
                        "ps" => "کاپيسا",
                        "District" => [
                            "Alasay" => ["fa" => "اَلِه‌سائی", "ps" => "آلاسای"],
                            "Hesa Awal Kohistan" => ["fa" => "حصهٔ اول کوهستان", "ps" => "حصه اول کوهستان"],
                            "Hesa Duwum Kohistan " => ["fa" => "حصه دوم کوهستان ", "ps" => "حصه دوم کوهستان  "],
                            "Koh Band " => ["fa" => "کوه‌بند ", "ps" => "کوه بند "],
                            "Mahmud Raqi" => ["fa" => "محمود راقی", "ps" => "محمود راقي"],
                            "Nijrab" => ["fa" => "نَجراب", "ps" => "نجراب"],
                            "Tagab" => ["fa" => "تَگاب", "ps" => "تګاب "],


                        ]
                    ],

                    "Jowzjan" => [
                        "fa" => " جوزجان",
                        "ps" => "جوزجان",
                        "District" => [
                            "Aqcha" => ["fa" => "آقچه", "ps" => "آقچه"],
                            "Darzab" => ["fa" => "دَرزاب", "ps" => "درزاب"],
                            "Fayzabad" => ["fa" => "فیض‌آباد", "ps" => "فیض آباد "],
                            "Khamyab " => ["fa" => "خمیاب ", "ps" => "خمیاب "],
                            "Khaniqa" => ["fa" => "خانقاه", "ps" => "خانیقا"],
                            "Khwaja Du Koh" => ["fa" => "خواجه دوکوه", "ps" => "خواجه دو کوه"],
                            "Mardyan" => ["fa" => "مَردیان", "ps" => "مردیان "],
                            "Mingajik" => ["fa" => "مِنگَجِک", "ps" => "مینگاجیک"],
                            "Qarqin" => ["fa" => "قَرقین", "ps" => "قرقین"],
                            "Qush Tepa" => ["fa" => "قوش‌تپه", "ps" => "قش تپه"],
                            "Shibirghan" => ["fa" => "شِبِرغان", "ps" => "شبرغان"],





                        ]
                    ],

                    "Kunduz " => [
                        "fa" => " کندوز ",
                        "ps" => "کندوز",
                        "District" => [
                            "Aliabad" => ["fa" => "علي آباد", "ps" => "علي آباد"],
                            "Archi" => ["fa" => "ارچي", "ps" => "ارچي"],
                            "Char Dara" => ["fa" => "چهاردره", "ps" => "چاردره "],
                            "Imam Sahib " => ["fa" => "امام‌صاحب ", "ps" => "امام صيب "],
                            "Khan Abad" => ["fa" => "خان‌آباد", "ps" => "خان آباد"],
                            "Kunduz" => ["fa" => "کندوز", "ps" => "کندوز"],
                            "Qalay-I-Zal" => ["fa" => "قلعهٔ‌ذال", "ps" => "قلا زال "],


                        ]
                    ],

                    "Baghlan " => [
                        "fa" => " بغلان",
                        "ps" => "بغلان",
                        "District" => [
                            "Andarab" => ["fa" => "اندراب", "ps" => "اندراب"],
                            "Baghlani Jadid" => ["fa" => "بغلان جدید", "ps" => "نوی بغلان "],
                            "Burka" => ["fa" => "برکه", "ps" => "برکه "],
                            "Dahana-e-Ghuri " => ["fa" => "دهنه غوری
                                ", "ps" => "دهنه غوري"],
                            "Dih Salah" => ["fa" => "ده صلاح", "ps" => "ده صالح"],
                            "Dushi" => ["fa" => "دوشی", "ps" => "دوشي"],
                            "Farang Wa Gharu" => ["fa" => "فرنگ و غرو", "ps" => "فرنگ او غارو "],
                            "Guzargahi Nur" => ["fa" => "گذرگاه نور", "ps" => "گذرگاه نور"],
                            "Khinjan" => ["fa" => "خنجان", "ps" => "خنجان "],
                            "Khost Wa Fereng" => ["fa" => "خوست و فرنگ", "ps" => "خوست او فرنگ "],
                            "Khwaja Hijran (Jalga)" => ["fa" => "خواجه هجرت (جلگه)", "ps" => "خواجه هجران "],
                            "Nahrin" => ["fa" => "نهرین", "ps" => "ناهرين "],
                            "Puli Hisar" => ["fa" => "پل حصار", "ps" => "پل حصار "],
                            "Puli Khumri" => ["fa" => "	پل خمری", "ps" => "پلخمري "],
                            "Tala wa Barfak" => ["fa" => "تاله او برفک ", "ps" => "تاله او برفک "],
                            "Bano" => ["fa" => "بانو", "ps" => "بانو"],
                            "Doshi" => ["fa" => "دوشی", "ps" => "دوشي"],
                            "Khwaja Hejran" => ["fa" => "بانخواجه هجرانو", "ps" => "خواجه هجران"],
                            



                        ]
                    ],


                ]
            ],
            "Albania" => [
                "fa" => "آلبانی",
                "ps" => "آلبانی",
                "nationality"=>[
                    "en"=>"Afghan",
                    "fa"=>"",
                    "ps"=>"",
                ],
            ],
            "Algeria" => [
                "fa" => "الجزایر",
                "ps" => "الجزایر",
                "nationality"=>[
                    "en"=>"Afghan",
                    "fa"=>"",
                    "ps"=>"",
                ],
            ],
            "Andorra" => [
                "fa" => "اندورا",
                "ps" => "اندورا",
            ],
            "Angola" => [
                "fa" => "انگولا",
                "ps" => "انگولا",
            ],
            "Argentina" => [
                "fa" => "آرژانتین",
                "ps" => "آرژانتین",
            ],
            "Armenia" => [
                "fa" => "ارمنستان",
                "ps" => "ارمنستان",
            ],
            "Australia" => [
                "fa" => "استرالیا",
                "ps" => "استرالیا",
            ],
            "Austria" => [
                "fa" => "اتریش",
                "ps" => "اتریش",
            ],
            "Azerbaijan" => [
                "fa" => "آذربایجان",
                "ps" => "آذربایجان",
            ],
            "Bahamas" => [
                "fa" => "باهاماس",
                "ps" => "باهاماس",
            ],
            "Bahrain" => [
                "fa" => "بحرین",
                "ps" => "بحرین",
            ],
            "Bangladesh" => [
                "fa" => "بنگلادش",
                "ps" => "بنگلادش",
            ],
            "Barbados" => [
                "fa" => "باربادوس",
                "ps" => "باربادوس",
            ],
            "Belarus" => [
                "fa" => "بلاروس",
                "ps" => "بلاروس",
            ],
            "Belgium" => [
                "fa" => "بلژیک",
                "ps" => "بلژیک",
            ],
            "Belize" => [
                "fa" => "بلیز",
                "ps" => "بلیز",
            ],
            "Benin" => [
                "fa" => "بنین",
                "ps" => "بنین",
            ],
            "Bhutan" => [
                "fa" => "بوتان",
                "ps" => "بوتان",
            ],
            "Bolivia" => [
                "fa" => "بولیوی",
                "ps" => "بولیوی",
            ],
            "Bosnia and Herzegovina" => [
                "fa" => "بوسنی و هرزگوین",
                "ps" => "بوسنی و هرزگوین",
            ],
            "Botswana" => [
                "fa" => "بوتسوانا",
                "ps" => "بوتسوانا",
            ],
            "Brazil" => [
                "fa" => "برازیل",
                "ps" => "برازیل",
            ],
            "Brunei" => [
                "fa" => "برونئی",
                "ps" => "برونئی",
            ],
            "Bulgaria" => [
                "fa" => "بلغاریا",
                "ps" => "بلغاریا",
            ],
            "Burkina Faso" => [
                "fa" => "بورکینافاسو",
                "ps" => "بورکینافاسو",
            ],
            "Burundi" => [
                "fa" => "بوروندی",
                "ps" => "بوروندی",
            ],
            "Cabo Verde" => [
                "fa" => "کابو وردی",
                "ps" => "کابو وردی",
            ],
            "Cambodia" => [
                "fa" => "کامبوج",
                "ps" => "کامبوج",
            ],
            "Cameroon" => [
                "fa" => "کامرون",
                "ps" => "کامرون",
            ],
            "Canada" => [
                "fa" => "کانادا",
                "ps" => "کانادا",
            ],
            "Central African Republic" => [
                "fa" => "جمهوری آفریقای مرکزی",
                "ps" => "جمهوری آفریقای مرکزی",
            ],
            "Chad" => [
                "fa" => "چاد",
                "ps" => "چاد",
            ],
            "Chile" => [
                "fa" => "شیلی",
                "ps" => "شیلی",
            ],
            "China" => [
                "fa" => "چین",
                "ps" => "چین",
            ],
            "Colombia" => [
                "fa" => "کلمبیا",
                "ps" => "کلمبیا",
            ],
            "Comoros" => [
                "fa" => "کومور",
                "ps" => "کومور",
            ],
            "Congo, Democratic Republic of the" => [
                "fa" => "جمهوری دموکراتیک کنگو",
                "ps" => "جمهوری دموکراتیک کنگو",
            ],
            "Congo, Republic of the" => [
                "fa" => "جمهوری کنگو",
                "ps" => "جمهوری کنگو",
            ],
            "Costa Rica" => [
                "fa" => "کاستاریکا",
                "ps" => "کاستاریکا",
            ],
            "Croatia" => [
                "fa" => "کرواسی",
                "ps" => "کرواسی",
            ],
            "Cuba" => [
                "fa" => "کیوبا",
                "ps" => "کیوبا",
            ],
            "Cyprus" => [
                "fa" => "قبرس",
                "ps" => "قبرس",
            ],
            "Czech Republic" => [
                "fa" => "جمهوری چک",
                "ps" => "جمهوری چک",
            ],
            "Denmark" => [
                "fa" => "دانمارک",
                "ps" => "دانمارک",
            ],
            "Djibouti" => [
                "fa" => "جیبوتی",
                "ps" => "جیبوتی",
            ],
            "Dominica" => [
                "fa" => "دومینیکا",
                "ps" => "دومینیکا",
            ],
            "Dominican Republic" => [
                "fa" => "جمهوری دومینیکن",
                "ps" => "جمهوری دومینیکن",
            ],
            "Ecuador" => [
                "fa" => "اکوادور",
                "ps" => "اکوادور",
            ],
            "Egypt" => [
                "fa" => "مصر",
                "ps" => "مصر",
            ],
            "El Salvador" => [
                "fa" => "السالوادور",
                "ps" => "السالوادور",
            ],
            "Equatorial Guinea" => [
                "fa" => "گینه استوایی",
                "ps" => "گینه استوایی",
            ],
            "Eritrea" => [
                "fa" => "اریتره",
                "ps" => "اریتره",
            ],
            "Estonia" => [
                "fa" => "استونی",
                "ps" => "استونی",
            ],
            "Eswatini" => [
                "fa" => "اسواتینی",
                "ps" => "اسواتینی",
            ],
            "Ethiopia" => [
                "fa" => "اتیوپی",
                "ps" => "اتیوپی",
            ],
            "Fiji" => [
                "fa" => "فیجی",
                "ps" => "فیجی",
            ],
            "Finland" => [
                "fa" => "فنلند",
                "ps" => "فنلند",
            ],
            "France" => [
                "fa" => "فرانسه",
                "ps" => "فرانسه",
            ],
            "Gabon" => [
                "fa" => "گابن",
                "ps" => "گابن",
            ],
            "Gambia" => [
                "fa" => "گامبیا",
                "ps" => "گامبیا",
            ],
            "Georgia" => [
                "fa" => "گرجستان",
                "ps" => "گرجستان",
            ],
            "Germany" => [
                "fa" => "جرمنی",
                "ps" => "جرمنی",
            ],
            "Ghana" => [
                "fa" => "غنا",
                "ps" => "غنا",
            ],
            "Greece" => [
                "fa" => "یونان",
                "ps" => "یونان",
            ],
            "Grenada" => [
                "fa" => "گرانادا",
                "ps" => "گرانادا",
            ],
            "Guatemala" => [
                "fa" => "گواتمالا",
                "ps" => "گواتمالا",
            ],
            "Guinea" => [
                "fa" => "گینه",
                "ps" => "گینه",
            ],
            "Guinea-Bissau" => [
                "fa" => "گینه بیسائو",
                "ps" => "گینه بیسائو",
            ],
            "Guyana" => [
                "fa" => "گویانا",
                "ps" => "گویانا",
            ],
            "Haiti" => [
                "fa" => "هائیتی",
                "ps" => "هائیتی",
            ],
            "Honduras" => [
                "fa" => "هندوراس",
                "ps" => "هندوراس",
            ],
            "Hungary" => [
                "fa" => "مجارستان",
                "ps" => "مجارستان",
            ],
            "Iceland" => [
                "fa" => "ایسلند",
                "ps" => "ایسلند",
            ],
            "India" => [
                "fa" => "هند",
                "ps" => "هند",
            ],
            "Indonesia" => [
                "fa" => "اندونزی",
                "ps" => "اندونزی",
            ],
            "Iran" => [
                "fa" => "ایران",
                "ps" => "ایران",
            ],
            "Iraq" => [
                "fa" => "عراق",
                "ps" => "عراق",
            ],
            "Ireland" => [
                "fa" => "ایرلند",
                "ps" => "ایرلند",
            ],
            "Israel" => [
                "fa" => "اسرائیل",
                "ps" => "اسرائیل",
            ],
            "Italy" => [
                "fa" => "ایتالیا",
                "ps" => "ایتالیا",
            ],
            "Jamaica" => [
                "fa" => "جامائیکا",
                "ps" => "جامائیکا",
            ],
            "Japan" => [
                "fa" => "جاپان",
                "ps" => "جاپان",
            ],
            "Jordan" => [
                "fa" => "اردن",
                "ps" => "اردن",
            ],
            "Kazakhstan" => [
                "fa" => "قزاقستان",
                "ps" => "قزاقستان",
            ],
            "Kenya" => [
                "fa" => "کنیا",
                "ps" => "کنیا",
            ],
            "Kiribati" => [
                "fa" => "کیریباتی",
                "ps" => "کیریباتی",
            ],
            "Kuwait" => [
                "fa" => "کویت",
                "ps" => "کویت",
            ],
            "Kyrgyzstan" => [
                "fa" => "قرقیزستان",
                "ps" => "قرقیزستان",
            ],
            "Laos" => [
                "fa" => "لاوس",
                "ps" => "لاوس",
            ],
            "Latvia" => [
                "fa" => "لتونی",
                "ps" => "لتونی",
            ],
            "Lebanon" => [
                "fa" => "لبنان",
                "ps" => "لبنان",
            ],
            "Lesotho" => [
                "fa" => "لسوتو",
                "ps" => "لسوتو",
            ],
            "Liberia" => [
                "fa" => "لیبریا",
                "ps" => "لیبریا",
            ],
            "Libya" => [
                "fa" => "لیبیا",
                "ps" => "لیبیا",
            ],
            "Liechtenstein" => [
                "fa" => "لیختن‌اشتاین",
                "ps" => "لیختن‌اشتاین",
            ],
            "Lithuania" => [
                "fa" => "لیتوانی",
                "ps" => "لیتوانی",
            ],
            "Luxembourg" => [
                "fa" => "لوکزامبورگ",
                "ps" => "لوکزامبورگ",
            ],
            "Madagascar" => [
                "fa" => "ماداگاسکار",
                "ps" => "ماداگاسکار",
            ],
            "Malawi" => [
                "fa" => "مالاوی",
                "ps" => "مالاوی",
            ],
            "Malaysia" => [
                "fa" => "مالزی",
                "ps" => "مالزی",
            ],
            "Maldives" => [
                "fa" => "مالدیو",
                "ps" => "مالدیو",
            ],
            "Mali" => [
                "fa" => "مالی",
                "ps" => "مالی",
            ],
            "Malta" => [
                "fa" => "مالت",
                "ps" => "مالت",
            ],
            "Marshall Islands" => [
                "fa" => "جزایر مارشال",
                "ps" => "جزایر مارشال",
            ],
            "Mauritania" => [
                "fa" => "موریطانی",
                "ps" => "موریطانی",
            ],
            "Mauritius" => [
                "fa" => "موریس",
                "ps" => "موریس",
            ],
            "Mexico" => [
                "fa" => "مکسیکو",
                "ps" => "مکسیکو",
            ],
            "Micronesia" => [
                "fa" => "میکرونزی",
                "ps" => "میکرونزی",
            ],
            "Moldova" => [
                "fa" => "مولداوی",
                "ps" => "مولداوی",
            ],
            "Monaco" => [
                "fa" => "موناكو",
                "ps" => "موناكو",
            ],
            "Mongolia" => [
                "fa" => "مغولستان",
                "ps" => "مغولستان",
            ],
            "Montenegro" => [
                "fa" => "مونته‌نگرو",
                "ps" => "مونته‌نگرو",
            ],
            "Morocco" => [
                "fa" => "مراکش",
                "ps" => "مراکش",
            ],
            "Mozambique" => [
                "fa" => "موزامبیک",
                "ps" => "موزامبیک",
            ],
            "Myanmar" => [
                "fa" => "میانمار",
                "ps" => "میانمار",
            ],
            "Namibia" => [
                "fa" => "نامیبیا",
                "ps" => "نامیبیا",
            ],
            "Nauru" => [
                "fa" => "ناورو",
                "ps" => "ناورو",
            ],
            "Nepal" => [
                "fa" => "نیپال",
                "ps" => "نیپال",
            ],
            "Netherlands" => [
                "fa" => "هلند",
                "ps" => "هلند",
            ],
            "New Zealand" => [
                "fa" => "نیوزیلند",
                "ps" => "نیوزیلند",
            ],
            "Nicaragua" => [
                "fa" => "نیکاراگوئه",
                "ps" => "نیکاراگوئه",
            ],
            "Niger" => [
                "fa" => "نیجر",
                "ps" => "نیجر",
            ],
            "Nigeria" => [
                "fa" => "نیجریا",
                "ps" => "نیجریا",
            ],
            "North Macedonia" => [
                "fa" => "مقدونیه شمالی",
                "ps" => "مقدونیه شمالی",
            ],
            "Norway" => [
                "fa" => "نروژ",
                "ps" => "نروژ",
            ],
            "Oman" => [
                "fa" => "عمان",
                "ps" => "عمان",
            ],
            "Pakistan" => [
                "fa" => "پاکستان",
                "ps" => "پاکستان",
            ],
            "Palau" => [
                "fa" => "پالائو",
                "ps" => "پالائو",
            ],
            "Palestine" => [
                "fa" => "فلسطین",
                "ps" => "فلسطین",
            ],
            "Panama" => [
                "fa" => "پاناما",
                "ps" => "پاناما",
            ],
            "Papua New Guinea" => [
                "fa" => "پاپوآ گینه نو",
                "ps" => "پاپوآ گینه نو",
            ],
            "Paraguay" => [
                "fa" => "پاراگوئه",
                "ps" => "پاراگوئه",
            ],
            "Peru" => [
                "fa" => "پرو",
                "ps" => "پرو",
            ],
            "Philippines" => [
                "fa" => "فیلیپین",
                "ps" => "فیلیپین",
            ],
            "Poland" => [
                "fa" => "لهستان",
                "ps" => "لهستان",
            ],
            "Portugal" => [
                "fa" => "پرتغال",
                "ps" => "پرتغال",
            ],
            "Qatar" => [
                "fa" => "قطر",
                "ps" => "قطر",
            ],
            "Romania" => [
                "fa" => "رومانی",
                "ps" => "رومانی",
            ],
            "Russia" => [
                "fa" => "روسیه",
                "ps" => "روسیه",
            ],
            "Rwanda" => [
                "fa" => "رواندا",
                "ps" => "رواندا",
            ],
            "Saint Kitts and Nevis" => [
                "fa" => "سنت کیتس و نویس",
                "ps" => "سنت کیتس و نویس",
            ],
            "Saint Lucia" => [
                "fa" => "سنت لوسیا",
                "ps" => "سنت لوسیا",
            ],
            "Saint Vincent and the Grenadines" => [
                "fa" => "سنت وینسنت و گرنادین",
                "ps" => "سنت وینسنت و گرنادین",
            ],
            "Samoa" => [
                "fa" => "ساموآ",
                "ps" => "ساموآ",
            ],
            "San Marino" => [
                "fa" => "سان مارینو",
                "ps" => "سان مارینو",
            ],
            "Sao Tome and Principe" => [
                "fa" => "سائوتومه و پرنسیپ",
                "ps" => "سائوتومه و پرنسیپ",
            ],
            "Saudi Arabia" => [
                "fa" => "عربستان سعودی",
                "ps" => "عربستان سعودی",
            ],
            "Senegal" => [
                "fa" => "سنگال",
                "ps" => "سنگال",
            ],
            "Serbia" => [
                "fa" => "صربستان",
                "ps" => "صربستان",
            ],
            "Seychelles" => [
                "fa" => "سیشل",
                "ps" => "سیشل",
            ],
            "Sierra Leone" => [
                "fa" => "سیرالئون",
                "ps" => "سیرالئون",
            ],
            "Singapore" => [
                "fa" => "سنگاپور",
                "ps" => "سنگاپور",
            ],
            "Slovakia" => [
                "fa" => "اسلواکی",
                "ps" => "اسلواکی",
            ],
            "Slovenia" => [
                "fa" => "اسلوونی",
                "ps" => "اسلوونی",
            ],
            "Solomon Islands" => [
                "fa" => "جزایر سلیمان",
                "ps" => "جزایر سلیمان",
            ],
            "Somalia" => [
                "fa" => "سومالی",
                "ps" => "سومالی",
            ],
            "South Africa" => [
                "fa" => "آفریقای جنوبی",
                "ps" => "آفریقای جنوبی",
            ],
            "South Korea" => [
                "fa" => "کره جنوبی",
                "ps" => "کره جنوبی",
            ],
            "South Sudan" => [
                "fa" => "جنوب سودان",
                "ps" => "جنوب سودان",
            ],
            "Spain" => [
                "fa" => "اسپانیا",
                "ps" => "اسپانیا",
            ],
            "Sri Lanka" => [
                "fa" => "سریلانکا",
                "ps" => "سریلانکا",
            ],
            "Sudan" => [
                "fa" => "سودان",
                "ps" => "سودان",
            ],
            "Suriname" => [
                "fa" => "سورینام",
                "ps" => "سورینام",
            ],
            "Sweden" => [
                "fa" => "سوئد",
                "ps" => "سوئد",
            ],
            "Switzerland" => [
                "fa" => "سویس",
                "ps" => "سویس",
            ],
            "Syria" => [
                "fa" => "سوریه",
                "ps" => "سوریه",
            ],
            "Tajikistan" => [
                "fa" => "تاجیکستان",
                "ps" => "تاجیکستان",
            ],
            "Tanzania" => [
                "fa" => "تانزانیا",
                "ps" => "تانزانیا",
            ],
            "Thailand" => [
                "fa" => "تایلند",
                "ps" => "تایلند",
            ],
            "Togo" => [
                "fa" => "توگو",
                "ps" => "توگو",
            ],
            "Tonga" => [
                "fa" => "تونگا",
                "ps" => "تونگا",
            ],
            "Trinidad and Tobago" => [
                "fa" => "ترینیداد و توباگو",
                "ps" => "ترینیداد و توباگو",
            ],
            "Tunisia" => [
                "fa" => "تونس",
                "ps" => "تونس",
            ],
            "Turkey" => [
                "fa" => "ترکیه",
                "ps" => "ترکیه",
            ],
            "Turkmenistan" => [
                "fa" => "ترکمنستان",
                "ps" => "ترکمنستان",
            ],
            "Tuvalu" => [
                "fa" => "تووالو",
                "ps" => "تووالو",
            ],
            "Uganda" => [
                "fa" => "اوگاندا",
                "ps" => "اوگاندا",
            ],
            "Ukraine" => [
                "fa" => "اوکراین",
                "ps" => "اوکراین",
            ],
            "United Arab Emirates" => [
                "fa" => "امارات متحده عربی",
                "ps" => "امارات متحده عربی",
            ],
            "United Kingdom" => [
                "fa" => "پادشاهی متحده",
                "ps" => "متحده ملک",
            ],
            "United States" => [
                "fa" => "ایالات متحده",
                "ps" => "متحده ایالات",
            ],
            "Uruguay" => [
                "fa" => "اورگوئه",
                "ps" => "اورگوئه",
            ],
            "Uzbekistan" => [
                "fa" => "ازبکستان",
                "ps" => "ازبکستان",
            ],
            "Vanuatu" => [
                "fa" => "وانواتو",
                "ps" => "وانواتو",
            ],
            "Vatican City" => [
                "fa" => "شهر واتیکان",
                "ps" => "شهر واتیکان",
            ],
            "Venezuela" => [
                "fa" => "ونزوئلا",
                "ps" => "ونزوئلا",
            ],
            "Vietnam" => [
                "fa" => "ویتنام",
                "ps" => "ویتنام",
            ],
            "Yemen" => [
                "fa" => "یمن",
                "ps" => "یمن",
            ],
            "Zambia" => [
                "fa" => "زامبیا",
                "ps" => "زامبیا",
            ],
            "Zimbabwe" => [
                "fa" => "زیمبابوه",
                "ps" => "زیمبابوه",
            ],
        ];
    }

}
