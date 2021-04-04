<?php

namespace App\Http\Controllers;

use App\Documentation;
use Symfony\Component\DomCrawler\Crawler;

class DocsController extends Controller
{
    /**
     * The documentation repository.
     *
     * @var \App\Documentation
     */
    protected $docs;

    protected $lang;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(Documentation $docs)
    {
        $this->docs = $docs;
    }

    /**
     * Show the root documentation page (/docs).
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function showRootPage()
    {
        $lang = app()->getLocale();

        return redirect($lang.'/docs/'.DEFAULT_VERSION);
    }

    /**
     * Show a documentation page.
     *
     * @param string      $version
     * @param string|null $page
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\View\View
     */
    public function show($lang, $version, $page = null)
    {
        app()->setLocale($lang);
        if (!$this->isVersion($version)) {
            return redirect($lang.'/docs/'.DEFAULT_VERSION.'/'.$version, 301);
        }

        if (!defined('CURRENT_VERSION')) {
            define('CURRENT_VERSION', $version);
        }

        $sectionPage = $page ?: 'installation';
        $content = $this->docs->get($version, $sectionPage);
        //dd('aa');


        if (is_null($content)) {
            $otherVersions = $this->docs->versionsContainingPage($page);

            return response()->view('docs', [
                'title' => 'Page '.$page.' not found',
                'index' => $this->docs->getIndex($version),
                'content' => view('docs-missing', [
                    'otherVersions' => $otherVersions,
                    'page' => $page,
                ]),
                'currentVersion' => $version,
                'versions' => Documentation::getDocVersions(),
                'currentSection' => $otherVersions->isEmpty() ? '' : '/'.$page,
                'canonical' => null,
                'lang' => $lang,
            ], 404);
        }

        $title = (new Crawler($content))->filterXPath('//h1');

        $section = '';

        if ($this->docs->sectionExists($version, $page)) {
            $section .= '/'.$page;
        } elseif (!is_null($page)) {
            return redirect('/'.$lang.'/docs/'.$version);
        }

        $canonical = null;

        if ($this->docs->sectionExists(DEFAULT_VERSION, $sectionPage)) {
            $canonical = 'docs/'.DEFAULT_VERSION.'/'.$sectionPage;
        }

        return view('docs', [
            'title' => count($title) ? $title->text() : null,
            'index' => $this->docs->getIndex($version),
            'content' => $content,
            'currentVersion' => $version,
            'versions' => Documentation::getDocVersions(),
            'currentSection' => $section,
            'canonical' => $canonical,
            'lang' => $lang,
        ]);
    }

    /**
     * Determine if the given URL segment is a valid version.
     *
     * @param string $version
     *
     * @return bool
     */
    protected function isVersion($version)
    {
        return array_key_exists($version, Documentation::getDocVersions());
    }
}
