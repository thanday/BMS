<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Events extends Model



{
        
    use HasFactory; 

    
    protected $table = 'events';

    protected $fillable = [
        'event_name',
        'refnum',
        'venue',
        'type',
        'qouted_type',
        'client',
        'focalname',
        'focalnum',
        'requestdate',
        'event_date',
        'event_stime',
        'event_etime',
       // 'psmchannel_id',
       // 'localchannel_id',
        'local_qtype',
        'techs_id',
        'live_set_date',
        'live_set_time',
        'link_medium',
        'techl_id',
        'live_attend_date',
        'live_attend_time',
        'live_start_time',
        'live_end_time',
        'sincharge_id',
        'feed_tested_user_id',

    ];


    public function users()
    {
        return $this->BelongsTo(User::class, 'techs_id');
    }

    public function users_live()
    {
        return $this->BelongsTo(User::class, 'techl_id');
    }

    public function users_incharge()
    {
        return $this->BelongsTo(User::class, 'sincharge_id');
    }

    public function users_feedtest()
    {
        return $this->BelongsTo(User::class, 'feed_tested_user_id');
    }

    public function tvchannel(){
       
        return $this->belongsToMany(Channels::class, 'event_channel')->withPivot('events_id', 'channels_id')->where('title', 'Local Channel');
    }

    public function psmtvchannel(){
       
        return $this->belongsToMany(Channels::class, 'event_channel')->withPivot('events_id', 'channels_id')->where('title', 'PSM Channel');
    }

}
