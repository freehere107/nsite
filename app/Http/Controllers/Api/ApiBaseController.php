<?php

namespace App\Http\Controllers\Api;

use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;
use App\Model\User;

class ApiBaseController extends BaseController
{
    protected $currentUser;

    public function __construct(Request $request)
    {
        $userID = $request->input('userID');
        $this->currentUser = $this->getCurrentUser($userID);
    }

    protected function getCurrentUser($userId)
    {
        return empty($userId) ? [] : User::find($userId);
    }
}
