<?php

namespace Coalition;
// importing a global class
use ArrayObject;
use ArrayAccess;

class ConfigRepository extends ArrayObject implements ArrayAccess
{
    private $configArr = array();
    
    /**
     * ConfigRepository Constructor
     */
    public function __construct($arr = [])
    {
        $this->configArr = $arr;
    }

    /**
     * Determine whether the config array contains the given key
     *
     * @param string $key
     * @return bool
     */
    public function has($key)
    {
        return array_key_exists($key,$this->configArr);
    }

    /**
     * Set a value on the config array
     *
     * @param string $key
     * @param mixed  $value
     * @return \Coalition\ConfigRepository
     */
    public function set($key, $value)
    {
        $this->configArr[$key] = $value;
        return $this;
    }

    /**
     * Get an item from the config array
     *
     * If the key does not exist the default
     * value should be returned
     *
     * @param string     $key
     * @param null|mixed $default
     * @return mixed
     */
    public function get($key, $default = null)
    {
        if($this->has($key))
        {
            return $this->configArr[$key];
        }else{
            return $default;
        }
    }

    /**
     * Remove an item from the config array
     *
     * @param string $key
     * @return \Coalition\ConfigRepository
     */
    public function remove($key)
    {
        if ($this->configArr === null)
            return null;
        if($this->configArr[$key] === null)
            return null;

        // if($this->has($key))
        // {
            //array_slice($this->configArr,-1,1);
            unset($this->configArr[$key]);
        // }
        return $this;
    }

    /**
     * Load config items from a file or an array of files
     *
     * The file name should be the config key and the value
     * should be the return value from the file
     * 
     * @param array|string The full path to the files $files
     * @return void
     */
    public function load($files)
    {
        if (is_string($files)) {
            $filename = preg_replace('/\\.[^.\\s]{3,4}$/', '', $files);
            $basename = preg_replace('/^.+[\\\\\\/]/', '', $filename);
            $filename = preg_replace('/\\.[^.\\s]{3,4}$/', '', $basename);
            $this->set($filename, include $files);
        } else if (is_array($files)) {
            foreach ($files as $file) {
                $filename = preg_replace('/\\.[^.\\s]{3,4}$/', '', $file);
                $basename = preg_replace('/^.+[\\\\\\/]/', '', $filename);
                $filename = preg_replace('/\\.[^.\\s]{3,4}$/', '', $basename);
                $this->set($filename, include $file);            
            }
        }

    }

    /* implementation utils */
    public function offsetSet($offset, $value) {
        if (is_null($offset)) {
            $this->configArr[] = $value;
        } else {
            $this->configArr[$offset] = $value;
        }
    }

    public function offsetExists($offset) {
        return isset($this->configArr[$offset]);
    }

    public function offsetUnset($offset) {
        unset($this->configArr[$offset]);
    }

    public function offsetGet($offset) {
        return isset($this->configArr[$offset]) ? $this->configArr[$offset] : null;
    }
}