<form method="POST" action="{{ route('mail.create') }}">

<div class="modal fade" id="mailModal" tabindex="-1" role="dialog" aria-labelledby="mailModal" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="mailModal">Redactar</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body pl-4">
        @include('mail.mail_form')
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        <button class="btn btn-primary" type="submit" id="submit">Guardar</button>
      </div>
    </div>
  </div>
</div>

</form>
