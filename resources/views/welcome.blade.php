<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Invia Richiesta </title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <!-- Styles -->

</head>
<body class="vh-100">
<section class="container vh-100">
    <div class="row vh-100 justify-content-center align-items-center">
        <div class="col-md-6">
            <h1 class="mb-4">Invia la tua richiesta</h1>
            <form action="{{route('post')}}" id="postForm" method="POST">
                @csrf
                <div class="row mb-3">
                    <label for="name" class="col-sm-3 col-form-label">Nome</label>
                    <div class="col-sm-9">
                        <input type="text" placeholder="Nome" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" requiredd autofocus >
                        @error('name')
                        <span class="invalid-feedback" role="alert">
                                  <strong>{{ $message }}</strong>
                                </span>
                        @enderror
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="surname" class="col-sm-3 col-form-label">Cognome</label>
                    <div class="col-sm-9">
                        <input type="text" placeholder="Cognome" class="form-control @error('surname') is-invalid @enderror" name="surname" value="{{ old('surname') }}" requiredd autofocus >
                        @error('surname')
                        <span class="invalid-feedback" role="alert">
                                  <strong>{{ $message }}</strong>
                                </span>
                        @enderror
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="date_of_birth" class="col-sm-3 col-form-label">Data di nascita</label>
                    <div class="col-sm-9">
                        <input id="date_of_birth"
                               class="form-control @error('date_of_birth') is-invalid @enderror"
                               type="date"
                               {{--onfocus="(this.type='date')"
                               onblur="(this.value == '' ? this.type='text' : this.type='date')"--}}
                               name="date_of_birth"
                               value="{{ old('date_of_birth')}}"
                               {{--placeholder="Data di nascita"--}} requiredd autocomplete autofocus />
                        @error('date_of_birth')
                        <div class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </div>
                        @enderror
                    </div>
                </div>


                <div class="row mb-3">
                    <label for="province" class="col-sm-3 col-form-label">Provincia</label>
                    <div class="col-sm-9">
                        <div class="form-group">
                            <select class="form-control @error('province') is-invalid @enderror" id="province" name="province" value="{{ old('province') }}" requiredd focus>
                                <option value="">Seleziona...</option>
                                @foreach ($provinces as $province)
                                    <option value="{{$province->id}}">{{$province->name}}</option>
                                @endforeach
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
                    <label for="city" class="col-sm-3 col-form-label">Comune</label>
                    <div class="col-sm-9">
                        <div class="form-group">
                            <select class="form-control @error('city') is-invalid @enderror" id="city" name="city" value="{{ old('ctiy') }}" disabled requiredd focus>
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
                    <label for="request" class="col-sm-3 col-form-label">Richiesta</label>
                    <div class="col-sm-9">
                        <textarea class="form-control @error('request') is-invalid @enderror" name="request" placeholder="Scrivi la tua richiesta"  autofocus requireddd>{{ old('request') }}</textarea>
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
<script>
    $(document).ready(function () {

        /*Chimata ajax selezione Provincia*/
        /*Seleziona valore dropdown*/
        $('#province').on('change', function () {
            var province_id = this.value;
            $.ajax({
                url: "{{url('api/fetch-cities')}}",
                type: "POST",
                data: {
                    province_id: province_id,
                    _token: '{{csrf_token()}}'
                },
                dataType: 'json',
                success: function (res) {
                    if ($('#city').prop('disabled')) {
                        $('#city').removeAttr('disabled');
                    }

                    $('#city').html('<option value="">Seleziona...</option>');
                    $.each(res.cities, function (key, value) {
                        $("#city").append('<option value="' + value
                            .id + '">' + value.name + '</option>');
                    });
                }
            });
        });

    });
</script>
</body>
</html>