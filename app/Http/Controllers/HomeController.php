<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Models\Quote;
use App\Models\Tag;
use Illuminate\Http\Request;

class HomeController extends Controller
{
	public function index()
	{
		$quotes = Quote::orderBy('created_at', 'desc')->paginate(10);
		$tags = Tag::all();

		return view('index', ['quotes' => $quotes, 'tags' => $tags]);
	}

	public function add(request $input){
		
		$quote = new Quote;
		$quote->author = $input->author;
		$quote->text = $input->quote;
		$quote->save();
		$quote->tags()->attach($input->tags);
		
		return redirect('/')->with('status','Цитата успешно добавлена!');
	}
} 
