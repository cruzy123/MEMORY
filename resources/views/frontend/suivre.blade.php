@extends('frontend.layout')
@section('content')
    <section class="hoc container clear">


        <div class="row justify-content-center">
                <div class="input-group col-md-8">
                    <input class="form-control" type="text" name="motif" id="motif" placeholder="Entrer le code de la demande Ex : CDERTYUI" required>
                    <div class="input-group-append">
                        <button id="search" class="btn btn-success"><i class="fa fa-search"></i></button>
                    </div>
                </div>
        </div>
        <div id="contenu" class="row justify-content-center mt-4">
             
        </div> 
  </section>
  <script>
      
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $(function () {
            $('#search').click(function (e) { 
                e.preventDefault();
                $('#contenu').html('');
                if($('#motif').val() == '')
                {
                    toastr.error('Entrer un code de demande');
                }else{
                    submitAjax();
                }
            });
        });

        function submitAjax()
        {
            var code = $('#motif').val();
            $('#search').html('<i class="fa fa-spinner fa-spin"></i>');
            $.ajax({
                type: "post",
                url: "/getStatut",
                data: {_token:$('meta[name="csrf-token"]').attr('content'),code:code},
                success: function (msg) {
                    console.log(msg);
                    var val = msg.split("||");
                    if (val[0] == "true") {
                        setTimeout(() => {
                            $('#search').html('<i class="fa fa-search"></i>');
                            $('#contenu').html(val[1]);
                        }, 600);

                    } else if (val[0] == "false") {
                        toastr.error(val[1]);
                        $('#search').html('<i class="fa fa-search"></i>')
                    }
                }
            });
        }
  </script>
@endsection