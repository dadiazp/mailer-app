@php 
    $disabled = false;
    $city = App\Models\City::find($city_id);
    $user = array(
        'id' => $id,
        'name' => $name,
        'id_number' => $id_number,
        'birthday' => $birthday,
        'phone_number' => $phone_number,
        'country_id' => $city->state->country_id,
        'state_id' => $city->state_id,
        'city_id' => $city_id,
        'email' => $email
    );
    if (Auth::user()->id == $id) {
        $disabled = true;
    }
@endphp
<button data-toggle="modal" data-target="#registerModal"class="btn btn-primary btn-sm" data="{{json_encode($user)}}">Editar</button>
@if (!$disabled)
    <button class="btn"> <a class="btn btn-danger btn-sm"  href="{{ route('user.delete', $id) }}">Borrar</a></button>
@endif
