<?php

namespace App\Exports;

use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromView;

class UsersExport implements FromView
{

    use Exportable;
    public $users;

    public function __construct($users)
    {

        $this->users = $users;
    }
    public function view()
    : View
    {
        $users = $this->users;
        return view('exports.users.table',compact('users'));
    }
}
