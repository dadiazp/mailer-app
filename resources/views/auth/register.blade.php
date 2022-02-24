@php 
  $countries = $countries;
  $getStatesRoute = env('APP_URL', null) . 'get-states';
  $getCitiesRoute = env('APP_URL', null) . 'get-cities';
@endphp
<div>
        <input type="hidden" name="_token" value="{{csrf_token()}}" id="token">
        @csrf

        <input type="hidden" name="id" id="id" value="{{ old('id') }}">

        <div class="row mb-3">
            <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Nombre') }}<span class="text-danger">*</span></label>

            <div class="col-md-6">
                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autofocus>

                @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>

        <div class="row mb-3">
            <label for="id_number" class="col-md-4 col-form-label text-md-end">{{ __('Cédula') }}<span class="text-danger">*</span></label>

            <div class="col-md-6">
                <input id="id_number" type="text" class="form-control @error('id_number') is-invalid @enderror" name="id_number" value="{{ old('id_number') }}" required autofocus>

                @error('id_number')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>

        <div class="row mb-3">
            <label for="birthday" class="col-md-4 col-form-label text-md-end">{{ __('Fecha de nacimiento') }}<span class="text-danger">*</span></label>

            <div class="col-md-6">
                <input id="birthday" type="date" class="form-control @error('birthday') is-invalid @enderror" name="birthday" value="{{ old('birthday') }}" required autofocus>

                @error('birthday')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>

        <div class="row mb-3">
            <label for="phone" class="col-md-4 col-form-label text-md-end">{{ __('Teléfono') }}</label>

            <div class="col-md-6">
                <input id="phone" type="text" class="form-control @error('phone_number') is-invalid @enderror" name="phone_number" value="{{ old('phone_number') }}" autofocus>

                @error('phone_number')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>

        <div class="row mb-3">
            <label for="country" class="col-md-4 col-form-label text-md-end">{{ __('País') }}<span class="text-danger">*</span></label>
            <div class="col-md-6">
                <select id="country" name="country_id" class="form-control @error('country_id') is-invalid @enderror" required autofocus>
                    <option value="0">Seleccione un país</option>
                    @foreach($countries as $country)
                        <option value="{{$country->id}}">{{$country->name}}</option>
                    @endforeach
                </select>

                @error('country_id')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>

        <div class="row mb-3">
            <label for="state" class="col-md-4 col-form-label text-md-end">{{ __('Estado') }}<span class="text-danger">*</span></label>
            <div class="col-md-6">
                <select id="state" name="state_id" class="form-control @error('state_id') is-invalid @enderror"  required autofocus>
                    <option value="-">-</option>
                </select>

                @error('country_id')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>
        
        <div class="row mb-3">
            <label for="city" class="col-md-4 col-form-label text-md-end">{{ __('Ciudad') }}<span class="text-danger">*</span></label>
            <div class="col-md-6">
                <select id="city" name="city_id" class="form-control @error('city_id') is-invalid @enderror" required autofocus>
                    <option value="">-</option>
                </select>

                @error('city_id')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>

        <div class="row mb-3">
            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email') }}<span class="text-danger">*</span></label>

            <div class="col-md-6">
                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required>

                @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>

        <div class="row mb-3">
            <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Contraseña') }}<span class="text-danger">*</span></label>

            <div class="col-md-6">
                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password">

                @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>

        <div class="row mb-3">
            <label for="password-confirm" class="col-md-4 col-form-label text-md-end">{{ __('Repita su contraseña') }}<span class="text-danger">*</span></label>

            <div class="col-md-6">
                <input id="password-confirm" type="password" class="form-control" name="password_confirmation">
            </div>
        </div>
</div>

@push('scripts')
   <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
   <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    
   <script>

       var getStatesRoute = '{!! $getStatesRoute !!}';
       var getCitiesRoute = '{!! $getCitiesRoute !!}';
       var token = $('#token').val();
           
        $("#registerModal").on("show.bs.modal", function(e){
        const user = $(e.relatedTarget).attr("data") ? JSON.parse($(e.relatedTarget).attr("data")) : undefined;

            if (user) {
                console.log(user)
                $("#id").val(user.id);
                $("#name").val(user.name);
                $("#id_number").val(user.id_number).attr('readonly', 'readonly');
                $("#birthday").val(user.birthday);
                $("#phone").val(user.phone_number);

                $("#country").val(user.country_id.toString())

                getStatesByCountry(user.country_id, user.state_id);
                getCitiesByState(user.state_id, user.city_id);

                $("#state").val(user.state_id.toString())
                $("#city").val(user.city_id.toString())

                $("#email").val(user.email).attr('readonly', 'readonly');
                $("#password").val(user.password);
                $("#confirm_password").val(user.password_confirm);
            }
        })

        $(document).ready(function() {

            $('select[name = country_id]').change(function() {
                $('#state option').each(function() {
                    if (this.text !== '-') {
                        this.remove();
                    }
                });

                $('#city option').each(function() {
                    if (this.text !== '-') {
                        this.remove();
                    }
                });

                if (this.value) {
                    getStatesByCountry(this.value);
                }
            });

            $('select[name = state_id]').change(function() {
                $('#city option').each(function() {
                    if (this.text !== '-') {
                        this.remove();
                    }
                });

                if (this.value) {
                    getCitiesByState(this.value);
                }
            });             
        });

        function getStatesByCountry(country_id, state_id) {
                $.ajax({
                    url: getStatesRoute + "/" + country_id,
                    headers: {'X-CSRF-TOKEN': token},
                    type: 'GET',
                    dataType: 'json',
                    success: function(data){
                        var states = data;
                        states.forEach(state => {
                            $('#state').append(new Option(state.name, state.id))
                        });
                        
                        if(state_id){
                            $("#state option[value=" + state_id + "]").attr('selected', 'selected');
                        }
                    }
                });
            }

        function getCitiesByState(state_id, city_id) {
            $.ajax({
                url: getCitiesRoute + "/" + state_id,
                headers: {'X-CSRF-TOKEN': token},
                type: 'GET',
                dataType: 'json',
                success: function(data){
                    var cities = data;
                    cities.forEach(city => {
                        $('#city').append(new Option(city.name, city.id))
                    });
                    
                    if(city_id){
                        $("#city option[value=" + city_id + "]").attr('selected', 'selected');
                    }
                }
            }); 
        }

   </script>
@endpush

