<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function success(Request $request)
    {
        $sessionId = $request->get('session_id');

        return redirect()->route('catalog.index')->with('success', 'Pago completado con éxito');
    }

    public function cancel()
    {
        return redirect()->route('catalog.index')->with('error', 'Pago cancelado');
    }
}
