<?php
 namespace App\Http\Controllers;
 use Illuminate\Http\Request;

use App\Mahasiswa;
use App\MahasiswaOrganisasi;
use App\RefJabatanOrganisasi;
use DB;

 class OrganisasiMhsController extends Controller
{

    public $organisasi_validation_rules = [
        'mahasiswa_id' => 'required',
        'organisasi' => 'required',
        'jabatan_id' => 'required',
        'tgl_mulai' => 'required',
        'tgl_selesai' => 'required',
        'file_bukti' => 'required'
    ];

     public function __construct(){
        $this->middleware(['permission:manage_organisasimhs']);
    }
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $mhs_organisasis = MhsOrganisasi::orderBy('created_at', 'desc')->paginate(25);
        return view('backend.organisasi-mhs.index', compact('mhs_organisasis'));
    }
     /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
        {
             $jabatan = RefJabatanOrganisasi::pluck('jabatan', 'id');
            return view('backend.organisasi-mhs.create', compact('jabatan'));
        }	 

        public function store(Request $request)
        {	 
            $this->validate($request, $this->proposal_validation_rules);   
            $data = $request->all();
            MhsOrganisasi::create($data);
            $id = DB::getPdo()->lastInsertId();
            session()->flash('flash_success', 'Berhasil menambahkan data organisasi mahasiswa '. $request->input('organisasi'));
            return redirect()->route('admin.organisasi-mhs.show', $id);
        }	    
        public function show($id)
        {	    
            $MhsOrganisasi = DB::table('mhs_organisasi')
            ->join('ref_jabatan_organisasi', 'mhs_organisasi.jabatan_id', '=', 'ref_jabatan_organisasi.id')
            ->select('mhs_organisasi.id', 'mhs_organisasi.mahasiswa_id', 'mhs_organisasi.organisasi', ',mhs_organisasi.jabatan_id', 'mhs_organisasi.tgl_mulai', 'mhs_organisasi.tgl_selesai', 'mhs_organisasi.file_bukti', 'ref_jabatan_organisasi.jabatan')
            ->where('mhs_organisasi.id', '=', $id)
            ->get();
            $MhsOrganisasi = $MhsOrganisasi[0];
            $anggotas = DB::table('mhs_organisasi')
                        ->join('mahasiswa', 'mhs_organisasi.id', '=', 'mahasiswa.mhs_organisasi_id')
                        ->join('jabatan', 'mhs_organisasi.jabatan_id', '=', 'jabatan.id')
                        ->where('kp_proposal.id', '=', $id)
                        ->get();
        
        return view('backend.organisasi-mhs.show', compact('MhsOrganisasi', 'anggotas'));
        }	    
        public function edit($id)
        {	    
            $MhsOrganisasi=MhsOrganisasi::findOrFail($id);
            $jabatans = RefJabatanOrganisasi::all();
            // dd($MhsOrganisasi);
            return view('backend.organisasi-mhs.edit', compact('MhsOrganisasi', 'jabatans'));
        }	    
        public function update(Request $request, $id)
        {	
            $this->validate($request, $this->organisasi_validation_rules);    
            $organisasi = MhsOrganisasi::findOrFail($id);
            $data = $request->all();
            $organisasi->update($data);
            session()->flash('flash_success', 'Berhasil mengupdate data organisasi '.$request->input('organisasi'));
            return redirect()->route('admin.organisasi-mhs.show', $id);
        }	    
        public function destroy($id)
        {	    
            $organisasi = MhsOrganisasi::findOrFail($id);
            $MhsOrganisasi = MhsOrganisasi::destroy($id);       
            try{
                MhsOrganisasi::destroy($id);
           session()->flash('flash_success', 'Berhasil Menghapus data organisasi '.$organisasi->organisasi);	            
            }catch(Exception $e){
               session()->flash('flash_warning', 'Gagal Menghapus data organisasi'.$organisasi->organisasi);
           }
            return redirect()->route('admin.organisasi-mhs.index');
         }	    
}