<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit186228d9c3ada4419e73e2ac09c86827
{
    public static $prefixLengthsPsr4 = array (
        'f' => 
        array (
            'framework\\' => 10,
        ),
        'a' => 
        array (
            'app\\' => 4,
        ),
        'R' => 
        array (
            'RedBeanPHP\\' => 11,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'framework\\' => 
        array (
            0 => __DIR__ . '/..' . '/framework/core',
        ),
        'app\\' => 
        array (
            0 => __DIR__ . '/../..' . '/app',
        ),
        'RedBeanPHP\\' => 
        array (
            0 => __DIR__ . '/..' . '/gabordemooij/redbean/RedBeanPHP',
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit186228d9c3ada4419e73e2ac09c86827::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit186228d9c3ada4419e73e2ac09c86827::$prefixDirsPsr4;

        }, null, ClassLoader::class);
    }
}
