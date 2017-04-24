<nav>
    <div class="nav-wrapper">
        <a href="#" class="brand-logo">Logo</a>
        <ul id="nav-mobile" class="right hide-on-med-and-down">
            <li>{{Html::linkAction('UserController@index', 'User')}}</li>
            <li>{{Html::linkAction('NovelController@index', 'Novel')}}</li>
        </ul>
    </div>
</nav>