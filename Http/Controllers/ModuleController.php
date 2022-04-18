<?php

namespace Modules\Installer\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Nwidart\Modules\Facades\Module;
use Modules\Installer\Helpers\ModuleManager;
use Illuminate\Contracts\Support\Renderable;

class ModuleController extends Controller
{
    /**
     * Display the installer welcome page.
     *
     * @return \Illuminate\Http\Response
     */

    private $moduleManager;

    public function __construct(ModuleManager $moduleManager)
    {
        $this->moduleManager = $moduleManager;
    }

    /**
     * Migrate and seed the database.
     *
     * @return \Illuminate\View\View
     */
    public function database(Request $request)
    {   $modules = ($request->input('modules'));
        $response = $this->moduleManager->migrateAndSeed($modules);
        
        return redirect()->route('installer::final')
                         ->with(['message' => $response]);
    }


    public function index()
    {
        $modules = Module::all();
        return view('installer::modules',compact('modules'));
    }
}
