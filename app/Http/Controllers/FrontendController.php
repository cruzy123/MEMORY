<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Document;
use App\Models\Demande;
use App\Models\DemandeInfo;
use Illuminate\Support\Str;

class FrontendController extends Controller
{
    //
    function index()
    {
        $documents = Document::limit(6)->get();
        return view('frontend/index',compact('documents'));
    }

    function services()
    {
        $documents = Document::all();
        return view('frontend/services',compact('documents'));
    }

    function makeDemande($id)
    {
        $infos = Document::join('infos','documents.doc_id','=','infos.info_doc_id')
                        ->where('documents.doc_id',$id)
                        ->get();
        return view('frontend/make-demande',compact('infos'));
    }

    function storeDemande()
    {
        $code = strtoupper(Str::random(8));
        Demande::create(['dem_em_id'=>1,"dem_doc_id"=>request('document'),"dem_creation_date"=>date('Y/m/d'),"dem_code"=>$code]);
        try {  
            $id = Demande::orderBy('dem_id','desc')->first()->dem_id;

            $infos = Document::join('infos','documents.doc_id','=','infos.info_doc_id')
                            ->where('documents.doc_id',request('document'))
                            ->get();
            foreach ($infos as $key => $value) {
                if($value->info_doc_type == 'Fichier')
                {
                    $path = request()->file('piece'.$value->info_id)->store('fichiers', 'public');
                    $file = explode('/',$path)[sizeof(explode('/',$path))-1];
                    DemandeInfo::create(['deminfo_dem_id'=>$id,"deminfo_info_id"=>$value->info_id,"deminfo_value"=>$file]);
                }else{
                    DemandeInfo::create(['deminfo_dem_id'=>$id,"deminfo_info_id"=>$value->info_id,"deminfo_value"=>request('piece'.$value->info_id)]);
                }
            }
            return view('frontend/end-demande',compact('code'));
            
        } catch (\Exception $ex) {
            dd($ex);
            return back();
        }
      
    }

    function suivre()
    {
        return view('frontend/suivre');
    }

    function getStatut()
    {
        $demande = Demande::where('dem_code',request('code'))->first();
        if($demande)
        {
            if($demande->dem_statut == 1)
                $output = '<div class="card col-md-7">
                            <div class="card-body">
                                <h5 class="card-title text-success">Statut de la demande </h5><hr>
                                <p class="card-text">Le service d\'administration a validé votre demande et le document a été transférer à votre adrresse électronique.<br>Merci !!!</p>
                            </div>
                        </div>';       
            elseif($demande->dem_statut == 0)
                $output = '<div class="card col-md-7">
                            <div class="card-body">
                                <h5 class="card-title text-success">Statut de la demande </h5><hr>
                                <p class="card-text">Le service d\'administration a rejeté votre demande, veuillez consulter votre boîte email pour en savoir plus.<br>Merci !!!</p>
                            </div>
                        </div>';   
            else
                $output = '<div class="card col-md-7">
                        <div class="card-body">
                            <h5 class="card-title text-success">Statut de la demande </h5><hr>
                            <p class="card-text">Le service d\'administration n\'a pas encore traité votre demande, veuillez patienter.<br>Merci !!!</p>
                        </div>
                    </div>'; 
            echo 'true||'.$output;exit;
        }
        echo 'false||Ce code de demande est inconnu';exit;
    }
}
