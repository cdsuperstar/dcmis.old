<?php namespace App\Http\dcClass;

use App\Http\Controllers\dcResController;
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
     * define in component
     */
    const PM_GLOBAL_MANDATORY_STYLES = 'GLOBAL MANDATORY STYLES';
    /**
     * define in component
     */
    const PM_PAGE_LEVEL_STYLES = 'PAGE LEVEL STYLES';
    /**
     * define in component
     */
    const PM_THEME_STYLES = 'THEME STYLES';
    /**
     * define in component
     */
    const PM_CORE_PLUGINS = 'CORE PLUGINS';
    /**
     * define in component
     */
    const PM_PAGE_LEVEL_PLUGINS = 'PAGE LEVEL PLUGINS';
    /**
     * define in component
     */
    const PM_PAGE_LEVEL_SCRIPTS = 'PAGE LEVEL SCRIPTS';
    /**
     * define in component
     */
    const PM_PAGE_CONTENT = 'PAGE CONTENT';
    /**
     * define in component
     */
    const PM_PAGE_INIT_SCRIPT = 'PAGE INIT SCRIPT';

    /**
     * define in angular index
     */
    const PM_CORE_JQUERY_PLUGINS = 'CORE JQUERY PLUGINS';
    /**
     * define in angular index
     */
    const PM_CORE_ANGULARJS_PLUGINS = 'CORE ANGULARJS PLUGINS';
    /**
     * define in angular index
     */
    const PM_APP_LEVEL_ANGULARJS_SCRIPTS = 'APP LEVEL ANGULARJS SCRIPTS';
    /**
     * define in angular index
     */
    const PM_BEGIN_APP_LEVEL_JQUERY_SCRIPTS = 'BEGIN APP LEVEL JQUERY SCRIPTS';


    /**
     *  find element list from two point
     * @param array $aTwoPoint
     * @return Crawler
     */
    private function xpathFinder(array $aTwoPoint)
    {
        return $this->filterXPath("//*[self::* or self::comment()]
                [preceding-sibling::comment()[contains(.,'" . $aTwoPoint[0] . "')]]
                [following-sibling::comment()[contains(.,'" . $aTwoPoint[1] . "')]]");
    }

    /**
     *  add metronic components
     * @param $sName
     * @param null $sFilename
     * @return array
     */
    public function analyseMetronicIntoComponents($sName, $sFilename = null)
    {
        $aComponentCssLable = [
            $this::PM_GLOBAL_MANDATORY_STYLES => ['BEGIN GLOBAL MANDATORY STYLES', 'END GLOBAL MANDATORY STYLES'],
            $this::PM_PAGE_LEVEL_STYLES => ['BEGIN PAGE LEVEL STYLES', 'END PAGE LEVEL STYLES'],
            $this::PM_THEME_STYLES => ['BEGIN THEME STYLES', 'END THEME STYLES']
        ];
        $aComponentJsLable = [
            $this::PM_CORE_PLUGINS => ['BEGIN CORE PLUGINS', 'END CORE PLUGINS'],
            $this::PM_PAGE_LEVEL_PLUGINS => ['BEGIN PAGE LEVEL PLUGINS', 'END PAGE LEVEL PLUGINS'],
            $this::PM_PAGE_LEVEL_SCRIPTS => ['BEGIN PAGE LEVEL SCRIPTS', 'END PAGE LEVEL SCRIPTS']
        ];
        $aAngularLable = [
            $this::PM_CORE_JQUERY_PLUGINS => ['BEGIN CORE JQUERY PLUGINS', 'END CORE JQUERY PLUGINS'],
            $this::PM_CORE_ANGULARJS_PLUGINS => ['BEGIN CORE ANGULARJS PLUGINS', 'END CORE ANGULARJS PLUGINS'],
            $this::PM_APP_LEVEL_ANGULARJS_SCRIPTS => ['BEGIN APP LEVEL ANGULARJS SCRIPTS', 'END APP LEVEL ANGULARJS SCRIPTS'],
            $this::PM_BEGIN_APP_LEVEL_JQUERY_SCRIPTS => ['BEGIN APP LEVEL JQUERY SCRIPTS', 'END APP LEVEL JQUERY SCRIPTS']
        ];
        $aComponent = array();
        // set component name
        $aComponent['name'] = $sName;
        // get angular js
        if ($this->fStorage->exists($this->sPathToComponents . '/angularjs/index.html')) {
            $this->clear();
            $this->addContent($this->fStorage->get($this->sPathToComponents . '/angularjs/index.html'));
            foreach ($aAngularLable as $sKey => $aSubLable) {
                $this->xpathFinder($aSubLable)->each(
                    function (Crawler $domE) use (&$aComponent, $sKey) {
                        $aComponent['Metronic'][$sKey][] = $aComponent['angularScript'][] = $domE->getNode(0)->getAttribute("src");
                    }
                );
            }
        }
        // get filename
        $aComponent['filename'] = is_null($sFilename) ? $this->sPathToComponents . '/' . $sName . '.html' : $this->sPathToComponents . '/' . $sFilename;
        if ($this->fStorage->exists($aComponent['filename'])) {
            $this->clear();
            $this->addContent($this->fStorage->get($aComponent['filename']));
            foreach ($aComponentJsLable as $sKey => $aSubLable) {
                $this->xpathFinder($aSubLable)->each(
                    function (Crawler $domE) use (&$aComponent, $sKey) {
                        $aComponent['Metronic'][$sKey][] = $aComponent['script'][] = $domE->getNode(0)->getAttribute("src");
                    }
                );
            }
            foreach ($aComponentCssLable as $sKey => $aSubLable) {
                $this->xpathFinder($aSubLable)->each(
                    function (Crawler $domE) use (&$aComponent, $sKey) {
                        $sTmps = $domE->getNode(0)->getAttribute("href");
                        if ($sTmps == 'http://fonts.useso.com/css?family=Open+Sans:400,300,600,700&subset=all')
                            $sTmps = '/css/OpenSans.css';
                        $aComponent['Metronic'][$sKey][] = $aComponent['css'][] = $sTmps;
                    }
                );
            }
            // get demo from component
            $aComponent['Metronic'][$this::PM_PAGE_CONTENT] = $aComponent['demo'] = $this->filter("div.page-bar")->nextAll()->each(function (Crawler $snode) {
                return $snode->html();
            });

            // get metronic init script
            $aComponent['Metronic'][$this::PM_PAGE_INIT_SCRIPT][] = $aComponent['initScript'][] = $this->filter('script:not(script[src])')->html();

        }

        $this->addComponent($aComponent);
        return $aComponent;
    }

    /**
     *  requre component name , stuf such as ::PM_PAGE_CONTENT ...
     * @param $sComponent
     * @param $sStuf
     * @return array
     */
    public function getMetronicStuffs($sComponent, $sStuf)
    {
        return $this->aComponents[$sComponent]['Metronic'][$sStuf];
    }

    /**
     * get unique stuff as script,css,demo,initScript
     * @param $sStuff
     * @return array
     */
    public function getAllUniqueStuff($sStuff)
    {
        $aTmp = array();
        foreach ($this->aComponents as $aComp) {
            if (isset($aComp[$sStuff])) {
                $aTmp = array_merge($aTmp, $aComp[$sStuff]);
            }
        }

        return
            array_unique($aTmp);
    }
}


