<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Demande;
use App\Models\Document;
use App\Models\Info;
use App\Models\Employee;
use App\Models\Utilisateur;
use Illuminate\Support\Facades\Hash;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

class MainController extends Controller
{
    //
    function index()
    {
        return view('index');
    }

    function addEmployee()
    {
        return view('add-employee');
    }

    function employees()
    {
        $employees = Employee::join('users','employes.em_id','=','users.user_em_id')->where('em_id','!=',session()->get('user_id'))->get();
        // dd($employees);
        return view('employees',compact('employees'));
    }

    function rejectDemande($id)
    {
        $info = Demande::join('documents','demandes.dem_doc_id','=','documents.doc_id')
                            ->join('employes','demandes.dem_em_id','=','employes.em_id')
                            ->join('demandes_infos','demandes.dem_id','=','demandes_infos.deminfo_dem_id')
                            ->where('demandes.dem_id',$id)
                            ->first();
        return view('reject',compact('info'));
    }

    function rejectDemandeAjax()
    {
        $id = request('id');
        $to = request('destinataire');
        $subject = request('sujet');
        $message = request('message');

        $mail = new PHPMailer(true);

        try {
            //Server settings
            $mail->SMTPDebug = false;                      //Enable verbose debug output
            $mail->isSMTP();                                            //Send using SMTP
            $mail->Host       = 'ssl://smtp.gmail.com';                     //Set the SMTP server to send through
            $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
            $mail->Username   = 'koukeprince@gmail.com';                     //SMTP username
            $mail->Password   = 'lpqbncwwollmqvoc';                               //SMTP password
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
            $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

            //Recipients
            $mail->setFrom('koukeprince@gmail.com', 'SysGes');
            $mail->addAddress('thecodeisbae@gmail.com');     //Add a

            // if(request()->file('piece')->getClientOriginalName() != '')
            // //Add attachments
            //     $mail->addAttachment($_FILES['piece']['tmp_name'], request()->file('piece')->getClientOriginalName());    //Optional name

            //Content
            $mail->isHTML(true);                                  //Set email format to HTML
            $mail->Subject = $subject;
            $mail->Body    = $message;

            $mail->send();
            
            $demande = Demande::find($id);
            $demande->dem_statut = 0;
            $demande->save();

            echo 'true||Message envoyé avec succès';
        } catch (Exception $e) {
            echo "false||Une erreur s'est produite";
        }
        
    }

    function validateDemandeAjax()
    {
        $id = request('id');
        $to = request('destinataire');
        $subject = request('sujet');
        $message = request('message');

        $mail = new PHPMailer(true);

        try {
            //Server settings
            $mail->SMTPDebug = false;                      //Enable verbose debug output
            $mail->isSMTP();                                            //Send using SMTP
            $mail->Host       = 'ssl://smtp.gmail.com';                     //Set the SMTP server to send through
            $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
            $mail->Username   = 'koukeprince@gmail.com';                     //SMTP username
            $mail->Password   = 'lpqbncwwollmqvoc';                               //SMTP password
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
            $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

            //Recipients
            $mail->setFrom('koukeprince@gmail.com', 'SysGes');
            $mail->addAddress('thecodeisbae@gmail.com');     //Add a

            if(request()->file('piece')->getClientOriginalName() != '')
            //Add attachments
                $mail->addAttachment($_FILES['piece']['tmp_name'], request()->file('piece')->getClientOriginalName());    //Optional name

            //Content
            $mail->isHTML(true);                                  //Set email format to HTML
            $mail->Subject = $subject;
            $mail->Body    = $message;

            $mail->send();
            
            $demande = Demande::find($id);
            $demande->dem_statut = 1;
            $demande->save();

            echo 'true||Message envoyé avec succès';
        } catch (Exception $e) {
            echo "false||Une erreur s'est produite";
        }
    }

    function validateDemande($id)
    {
        
        $info = Demande::join('documents','demandes.dem_doc_id','=','documents.doc_id')
                            ->join('employes','demandes.dem_em_id','=','employes.em_id')
                            ->join('demandes_infos','demandes.dem_id','=','demandes_infos.deminfo_dem_id')
                            ->where('demandes.dem_id',$id)
                            ->first();
        return view('validate',compact('info'));
    }
    
    function addEmployeeAjax()
    {
        // dd(request());
        try {
            Employee::create(['em_nom'=>request('nom'),'em_prenoms'=>request('prenoms'),'em_sexe'=>request('sexe'),
            'em_date_naissance'=>request('naissance'),'em_contact'=>request('contact'),'em_email'=>request('email'),
            'em_poste'=>request('poste')]);

            $id = Employee::orderBy('em_id','desc')->first();

            Utilisateur::create(['user_em_id'=>$id->em_id,'user_role'=>request('role'),'user_password'=>Hash::make(request('password'))]);

            echo 'true||Employé ajouté avec succès'; 
        } catch (\Throwable $th) {
            echo $th;
            echo 'false||Une erreur s\'est produite rééssayer';
        }
    }

    function demandes()
    {
        $demandes = Demande::join('documents','demandes.dem_doc_id','=','documents.doc_id')
                            ->join('employes','demandes.dem_em_id','=','employes.em_id')
                            ->get();
        return view('demandes',compact('demandes'));
    }

    function document($id)
    {
        $infos = Document::join('infos','documents.doc_id','=','infos.info_doc_id')
                            ->where('documents.doc_id',$id)
                            ->get();
        return view('document',compact('infos'));
    }

    function documents()
    {
        $documents = Document::get();
        return view('documents',compact('documents'));
    }

    function addDocumentAjax()
    {
        // dd(request('pieces'));
        try {
            Document::create(['doc_libelle'=>request('libelle'),'doc_description'=>request('description')]);
            $id = Document::orderBy('doc_id','desc')->first();
            foreach (request('pieces') as $key => $value) {
                Info::create(['info_libelle'=>$value['libelle'],'info_doc_type'=>$value['type'],'info_doc_id'=>$id->doc_id]);
            }
            echo 'true||Document ajouté avec succès'; 
        } catch (\Throwable $th) {
            echo 'false||Une erreur s\'est produite rééssayer';
        }
    }

    function addDocument()
    {
        return view('add-document');
    }

    function view($id)
    {
        $info = Demande::join('documents','demandes.dem_doc_id','=','documents.doc_id')
                            ->join('employes','demandes.dem_em_id','=','employes.em_id')
                            ->join('demandes_infos','demandes.dem_id','=','demandes_infos.deminfo_dem_id')
                            ->where('demandes.dem_id',$id)
                            ->first();
        $infos = Demande::join('documents','demandes.dem_doc_id','=','documents.doc_id')
                            ->join('employes','demandes.dem_em_id','=','employes.em_id')
                            ->join('demandes_infos','demandes.dem_id','=','demandes_infos.deminfo_dem_id')
                            ->join('infos','demandes_infos.deminfo_info_id','=','infos.info_id')
                            ->where('demandes.dem_id',$id)
                            ->get();
        return view('view-demande',compact('infos','info'));
    }

}
