<?php namespace App\Http\dcClass;

use Illuminate\Contracts\Filesystem\Filesystem;
use Symfony\Component\DomCrawler\Crawler;

/**
 * Component selector for dc mis
 * Class dcComponentSelector
 */
class dcComponentSelector extends Crawler
{

    /**
     * component object, require file
     * @var \Illuminate\Contracts\Filesystem\Filesystem $fComponent
     */
    protected $fStorage = '';
    /**
     * components
     * @var array
     */
    protected $aComponents = array();
    /**
     * @var string
     */
    protected $sPathToComponents = '';

    /**
     * @param Filesystem $fStorage
     */
    public function attachComponentFilesystem(Filesystem $fStorage)
    {
        $this->fStorage = $fStorage;
    }

    /**
     * set path to components
     * @param String $sPathToComponents
     */
    public function setPathToComponents($sPathToComponents = null)
    {
        $this->sPathToComponents = $sPathToComponents;
    }

    /**
     * component arry('name'=>'','filename'=>'','demo'=>[],'css'=>[],'script'=>[] ...)
     * @param array $aComponent
     * @return bool
     */
    public function addComponent(array $aComponent)
    {
        if (is_array($aComponent)) {
            $this->aComponents[$aComponent['name']] = $aComponent;
            return true;
        }
        return false;
    }

    /**
     *  add metronic components
     * @param $sName
     * @param null $sFilename
     * @return array
     */
    public function analyseMetronicIntoComponents($sName, $sFilename = null)
    {
        $aComponent = array();
        $aComponent['name'] = $sName;
        // get filename
        $aComponent['filename'] = is_null($sFilename) ? $this->sPathToComponents . '/' . $sName . '.html' : $this->sPathToComponents . '/' . $sFilename;
        $this->addContent($this->fStorage->get($aComponent['filename']));
        // get css array
        $preFix = 'BEGIN GLOBAL MANDATORY STYLES';
        $this->filter('link[rel=stylesheet]')->each(function (Crawler $node) use (&$aComponent, &$preFix) {
            $domE = $node->getNode(0);
            if (str_contains($domE->previousSibling->nodeValue, 'BEGIN'))
                $preFix = trim($domE->previousSibling->nodeValue);
            $aComponent['metronicCss'][$preFix][] = $aComponent['css'][] = $domE->getAttribute("href");

        });
        // get script src list
        $preFix = 'BEGIN CORE PLUGINS';
        $this->filter('script[src]')->each(function (Crawler $node) use (&$aComponent, &$preFix) {
            $domE = $node->getNode(0);
            str_contains($domE->previousSibling->nodeValue, 'BEGIN') ?
                $preFix = trim($domE->previousSibling->nodeValue) : null;

            $aComponent['metronicScript'][$preFix][] = $aComponent['script'][] = $domE->getAttribute("src");
        });
        // get metronic init script
        $aComponent['MetronicInitScript'] = $this->filter('script:not(script[src])')->html();
        // get demo divs
        $aComponent['demo'] = $this->filter("div.page-bar")->nextAll()->each(function (Crawler $snode) {
            return $snode->html();
        });
        $this->addComponent($aComponent);
        return $aComponent;
    }

    /**
     * as ..
     * @param $sComponent
     * @return array
     */
    public function getMetronicScript($sComponent)
    {
        return isset($this->aComponents[$sComponent]['metronicScript']['BEGIN PAGE LEVEL PLUGINS']) ?
            $this->aComponents[$sComponent]['metronicScript']['BEGIN PAGE LEVEL PLUGINS'] :
            array();
    }

    /**
     * as ..
     * @param $sComponent
     * @return array
     */
    public function getMetronicCss($sComponent)
    {
        return isset($this->aComponents[$sComponent]['metronicCss']['BEGIN PAGE LEVEL STYLES']) ?
            $this->aComponents[$sComponent]['metronicCss']['BEGIN PAGE LEVEL STYLES'] :
            array();
    }

    /**
     * get all componet stuff as css script demo
     * @param $sComponent
     * @param string $sStuff
     * @return mixed
     */
    public function getAllStuff( $sStuff = 'demo',$sComponent)
    {
        return isset($this->aComponents[$sComponent][$sStuff]) ?
            $this->aComponents[$sComponent][$sStuff] :
            null;
    }

    /**
     * return init script
     * @param $sComponent
     * @return string
     */
    public function getMetronicInitScript($sComponent)
    {
        return isset($this->aComponents[$sComponent]['MetronicInitScript']) ?
            $this->aComponents[$sComponent]['MetronicInitScript'] :
            '';
    }
}
