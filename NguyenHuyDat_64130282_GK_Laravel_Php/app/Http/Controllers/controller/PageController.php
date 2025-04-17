<?php

namespace App\Http\Controllers\controller;

use App\Http\Controllers\Controller;
use App\Models\Page;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PageController extends Controller
{
    public function index(Request $request)
    {
        $pages = Page::latest();

        if (!empty($request->get('keyword'))) {
            $pages = $pages->where('pageName', 'like', '%' . $request->get('keyword') . '%');
        }

        $pages = $pages->paginate(5);

        return view('homeController.page.list', compact('pages'));
    }

    public function create()
    {
        return view('homeController.page.create');
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'pageName' => 'required',
        ]);

        if ($validator->passes()) {
            $page = new Page();
            $page->pageName = $request->pageName;
            $page->keyword = $request->keyword;
            $page->content = $request->content;
            $page->parentPageId = $request->parentPageId;
            $page->save();

            $request->session()->flash('success', 'Page added successfully!');

            return response()->json([
                'status' => true,
                'message' => 'Page added successfully!'
            ]);
        } else {
            return response()->json([
                'status' => false,
                'errors' => $validator->errors()
            ]);
        }
    }

    public function view($pageId, Request $request)
    {
        $page = Page::find($pageId);

        if (empty($page)) {
            return redirect()->route('pages.index');
        }

        return view('homeController.page.view', compact('page'));
    }

    public function edit($pageId, Request $request)
    {
        $page = Page::find($pageId);

        if (empty($page)) {
            return redirect()->route('pages.index');
        }

        return view('homeController.page.edit', compact('page'));
    }

    public function update($pageId, Request $request)
    {
        $page = Page::find($pageId);

        if (empty($page)) {
            return response()->json([
                'status' => false,
                'notFound' => true,
                'message' => 'Page not found!'
            ]);
        }

        $validator = Validator::make($request->all(), [
            'pageName' => 'required',
        ]);

        if ($validator->passes()) {
            $page->pageName = $request->pageName;
            $page->keyword = $request->keyword;
            $page->content = $request->content;
            $page->parentPageId = $request->parentPageId;
            $page->save();

            $request->session()->flash('success', 'Page updated successfully!');

            return response()->json([
                'status' => true,
                'message' => 'Page updated successfully!'
            ]);
        } else {
            return response()->json([
                'status' => false,
                'errors' => $validator->errors()
            ]);
        }
    }

    public function destroy($pageId, Request $request)
    {
        $page = Page::find($pageId);

        if (empty($page)) {
            return redirect()->route('pages.index');
        }

        $page->delete();

        $request->session()->flash('success', 'Page deleted successfully!');

        return response()->json([
            'status' => true,
            'message' => 'Page deleted successfully!'
        ]);
    }
}
