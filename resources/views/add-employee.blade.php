@extends('layout')
@section('content')
    
    <div class="container-fluid p-3">
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <ol class="breadcrumb bg-primary col-md-12">
                <li class="breadcrumb-item active text-light" aria-current="page">Dashboard</li>
                <li class="breadcrumb-item text-light"><a class="text-light " style="text-decoration:none;!important" href="/customer/manage-users">Ajouter un employé</a></li>
            </ol>    
        </div>
        
            <div class="row">
                    <div class="card col-md-7 p-2" style="display:flex;margin:auto;width:98%;">
                        <img src="" alt="">
                            <div class="card-body">
                                <h5 class="card-title">Formulaire</h5><hr>
                                    <div class="p-3">
                                        <div class="row">
                                            <div class="form-group col-md-6">
                                                <label for="nom">Nom<span class="text-danger">&nbsp;*</span></label>
                                                <input id="nom" class="form-control" type="text" name="nom">
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="nom">Prénoms<span class="text-danger">&nbsp;*</span></label>
                                                <input id="prenoms" class="form-control" type="text" name="prenoms">
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-group col-md-6">
                                                <label for="nom">Sexe<span class="text-danger">&nbsp;*</span></label>
                                                <select name="sexe" id="sexe" class="form-control">
                                                    <option value="Homme">Homme</option>
                                                    <option value="Femme">Femme</option>
                                                </select>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="nom">Date de naissance<span class="text-danger">&nbsp;*</span></label>
                                                <input id="datenaissance" class="form-control" type="date" name="datenaissance">
                                            </div>
                                        </div>
                                        
                                        <div class="row">
                                            <div class="form-group col-md-6">
                                                <label for="nom">Contact<span class="text-danger">&nbsp;*</span></label>
                                                <input id="contact" class="form-control" type="text" name="contact">
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="nom">Email<span class="text-danger">&nbsp;*</span></label>
                                                <input id="email" class="form-control" type="email" name="email">
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="form-group col-md-12">
                                                <label for="nom">Poste<span class="text-danger">&nbsp;*</span></label>
                                                <input id="poste" class="form-control" type="text" name="poste">
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-group col-md-6">
                                                <label for="nom">Rôle<span class="text-danger">&nbsp;*</span></label>
                                                <select name="role" class="form-control" id="role">
                                                    <option value="1">Utilisateur</option>
                                                    <option value="0">Admin</option>
                                                </select>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="nom">Mot de passe<span class="text-danger">&nbsp;*</span></label>
                                                <input id="password" class="form-control" type="password" name="password">
                                            </div>
                                        </div>
                                        
                                            
                                    </div>
                                    <button class="btn btn-primary" id="validate" onclick="submitDocumentAjax()">Ajouter</button>
                            </div>
                    </div>
            </div>
        
    </div>
    <script>
        
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        var key = 1;
        var pieces = [];

        function submitDocumentAjax()
        {
            var nom = $('#nom').val();
            var prenoms = $('#prenoms').val();
            var sexe = $('#sexe').val();
            var naissance = $('#datenaissance').val();
            var contact = $('#contact').val();
            var email = $('#email').val();
            var poste = $('#poste').val();
            var role = $('#role').val();
            var password = $('#password').val();

            if(nom != '' && prenoms != '' && sexe != '' && naissance != '' && contact != '' && email != '' && poste != '' && role != '' && password != '')
            {
                $('#validate').html('Ajout en cours <i class="fa fa-spinner fa-spin"></i>');
                $.ajax({
                    type: "post",
                    url: "/addEmployeeAjax",
                    data: {nom:nom,prenoms:prenoms,sexe:sexe,naissance:naissance,contact:contact,email:email,poste:poste,password:password,role:role},
                    success: function (msg) {
                        console.log(msg);
                        var val = msg.split("||");
                        if (val[0] == "true") {
                            toastr.success(val[1]);
                            setTimeout(() => {
                                location.reload();
                            }, 600);

                        } else if (val[0] == "false") {
                            toastr.error(val[1]);
                            $('#validate').html('Ajouter')
                        }
                    }
                });
            }else{
                toastr.error('Tous les champs sont requis');
            }
           
        }

        $('#plus').click(function () { 
            $('#pieces').append('<div class="row"><div class="form-group col-md-6"><label >Type d\'informations<span class="text-danger">&nbsp;*</span></label><select class="form-control" name="" id="type'+key+'"><option value="Fichier">Fichier</option><option value="Information">Information à renseigner</option></select></div><div class="form-group col-md-6"><label >Libelle de l\'information<span class="text-danger">&nbsp;*</span></label><input id="libelle'+key+'" class="form-control" type="text"></div></div>');
            key += 1;
        });

    </script>
@endsection
