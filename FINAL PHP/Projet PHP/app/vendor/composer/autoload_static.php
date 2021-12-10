<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit1faf96cf5aa9dfa6397d5209f1ffebda
{
    public static $prefixLengthsPsr4 = array (
        'A' => 
        array (
            'App\\' => 4,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'App\\' => 
        array (
            0 => __DIR__ . '/../..' . '/src',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit1faf96cf5aa9dfa6397d5209f1ffebda::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit1faf96cf5aa9dfa6397d5209f1ffebda::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit1faf96cf5aa9dfa6397d5209f1ffebda::$classMap;

        }, null, ClassLoader::class);
    }
}
