<?php

namespace App\Traits;

use Illuminate\Http\Request;

trait CrudTrait
{
    public function index()
    {
        // logic to display list of items
    }

    public function create()
    {
        // logic to display create form
    }

    public function store(Request $request)
    {
        // logic to store new item
    }

    public function edit($id)
    {
        // logic to display edit form for specific item
    }

    public function update(Request $request, $id)
    {
        // logic to update specific item
    }

    public function destroy($id)
    {
        // logic to delete specific item
    }
}