<nav class="flex flex-col">

    <!-- Logo -->
    @include('partials.main-menu.logo')


    <!-- Homepage link -->
    <x-main-menu.item title="Home" route="homepage" active="{{ Request::routeIs('homepage') ? 'true' : '' }}">
        @include('partials.main-menu.icons.homepage')
    </x-main-menu.item>

    <!-- Explore link -->
    <x-main-menu.item title="Explore" route="explore" active="{{ Request::routeIs('explore') ? 'true' : '' }}">
        @include('partials.main-menu.icons.explore')
    </x-main-menu.item>

    <!-- Notifications link -->
    <x-main-menu.item title="Notifications" route="notifications" active="{{ Request::routeIs('notifications') ? 'true' : '' }}">
        @include('partials.main-menu.icons.notifications')
    </x-main-menu.item>

    <!-- Messages link -->
    <x-main-menu.item title="Messages" route="messages" active="{{ Request::routeIs('messages') ? 'true' : '' }}">
        @include('partials.main-menu.icons.messages')
    </x-main-menu.item>

    <!-- Profile link -->
    <x-main-menu.item title="Profile" route="profile" active="{{ Request::routeIs('profile') ? 'true' : '' }}">
        @include('partials.main-menu.icons.profile')
    </x-main-menu.item>

    <!-- More link -->
    <x-main-menu.item title="More">
        @include('partials.main-menu.icons.more')
    </x-main-menu.item>


    <!-- Tweet button -->
    @include('partials.main-menu.tweet-button')
</nav>
