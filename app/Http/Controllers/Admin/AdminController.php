<?php

namespace App\Http\Controllers\Admin;

use App\Models\Setting;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Menu;

class AdminController extends Controller
{
    //var for template
    protected $vars = array();
    //var for title page
    protected $title = FALSE;

    protected $description = FALSE;
    //var for template
    protected $template = FALSE;

    /**
     * AdminController constructor.
     */
    public function __construct() {
        $this->template = 'administrator::pages';
    }

    /**
     * @return $this
     */
    protected function renderOutput() {
        //render view
        $menu = $this->getMenu();
        $photo = Setting::where('field','system_photo')->first()->value;

        $sidebar = view('administrator::layouts.parts.sidebar')->with(['menu'=>$menu, 'photo' => $photo])->render();
        $this->vars = array_add($this->vars, 'sidebar', $sidebar);

        return view($this->template)->with($this->vars);
    }

    public function getMenu()
    {
        return Menu::make('adminMenu', function ($menu) {
            $menu->add('Content','#')->data('group', true);
            $menu->add('Pages', array('route' => 'pages.index'))->prepend('<i class="icon-home4"></i>');

            $menu->add('Client applications','#')->data('group', true);
            $menu->add('Contact applications', array('route' => 'contact-applications.index'))->prepend('<i class="icon-home4"></i>');
            $menu->add('Free session applications', array('route' => 'free-applications.index'))->prepend('<i class="icon-home4"></i>');
            $menu->add('Decision making tool', array('route' => 'ultimate-desicions.index'))->prepend('<i class="icon-home4"></i>');

            $menu->add('Tests results','#')->data('group', true);
            $menu->add('Tests results', array('route' => 'tests-results.index'))->prepend('<i class="icon-home4"></i>');

            $menu->add('Programs','#')->data('group', true);
            $menu->add('Programs', array('route' => 'programs.index'))->prepend('<i class="icon-home4"></i>');
            $menu->add('FAQ', array('route' => 'faq.index'))->prepend('<i class="icon-home4"></i>');
            $menu->add('Growth for groups Applications', array('route' => 'power-transformation.index'))->prepend('<i class="icon-home4"></i>');

            $menu->add('Testimonials','#')->data('group', true);
            $menu->add('Testimonials', array('route' => 'testimonials.index'))->prepend('<i class="icon-home4"></i>');

            $menu->add('Blog','#')->data('group', true);
            $menu->add('Posts', array('route' => 'blogs.index'))->prepend('<i class="icon-home4"></i>');
            $menu->add('Comments', array('route' => 'blogs-comments.index'))->prepend('<i class="icon-home4"></i>');

            $menu->add('System','#')->data('group', true);
            $menu->add('Settings', array('route' => 'settings.index'))->prepend('<i class="icon-home4"></i>');
        });
    }

}
