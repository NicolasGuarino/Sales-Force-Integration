<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitd515ce36dbdb852c4d345b56175e7f5f
{
    public static $prefixLengthsPsr4 = array (
        'd' => 
        array (
            'devnick\\salesforce\\' => 19,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'devnick\\salesforce\\' => 
        array (
            0 => __DIR__ . '/../..' . '/src',
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInitd515ce36dbdb852c4d345b56175e7f5f::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitd515ce36dbdb852c4d345b56175e7f5f::$prefixDirsPsr4;

        }, null, ClassLoader::class);
    }
}
