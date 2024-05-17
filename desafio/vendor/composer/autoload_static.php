<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit6dbc50dbc05f57bd62a2a29f42c9c1ac
{
    public static $prefixLengthsPsr4 = array (
        'C' => 
        array (
            'Classes\\' => 8,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Classes\\' => 
        array (
            0 => __DIR__ . '/../..' . '/classes',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit6dbc50dbc05f57bd62a2a29f42c9c1ac::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit6dbc50dbc05f57bd62a2a29f42c9c1ac::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit6dbc50dbc05f57bd62a2a29f42c9c1ac::$classMap;

        }, null, ClassLoader::class);
    }
}
