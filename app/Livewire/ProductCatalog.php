<?php

namespace App\Livewire;
use Livewire\Component;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;
use Stripe\Stripe;
use App\Models\Purchase;
use Stripe\Checkout\Session;


class ProductCatalog extends Component
{
    public $products;
    public $selectedProduct;
    public $amount;
    public $stripePublicKey;
    public $clientSecret;

    protected $listeners = ['openPaymentForm'];

    public function mount()
    {

    }

    public function render()
    {
        $this->products = Product::all();
        return view('livewire.product-catalog')->layout('layouts.app');
    }

    public function initiatePayment($productId)
    {
        if (!Auth::check()) {
            session()->flash('message', 'Debes iniciar sesión para realizar la compra.');
            return;
        }

        Stripe::setApiKey(env('STRIPE_SECRET'));

        $this->selectedProduct = Product::find($productId);

        $session = Session::create([
            'payment_method_types' => ['card'],
            'line_items' => [[
                'price_data' => [
                    'currency' => 'usd',
                    'product_data' => [
                        'name' => $this->selectedProduct->name,
                    ],
                    'unit_amount' => $this->selectedProduct->price * 100,
                ],
                'quantity' => 1,
            ]],
            'mode' => 'payment',
            'success_url' => route('payment.success', ['session_id' => '{CHECKOUT_SESSION_ID}']),
            'cancel_url' => route('payment.cancel'),
        ]);

        Purchase::create([
            'user_id' => Auth::id(),
            'product_id' => $this->selectedProduct->id,
            'stripe_payment_intent_id' => 1,
            'amount' => $this->selectedProduct->price,
        ]);

        return redirect($session->url, 303);
    }

}
