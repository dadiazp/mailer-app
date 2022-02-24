<form method="POST" action="{{ route('register') }}">

<div class="modal fade" id="registerModal" tabindex="-1" role="dialog" aria-labelledby="registerModal" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="registerModal">Añadir usuario</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body pl-4">
        @include('auth.register')
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        <button class="btn btn-primary" type="submit">Guardar</button>
      </div>
    </div>
  </div>
</div>

</form>

@push('scripts')
  <script>
    @if (count($errors) > 0) 
        $('#registerModal').modal('show');
  
        if ({!! old('id') !!}) {
          $("#id_number").attr('readonly', 'readonly');
          $("#email").attr('readonly', 'readonly');
        }
    @endif

    $('#registerModal').on('hide.bs.modal', function(e){
        $("#id").val("");
        $("#name").val("");
        $("#id_number").val("").removeAttr("readonly");
        $("#birthday").val("");
        $("#phone").val("");

        $('#country').val("0");

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

        $("#email").val("").removeAttr("readonly");
    });

  </script>
@endpush
