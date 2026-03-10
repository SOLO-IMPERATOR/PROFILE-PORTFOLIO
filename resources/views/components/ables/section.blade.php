  @props(['categories'])

  @if($categories)
  <!-- ======================== SKILLS SECTION ======================== -->
    <section id="skills" class="section skills">
        <div class="container">
            <div class="section-header" data-aos="fade-up">
                <span class="section-tag" data-i18n="skills.tag">What I work with</span>
                <h2 class="section-title" data-i18n="skills.title">Skills & Technologies</h2>
                <div class="section-line"></div>
            </div>

            <!-- Skills Category Tabs -->
            <div class="skills-tabs" data-aos="fade-up" data-aos-delay="100">
                @foreach ($categories as  $category)
                    <button
                    @class([
                        'skill-tab',
                        'active' => $loop->first
                    ])
                    data-category="{{ $category->name }}">
                        @if($category->class_icon)
                            <i class="{{ $category->class_icon }}"></i>
                        @elseif($category->svg)
                            {!! $category->svg !!}
                        @else
                            <img src="{{ $category->image }}" alt="{{ $category->name }}"
                        @endif
                        <span>{{ $category->name }}</span>
                    </button>
                @endforeach
            </div>

            <!-- Skills Grid -->
            @php $delay = 100; @endphp
            <div class="skills-grid" id="skillsGrid">
                <!-- Backend -->
                @foreach($categories as $category)
                    @foreach($category->abillities as  $able)
                      <x-ables.able
                      :able="$able"
                      :delay="$delay"
                      :active="(bool)$loop->parent->first"
                      />
                    @php $delay += 50 @endphp
                    @endforeach
                @endforeach
            </div>
        </div>
    </section>
    @endif
