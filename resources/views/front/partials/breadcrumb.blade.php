<!-- Breadcrumb -->
<div class="breadcrumb-bar">
    <h2 class="breadcrumb-title">@yield('title')</h2>
    <nav aria-label="breadcrumb" class="page-breadcrumb">
        <ol class="breadcrumb">
            <!-- <li class="breadcrumb-item"><a href="index-2.html">Profile</a></li> -->
            <li class="breadcrumb-item active" aria-current="page">{{Session()->get('userType')}}</li>
            <li class="breadcrumb-item active" aria-current="page">@yield('title')</li>
        </ol>
    </nav>

</div>
<!-- /Breadcrumb -->