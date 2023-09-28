<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Relationship;

class RelationshipController extends Controller
{
    public function relationship(Relationship $relationship)
    {
        return $relationship->get();
    }
    
    //フォロー
    public function store($userid) {
        $user = \Auth::user();
        if (!$user->is_relationship($userid)) {
            $user->relationship_users()->attach($userid);
        }
        return back();
    }
    //フォロー解除
    public function destroy($userId) {
        $user = \Auth::user();
        if ($user->is_relationship($userId)) {
            $user->relationship_users()->detach($userId);
        }
        return back();
    }
}
