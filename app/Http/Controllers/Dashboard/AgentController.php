<?php
namespace App\Http\Controllers\Dashboard;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\UserValidate;
use Caffeinated\Shinobi\Models\Role;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use PDF;
use App\Agent;
class AgentController extends Controller
{
    /**
     * __construct
     *
     * @return Language selected in the application
     */
    public function __construct()
    {
        Carbon::setlocale(config('app.locale'));
        // middleware
        $this->middleware('permission:agents.index')->only('index');
        $this->middleware('permission:agents.create')->only('create');
        $this->middleware('permission:agents.edit')->only('edit');
        $this->middleware('permission:agents.update')->only('update');
        $this->middleware('permission:agents.destroy')->only('destroy');
        // pdf
        $this->middleware('permission:agents.pdf.view')->only('agentPDFview');
       
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $agents = Agent::orderBy('created_at', 'desc')->paginate(10);
        return view('dashboard.agents.index', compact('agents'));
    }
    public function create()
    {
        $agents = Agent::get();
        return view('dashboard.agents.create', compact('agents'));
    }
    public function store(Request $request)
    {
        $newAgent = ([
            'name' => $request->name,
            'last_name' => $request->last_name, 
            'email' => $request->email, 
            'phone' => $request->phone, 
            'birthday_date' => $request->birthday_date, 
            'rating' => $request->rating,  
            'option' => $request->option,  
            'id_user' => Auth::user()->id
            ]);
        $agent = Agent::create($newAgent);
        return save_response($agent, 'agents.index', 
            'Agente creado éxitosamente!!!'
        ); 
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $agent = Agent::find($id);
        return view('dashboard.agents.edit', compact('agent'));
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $agent = Agent::find($id);
        $agent->update([
            'name' => $request->name,
            'last_name' => $request->last_name, 
            'email' => $request->email, 
            'phone' => $request->phone, 
            'birthday_date' => $request->birthday_date, 
            'rating' => $request->rating,  
            'option' => $request->option
            ]);
        return save_response($agent, 'agents.index', 
            'Agente actualizado éxitosamente!!!'
        ); 
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $agent = Agent::find($id);
        $agent->delete();
        return save_response($agent, 'agents.index', 
            'Agente eliminado éxitosamente!!!'
        ); 
    }
    /**
     * userPDFview
     *
     * @return pdf generate
     */
    public function agentPDFview()
    {
        return view('dashboard.agents.pdf.index');
    }
    /**
     * userPDFreport
     *
     * @return pdf report all
     */
    public function AllagentPDF()
    {
        $agents = Agent::all();
        $pdf = PDF::loadView('dashboard.agents.pdf.archive', compact('agents'));
        
        $pdf->output();
        
        $dom_pdf = $pdf->getDomPDF();
        $canvas = $dom_pdf ->get_canvas();
        $canvas->page_text(10, 750, "Página {PAGE_NUM} de {PAGE_COUNT}", null, 12, [0, 0, 0]);
        return $pdf->stream();
    }
    /**
     * userPDFreport
     *
     * @return pdf report whereDate
     */
    public function agentPDFreport(Request $request)
    {
        $this->validate($request, ['from' => 'required', 'to' => 'required']);
        $agents = Agent::whereBetween('created_at', [$request->from, $request->to])->get();
        
        $pdf = PDF::loadView('dashboard.agents.pdf.archive', compact('agents'));
        
        $pdf->output();
        
        $dom_pdf = $pdf->getDomPDF();
        $canvas = $dom_pdf ->get_canvas();
        $canvas->page_text(10, 750, "Página {PAGE_NUM} de {PAGE_COUNT}", null, 12, [0, 0, 0]);
        return $pdf->stream();
    }
}