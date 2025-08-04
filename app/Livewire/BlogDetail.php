<?php

namespace App\Livewire;

use App\Models\Article;
use Livewire\Component;

class BlogDetail extends Component
{
    public $blogId;
    public function mount($id)
    {
        $this->blogId = $id;
        // Here you would typically fetch the blog details from the database
        // $this->blog = Blog::find($id);
    }   
    public function render()
    {
        $data["blog"] = Article::with("category")->findOrFail($this->blogId);
        return view('livewire.blog-detail', $data);
    }
}
