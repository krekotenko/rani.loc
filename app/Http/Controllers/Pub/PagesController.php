<?php

namespace App\Http\Controllers\Pub;

use App\Models\Page;
use App\Models\Program;
use App\Models\Faq;
use App\Models\Stories;
use App\Models\Story;
use App\Models\Testimonial;
use App\Services\ImageService;
use App\Services\Pages\PageCheckService;
use Illuminate\Http\Request;
use Spatie\Newsletter\NewsletterFacade as Newsletter;
use App\Models\Subscriber;
use App\Http\Controllers\Controller;

class PagesController extends SiteController
{
    public function __construct()
    {
        parent::__construct();
        //template
        $this->template = 'public::pages';
    }

    /**
     * Show the index page.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($alias = 'home')
    {

        /** @var Page $page */
        $page = Page::where('alias',$alias)->with('datas')->firstOrFail();

        $this->title = $page->title;
        $this->description = $page->description;

        //Programs
        $programs = [];
        $faqs = [];

        // free-30-minutes
        /**@var array $timezones*/
        $timezones = [];
        if($alias == 'free-30-minutes') {
            $locationsValue = ["", "Abidjan","Accra","Addis_Ababa","Algiers","Asmara","Bamako","Bangui","Banjul","Bissau","Blantyre","Brazzaville","Bujumbura","Cairo","Casablanca","Ceuta","Conakry","Dakar","Dar_es_Salaam","Djibouti","Douala","El_Aaiun","Freetown","Gaborone","Harare","Johannesburg","Juba","Kampala","Khartoum","Kigali","Kinshasa","Lagos","Libreville","Lome","Luanda","Lubumbashi","Lusaka","Malabo","Maputo","Maseru","Mbabane","Mogadishu","Monrovia","Nairobi","Ndjamena","Niamey","Nouakchott","Ouagadougou","Porto-Novo","Sao_Tome","Tripoli","Tunis","Windhoek","Adak","Anchorage","Anguilla","Antigua","Araguaina","Buenos_Aires","Catamarca","Cordoba","Jujuy","La_Rioja","Mendoza","Rio_Gallegos","Salta","San_Juan","San_Luis","Tucuman","Ushuaia","Aruba","Asuncion","Atikokan","Bahia","Bahia_Banderas","Barbados","Belem","Belize","Blanc-Sablon","Boa_Vista","Bogota","Boise","Cambridge_Bay","Campo_Grande","Cancun","Caracas","Cayenne","Cayman","Chicago","Chihuahua","Costa_Rica","Creston","Cuiaba","Curacao","Danmarkshavn","Dawson","Dawson_Creek","Denver","Detroit","Dominica","Edmonton","Eirunepe","El_Salvador","Fort_Nelson","Fortaleza","Glace_Bay","Godthab","Goose_Bay","Grand_Turk","Grenada","Guadeloupe","Guatemala","Guayaquil","Guyana","Halifax","Havana","Hermosillo","Indianapolis","Knox","Marengo","Petersburg","Tell_City","Vevay","Vincennes","Winamac","Inuvik","Iqaluit","Jamaica","Juneau","Louisville","Monticello","Kralendijk","La_Paz","Lima","Los_Angeles","Lower_Princes","Maceio","Managua","Manaus","Marigot","Martinique","Matamoros","Mazatlan","Menominee","Merida","Metlakatla","Mexico_City","Miquelon","Moncton","Monterrey","Montevideo","Montserrat","Nassau","New_York","Nipigon","Nome","Noronha","Beulah","Center","New_Salem","Ojinaga","Panama","Pangnirtung","Paramaribo","Phoenix","Port-au-Prince","Port_of_Spain","Porto_Velho","Puerto_Rico","Rainy_River","Rankin_Inlet","Recife","Regina","Resolute","Rio_Branco","Santarem","Santiago","Santo_Domingo","Sao_Paulo","Scoresbysund","Sitka","St_Barthelemy","St_Johns","St_Kitts","St_Lucia","St_Thomas","St_Vincent","Swift_Current","Tegucigalpa","Thule","Thunder_Bay","Tijuana","Toronto","Tortola","Vancouver","Whitehorse","Winnipeg","Yakutat","Yellowknife","Casey","Davis","DumontDUrville","Macquarie","Mawson","McMurdo","Palmer","Rothera","Syowa","Troll","Vostok","Longyearbyen","Aden","Almaty","Amman","Anadyr","Aqtau","Aqtobe","Ashgabat","Atyrau","Baghdad","Bahrain","Baku","Bangkok","Barnaul","Beirut","Bishkek","Brunei","Chita","Choibalsan","Colombo","Damascus","Dhaka","Dili","Dubai","Dushanbe","Famagusta","Gaza","Hebron","Ho_Chi_Minh","Hong_Kong","Hovd","Irkutsk","Jakarta","Jayapura","Jerusalem","Kabul","Kamchatka","Karachi","Kathmandu","Khandyga","Kolkata","Krasnoyarsk","Kuala_Lumpur","Kuching","Kuwait","Macau","Magadan","Makassar","Manila","Muscat","Nicosia","Novokuznetsk","Novosibirsk","Omsk","Oral","Phnom_Penh","Pontianak","Pyongyang","Qatar","Qyzylorda","Riyadh","Sakhalin","Samarkand","Seoul","Shanghai","Singapore","Srednekolymsk","Taipei","Tashkent","Tbilisi","Tehran","Thimphu","Tokyo","Tomsk","Ulaanbaatar","Urumqi","Ust-Nera","Vientiane","Vladivostok","Yakutsk","Yangon","Yekaterinburg","Yerevan","Azores","Bermuda","Canary","Cape_Verde","Faroe","Madeira","Reykjavik","South_Georgia","St_Helena","Stanley","Adelaide","Brisbane","Broken_Hill","Currie","Darwin","Eucla","Hobart","Lindeman","Lord_Howe","Melbourne","Perth","Sydney","Amsterdam","Andorra","Astrakhan","Athens","Belgrade","Berlin","Bratislava","Brussels","Bucharest","Budapest","Busingen","Chisinau","Copenhagen","Dublin","Gibraltar","Guernsey","Helsinki","Isle_of_Man","Istanbul","Jersey","Kaliningrad","Kiev","Kirov","Lisbon","Ljubljana","London","Luxembourg","Madrid","Malta","Mariehamn","Minsk","Monaco","Moscow","Oslo","Paris","Podgorica","Prague","Riga","Rome","Samara","San_Marino","Sarajevo","Saratov","Simferopol","Skopje","Sofia","Stockholm","Tallinn","Tirane","Ulyanovsk","Uzhgorod","Vaduz","Vatican","Vienna","Vilnius","Volgograd","Warsaw","Zagreb","Zaporozhye","Zurich","Antananarivo","Chagos","Christmas","Cocos","Comoro","Kerguelen","Mahe","Maldives","Mauritius","Mayotte","Reunion","Apia","Auckland","Bougainville","Chatham","Chuuk","Easter","Efate","Enderbury","Fakaofo","Fiji","Funafuti","Galapagos","Gambier","Guadalcanal","Guam","Honolulu","Johnston","Kiritimati","Kosrae","Kwajalein","Majuro","Marquesas","Midway","Nauru","Niue","Norfolk","Noumea","Pago_Pago","Palau","Pitcairn","Pohnpei","Port_Moresby","Rarotonga","Saipan","Tahiti","Tarawa","Tongatapu","Wake","Wallis","UTC"];
            $locationsKey = ["","Africa/Abidjan","Africa/Accra","Africa/Addis_Ababa","Africa/Algiers","Africa/Asmara","Africa/Bamako","Africa/Bangui","Africa/Banjul","Africa/Bissau","Africa/Blantyre","Africa/Brazzaville","Africa/Bujumbura","Africa/Cairo","Africa/Casablanca","Africa/Ceuta","Africa/Conakry","Africa/Dakar","Africa/Dar_es_Salaam","Africa/Djibouti","Africa/Douala","Africa/El_Aaiun","Africa/Freetown","Africa/Gaborone","Africa/Harare","Africa/Johannesburg","Africa/Juba","Africa/Kampala","Africa/Khartoum","Africa/Kigali","Africa/Kinshasa","Africa/Lagos","Africa/Libreville","Africa/Lome","Africa/Luanda","Africa/Lubumbashi","Africa/Lusaka","Africa/Malabo","Africa/Maputo","Africa/Maseru","Africa/Mbabane","Africa/Mogadishu","Africa/Monrovia","Africa/Nairobi","Africa/Ndjamena","Africa/Niamey","Africa/Nouakchott","Africa/Ouagadougou","Africa/Porto-Novo","Africa/Sao_Tome","Africa/Tripoli","Africa/Tunis","Africa/Windhoek","America/Adak","America/Anchorage","America/Anguilla","America/Antigua","America/Araguaina","America/Argentina/Buenos_Aires","America/Argentina/Catamarca","America/Argentina/Cordoba","America/Argentina/Jujuy","America/Argentina/La_Rioja","America/Argentina/Mendoza","America/Argentina/Rio_Gallegos","America/Argentina/Salta","America/Argentina/San_Juan","America/Argentina/San_Luis","America/Argentina/Tucuman","America/Argentina/Ushuaia","America/Aruba","America/Asuncion","America/Atikokan","America/Bahia","America/Bahia_Banderas","America/Barbados","America/Belem","America/Belize","America/Blanc-Sablon","America/Boa_Vista","America/Bogota","America/Boise","America/Cambridge_Bay","America/Campo_Grande","America/Cancun","America/Caracas","America/Cayenne","America/Cayman","America/Chicago","America/Chihuahua","America/Costa_Rica","America/Creston","America/Cuiaba","America/Curacao","America/Danmarkshavn","America/Dawson","America/Dawson_Creek","America/Denver","America/Detroit","America/Dominica","America/Edmonton","America/Eirunepe","America/El_Salvador","America/Fort_Nelson","America/Fortaleza","America/Glace_Bay","America/Godthab","America/Goose_Bay","America/Grand_Turk","America/Grenada","America/Guadeloupe","America/Guatemala","America/Guayaquil","America/Guyana","America/Halifax","America/Havana","America/Hermosillo","America/Indiana/Indianapolis","America/Indiana/Knox","America/Indiana/Marengo","America/Indiana/Petersburg","America/Indiana/Tell_City","America/Indiana/Vevay","America/Indiana/Vincennes","America/Indiana/Winamac","America/Inuvik","America/Iqaluit","America/Jamaica","America/Juneau","America/Kentucky/Louisville","America/Kentucky/Monticello","America/Kralendijk","America/La_Paz","America/Lima","America/Los_Angeles","America/Lower_Princes","America/Maceio","America/Managua","America/Manaus","America/Marigot","America/Martinique","America/Matamoros","America/Mazatlan","America/Menominee","America/Merida","America/Metlakatla","America/Mexico_City","America/Miquelon","America/Moncton","America/Monterrey","America/Montevideo","America/Montserrat","America/Nassau","America/New_York","America/Nipigon","America/Nome","America/Noronha","America/North_Dakota/Beulah","America/North_Dakota/Center","America/North_Dakota/New_Salem","America/Ojinaga","America/Panama","America/Pangnirtung","America/Paramaribo","America/Phoenix","America/Port-au-Prince","America/Port_of_Spain","America/Porto_Velho","America/Puerto_Rico","America/Rainy_River","America/Rankin_Inlet","America/Recife","America/Regina","America/Resolute","America/Rio_Branco","America/Santarem","America/Santiago","America/Santo_Domingo","America/Sao_Paulo","America/Scoresbysund","America/Sitka","America/St_Barthelemy","America/St_Johns","America/St_Kitts","America/St_Lucia","America/St_Thomas","America/St_Vincent","America/Swift_Current","America/Tegucigalpa","America/Thule","America/Thunder_Bay","America/Tijuana","America/Toronto","America/Tortola","America/Vancouver","America/Whitehorse","America/Winnipeg","America/Yakutat","America/Yellowknife","Antarctica/Casey","Antarctica/Davis","Antarctica/DumontDUrville","Antarctica/Macquarie","Antarctica/Mawson","Antarctica/McMurdo","Antarctica/Palmer","Antarctica/Rothera","Antarctica/Syowa","Antarctica/Troll","Antarctica/Vostok","Arctic/Longyearbyen","Asia/Aden","Asia/Almaty","Asia/Amman","Asia/Anadyr","Asia/Aqtau","Asia/Aqtobe","Asia/Ashgabat","Asia/Atyrau","Asia/Baghdad","Asia/Bahrain","Asia/Baku","Asia/Bangkok","Asia/Barnaul","Asia/Beirut","Asia/Bishkek","Asia/Brunei","Asia/Chita","Asia/Choibalsan","Asia/Colombo","Asia/Damascus","Asia/Dhaka","Asia/Dili","Asia/Dubai","Asia/Dushanbe","Asia/Famagusta","Asia/Gaza","Asia/Hebron","Asia/Ho_Chi_Minh","Asia/Hong_Kong","Asia/Hovd","Asia/Irkutsk","Asia/Jakarta","Asia/Jayapura","Asia/Jerusalem","Asia/Kabul","Asia/Kamchatka","Asia/Karachi","Asia/Kathmandu","Asia/Khandyga","Asia/Kolkata","Asia/Krasnoyarsk","Asia/Kuala_Lumpur","Asia/Kuching","Asia/Kuwait","Asia/Macau","Asia/Magadan","Asia/Makassar","Asia/Manila","Asia/Muscat","Asia/Nicosia","Asia/Novokuznetsk","Asia/Novosibirsk","Asia/Omsk","Asia/Oral","Asia/Phnom_Penh","Asia/Pontianak","Asia/Pyongyang","Asia/Qatar","Asia/Qyzylorda","Asia/Riyadh","Asia/Sakhalin","Asia/Samarkand","Asia/Seoul","Asia/Shanghai","Asia/Singapore","Asia/Srednekolymsk","Asia/Taipei","Asia/Tashkent","Asia/Tbilisi","Asia/Tehran","Asia/Thimphu","Asia/Tokyo","Asia/Tomsk","Asia/Ulaanbaatar","Asia/Urumqi","Asia/Ust-Nera","Asia/Vientiane","Asia/Vladivostok","Asia/Yakutsk","Asia/Yangon","Asia/Yekaterinburg","Asia/Yerevan","Atlantic/Azores","Atlantic/Bermuda","Atlantic/Canary","Atlantic/Cape_Verde","Atlantic/Faroe","Atlantic/Madeira","Atlantic/Reykjavik","Atlantic/South_Georgia","Atlantic/St_Helena","Atlantic/Stanley","Australia/Adelaide","Australia/Brisbane","Australia/Broken_Hill","Australia/Currie","Australia/Darwin","Australia/Eucla","Australia/Hobart","Australia/Lindeman","Australia/Lord_Howe","Australia/Melbourne","Australia/Perth","Australia/Sydney","Europe/Amsterdam","Europe/Andorra","Europe/Astrakhan","Europe/Athens","Europe/Belgrade","Europe/Berlin","Europe/Bratislava","Europe/Brussels","Europe/Bucharest","Europe/Budapest","Europe/Busingen","Europe/Chisinau","Europe/Copenhagen","Europe/Dublin","Europe/Gibraltar","Europe/Guernsey","Europe/Helsinki","Europe/Isle_of_Man","Europe/Istanbul","Europe/Jersey","Europe/Kaliningrad","Europe/Kiev","Europe/Kirov","Europe/Lisbon","Europe/Ljubljana","Europe/London","Europe/Luxembourg","Europe/Madrid","Europe/Malta","Europe/Mariehamn","Europe/Minsk","Europe/Monaco","Europe/Moscow","Europe/Oslo","Europe/Paris","Europe/Podgorica","Europe/Prague","Europe/Riga","Europe/Rome","Europe/Samara","Europe/San_Marino","Europe/Sarajevo","Europe/Saratov","Europe/Simferopol","Europe/Skopje","Europe/Sofia","Europe/Stockholm","Europe/Tallinn","Europe/Tirane","Europe/Ulyanovsk","Europe/Uzhgorod","Europe/Vaduz","Europe/Vatican","Europe/Vienna","Europe/Vilnius","Europe/Volgograd","Europe/Warsaw","Europe/Zagreb","Europe/Zaporozhye","Europe/Zurich","Indian/Antananarivo","Indian/Chagos","Indian/Christmas","Indian/Cocos","Indian/Comoro","Indian/Kerguelen","Indian/Mahe","Indian/Maldives","Indian/Mauritius","Indian/Mayotte","Indian/Reunion","Pacific/Apia","Pacific/Auckland","Pacific/Bougainville","Pacific/Chatham","Pacific/Chuuk","Pacific/Easter","Pacific/Efate","Pacific/Enderbury","Pacific/Fakaofo","Pacific/Fiji","Pacific/Funafuti","Pacific/Galapagos","Pacific/Gambier","Pacific/Guadalcanal","Pacific/Guam","Pacific/Honolulu","Pacific/Johnston","Pacific/Kiritimati","Pacific/Kosrae","Pacific/Kwajalein","Pacific/Majuro","Pacific/Marquesas","Pacific/Midway","Pacific/Nauru","Pacific/Niue","Pacific/Norfolk","Pacific/Noumea","Pacific/Pago_Pago","Pacific/Palau","Pacific/Pitcairn","Pacific/Pohnpei","Pacific/Port_Moresby","Pacific/Rarotonga","Pacific/Saipan","Pacific/Tahiti","Pacific/Tarawa","Pacific/Tongatapu","Pacific/Wake","Pacific/Wallis","UTC"];

            $timezones = array_combine($locationsKey,array_sort($locationsValue));
        }


