<?php
namespace App;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
class Biological extends Model
{
    protected $primaryKey = 'ofd6bid';
    public static function boot()
    {
        parent::boot();
        static::creating(function($model)
        {
            $model->createdby = Auth::user()->id;
            $model->updatedby = Auth::user()->id;
            $model->ip_address=\Request::getClientIp();
        });
        static::updating(function($model)
        {
            $model->updatedby = Auth::user()->id;
            $model->ip_address=\Request::getClientIp();
        });
    }
    protected $fillable = [
        'ofd6bid',
        'exposedemployeename',
        'dateofexposure',
        'employeeid',
        'assignmentbiological',
        'shift',
        'primaryidconumber',
        'epcrincidentnum',
        //'exposureinjury',
        'frmsincidentnum',
        //'todaysdate',
        'truedecontaminate',
        'confirmsource',
        'bloodreport',
        'exposuretab',
        'truebagtag',
        'notifypss',
        'trueppe',
        'truedocumentdaybook',
        'potdecontaminate',
        'potbagtag',
        'potppe',
        'potdocumentdaybook',
        'exposure',
        'trueofd184',
        'potofd184',
        'applicationstatus',
        'checkbox1',
    'checkbox2'
        //'trueInjury',
        //'potInjury'
    ];
    public function setDateAccidentDate($input)
    {
        if ($input != null) {
            $this->attributes['dateofexposure'] = Carbon::createFromFormat('Y-m-d', $input)->format('Y-m-d');
        } else {
            $this->attributes['dateofexposure'] = null;
        }

    }
    public function attachment()
    {
        return $this->hasMany(\App\Attachment::class);
    }
    public function injury()
    {
        return $this->hasOne(\App\Injury::class);
    }
}