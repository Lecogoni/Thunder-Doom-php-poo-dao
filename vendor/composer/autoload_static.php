<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitc6ef927b4beffbabc70c37c4a3202e95
{
    public static $prefixLengthsPsr4 = array (
        'B' => 
        array (
            'Beweb\\Td\\Models\\Interfaces\\' => 27,
            'Beweb\\Td\\Models\\Impl\\Race\\' => 26,
            'Beweb\\Td\\Models\\Impl\\Job\\' => 25,
            'Beweb\\Td\\Models\\' => 16,
            'Beweb\\Td\\' => 9,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Beweb\\Td\\Models\\Interfaces\\' => 
        array (
            0 => __DIR__ . '/../..' . '/src/Models/Interfaces',
        ),
        'Beweb\\Td\\Models\\Impl\\Race\\' => 
        array (
            0 => __DIR__ . '/../..' . '/src/Models/Impl',
        ),
        'Beweb\\Td\\Models\\Impl\\Job\\' => 
        array (
            0 => __DIR__ . '/../..' . '/src/Models/Impl',
        ),
        'Beweb\\Td\\Models\\' => 
        array (
            0 => __DIR__ . '/../..' . '/src/Models',
        ),
        'Beweb\\Td\\' => 
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
            $loader->prefixLengthsPsr4 = ComposerStaticInitc6ef927b4beffbabc70c37c4a3202e95::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitc6ef927b4beffbabc70c37c4a3202e95::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInitc6ef927b4beffbabc70c37c4a3202e95::$classMap;

        }, null, ClassLoader::class);
    }
}