        //Testimonials
        $testimonials = [];

        if (PageCheckService::isPage('')) {
            $testimonials = $page->testimonials;
            $testimonials->transform(function ($item) {
                $item->short_description = substr($item->description, 0, strpos(wordwrap($item->description, 100), "\n")). '...';
                return $item;
            });
        }

        if (PageCheckService::isPage('rapid-transformation')) {
            $programs = Program::all('name','tagline','alias','short_description','type','show_message');
            $faqs = Faq::all();
        }
        /** @var String $template */
        $template = 'public::include.pages-'.$page->alias;

        /** @var String $content */
        $content = view($template)->with(['timezones'=>$timezones,'page' => $page,'programs' => $programs,'faqs' => $faqs, 'testimonials' => $testimonials])->render();
        $this->vars = array_add($this->vars, 'content', $content);

        //render output
        return $this->renderOutput();
    }

    /**
     * @param string $alias
     * @return $this
     */
    public function getClientStories($alias='client-stories')
    {
        /** @var Page $page */
        $page = Page::where('alias',$alias)->with('datas')->withCount('testimonials')->firstOrFail();

        $this->title = $page->title;
        $this->description = $page->description;

        //Testimonials
        $testimonialsForSlider = Testimonial::getTestimonialsForSlider();

        $testimonials = $page->testimonialsForSection();
        $testimonials->transform(function ($item) {
            $item->short_description = substr($item->description, 0, strpos(wordwrap($item->description, 100), "\n")). '...';
            return $item;
        });

        $section = 1;

        if($page->testimonials_count <= 12) {
            $section = 0;
        }

        $testimonialsPart  = view('public::include.pages-testimonials-part')->with(['testimonials' => $testimonials,'section' => $section])->render();

        /** @var String $template */
        $template = 'public::include.pages-'.$page->alias;

        /** @var String $content */
        $content = view($template)->with(['page' => $page,'testimonialsForSlider' => $testimonialsForSlider,'testimonialsPart'=>$testimonialsPart])->render();
        $this->vars = array_add($this->vars, 'content', $content);

        //render output
        return $this->renderOutput();
    }

    public function getSection($section = 1,$alias = "client-stories")
    {
        /** @var Page $page */
        $page = Page::where('alias',$alias)->with('datas')->withCount('testimonials')->firstOrFail();

        $testimonials = $page->testimonialsForSection($section);
        $testimonials->transform(function ($item) {
            $item->short_description = substr($item->description, 0, strpos(wordwrap($item->description, 100), "\n")). '...';
            return $item;
        });

        if($page->testimonials_count/(12*$section) <= 1) {
            $section = 0;
        }

        $testimonialsPart  = view('public::include.pages-testimonials-part')->with(['testimonials' => $testimonials,'section' => $section])->render();


        return response()->json([
            'status' => 'success',
            'html' => $testimonialsPart
        ]);
    }

    public function storyStore(Request $request) {
        /** @var Story $comment */
        $story = new Story($request->except('_token','image_uploads'));

        /** @var array $photos */
        $photos = [];
        if(isset($request->image_uploads) && $request->hasFile('image_uploads')) {

            foreach ($request->image_uploads as $image) {

                /** @var string $result */
                $result = ImageService::handleUploadedImageEditor(
                    $image,
                    public_path() . '/storage/images/stories/'
                );
                array_push($photos,$result);
            }
        }

        //save story
        $story->image_uploads = json_encode($photos);
        $story->save();

        return response()->json([
            'status' => 'success'
        ]);
    }
    public function subscribe(Request $request) {
        $subscriber = new Subscriber($request->except('_token'));
        $subscriber->save();

        if ($request->freebies) {
            Newsletter::subscribe($request->email, ['FNAME'=>$request->name]);
        }

        if (!Newsletter::getLastError()) {
            return response()->json([
                'status' => 'success'
            ]);
        } else {
            return response()->json([
                'status' => 'error',
                'message' => 'The email already exists. Please use a different email!'
            ]);
        }
    }

    public function audioSubscribe(Request $request) {
        if ($request->email) {
            Newsletter::subscribe($request->email, [], 'subscribers_for_audio');
        }

        if (!Newsletter::getLastError()) {
            return response()->json([
                'status' => 'success'
            ]);
        } else {
            return response()->json([
                'status' => 'error',
                'message' => 'This email already subscribed!'
            ]);
        }
    }
}
