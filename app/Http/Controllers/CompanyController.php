<?php

namespace App\Http\Controllers;

use App\Repositories\Company\CompanyInterface;
use App\Repositories\Company\CompanyRepository as Company;
use App\Services\Pagination;
use Ecommerce\helperFunctions;
use Illuminate\Http\Request;
use View;

/**
 * Class CompanyController.
 *
 */
class CompanyController extends Controller
{
    protected $category;
    protected $perPage;

    public function __construct()
    {
        View::share('active', 'cart');
    }

    /**
     * Display a listing of the resource by slug.
     *
     * @param Request $request
     * @param $slug
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(Request $request, $slug)
    {
        $articles = $this->category->getArticlesBySlug($slug);

        $tags = $this->tag->all();
        $pagiData = $this->category->paginate($request->get('page', 1), $this->perPage, false);

        $categories = Pagination::makeLengthAware($pagiData->items, $pagiData->totalItems, $this->perPage);

        return view('frontend.category.index', compact('articles', 'tags', 'categories'))->with('cart', 'total');
    }

    public function show($id, Request $request)
    {
        $category = Company::find($id);
        if (strtoupper($request->sort) == 'NEWEST') {
            $products = $category->products()->orderBy('created_at', 'desc')->paginate(40);
        } elseif (strtoupper($request->sort) == 'HIGHEST') {
            $products = $category->products()->orderBy('price', 'desc')->paginate(40);
        } elseif (strtoupper($request->sort) == 'LOWEST') {
            $products = $category->products()->orderBy('price', 'asc')->paginate(40);
        } else {
            $products = $category->products()->paginate(40);
        }
        helperFunctions::getCartInfo($cart, $total);

        return view('frontend.category.show', compact('cart', 'total', 'category', 'products'));
    }
}
