@extends('layout')
@section('content')
    
    <div class="container-fluid p-3">
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <ol class="breadcrumb bg-primary col-md-12">
                <li class="breadcrumb-item active text-light" aria-current="page">Dashboard</li>
                <li class="breadcrumb-item text-light"><a class="text-light " style="text-decoration:none;!important" href="/customer/manage-users">Nouveau document</a></li>
            </ol>    
        </div>
        
        <div class="row">
            <div class="card col-md-7 p-2" style="display:flex;margin:auto;width:98%;">
                <img src="" alt="">
                <div class="card-body">
                    <h5 class="card-title">Informations</h5><hr>
                    <div class="p-3">
                        <div class="row">
                            <div class="form-group col-md-12">
                                <label for="nom">Libelle du document<span class="text-danger">&nbsp;*</span></label>
                                <input id="libelle" class="form-control" type="text" name="nom">
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-12">
                                <label for="nom">Description<span class="text-danger">&nbsp;*</span></label>
                                <textarea id="description" class="form-control" rows="5" cols="10"></textarea>
                            </div>
                        </div><br>
                        <div class="row p-2">    
                            <button class="btn" data-toggle="collapse" href="#pieces" role="button" aria-expanded="false"
                            aria-controls="pieces">Pièces ou informations complémentaires</button>
                            <button id="plus" class="ml-auto btn btn-primary"><i class="fa fa-plus"></i></button>
                        </div><hr>
                        
                        <form action="#" name="formPiece">
                            <div id="pieces" class="m-4 collapse show">
                                <div class="row">
                                    <div class="form-group col-md-6">
                                        <label >Type d'informations<span class="text-danger">&nbsp;*</span></label>
                                        <select class="form-control" name="" id="type0">
                                            <option value="Fichier">Fichier</option>
                                            <option value="Information">Information à renseigner</option>
                                        </select>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label >Libelle de l'information<span class="text-danger">&nbsp;*</span></label>
                                        <input id="libelle0" class="form-control" type="text">
                                    </div>
                                </div>
                            
                            </div>
                        </form>
                        <button class="btn btn-primary" id="validate" onclick="submitDocumentAjax()">Ajouter</button>
                                </div>
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
            for (let index = 0; index < key; index++) {
                pieces.push({'type':$('#type'+index).val(),'libelle':$('#libelle'+index).val()});
            }
            console.log(pieces);
            var libelle = $('#libelle').val();
            var description = $('#description').val();
            $('#validate').html('Ajout en cours <i class="fa fa-spinner fa-spin"></i>');
            $.ajax({
                type: "post",
                url: "/addDocumentAjax",
                data: {libelle:libelle,description:description,pieces:pieces},
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
        }

        $('#plus').click(function () { 
            $('#pieces').append('<div class="row"><div class="form-group col-md-6"><label >Type d\'informations<span class="text-danger">&nbsp;*</span></label><select class="form-control" name="" id="type'+key+'"><option value="Fichier">Fichier</option><option value="Information">Information à renseigner</option></select></div><div class="form-group col-md-6"><label >Libelle de l\'information<span class="text-danger">&nbsp;*</span></label><input id="libelle'+key+'" class="form-control" type="text"></div></div>');
            key += 1;
        });

    </script>
@endsection
