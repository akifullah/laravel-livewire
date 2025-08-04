<?php

use App\Livewire\BlogDetail;
use App\Livewire\ShowBlog;
use App\Livewire\ShowFaqPage;
use App\Livewire\ShowHome;
use App\Livewire\ShowPage;
use App\Livewire\ShowServiceDetail;
use App\Livewire\ShowServicePage;
use App\Livewire\ShowTeamPage;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get("/", ShowHome::class)->name("home");
Route::get("/services", ShowServicePage::class)->name("services");
Route::get("/services/{id}", ShowServiceDetail::class)->name("services-details");

Route::get("/teams", ShowTeamPage::class)->name("teams");
Route::get("/blogs", ShowBlog::class)->name("blogs");
Route::get("/blogs/{id}", BlogDetail::class)->name("blogDetail");

Route::get("/faqs", ShowFaqPage::class)->name("faqs");
Route::get("/page/{id}", ShowPage::class)->name("page");