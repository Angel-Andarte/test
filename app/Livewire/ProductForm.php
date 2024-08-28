<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\Product;
class ProductForm extends Component
{

    use WithFileUploads;

    public $products, $name, $description, $price, $image, $product_id;
    public $isOpen = 0;

    public function render()
    {
        $this->products = Product::all();
        return view('livewire.product-form')->layout('layouts.app');
    }

    public function create()
    {
        $this->resetInputFields();
        $this->openModal();
    }

    public function openModal()
    {
        $this->isOpen = true;
    }

    public function closeModal()
    {
        $this->isOpen = false;
    }

    public function save()
    {
        $this->validate([
            'name' => 'required',
            'description' => 'required',
            'price' => 'required|numeric',
            'image' => 'image|max:1024',
        ]);

        $imagePath = $this->image->store('images', 'public');

        Product::updateOrCreate(
            ['id' => $this->product_id],
            [
                'name' => $this->name,
                'description' => $this->description,
                'price' => $this->price,
                'image' => $imagePath
            ]
        );

        session()->flash('message', $this->product_id ? 'Producto actualizado.' : 'Producto creado.');

        $this->closeModal();
        $this->resetInputFields();
    }

    public function edit($id)
    {
        $product = Product::findOrFail($id);
        $this->product_id = $id;
        $this->name = $product->name;
        $this->description = $product->description;
        $this->price = $product->price;
        $this->image = $product->image;
        $this->openModal();
    }

    public function delete($id)
    {
        Product::find($id)->delete();
        session()->flash('message', 'Producto eliminado.');
    }

    private function resetInputFields()
    {
        $this->name = '';
        $this->description = '';
        $this->price = '';
        $this->image = null;
        $this->product_id = null;
    }
}
