<nav class="flex flex-col">

    <!-- Logo -->
    @include('left-sidebar.logo')


    <!-- Homepage link -->
    <x-main-menu-item title="Home" route="home">
        @include('left-sidebar.main-menu-icons.home')
    </x-main-menu-item>

    <!-- Explore link -->
    <x-main-menu-item title="Explore" route="explore">
        @include('left-sidebar.main-menu-icons.explore')
    </x-main-menu-item>

    <!-- Notifications link -->
    <x-main-menu-item title="Notifications" route="notifications">
        @include('left-sidebar.main-menu-icons.notifications')
    </x-main-menu-item>

    <!-- Messages link -->
    <x-main-menu-item title="Messages" route="messages">
        @include('left-sidebar.main-menu-icons.messages')
    </x-main-menu-item>

    <!-- Bookmarks link -->
    <x-main-menu-item title="Bookmarks" route="bookmarks">
        @include('left-sidebar.main-menu-icons.bookmarks')
    </x-main-menu-item>

    <!-- Lists link -->
    <x-main-menu-item title="Lists" route="lists">
        @include('left-sidebar.main-menu-icons.lists')
    </x-main-menu-item>

    <!-- Profile link -->
    <x-main-menu-item title="Profile" route="profile">
        @include('left-sidebar.main-menu-icons.profile')
    </x-main-menu-item>

    <!-- More link -->
    <x-main-menu-item title="More">
        @include('left-sidebar.main-menu-icons.more')
    </x-main-menu-item>


    <!-- Tweet button -->
    @include('left-sidebar.tweet-button')
</nav>
