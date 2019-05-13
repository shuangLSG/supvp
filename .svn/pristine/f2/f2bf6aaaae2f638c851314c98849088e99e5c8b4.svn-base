<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class MyMemcache {

    private static $MC;
    private static $mem;

    public static function share() {
        if (self::$MC == null) {
            self::$MC = new MyMemcache();
        }
        if (self::$mem == null) {
            if (config_item("my_platform") == "ACE") {
                self::$mem = new Memcache;
                self::$mem->init();
            } else if (config_item("my_platform") == "OWN") {
                $CI = & get_instance();
                $CI->load->driver('cache');
                self::$mem = $CI->cache->memcached;
            }
        }
        return self::$MC;
    }

    public static function set($key, $value, $timeout) {
        if (config_item("my_platform") == "ACE") {
            self::$mem->set($key, $value, 0, $timeout);
        } else if (config_item("my_platform") == "OWN") {
            self::$mem->save($key, $value, $timeout,TRUE);
        }
    }

    public static function get($key) {
        return self::$mem->get($key);
    }

    public static function delete($key) {
        return self::$mem->delete($key);
    }

    public static function increment($key) {
        if (config_item("my_platform") == "ACE") {
            self::$mem->increment($key);
        } else if (config_item("my_platform") == "OWN") {
            self::$mem->increment($key);
        }
    }

    public static function decrement($key) {
        if (config_item("my_platform") == "ACE") {
            self::$mem->decrement($key);
        } else if (config_item("my_platform") == "OWN") {
            self::$mem->decrement($key);
        }
    }

    public static function clean() {
        if (config_item("my_platform") == "ACE") {
            self::$mem->clean();
        } else if (config_item("my_platform") == "OWN") {
            self::$mem->clean();
        }
    }

}
