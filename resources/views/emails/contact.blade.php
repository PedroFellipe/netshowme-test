@extends('layouts.email')

@section('content')
    <p style="line-height:21px;font-size:20px;margin-top:20px;margin-bottom:0px">Olá!<br><br>

        Você recebeu uma nova requisição de contato!<br>

    <p style="line-height:28px;font-size:20px;margin-top:20px;margin-bottom:0px;text-align:center">
        <strong style="line-height:inherit">Dados do contato</strong>
    </p>
    <br><br>
    <blockquote
        style="line-height:inherit;margin:20px 0px 0px;padding-left:14px;border-left:4px solid rgb(189,189,189)">
        <p style="line-height:21px;font-size:20px;margin-top:20px;margin-bottom:20px">
            - Nome: {{ $contact->name }}<br>
            - E-mail: {{ $contact->email }}<br>
            - Telefone: {{ $contact->phone }}<br>
            - Endereço IP: {{ $contact->ip }}<br>
            - Arquivo:<a href="{{ route('contact.attachment', $contact->id)  }}">Download!</a> <br>
            - Mensagem: {{ $contact->message }}<br>
        </p>
    </blockquote>
    <br><br>

    <b>Obs: Esse é apenas um e-mail informativo. Não responda este e-mail.</b><br>
@stop
