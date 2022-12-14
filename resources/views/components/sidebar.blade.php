<div id="sidebar-container" class="sidebar-expanded d-none d-md-block">
    {{-- Menu List--}}
    <ul class="list-group">
        {{-- Separator with title --}}
        <li
            class="list-group-item sidebar-separator-title text-muted d-flex align-items-center menu-collapsed">
            <small>
                DASHBOARD
            </small>
        </li>
        {{-- Separator END --}}
        <a
            href="{{ route('dashboard') }}"
            class="bg-dark list-group-item list-group-item-action {{  Route::is('dashboard') ? 'active' : '' }}">
            <div class="d-flex w-100 justify-content-start align-items-center">
                <span class="fa fa-film fa-fw mr-3"></span>
                <span class="menu-collapsed">Dashboard</span>
            </div>
        </a>
        <li
            class="list-group-item sidebar-separator-title text-muted d-flex align-items-center menu-collapsed">
            <small>
                MASTER DATA
            </small>
        </li>
        {{-- Separator END --}}
        <a
            href="{{ route('books.index') }}"
            class="bg-dark list-group-item list-group-item-action nav-link {{  Route::is('books.index','books.create','books.show','books.edit') ? 'active' : '' }}">
            <div class="d-flex w-100 justify-content-start align-items-center">
                <span class="fa fa-film fa-fw mr-3"></span>
                <span class="menu-collapsed">Daftar Buku</span>
            </div>
        </a>
        <a
            href="{{ route('authors.index') }}"
            class="bg-dark list-group-item list-group-item-action {{  Route::is('authors.index','authors.create','authors.show','authors.edit') ? 'active' : '' }}">
            <div class="d-flex w-100 justify-content-start align-items-center">
                <span class="fa fa-film fa-fw mr-3"></span>
                <span class="menu-collapsed">Daftar Penulis</span>
            </div>
        </a>
    </ul>
    {{-- Menu List END--}}
</div>