<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitf77f6320977e7355ddd4cca75eec818b
{
    public static $prefixLengthsPsr4 = array (
        'D' => 
        array (
            'Doraemon\\' => 9,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Doraemon\\' => 
        array (
            0 => __DIR__ . '/../..' . '/../c_doraemon',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInitf77f6320977e7355ddd4cca75eec818b::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitf77f6320977e7355ddd4cca75eec818b::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInitf77f6320977e7355ddd4cca75eec818b::$classMap;

        }, null, ClassLoader::class);
    }
}
