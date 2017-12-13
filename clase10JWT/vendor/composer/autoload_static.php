<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit517398bf433031fd41d0a3df21c707a6
{
    public static $prefixLengthsPsr4 = array (
        'F' => 
        array (
            'Firebase\\JWT\\' => 13,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Firebase\\JWT\\' => 
        array (
            0 => __DIR__ . '/..' . '/firebase/php-jwt/src',
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit517398bf433031fd41d0a3df21c707a6::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit517398bf433031fd41d0a3df21c707a6::$prefixDirsPsr4;

        }, null, ClassLoader::class);
    }
}
