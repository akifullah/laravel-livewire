<?php

namespace App\Livewire;

use App\Models\Article;
use App\Models\Category;
use Livewire\Attributes\Url;
use Livewire\Component;

class ShowBlog extends Component
{

    #[Url]
    public $categorySlug = null;
    public function render()
    {
        
        $data["categories"] = Category::whereStatus(1)->latest()->get();
        if (!empty($this->categorySlug)) {
            $category = Category::whereStatus(1)->where("slug", $this->categorySlug)->first();
            $data["blogs"] = Article::orderBy("created_at", "DESC")
                ->where("category_id", $category->id)
                ->get();
        } else {
            $data["blogs"] = Article::orderBy("created_at", "DESC")->get();
        }

        return view('livewire.show-blog', $data);
    }
}
