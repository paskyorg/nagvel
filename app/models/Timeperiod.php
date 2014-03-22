<?php

class Timeperiod extends \Eloquent {
    protected $fillable = [];
    
    // Relationship with Contact Model
    public function contacts() {
        return $this->hasMany('Contact');
    }
    
    // Relationship with Host Model
    public function hosts() {
        return $this->hasMany('Host');
    }

}