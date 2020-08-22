<?php

namespace App\Http\Controllers;

use App\Models\Reply;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class RepliesController extends Controller
{
	public function __construct()
	{
		$this->middleware('auth');
	}

	public function store(Request $request)
	{
		$request->validate([
			'content' => 'required|min:2|max:255'
		]);

		$reply = Reply::create([
			'content' => $request->content,
			'user_id' => Auth::id(),
			'topic_id' => $request->topic_id,
		]);
		return redirect()->to($reply->topic->link())->with('success', 'comment success!');
	}

	public function destroy(Reply $reply)
	{
		$this->authorize('destroy', $reply);
		$reply->delete();

		return redirect()->to($reply->topic->link())->with('success', 'Deleted successfully.');
	}
}
