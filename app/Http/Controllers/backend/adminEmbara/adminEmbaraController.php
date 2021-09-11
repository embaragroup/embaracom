<?php

namespace App\Http\Controllers\backend\adminEmbara;

use App\Http\Controllers\Controller;
use App\Models\Agent\Agent;
use App\Services\AdminEmbara\AdminEmbaraService;
use Illuminate\Http\Request;

class adminEmbaraController extends Controller
{
    protected $adminEmbara;

    public function __construct()
    {
        $this->adminEmbara = new AdminEmbaraService;
    }

    public function index()
    {
        $adminBackend = $this->adminEmbara->getAdminEmbara();
        return view('backend.adminBackend.pages.dashboard.index', compact('adminBackend'));
    }

    public function createBackend($id = null)
    {
        $dataAdminEmbara = $this->adminEmbara->getAdminEmbara();

        if ($id) {
            $result = $this->adminEmbara->findById($id);
            return view('backend.adminBackend.pages.dashboard.create', compact('result', 'dataAdminEmbara'));
        }

        return view('backend.adminBackend.pages.dashboard.create');
    }

    public function storeBackend(Request $request, $id = null)
    {
        $result = $this->adminEmbara->storeAdminEmbara($request, $id);
        alertNotify($result['status'], $result['message'], $request);
        return redirect(url('/admin-embara/pageBackend'));
    }

    public function delete(Request $request, $id)
    {
        $adminBackend = $this->adminEmbara->delete($id);
        alertNotify($adminBackend['status'], $adminBackend['message'], $request);
        return redirect()->back();
    }

    public function agentIndex(){
        $dataAgent = Agent::all();
        return view('backend.adminBackend.pages.agent.index', compact('dataAgent'));
    }
}
