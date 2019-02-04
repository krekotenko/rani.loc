<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class FreeSessionApplication extends Model
{
    protected $fillable = [
        "city",
        "firstname",
        "surname",
        "phone",
        "email",
        "occupation",
        "material_status",
        "mental_conditions",
        "doctor_name",
        "date_of_last_check",
        "past_medications",
        "addictions",
        "addictions_ta",
        "achieving_goals",
        "anorexia",
        "anxiety",
        "bulimia",
        "career",
        "childhood_problems",
        "concentration",
        "confidence",
        "compulsive_behavior",
        "depression",
        "exams",
        "eating_problems",
        "fears",
        "fertility",
        "guilt",
        "mental_health_issues",
        "motivation",
        "memory",
        "nerves",
        "pain_control",
        "panic_attacks",
        "phobias",
        "public_speaking",
        "relationships",
        "relaxation",
        "stress",
        "self_esteem",
        "sleep_problems",
        "sexual_problems",
        "other_issues",
        "other_issues_ta",
        "most_important_issue",
        "if_you_no_longer",
        "greatest_desire",
        "signature",
        "dob",
        "date_free_session",
        "facebook",
        "instagram",
        "whats_app",
        "wechat",
    ];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['date_free_session','dob','date_of_last_check'];

    /**
     * @return FreeSessionApplication
     */
    public function getStats() {

        return $this->select(DB::raw('
                                            sum(anorexia) as anorexia,
                                            sum(anxiety) as anxiety,
                                            sum(addictions) as addictions,
                                            sum(achieving_goals) as achieving_goals,
                                            sum(bulimia) as bulimia,
                                            sum(career) as career,
                                            sum(childhood_problems) as childhood_problems,
                                            sum(concentration) as concentration,
                                            sum(confidence) as confidence,
                                            sum(compulsive_behavior) as compulsive_behavior,
                                            sum(depression) as depression,
                                            sum(exams) as exams,
                                            sum(eating_problems) as eating_problems,
                                            sum(fears) as fears,
                                            sum(fertility) as fertility,
                                            sum(guilt) as guilt,
                                            sum(mental_health_issues) as mental_health_issues,
                                            sum(motivation) as motivation,
                                            sum(memory) as memory,
                                            sum(nerves) as nerves,
                                            sum(pain_control) as pain_control,
                                            sum(panic_attacks) as panic_attacks,
                                            sum(phobias) as phobias,
                                            sum(public_speaking) as public_speaking,
                                            sum(relationships) as relationships,
                                            sum(relaxation) as relaxation,
                                            sum(stress) as stress,
                                            sum(self_esteem) as self_esteem,
                                            sum(sleep_problems) as sleep_problems,
                                            sum(sexual_problems) as sexual_problems,
                                            sum(other_issues) as other_issues
                                           
                                            '))->first();
    }

    public function setDateFreeSessionAttribute($value)
    {
        $this->attributes['date_free_session'] = Carbon::createFromFormat("d.m.Y H:i:s",$value);
    }
    /*public function setDobAttribute($value)
    {
        $this->attributes['dob'] = Carbon::createFromFormat("d.m.Y",$value);
    }
    public function setDateOfLastCheckAttribute($value)
    {
        $this->attributes['date_of_last_check'] = Carbon::createFromFormat("d.m.Y",$value);
    }*/

}
