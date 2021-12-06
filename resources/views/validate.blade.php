@extends('layout')
@section('content')
    <div class="container-fluid p-3">
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <ol class="breadcrumb bg-primary col-md-12">
                <li class="breadcrumb-item active text-light" aria-current="page">Dashboard</li>
                <li class="breadcrumb-item text-light"><a class="text-light " style="text-decoration:none;!important" href="/demandes">Validation de demande</a></li>
            </ol>    
        </div>
        
        <div class="row justify-content-center"> 
            <div class="card col-md-6 p-2 m-2" >
                <img src="" alt="">
                <div class="card-body">
                    <h5 class="card-title">Paramètres de validation ( Email à envoyer )</h5><hr>
                    <div class="p-3">
                        <form id="sendMail" enctype="multipart/form-data">
                            <input type="hidden" name="id" value="{{ $info->dem_id }}">
                        <div class="row">
                            <div class="form-group col-md-6">
                                <label >Sujet du mail <span class="text-danger">&nbsp;*</span></label>
                                <input name="sujet" id="sujet" value="{{ $info->doc_libelle }}" class="form-control" type="text">
                            </div>
                            <div class="form-group col-md-6">
                                <label >Destinataire<span class="text-danger">&nbsp;*</span></label>
                                <input name="destinataire" id="destinataire" readonly value="{{ $info->em_email }}" class="form-control bg-primary text-light" type="email">
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-12">
                                <label >Pièce à joindre</label>
                                <input name="piece" id="piece" class="form-control-file" type="file">
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-12">
                                <label >Corps du mail<span class="text-danger">&nbsp;*</span></label><br>
                                <div id="editorAdd" style="min-height:100px;"></div>
                            </div>
                        </div>
                        <div class="row justify-content-center">
                            <div class="form-group col-md-12">
                                <button id="validate" onclick="submitFormAjax();" type="button" class="btn btn-primary p-3">Valider la demande <i class="fa fa-rocket"></i></button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
    </div>
    <script>
        let editorAdd;
        ClassicEditor
            .create(document.querySelector('#editorAdd'))
            .then(
                newEditor => {
                    editorAdd = newEditor;
                })
            .catch(error => {
                console.error(error);
            });

          
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        function submitFormAjax()
        {
            $('#validate').html('Envoi du message en cours <i class="fa fa-spinner fa-spin"></i>')
            var formData = new FormData(document.getElementById('sendMail'));
            formData.append('message',editorAdd.getData());
            console.log(formData)
            $.ajax({
                type: "post",
                url: "/validateDemandeAjax",
                data: formData,
                cache: false,
                contentType: false,
                processData: false,
                success: function (msg) {
                    console.log(msg);
                    var val = msg.split("||");
                    if (val[0] == "true") {
                        toastr.success(val[1]);
                        setTimeout(() => {
                            location.reload();
                        }, 2000);

                    } else if (val[0] == "false") {
                        toastr.error(val[1]);
                        $('#validate').html('Valider la demande <i class="fa fa-rocket"></i>')
                    }
                }
            });
        }

    </script>
@endsection