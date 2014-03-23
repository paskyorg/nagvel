<?php

class Service extends \Eloquent {
    protected $fillable = [];
    
    // Relationships with Command Model
    public function checkCommand() {
        return $this->belongsTo('Command', 'check_command');
    }

    // Relationships with Host Model
    public function host() {
        return $this->belongsTo('Host', 'host_name');
    }
    
    // Relationships with Timeperiod Model
    public function checkPeriod() {
        return $this->belongsTo('Timeperiod', 'check_period');
    }
    public function notificationPeriod() {
        return $this->belongsTo('Timeperiod', 'notification_period');
    }
}