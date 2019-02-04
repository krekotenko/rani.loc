<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Testimonial extends Model
{
    protected $fillable = [
        "title",
        "titleH1",
        "description",
        "text",
        "client_name",
        "client_position",
        "location",
        "show_in_slider",
    ];

    static function scopeGetTestimonialsForSlider($query) {
        return $query->select('titleH1','description','img_1')->where('show_in_slider', '=', '1')->get();
    }

    public function pages() {
        return $this->belongsToMany('App\Models\Page', 'testimonial_position_related')/*->withPivot('position_id','section_id')*/;
    }

    public function programs() {
        return $this->belongsToMany('App\Models\Program', 'testimonial_position_related')/*->withPivot('position_id')*/;
    }
}
