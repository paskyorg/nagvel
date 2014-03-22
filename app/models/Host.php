<?php

class Host extends \Eloquent {
    protected $fillable = [];
        
    // Relationships with Timeperiod Model
    public function checkPeriod() {
        return $this->belongsTo('Timeperiod', 'check_period');
    }
    public function notificationPeriod() {
        return $this->belongsTo('Timeperiod', 'notification_period');
    }
}