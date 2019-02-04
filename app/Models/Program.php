<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Program extends Model
{
    protected $fillable = [
        'title',
        'titleH1',
        'description',
        'text',
        'alias',
        'icon_block_title',
        'icon_text_1',
        'icon_text_2',
        'icon_text_3',
        'icon_text_4',
        'icon_text_5',
        'icon_text_6',
        'who_title_1',
        'who_text_1',
        'who_title_2',
        'who_text_2',
        'who_title_3',
        'who_text_3',
        'who_title_4',
        'who_text_4',
        'who_title_5',
        'who_text_5',
        'when_title_1',
        'when_text_1',
        'when_title_2',
        'when_text_2',
        'when_title_3',
        'when_text_3',
        'sets_title_1',
        'sets_text_1',
        'sets_title_2',
        'sets_text_2',
        'sets_title_3',
        'sets_text_3',
        'sets_title_4',
        'sets_text_4',
        'button_text',
        'button_inner_text',
        'button_link',
        'link_image_1',
        'url_page_1',
        'link_image_2',
        'url_page_2',
        'link_image_3',
        'url_page_3',
        'show_calculator',
        'show_message',
        'name',
        'type',
        'tagline',
        'short_description',
        'background_img',
        'title_green',
        'subtitle',

    ];

    public function testimonials() {
        return $this->belongsToMany('App\Models\Testimonial', 'testimonial_position_related', 'program_id')->withPivot('position_id');
    }

    public function getRouteKeyName()
    {
        if(\Route::current()->getPrefix() == "/administrator") {
            return 'id';
        }
        return 'alias';
    }
}
