<?php

namespace App\Http\Controllers\Direksi;

use App\Http\Controllers\Controller;
use App\Models\BiodataModels;
use Illuminate\Http\Request;
use App\Models\ProdiModels;
use App\Models\UsersModels;
use Illuminate\Support\Facades\DB;
use Auth;
class ProfileDireksiControllers extends Controller
{
    function index(){
        $oke=Auth::id();
        // Get all ProdiModels
        $user = Auth::id();
        $id=UsersModels::find($user);
        $prodi = ProdiModels::all();
    
        // Get the total number of professors for each id_prodi
        $totalDosen = UsersModels::select('tb_prodi.id_prodi', 'tb_prodi.prodi', DB::raw('COUNT(tb_user.id_prodi) as total_dosen'))
            ->rightJoin('tb_prodi', 'tb_user.id_prodi', '=', 'tb_prodi.id_prodi') // Use rightJoin to include Prodi names with no professors
            ->groupBy('tb_prodi.id_prodi', 'tb_prodi.prodi') // Include 'prodi' in GROUP BY
            ->get()->toArray(); // Convert the collection to an array
    
        // Create an array of all Prodi names
        $allProdiNames = $prodi->pluck('prodi')->toArray();
    
        // Merge the $totalDosen array with the array containing all Prodi names
        $mergedData = [];
        foreach ($allProdiNames as $prodiName) {
            $mergedData[] = [
                'prodi' => $prodiName,
                'total_dosen' => 0,
            ];
        }

        foreach ($totalDosen as $data) {
            $index = array_search($data['prodi'], array_column($mergedData, 'prodi'));
            if ($index !== false) {
                $mergedData[$index]['total_dosen'] = $data['total_dosen'];
            }
        }

        $jabfung = BiodataModels::select('tb_biodata.jabfung')
        ->groupBy('tb_biodata.jabfung')
        ->get();

        $mergedDataJabfung = [];
        foreach ($jabfung as $item) {
            $mergedDataJabfung[] = [
                'jabfung' => $item->jabfung,
                'total_jabfung' => BiodataModels::where('jabfung', $item->jabfung)->count(),
            ];
        }
        return view('direksi.profile.index', compact('prodi','jabfung', 'mergedData','mergedDataJabfung','oke'));
    }
    function updateuser($id){
        $user = UsersModels::find($id);
        return view('direksi.profile.updateuser',compact('user','id'));
    }
    function updateuserData(Request $request,$id){
        $hash=bcrypt($request->input('password'));
        UsersModels::where('tb_user.id',$id)
        ->update([
            'name'=>$request->input('name'),
            'email'=>$request->input('email'),
            'password'=>$hash,
        ]);
        return redirect("/profile-direksi")->with('success','User berhasil diperbarui.');
        }    
}