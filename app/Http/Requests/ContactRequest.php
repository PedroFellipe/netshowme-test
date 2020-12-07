<?php

namespace App\Http\Requests;

class ContactRequest extends BaseRequest
{
    /**
     * Register* Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required|string|max:150',
            'email' => 'required|email',
            'phone' => 'required|string',
            'message' => 'required|string',
            'attachment' => 'required|file|max:500|mimes:pdf,doc,docx,odt,txt'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'O campo Nome é obrigatório',
            'name.max' => 'O campo Nome deve ter no máximo 150 caracteres',
            'email.required' => 'O campo E-mail é obrigatório',
            'email.email' => 'O campo E-mail deve conter um endereço de e-email válido',
            'phone.required' => 'O campo Telefone é obrigatório',
            'message.required' => 'O campo Mensagem é obrigatório',
            'attachment.required' => 'O campo Anexo é obrigatório',
            'attachment.file' => 'Você deve fazer o upload de um arquivo no campo anexo',
            'attachment.max' => 'O anexo não deve ter mais que 500kb',
            'attachment.mimes' => 'O anexo deve ser de um dos seguintes tipos:pdf, doc, docx, odt, txt',

        ];
    }
}
