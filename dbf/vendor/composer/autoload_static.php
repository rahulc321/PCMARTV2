<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitdc171ca4758711667f69b6abc015fd8d
{
    public static $prefixLengthsPsr4 = array (
        'X' => 
        array (
            'XBase\\' => 6,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'XBase\\' => 
        array (
            0 => __DIR__ . '/..' . '/hisamu/php-xbase/src/XBase',
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInitdc171ca4758711667f69b6abc015fd8d::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitdc171ca4758711667f69b6abc015fd8d::$prefixDirsPsr4;

        }, null, ClassLoader::class);
    }
}
