<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\MessageReceived;
use Illuminate\Support\Facades\Mail;

class MessageController extends Controller
{
   /*  public function store (Request $request) {
      
      return $request; 
      //return $request->get('name) Para ver el campo name de la request.

      // tambien se puede llamar a la funcion request para llegar al mismo resultado. No haria falta pasarle los parametros a la funcion store y podriamos eliminar el 'use Illuminate\Http\Request';
      // return request ('name');
    } */

    public function store (Request $request) {
      
      $message = request()->validate([
          'name' => 'required',
          'email' => 'required|email',
          'subject' => 'required',
          'content' => 'required|min:3|max:255'
      ], [
        'name.required' => 'Introduce tu nombre completo.',
        'email.required' => 'Introduce un email correcto.',
        'subject.required' => 'El asunto no puede estar vacio.',
        'content.required' => 'El contenido debe tener entre 3 y 255 letras.'
      ]);

      Mail::to('pablo.grothcrew@hotmail.com')->queue(new MessageReceived($message));

      return back()->with('status', 'Recibido. Te responderemos en 24 horas.');
    }
}
