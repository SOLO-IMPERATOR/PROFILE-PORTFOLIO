@props(['categories', 'projects'])

<!-- ======================== PORTFOLIO SECTION ======================== -->
<section id="portfolio" class="section portfolio">
    <div class="container">
        <div class="section-header" data-aos="fade-up">
            <span class="section-tag">{{ __("Mои работы") }}</span>
            <h2 class="section-title">{{ __("Проекты") }}</h2>
            <div class="section-line"></div>
        </div>
        <div class="portfolio-filters" data-aos="fade-up" data-aos-delay="100">
            @foreach($categories as $category)
                <button class="filter-btn" data-filter="{{ \Illuminate\Support\Str::slug($category->name) }}">
                    {{ $category->name }}
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
                                    <span>{{ __("Посетить сайт") }}</span>
                                </a>
                            @endif
                            @if(!empty($gallery))
                                <button type="button" class="project-overlay-btn gallery-btn"
                                        data-gallery='{{ $galleryJson }}'>
                                    <i class="fas fa-images"></i>
                                    <span>{{ __("Галерея") }}</span>
                                </button>
                            @endif
                        </div>
                    </div>
                    <div class="project-info">
                        <h3>{{ $project->name }}</h3>
                        <p>{!! $project->description !!}</p>
                        <div class="project-tags">
                            @foreach($project->tags as $tag)
                                <span class="project-tag">{{ $tag->name }}</span>
                            @endforeach
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
