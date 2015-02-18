<?php

use Sami\Sami;
use Sami\Version\GitVersionCollection;
use Symfony\Component\Finder\Finder;

$iterator = Finder::create()
    ->files()
    ->name('*.php')
    ->exclude('Resources')
    ->exclude('Tests')
    ->in($dir = __DIR__.'/../src')
;

$versions = GitVersionCollection::create($dir)
    ->addFromTags('0.0.*')
    ->add('0.0.1-dev')
;

return new Sami($iterator, array(
    'theme'                => 'symfony',
    'versions'             => $versions,
    'title'                => '4373Alpha-Server API',
    'build_dir'            => __DIR__.'/../build/sf2/%version%',
    'cache_dir'            => __DIR__.'/../cache/sf2/%version%',
    // use a custom theme directory
    // 'template_dirs'        => array(__DIR__.'/themes/symfony'),
    'default_opened_level' => 2,
));