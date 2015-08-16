<?php

namespace App\Http\Controllers;

use App\Http\dcClass\dcComponentSelector;
use Illuminate\Http\Request;

use App\Http\Requests;

/**
 * Class dcResController
 * @package App\Http\Controllers
 */
class dcResController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request $request
     * @param  int $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }

    public function getEdition()
    {
        return view('pages.edition');
    }

    public function dcComponentSelector($comId)
    {
        $disk = \Storage::disk('local_public');
        $mycomp = new dcComponentSelector();
        $mycomp->attachComponentFilesystem($disk);
        $mycomp->setPathToComponents('theme/templates/admin');
        $aTmp = explode('+', $comId);
        foreach ($aTmp as $sComp) {
            $mycomp->analyseMetronicIntoComponents($sComp);
        }
        return $mycomp;
    }

    public function getComMetrcss($id)
    {
        $mycomp=$this->dcComponentSelector($id);
        $aTmp = explode('+', $id);
        $sRet='';
        foreach ($aTmp as $sComp) {
            $sRet.="\r\n<!-- Component: ".$sComp." -->\r\n";
            $sRet.=implode("\r\n",$mycomp->getMetronicStuffs($sComp,$mycomp::PM_PAGE_LEVEL_STYLES));
            $sRet.="\r\n";
        }
        return $sRet;
    }

    public function getComMetrjs($id)
    {
        $mycomp=$this->dcComponentSelector($id);
        $aTmp = explode('+', $id);
        $sRet='';
        foreach ($aTmp as $sComp) {
            $sRet.="\r\n<!-- Component: ".$sComp." -->\r\n";
            $sRet.=implode("\r\n",$mycomp->getMetronicStuffs($sComp,$mycomp::PM_PAGE_LEVEL_PLUGINS));
            $sRet.="\r\n";
        }
        dump($sRet);
        return $sRet;
    }

    public function getComMetrinitjs($id)
    {
        $mycomp=$this->dcComponentSelector($id);
        $aTmp = explode('+', $id);
        $sRet='';
        foreach ($aTmp as $sComp) {
            $sRet.="\r\n<!-- Component: ".$sComp." -->\r\n";
            $sRet.=implode("\r\n",$mycomp->getMetronicStuffs($sComp,$mycomp::PM_PAGE_INIT_SCRIPT));
            $sRet.="\r\n";
        }
        return $sRet;
    }

    public function getCompDemo($id)
    {
        $mycomp=$this->dcComponentSelector($id);
        return view('assets.comdemo', ['mycomp' => $mycomp]);
    }
}
