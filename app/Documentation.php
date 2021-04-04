<?php

namespace App;

use Illuminate\Contracts\Cache\Repository as Cache;
use Illuminate\Filesystem\Filesystem;

class Documentation
{
    /**
     * The filesystem implementation.
     *
     * @var \Illuminate\Filesystem\Filesystem
     */
    protected $files;

    /**
     * The cache implementation.
     *
     * @var \Illuminate\Contracts\Cache\Repository
     */
    protected $cache;

    /**
     * Create a new documentation instance.
     *
     * @return void
     */
    public function __construct(Filesystem $files, Cache $cache)
    {
        $this->files = $files;
        $this->cache = $cache;
        $this->lang = app()->getLocale();
        $this->doc = config('xra.doc');
    }

    public function setLang($lang){
        $this->lang = $lang; 
    }

    /**
     * Get the documentation index page.
     *
     * @param string $version
     *
     * @return string|null
     */
    public function getIndex($version)
    {
        //$cache_key = $this->doc.'.'.$this->lang.'.docs.'.$version.'.index'.'2';
        $cache_key = $this->doc.'.'.app()->getLocale().'.docs.'.$version.'.index';

        return $this->cache->remember($cache_key, 5, function () use ($version) {
            //$path = base_path('resources/docs/'.$this->doc.'/'.$this->lang.'/'.$version.'/documentation.md');
            $path = base_path('resources/docs/'.$this->doc.'/'.app()->getLocale().'/'.$version.'/documentation.md');
            
            if ($this->files->exists($path)) {
                return $this->replaceLinks($version, (new Parsedown())->text($this->files->get($path)));
            }

            return null;
        });
    }

    /**
     * Get the given documentation page.
     *
     * @param string $version
     * @param string $page
     *
     * @return string|null
     */
    public function get($version, $page)
    {
        //$cache_key = $this->doc.'.'.$this->lang.'.docs.'.$version.'.index'.'1';
        $cache_key = $this->doc.'.'.$this->lang.'.docs.'.$version.'.index';

        return $this->cache->remember($cache_key, 5, function () use ($version, $page) {
            //$path = base_path('resources/docs/'.$this->doc.'/'.$this->lang.'/'.$version.'/'.$page.'.md');
            $path = base_path('resources/docs/'.$this->doc.'/'.app()->getLocale().'/'.$version.'/'.$page.'.md');

        if ($this->files->exists($path)) {
                return $this->replaceLinks($version, (new Parsedown())->text($this->files->get($path)));
            }

            return null;
        });
    }

    /**
     * Replace the version place-holder in links.
     *
     * @param string $version
     * @param string $content
     *
     * @return string
     */
    public static function replaceLinks($version, $content)
    {
        $lang = app()->getLocale();
        $content = str_replace('{{version}}', $version, $content);
        $content = str_replace('{{lang}}', $lang, $content);

        return $content;
    }

    /**
     * Check if the given section exists.
     *
     * @param string $version
     * @param string $page
     *
     * @return boolean
     */
    public function sectionExists($version, $page)
    {
        return $this->files->exists(
            base_path('resources/docs/'.$this->doc.'/'.$this->lang.'/'.$version.'/'.$page.'.md')
        );
    }

    /**
     * Determine which versions a page exists in.
     *
     * @param string $page
     *
     * @return \Illuminate\Support\Collection
     */
    public function versionsContainingPage($page)
    {
        return collect(static::getDocVersions())
            ->filter(function ($version) use ($page) {
                return $this->sectionExists($version, $page);
            });
    }

    /**
     * Get the publicly available versions of the documentation.
     *
     * @return array
     */
    public static function getDocVersions()
    {
        return [
            'master' => 'Master',
            '8.x' => '8.x',
            '7.x' => '7.x',
            '6.x' => '6.x',
            // '6.0' => '6.0',
            '5.8' => '5.8',
            '5.7' => '5.7',
            '5.6' => '5.6',
            '5.5' => '5.5',
            '5.4' => '5.4',
            '5.3' => '5.3',
            '5.2' => '5.2',
            '5.1' => '5.1',
            '5.0' => '5.0',
            '4.2' => '4.2',
        ];
    }
}
