<?php
namespace App\Http\Controllers\Dashboard;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\UserValidate;
use Caffeinated\Shinobi\Models\Role;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use PDF;
use App\Service;
class ServiceController extends Controller
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
        $this->middleware('permission:services.index')->only('index');
        $this->middleware('permission:services.create')->only('create');
        $this->middleware('permission:services.edit')->only('edit');
        $this->middleware('permission:services.update')->only('update');
        $this->middleware('permission:services.destroy')->only('destroy');
        // pdf
        $this->middleware('permission:services.pdf.view')->only('servicePDFview');
       
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $services = Service::orderBy('created_at', 'desc')->paginate(10);
        return view('dashboard.services.index', compact('services'));
    }
    public function create()
    {
        $services = Service::get();
        return view('dashboard.services.create', compact('services'));
    }
    public function store(Request $request)
    {
        $newService = ([
            'name' => $request->name,
            'description' => $request->description, 
            'id_user' => Auth::user()->id
            ]);
        $service = Service::create($newService);
        return save_response($service, 'services.index', 
            'Servicio creado éxitosamente!!!'
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
        $service = Service::find($id);
        return view('dashboard.services.edit', compact('service'));
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
        $service = Service::find($id);
        $service->update([
            'name' => $request->name,
            'description' => $request->description, 
            ]);
        return save_response($service, 'services.index', 
            'Servicio actualizado éxitosamente!!!'
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
        $service = Service::find($id);
        $service->delete();
        return save_response($service, 'services.index', 
            'Servicio eliminado éxitosamente!!!'
        ); 
    }
    /**
     * userPDFview
     *
     * @return pdf generate
     */
    public function servicePDFview()
    {
        return view('dashboard.services.pdf.index');
    }
    /**
     * userPDFreport
     *
     * @return pdf report all
     */
    public function AllservicePDF()
    {
        $services = Services::all();
        $pdf = PDF::loadView('dashboard.services.pdf.archive', compact('services'));
        
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
    public function servicePDFreport(Request $request)
    {
        $this->validate($request, ['from' => 'required', 'to' => 'required']);
        $services = Service::whereBetween('created_at', [$request->from, $request->to])->get();
        
        $pdf = PDF::loadView('dashboard.services.pdf.archive', compact('services'));
        
        $pdf->output();
        
        $dom_pdf = $pdf->getDomPDF();
        $canvas = $dom_pdf ->get_canvas();
        $canvas->page_text(10, 750, "Página {PAGE_NUM} de {PAGE_COUNT}", null, 12, [0, 0, 0]);
        return $pdf->stream();
    }
}