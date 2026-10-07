            <div class="col-12 col-lg-4">
                <div class="ve-sidebar">
                    <div class="ve-sidebar-widget">
                        <h5 class="ve-sidebar-title">Recherche</h5>
                        <form action="{{ route('post.index') }}" method="GET">
                            <div class="ve-search-box">
                                <input type="text" name="q" placeholder="Rechercher un article...">
                                <button type="submit"><i class="fa fa-search"></i></button>
                            </div>
                        </form>
                    </div>

                    @if ($categories->isNotEmpty())
                        <div class="ve-sidebar-widget">
                            <h5 class="ve-sidebar-title">Catégories</h5>
                            <ul class="ve-cat-list">
                                @foreach ($categories as $categorie)
                                    <li>
                                        <a href="{{ route('post.index', ['categorie' => $categorie->categorie]) }}">
                                            {{ $categorie->categorie }} <span>{{ $categorie->total }}</span>
                                        </a>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    @if ($recents->isNotEmpty())
                        <div class="ve-sidebar-widget">
                            <h5 class="ve-sidebar-title">Articles récents</h5>
                            @foreach ($recents as $recent)
                                <div class="ve-recent-post">
                                    <div class="ve-rp-img bg-img" style="background-image:url({{ $recent->image ? asset('storage/' . $recent->image) : asset('img/bg-img/10.jpg') }});"></div>
                                    <div>
                                        <a href="{{ route('post.show', $recent->slug) }}">{{ $recent->titre }}</a>
                                        <span><i class="fa fa-calendar"></i> {{ $recent->publie_le->translatedFormat('j F Y') }}</span>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @endif
                </div>
            </div>