<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Invia Richiesta </title>

    <!-- BS 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

    <!-- SELECT2 + BS5 -->
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/select2-bootstrap-5-theme@1.3.0/dist/select2-bootstrap-5-theme.min.css" />

</head>
<body class="vh-100">
<section class="container vh-100">
    <div class="row vh-100 justify-content-center align-items-center">
        <div class="col-md-8 col-xl-6">
            <h1 class="mb-4">Invia la tua richiesta</h1>
            <form action="{{route('post')}}" id="postForm" method="POST">
                @csrf
                <div class="row mb-3">
                    <label for="name" class="col-sm-3 col-form-label">Nome*</label>
                    <div class="col-sm-9">
                        <input type="text" placeholder="Nome" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete autofocus >
                        @error('name')
                        <span class="invalid-feedback" role="alert">
                                  <strong>{{ $message }}</strong>
                                </span>
                        @enderror
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="surname" class="col-sm-3 col-form-label">Cognome*</label>
                    <div class="col-sm-9">
                        <input type="text" placeholder="Cognome" class="form-control @error('surname') is-invalid @enderror" name="surname" value="{{ old('surname') }}" required autocomplete autofocus >
                        @error('surname')
                        <span class="invalid-feedback" role="alert">
                                  <strong>{{ $message }}</strong>
                                </span>
                        @enderror
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="date_of_birth" class="col-sm-3 col-form-label">Data di nascita*</label>
                    <div class="col-sm-9">
                        <input id="date_of_birth"
                               class="form-control @error('date_of_birth') is-invalid @enderror"
                               type="date"
                               {{--onfocus="(this.type='date')"
                               onblur="(this.value == '' ? this.type='text' : this.type='date')"--}}
                               name="date_of_birth"
                               value="{{ old('date_of_birth')}}"
                               {{--placeholder="Data di nascita"--}} required autocomplete autofocus />
                        @error('date_of_birth')
                        <div class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </div>
                        @enderror
                    </div>
                </div>


                <div class="row mb-3">
                    <label for="region" class="col-sm-3 col-form-label">Regione*</label>
                    <div class="col-sm-9">
                        <div class="form-group">
                            <select class="form-control @error('region') is-invalid @enderror" id="region" name="region" value="{{ old('region') }}" required autocomplete="off" autofocus>
                                <option value="">Seleziona...</option>
                                @foreach ($regions as $region)
                                    <option value="{{$region->id}}" {{ old('region')==$region->id ? 'selected' : ''}}>{{$region->name}}</option>
                                @endforeach
                            </select>
                            @error('region')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="province" class="col-sm-3 col-form-label">Provincia*</label>
                    <div class="col-sm-9">
                        <div class="form-group">
                            <select class="form-control @error('province') is-invalid @enderror" id="province" name="province" value="{{ old('province') }}" data-oldid="{{ old('province')}}" {{ old('province') ? '' : 'disabled'}} required autocomplete="off">
                                <option value="">Seleziona...</option>
                                @isset($provinces)
                                    @foreach ($provinces as $province)
                                        <option value="{{$province->id}}" {{ old('province')==$province->id ? 'selected' : ''}}>{{$province->name}}</option>
                                    @endforeach
                                @endisset
                            </select>
                            @error('province')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="city" class="col-sm-3 col-form-label">Comune*</label>
                    <div class="col-sm-9">
                        <div class="form-group">
                            <select class="form-control @error('city') is-invalid @enderror" id="city" name="city" value="{{ old('$city') }}" data-oldid="{{ old('city')}}" {{ old('city') ? '' : 'disabled'}} required autocomplete="off">
                                <option value="">Seleziona...</option>
                                @isset($cities)
                                    @foreach ($cities as $city)
                                        <option value="{{$city->id}}">{{$city->name}}</option>
                                    @endforeach
                                @endisset
                            </select>
                            @error('city')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="request" class="col-sm-3 col-form-label">Richiesta*</label>
                    <div class="col-sm-9">
                        <textarea class="form-control @error('request') is-invalid @enderror" name="request" placeholder="Scrivi la tua richiesta" autofocus autocomplete required>{{ old('request') }}</textarea>
                        @error('request')
                        <div class="invalid-feedback">
                            <strong>{{ $message }}</strong>
                        </div>
                        @enderror
                    </div>
                </div>
                <div class="row mb-3">
                    <label class="col-sm-3 col-form-label"></label>
                    <div class="col-sm-9">
                        <button type="submit" class="btn btn-primary">Invia</button>
                    </div>
                </div>

            </form>
        </div>
    </div>
</section>



<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

<script>

    $(document).ready(function() {
        $('#region,#province, #city').select2({
            theme: 'bootstrap-5',
            width: '100%',
        });

        // Aggiungi la logica per tenere traccia dell'oldid
        /*$('#province, #city').on('select2:select', function(e) {
            $(this).data('oldid', e.params.data.id);
        });*/

        if($('#province').data('oldid')!='' && typeof($('#province').data('oldid'))!="undefined"){
            $('#region').change();
        }

    });
        $('#region').change(function() {
            var region_id = $(this).val();

            // Reset provincia e città
            $('#province').val('').trigger('change').prop('disabled', true);
            /*$('#city').val('').trigger('change').prop('disabled', true);*/

            if(region_id.trim() != '') {
                // Carica le province
                $.ajax({
                    url: "{{url('api/fetch-provinces')}}",
                    type: "POST",
                    data: {
                        region_id: region_id,
                    },
                    dataType: 'json',
                    success: function (res) {
                        $('#province').html('<option value="">Seleziona...</option>');
                        $.each(res.provinces, function (key, value) {
                            $("#province").append('<option value="' + value.id + '">' + value.name + '</option>');
                        });

                        // Abilita la selezione della provincia
                        $('#province').prop('disabled', false);

                        // Riassegna solo quando c'è un errore nel form
                        @if ($errors->any())
                        if ($("#province").data('oldid') != '' && typeof ($("#province").data('oldid')) != "undefined") {
                            $('#province').val($("#province").data('oldid'));
                            $("#province").data('oldid', '');
                        }

                        // Se è stata selezionata anche la città
                        if ($("#city").data('oldid') != '' && typeof ($("#city").data('oldid')) != "undefined") {
                            $('#province').change();
                        }
                        @endif
                    }
                });
            }

        });

        $('#province').change(function() {
            var province_id = $(this).val();

            // Reset città
            $('#city').val('').trigger('change').prop('disabled', true);

            if(province_id.trim() != '') {
                // Carica le città
                $.ajax({
                    url: "{{url('api/fetch-cities')}}",
                    type: "POST",
                    data: {
                        province_id: province_id,
                    },
                    dataType: 'json',
                    success: function (res) {
                        $('#city').html('<option value="">Seleziona...</option>');
                        $.each(res.cities, function (key, value) {
                            $("#city").append('<option value="' + value.id + '">' + value.name + '</option>');
                        });

                        // Abilita la selezione della città
                        $('#city').prop('disabled', false);

                        // Riassegna solo quando c'è un errore nel form
                        @if ($errors->any())
                        if ($("#city").data('oldid') != '' && typeof ($("#city").data('oldid')) != "undefined") {
                            $('#city').val($("#city").data('oldid'));
                            $("#city").data('oldid', '');
                        }
                        @endif
                    }
                });
            }
        });


</script>
</body>
</html>