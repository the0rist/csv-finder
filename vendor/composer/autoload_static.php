<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitc5d4a05fcd299aa271fb8b02b27d9327
{
    public static $prefixLengthsPsr4 = array (
        'a' => 
        array (
            'app\\' => 4,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'app\\' => 
        array (
            0 => __DIR__ . '/../..' . '/src',
        ),
    );

    public static $classMap = array (
        'app\\src\\ClientSearch' => __DIR__ . '/../..' . '/src/ClientSearch.php',
        'app\\src\\repository\\DataParserInterface' => __DIR__ . '/../..' . '/src/repository/DataParserInterface.php',
        'app\\src\\repository\\RepositoryInterface' => __DIR__ . '/../..' . '/src/repository/RepositoryInterface.php',
        'app\\src\\repository\\csv\\CsvDataParser' => __DIR__ . '/../..' . '/src/repository/csv/CsvDataParser.php',
        'app\\src\\repository\\csv\\CsvRepository' => __DIR__ . '/../..' . '/src/repository/csv/CsvRepository.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInitc5d4a05fcd299aa271fb8b02b27d9327::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitc5d4a05fcd299aa271fb8b02b27d9327::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInitc5d4a05fcd299aa271fb8b02b27d9327::$classMap;

        }, null, ClassLoader::class);
    }
}