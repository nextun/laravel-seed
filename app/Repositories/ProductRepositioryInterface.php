<?php

/*
 * An interface is a contract that defines the methods a class MUST have defined
 *
 * */

namespace App\Repositories;


interface ProductRepositoryInterface {

    public function show($id);

    public function all();

    public function create(array $data);

    public function update(array $data,  $id);

    public function delete($id);
}