@props(['categories', 'projects'])

<!-- ======================== PORTFOLIO SECTION ======================== -->
<section id="portfolio" class="section portfolio">
    <div class="container">
        <div class="section-header" data-aos="fade-up">
            <span class="section-tag" data-i18n="portfolio.tag">My work</span>
            <h2 class="section-title" data-i18n="portfolio.title">Latest Projects</h2>
            <div class="section-line"></div>
        </div>
        <div class="portfolio-filters" data-aos="fade-up" data-aos-delay="100">
            <button class="filter-btn active" data-filter="all">
                <span data-i18n="portfolio.filter_all">All</span>
            </button>
            @foreach($categories as $category)
                <button class="filter-btn" data-filter="{{ \Illuminate\Support\Str::slug($category->name) }}">
                    <span data-lang-ru="{{ $category->name }}" data-lang-en="{{ $category->name_en ?? $category->name }}">{{ $category->name }}</span>
                </button>
            @endforeach
        </div>
        <div class="portfolio-grid" id="portfolioGrid">
            @foreach($projects as $i => $project)
                @php
                    $cats = $project->category->map(fn($c) => \Illuminate\Support\Str::slug($c->name))->implode(' ');
                    $gallery = $project->gallery ?? [];
                    $galleryJson = json_encode(
                        collect($gallery)->map(fn($img) => [
                            'href'  => \Illuminate\Support\Facades\Storage::url($img),
                            'type'  => 'image',
                            'title' => $project->name,
                        ])->values()->all()
                    );
                @endphp
                <div class="project-card" data-category="{{ $cats }}" data-aos="fade-up" data-aos-delay="{{ $i * 100 }}">
                    <div class="project-image">
                      
                        <div class="project-image-bg" style="background: {{ $project->background ?? 'linear-gradient(135deg, #6366f1, #06b6d4)' }}">
                            @if($project->class_icon)
                                <i class="{{ $project->class_icon }}"></i>
                            @endif
                        </div>
                       
                        <div class="project-overlay">
                            @if($project->url)
                                <a href="{{ $project->url }}" target="_blank" rel="noopener" class="project-overlay-btn">
                                    <i class="fas fa-external-link-alt"></i>
                                    <span data-i18n="portfolio.view">Visit Site</span>
                                </a>
                            @endif
                            @if(!empty($gallery))
                                <button type="button" class="project-overlay-btn gallery-btn"
                                        data-gallery='{{ $galleryJson }}'>
                                    <i class="fas fa-images"></i>
                                    <span data-lang-ru="Галерея" data-lang-en="Gallery">Галерея</span>
                                </button>
                            @endif
                        </div>
                    </div>
                    <div class="project-info">
                        <h3 data-lang-ru="{{ $project->name }}" data-lang-en="{{ $project->name_en ?? $project->name }}">{{ $project->name }}</h3>
                        <div class="project-desc">
                            <div class="lang-content lang-ru">{!! $project->description !!}</div>
                            <div class="lang-content lang-en" style="display:none">{!! $project->description_en ?? $project->description !!}</div>
                        </div>
                        <div class="project-tags">
                            @foreach($project->tags as $tag)
                                <span class="project-tag" data-lang-ru="{{ $tag->name }}" data-lang-en="{{ $tag->name_en ?? $tag->name }}">{{ $tag->name }}</span>
                            @endforeach
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
