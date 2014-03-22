<?php

class Command extends \Eloquent {
    protected $fillable = [];
    
    // Relationship with Contact Model
    public function contacts() {
        return $this->hasMany('Contact');
    }
}