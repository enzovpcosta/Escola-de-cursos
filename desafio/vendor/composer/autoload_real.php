<?php

// autoload_real.php @generated by Composer

class ComposerAutoloaderInit6dbc50dbc05f57bd62a2a29f42c9c1ac
{
    private static $loader;

    public static function loadClassLoader($class)
    {
        if ('Composer\Autoload\ClassLoader' === $class) {
            require __DIR__ . '/ClassLoader.php';
        }
    }

    /**
     * @return \Composer\Autoload\ClassLoader
     */
    public static function getLoader()
    {
        if (null !== self::$loader) {
            return self::$loader;
        }

        spl_autoload_register(array('ComposerAutoloaderInit6dbc50dbc05f57bd62a2a29f42c9c1ac', 'loadClassLoader'), true, true);
        self::$loader = $loader = new \Composer\Autoload\ClassLoader(\dirname(__DIR__));
        spl_autoload_unregister(array('ComposerAutoloaderInit6dbc50dbc05f57bd62a2a29f42c9c1ac', 'loadClassLoader'));

        require __DIR__ . '/autoload_static.php';
        call_user_func(\Composer\Autoload\ComposerStaticInit6dbc50dbc05f57bd62a2a29f42c9c1ac::getInitializer($loader));

        $loader->register(true);

        return $loader;
    }
}