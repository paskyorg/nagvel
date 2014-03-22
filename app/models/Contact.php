<?php

class Contact extends \Eloquent {
    protected $fillable = [];
    
    // Relationships with Timeperiod Model
    public function hostNotificationPeriod() {
        return $this->belongsTo('Timeperiod', 'host_notification_period');
    }
    public function serviceNotificationPeriod() {
        return $this->belongsTo('Timeperiod', 'service_notification_period');
    }
    
    // Relationships with Command Model
    public function hostNotificationCommands() {
        return $this->belongsTo('Command', 'host_notification_commands');
    }
    public function serviceNotificationCommands() {
        return $this->belongsTo('Command', 'service_notification_commands');
    }
}