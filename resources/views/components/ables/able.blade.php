@props(['able','delay', 'active' => false])
<div class="skill-card" data-category="{{ \Illuminate\Support\Str::slug($able->category->name) }}" data-aos="zoom-in" data-aos-delay="{{ $delay }}">
    <div class="skill-icon-wrap">
        @if($able->class_icon)
            <i class="{{ $able->class_icon }} colored"></i>
        @elseif($able->svg)
            {!! $able->svg !!}
        @else
            <img src="{{ Storage::url($able->image) }}" alt="{{ $able->name_en ?? $able->name }}">
        @endif
        
    </div>
    <h4 data-lang-ru="{{ $able->name }}" data-lang-en="{{ $able->name_en ?? $able->name }}">{{ $able->name }}</h4>
    <div class="skill-bar"><div class="skill-progress" data-width="{{ $able->level }}"></div></div>
    <span class="skill-level">{{ $able->level }}%</span>
</div>
