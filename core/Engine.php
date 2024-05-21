<?php


class Engine {
    
    public function createDatabase($name, $settings) {
        $settings_output = json_decode($settings);
        return $settings_output;
    }
}