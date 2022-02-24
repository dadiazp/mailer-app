<div>
    @csrf

    <div class="row mb-3">
        <label for="recipient" class="col-md-4 col-form-label text-md-end">{{ __('Destino') }}<span class="text-danger">*</span></label>
        <div class="col-md-12">
            <select id="recipient" name="recipient_id" class="form-control @error('recipient_id') is-invalid @enderror" required autofocus>
                <option value="">-</option>
                @foreach($users as $user) 
                    <option value="{{$user->id}}">{{$user->email}}</option>
                @endforeach
            </select>

            @error('recipient_id')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>

    <div class="row mb-3">
        <label for="subject" class="col-md-4 col-form-label text-md-end">{{ __('Asunto') }}</label>

        <div class="col-md-12">
            <input id="subject" type="text" class="form-control @error('subject') is-invalid @enderror" name="subject" value="{{ old('subject') }}" required autocomplete="subject" autofocus>

            @error('subject')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>

    <div class="row mb-3">
        <label for="body" class="col-md-4 col-form-label text-md-end">{{ __('Cuerpo') }}</label>

        <div class="col-md-12">
            <textarea id="body" class="form-control @error('body') is-invalid @enderror" name="body" value="{{ old('body') }}" required autofocus></textarea>

            @error('body')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>
</div>