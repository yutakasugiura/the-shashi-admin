<?php
class Config {

    protected static $directory;

    public static function setConfigDirectory($directory) {
        self::$directory = $directory;
    }

    public static function getConfigDirectory() {
        return rtrim(self::$directory, '/\\');
    }

    public static function get($s) {
        $values = preg_split('/\./', $s, -1, PREG_SPLIT_NO_EMPTY);
        $key = array_pop($values);
        $file = 'auth.php';
        $path = (!empty($values)) ? implode(DIRECTORY_SEPARATOR, $values) .
            DIRECTORY_SEPARATOR : '';
        $base_dir = self::getConfigDirectory() . DIRECTORY_SEPARATOR;
        $config = include($base_dir . $path . $file);

        var_dump($config);
        var_dump('sssssssssssssssss');
        return $config[$key];
    }
}