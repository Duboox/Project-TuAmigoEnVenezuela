<?php
namespace App\Http\Controllers\Dashboard;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\UserValidate;
use Caffeinated\Shinobi\Models\Role;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use PDF;
use App\Invoice;
class InvoiceController extends Controller
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
        $this->middleware('permission:invoices.index')->only('index');
        $this->middleware('permission:invoices.create')->only('create');
        $this->middleware('permission:invoices.edit')->only('edit');
        $this->middleware('permission:invoices.update')->only('update');
        $this->middleware('permission:invoices.destroy')->only('destroy');
        // pdf
        $this->middleware('permission:invoices.pdf.view')->only('invoicePDFview');
       
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $invoices = Invoice::paginate(10);
        return view('dashboard.invoices.index', compact('invoices'));
    }
    public function create()
    {
        $invoices = Invoice::get();
        return view('dashboard.invoices.create', compact('invoices'));
    }
    public function store(Request $request)
    {
        $newInvoice = ([
            'id_client' => $request->id_client,
            'id_agent' => $request->id_agent, 
            'type' => $request->type, 
            'ticket_type' => $request->ticket_type, 
            'exit_date' => $request->exit_date, 
            'arrival_date' => $request->arrival_date,  
            'price' => $request->price,  
            'id_user' => Auth::user()->id
            ]);
        $invoice = Invoice::create($newInvoice);
        return save_response($invoice, 'invoices.index', 
            'Factura creada éxitosamente!!!'
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
        $invoice = Invoice::find($id);
        return view('dashboard.invoices.edit', compact('invoice'));
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
        $invoice = Invoice::find($id);
        $invoice->update([
            'id_client' => $request->id_client,
            'id_agent' => $request->id_agent, 
            'type' => $request->type, 
            'ticket_type' => $request->ticket_type, 
            'exit_date' => $request->exit_date, 
            'arrival_date' => $request->arrival_date,  
            'price' => $request->price,  
            ]);
        return save_response($invoice, 'invoices.index', 
            'Factura actualizada éxitosamente!!!'
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
        $invoice = Invoice::find($id);
        $invoice->delete();
        return save_response($invoice, 'invoices.index', 
            'Factura eliminada éxitosamente!!!'
        ); 
    }
    /**
     * userPDFview
     *
     * @return pdf generate
     */
    public function invoicePDFview()
    {
        return view('dashboard.invoices.pdf.index');
    }
    /**
     * userPDFreport
     *
     * @return pdf report all
     */
    public function AllinvoicePDF()
    {
        $invoices = Invoice::all();
        $pdf = PDF::loadView('dashboard.invoices.pdf.archive', compact('invoices'));
        
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
    public function invoicePDFreport(Request $request)
    {
        $this->validate($request, ['from' => 'required', 'to' => 'required']);
        $invoices = Invoice::whereBetween('created_at', [$request->from, $request->to])->get();
        
        $pdf = PDF::loadView('dashboard.invoices.pdf.archive', compact('invoices'));
        
        $pdf->output();
        
        $dom_pdf = $pdf->getDomPDF();
        $canvas = $dom_pdf ->get_canvas();
        $canvas->page_text(10, 750, "Página {PAGE_NUM} de {PAGE_COUNT}", null, 12, [0, 0, 0]);
        return $pdf->stream();
    }
}