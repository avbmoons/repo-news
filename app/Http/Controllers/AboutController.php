<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    //страница приветствия
    public function index()
    {
        return view('about');
    }

    //для перехода к форме обратной связи
    public function createMail(): View
    {
        return \view('mail');
    }

    public function storeMail(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'comment' => 'required',
        ]);
        return response()->json($request->only(['username', 'comment']));
        //dd($request->all());
    }

    //для перехода к форме заказа выгрузки
    public function createOrder(): View
    {
        return \view('order');
    }

    public function storeOrder(Request $request)
    {
        // $request->validate([
        //     'username' => 'required',
        //     'userphone' => 'required',
        //     'useremail' => 'required',
        //     'orderinfo' => 'required',
        // ]);
        // return response()->json($request->only(['username', 'userphone', 'useremail', 'orderinfo']));
        //dd($request->all());
    }
}
