<?php

namespace App\Http\Controllers;

use App\User;

class IndexController extends Controller
{
    public function index()
    {
        $paginate = request('paginate');
        $ordercolumn = request('ordercolumn');
        $order = request('order');
        $query = request('query');
        $usuarios = User::searching($query)->orderBy($ordercolumn ?? 'id', $order ?? 'ASC')->paginate($paginate ?? 5);
        return view('usuarios', compact('usuarios'));
    }
}
