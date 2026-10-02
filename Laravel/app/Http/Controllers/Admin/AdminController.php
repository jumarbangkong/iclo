<?php

namespace App\Http\Controllers\Admin;

use App\Models\Author;
use App\Models\Article;
use App\Models\Category;
use App\Models\Resource;
use App\Models\ResourceCategory;
use App\Models\Sector;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class AdminController extends Controller
{
    /**
     * Show the login form.
     */
    public function showLogin()
    {
        if (Auth::check()) {
            return redirect()->route('admin.dashboard');
        }
        return view('admin.login');
    }

    /**
     * Handle admin login request.
     */
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->route('admin.dashboard')->with('success', 'Selamat datang kembali!');
        }

        return back()->withErrors([
            'email' => 'Kredensial yang dimasukkan tidak cocok dengan catatan kami.',
        ])->onlyInput('email');
    }

    /**
     * Handle admin logout.
     */
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('admin.login')->with('success', 'Anda telah berhasil keluar.');
    }

    /**
     * Helper to check authentication in controller actions.
     */
    private function checkAuth()
    {
        if (!Auth::check()) {
            abort(403, 'Unauthorized. Please login first.');
        }
    }

    /**
     * Admin Dashboard main page.
     */
    public function dashboard()
    {
        $this->checkAuth();

        $totalArticles = Article::count();
        $totalAuthors = Author::count();
        $publishedCount = Article::where('status', 'published')->count();
        $draftCount = Article::where('status', 'draft')->count();

        $recentArticles = Article::with('author')
            ->orderBy('created_at', 'desc')
            ->take(5)
            ->get();

        return view('admin.dashboard', compact(
            'totalArticles', 'totalAuthors', 'publishedCount', 'draftCount', 'recentArticles'
        ));
    }

    /* -------------------------------------------------------------------------- */
    /*                                PROFILE SETTINGS                            */
    /* -------------------------------------------------------------------------- */

    public function profileEdit()
    {
        $this->checkAuth();
        $user = Auth::user();
        return view('admin.profile.edit', compact('user'));
    }

    public function profileUpdate(Request $request)
    {
        $this->checkAuth();
        $user = Auth::user();

        $request->validate([
            'email' => 'required|email|unique:users,email,' . $user->id,
            'password' => 'nullable|min:6|confirmed',
        ]);

        $user->email = $request->email;
        
        if ($request->filled('password')) {
            $user->password = bcrypt($request->password);
        }

        $user->save();

        return redirect()->route('admin.profile.edit')->with('success', 'Profil admin berhasil diperbarui!');
    }

    /* -------------------------------------------------------------------------- */
    /*                                AUTHORS CRUD                                */
    /* -------------------------------------------------------------------------- */

    public function authorsIndex()
    {
        $this->checkAuth();
        $authors = Author::withCount('articles')->orderBy('name', 'asc')->get();
        return view('admin.authors.index', compact('authors'));
    }

    public function authorsCreate()
    {
        $this->checkAuth();
        return view('admin.authors.create');
    }

    public function authorsStore(Request $request)
    {
        $this->checkAuth();
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:authors,email',
            'bio' => 'nullable|string',
            'avatar_file' => 'nullable|image|max:2048',
            'avatar_url' => 'nullable|url',
        ]);

        $avatar = $request->input('avatar_url');

        if ($request->hasFile('avatar_file')) {
            $file = $request->file('avatar_file');
            $filename = time() . '_' . Str::random(8) . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('uploads/avatars'), $filename);
            $avatar = asset('uploads/avatars/' . $filename);
        }

        Author::create([
            'name' => $request->name,
            'email' => $request->email,
            'bio' => $request->bio,
            'avatar' => $avatar,
        ]);

        return redirect()->route('admin.authors.index')->with('success', 'Penulis berhasil ditambahkan!');
    }

    public function authorsEdit($id)
    {
        $this->checkAuth();
        $author = Author::findOrFail($id);
        return view('admin.authors.edit', compact('author'));
    }

    public function authorsUpdate(Request $request, $id)
    {
        $this->checkAuth();
        $author = Author::findOrFail($id);

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:authors,email,' . $id,
            'bio' => 'nullable|string',
            'avatar_file' => 'nullable|image|max:2048',
            'avatar_url' => 'nullable|url',
        ]);

        $avatar = $request->input('avatar_url') ?: $author->avatar;

        if ($request->hasFile('avatar_file')) {
            $file = $request->file('avatar_file');
            $filename = time() . '_' . Str::random(8) . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('uploads/avatars'), $filename);
            $avatar = asset('uploads/avatars/' . $filename);
        }

        $author->update([
            'name' => $request->name,
            'email' => $request->email,
            'bio' => $request->bio,
            'avatar' => $avatar,
        ]);

        return redirect()->route('admin.authors.index')->with('success', 'Penulis berhasil diperbarui!');
    }

    public function authorsDestroy($id)
    {
        $this->checkAuth();
        $author = Author::findOrFail($id);
        $author->delete();
        return redirect()->route('admin.authors.index')->with('success', 'Penulis berhasil dihapus.');
    }

    /* -------------------------------------------------------------------------- */
    /*                              CATEGORIES CRUD                               */
    /* -------------------------------------------------------------------------- */

    public function categoriesIndex()
    {
        $this->checkAuth();
        $categories = Category::withCount('articles')->orderBy('name', 'asc')->get();
        return view('admin.categories.index', compact('categories'));
    }

    public function categoriesCreate()
    {
        $this->checkAuth();
        return view('admin.categories.create');
    }

    public function categoriesStore(Request $request)
    {
        $this->checkAuth();
        $request->validate([
            'name' => 'required|string|max:255',
            'slug' => 'required|string|unique:categories,slug',
        ]);

        Category::create([
            'name' => $request->name,
            'slug' => Str::slug($request->slug),
        ]);

        return redirect()->route('admin.categories.index')->with('success', 'Kategori berhasil ditambahkan!');
    }

    public function categoriesEdit($id)
    {
        $this->checkAuth();
        $category = Category::findOrFail($id);
        return view('admin.categories.edit', compact('category'));
    }

    public function categoriesUpdate(Request $request, $id)
    {
        $this->checkAuth();
        $category = Category::findOrFail($id);

        $request->validate([
            'name' => 'required|string|max:255',
            'slug' => 'required|string|unique:categories,slug,' . $id,
        ]);

        $category->update([
            'name' => $request->name,
            'slug' => Str::slug($request->slug),
        ]);

        return redirect()->route('admin.categories.index')->with('success', 'Kategori berhasil diperbarui!');
    }

    public function categoriesDestroy($id)
    {
        $this->checkAuth();
        $category = Category::findOrFail($id);
        $category->delete();
        return redirect()->route('admin.categories.index')->with('success', 'Kategori berhasil dihapus.');
    }

    /* -------------------------------------------------------------------------- */
    /*                               ARTICLES CRUD                                */
    /* -------------------------------------------------------------------------- */

    public function articlesIndex()
    {
        $this->checkAuth();
        $articles = Article::with(['author', 'category'])->orderBy('created_at', 'desc')->paginate(10);
        return view('admin.articles.index', compact('articles'));
    }

    public function articlesCreate()
    {
        $this->checkAuth();
        $authors = Author::orderBy('name', 'asc')->get();
        $categories = Category::orderBy('name', 'asc')->get();
        return view('admin.articles.create', compact('authors', 'categories'));
    }

    public function articlesStore(Request $request)
    {
        $this->checkAuth();
        $request->validate([
            'title' => 'required|string|max:255',
            'slug' => 'required|string|unique:articles,slug',
            'author_id' => 'required|exists:authors,id',
            'category_id' => 'nullable|exists:categories,id',
            'excerpt' => 'nullable|string|max:1000',
            'content' => 'required|string',
            'status' => 'required|in:draft,published',
            'cover_file' => 'nullable|image|max:4096',
            'cover_url' => 'nullable|string',
        ]);

        $coverImage = $request->input('cover_url');

if ($request->hasFile('cover_file')) {
    $file = $request->file('cover_file');
    $filename = time() . '_' . Str::random(8) . '.' . $file->getClientOriginalExtension();
    
    // PERBAIKAN: Arahkan ke public_html
    $destinationPath = base_path('../public_html/uploads/covers');
    $file->move($destinationPath, $filename);
    
    $coverImage = asset('uploads/covers/' . $filename);
}

$publishedAt = null;
if ($request->status === 'published') {
    $publishedAt = now();
}

        Article::create([
            'title' => $request->title,
            'slug' => Str::slug($request->slug),
            'author_id' => $request->author_id,
            'category_id' => $request->category_id,
            'excerpt' => $request->excerpt,
            'content' => $request->content,
            'status' => $request->status,
            'cover_image' => $coverImage,
            'published_at' => $publishedAt,
        ]);

        return redirect()->route('admin.articles.index')->with('success', 'Artikel berhasil diterbitkan!');
    }

    public function articlesEdit($id)
    {
        $this->checkAuth();
        $article = Article::findOrFail($id);
        $authors = Author::orderBy('name', 'asc')->get();
        $categories = Category::orderBy('name', 'asc')->get();
        return view('admin.articles.edit', compact('article', 'authors', 'categories'));
    }

    public function articlesUpdate(Request $request, $id)
    {
        $this->checkAuth();
        $article = Article::findOrFail($id);

        $request->validate([
            'title' => 'required|string|max:255',
            'slug' => 'required|string|unique:articles,slug,' . $id,
            'author_id' => 'required|exists:authors,id',
            'category_id' => 'nullable|exists:categories,id',
            'excerpt' => 'nullable|string|max:1000',
            'content' => 'required|string',
            'status' => 'required|in:draft,published',
            'cover_file' => 'nullable|image|max:4096',
            'cover_url' => 'nullable|string',
        ]);

        $coverImage = $request->input('cover_url') ?: $article->cover_image;

if ($request->hasFile('cover_file')) {
    // === TAMBAHKAN BLOK INI UNTUK MENGHAPUS GAMBAR LAMA ===
    // 1. Cek apakah di database sudah ada gambar lama, dan pastikan itu file lokal
    if ($article->cover_image && str_contains($article->cover_image, 'uploads/covers/')) {
        // Ambil nama filenya saja dari URL panjang
        $oldFilename = basename($article->cover_image);
        
        // Tentukan jalur fisik file lama tersebut
        $oldImagePath = base_path('../public_html/uploads/covers/' . $oldFilename);
        
        // Jika file fisiknya ada di server, maka hapus
        if (file_exists($oldImagePath)) {
            unlink($oldImagePath);
        }
    }
    // =======================================================

    // === PROSES UPLOAD GAMBAR BARU ===
    $file = $request->file('cover_file');
    $filename = time() . '_' . Str::random(8) . '.' . $file->getClientOriginalExtension();
    
    // Tentukan target folder secara manual ke public_html
    $destinationPath = base_path('../public_html/uploads/covers');
    
    // Pindahkan file langsung ke public_html
    $file->move($destinationPath, $filename);
    
    // Simpan URL lengkapnya (asset) agar cocok dengan kode Blade Anda
    $coverImage = asset('uploads/covers/' . $filename);
}

        $publishedAt = $article->published_at;
        if ($request->status === 'published' && !$article->published_at) {
            $publishedAt = now();
        } elseif ($request->status === 'draft') {
            $publishedAt = null;
        }

        $article->update([
            'title' => $request->title,
            'slug' => Str::slug($request->slug),
            'author_id' => $request->author_id,
            'category_id' => $request->category_id,
            'excerpt' => $request->excerpt,
            'content' => $request->content,
            'status' => $request->status,
            'cover_image' => $coverImage,
            'published_at' => $publishedAt,
        ]);

        return redirect()->route('admin.articles.index')->with('success', 'Artikel berhasil diperbarui!');
    }

    public function articlesDestroy($id)
{
    $this->checkAuth();
    $article = Article::findOrFail($id);

    // 1. Cek apakah artikel memiliki gambar, DAN pastikan itu gambar lokal (bukan link luar/Unsplash)
    if ($article->cover_image && str_contains($article->cover_image, 'uploads/covers/')) {
        
        // 2. Ambil hanya nama filenya saja dari URL panjang (misal: gambar.jpg)
        $filename = basename($article->cover_image);
        
        // 3. Tentukan jalur fisik file tersebut di dalam folder public_html
        $imagePath = base_path('../public_html/uploads/covers/' . $filename);
        
        // 4. Jika filenya benar-benar ada di server, hapus file tersebut
        if (file_exists($imagePath)) {
            unlink($imagePath);
        }
    }

    // 5. Hapus data dari database
    $article->delete();
    
    return redirect()->route('admin.articles.index')->with('success', 'Artikel beserta gambarnya berhasil dihapus.');
}

    /* -------------------------------------------------------------------------- */
    /*                               RESOURCES CRUD                               */
    /* -------------------------------------------------------------------------- */

    public function resourcesIndex()
    {
        $this->checkAuth();
        $resources = Resource::with(['author', 'category'])->orderBy('created_at', 'desc')->paginate(10);
        return view('admin.resources.index', compact('resources'));
    }

    public function resourcesCreate()
    {
        $this->checkAuth();
        $authors = Author::orderBy('name', 'asc')->get();
        $categories = ResourceCategory::orderBy('name', 'asc')->get();
        return view('admin.resources.create', compact('authors', 'categories'));
    }

    public function resourcesStore(Request $request)
    {
        $this->checkAuth();
        $request->validate([
            'title' => 'required|string|max:255',
            'author_id' => 'nullable|exists:authors,id',
            'resource_category_id' => 'required|exists:resource_categories,id',
            'description' => 'nullable|string',
            'file_upload' => 'nullable|file|max:10240',
            'external_link' => 'nullable|string',
        ]);

        $filePath = null;
if ($request->hasFile('file_upload')) {
    $file = $request->file('file_upload');
    $filename = time() . '_' . Str::random(8) . '.' . $file->getClientOriginalExtension();
    
    // PERBAIKAN: Arahkan keluar dari folder Laravel dan masuk ke public_html
    $destinationPath = base_path('../public_html/uploads/resources');
    $file->move($destinationPath, $filename);
    
    $filePath = asset('uploads/resources/' . $filename);
}

        Resource::create([
            'title' => $request->title,
            'author_id' => $request->author_id,
            'resource_category_id' => $request->resource_category_id,
            'description' => $request->description,
            'file_path' => $filePath,
            'external_link' => $request->external_link,
            'published_at' => now(),
        ]);

        return redirect()->route('admin.resources.index')->with('success', 'Resource berhasil ditambahkan!');
    }

    public function resourcesEdit($id)
    {
        $this->checkAuth();
        $resource = Resource::findOrFail($id);
        $authors = Author::orderBy('name', 'asc')->get();
        $categories = ResourceCategory::orderBy('name', 'asc')->get();
        return view('admin.resources.edit', compact('resource', 'authors', 'categories'));
    }

    public function resourcesUpdate(Request $request, $id)
    {
        $this->checkAuth();
        $resource = Resource::findOrFail($id);

        $request->validate([
            'title' => 'required|string|max:255',
            'author_id' => 'nullable|exists:authors,id',
            'resource_category_id' => 'required|exists:resource_categories,id',
            'description' => 'nullable|string',
            'file_upload' => 'nullable|file|max:10240',
            'external_link' => 'nullable|string',
        ]);

        $filePath = $resource->file_path;

// JIKA USER MENG-UPLOAD FILE BARU
        if ($request->hasFile('file_upload')) {
            
            // === 1. HAPUS FILE FISIK YANG LAMA DULU ===
            if ($resource->file_path && str_contains($resource->file_path, 'uploads/resources/')) {
                $oldFilename = basename($resource->file_path);
                $oldFilePath = base_path('../public_html/uploads/resources/' . $oldFilename);
                
                // Jika file lamanya ada di server, hapus!
                if (file_exists($oldFilePath)) {
                    unlink($oldFilePath);
                }
            }
            // ==========================================

            // === 2. PROSES UPLOAD FILE BARU ===
            $file = $request->file('file_upload');
            $filename = time() . '_' . Str::random(8) . '.' . $file->getClientOriginalExtension();
            
            // Arahkan masuk ke public_html
            $destinationPath = base_path('../public_html/uploads/resources');
            $file->move($destinationPath, $filename);
            
            // Timpa variabel $filePath dengan link file yang baru
            $filePath = asset('uploads/resources/' . $filename);
        }

        $resource->update([
            'title' => $request->title,
            'author_id' => $request->author_id,
            'resource_category_id' => $request->resource_category_id,
            'description' => $request->description,
            'file_path' => $filePath,
            'external_link' => $request->external_link,
        ]);

        return redirect()->route('admin.resources.index')->with('success', 'Resource berhasil diperbarui!');
    }

    public function resourcesDestroy($id)
    {
        $this->checkAuth();
        $resource = Resource::findOrFail($id);

        // === TAMBAHKAN BLOK INI UNTUK MENGHAPUS FILE FISIK ===
        // Cek apakah ada file yang tersimpan dan pastikan itu file lokal
        if ($resource->file_path && str_contains($resource->file_path, 'uploads/resources/')) {
            
            // Ambil nama filenya saja (contoh: dari https://.../file.pdf menjadi file.pdf)
            $filename = basename($resource->file_path);
            
            // Tentukan lokasi asli file tersebut di dalam public_html
            $filePath = base_path('../public_html/uploads/resources/' . $filename);
            
            // Jika file tersebut benar-benar ada di server, maka hapus
            if (file_exists($filePath)) {
                unlink($filePath);
            }
        }
        // =====================================================

        // Hapus data dari database
        $resource->delete();
        
        return redirect()->route('admin.resources.index')->with('success', 'Resource beserta filenya berhasil dihapus.');
    }

    /* -------------------------------------------------------------------------- */
    /*                         RESOURCE CATEGORIES CRUD                           */
    /* -------------------------------------------------------------------------- */

    public function resourceCategoriesIndex()
    {
        $this->checkAuth();
        $categories = ResourceCategory::withCount('resources')->orderBy('name', 'asc')->get();
        return view('admin.resource-categories.index', compact('categories'));
    }

    public function resourceCategoriesCreate()
    {
        $this->checkAuth();
        return view('admin.resource-categories.create');
    }

    public function resourceCategoriesStore(Request $request)
    {
        $this->checkAuth();
        $request->validate([
            'name' => 'required|string|max:255',
            'slug' => 'required|string|unique:resource_categories,slug',
        ]);

        ResourceCategory::create([
            'name' => $request->name,
            'slug' => Str::slug($request->slug),
        ]);

        return redirect()->route('admin.resource-categories.index')->with('success', 'Kategori riset berhasil ditambahkan!');
    }

    public function resourceCategoriesEdit($id)
    {
        $this->checkAuth();
        $category = ResourceCategory::findOrFail($id);
        return view('admin.resource-categories.edit', compact('category'));
    }

    public function resourceCategoriesUpdate(Request $request, $id)
    {
        $this->checkAuth();
        $category = ResourceCategory::findOrFail($id);

        $request->validate([
            'name' => 'required|string|max:255',
            'slug' => 'required|string|unique:resource_categories,slug,' . $id,
        ]);

        $category->update([
            'name' => $request->name,
            'slug' => Str::slug($request->slug),
        ]);

        return redirect()->route('admin.resource-categories.index')->with('success', 'Kategori riset berhasil diperbarui!');
    }

    public function resourceCategoriesDestroy($id)
    {
        $this->checkAuth();
        $category = ResourceCategory::findOrFail($id);
        $category->delete();
        return redirect()->route('admin.resource-categories.index')->with('success', 'Kategori riset berhasil dihapus.');
    }

    /* -------------------------------------------------------------------------- */
    /*                              SECTORS CRUD                                  */
    /* -------------------------------------------------------------------------- */

    public function sectorsIndex()
    {
        $this->checkAuth();
        $sectors = Sector::orderBy('name_id', 'asc')->get();
        return view('admin.sectors.index', compact('sectors'));
    }

    public function sectorsCreate()
    {
        $this->checkAuth();
        return view('admin.sectors.create');
    }

    public function sectorsStore(Request $request)
    {
        $this->checkAuth();
        $request->validate([
            'name_id' => 'required|string|max:255',
            'name_en' => 'required|string|max:255',
            'slug' => 'required|string|unique:sectors,slug',
        ]);

        Sector::create([
            'name_id' => $request->name_id,
            'name_en' => $request->name_en,
            'slug' => Str::slug($request->slug),
        ]);

        return redirect()->route('admin.sectors.index')->with('success', 'Sektor berhasil ditambahkan!');
    }

    public function sectorsEdit($id)
    {
        $this->checkAuth();
        $sector = Sector::findOrFail($id);
        return view('admin.sectors.edit', compact('sector'));
    }

    public function sectorsUpdate(Request $request, $id)
    {
        $this->checkAuth();
        $sector = Sector::findOrFail($id);

        $request->validate([
            'name_id' => 'required|string|max:255',
            'name_en' => 'required|string|max:255',
            'slug' => 'required|string|unique:sectors,slug,' . $id,
        ]);

        $sector->update([
            'name_id' => $request->name_id,
            'name_en' => $request->name_en,
            'slug' => Str::slug($request->slug),
        ]);

        return redirect()->route('admin.sectors.index')->with('success', 'Sektor berhasil diperbarui!');
    }

    public function sectorsDestroy($id)
    {
        $this->checkAuth();
        $sector = Sector::findOrFail($id);
        $sector->delete();
        return redirect()->route('admin.sectors.index')->with('success', 'Sektor berhasil dihapus.');
    }

    /* -------------------------------------------------------------------------- */
    /*                            CONTACTS & SUBMISSIONS                          */
    /* -------------------------------------------------------------------------- */

    public function contactsIndex()
    {
        $this->checkAuth();
        $contacts = \App\Models\ContactSubmission::orderBy('created_at', 'desc')->paginate(15);
        return view('admin.contacts.index', compact('contacts'));
    }

    public function contactsExportPdf()
    {
        $this->checkAuth();
        $contacts = \App\Models\ContactSubmission::orderBy('created_at', 'desc')->get();
        $pdf = \Barryvdh\DomPDF\Facade\Pdf::loadView('admin.contacts.pdf', compact('contacts'));
        return $pdf->download('contact_submissions.pdf');
    }

    public function contactsExportExcel()
    {
        $this->checkAuth();
        return \Maatwebsite\Excel\Facades\Excel::download(new \App\Exports\ContactsExport, 'contact_submissions.xlsx');
    }

    public function contactsShow($id)
    {
        $this->checkAuth();
        $contact = \App\Models\ContactSubmission::findOrFail($id);
        return view('admin.contacts.show', compact('contact'));
    }

    public function contactsDestroy($id)
    {
        $this->checkAuth();
        $contact = \App\Models\ContactSubmission::findOrFail($id);
        $contact->delete();
        return redirect()->route('admin.contacts.index')->with('success', 'Data kontak berhasil dihapus.');
    }
}
