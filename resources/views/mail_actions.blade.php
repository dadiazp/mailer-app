@php
    $recipient = App\Models\User::find($recipient_id);
    $mailData = array(
        'id' => $id,
        'recipient_id' => $recipient_id,
        'recipient' => $recipient,
        'subject' => $subject,
        'body' => $body,
    );
@endphp
<button data-toggle="modal" data-target="#mailModal" class="btn btn-primary btn-sm" data_mail="{{json_encode($mailData)}}">Ver</button>
