<nav class="flex flex-col">

    <!-- Logo -->
    @include('menu.logo')


    <!-- Homepage link -->
    <x-menu.item title="Home" route="home">
        @include('menu.icons.home')
    </x-menu.item
    >

    <!-- Explore link -->
    <x-menu.item title="Explore" route="explore">
        @include('menu.icons.explore')
    </x-menu.item
    >

    <!-- Notifications link -->
    <x-menu.item title="Notifications" route="notifications">
        @include('menu.icons.notifications')
    </x-menu.item
    >

    <!-- Messages link -->
    <x-menu.item title="Messages" route="messages">
        @include('menu.icons.messages')
    </x-menu.item
    >

    <!-- Profile link -->
    <x-menu.item title="Profile" route="profile">
        @include('menu.icons.profile')
    </x-menu.item
    >

    <!-- More link -->
    <x-menu.item title="More">
        @include('menu.icons.more')
    </x-menu.item
    >


    <!-- Tweet button -->
    @include('menu.tweet-button')
</nav>
