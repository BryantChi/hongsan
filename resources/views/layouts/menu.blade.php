<li class="nav-item mb-4">
    <a href="{{ localized_route('index') }}" target="_blank" class="nav-link">
        <span class="h5 mr-2 brand-image"><i class="fas fa-external-link-alt"></i></span>
        <p class="h5"> 瀏覽網站</p>
    </a>
</li>

<li class="nav-item">
    <a href="{{ localized_route('admin.adminUsers.index') }}"
        class="nav-link {{ Request::is('admin/adminUsers*') ? 'active' : '' }}">
        <span class="mr-2 brand-image"><i class="fas fa-users-cog"></i></span>
        <p> 管理員</p>
    </a>
</li>

<li class="nav-item">
    <a href="{{ localized_route('admin.seoSettings.index') }}"
       class="nav-link {{ Request::is('admin/seoSettings*') ? 'active' : '' }}">
       <span class="mr-2 brand-image"><i class="fas fa-search"></i></span>
        <p>Seo設定</p>
    </a>
</li>

<li class="nav-item">
    <a href="{{ localized_route('admin.translationsInfos.index') }}" class="nav-link {{ Request::is('admin/translationsInfos*') ? 'active' : '' }}">
        <span class="mr-2 brand-image"><i class="fas fa-language"></i></span>
        <p>通用翻譯設定</p>
    </a>
</li>

<li class="nav-item">
    <a href="{{ localized_route('admin.newsInfos.index') }}"
       class="nav-link {{ Request::is('admin/newsInfos*') ? 'active' : '' }}">
       <span class="mr-2 brand-image"><i class="fas fa-newspaper"></i></span>
        <p>最新消息</p>
    </a>
</li>

{{--產品相關，可收合，子選單縮排 --}}
<li class="nav-item has-treeview {{ Request::is('admin/products*') || Request::is('admin/brandsInfos*') ? 'menu-open' : '' }}">
    <a href="#" class="nav-link {{ Request::is('admin/products*') ? 'active' : '' }}">
        <span class="mr-2 brand-image"><i class="fas fa-box"></i></span>
        <p>產品管理<i class="right fas fa-angle-left"></i></p>
    </a>
    {{-- 子選單，縮排效果 --}}
    <ul class="nav nav-treeview">
        <li class="nav-item">
            <a href="{{ localized_route('admin.brandsInfos.index') }}" class="nav-link {{ Request::is('admin/brandsInfos*') ? 'active' : '' }}">
                <span class="mr-2 brand-image"><i class="fas fa-tags"></i></span>
                <p>產品品牌</p>
            </a>
        </li>
    </ul>

</li>



{{-- <li class="nav-item">
    <a href="{{ localized_route('admin.brandsInfos.index') }}" class="nav-link {{ Request::is('admin/brandsInfos*') ? 'active' : '' }}">
        <span class="mr-2 brand-image"><i class="fas fa-tags"></i></span>
        <p>產品品牌</p>
    </a>
</li> --}}

{{-- <li class="nav-item">
    <a href="{{ localized_route('admin.marqueeInfos.index') }}"
       class="nav-link {{ Request::is('admin/marqueeInfos*') ? 'active' : '' }}">
       <span class="mr-2 brand-image"><i class="fas fa-bullhorn"></i></span>
        <p>跑馬燈資訊</p>
    </a>
</li>


<li class="nav-item">
    <a href="{{ localized_route('admin.newsInfos.index') }}"
       class="nav-link {{ Request::is('admin/newsInfos*') ? 'active' : '' }}">
       <span class="mr-2 brand-image"><i class="fas fa-newspaper"></i></span>
        <p>最新消息</p>
    </a>
</li> --}}


