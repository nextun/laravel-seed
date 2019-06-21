<?php
namespace App\Repositories;

use App\Repositories\ProductRepositoryInterface;
use App\Product;

class ProductRepository implements ProductRepositoryInterface
{
    // model property on class instances
    protected $productModel;

    // Constructor to bind model to repo
    public function __construct(Product $productModel)
    {
        $this->productModel = $productModel;
    }

    // Get all instances of model
    public function all()
    {
        return $this->productModel->all();
    }

    // create a new record in the database
    public function create(array $data)
    {
        return $this->productModel->create($data);
    }
    // show the record with the given id
    public function show($id)
    {
        return $this->productModel->findOrFail($id);
    }
    // update record in the database
    public function update(array $data, $id)
    {
        $record = $this->productModel->find($id);
        return $record->update($data);
    }

    // remove record from the database
    public function delete($id)
    {
        return $this->productModel->destroy($id);
    }

}