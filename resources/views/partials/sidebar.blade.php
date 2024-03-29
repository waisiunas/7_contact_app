<nav id="sidebar" class="sidebar js-sidebar">
    <div class="sidebar-content js-simplebar">
        <a class="sidebar-brand" href="{{ route('dashboard') }}">
            <span class="align-middle">Contact App</span>
        </a>

        <ul class="sidebar-nav">

            <li class="sidebar-item">
                <a class="sidebar-link" href="{{ route('dashboard') }}">
                    <i class="align-middle" data-feather="book"></i> <span class="align-middle">Dashbaord</span>
                </a>
            </li>

            <li class="sidebar-item">
                <a class="sidebar-link" href="{{ route('category') }}">
                    <i class="align-middle" data-feather="book"></i> <span class="align-middle">Categories</span>
                </a>
            </li>

            <li class="sidebar-item">
                <a class="sidebar-link" href="{{ route('contact') }}">
                    <i class="align-middle" data-feather="book"></i> <span class="align-middle">Contacts</span>
                </a>
            </li>

            <li class="sidebar-item">
                <a class="sidebar-link" href="{{ route('contact.deleted') }}">
                    <i class="align-middle" data-feather="book"></i> <span class="align-middle">Deleted Contacts</span>
                </a>
            </li>
        </ul>
    </div>
</nav>
