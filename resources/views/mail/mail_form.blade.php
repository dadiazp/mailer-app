@php
    $usersMail = $usersMail;
@endphp
<div>
    @csrf

    <input type="hidden" name="sender_id" value="{{Auth::user()->id}}">

  
    <div class="row mb-3">
        <label for="recipient" class="col-md-4 col-form-label text-md-end">{{ __('Destino') }}<span class="text-danger">*</span></label>
        <div class="col-md-12">
            <p id="text_value" class="d-none"></p>
            <select id="recipient" name="recipient_id" class="form-control @error('recipient_id') is-invalid @enderror"  autofocus>
                <option >-</option>
                @foreach($usersMail as $recipient) 
                    <option {{ ($recipient->id == old('recipient_id')) ? 'selected': '' }} value="{{$recipient->id}}">{{$recipient->email}}</option>
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
            <input id="subject" type="text" class="form-control @error('subject') is-invalid @enderror" name="subject" value="{{ old('subject') }}" autocomplete="subject" autofocus>

            @error('subject')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>

    <div class="row mb-3">
        <label for="body" class="col-md-4 col-form-label text-md-end">{{ __('Cuerpo') }}<span class="text-danger">*</span></label>

        <div class="col-md-12">
            <textarea id="body" class="form-control @error('body') is-invalid @enderror" name="body" value="{{ old('body') }}" autofocus></textarea>

            @error('body')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>
</div>
@push('scripts')
  <script>
    @if (count($errors) > 0) 
        $('#mailModal').modal('show');
    @endif

    $("#mailModal").on("show.bs.modal", function(e){
        const mail = $(e.relatedTarget).attr("data_mail") ? JSON.parse($(e.relatedTarget).attr("data_mail")) : undefined;

        if (mail) {
            $("#recipient option[value=" + mail.recipient_id + "]").attr('selected', 'selected')
            $("#subject").val(mail.subject).attr('disabled', 'disabled');
            $("#body").val(mail.body).attr('disabled', 'disabled');
            $("#recipient").css('display', 'none');
            $("#text_value").removeClass('d-none');
            $("#text_value").text(mail.recipient.email);
        }
    })

  </script>
@endpush